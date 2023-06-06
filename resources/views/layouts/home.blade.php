<!DOCTYPE html>
<html lang="zxx" data-lt-installed="true">
	@php
		$footer = new \App\Http\Controllers\FrontController;
		$f= $footer->servics();
		$general= $footer->general();
		$menus= $footer->menu();
		$header= $footer->header();
	@endphp
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Required meta tags -->
	<meta name="title" content="{{ $header->meta_title ?? ''}}">
	<meta name="description" content="{{ $header->meta_description ?? ''}}">
	
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Title -->
	<title>Hockeysoft.tech</title>
	<!-- Google Fonts -->
	<link href="./hockeysoft_files/css2" rel="stylesheet">
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="https://cutesolution.com/html/techone/assets/img/favicon.png">
	<!-- Bootstrap Min CSS -->
	<link rel="stylesheet" href="./hockeysoft_files/bootstrap.min.css">
	<!-- Animate Min CSS -->
	<link rel="stylesheet" href="./hockeysoft_files/animate.min.css">
	<!-- FlatIcon CSS -->
	<link rel="stylesheet" href="./hockeysoft_files/et-line.css">
	<!-- Font Awesome Min CSS -->
	<link rel="stylesheet" href="./hockeysoft_files/fontawesome.min.css">
	<!-- Mean Menu CSS -->
	<link rel="stylesheet" href="./hockeysoft_files/meanmenu.css">
	<!-- Swiper Min CSS -->
	<link rel="stylesheet" href="./hockeysoft_files/swiper.min.css">
	<!-- Owl Carousel Min CSS -->
	<link rel="stylesheet" href="./hockeysoft_files/owl.carousel.min.css">
	<!-- Style CSS -->
	<link rel="stylesheet" href="./hockeysoft_files/style.css">
	<!-- Responsive CSS -->
	<link rel="stylesheet" href="./hockeysoft_files/responsive.css">
</head>

