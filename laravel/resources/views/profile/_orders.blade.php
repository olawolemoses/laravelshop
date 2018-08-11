<div class="container mt-5">
    
    @if( $flash = session('status') )
        <div class="alert alert-success" style="display:block" role="alert">
            {{ $flash }}
        </div>
    @endif
                                    
    @foreach($orders as $order)
    <!-- the order info -->

        <div class="card border-0 rounded-0 order" data-id="{{ $order->id }}">
            <div class="card-body">
                <div class="container">
                    <div class="row">
            
                        <p class="py-4"    style="font-size: 28px;color: #66a45f;letter-spacing: 1.2px;">{{ $order->invoice_id }} is in  {{  App\Models\Invoice::getStatus()[ $order->invoice->status ] }}</p>

                    </div>
                </div>
            </div>
        </div>
        
        @foreach($order->items as $orderItem)
        <div class="card border-0 rounded-0" style="border-left:0">
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        
                        
                        
                        
                            <div class="col">
                              <img width="80px" src="images/{{ $orderItem->item->get_image() }}" alt="">
                            </div>
                            
                            <div class="col-6">
                              <p style="font-size:17px;"> {{ $orderItem->item->get_name() }}</p>
                              <p style="font-size:24px;">${{ $orderItem->item->get_amount() }}</p>
                              <p style="font-size:14px;"><strong>Order date</strong> <span> {{ $order->created_at->toDateTimeString() }}</span></p>
                            </div>
                            
                            <div class="col">
                              <p style="font-size:14px;"><span><div class="mt-2 mr-1" style="float: left; width: 10px;
                                height: 10px;border-radius: 50%;
                                background-color: #f1c881;"></div></span>With delivery courier</p>
                                @if( App\Models\Invoice::STATUS_CANCELED !=  $order->invoice->status )
                                    <p class="text-right;" style="font-size:14px;"><a class="pl-3" href="{{ route('order.cancel_request', ['order'=>$order]) }}" style="color: #66a45f;">Cancel Order</a></p>
                                @endif
                            </div>
                    </div>
                </div>
            </div>
        </div>
        
        <br />
        @endforeach
    
    <!-- the tracking -->
    <div class="container bg-white mt-4" id='effet-{{ $order->id }}' style="display:none">
        
            <p class="py-4" style="font-size: 28px;color: #66a45f;letter-spacing: 1.2px;">{{ $order->invoice_id }} is in  {{  App\Models\Invoice::getStatus()[ $order->invoice->status ] }}</p>
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 33%"></div>
            </div>

            <div class="d-flex flex-row justify-content-between" style="margin-top: -28px;">
                <div><img src="images/cart.png" alt="" class="mb-3" style="border: 4px solid white;"><p class="text-center text-muted">Ordered</p></div>
                <div><img src="images/transit.png" alt="" class="mb-3" style="border: 4px solid white;"><p class="text-center text-muted">In transit</p></div>
                <!-- <div><img src="images/pick.png" alt="" class="mb-3" style="border: 4px solid white;"><p class="text-center text-muted">Pick up</p></div> -->
                <div><img src="images/del.png" alt="" class="mb-3" style="border: 4px solid white;"><p class="text-center text-muted">Delivered</p></div>
            </div>
            
            <div class="row mt-3">
                <div class="col-4 text-left mb-4">
                    <p>Billing Address</p>
                        <p> {{ $order->user->profile->firstname }} {{ $order->user->profile->lastname }} </p>
                        <p> {{ $order->user->profile->street }} ,<br>
                            {{ $order->user->profile->city }},<br>
                            {{ $order->user->profile->state }}.<br>
                            {{ $order->user->profile->mobile_no }}
                        </p>                    
                </div>
                
                @if( $order->invoice->status > App\Models\Invoice::STATUS_ORDERED )
                <div class="col-4 text-left mb-4">
                    <p>Shipping Address</p>
                        <p> {{ $order->shipping->deliveryAddress->firstname }} {{ $order->shipping->deliveryAddress->lastname }} </p>
                        <p> {{ $order->shipping->deliveryAddress->street }} ,<br>
                            {{ $order->shipping->deliveryAddress->city }},<br>
                            {{ $order->shipping->deliveryAddress->state }}.<br>
                            {{ $order->shipping->deliveryAddress->mobile_no }}
                        </p>
                </div>
                @endif
                
                {{-- 
                @if( $order->invoice->status > App\Models\Invoice::STATUS_TRANSIT )
                <div class="col-4 mb-4">
                    
                </div>
                @endif 
                --}}
                
                @if( $order->invoice->status > App\Models\Invoice::STATUS_PICKUP )
                <div class="col-4 mb-4">
                    DELIVERED
                </div>
                @endif                
            </div>
       
    </div>
    
    <!-- the order info -->
    @endforeach
    

</div>
<div class="container bg-light" style="height: 100px;"></div>