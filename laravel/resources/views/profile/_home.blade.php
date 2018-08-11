<form action="{{ route('profile.update') }}" method="post" class="mt-4" style="font-size: 13px;">@csrf

    <div class="container mt-5">
                                              <div class="row">
                                                  <div class="col-xl-6 col-sm col-md">
                                                    <div class="row">
                                                        <div class="col-8 mt-3">
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <img src="images/oval.png" alt="">
                                                                </div>
                                                                <div class="col-sm-8" style="font-size: 13px;">
                                                                    <p>Username</p>
                                                                    <p>{{ $user->username }}</p>
                                                                    <hr class="linebrkk">
                                                                </div>
                                                                

                                                            </div>
                                                            <p class="my-3" style="font-size: 12px;"><a href="#" style="color:#5e5e5e;">CHANGE PHOTO</a></p>
                                                    
                                                            <div class="form-group">
                                                              <label for="exampleInputEmail1">Firstname</label>
                                                              <input type="text" name="firstname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $user->firstname}}" placeholder="">
                                                             </div>
                                                            <div class="form-group">
                                                              <label for="exampleInputPassword1">Lastname</label>
                                                              <input type="text" name="lastname" class="form-control" id="exampleInputPassword1" placeholder="" value="{{ $user->lastname}}">
                                                            </div>
                                                            <div class="form-group">
                                                                    <label for="exampleInputEmail1">Email</label>
                                                                    <input name="email" readonly type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $user->username }}"  placeholder="">
                                                             </div>
                                                             <div class="form-group">
                                                                    <label for="exampleInputEmail1">Phone</label>
                                                                    <input type="tel" name="mobile_no" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $profile->mobile_no }}" placeholder="">
                                                             </div>                            
                                                            
                                                    </div><div class="col-4"></div>
                                                    </div></div>

                                                  <div class="col-xl-6 col-sm col-md">
                                                      <div class=""></div>
                                                      <p class="mt-5" style="font-size: 13px;">Existing address</p>
                                                      <hr class="linebrk">
                                                      <div class="card rounded-0 ">
                                                          <div class="card-body row">
                                                            <div class="col-8">
                                                            <p class="card-title" style="font-size: 12px;">Home Address</p>
                                                               <p class="card-text text-muted" style="font-size: 12px;"> {{ $profile->street }},
                                                                {{ $profile->city }}, {{ $profile->state }}, {{ $profile->country }}
                                                                    
                                                                    <input type="hidden" name="street" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $profile->street }}" placeholder="">
    
                                                                    <input type="hidden" name="city" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $profile->city }}" placeholder="">
    
                                                                    <input type="hidden" name="state" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $profile->state }}" placeholder="">
    
                                                                    <input type="hidden" name="country" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $profile->country }}" placeholder="">

                                                                </p></div>
                                                            <div class="col-4 justify-content-end"><i class="far fa-check-circle"></i></div>
                                                            </div>


                                                                                                           
                                                      </div>
                                                      
                                                            <p class="mt-3" style="font-size: 12px;"><a href="#" style="color: #66a45f;"> <i class="fas fa-plus">   Add new address</i></a></p>
                                                          
                                                    <div class="row">
                                                        <div class="col-8" style="font-size: 13px;">
                                                                        <div class="form-group">
                                                                          <label for="exampleInputEmail1">Old password</label>
                                                                          <input name="old_password" type="password"  value="***********************************" class="form-control" id="exampleInputPassword1" aria-describedby="emailHelp" placeholder="old password">
                                                                         </div>
                                                                        <div class="form-group">
                                                                          <label for="exampleInputPassword1">New password</label>
                                                                          <input name="new_password" type="password" class="form-control" id="exampleInputPassword2" placeholder="new password">
                                                                        </div>
                                                                        <div class="form-group">
                                                                                <label for="exampleInputEmail1">Confirm password</label>
                                                                                <input name="new_password_confirmation" type="password" class="form-control" id="exampleInputPassword2" aria-describedby="emailHelp" placeholder="confirm password">
                                                                         </div>                                                                                                

                                                        </div><div class="col-4"></div>
                                                    </div>
                                                  </div>
                                                  <div class="container bg-light">
                                                        <div class="row">
                                                            <div class="col-8">

                                                            </div>
                                                            <div class="col-4 d-flex flex-row justify-content-around">
                                                                <p class="text-center my-4" style="font-size: 12px;">CANCEL</p>
                                                                <button type="submit" class="btn btn-warning .btn-sm my-3 text-white" style="height: 40px;font-size:12px;">SAVE & CONTINUE</button>
                                                            </div>
                                                        </div> 
                                                  </div>
                                              </div>
                                             

                                          </div>
                                        </form>