@include('includes.admin.admin_header')
  <body>
        <div class="row no-gutters">
         @include('includes.admin.nav')
            <div class="col-md-9 offset-md-3">
             @include('includes.admin.top')
              <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab"></div>
                <div class="tab-pane show active fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <div class="container">
                    <div class="container">
                             @include('includes.admin.status')
                                  @include('includes.admin.validate')
                            <p class="my-4" style="color: #5e5e5e;font-size: 20px;">Category ( 5 )</p>
                        <div class="row">
                             <div class="col mx-3 border text-center" style="width: 177px;height: 100px;background-color: white;">
                                <p style="padding-top:35px;font-size: 14px;color:#5e5e5e;">Shape wear (12 )</p>
                            </div>

                            <div class="col mx-3 border text-center" style="width: 177px;height: 100px;background-color: white;">
                                    <p style="padding-top:35px;font-size: 14px;color:#5e5e5e;">magnetics (10)</p>
                                </div>

                                <div class="col mx-3 border text-center" style="width: 177px;height: 100px;background-color: white;">
                                        <p style="padding-top:35px;font-size: 14px;color:#5e5e5e;">Slimming Gel  (10 )</p>
                                    </div>

                                    <div class="col mx-3 border text-center" style="width: 177px;height: 100px;background-color: white;">
                                            <p style="padding-top:35px;font-size: 14px;color:#5e5e5e;">Make up kit  (10 )</p>
                                        </div>
                                        <div class="col mx-3 border text-center" style="width: 177px;height: 100px;background-color: white;">
                                                <p style="padding-top:35px;font-size: 14px;color:#5e5e5e;"></p>
                                            </div>
                        </div>
                    </div>
       <div class="container">            
                    <p  class="my-5" style="font-size: 17px;color:#5e5e5e;">Edit Category</p>
               
                    <div class="container bg-white">
                    <div class="container">    <div style="height: 50px;"></div>
                        <form action=""  class="mb-5 ml-5 mr-5">
                        <div class="form-row" style="color:#5e5e5e;font-size: 14px;">
                                <div class="form-group col-md-6">
                                  <label for="inputTitle">Title</label>
                                  <input type="text" class="form-control" id="inputTitle" placeholder="">
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="inputDesc">Category Description</label>
                                  <input type="text" class="form-control" id="inputDesc" placeholder="">
                                </div>
                              </div></form>
                         
                       <div class="row justify-content-end mr-5">
                                    <a class="btn text-white" style="font-size:12px; width: 176px; height: 48px; background-color: #f9b13b; padding-top: 15px;">UPDATE CATEGORY</a>
                            </div>
                            <div style="height: 50px;"></div>
                    </div>
                            </div>
                
                </div>
            </div>
        </div>
                   
                </div>
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab"></div>
                <div class="tab-pane fade" id="v-pills-service" role="tabpanel" aria-labelledby="v-pills-service-tab">
                    
              
                </div>
                <div class="tab-pane fade" id="v-pills-product" role="tabpanel" aria-labelledby="v-pills-product-tab"></div>
                <div class="tab-pane fade" id="v-pills-user" role="tabpanel" aria-labelledby="v-pills-user-tab"></div>
                <div class="tab-pane fade" id="v-pills-contact" role="tabpanel" aria-labelledby="v-pills-contact-tab">...</div>
                <div class="tab-pane fade" id="v-pills-setting" role="tabpanel" aria-labelledby="v-pills-setting-tab">
                </div>
              </div>
            </div>
          </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
        <script src="service_management.js"></script>
  </body>
@include('includes.admin.admin_footer')