<body>

	<!-- Start Preloader Area -->
    <div id="preloader" style="display: none;">
        <div class="ctn-preloader" id="ctn-preloader" style="display: none;">
            <div class="animation-preloader">
                <div class="spinner"></div>
                <div class="txt-loading">
                    <span class="letters-loading" data-text-preloader="T"> T </span>
                    <span class="letters-loading" data-text-preloader="E"> E </span>
                    <span class="letters-loading" data-text-preloader="C"> C </span>
                    <span class="letters-loading" data-text-preloader="H"> H </span>
                    <span class="letters-loading" data-text-preloader="O"> O </span>
                    <span class="letters-loading" data-text-preloader="N"> N </span>
                    <span class="letters-loading" data-text-preloader="E"> E </span>
                </div>
            </div>
        </div>
    </div>
	<!-- End Preloader Area -->
	
	<!-- Start Navbar Area -->
	<div class="navbar-area">
	    <div class="techone-responsive-nav">
	        <div class="container">
	            <div class="techone-responsive-menu">
	                <div class="logo">
	                    <a href="https://cutesolution.com/html/techone/index.html">
	                        <img src="{{asset($header->logo1 ?? '')}}" class="white-logo" alt="logo">
	                        <img src="{{asset($header->logo2 ?? '')}}" class="black-logo" alt="logo">
	                    </a>
	                </div>
	            </div>
	        </div>
	    </div>
	    <div class="techone-nav">
	        <div class="container">
	            <nav class="navbar navbar-expand-md navbar-light">
	                <a class="navbar-brand" href="https://cutesolution.com/html/techone/index.html">
	                    <img src="{{asset($header->logo1 ?? '')}}" class="white-logo" alt="logo">
	                    <img src="{{asset($header->logo2 ?? '')}}" class="black-logo" alt="logo">
	                </a>
	                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent" style="display: block;">
						
	                    <ul class="navbar-nav">
					
	                       <li class="nav-item">
	                            <a href="https://cutesolution.com/html/techone/about.html" class="nav-link">Home</a>
	                        </li>		
	                        <li class="nav-item">
	                            <a href="https://cutesolution.com/html/techone/about.html" class="nav-link">About Us</a>
	                        </li>												
	                        <li class="nav-item">
	                            <a href="https://cutesolution.com/html/techone/#" class="nav-link">Services <i class="fas fa-chevron-down"></i></a>
	                            <ul class="dropdown-menu">
	                                <li class="nav-item">
	                                    <a href="https://cutesolution.com/html/techone/index.html" class="nav-link">Hockey League Software & Websites</a>
	                                </li>
	                                <li class="nav-item">
	                                    <a href="https://cutesolution.com/html/techone/index-2.html" class="nav-link">Hockey Team Software & Websites</a>
	                                </li>
	                                <li class="nav-item">
	                                    <a href="https://cutesolution.com/html/techone/index-2.html" class="nav-link">Hockey League & Team eShops</a>
	                                </li>
	                                <li class="nav-item">
	                                    <a href="https://cutesolution.com/html/techone/index-2.html" class="nav-link">Automations</a>
	                                </li>
	                                <li class="nav-item">
	                                    <a href="https://cutesolution.com/html/techone/index-2.html" class="nav-link">Quality Web Design Services</a>
	                                </li>
	                                <li class="nav-item">
	                                    <a href="https://cutesolution.com/html/techone/index-2.html" class="nav-link">Graphics Services & Logo Creation</a>
	                                </li>
	                                <li class="nav-item">
	                                    <a href="https://cutesolution.com/html/techone/index-2.html" class="nav-link">SEO Services</a>
	                                </li>
	                                <li class="nav-item">
	                                    <a href="https://cutesolution.com/html/techone/index-2.html" class="nav-link">Comprehensive Training</a>
	                                </li>
	                                <li class="nav-item">
	                                    <a href="https://cutesolution.com/html/techone/index-2.html" class="nav-link">Outstanding Technical Support</a>
	                                </li>
	                            </ul>
	                        </li>
	                        <li class="nav-item">
	                            <a href="https://cutesolution.com/html/techone/#" class="nav-link">Our Niche <i class="fas fa-chevron-down"></i></a>
	                            <ul class="dropdown-menu">
	                                <li class="nav-item">
	                                    <a href="https://cutesolution.com/html/techone/index.html" class="nav-link">Hockey Leagues</a>
	                                </li>
	                                <li class="nav-item">
	                                    <a href="https://cutesolution.com/html/techone/index-2.html" class="nav-link">Hockey Tournaments</a>
	                                </li>
	                                <li class="nav-item">
	                                    <a href="https://cutesolution.com/html/techone/index-2.html" class="nav-link">Hockey Teams</a>
	                                </li>
	                                <li class="nav-item">
	                                    <a href="https://cutesolution.com/html/techone/index-2.html" class="nav-link">Hockey Associations</a>
	                                </li>
	                                <li class="nav-item">
	                                    <a href="https://cutesolution.com/html/techone/index-2.html" class="nav-link">Hockey eShops</a>
	                                </li>
	                            </ul>
	                        </li>		
	                         <li class="nav-item">
	                            <a href="https://cutesolution.com/html/techone/#" class="nav-link">Projects </a>
	                        </li>		
	                        <li class="nav-item">
	                            <a href="https://cutesolution.com/html/techone/#" class="nav-link">News</a> </a>
	                        </li>		
	                        <li class="nav-item">
	                            <a href="https://cutesolution.com/html/techone/#" class="nav-link">Support</a> </a>
	                        </li>	
	                        <li class="nav-item">
	                            <a href="https://cutesolution.com/html/techone/#" class="nav-link">Contact</a> </a>
	                        </li>	
									@foreach($menus as $menu)
									<li class="nav-item">
											<a href="{{$menu->url ?? '#'}}" class="nav-link">{{$menu->name ?? ''}} @if($menu->submenu->count() > 0) <i class="fas fa-chevron-down"></i> @endif </a>
											@if($menu->submenu->count() > 0)
												<ul class="dropdown-menu">
													@foreach($menu->submenu as $submenu)
														<li class="nav-item">
															<a href="{{$submenu->link ?? '#'}}" class="nav-link">{{$submenu->name ?? ''}}</a>
														</li>
													@endforeach
												</ul>
											@endif
										</li>	
									@endforeach
	                    </ul>
	                    <div class="other-option">
	                        <a class="default-btn" href="{{$header->button_url ?? ''}}"> {{$header->button_text ?? '' }} <span style="top: 39px; left: -15.0391px;"></span></a>
	                    </div>
	                    {{-- <div class="other-option">
	                        <a class="default-btn" href="{{ route('login') }}">Login <span style="top: 39px; left: -15.0391px;"></span></a>
	                    </div> --}}
	                </div>
	            </nav>
	        </div>
	    </div>
	</div>
	<!-- End Navbar Area -->
	 @yield('content')
		
		<!-- Start Footer Area -->
		<div class="footer-area ptb-100">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-6">
						<div class="single-footer-widget">
							<a class="footer-logo" href="/">
								<img src="{{asset($header->logo1 ?? '')}}" class="white-logo" alt="logo">
							</a>
							<p>{!! $general->description ?? '' !!}</p>
							<ul class="footer-social">
								<li>
									<a href="{{$general->facebook ?? ''}}"> <i class="fab fa-facebook-f"></i></a>
								</li>
								<li>
									<a href="{{$general->twitter ?? ''}}"> <i class="fab fa-twitter"></i></a>
								</li>
								<li>
									<a href="{{$general->pinterest ?? ''}}"> <i class="fab fa-pinterest"></i></a>
								</li>
								<li>
									<a href="{{$general->linkedin ?? ''}}"> <i class="fab fa-linkedin"></i></a>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-lg-2 col-md-6">
						<div class="single-footer-widget">
							<div class="footer-heading">
								<h3>{{$f['cat_1'] ?? ''}}</h3>
							</div>
							<ul class="footer-quick-links">
								@foreach ($f['serv1'] as $s)
								<li><a href="{{$s->link}}">{{$s->name}}</a></li>
								@endforeach
							</ul>
						</div>
					</div>
					<div class="col-lg-2 col-md-6">
						<div class="single-footer-widget">
							<div class="footer-heading">
								<h3>{{$f['cat_2'] ?? ''}}</h3>
							</div>
							<ul class="footer-quick-links">
								@foreach ($f['serv2'] as $serv)
										<li><a href="{{$serv->link ?? ''}}">{{$serv->name ?? ''}}</a></li>
								@endforeach
								
							</ul>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="single-footer-widget">
							<div class="footer-heading">
								<h3>{{$general->heading ?? ''}}</h3>
							</div>
							<div class="footer-info-contact"> <i class="fa fa-mobile-screen-button"></i>
								<h3>Phone</h3>
								<span><a href="tel:0802235678">{{$general->phone ?? ''}}</a></span>
							</div>
							<div class="footer-info-contact"> <i class="fa fa-envelope"></i>
								<h3>Email</h3>
								<span><a href="mailto:demo@example.com">{{$general->email ?? ''}}</a></span>
							</div>
							<div class="footer-info-contact"> <i class="fa fa-home"></i>
								<h3>Address</h3>
								<span>{!! $general->address ?? '' !!}</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Footer Section -->
	</section>
	<!-- End Footer & Subscribe Section -->
	
	<!-- Start Copy Right Section -->
	<div class="copyright-area">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6 col-md-6">
					<p> <i class="far fa-copyright"></i> {!! $general->copy_rights ?? '' !!}</p>
				</div>
				<div class="col-lg-6 col-md-6">
					<ul>
						<li>{!! $general->footer_text  ?? '' !!}</i></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- End Copy Right Section -->
	
	<!-- Start Go Top Section -->
	<div class="go-top">
		<i class="fas fa-chevron-up"></i>
		<i class="fas fa-chevron-up"></i>
	</div>
	<!-- End Go Top Section -->
	
	<!-- jQuery Min JS -->
	<script src="./hockeysoft_files/jquery.min.js"></script>
	<!-- Popper Min JS -->
	<script src="./hockeysoft_files/popper.min.js"></script>
	<!-- Bootstrap Min JS -->
	<script src="./hockeysoft_files/bootstrap.min.js"></script>
	<!-- Mean Menu JS -->
	<script src="./hockeysoft_files/jquery.meanmenu.js"></script>
	<!-- Appear Min JS -->
	<script src="./hockeysoft_files/jquery.appear.min.js"></script>
	<!-- CounterUp Min JS -->
	<script src="./hockeysoft_files/jquery.waypoints.min.js"></script>
	<script src="./hockeysoft_files/jquery.counterup.min.js"></script>
	<!-- Owl Carousel Min JS -->
	<script src="./hockeysoft_files/owl.carousel.min.js"></script>
	<!-- Swiper Min JS -->
	<script src="./hockeysoft_files/swiper.min.js"></script>
	<!-- WOW Min JS -->
	<script src="./hockeysoft_files/wow.min.js"></script>
	<!-- Ajax Mail JS -->
	<script src="./hockeysoft_files/ajax.mail.js"></script>
	<!-- Main JS -->
	<script src="./hockeysoft_files/main.js"></script>
	


