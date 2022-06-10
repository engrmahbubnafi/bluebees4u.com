@extends('layouts.master')
@section('content')
	<title>{{ $site_settings->site_title }}</title>
	<!-- Slider -->
	<x-banner :data-arr="$sliderData"></x-banner>
	<!-- Things You Get -->
	<section id="things_you_get">
		<div class="container text-center">
			<div class="row">
				<div class="col-md-12">
					<div class="section-heading">
						<h1>Who We Are?</h1>
						<p>We handle any of your social media marketing needs including content
							creation and publishing, social media advertising and social media monitoring. We are
							creative, artists, designers, social butterflies, writers, photographers, strategists.
							More than anything, we’re a curious group, always looking into the next thing. And we
							believe that’s the best way to be in this space. The only consistency we know is
							“change” and that’s the only way we like it. So when it comes to our best work, it
							typically comes from collaborating with clients that share our focus and passion.
							Understanding that the reward for creating something truly original doesn’t come without
							its risks of trying something new.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-6 col-sm-6">
					<div class="my-col p-4">
						<div class="mb-3 section-icon fa-2x" style='color: white'>
							<i class="fa fa-desktop"></i>
						</div>
						<div class="section-heading mt-2 customer-3box">
							<h4 class="text-capitalize" style='color: white'>Digital Services</h4>
						</div>
						<div class="seaction-paragraph">
							<p class="text-center" style='color: white'>We guide our clients to the best marketing
								platforms and share our first-hand experiences.</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-6">
					<div class="my-col p-4">
						<div class="mb-3 section-icon fa-2x">
							<i class="fa fa-phone"></i>
						</div>
						<div class="section-heading mt-2 customer-3box">
							<h4 class="text-capitalize" style='color: white'>360&deg Customer Support</h4>
						</div>
						<div class="seaction-paragraph">
							<p class="text-center" style='color: white'>Our transformation from traditional customer
								service to 360° customer support enhances the power of our clients.</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-6">
					<div class="my-col p-4">
						<div class="mb-3 section-icon fa-2x">
							<i class="fa fa-user"></i>
						</div>
						<div class="section-heading mt-2 customer-3box">
							<h4 class="text-capitalize" style='color: white'>Customer Satisfaction</h4>
						</div>
						<div class="seaction-paragraph">
							<p class="text-center" style='color: white'>Our endless customer support creates own
								characteristics of uniqueness which plays a vital role in customer satisfaction.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Services -->
	<section id="services" class="bg-light">
		<div class="container">
			<div class="row no-gutters">
				<div class="col-lg-6">
					<div class="services_info">
						<h1 class="section-heading">Customer Support</h1>
						<p>We will complete the needs of your customers through digital channels such as email, text
							messaging, chat, and social media messaging. Although it’s differentiated from
							traditional phone-based customer service, today, technologies like us exist to enable
							the integration of digital customer service with voice calls.</p>
						<!-- <a href="#" class="btn btn-primary">Register Now</a> -->
					</div>
				</div>
				<div class="col-lg-6">
					<div class="services_img">
						<img class="radius-img" src="{{ asset('images/customer-support-service.webp') }}"
							alt="Customer Support Service, BlueBees4U">
					</div>
				</div>
			</div>

			<div class="row no-gutters mt-1">
				<div class="col-lg-6">
					<div class="services_img">
						<img class="radius-img" src="{{ asset('images/telemarketing-service.webp') }}" alt="Telemarketing Service, BlueBees4U">
					</div>
				</div>
				<div class="col-lg-6 order-first order-lg-2">
					<div class="services_info">
						<h1 class="section-heading">Telemarketing</h1>
						<p>The practice of contacting, vetting, and approaching potential customers which can be
							beneficial for your business is included in our service with inbound, outbound, lead
							generation (collection of intelligence about the profiles, interests, and demographic
							data of potential customers) and sales.</p>
						<!-- <a href="#" class="btn btn-primary">Read More</a> -->
					</div>
				</div>
			</div>

			<div class="row no-gutters mt-1">
				<div class="col-lg-6">
					<div class="services_info">
						<h1 class="section-heading">Follow Up</h1>
						<p>Follow-up calls and mails make your customers feel important. It improves customer
							experience and builds strong customer relationships. When you follow-up your customers,
							it retains them, provides more sales opportunities and enhances communication. Thus, it
							brings you competitive advantage.</p>
						<!-- <a href="#" class="btn btn-primary">Read More</a> -->
					</div>
				</div>
				<div class="col-lg-6">
					<div class="services_img">
						<img class="radius-img" src="{{ asset('images/follow-up-service.webp') }}" alt="Follow Up Service, BlueBees4U">
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- If You Have Query Contact -->
	<section class="offer-section" id="special">
		<div class="container">
			<div class="row">
				<div class="col-12 col-lg-10 col-md-10">
					<div class="offer-content">
						<h1 class="section-heading1">If you have any query</h1>
						<h4 class="offer">we are available 24/7</h4>
					</div>
				</div>

				<div class="col-12 col-lg-2 col-md-2 col-xs-12">
					<a href="{{ route('contactUs') }}" class="btn btn-outline-info blue">Contact Us</a>
				</div>
			</div>
		</div>
	</section>

	<!-- This Is Why You Will Love -->
	<section id="about" class="bg-white">
		<div class="container">
			<div class="row">
				<div class="col-12 col-lg-6 col-sm-12">
					<div class="about_img mb-30-sm">
						<img class="radius-img" src="{{ asset('images/love-service.webp') }}" alt="Reasons to love our service, BlueBees4U">
					</div>
				</div>
				<div class="col-12 col-lg-6 col-sm-12">
					<div class="about">
						<h1 class="section-heading">This is why you will <br> love our service</h1>
						<p>
							We provide dedicated digital service for entrepreneurs along with <br>
							active call center including inbound and outbound calls. <br>
							Customer support specialists will be there for you with bilingual <br>
							support.
						</p>
						<ul class="list-item">
							<li><i class="far fa-check-square"></i> Email Communications</li>
							<li><i class="far fa-check-square"></i> Message and Comment Reply</li>
							<li><i class="far fa-check-square"></i> Business Feedback</li>
						</ul>
						<!-- <button class="btn btn-primary" type="button" onclick="document.location='chat.html'">Chat with us</button> -->
					</div>
				</div>

			</div>
		</div>
	</section>
	<!-- Features -->
	<section id="features">
		<div class="container">
			<div class="row">
				<div class="col-12 col-sm-12 col-lg-5">
					<div class="features_img">
						<img class="radius-img" src="{{ asset('images/features.webp') }}" alt="Features of BlueBees4U">
					</div>
				</div>
				<div class="col-12 col-sm-12 col-lg-6 offset-md-1">
					<div class="my-col p-4">
						<div class="media">
							<div class="media-body">
								<h4>Professional Service</h4>
								<p style='color: white'>With our dedication, you will be getting the professional
									support for the digital services you want.</p>
							</div>
						</div>
					</div>

					<div class="my-col p-4">
						<div class="media">
							<div class="media-body">
								<h4>Budget Friendly</h4>
								<p style='color: white'>We are offering bilingual supports for all of our
									individuals and businesses in your budget.</p>
							</div>
						</div>
					</div>

					<div class="my-col mb-0  p-4">
						<div class="media">
							<div class="media-body">
								<h4>24/7 Customer Support</h4>
								<p style='color: white'>Our trained customer support specialists will be serving you
									anytime you want.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Packages -->
	@foreach ($productsSectionsDatas as $key => $datas)
		<x-products :datas="$datas" :data-num="$loop->iteration"></x-products>
	@endforeach
	<!-- FAQ -->
	<section id="faq">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-heading text-center mb-5">
						<h1>Frequently Asked Questions</h1>
					</div>
				</div>
			</div>
			<div class="row">
				@foreach ($menu_settings as $data)
					@if ($data->location_id != 2)
						@continue
					@endif
					<div class="col-md-6">
						<div class="my-col  p-4">
							<div class="faq_info">
								<h5>{{ $data->name }}</h5>
								<p>{{ $data->description }} </p>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</section>
@endsection
