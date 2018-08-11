@include('includes.header')
<div class="container-fluid" style="background: url('img/backback.png') no-repeat center center / cover; min-height: 140vh;">
   	
		<div class="row">
			

				<div class="col-md-4 offset-md-4">

					<div class="credential">
						
						<span>FORGOT PASSWORD</span>

                        <p style="text-align: left;">
                        	Enter yor account email to recieve a link allowing you to reset your password
                        </p>

						<div class="row" style="margin-top: 30px;">
							
								<div class="col-md-12">
								    
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    
								    
								   <form method="POST" action="{{ route('password.email') }}">@csrf

									<label for="">Email</label>
                                    <input id="username" type="email" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required>

									<button type="submit" class="btn col-md-4 offset-md-4">REQUEST RESET</button>

									<p>Return to <a href="{{ route('login') }}">Sign in</a></p>
								  </form>
								</div>
								

							
						</div>

					</div>
					

					
					

				</div>


		</div>


   </div>
@include('includes.footer')