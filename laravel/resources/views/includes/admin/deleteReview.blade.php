  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                             <div class="modal-dialog modal-dialog-centered" role="document">
                                               <div class="modal-content">
                                                 <div class="modal-header border-0">
                                                  
                                                   <button type="button" class="invisible" data-dismiss="modal" aria-label="Close">
                                                     <span aria-hidden="true">&times;</span>
                                                   </button>
                                                 </div>
                                                 <div class="modal-body">
                                                      <div class="row justify-content-center"><i class="material-icons mb-3" style="font-size:78px !important; color:red;">
                                                                 cancel
                                                                 </i></div>
                                                 <p style="font-size: 17px;" class="text-center text-muted">Do you want to delete this review</p>
                                                 <p class="text-center text-muted" style="font-size:14px;">
                                                    <!-- Deleting this product will lorem Lorem<br> ipsum dolor sit amet,<br> consectetur adipiscing -->
                                                     <form  action="/deletereview" method="get">
                                                          <input type='hidden' name='review_id' value='' id="review_id">
                                                           <button type="submit" class="btn btn-warning text-white btn-lg" style="font-size: 12px;"s>DELETE</button>
                                                           <button type="button" class="btn btn-light text-muted btn-lg" data-dismiss="modal" style="font-size: 12px;">CANCEL</button>
                                                     </form>
                                                 </p>
                                                 </div>
                                                 <div class="row justify-content-center">
                                                 <div class="modal-footer border-0">
                                                 </div></div>
                                               </div>
                                             </div>
</div>