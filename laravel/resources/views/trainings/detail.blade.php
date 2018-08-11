@include('includes.header')
<link rel="stylesheet" href="/css2/microbladtrain.css">
   
   <div class="container-fluid containxxx">
   <div class="container" style="padding-top:145px; background-image: linear-gradient(to right, #222222, rgba(34, 34, 34, 0)) ,url('/images/{{ $training->training_image }}'); min-height:500px;">
           <p style="font-size:32px;color:white;font-weight:bold;">{{ $training->training_title }}</p>
           <p style="font-size:17px;color:white;">Training Certification Master Class</p>
           <a class="btn btn-warning" style="padding-top:17px;width: 180px;height: 54px;border-radius: 4px;background-color: #f9b13b; color:white;font-size:14px;" href="">REGISTER</a>
       </div>
   </div>
   <div class="container">
       
       <div class="row">
           <!--1st col-->
           <div class="col-md-4 mt-5 slide_left">
               <p class="text-bold"  >Training duration : <span style="font-weight:normal;"> {{ $training->training_duration }} </span></p>
         
               <p class="text-bold">Training Instructor :  <span style="font-weight:normal;">{{ $training->training_tutor }}</span> </p>
               
            <form action="{{ route('training_payment_info') }}" method="post">@csrf
                <p class="text-bold">Price</p>
            @if(!empty( $packages ) )
                @foreach( $packages as $package )
    
                <div class="bg-price">
                    <div class="custom-control custom-radio">
                      <input type="radio" id="customRadio{{  $package->id }}" name="training_plan_id" value="{{ $package->id }}" class="custom-control-input">
                      <label class="custom-control-label text-color" for="customRadio{{  $package->id }}"> {{$package->package_name }}</label></label>
                    </div>
                    <p class="text_color1">${{ number_format( $package->price, 2 ) }}</p>
                </div>
                <br>
                @endforeach
                
                <input type="hidden" name="training" value="{{$training->id}}" />

                <button class="btn btnn text-white" href=""  style="color:font-size:10px;letter-spacing: 0.6px;"> PAY NOW</button>
            @endif
            </form>
           </div>
           <!--2nd Col-->
           <div class="col-md-4 mt-5 slide_mid">
               <p class="text-bold">TRAINING CERTIFICATION MASTER CLASS</p>
               <ul>
                   {!! App\Helpers::convert_json_to_html_list($training->training_cert_list) !!}
               </ul>
           </div>
           <!--3rd col-->
           <div class="col-md-4 mt-5 slide_right">
                <p class="text-bold">STUDENTS WILL RECEIVE</p>
                
                <ul>
                    {!! App\Helpers::convert_json_to_html_list($training->training_students_benefits) !!}
                </ul>
           </div>
       </div>
   </div>
@include('includes.footer')
<script type="text/javascript" src="/js/microbladtrain.js"></script>
@include('includes.livechat')
@include('includes.footer_end')    <!-- Optional JavaScript -->