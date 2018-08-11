<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Service;

use App\Calendar;

use App\Models\BookingsUserInfo;

use DB;

use Session;

class BookingsController extends Controller
{
    
	public function __construct()
	{
		$this->middleware('auth');
	}
	
    // checkout
    public function index(Request $request )
    {
        $services = Service::all();

        //dd( $services );
        
        return view('bookings.index', ['services' => $services ]);
    }
    
    public function chooseTime(Request $request)
    {
        $service = Service::find( $request->input('service') );
        
        return view('bookings.booking_time', ['service' => $service ]);
    }
    
    public function calendarTest()
    {
        // get the year and number of week from the query string and sanitize it
        $year = filter_input(INPUT_GET, 'year', FILTER_VALIDATE_INT);
        $week = filter_input(INPUT_GET, 'week', FILTER_VALIDATE_INT);
        
        // initialize the calendar object
        $calendar = new calendar();
        
        // get the current week object by year and number of week
        $currentWeek = $calendar->week($year, $week);
        
        // get the first and last day of the week
        $firstDay = $currentWeek->firstDay();
        $lastDay  = $currentWeek->lastDay();
        
		$current_day = date('Ymd');
		//dd($current_day);
		
		$results = [];
		$dates = [];
		do{
			$date = sprintf("%04d%02d%02d", $firstDay->year()->int(), $firstDay->month()->int(), $firstDay->day()->int());		
			
			$hour_bookings  = [];
			
			if( $current_day <= $date )
			{
				$hour_bookings = DB::select("SELECT hour_id, count(booked) as count_booked FROM 
					(select `sl`.`service_id` AS `service_id`,`s`.`service_name` AS `service_name`,
					`sh`.`hour_id` AS `hour_id`,`hr`.`hour_name` AS `hour_name`,`sl`.`id` AS `slot_id`,
					`sl`.`slot_name` AS `slot_name`,`sh`.`id` AS `slot_hour_id`,
					if(exists(select 1 from `sbscnige_honeydrops`.`bookings_user` `bu` 
					where (`bu`.`bookings_slot_hour_id` = `sh`.`id` and bu.`date` = :d1)),'Yes','No') 
					AS `booked` from `sbscnige_honeydrops`.`bookings_slot_hour` `sh` 
					join `sbscnige_honeydrops`.`bookings_slot` `sl` join `sbscnige_honeydrops`.`bookings_hour` `hr` 
					join `sbscnige_honeydrops`.`services` `s` 
					where ((`sh`.`slot_id` = `sl`.`id`) and (`sl`.`service_id` = `s`.`id`) and (`sh`.`hour_id` = `hr`.`id`)) 
					order by `sh`.`hour_id`,`slot_id`,`slot_hour_id`) as `booking` 
					WHERE booked = 'No' group by hour_id, booked", ['d1'=>$date] );
			}
			
			$results[ $date ] = $hour_bookings;
			$dates[] = $date;
		} while( $firstDay < $lastDay && $firstDay = $firstDay->next() );
		
		$hours = DB::table('bookings_hour')->pluck('id')->toArray();
		$hour_names = DB::table('bookings_hour')->pluck('hour_name', 'id')->toArray();
		
		//dd( $results );
		//dd( $hours );
		$map = [];
		
		foreach( $results as $k => $result )
		{
			foreach( $hours as $hour)
			{
				if(!empty( $result ) )
				{
					$ids = collect( $result )->pluck('hour_id')->toArray();
					
					if( in_array($hour, $ids ) )
						foreach( $result as $hour_booked )
						{
							if($hour == $hour_booked->hour_id )
								$map[ $hour ][$k] = $hour_booked->count_booked;
						}
					else
						$map[ $hour ][$k] = 0;
				}
				else
					$map[ $hour ][$k] = 0;
			}
		}
		
		//dd($results, $map );
		
        $prevWeek = $currentWeek->prev();
        $nextWeek = $currentWeek->next();
        
        // generate the URLs for pagination
        $prevWeekURL = sprintf('?year=%s&week=%s', $prevWeek->year()->int(), $prevWeek->int());
        $nextWeekURL = sprintf('?year=%s&week=%s', $nextWeek->year()->int(), $nextWeek->int());
        
        // set the active tab for the header
        $activeTab = 'week';
        
        $week_no = $currentWeek->int();
        $month = sprintf('%02d', $currentWeek->month()->int() );
        $year = $currentWeek->year()->int();
        
        $currentDay = (int)date('d');
        
        ///dd( $currentDay );
        
        return view('bookings.booking_time2', [ 'currentWeek' => $currentWeek, 'year'=>$year, "month"=>$month, 'currentDay' => $currentDay, 'map'=>$map, 'dates'=>$dates, 'hours'=>$hours, 'hour_names'=>$hour_names ]);
    }
    
    public function serviceOrder( Request $request )
    {
        //dd( $request->all() );
        
        $time_log = $request->input('time_log');
        
        $time_log = json_decode( $time_log, true );
                
		Session::put('session_time_log', $time_log);
		
 		$slot_hour_ids = [];
        foreach( $time_log as $time )
        {
			
            $time= explode("-", $time );
            $date = $time[0];
			
            $hour_id = $time[1];
			
            $related_products = DB::select("SELECT * 
                                            FROM (select `sl`.`service_id` AS `service_id`,
                                                `s`.`service_name` AS `service_name`,
                                                `sh`.`hour_id` AS `hour_id`,
                                                `hr`.`hour_name` AS `hour_name`,
                                                `sl`.`id` AS `slot_id`,
                                                `sl`.`slot_name` AS `slot_name`,
                                                `sh`.`id` AS `slot_hour_id`,
                                                if(exists(select 1 from `sbscnige_honeydrops`.`bookings_user` `bu` 
                                                where (`bu`.`bookings_slot_hour_id` = `sh`.`id` 
                                                and bu.`date` = :d1)),
                                                    'Yes','No') AS `booked` 
                                                from `sbscnige_honeydrops`.`bookings_slot_hour` `sh` 
                                                join `sbscnige_honeydrops`.`bookings_slot` `sl` 
                                                join `sbscnige_honeydrops`.`bookings_hour` `hr` 
                                                join `sbscnige_honeydrops`.`services` `s` 
                                                where ((`sh`.`slot_id` = `sl`.`id`) 
                                                and (`sl`.`service_id` = `s`.`id`) 
                                                and (`sl`.`service_id` = :d2) 
                                                and (`sh`.`hour_id` = `hr`.`id`)) 
                                                order by `sh`.`hour_id`,`slot_id`,`slot_hour_id`
                                            ) as `booking` WHERE booked = :d3 and hour_id = :d4", ['d1'=>$date, 'd2'=>"1", 'd3'=> "No", "d4"=>$hour_id]);
            
			
            if( count($related_products) > 0 )
            {
                $related_product = $related_products[0];
                
                $bookings_slot_hour_id = $related_product->slot_hour_id;
                
                //dd( [$bookings_slot_hour_id, $date, auth()->id()] );
                
				//$date = date( 'Y-m-d', strtotime( $date ) );
                
				//dd( $date );
				
				$id = DB::table('bookings_user_pending')->insertGetId(
                        ['user_id' => auth()->id(), 'bookings_slot_hour_id' => $bookings_slot_hour_id, 'date' => $date]
                    );
					
				$slot_hour_id[] = $id;
            }
        }
		
		Session::put('session_slot_hour_log', $slot_hour_id);

		return redirect()->route('bookings.bookingDetails');		
    }
	
	public function loadBookingDetails()
	{
		$user = auth()->user();
		
		return view('bookings.booking_details', ['user'=>$user]);
	}

	public function saveBookingDetails( Request $request )
	{
		//dd( $request->all() );
		
		$user_id = auth()->id();
		
		$bookingUserInfo = BookingsUserInfo::where('user_id', $user_id )->first();
		if( is_null($bookingUserInfo) )
			$bookingUserInfo = new BookingsUserInfo;
	
		$bookingUserInfo->user_id = $user_id;
		$bookingUserInfo->name = $request->input('name');
		$bookingUserInfo->phone_no = $request->input('phoneno');
		$bookingUserInfo->email = $request->input('email');
		$bookingUserInfo->message = $request->input('message'); 
		$bookingUserInfo->booking_session_id = collect(session()->getDrivers())->first()->getId();
		$bookingUserInfo->save();
		
		return redirect()->route('bookings_payment_info');
		//return view('bookings.booking_details');
	}

	
}