<img id="translator-icon" src="chrome-extension://pmlpcplomjofbnlcihpacmcaahellokg/icons/icon-128.png" style="display: none;"><div id="translator-container" style="display: none;">
<div class="rapid-header">
  <img src="chrome-extension://pmlpcplomjofbnlcihpacmcaahellokg/icons/logo.svg">
  <img id="rapid-copy" src="chrome-extension://pmlpcplomjofbnlcihpacmcaahellokg/icons/copy.svg">
</div><div id="rapid-text-wrapper"><span></span></div>

<div class="rapid-footer">
  <span id="rapid-first-language">ENG</span>
  <img id="rapid-arrow-icon" src="chrome-extension://pmlpcplomjofbnlcihpacmcaahellokg/icons/r-arrow.svg">
  <span id="rapid-second-language">FRN</span>
</div></div><div data-lastpass-root="" style="position: absolute !important; top: 0px !important; left: 0px !important; height: 0px !important; width: 0px !important;"><div data-lastpass-infield="true" style="position: absolute !important; top: 0px !important; left: 0px !important;"><template shadowrootmode="open"><div style="position: absolute; height: 100vh; width: 100vw; z-index: 2147483647; border-radius: 4px; top: 0px; left: 0px; max-height: 0px; max-width: 280px; min-width: auto; margin-top: 10px;"><div style="left: -1px; display: none; position: absolute; overflow: hidden; bottom: 100%; width: 20px; height: 10px;"><div data-lastpass-infield-caret="true" style="position: absolute; width: 16px; height: 16px; border-radius: 2px; border-color: rgb(213, 217, 222); border-style: solid; border-width: 1px 0px 0px 1px; box-sizing: border-box; top: 4px; left: 2px; background: linear-gradient(0deg, rgb(255, 219, 219) 10.47%, rgb(251, 235, 235) 6.47%); transform: rotate(45deg);"></div></div><iframe data-lastpass-iframe="true" allow="clipboard-write" src="chrome-extension://hdokiejnpimakedhajhdlcegeplioahd/webclient-infield.html" style="border: none; height: 100%; width: 100%;"></iframe></div></template></div></div></body></html>