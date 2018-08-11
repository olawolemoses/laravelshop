@include('includes.admin.admin_header')
 <div class="row no-gutters">
              @include('includes.admin.nav')
            <div class="col-md-9 offset-md-3">
                 @include('includes.admin.top')
              @include('includes.admin.deleteModal')
              <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab"></div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab"></div>
                <div class="tab-pane show active fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">

                    <div class="row"><div class="col-10 offset-md-1"> 
                        <div style="height:60px;"></div>
                        <div class="container">
                            <div class="container bg-white mx-3">
                                <div style="height: 30px;"></div>
                                 <div class="container mt-4" style="font-size: 14px;">
                                    <div class="row justify-content-between">
                                        <p style="font-size: 20px;" class="text-muted">Trainings</p>
                                        <a class="btn btn-success" style="font-size:12px;width:176px;height:48px; padding-top:13px;" href="/addtraining" role="button">ADD TRAINING</a>
                                    </div>
                                </div>
                                <div style="height:30px;"></div>
                                <table class="table table-bordered text-muted" style="font-size: 14px;"   >
                                        <thead class="bottom">
                                          <tr class="table-borderless bg-light">
                                            <th scope="col">Training</th>
                                            <th scope="col">Time</th>
                                            <th scope="col">Days</th>
                                            <th scope="col">Instructor</th>
                                     
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                             @if(count($trainings) > 0)
                                            @foreach($trainings as $training )
                                             <tr>
                                                <td>{{$training->training_title}}</td>
                                                <td>{{$training->training_date}}</td>
                                                <td>{{$training->training_duration}}</td>
                                                <td>{{$training->training_tutor}}</td>
                                         
                                                <td><a href="#"><i class="fa fa-eye"></i></a></td>
                                             </tr>
                                            @endforeach
                                            @else
                                            <tr>
                                                <td colspan="5">{{'No Trainings yet'}}</td>
                                            </tr>
                                            @endif
                                        </tbody>
                                      </table>
                                      <div style="height: 50px;"></div>                                                                
                                    </div>
    
                        </div>
                      </div>
                      </div>



                </div>
                <div class="tab-pane fade" id="v-pills-service" role="tabpanel" aria-labelledby="v-pills-service-tab"></div>
                <div class="tab-pane fade" id="v-pills-product" role="tabpanel" aria-labelledby="v-pills-product-tab"></div>
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
        <script src="{{asset('js/user_management.js')}}"></script>

@include('includes.admin.admin_footer')