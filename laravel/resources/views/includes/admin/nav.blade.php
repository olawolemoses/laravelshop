   <div class="col-md-3 position-fixed  p-0" id="sidebar" style="z-index:2;background-color: #061b32;height:100%;font-size: 14px;">
                <div class="row justify-content-center"> <img  class="my-5" src="{{asset('images/profile.png')}}" alt=""></div>
                
              <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link text-white pl-5 mb-2 py-2 active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="material-icons float-left pr-3">assessment</i>Dashboard</a>
                <a class="nav-link text-white pl-5 mb-2 py-2" id="v-pills-profile-tab" href="/admin-productorderz" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="material-icons float-left pr-3">
                        shopping_cart
                        </i>Order management</a>
              <a class="nav-link text-white pl-5 mb-2 py-2" id="v-pills-messages-tab"  href="/admin-trainingz" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="material-icons float-left pr-3">
                        school
                        </i>Trainings</a>
                <a class="nav-link text-white pl-5 mb-2 py-2" href="/services"><i class="material-icons float-left pr-3">
                        insert_invitation
                        </i>Service management</a>
                        <a class="nav-link text-white pl-5 mb-2 py-2" href="/admin-products"><i class="material-icons float-left pr-3">
                            local_offer
                            </i>Product management</a>
                         <ul class="list-group">
                            <a class="nav-link text-white pl-5 mb-2 pt-2"><i class="material-icons float-left pr-3">
                                     local_offer
                              </i>Reviews</a>
                              <ul class="list_st">
                             <li class="list-group-item"><a href="/admin-productreviewz">Product Review</a></li>
                             <li class="list-group-item"><a href="#">Service Review</a></li>
                   
                            </ul>
                      
                           </ul>  
                        <a class="nav-link  text-white pl-5 mb-2 py-2 removeborder" id="v-pills-user-tab"  href="/admin-users" role="tab" aria-controls="v-pills-user" aria-selected="false"><i class="material-icons float-left pr-3">
                                group
                                </i>User management</a>
                                <div style="height: 60px;"></div>
                                <a class="nav-link text-white pl-5 mb-2 py-2" id="v-pills-contact-tab" data-toggle="pill" href="#v-pills-contact" role="tab" aria-controls="v-pills-contact" aria-selected="false"><i class="material-icons float-left pr-3">
                                        forum
                                        </i>Contact support</a>
                                        <a class="nav-link text-white pl-5 mb-2 py-2" href="/settings/{{Auth::user()->id}}"><i class="material-icons float-left pr-3">
                                                settings
                                                </i>Settings</a>
                                <hr class="type"> 
              </div>
            </div>