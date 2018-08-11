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
                    @include('includes.admin.status')
                    <div class="container">
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
                    <div class="container"> <div class="container my-4" style="font-size: 14px;">
                        <div class="row justify-content-between">
                            <p style="font-size: 20px; border-bottom:3px solid #66a45f;" class="text-muted">Main Category</p>
                            <a class="btn text-white" style="font-size:12px;width:176px;height:48px; padding-top:13px;background-color: #f9b13b;" href="/addcategory" role="button">ADD CATEGORY</a>
                        </div>
                    </div></div>
                   <div class="container"> <div class="container mb-0 bg-white py-4 px-5 text-muted border" style="font-size: 14px;">
                        <div class="row justify-content-between">
                               
                           <form class="form-inline">
                                <form class="form-inline">
                                        <label for="inlineFormCustomSelectPref" class="pr-3">Show</label>
                                        <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                          <option selected>Choose...</option>
                                          <option value="1">One</option>
                                          <option value="2">Two</option>
                                          <option value="3">Three</option>
                                        </select></form>
                                        <div class="form-inline">
                                          <label for="inputPassword6">Search</label>
                                          <input type="password" id="inputPassword6" class="form-control mx-sm-3" aria-describedby="passwordHelpInline">
                                        </div>
                                      </form>
                                      
                                 
                        </div>
                    </div></div>
                    <div class="container">
                    <table class="table  text-muted" style="font-size: 14px;">
                            <thead class="thick">
                              <tr class="table-borderless bg-light">
                                <th scope="col">S/N</th>
                               
                               
                                <th scope="col">Category Name</th>
                              
                                <th scope="col">Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr class="bg-white">
                                <th scope="row">1</th>
                           
                            
                                <td>Shapewear</td>
                              
                                <td>
                                    <div class="row justify-content-around">

                                            <button type="button" class="btn btn-danger buttonmodee" data-toggle="modal" data-target="#exampleModalCenter">
                                                    Delete<i class="fas fa-trash pl-1"></i>
                                                     </button>
                                                     
                                        
                                        <a class="btn btn-success buttonmodee" href="edit_category.html" role="button">Edit<i class="far fa-edit pl-1"></i></a>
                                       
                    
 
    
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header border-0">
               
                <button type="button" class="invisible" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                   <div class="row justify-content-center">   <i class="material-icons mb-3" style="font-size:78px !important; color:red;">
                              cancel
                              </i></div>
              <p style="font-size: 17px;" class="text-center text-muted">Do you want to delete This service</p>
              <p class="text-center text-muted" style="font-size:14px;">
                  Deleting this service will lorem Lorem<br> ipsum dolor sit amet,<br> consectetur adipiscing 
              </p>
              </div>
              <div class="row justify-content-center">
              <div class="modal-footer border-0">
                <button type="button" class="btn btn-light text-muted btn-lg" data-dismiss="modal" style="font-size: 12px;">CANCEL</button>
                <button type="button" class="btn btn-warning text-white btn-lg" style="font-size: 12px;"s>DELETE</button>
              </div></div>
            </div>
          </div>
        </div>
                                    </div>
                                </td>
                              </tr>
                              <tr>
                                <th scope="row">2</th>
                               
                        
                                <td>Magnetic brushes </td>
                              
                                <td> <div class="row justify-content-around">
                                     
                                        <button type="button" class="btn btn-danger buttonmodee" data-toggle="modal" data-target="#exampleModalCenter">
                                                Delete<i class="fas fa-trash pl-1"></i>
                                                 </button>
                                                 
                                    
                                    <a class="btn btn-success buttonmodee" href="edit_category.html" role="button">Edit<i class="far fa-edit pl-1"></i></a>
                                             
                                           
                                             <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                 <div class="modal-dialog modal-dialog-centered" role="document">
                                                   <div class="modal-content">
                                                     <div class="modal-header border-0">
                                                      
                                                       <button type="button" class="invisible" data-dismiss="modal" aria-label="Close">
                                                         <span aria-hidden="true">&times;</span>
                                                       </button>
                                                     </div>
                                                     <div class="modal-body">
                                                          <div class="row justify-content-center">   <i class="material-icons mb-3" style="font-size:78px !important; color:red;">
                                                                     cancel
                                                                     </i></div>
                                                     <p style="font-size: 17px;" class="text-center text-muted">Do you want to delete This service</p>
                                                     <p class="text-center text-muted" style="font-size:14px;">
                                                         Deleting this service will lorem Lorem<br> ipsum dolor sit amet,<br> consectetur adipiscing 
                                                     </p>
                                                     </div>
                                                     <div class="row justify-content-center">
                                                     <div class="modal-footer border-0">
                                                       <button type="button" class="btn btn-light text-muted btn-lg" data-dismiss="modal" style="font-size: 12px;">CANCEL</button>
                                                       <button type="button" class="btn btn-warning text-white btn-lg" style="font-size: 12px;"s>DELETE</button>
                                                     </div></div>
                                                   </div>
                                                 </div>
                                               </div>
                                    </div></td>
                              </tr>
                              <tr class="bg-white">
                                <th scope="row">3</th>
                                
                                <td>Make up kit</td>
                           
                                <td> <div class="row justify-content-around">
                                        <button type="button" class="btn btn-danger buttonmodee" data-toggle="modal" data-target="#exampleModalCenter">
                                                Delete<i class="fas fa-trash pl-1"></i>
                                                 </button>
                                                 
                                    
                                    <a class="btn btn-success buttonmodee" href="edit_category.html" role="button">Edit<i class="far fa-edit pl-1"></i></a>
                       
                         <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                             <div class="modal-dialog modal-dialog-centered" role="document">
                               <div class="modal-content">
                                 <div class="modal-header border-0">
                                  
                                   <button type="button" class="invisible" data-dismiss="modal" aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                   </button>
                                 </div>
                                 <div class="modal-body">
                                      <div class="row justify-content-center">   <i class="material-icons mb-3" style="font-size:78px !important; color:red;">
                                                 cancel
                                                 </i></div>
                                 <p style="font-size: 17px;" class="text-center text-muted">Do you want to delete This service</p>
                                 <p class="text-center text-muted" style="font-size:14px;">
                                     Deleting this service will lorem Lorem<br> ipsum dolor sit amet,<br> consectetur adipiscing 
                                 </p>
                                 </div>
                                 <div class="row justify-content-center">
                                 <div class="modal-footer border-0">
                                   <button type="button" class="btn btn-light text-muted btn-lg" data-dismiss="modal" style="font-size: 12px;">CANCEL</button>
                                   <button type="button" class="btn btn-warning text-white btn-lg" style="font-size: 12px;"s>DELETE</button>
                                 </div></div>
                               </div>
                             </div>
                           </div>
                                    </div></td>
                              </tr>
                              <tr>
                                    <th scope="row">4</th>
                                  
                            
                                    <td>Slimming gel</td>
                                 
                                    <td>
                                            <div class="row justify-content-around">
                                                   
                                                    <button type="button" class="btn btn-danger buttonmodee" data-toggle="modal" data-target="#exampleModalCenter">
                                                            Delete<i class="fas fa-trash pl-1"></i>
                                                             </button>
                                                             
                                                
                                                <a class="btn btn-success buttonmodee" href="edit_category.html" role="button">Edit<i class="far fa-edit pl-1"></i></a>
                                                       
                                                         <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                             <div class="modal-dialog modal-dialog-centered" role="document">
                                                               <div class="modal-content">
                                                                 <div class="modal-header border-0">
                                                                  
                                                                   <button type="button" class="invisible" data-dismiss="modal" aria-label="Close">
                                                                     <span aria-hidden="true">&times;</span>
                                                                   </button>
                                                                 </div>
                                                                 <div class="modal-body">
                                                                      <div class="row justify-content-center">   <i class="material-icons mb-3" style="font-size:78px !important; color:red;">
                                                                                 cancel
                                                                                 </i></div>
                                                                 <p style="font-size: 17px;" class="text-center text-muted">Do you want to delete This service</p>
                                                                 <p class="text-center text-muted" style="font-size:14px;">
                                                                     Deleting this service will lorem Lorem<br> ipsum dolor sit amet,<br> consectetur adipiscing 
                                                                 </p>
                                                                 </div>
                                                                 <div class="row justify-content-center">
                                                                 <div class="modal-footer border-0">
                                                                   <button type="button" class="btn btn-light text-muted btn-lg" data-dismiss="modal" style="font-size: 12px;">CANCEL</button>
                                                                   <button type="button" class="btn btn-warning text-white btn-lg" style="font-size: 12px;"s>DELETE</button>
                                                                 </div></div>
                                                               </div>
                                                             </div>
                                                           </div>
                                                </div>
                                    </td>
                                  </tr>
                                  <tr class="bg-white">
                                        <th scope="row">5</th>
                                   
                                        
                                        <td>Butt pump</td>
                           
                                        <td> <div class="row justify-content-around">
                       
                                                <button type="button" class="btn btn-danger buttonmodee" data-toggle="modal" data-target="#exampleModalCenter">
                                                        Delete<i class="fas fa-trash pl-1"></i>
                                                         </button>
                                                         
                                            
                                            <a class="btn btn-success buttonmodee" href="edit_category.html" role="button">Edit<i class="far fa-edit pl-1"></i></a>
                                             
                                           
                                             <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                 <div class="modal-dialog modal-dialog-centered" role="document">
                                                   <div class="modal-content">
                                                     <div class="modal-header border-0">
                                                      
                                                       <button type="button" class="invisible" data-dismiss="modal" aria-label="Close">
                                                         <span aria-hidden="true">&times;</span>
                                                       </button>
                                                     </div>
                                                     <div class="modal-body">
                                                          <div class="row justify-content-center">   <i class="material-icons mb-3" style="font-size:78px !important; color:red;">
                                                                     cancel
                                                                     </i></div>
                                                     <p style="font-size: 17px;" class="text-center text-muted">Do you want to delete This service</p>
                                                     <p class="text-center text-muted" style="font-size:14px;">
                                                         Deleting this service will lorem Lorem<br> ipsum dolor sit amet,<br> consectetur adipiscing 
                                                     </p>
                                                     </div>
                                                     <div class="row justify-content-center">
                                                     <div class="modal-footer border-0">
                                                       <button type="button" class="btn btn-light text-muted btn-lg" data-dismiss="modal" style="font-size: 12px;">CANCEL</button>
                                                       <button type="button" class="btn btn-warning text-white btn-lg" style="font-size: 12px;"s>DELETE</button>
                                                     </div></div>
                                                   </div>
                                                 </div>
                                               </div>
                                    </div></td>
                                      </tr>
                            </tbody>
                          </table></div>
                          <div class="container">
                          <nav aria-label="...">
                                <ul class="pagination justify-content-end" style="font-size: 14px;">
                                        <li class="page-item active ml-2">
                                                <span class="page-link">
                                                  1
                                                  <span class="sr-only">(current)</span>
                                                </span>
                                              </li> 
                                  <li class="page-item ml-2"><a class="page-link text-success" href="#">2</a></li>                               
                                  <li class="page-item ml-2"><a class="page-link text-success" href="#">3</a></li>
                                  <li class="page-item">
                                    <a class="page-link text-success ml-2" href="#">...</a>
                                  </li>
                                </ul>
                              </nav>
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