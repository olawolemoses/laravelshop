@include('includes.admin.admin_header')
 <div class="row no-gutters">
        @include('includes.admin.nav')
            <div class="col-md-9 offset-md-3">
             @include('includes.admin.top')
              <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab"></div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab"></div>
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab"></div>
                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab"></div>
                <div class="tab-pane fade show active" id="v-pills-product" role="tabpanel" aria-labelledby="v-pills-product-tab">
               <div class="row">
                    <div class="col-10 offset-md-1">  
                     @include('includes.admin.status')
                     @include('includes.admin.validate')
                    <div class="container bg-white mt-5">
                        <div style="height: 10px;"></div>
                   <div class="container">     <p class="pt-4" style="font-size: 20px;color:#4a4a4a;">Add Product</p></div>
                        <div class="row">
                            <div class="col-6">
    <form style="font-size: 14px;letter-spacing: 0.6px;" method="POST"  action="/addproduct"  enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col">
                                  <label for="inputProductName">Product name</label>
                                  <input type="text" class="form-control" id="inputProductName"  placeholder="Product Name" name="product_name">
                        </div>
                        <div class="form-group col">
                                      <label for="inputCategory">Product Category</label>
                                       <select class="form-control" name = "category_id" value="">
			                        	@foreach($categories as $category)
                                       <option value="{{$category->id}}" >{{ $category->name }}</option>
			                        	@endforeach
			                            </select>
                         </div>
                        <div class="form-group col">
                                                <label for="exampleFormControlTextarea1">Product description</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"  name="product_description"></textarea>
                        </div>   
                        <div class="form-group col">
                                        
                                            <label for="exampleFormControlFile1">Product image</label>
                                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="product_image">
                        </div>  
                          <div class="col" id='product_upload' style="width:100%;height:100%">
                                          
                            </div>
                        </div>
                        <div class="col-6">
                                <div class="form-group col">
                                        <label for="inputProductPrice">Product price</label>
                                        <input type="text" class="form-control" id="inputProductPrice" placeholder=""  name="product_price">
                                      </div>
                                  <div class="form-group col">
                                        <label for="inputProductPrice">Product Stock</label>
                                        <input type="text" class="form-control" id="inputProductPrice" placeholder=""  name="stock">
                                  </div>
                                     <div class="form-group col">
                                                <label for="exampleFormControlTextarea1">Product Details</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"  name="product_details"></textarea>
                                     </div> 
                                        <div class="form-group col">
                                                <label for="exampleFormControlTextarea1">Additional Information</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"  name="additional_information"></textarea>
                                        </div> 
                                        <div class="form-group col">
                                        <input type="submit" value="Create Product" class="btn btn-success" id="inputProductPrice" >
                                      </div>
                                     </form>
                        </div>
                        </div><div style="height: 30px;"></div>
                    </div>
                    
                </div>
              </div>
            </div>
          </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <script src="{{asset('js/add_product.js')}}"></script>
@include('includes.admin.admin_footer')
<script>
$("input").change(function(e) {

    for (var i = 0; i < e.originalEvent.srcElement.files.length; i++) {
        
        var file = e.originalEvent.srcElement.files[i];
        
        var img = document.createElement("img");
        var reader = new FileReader();
        reader.onloadend = function() {
             img.src = reader.result;
          
        }
        reader.readAsDataURL(file);
        $("#product_upload").html(img);
    }
});

</script>
