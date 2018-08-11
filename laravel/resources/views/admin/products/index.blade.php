@include('includes.admin.admin_header')
  <div class="row no-gutters">
     @include('includes.admin.nav')
            <div class="col-md-9 offset-md-3">
               @include('includes.admin.top')
               @include('includes.admin.deleteProduct')
              <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab"></div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab"></div>
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab"></div>
                <div class="tab-pane fade" id="v-pills-service" role="tabpanel" aria-labelledby="v-pills-service-tab"></div>
                <div class="tab-pane fade show active" id="v-pills-product" role="tabpanel" aria-labelledby="v-pills-product-tab">
                    <div class="container"> <div class="container mt-4" style="font-size: 14px;">
                        <div class="row justify-content-between">
                            <p style="font-size:20px;" class="text-muted">Product management</p>
                            <a class="btn btn-success" style="font-size: 12px; width: 176px;height:48px; padding-top:13px;" href="/addproduct" role="button">ADD PRODUCT</a>
                    </div>
                    </div></div>
                   <div class="container"> <div class="container my-4 bg-white py-4 px-5 text-muted border" style="font-size: 14px;">
                        <div class="row justify-content-between">
                               
                           <form class="form-inline" method='get' action='/productsearch'>
                                        <div class="form-group">
                                          <label for="inputPassword6">Filter By Product Name</label>
                                          <input type="text" id="inputPassword6" class="form-control mx-sm-3" aria-describedby="passwordHelpInline" name='product_name'>
                                        </div>
                            </form>
                                      
                            <form class="form-inline" method="get" action="/productnumber">
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
                    <table class="table table-striped table-bordered text-muted" style="font-size: 14px;">
                            <thead class="thick thead-light table-borderless">
                              <tr>
                                <th scope="col">#ID</th>
                                <th scope="col">Product Title</th>
                                <th scope="col">Price ( $ ) </th>
                                <th scope="col">Category</th>
                                <th scope="col">Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                    @if(count($products) > 0)
				  	@foreach($products as $product )  
                    <tr>
                        <td>{{$product->id}}</td>
                    	<td>{{$product->product_name}}</td>
                        <td>{{$product->product_price}}</td>
                        <td>{{$product->cat_id}}</td>
                        <td>
                        <div class="row justify-content-around">
                         <a class="btn btn-success buttonmode" href="/editproduct/{{$product->id}}" role="button"><i class="far fa-edit"></i>Edit</a>
                         <a href="/deleteproduct"  data-product_id="{{$product->id}}"  data-toggle="modal" data-target="#exampleModalCenter">
                                         Delete<i class="fas fa-trash"></i>
                         </a>
                        </div>
                        </td>
        
                    </tr>
				  	@endforeach
				  	@else
                     <tr>
				  <td colspan="6">{{'No Products'}}</td>
		             </tr>
                    @endif
                         
                            </tbody>
                          </table></div>
                          <div class="container">
                          <nav aria-label="...">
                                <ul class="pagination justify-content-end" style="font-size: 14px;">
                                    {{$products->links()}}
                                        
                                </ul>
                              </nav></div>
                </div>
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
    <script src="{{asset('js/product_managment.js')}}" ></script>
 @include('includes.admin.admin_footer')
 <script>
        $('#exampleModalCenter').on('show.bs.modal',function(event){
            var button = $(event.relatedTarget)
            var product_id = button.data('product_id')
            var modal = $(this)
            modal.find('.modal-body #product_id').val(product_id)
           // $('#delete-user-form').attr('action',"user/"+user_id)
        })  
</script>        