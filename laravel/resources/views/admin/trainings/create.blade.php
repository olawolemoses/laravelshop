@include('includes.admin.admin_header')
 <div class="row no-gutters">
        @include('includes.admin.nav')
            <div class="col-md-9 offset-md-3">
                <div class="container">
             @include('includes.admin.top')
             </div>
              <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab"></div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab"></div>
                <div class="tab-pane show active fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                    <div class="row"> <div class="col-10 offset-md-1">    <div class="container bg-white mt-5 bord">
                        <div style="height: 10px;"></div>
                   <div class="container"><p class="pt-4" style="font-size: 20px;color:#4a4a4a;">Create Training</p></div>
                        <div class="row">
                            <div class="col-6">
                        <form style="font-size: 14px;letter-spacing: 0.6px;" action="/addtraining" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="form-group col mt-1">
                                  <label for="inputProductName"  style="font-size: 14px;color: #4a4a4a;"> Training Title</label>
                                  <input type="text" class="form-control form-control-lg" id="inputProductName" placeholder="" name="training_title">
                             </div>
                            
                            <div class="form-group col">
                                        <label for="inputProductPrice"  style="font-size: 14px;color: #4a4a4a;">Training Certificate List</label>
                                        <textarea class="form-control form-control-lg" id="inputPrice" placeholder="" name="training_certificate_list">
                                    </textarea>   
                            </div>
                            <div class="form-group col">
                                    <label for="inputPrice"  style="font-size: 14px;color: #4a4a4a;">Students Benefits</label>
                                    <textarea class="form-control form-control-lg" id="inputPrice" placeholder="" name="training_students_benefits">
                                    </textarea>    
                            </div>
                            <div class="container"><div class="row  my-3"><button class="btn btn-warning text-white" style="font-size: 14px; width: 143px;
                            height: 42px;border-radius: 0;">CREATE</button></div></div>
                            </div>
                        <div class="col-6">
                            <div class="form-group col">
                                <label for="inputPrice">Instructor</label>
                                <input type="text" class="form-control form-control-lg form-control-lg" id="inputPrice" placeholder="" name="instructor">
                              </div> 
                              <div class="col">
                              </div>
                              <div class="form-group col">
                                      <label for="inputCategory"  style="font-size: 14px;color: #4a4a4a;">Training Date</label>
                                      <input type="datetime-local" class="form-control form-control-lg" id="inputCategory" placeholder="" name="training_date">
                            </div>
                            <div class="form-group col mt-1">
                                  <label for="inputProductName"  style="font-size: 14px;color: #4a4a4a;">Duration</label>
                                  <input type="text" class="form-control form-control-lg" id="inputProductName" placeholder="" name="duration">
                            </div>
                              <div class="form-group col">
                                    <label for="exampleFormControlFile1" style="font-size: 14px;color: #4a4a4a;">Training image</label>
                                   <input type="file" class="form-control-file " id= "exampleFormControlFile1" name="training_image">
                                </div>  
                        </div>
                        </div><div style="height:10px;"></div>
                        
                            <div style="height:20px;"></div>
                    </div>
                    </form>
                </div></div>
                </div>
                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab"></div>
                <div class="tab-pane fade" id="v-pills-product" role="tabpanel" aria-labelledby="v-pills-product-tab">
              
                </div>
                <div class="tab-pane fade" id="v-pills-user" role="tabpanel" aria-labelledby="v-pills-user-tab">
                
                </div>
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
    <script src="{{asset('add_training.js')}}"></script>
@include('includes.admin.admin_footer')