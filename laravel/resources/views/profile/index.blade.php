@include('includes.header_local', ['css_files'=>['/css2/myprofile.css']])

<div class="container">
        <div class="container pt-4 bg-light">
            <nav class="nav nav-tabs border-0 rounded-0" id="myTab" role="tablist">
                    <a class="nav-item nav-link @if($is_active == 'profile') active @endif" text-muted" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true" style="font-size: 14px;">MY PROFILE</a>
                    <a class="nav-item nav-link @if($is_active == 'orders') active @endif" text-muted" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false" style="font-size: 14px;">MY ORDERS</a>
                    <a class="nav-item nav-link @if($is_active == 'notifications') active @endif" text-muted" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false" style="font-size: 14px;">TRAININGS</a>
            </nav>
        </div>
                  <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade @if($is_active == 'profile') show active @endif" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="card-body">
                                @if ($errors->count() > 0 )
                                    <div class="alert alert-danger" style="display:block">
                                        @foreach( $errors->all() as $error )
                                           <li>{{ $error }}</li>
                                        @endforeach
                                    </div>
                                @endif
                            
                    			@if (session('message'))
                    			        <div class="alert alert-success" style="display:block">
                    			            {{ session('message') }}
                    			        </div>
                    			@endif
                        </div>
                        @include('profile._home')
                    </div>
                    <div class="tab-pane fade @if($is_active == 'orders') show active @endif" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">    
                             
                        @include('profile._orders')    
                    </div>
                    <div class="tab-pane fade @if($is_active == 'notifications') show active @endif" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        @include('profile._trainings', ['subscriptions'=>$subscriptions] )
                    </div>
                  </div>
    </div>


@include('includes.footer')

@include('includes.livechat')
@include('includes.footer_end')