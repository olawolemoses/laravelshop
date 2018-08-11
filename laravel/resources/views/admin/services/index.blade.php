@include('includes.admin.admin_header')
       <div class="row no-gutters">
           @include('includes.admin.nav')
            <div class="col-md-9 offset-md-3">
             @include('includes.admin.top')
              @include('includes.admin.deleteModal')
              <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab"></div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab"></div>
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab"></div>
                <div class="tab-pane fade show active" id="v-pills-service" role="tabpanel" aria-labelledby="v-pills-service-tab">
                  <div class="container"> <div class="container mt-4" style="font-size: 14px;">
                    <div class="row justify-content-between">
                        <p style="font-size: 20px;" class="text-muted">Service management</p>
                           @include('includes.admin.status')
                        <a class="btn btn-success" style="font-size:12px;width:176px;height:48px; padding-top:13px;" href="/addservice" role="button">ADD SERVICE</a>
                    </div>
                </div></div>
               <div class="container"> <div class="container my-4 bg-white py-4 px-5 text-muted border" style="font-size: 14px;">
                    <div class="row justify-content-between">
                  
                        <form class="form-inline" method="get" action="/servicesearch">
                                    <div class="form-group">
                                      <label for="inputPassword6">Filter by Title</label>
                                      <input type="text" id="inputPassword6" class="form-control mx-sm-3" aria-describedby="passwordHelpInline" name='service_name' onchange="this.form.submit()">
                                    </div>
                         </form>
                        <form class="form-inline" method="get" action="/servicenumber" >
                                  <label for="inlineFormCustomSelectPref" class="pr-3">Show</label>
                                  <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name='numberofresults' id='numberofresults' onchange="this.form.submit()">
                                    <option selected>Choose...</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                  </select>
                        </form>
                </div>
                </div></div>
                <div class="container">
                <table class="table table-bordered text-muted" style="font-size: 14px;">
                        <thead class="thick">
                          <tr class="table-borderless bg-light">
                            <th scope="col">#ID</th>
                            <th scope="col">Service Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                        @if(count($services) > 0)    
                            @foreach($services as $service)
                             <tr>
                                <td>{{$service->id}}</td> 
                                <td>{{$service->service_name}}</td> 
                                <td>{{$service->service_description}}</td> 
                                <td> <div class="row justify-content-around">
                                  <a class="btn btn-success buttonmodee" href="/editservice/{{$service->id}}" role="button"><i class="far fa-edit"></i>Edit</a>
                                    <a href="/deleteservice"  data-service_id="{{$service->id}}"  class="btn btn-danger buttonmodee" data-toggle="modal" data-target="#exampleModalCenter">
                                         Delete<i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td> 
                             </tr>
                            @endforeach
                        @else
                          <tr>
                              <td colspan='4'>{{'No Services'}}</td>
                          </tr>
                        @endif  
                        </tbody>
                      </table></div>
                      <div class="container">
                      <nav aria-label="...">
                            <ul class="pagination justify-content-end" style="font-size: 14px;">
                                 {{$services->links()}}
                            </ul>
                          </nav>
                        </div>
                </div>
                <div class="tab-pane fade" id="v-pills-product" role="tabpanel" aria-labelledby="v-pills-product-tab"></div>
                <div class="tab-pane fade" id="v-pills-user" role="tabpanel" aria-labelledby="v-pills-user-tab"></div>
                <div class="tab-pane fade" id="v-pills-contact" role="tabpanel" aria-labelledby="v-pills-contact-tab">...</div>
                <div class="tab-pane fade" id="v-pills-setting" role="tabpanel" aria-labelledby="v-pills-setting-tab">
                </div>
              </div>
            </div>
          </div>
@include('includes.admin.admin_footer')
<script>
        $('#exampleModalCenter').on('show.bs.modal',function(event){
            var button = $(event.relatedTarget)
            var service_id = button.data('service_id')
            var modal = $(this)
            modal.find('.modal-body #service_id').val(service_id)
           // $('#delete-user-form').attr('action',"user/"+user_id)
        })  
    //  $('.delete-user').on('click', function () {
    //$('#delete-user-form').attr('action', $(this).data('user_id'));
    
    /** $(document).ready(function(){
          $('#login').onChange(function(e){
            e.preventDefault();
            $.ajaxSetup({
              headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
            $.ajax({
              url:"{{url('/servicenumber')}}",
              method:'get',
              data:{
                name:jQuery('#resultcount').val(),
               // type:jQuery('#password').val()
              },
              success:function(result){
                console.log(result);
              },
              error:function(result)
              {
                $("#cul").text(result.responseJSON.cul)
              }
            });
          });
        });**/
    
</script>