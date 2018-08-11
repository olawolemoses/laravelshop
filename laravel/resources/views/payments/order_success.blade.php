@include('includes.header')


<link rel="stylesheet" href="/css2/order_notify.css">
<style>
   .form-control {
    width: 100%;
    border: solid 1px #ebebf2;
    border-radius: 0;
}
</style>
<div class="container-fluid xxp">
    <div class="row justify-content-center mt-4 mb-5">
     
        <div class="col-md-3  bg-white">

           <div style="margin-top:38px;margin-bottom:26px;">
             <div class="row justify-content-center">
                 <img src="/images/checked.png" alt="">
             </div>
           </div>


            <p class="text-center" style="font-size: 32px;color:#333333;margin-bottom:20px;">Thank You</p>
    <p class="px-3" style="font-size:14px;color:#333333;line-height:21px;text-align: center;">Your order has been successfully registered with the number</p>
<div class="px-3">
<div style="heightr:48px;"></div>
    <p class="py-3" id="orderId">{{ $order_id }}</p>
    <div style="heightr:48px;"></div>
    <p id="tracktext">You can track your <a href='{{ route('profile.index', ['tab'=>'orders']) }}'>orders</a> here, or clicking on order on your dashboard menu.</p>
    <div style="heightr:90px;"></div>
</div>


        <div class="mx-3 my-3"  style="background-color:#f9b13b;">
          <a style="text-decoration:none;" href="{{ route('products') }}"><p class="text-center py-3 trans" style="font-size:12px;font-weight:600;color:white;">CONTINUE SHOPPING</p></a>
        </div>

        </div>
       
    </div>
</div>

@include('includes.footer')
@include('includes.livechat')
@include('includes.footer_end')
