<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/Admin_login.css">

    <title>Admin_Login</title>
  </head>
  <body>
   <div class="container">
     <div class="row">
       @if (count($errors))
          <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: block !important;margin-bottom: 0px;"> 
            <ul>
            @foreach($errors->all() as $error)
                               
              <li> {{ $error }} </li>

            @endforeach
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </ul>
        </div>
        @endif


     <div class="col-md-6 offset-md-3 pt-5">
     <div class="card bg-white text-center card-form">
       <div class="card-body">
        <img class="py-5" src="img\loginlogo.png">
         <h4 class="text-muted py-1" style="font-size: 32px;">Hello, welcome back</h4>
         <p class="text-muted" style="font-size: 16;">Sign into your account</p><br>
         <form method="POST" action="/login">
          @csrf
           <div class="form-group text-left">
            <label class="text-muted" style="font-size: 14px;">Email Address</label>
            <input type="email" class="form-control form-control-lg" placeholder="yourname@email.com" id="fonsize" id="username" name="username" >
           </div>
           <div class="form-group text-left">
            <label class="text-muted" style="font-size: 14px;">Password</label>
             <input type="password" class="form-control form-control-lg" id="password" name="password"  placeholder="Your Password" required >
           </div>
           
           <span style="float: left;"><label class="switch">      
            <input type="checkbox">
            <span class="slider round"></span> 
          </label></span>
          <p class="text-muted" style="float:left">Remember me</p>
   
           <input type="submit" class="btn btn-warning btn-block text-white" value="SIGN IN"></input>
          </form>
          <a href="#"><p class="py-3" style="color:#66a45f;letter-spacing: 0.6;font-size: 14px;">I forgot my password</p></a>
       </div>
     </div>
    </div>

  </div>
   </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
 <!---Local Files-->

 <script src="../js/popper.js" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="../js/main.js"></script>


  </body>
</html>