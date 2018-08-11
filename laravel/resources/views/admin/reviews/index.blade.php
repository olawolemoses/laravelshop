<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
      <link rel="stylesheet" href="{{asset('css/ratingz.css')}}">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <title>Admin</title>
  </head>
  <body>

        <div class="row no-gutters">
                @include('includes.admin.nav')
            <div class="col-md-9 offset-md-3">
              @include('includes.admin.top')
              @include('includes.admin.deleteReview')
              <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab"></div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab"></div>
                <div class="tab-pane show active fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">

                    <div class="row"><div class="col-10 offset-md-1"> 
                        <div style="height:60px;"></div>
                        <div class="row justify-content-center"><div class="col-10"> 
                                <div style="height:60px;"></div>
                                
                                @if(count($reviews) < 0)
                                   {{'No reviews yet'}}
                                @else
                                 @foreach($reviews as $review)
                            
                                <div class="accordion" id="accordionExample">
                                    <div class="card">
                                      <div class="card-header" id="headingOne">
                                        <h5 class="mb-0 row justify-content-between">
                                           
                                          <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="color: #4a4a4a;"> 
                                                <p style="font-size:14px;"><span><div class="mt-2 mr-1" style="float: left; width: 10px;
                                                    height: 10px;border-radius: 50%;
                                                    background-color:#7ed321;"></div></span>{{$review->user->name()}}</p>
                                          </button>
        
                                          <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="color: #4a4a4a;">
                                            {{$review->created_at}}
                                          </button>
        
                                          <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="color: #4a4a4a;"> 
                                            View
                                          </button>
                                        </h5>
                                      </div>
                                  
                                      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body ">
                                            <div class="row justify-content-between">                                             
                                           <div class="col-8"><p>{{$review->content}}</p></div>
                                             <div class=" col-4">                                          
                                                  <div class="row justify-content-around">
                                                     <i class="material-icons">
                                                            <a href="/deleteproductreview"  data-review_id="{{$review->id}}"  class="btn btn-danger buttonmodee" data-toggle="modal" data-target="#exampleModalCenter">
                                                                delete
                                                            </a>    
                                                      </i>
                                             </div></div>
                                             </div>
                                        </div>

                                      </div>
                                    </div>
                                  </div>
                                 
                                 @endforeach                                
                                 @endif
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
<script>
        $('#exampleModalCenter').on('show.bs.modal',function(event){
            var button = $(event.relatedTarget)
            var review_id = button.data('review_id')
            var modal = $(this)
            modal.find('.modal-body #review_id').val(review_id)
           // $('#delete-user-form').attr('action',"user/"+user_id)
        })  
</script>    