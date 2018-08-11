@include('includes.header2')


<link rel="stylesheet" href="/css2/cancel_order.css">
<style>
   .form-control {
    width: 100%;
    border: solid 1px #ebebf2;
    border-radius: 0;
}
</style>

<div class="container-fluid xxp">


    <div class="row justify-content-center mt-5 mb-5">
     
        <div class="col-md-3  bg-white">

           <div style="margin-top:38px;margin-bottom:26px;">
             <div class="row justify-content-center">
                 <img src="images/ic-cancel.png" alt="">
             </div>
           </div>


            <p class="text-center" style="font-size: 24px;color:#5e5e5e;margin-bottom:77px;">CANCEL ORDER</p>
    <p class="px-3" style="font-size:14px;color:#5e5e5e;line-height:21px;">NOTE: Cancellations do not guarantee a refund, if you need a refund, please make arrangments with our admin before cancelling the transaction</p>
            
        <form method="post" action="{{ route('order.confirm_cancel', ['order'=>$order]) }}">@csrf
            <div class="px-3">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1" style="font-size:14px;color:#5e5e5e;">Reason</label>
                                <textarea name="reason" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
            </div>


            <div class="mx-3 my-3"  style="background-color:#f9b13b;">
              <button type='submit' style="text-decoration:none;"><span class="text-center py-3 trans" style="font-size:12px;font-weight:600;color:white;">CANCEL ORDER</span></button>
            </div>
        </form>

        </div>
       
    </div>
</div>

@include("includes.footer")
 

 <!-- Optional JavaScript -->
 <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
 <script src="/js/main.js"></script>
 <script type="text/javascript" src="/js/booking_details.js"></script>
</body>
</html>