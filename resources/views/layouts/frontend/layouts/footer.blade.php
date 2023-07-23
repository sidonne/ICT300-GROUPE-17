<footer>
	<div class="container">
		<div class="row">
			<div class="col-lg-7 footer-grid-agileits-w3ls text-left">
				<h3>About US</h3>
				<p>Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. lacinia eget consectetur sed, convallis at
					tellus..</p>
				<div class="read">
					<a href="single.html" class="btn btn-primary read-m">Read More</a>
				</div>
			</div>
			<!-- subscribe -->
			<div class="offset-lg-1 col-lg-4 subscribe-main footer-grid-agileits-w3ls text-left">
				<h2>Signup to our newsletter</h2>
				<div class="subscribe-main text-left">
					<div class="subscribe-form">
						<form action="{{ route('subscriber.store') }}" method="post" class="subscribe_form">
							@csrf
							<input class="form-control" type="email" name="email" placeholder="Enter your email..." />
							<button type="submit" class="btn btn-primary submit">Submit</button>
						</form>
						<div class="clearfix"></div>
					</div>
					<p>We respect your privacy.No spam ever!</p>
				</div>
				<!-- //subscribe -->
			</div>
		</div>
		<!-- footer -->
		<div class="footer-cpy text-center">
			<div class="footer-social">
				<div class="copyrighttop">
					<ul>
						<li class="mx-3">
							<a class="facebook" href="#">
								<i class="fab fa-facebook-f"></i>
								<span>Facebook</span>
							</a>
						</li>
						<li>
							<a class="facebook" href="#">
								<i class="fab fa-twitter"></i>
								<span>Twitter</span>
							</a>
						</li>
						<li class="mx-3">
							<a class="facebook" href="#">
								<i class="fab fa-google-plus-g"></i>
								<span>Google+</span>
							</a>
						</li>
						<li>
							<a class="facebook" href="#">
								<i class="fab fa-pinterest-p"></i>
								<span>Pinterest</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="w3layouts-agile-copyrightbottom">
				<p>
					© 2018 Weblog. All Rights Reserved
				</p>
			</div>
		</div>
	</div>

	<!-- //footer -->
</footer>