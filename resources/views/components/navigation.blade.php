<section class="mj-nav-section clearfix">
	<div class="mj-nav-container clearfix">
		<nav class="navbar navbar-expand-lg navbar-light" data-spy="affix" data-offset-top="205" id="mj_nav"> <!-- fixed-top -->
			<div class="nav-bdy-content">
		  		<div class="nav-container-logo navbar-nav mr-auto ">
		  			<a href="/" class="logo-container-anchor">
		  				<img src="images/logo.png">
		  			</a>
		  		</div>
		  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		    		<span class="navbar-toggler-icon"></span>
		  		</button>
		  		<div class="collapse navbar-collapse" id="navbarNavDropdown">
				    <ul class="navbar-nav ml-auto">
						<li class="nav-item active">
							<a class="nav-link nav-link-a nav-cont active" href="/">Home <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link nav-link-a nav-cont dropdown-toggle" href="/services">Services</a>
							<div class="Secondary-nav">
								@foreach ($services as $service)
									<a class="dropdown-item" href="#">{{ $service->value }}</a>
								@endforeach
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link nav-link-a nav-cont" href="/about">About</a>
						</li>
						<li class="nav-item">
							<a class="nav-link nav-link-a nav-cont dropdown-toggle">Links</a>
							<div class="Secondary-nav">
								<a class="dropdown-item" href="/team">Our Team</a>
								<a class="dropdown-item" href="/blog">Blog</a>
								<a class="dropdown-item" href="/contact-us">Contact Us</a>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link nav-link-a btn nav-btn" href="#">Book Online</a>
						</li>
						@if(Auth::user())
							<li class="nav-item">
								<a class="nav-link nav-link-a nav-cont dropdown-toggle" href="#">{{ Auth::user()->name }}</a>
								<div class="Secondary-nav">
									<a class="dropdown-item" onclick="event.preventDefault();document.getElementById('logoutForm').submit();">Log Out</a>
								</div>
							</li>
							@include('forms.logout')
						@else
							<li class="nav-item ">
								<a class="nav-link nav-link-a nav-login" href="#" data-toggle="modal" data-target="#Loginmodel">Login</a>
							</li>
							<li class="nav-item ">
								<a class="nav-link nav-link-a nav-signup" href="#" data-toggle="modal" data-target="#signupmodel">Sign Up</a>
							</li>
						@endif
					</ul>
			  	</div>
			</div>
		</nav>
		<!--Login  Modal -->
		<div class="modal  fade mg-model " id="Loginmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
						<div class="mj-model-header">
							<div class="mj-model-header-logo">
								<img src="images/logo.png">
							</div>
							<span class="mj-modelspan">
								Connect with majestic cleaning pros for better cleaning services 
							</span>
						</div>
						<div class="mj-model-bdy">
							<div class="mj-social-login">
								<a href="#" class="btn mj-model-btn mj-btn-fb ">
									<span class="mj-model-btn-icon">
										<i class="fa fa-facebook"></i>
									</span>
									Log in with Facebook
								</a>
								<a href="#" class="btn mj-model-btn mj-btn-google">
									<span class="mj-model-btn-icon">
										<i class="fa fa-google"></i>
									</span>
									Log in with Google
								</a>
							</div>
							<div class="mj-divder">
								<div>OR </div>
							</div>
							<div class="mj-login-form">
								<div class="row">
									<div class="col-12">
										<input type="email" name="email" class="mj-model-input" placeholder="Email">
									</div>
									<div class="col-12">
										<input type="Password" name="password" class="mj-model-input" placeholder="Password">
									</div>
									<div class="col-12">
										<a href="#" class="btn mg-btn-primary mj-modelbtn">Log In</a>
									</div>
								</div>
							</div>
							<div class="mj-model-footer">
								<div class="mj-pvc-p">
									<a href="#" class="mj-fpanchor">Forgot Password?</a>
									
								</div>
								<div class="mj-anchorfooter">
									<a href="#" data-dismiss="modal" data-toggle="modal" data-target="#signupmodel">I dont have account | Signup</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade mg-model" id="signupmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
						<div class="mj-model-header">
							<div class="mj-model-header-logo">
								<img src="images/logo.png">
							</div>
							<span class="mj-modelspan">
								Connect with majestic cleaning pros for better cleaning services 
							</span>
						</div>
						<div class="mj-model-bdy">
							<div class="mj-social-login">
								<a href="#" class="btn mj-model-btn mj-btn-fb ">
									<span class="mj-model-btn-icon">
										<i class="fa fa-facebook"></i>
									</span>
									Signup with Facebook
								</a>
								<a href="#" class="btn mj-model-btn mj-btn-google">
									<span class="mj-model-btn-icon">
										<i class="fa fa-google"></i>
									</span>
									Signup with Google
								</a>
							</div>
							<div class="mj-divder">
								<div>OR </div>
							</div>
							<div class="mj-login-form">
								<div class="row">
									<div class="col-12">
										<input type="text" name="name" class="mj-model-input" placeholder="Name">
									</div>
									<div class="col-12">
										<input type="text" name="phone" class="mj-model-input" placeholder="Phone">
									</div>
									<div class="col-12">
										<input type="email" name="email" class="mj-model-input" placeholder="Email">
									</div>
									<div class="col-12">
										<input type="Password" name="password" class="mj-model-input" placeholder="Password">
									</div>
									<div class="col-12">
										<a href="#" class="btn mg-btn-primary mj-modelbtn">Sign Up</a>
									</div>
								</div>
							</div>
							<div class="mj-model-footer">
								<div class="mj-pvc-p">
									<!-- <a href="#" class="mj-fpanchor">Forgot Password?</a> -->
									<p>
										By signing up, you agree to Classmonks 
										<a href="#"> Terms &amp; condition</a> 
										and 
										<a href="#">Privacy Policy</a>
									</p>
								</div>
								<div class="mj-anchorfooter">
									<a href="#" data-dismiss="modal" data-toggle="modal" data-target="#Loginmodel">I already have an account | login</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>