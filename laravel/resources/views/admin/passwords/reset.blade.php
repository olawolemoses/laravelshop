<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="Admin_login.css">

    <title>New Password</title>
  </head>
  <body>
   <div class="container">
     <div class="row">
     <div class="col-md-6 offset-md-3 pt-5 px-5">
     <div class="card bg-white text-center card-form">
       <div class="card-body px-4">
        <img class="py-5" src="images\loginlogo.png">
         <h4 class="text-muted py-1" style="font-size: 32px;">Password Reset</h4>
         <p class="text-muted" style="font-size: 16;">Please type in your password below</p><br>
         @include('includes.admin.validate')
         @include('includes.admin.status')
         <form method='post' action='/adminpassword'>
             @csrf
             <input type='hidden' name='token' value='{{$code}}'>
             <input type='hidden' name='username' value='{{$email}}'>
           <div class="form-group text-left">
            <label class="text-muted" style="font-size: 14px;">New Password</label>
            <input type="password" class="form-control form-control-lg" placeholder="enter new password" id="fonsize" name='password'></input>
           </div>
           <div class="form-group text-left">
              <label class="text-muted" style="font-size: 14px;">Confirm New Password</label>
              <input type="password" class="form-control form-control-lg" placeholder="confirm your new password" id="fonsize" name='password_confirmation'></input>
             </div>
   
           <input type="submit" class="btn btn-warning btn-block text-white" value="SIGN IN"></input>
          </form>
          <p class="pt-3"><span style="color:#a9a9a9;font-size: 14px;">Back to</span>  <a class="py-3" style="color:#66a45f;letter-spacing: 0.6;font-size: 14px;">Sign In</a></p>
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
  </body>
</html>