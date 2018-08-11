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
                <div class="tab-pane fade" id="v-pills-user" role="tabpanel" aria-labelledby="v-pills-user-tab"></div>
                <div class="tab-pane fade" id="v-pills-contact" role="tabpanel" aria-labelledby="v-pills-contact-tab">...</div>
                <div class="tab-pane fade show active" id="v-pills-setting" role="tabpanel" aria-labelledby="v-pills-setting-tab">


                        <div class="row"><div class="col-10 offset-md-1"> 
                                <div class="container">
                                    <p class="text-muted my-4" style="font-size: 20px;">Profile management</p>
                                </div>
                                <div class="container bg-white">
                                  <div style="height: 40px;"></div>
                                  <div class="container">  <div class="row">
                                        <div class="col-5">
                                            @include('includes.admin.status')
                                            <p class="my-3 text-muted" style="font-size:20px">Account settings</p>
                                            <form class="text-muted" action="/settings" method="POST">
                                                @csrf
                                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                    <div class="form-group">
                                                      <label for="formGroupExampleInput">Full name</label>
                                                      <input type="text" class="form-control" id="formGroupExampleInput" placeholder="" name="fullname" value="{{$user->name()}}">
                                                    </div>
                                                    <div class="form-group">
                                                      <label for="formGroupExampleInput2">Email</label>
                                                      <input type="email" class="form-control" id="formGroupExampleInput2" placeholder="" name="email" value="{{$user->username}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="formGroupExampleInput4">New Password</label>
                                                        <input type="password" class="form-control" id="formGroupExampleInput4" placeholder="" name="password">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="formGroupExampleInput5">Confirm Password</label>
                                                        <input type="password" class="form-control" id="formGroupExampleInput5" placeholder="" name="password_confirmation">
                                                    </div>
                                                    <div class="row justify-content-end">
                                                      <input type='submit' class="btn btn-warning mr-3 mt-4 text-white" style="width: 120px;" value='Update'>
                                                  </div>      
                                            </form>
                                                 <div style="height: 40px;"></div>
                                        </div>
                                    </div></div>
                                </div>
                                </div>
                              </div>    
                </div>
              </div>
            </div>
          </div>
    
@include('includes.admin.admin_footer')