
<?php  
@include('inc/header.php');
@include('inc/navbar.php');
?>

	<!-- Wrapper -->
	<div class="wrapper">

		<!-- Section Started Heading -->
		<div class="section section-inner started-heading">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

						<!-- titles -->
						<div class="h-titles">
							<div class="h-title splitting-text-anim-2 scroll-animate" data-splitting="chars" data-animate="active">Contact Us</div>
						</div>

					</div>
				</div>
			</div>
		</div>

		<!-- Section Image Large -->
		<div class="section section-inner m-image-large scrolla-element-anim-1 scroll-animate" data-animate="active">
			<div class="image">
				<div class="img js-parallax" style="background-image: url(assets/images/crowd\ digital\ contact\ us.jpg);"></div>
			</div>
		</div>

		<!-- Section Contacts Form -->
		<div class="section section-inner m-contacts-form">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">

						<!-- titles -->
						<div class="m-titles">
							<div class="m-title scrolla-element-anim-1 scroll-animate" data-animate="active">Get in touch</div>
						</div>

						<!-- contact form -->
						<div class="contacts-form">
							<form id="cform" method="post" action="mailer/feedback.php">
								<div class="group full">
									<div class="value scrolla-element-anim-1 scroll-animate" data-animate="active">
										<input type="text" name="name" placeholder="Name" />
									</div>
								</div>
								<div class="group full">
									<div class="value scrolla-element-anim-1 scroll-animate" data-animate="active">
										<input type="text" name="email" placeholder="Email Address" />
									</div>
								</div>
								<div class="group full">
									<div class="value scrolla-element-anim-1 scroll-animate" data-animate="active">
										<input type="number" name="phone" placeholder="Phone Number" />
									</div>
								</div>
								<div class="group full">
									<div class="value scrolla-element-anim-1 scroll-animate" data-animate="active">
										<textarea name="message" placeholder="Message"></textarea>
									</div>
								</div>
								<div class="submit scrolla-element-anim-1 scroll-animate" data-animate="active">
									<a href="#" class="btn" onclick="$('#cform').submit(); return true;">
										Send a Message
									</a>
								</div>
							</form>
							<div class="alert-success" style="display: none;">
								<p>Thanks, your message is sent successfully.</p>
							</div>
						</div>

					</div>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">

							<!-- titles -->
							<div class="m-titles">
								<h2 class="m-title scrolla-element-anim-1 scroll-animate" data-animate="active">Contact info</h2>
							</div>

							<!-- services -->
							<div class="services-items row">

								<div class="services-col col-xs-12 col-sm-6 col-md-6 col-lg-4">
									<div class="services-item scrolla-element-anim-1 scroll-animate" data-animate="active">
										<div class="icon">
											<i aria-hidden="true" class="fas fa-phone-alt"></i>
										</div>
										<div class="name">Phone:</div>
										<div class="text">201016882221 <br> 201030599915</div>
									</div>
								</div>

								<div class="services-col col-xs-12 col-sm-6 col-md-6 col-lg-4">
									<div class="services-item scrolla-element-anim-1 scroll-animate" data-animate="active">
										<div class="icon">
											<i aria-hidden="true" class="fas fa-at"></i>
										</div>
										<div class="name">E-mail:</div>
										<div class="text">Info@crowd.com.eg</div>
									</div>
								</div>

								<div class="services-col col-xs-12 col-sm-6 col-md-6 col-lg-4">
									<div class="services-item scrolla-element-anim-1 scroll-animate" data-animate="active">
										<div class="icon">
											<i aria-hidden="true" class="fab fa-font-awesome-flag"></i>
										</div>
										<div class="name">Location:</div>
										<div class="text">10027 AL MERAG, FLOOR 6, UNIT A6, <br>ZAHRAA AL MAADI,CAIRO</div>
									</div>
								</div>

							</div>

					</div>
				</div>
			</div>
		</div>

	</div>

<?php    
@include('inc/footer.php');
@include('inc/script.php');
?>

