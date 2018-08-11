@include('includes.admin.admin_header')
 <body>
        <div class="row no-gutters">
         @include('includes.admin.nav')
            <div class="col-md-9 offset-md-3">
               @include('includes.admin.top')
              <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab"></div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab"></div>
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab"></div>
                <div class="tab-pane fade" id="v-pills-service" role="tabpanel" aria-labelledby="v-pills-service-tab"></div>
                <div class="tab-pane fade" id="v-pills-product" role="tabpanel" aria-labelledby="v-pills-product-tab"></div>
                <div class="tab-pane fade show active" id="v-pills-user" role="tabpanel" aria-labelledby="v-pills-user-tab">
                    <div class="row"><div class="col-10 offset-md-1"> 
                        <div class="container">
                            <p class="text-muted my-4" style="font-size: 20px;">User management</p>
                        </div>
                        <div class="container">
                            <div class="container bg-white">
                                <div style="height: 30px;"></div>
                                <table class="table table-bordered text-muted" style="font-size: 14px;"   >
                                        <thead class="bottom">
                                          <tr class="table-borderless bg-light">
                                            <th scope="col">Name</th>
                                            <th scope="col">System name</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $user)
                                             <tr>
                                                 <th>{{$user->name()}}</th>
                                                 @if($user->user_type == 0)
                                                   <td>{{'Administrator'}}</td>
                                                 @elseif($user->user_type == 1)
                                                  <td>{{'Customer'}}</td>
                                                 @endif
                                                 @if($user->status == 0)
                                                   <td>{{'Inactive'}}</td>
                                                 @elseif($user->user_type == 1)
                                                  <td>{{'Active'}}</td>
                                                 @endif
                                                 
                                                 
                                             </tr>
                                            @endforeach
                                        
                                        </tbody>
                                      </table>
                                                               
                                    </div>
    
                        </div>
                      </div>
                      </div>
                </div>
                <div class="tab-pane fade" id="v-pills-contact" role="tabpanel" aria-labelledby="v-pills-contact-tab">...</div>
                <div class="tab-pane fade" id="v-pills-setting" role="tabpanel" aria-labelledby="v-pills-setting-tab">
                </div>
              </div>
            </div>
          </div>
@include('includes.admin.admin_footer')