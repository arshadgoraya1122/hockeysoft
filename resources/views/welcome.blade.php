@extends('layouts.home')
@section('content')
		<!-- Start Slider Are -->
		<header class="slider">
			<!-- <div class="swiper-container parallax-slider swiper-container-initialized swiper-container-horizontal"> -->
			
				<!-- <div class="swiper-wrapper" style="">

					<div class="swiper-slide" data-swiper-slide-index="1" style="width: 1665px;"> -->
							<div class="hero-section bg-img valign" data-background="hockeysoft_files/slider-2.jpg" data-overlay-dark="5" data-swiper-parallax="1248.75" style="background-image: url({{$slider->background_image ?? ''}});">
								<div class="container">
									<div class="row">
											<div class="col-lg-8 offset-lg-2 col-md-12">
												<div class="caption">
													<h1>{{$slider->title ?? ''}}</h1>
													<p>{!! $slider->description ?? '' !!}</p>

												</div>
											</div>
									</div>
								</div>
							</div>
					<!-- </div>

			</div> -->
				<!-- slider setting -->

			<!-- <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span> -->
	<!-- </div> -->
	</header>
  <!-- End Slider Area -->
	 	<!-- Start About Section -->
	<section class="about-area section-padding">
		<div class="container">
			<div class="row d-flex align-items-center">
				<div class="col-lg-6 col-md-12 col-sm-12">
					<div class="about-content">
						<div class="about-content-text">
							<p style="color: #37a9df;">{{$about->title ?? ''}}</p > 
							<h2>{{$about->heading ?? ''}}</h2>
						{!! $about->detail ?? '' !!}
						</div>
					</div>
				</div>
				<div class="col-lg-5 offset-lg-1 col-md-12 col-sm-12">
					<div class="about-image">
						<img src="{{asset($about->image ?? '')}}" alt="About image">
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End About Section -->
	
	<!-- Start Services Section -->
	<section class="services-section bg-grey section-padding">
		<div class="container">
            <div class="row">
                <div class="col-sm-12">
					<div class="section-title">
						<h5>{{$s_heading->title ?? ''}}</h5>
						<h2>{{$s_heading->heading ?? ''}}</h2>
					</div>
                </div>
            </div>
			<div class="row">
				@if(count($order) > 0)
				@foreach($order as $sv)
				@foreach ($s_item as $item)
					@if($sv == $item->id)
					<div class="col-lg-4 col-md-6">
						<div class="single-services-item">
							<div class="services-icon">
								<i class="{{$item->icon ?? ''}}"></i>
							</div>
							<h3>{{$item->title ?? ''}}</h3>
							<p>{!! $item->description ?? ''!!}</p>
							<div class="services-btn-link">
								<a href="https://cutesolution.com/html/techone/#" class="services-link">Read More</a>
							</div>
						</div>
					</div>
					@endif
				@endforeach
				@endforeach
				@else
					@foreach ($s_item as $item)
						<div class="col-lg-4 col-md-6">
							<div class="single-services-item">
								<div class="services-icon">
									<i class="{{$item->icon ?? ''}}"></i>
								</div>
								<h3>{{$item->title ?? ''}}</h3>
								<p>{!! $item->description ?? ''!!}</p>
								<div class="services-btn-link">
									<a href="https://cutesolution.com/html/techone/#" class="services-link">Read More</a>
								</div>
							</div>
						</div>
					@endforeach
				@endif
			</div>
		</div>
	</section>
	<!-- End Services Section -->
	
	<!-- Start Counter Section -->
	<section class="counter-area section-padding">
		<div class="container">
				<div style="text-align: center;">
					<h2>{!! $banner->heading ?? '' !!}</h2>
						<br>
						<img src="{{asset($banner->image ?? '')}}" class="white-logo" alt="logo">
				</div>
		</div>
	</section>
	<!-- End Counter Section -->
	
	<!-- Start Project Section -->
    <section class="project-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
					<div class="section-title">
						<h5>{{$portfolio_h->title ?? ''}}</h5>
						<h2>{{$portfolio_h->heading ?? ''}}</h2>
					</div>
                </div>
					 @foreach ($portfolio as $p)
						        <!-- project-item -->
                <div class="col-lg-6 col-md-6">
                    <div class="project-item">
								<img src="{{asset($p->image ?? '')}}" alt="image">
									<div class="project-content-overlay">
										<span>{{$p->domain ?? ''}}</span>
										<h3>{{$p->title ?? ''}}</h3>
										<p>{!! $p->description ?? '' !!}</p>
										<a class="project-link-btn" href="https://cutesolution.com/html/techone/single-projects.html">View Project</a>
									</div>
                    </div>
                </div>
					 @endforeach
          
            
            </div>
        </div>
    </section>
    <!-- End Project Section -->
	
	<!-- Start Testimonial Section -->
	<section class="testimonial-section section-padding">
		<div class="container">
			<div class="row">
                <div class="col-md-12">
					<div class="section-title">
						<h5>{{$testimonial_h->title ?? ''}}</h5>
						<h2>{{$testimonial_h->heading ?? ''}}</h2>
					</div>
                </div>
				<div class="col-lg-12 col-md-12">
					<div class="testimonial-slider owl-carousel owl-theme owl-loaded owl-drag">
						<!-- testimonials item -->
						
						<!-- testimonials item -->
						
						<!-- testimonials item -->
						
					<div class="owl-stage-outer">
						<div class="owl-stage" style="transform: translate3d(-1883px, 0px, 0px); transition: all 1s ease 0s; width: 3391px;">
							@foreach ($testimonial as $t)
							<div class="owl-item cloned" style="width: 356.667px; margin-right: 20px;">
								<div class="single-testimonial">
									<div class="rating-box">
										<ul>
											@if($t->rating >= 1) <li><i class="fa fa-star"></i></li> @endif
											@if($t->rating >= 2) <li><i class="fa fa-star"></i></li> @endif
											@if($t->rating >= 3) <li><i class="fa fa-star"></i></li> @endif
											@if($t->rating >= 4) <li><i class="fa fa-star"></i></li> @endif
											@if($t->rating >= 5) <li><i class="fa fa-star"></i></li> @endif
										
										</ul>
									</div>
									<div class="testimonial-content">
										<p>{!! $t->detail ?? '' !!}</p>
									</div>
									<div class="avatar">
										<img src="{{asset($t->image ?? '')}}" alt="testimonial images">
									</div>
									<div class="testimonial-bio">
										<div class="bio-info">
											<h3>{{$t->name ?? ''}}</h3>
											<span>{{$t->designation ?? ''}}</span>
										</div>
									</div>
								</div>
							</div>
							@endforeach
				
				</div>
			</div>
			<div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><i class="fa fa-chevron-left"></i></button><button type="button" role="presentation" class="owl-next"><i class="fa fa-chevron-right"></i></button></div><div class="owl-dots disabled"><button role="button" class="owl-dot active"><span></span></button></div></div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Testimonial Section -->
	
	<!-- Start Hire Section -->
	<section class="hire-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 col-md-12">
					<div class="hire-content">
						<h5>{{$hire->title ?? ''}}</h5>
						<h2>{{$hire->heading ?? ''}}</h2>
						<p>{!! $hire->description ?? '' !!}</p>
						<div class="hire-btn">
							<a class="default-btn" href="{{$hire->link ?? ''}}">Get a Quote<span></span></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Hire Section -->
	
	<!-- Start Blog Section -->
	<section class="blog-section bg-grey pt-100 pb-70">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title">
						<h5>Our News Articles</h5>
						<h2>Our Recent News</h2>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="blog-item">
						<div class="blog-image">
							<a href="https://cutesolution.com/html/techone/single-blog.html">
								<img src="./hockeysoft_files/blog-1.jpg" alt="image">
							</a>
						</div>
						<div class="single-blog-item">
							<ul class="blog-list">
								
								<li>
									<a href="https://cutesolution.com/html/techone/#"> <i class="fas fa-calendar-week"></i>28 May 2023</a>
								</li>
							</ul>
							<div class="blog-content">
								<h3>
                                    <a href="https://cutesolution.com/html/techone/single-blog.html">
										New Referee Administration Provides Your Head of Officials With Full Scheduling Control!
                                    </a>
                                </h3>
								<p>Your Head of Officals will be very pleased with our new, multi-functional, customized administration tool created specifically...</p>
								<div class="blog-btn"> <a href="https://cutesolution.com/html/techone/single-blog.html" class="blog-btn-one">Read More</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="blog-item">
						<div class="blog-image">
							<a href="https://cutesolution.com/html/techone/single-blog.html">
								<img src="./hockeysoft_files/blog-2.jpg" alt="image">
							</a>
						</div>
						<div class="single-blog-item">
							<ul class="blog-list">
								<li>
									<a href="https://cutesolution.com/html/techone/#"> <i class="fas fa-calendar-week"></i>3 May 2023</a>
								</li>
							</ul>
							<div class="blog-content">
								<h3>
									<a href="https://cutesolution.com/html/techone/single-blog.html">
                                       New Automation Tools Allow for Easy Upload of Team, Player, Ref & Scheduling Information
                                    </a>
								</h3>
								<p>Administering your League Website has never been easier! We now provide you with easy-to-use automation tools, saving you...</p>
								<div class="blog-btn">
									<a href="https://cutesolution.com/html/techone/single-blog.html" class="blog-btn-one">Read More</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="blog-item">
						<div class="blog-image">
							<a href="https://cutesolution.com/html/techone/single-blog.html">
								<img src="./hockeysoft_files/blog-3.jpg" alt="image">
							</a>
						</div>
						<div class="single-blog-item">
							<ul class="blog-list">
								<li>
									<a href="https://cutesolution.com/html/techone/#"> <i class="fas fa-calendar-week"></i>22 April 2023</a>
								</li>
							</ul>
							<div class="blog-content">
								<h3>
                                    <a href="https://cutesolution.com/html/techone/single-blog.html">
                                        Official Team Websites Are Now Being Rolled-Out For MMJHL Member Clubs
                                    </a>
                                </h3>
								<p>We have begun rolling out MMJHL member club official websites. The St. Vital Victorias, Pembina Valley Twisters & St. Boniface Riels...</p>
								<div class="blog-btn"> <a href="https://cutesolution.com/html/techone/single-blog.html" class="blog-btn-one">Read More</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-lg-12 col-md-12">
					<div class="blog-more-btn">
						<a class="default-btn" href="https://cutesolution.com/html/techone/blog-1.html">View More News <span></span></a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Blog Section -->
	
	<!-- Start Footer & Subscribe Section -->
	<section class="footer-subscribe-wrapper">
		<!-- Start Subscribe Area -->
		<div class="subscribe-area">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-6 col-md-6">
						<div class="subscribe-content">
							<h2>{{$newsletter->title ?? ''}}</h2>
							<span class="sub-title">{{$newsletter->description ?? ''}}</span>
						</div>
					</div>
					<div class="col-lg-6 col-md-6">
						<form class="newsletter-form">
							<input type="email" class="input-newsletter" placeholder="Enter your email" name="EMAIL" required="" autocomplete="off">
							<button type="submit">Subscribe Now</button>
							<div id="validator-newsletter" class="form-result"></div>
							<!-- <div data-lastpass-icon-root="true" style="position: relative !important; height: 0px !important; width: 0px !important; float: left !important;"><template shadowrootmode="open"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" data-lastpass-icon="true" style="position: absolute; cursor: pointer; height: 22px; max-height: 22px; width: 22px; max-width: 22px; top: -36px; left: 511px; z-index: auto; color: rgb(215, 64, 58);"><rect x="0.680176" y="0.763062" width="22.6392" height="22.4737" rx="4" fill="currentColor"></rect><path fill-rule="evenodd" clip-rule="evenodd" d="M19.7935 7.9516C19.7935 7.64414 20.0427 7.3949 20.3502 7.3949C20.6576 7.3949 20.9069 7.64414 20.9069 7.9516V16.0487C20.9069 16.3562 20.6576 16.6054 20.3502 16.6054C20.0427 16.6054 19.7935 16.3562 19.7935 16.0487V7.9516Z" fill="white"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M4.76288 13.6577C5.68525 13.6577 6.43298 12.9154 6.43298 11.9998C6.43298 11.0842 5.68525 10.3419 4.76288 10.3419C3.8405 10.3419 3.09277 11.0842 3.09277 11.9998C3.09277 12.9154 3.8405 13.6577 4.76288 13.6577Z" fill="white"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M10.3298 13.6577C11.2521 13.6577 11.9999 12.9154 11.9999 11.9998C11.9999 11.0842 11.2521 10.3419 10.3298 10.3419C9.4074 10.3419 8.65967 11.0842 8.65967 11.9998C8.65967 12.9154 9.4074 13.6577 10.3298 13.6577Z" fill="white"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M15.8964 13.6577C16.8188 13.6577 17.5665 12.9154 17.5665 11.9998C17.5665 11.0842 16.8188 10.3419 15.8964 10.3419C14.974 10.3419 14.2263 11.0842 14.2263 11.9998C14.2263 12.9154 14.974 13.6577 15.8964 13.6577Z" fill="white"></path></svg></template></div> -->
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- End Subscribe Area -->
@endsection