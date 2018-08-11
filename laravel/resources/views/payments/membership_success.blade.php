@include("includes.header")

<link rel="stylesheet" href="/css2/training_invoice.css">

<style>
   .form-control {
    width: 100%;
    border: solid 1px #ebebf2;
    border-radius: 0;
}
</style>
<div class="container-fluid xxp">


    <div class="row justify-content-center mt-5 mb-5">
     
        <div class="col-md-3  bg-white whitee">

           <div style="margin-top:38px;margin-bottom:26px;">
             <div class="row justify-content-center">
                 <img src="/images/checked.png" alt="">
             </div>
           </div>


            <p class="text-center" style="font-size: 32px;color:#66a45f;margin-bottom:20px;font-weight:bold;">Payment confirmed</p>
    <p class="px-3 text-center" style="font-size:12px;color:#5e5e5e;line-height:21px;">
        Thank you, your payment has been successful and your booking is now confirmed. A confirmation email has been sent to {{ $user->username }}</p>
<div class="px-3">
            
           
                <p style="font-size:17px;color:#5e5e5e;font-weight:500;">Training summary</p>

                   <div class="bg-white mb-4" style="border:solid 1px #ebebf2;box-shadow:1px 2px 4px 0 rgba(94, 94, 94, 1);">  

                        <!---->
                        <div style="height:20px;"></div>
                       <div class="row">
                           <div class="col-4">
                                <p class="text-right paytext">Name</p>
                           </div>
                           <div class="col-8">
                               <p class="text-left paytexxt">{{ $user->profile->firstname }} {{$user->profile->lastname }}</p>
                           </div>
                       </div>

                        <!---->

                          <!---->
                          
                          <div class="row">
                           <div class="col-4">
                                <p class="text-right paytext">Ticket will be sent to</p>
                           </div>
                           <div class="col-8">
                               <p class="text-left paytexxt">{{ $user->username }}</p>
                           </div>
                       </div>


                         <!---->
                         <div class="row">
                           <div class="col-4">
                                <p class="text-right paytext">Total price</p>
                           </div>
                           <div class="col-8">
                               <p class="text-left paytexxt">${{ number_format($total, 2 ) }}</p>
                           </div>
                       </div>
                       
                         <div class="row">
                           <div class="col-4">
                                <p class="text-right paytext">Installment Payment</p>
                           </div>
                           <div class="col-8">
                               <p class="text-left paytexxt">${{ number_format($amount_paid, 2) }}</p>
                           </div>
                       </div>

                       <div style="height:10px;"></div>
                   </div>
 
            
</div>



        </div>
       
    </div>
</div>

@include('includes.footer')
<script type="text/javascript" src="/js/microbladtrain.js"></script>
@include('includes.livechat')
@include('includes.footer_end')    <!-- Optional JavaScript -->
