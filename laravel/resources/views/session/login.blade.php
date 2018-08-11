@include('includes.header')
<div class="container-fluid" style="background: url('img/backback.png') no-repeat center center / cover; min-height: 140vh;">
   	
		<div class="row">
			

				<div class="col-md-4 offset-md-4">

					<div class="credential">
						
						<div class="row" style="padding-top: 10px;">
						
							<a href="/redirect/facebook" style="width: 100%;"><button class="btn btn-block auth" style="background: #4a67ad;"><i class="fa fa-facebook-square"></i>Login with Facebook</button></a>

							<a href="/redirect/google" style="width: 100%;"><button class="btn btn-block auth" style="background: #db3236;"><i class="fa fa-google"></i>Login with Google</button></a>

						</div>

						<div class="row" style="margin-top: 30px;color: #d8d8d8;">
							<div class="col-5"><hr></div>
							<div class="col-2 text-center">or</div>
							<div class="col-5"><hr></div>
						</div>

						<div class="row" style="margin-top: 30px;">
							
								<div class="col-md-12">
								    
                                    <div class="card-body">
                                        @if ($errors->count() > 0 )
                                            <div class="alert alert-danger" style="display:block">
                                                @foreach( $errors->all() as $error )
                                                   <li>{{ $error }}</li>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                    
                                    @if( $flash = session('status') )
                                    <div class="alert alert-success" style="display:block" role="alert">
                                        {{ $flash }}
                                    </div>
                                    @endif
                                    
								  <form action="{{ route('login') }}" method="post">@csrf
									<label for="">Username</label>
									<input name="username" type="text" class="form-control">

									<label for="">Password</label>
									<input name="password" type="password" class="form-control">

									<button type='submit' class="btn col-md-4 offset-md-4">SIGN IN</button>

									<p><a href="{{ route('password.email') }}">I forgot my password</a></p>

									<p>Don't have an account ? <a href="{{ route('register') }}">Sign up</a></p>
								  </form>
								</div>
								

							
						</div>

					</div>
					

					
					

				</div>


		</div>


   </div>

@include('includes.footer')