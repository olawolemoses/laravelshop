@include('includes.header')
<link rel="stylesheet" href="/css2/membership.css">
<div class="container-fluid xx">
    <div class="container">
        <!--title-->
        <div class="text-center down">
            <p class="title">Best Deals</p>
            <p class="title2">HONEYDROPS MEMBERSHIP</p>
            <hr>
        </div>

        <!--3 containers-->
        <div class="row justify-content-between top">
            <!---->
            <div class="col-md-3 bg-white text-center style">
                <p class="de"> SILVER </p>
                <p> <span style="position:relative;top:-20px;">$</span> <span style="color:#4a4a4a;font-size:54px;">40</span>  <span style="color:5e5e5e;font-size:20px;font-style:italic;font-family:FanwoodText;">/mo</span> </p>
                <hr class="sr">
                <div style="height:180px;">
                <p class="re">10% discount on all services and products</p>
            
                </div>
                <form action="{{ route('membership_payment_info', ['membership'=>1] ) }}" method="post">@csrf
                    <button type="submit" class="btn btn-warning text-white"> JOIN NOW </button>
                </form>
            </div>
            <!---->
            <div class="col-md-3 bg-white text-center style">
            <p class="de"> SILVER </p>
                <p> <span style="position:relative;top:-20px;">$</span> <span style="color:#4a4a4a;font-size:54px;">85</span>  <span style="color:5e5e5e;font-size:20px;font-style:italic;font-family:FanwoodText;">/mo</span> </p>
                <hr class="sr">
                <div style="height:180px;">
                <p class="re">25% discount on all services and products</p>
                <p class="re">VIP access to all spa Special events</p>
                <p class="re">2 free Laser Lipo sessions monthly</p>
                </div>
                <form action="{{ route('membership_payment_info', ['membership'=>2] ) }}" method="post">@csrf
                    <button type="submit" class="btn btn-warning text-white"> JOIN NOW </button>
                </form>
            </div>
            <!---->
            <div class="col-md-3 bg-white text-center style">
            <p class="de"> SILVER </p>
                <p> <span style="position:relative;top:-20px;">$</span> <span style="color:#4a4a4a;font-size:54px;">200</span>  <span style="color:5e5e5e;font-size:20px;font-style:italic;font-family:FanwoodText;">/mo</span> </p>
                <hr class="sr">
                <div style="height:180px;">
                <p class="re">15% discount on all services and products</p>
                <p class="re">1 free Laser Lipo Session monthly</p>
                </div>
                <form action="{{ route('membership_payment_info', ['membership'=>3] ) }}" method="post">@csrf
                    <button type="submit" class="btn btn-warning text-white"> JOIN NOW </button>
                </form>

            </div>
                
        </div>
    </div>
</div>

@include('includes.footer')
@include('includes.livechat')
@include('includes.footer_end')