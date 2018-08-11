@include('includes.admin.admin_header')
    <div class="row no-gutters">
     @include('includes.admin.nav')
            <div class="col-md-9 offset-md-3">
                @include('includes.admin.top')
                @include('includes.admin.status')
              <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">...</div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">...</div>
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
                <div class="tab-pane fade show active" id="v-pills-product" role="tabpanel" aria-labelledby="v-pills-product-tab">
               <div class="row"> <div class="col-10 offset-md-1"><div class="container bg-white mt-5 bord">
                 <div style="height: 10px;"></div>
                 @include('includes.admin.status')
                 <div class="container"><p class="pt-4" style="font-size: 20px;color:#4a4a4a;">Add a service</p></div>
                        <div class="row">
                       <div class="col-6">
                        <form style="font-size: 14px;letter-spacing: 0.6px;" action="/addservice"  enctype="multipart/form-data" method="POST">
                        @csrf
                                <div class="form-group col">
                                  <label for="inputServiceTitle">Service title</label>
                                  <input type="text" class="form-control" id="inputServiceTitle" placeholder="HD Pro Laser Liposuction"  name="service_name" >
                                </div>
                                <div class="form-group col">
                                 <label for="inputPriceItem">Price</label>
                                 <input type="text" class="form-control" id="inputPriceItem" placeholder="" name="service_price">
                                </div>
                        <div class="form-group col">
                             <label for="exampleFormControlFile1">Service image</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1" placeholder="" name="service_image">
                             </div>  
                            </div>
                        <div class="col-6">
                                <div class="form-group col">
                            <label for="exampleFormControlTextarea1">Product description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="service_description"></textarea>
                            </div>   
                        </div>
                        </div><div style="height: 30px;"></div>
                        <div class="container"> <div class="row justify-content-end my-3"> <input type='submit'value='CREATE SERVICE' class="btn btn-warning text-white" style="font-size: 14px;margin-bottom:10px;"></div></div>
                       </form>
                    </div>
                </div></div>
                </div>
                <div class="tab-pane fade" id="v-pills-user" role="tabpanel" aria-labelledby="v-pills-user-tab"> </div>
                <div class="tab-pane fade" id="v-pills-contact" role="tabpanel" aria-labelledby="v-pills-contact-tab">...</div>
                <div class="tab-pane fade" id="v-pills-setting" role="tabpanel" aria-labelledby="v-pills-setting-tab"></div>
              </div>
            </div>
          </div>
          
          
@include('includes.admin.admin_footer')

<script>
	$("input[type=file]").change(function(e) {

    for (var i = 0; i < e.originalEvent.srcElement.files.length; i++) {
        
        var file = e.originalEvent.srcElement.files[i];
        var img = document.createElement("img");
        var reader = new FileReader();
        reader.onloadend = function() {
             img.src = reader.result;
             img.width = 515;
        }
        reader.readAsDataURL(file);
        $("input").after(img);
    }
});

</script>