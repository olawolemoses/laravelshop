<div class="container mt-5">
    
    @if( $flash = session('status') )
        <div class="alert alert-success" style="display:block" role="alert">
            {{ $flash }}
        </div>
    @endif
                                    
    @foreach($subscriptions as $subscription)
    <!-- the order info -->

        <div class="card border-0 rounded-0 order" data-id="{{ $subscription->id }}">
            <div class="card-body">
                <div class="container">
                    <div class="row">
            
                        <p class="py-4"    style="font-size: 28px;color: #66a45f;letter-spacing: 1.2px;">{{ $subscription->training_plan->training_package->training->training_title }} </p>

                    </div>
                </div>
            </div>
        </div>
        
        
    
    <!-- the tracking -->
    <div class="container bg-white mt-4" id='effet-{{ $subscription->id }}' style="display:none">
        
    
            <div class="row mt-3">
                <div class="col-4 text-left mb-4">
                    <p>Traiing </p>
                        <p> {{  $subscription->training_plan->training_package->training->training_title }} </p>
                        <p> {{  $subscription->training_plan->training_package->package_name }}<br>
                        </p>                    
                </div>
                
            </div>
       
    </div>
    
    <!-- the order info -->
    @endforeach
    

</div>
<div class="container bg-light" style="height: 100px;"></div>