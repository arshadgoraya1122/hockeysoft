<!doctype html>
<html lang="en">
	@php
		$footer = new \App\Http\Controllers\FrontController;
		$header= $footer->header();
	@endphp
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ config('app.name') }} - Admin Deshboard">
    <meta name="author" content="{{ config('app.name') }}">
	 <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} - Admin Deshboard</title>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('dashassets/dist/img/favicon.png') }}">
    <!--Global Styles(used by all pages)-->
    <link href="{{ asset('dashassets/plugins/bootstrap/css/bootstrap.min.css' ) }}" rel="stylesheet">
    <link href="{{ asset('dashassets/plugins/metisMenu/metisMenu.min.css' ) }}" rel="stylesheet">
    <link href="{{ asset('dashassets/plugins/fontawesome/css/all.min.css' ) }}" rel="stylesheet">
    <link href="{{ asset('dashassets/plugins/typicons/src/typicons.min.css' ) }}" rel="stylesheet">
    <link href="{{ asset('dashassets/plugins/themify-icons/themify-icons.min.css' ) }}" rel="stylesheet">
    <!--Third party Styles(used by this page)-->
    <link href="{{ asset('dashassets/plugins/emojionearea/dist/emojionearea.min.css' ) }}" rel="stylesheet">
    <link href="{{ asset('dashassets/plugins/datatables/dataTables.bootstrap4.min.css' ) }}" rel="stylesheet">
    <link href="{{ asset('dashassets/plugins/icheck/skins/all.css') }}" rel="stylesheet">
    <!--Start Your Custom Style Now-->
    @yield('styles')
    <link href="{{ asset('dashassets/dist/css/style.css' ) }}" rel="stylesheet">
    <link href="{{ asset('dashassets/dist/css/custom.css' ) }}" rel="stylesheet">
	 <style>
		.pointer-cursor {
			 cursor: pointer;
		}
  </style>

	
</head>

<body>

    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <div class="wrapper" style="height:100vh">
        <!-- Sidebar  -->
        <nav class="sidebar sidebar-bunker">
            <!--/.search-->
            <div class="sidebar-body">
                <nav class="sidebar sidebar-bunker">
                    <div class="sidebar-header" style="width:100%">
                        <div class="d-flex justify-content-center" style="width:inherit">
									<a href="{{ route('home') }}" class="logo img-fluid" target="_blank"><img src="{{ asset($header->logo1 ?? '') }}"
										alt=""></a>
								</div>
                    </div>
                    <!--/.sidebar header-->
                    <div class="profile-element d-flex align-items-center flex-shrink-0">
                        {{-- <div class="avatar online">
                            <img src="{{ asset('dashassets/dist/img/avatar.png') }}" class="img-fluid rounded-circle"
                                alt="">
                        </div> --}}
                        <div class="profile-text" style="width:100%;text-align: center;">
									<h6 class="m-0">{{ auth()->user()->name }}</h6>
                           <span>{{ auth()->user()->email }}</span>
                           
                        </div>
                    </div>
                    <div class="sidebar-body">
                        <nav class="sidebar-nav">
                            <ul class="metismenu">
                                <li class="nav-label">Main Menu</li>
                                <li class="mm-active"><a href="{{ route('dashboard') }}">
                                    <i class="typcn typcn-home-outline mr-2"></i>Dashboard</a>
                                </li>
                                {{-- <li class=""><a href="{{ route('contacts.index') }}">
                                    <i class="typcn typcn-book mr-2"></i>Contact Us</a>
                                </li> --}}
										  @role('Admin')
                                {{-- <li>
                                    <a class="has-arrow material-ripple" href="#">
                                        <i class="typcn typcn-pencil mr-2"></i>
                                        CMS - Pages Admin
                                    </a>
                                    <ul class="nav-second-level">
                                        <li><a href="{{ route('slider.index') }}">Slider</a></li>
                                        <li><a href="{{ route('abouts.index') }}">Abouts</a></li>
                                        <li><a href="{{ route('item.index') }}">Services</a></li>
                                        <li><a href="{{ route('banner.index') }}">Banner</a></li>
                                        <li><a href="{{ route('portfolio.index') }}">Portfolio</a></li>
                                        <li><a href="{{ route('testimonial.index') }}">Testimonial</a></li>
                                        <li><a href="{{ route('hire.index') }}">Hire Section</a></li>
                                        <li><a href="{{ route('newsletter.index') }}">Newsletter</a></li>
                                        <li><a href="{{ route('footerlink.index') }}">Footer Links</a></li>
                                        <li><a href="{{ route('general.index') }}">General</a></li>
                                        <li><a href="{{ route('submenus.index') }}">Manage Menus</a></li>
                                    </ul>
                                </li> --}}
                                <li class="{{ Request::segment(2)=='header' ? 'mm-active' : '' }} ||
										  {{ Request::segment(2)=='about-us' ? 'mm-active' : '' }} ||
										  {{ Request::segment(2)=='products-and-services' ? 'mm-active' : '' }} ||
										  {{ Request::segment(2)=='banner' ? 'mm-active' : '' }} ||
										  {{ Request::segment(2)=='portfolio' ? 'mm-active' : '' }} ||
										  {{ Request::segment(2)=='testimonial' ? 'mm-active' : '' }} ||
										  {{ Request::segment(2)=='hire' ? 'mm-active' : '' }} ||
										  {{ Request::segment(2)=='newsletter' ? 'mm-active' : '' }} ||
										  {{ Request::segment(2)=='footerlink' ? 'mm-active' : '' }} ||
										  {{ Request::segment(2)=='general' ? 'mm-active' : '' }} ||
										  {{ Request::segment(2)=='submenus' ? 'mm-active' : '' }}
										  ">
                                    <a class="has-arrow material-ripple" href="#">
                                        <i class="typcn typcn-pencil mr-2"></i>
                                        CMS - Pages Admin
                                    </a>
                                    <ul class="nav-second-level">
													<li class="{{ Request::segment(2)=='header' ? 'mm-active' : '' }} ||
													{{ Request::segment(2)=='about-us' ? 'mm-active' : '' }} ||
													{{ Request::segment(2)=='products-and-services' ? 'mm-active' : '' }} ||
													{{ Request::segment(2)=='banner' ? 'mm-active' : '' }} ||
													{{ Request::segment(2)=='portfolio' ? 'mm-active' : '' }} ||
													{{ Request::segment(2)=='testimonial' ? 'mm-active' : '' }} ||
													{{ Request::segment(2)=='hire' ? 'mm-active' : '' }} ||
													{{ Request::segment(2)=='newsletter' ? 'mm-active' : '' }} ||
													{{ Request::segment(2)=='footerlink' ? 'mm-active' : '' }} ||
													{{ Request::segment(2)=='general' ? 'mm-active' : '' }} ||
													{{ Request::segment(2)=='submenus' ? 'mm-active' : '' }}
													">
														<a class="has-arrow material-ripple" href="#">
															 <i class="typcn typcn-pencil mr-2"></i>
															 Home
														</a>
														<ul class="nav-second-level">
															 <li><a href="{{ route('header') }}">Header</a></li>
															 <li><a href="{{ route('about.us') }}">About Us</a></li>
															 <li><a href="{{ route('products-and-services.index') }}">Products & Services</a></li>
															 <li><a href="{{ route('banner.index') }}">Banner</a></li>
															 <li><a href="{{ route('portfolio.index') }}">Portfolio</a></li>
															 <li><a href="{{ route('testimonial.index') }}">Testimonial</a></li>
															 <li><a href="{{ route('hire.index') }}">Hire Section</a></li>
															 <li><a href="{{ route('newsletter.index') }}">Newsletter</a></li>
															 <li><a href="{{ route('footerlink.index') }}">Footer Links</a></li>
															 <li><a href="{{ route('general.index') }}">General</a></li>
															 <li><a href="{{ route('submenus.index') }}">Manage Menus</a></li>
														</ul>
												  </li>
                                    </ul>
                                </li>

                                <li>
                                    <a class="has-arrow material-ripple" href="#">
                                        <i class="typcn typcn-user-add-outline mr-2"></i>
                                        User Management
                                    </a>
                                    <ul class="nav-second-level">
                                        <li><a href="{{ route('users.index') }}">Users</a></li>
                                        <li><a href="{{ route('roles.index') }}">Roles</a></li>
                                        <li><a href="{{ route('permissions.index') }}">Permissions</a></li>
                                    </ul>
                                </li>
										  @endrole
                                {{-- <li>
                                    <a class="has-arrow material-ripple" href="#">
                                        <i class="typcn typcn-cog-outline mr-2"></i>
                                        Settings
                                    </a>
                                    <ul class="nav-second-level">
                                        <li><a href="{{ route('generalsettings') }}">General Settings</a></li>
                                    </ul>
                                </li> --}}
                            </ul>
                        </nav>
                    </div><!-- sidebar-body -->
                    <div class="navbar-user d-none d-md-flex" id="sidebarUser">
                    </div>
                </nav>
            </div><!-- sidebar-body -->
        </nav>
        <!-- Page Content  -->
        <div class="content-wrapper">
            <div class="main-content">
                <nav class="navbar-custom-menu navbar navbar-expand-lg m-0">
                    <div class="sidebar-toggle-icon" id="sidebarCollapse">
                        sidebar toggle<span></span>
                    </div>
                    <!--/.sidebar toggle icon-->
                    <div class="d-flex flex-grow-1">
                        <ul class="navbar-nav flex-row align-items-center ml-auto">
                            <li class="nav-item dropdown notification">
                                <a title="Logout" class="nav-link dropdown-toggle" href="{{ route('logout') }}" data-toggle="dropdown" onclick="event.preventDefault();
										  document.getElementById('logout-form').submit();">
                                    <i class="typcn typcn-key-outline"></i>
                                </a>
										 


                             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                 @csrf
                             </form>
                            </li>
                        </ul>
                        <!--/.navbar nav-->
                        <div class="nav-clock">
                            <div class="time">
                                <span class="time-hours"></span>
                                <span class="time-min"></span>
                                <span class="time-sec"></span>
                            </div>
                        </div><!-- nav-clock -->
                    </div>
                </nav>
                <!--/.navbar-->
                <div class="body-content">
						<script src="{{asset("dashassets/tinymce/tinymce.min.js")}}"></script>
						<script>
        function _full_Ed() {
            tinymce.init({
                setup: function(editor) {
                    editor.on("init", function() {
                        editor.shortcuts.remove('ctrl+s');
                    });
                },
                mode: "specific_textareas",
                editor_selector: "oneditor",
				valid_children : '-p[img],+div[img],span[img]',
                plugins: [
                    "advlist autolink link image lists charmap preview hr anchor pagebreak spellchecker",
                    "searchreplace wordcount visualblocks visualchars code insertdatetime media nonbreaking",
                    "table contextmenu directionality emoticons template paste textcolor"
                ],
                rel_list: [{
                        title: 'None',
                        value: ''
                    },
                    {
                        title: 'No Referrer',
                        value: 'noreferrer'
                    },
                    {
                        title: 'No Opener',
                        value: 'noopener'
                    },
                    {
                        title: 'No Follow',
                        value: 'nofollow'
                    }
                ],
                target_list: [{
                        title: 'None',
                        value: ''
                    },
                    {
                        title: 'Same Window',
                        value: '_self'
                    },
                    {
                        title: 'New Window',
                        value: '_blank'
                    },
                    {
                        title: 'Parent frame',
                        value: '_parent'
                    }
                ],
				style_formats: [
					{
						 title: 'Custom Bullet',
						 selector: 'li', 
						 classes: 'cum_list',
						 styles:{
							 "list-style-image" : "https://svgsilh.com/svg/304167.svg"
						 }
					}
				],
				style_formats_merger :true,
                toolbar: "insertfile undo redo | removeformat | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | preview media | forecolor backcolor emoticons ",
                theme_advanced_path: false,
                relative_urls: false,
                remove_script_host: false,
                theme_advanced_resizing: true,
                forced_root_block : 'p',
				
                style_formats: [{
                        title: 'Bold text',
                        inline: 'b'
                    },
                    {
                        title: 'Header 1',
                        block: 'h1'
                    },
                    {
                        title: 'Header 2',
                        block: 'h2'
                    },
                    {
                        title: 'Header 3',
                        block: 'h3'
                    },
                    {
                        title: 'Header 4',
                        block: 'h4'
                    },
                    {
                        title: 'Header 5',
                        block: 'h5'
                    },
                    {
                        title: 'Header 6',
                        block: 'h6'
                    },
                ]
            });
        }
        _full_Ed();
    </script>
                    @yield('content')
                </div>
                <!--/.body content-->
            </div>
            <!--/.main content-->
            <footer class="footer-content">
                <div class="footer-text d-flex align-items-center justify-content-between">
                    <div class="copy">2023 HockeySoft.Tech - All Rights Reserved</div>
                    <div class="credit">A product of: Web Vikings Ltd.</div>
                </div>
            </footer>
            <!--/.footer content-->
            <div class="overlay"></div>
        </div>
        <!--/.content-wrapper-->
    </div>
    <!--/.wrapper-->
    <!--Global script(used by all pages)-->
    <script src="{{ asset('dashassets/plugins/jQuery/jquery-3.4.1.min.js') }}" ></script>
    <script src="{{ asset('dashassets/dist/js/popper.min.js') }}" defer></script>
    <script src="{{ asset('dashassets/plugins/bootstrap/js/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('dashassets/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js') }}" defer></script>

    <script src="{{ asset('dashassets/plugins/metisMenu/metisMenu.min.js') }}" defer></script>
    <!-- Third Party Scripts(used by this page)-->
   {{--  <script src="{{ asset('dashassets/plugins/chartJs/Chart.min.js') }}" defer></script>
    <script src="{{ asset('dashassets/plugins/sparkline/sparkline.min.js') }}" defer></script>
    <script src="{{ asset('dashassets/plugins/emojionearea/dist/emojionearea.min.js') }}" defer></script>
    <script src="{{ asset('dashassets/plugins/datatables/dataTables.min.js') }}" defer></script>
    <script src="{{ asset('dashassets/plugins/datatables/dataTables.bootstrap4.min.js') }}" defer></script> --}}
    <!--Page Active Scripts(used by this page)-->

    <!--Page Scripts(used by all page)-->
    <script src="{{ asset('dashassets/dist/js/sidebar.js') }}" defer></script>
	 <script src="{{asset("dashassets/tinymce/tinymce.min.js")}}"></script>
    @php
   //  $mediaPanel = new \hassankwl1001\mediapanel\Http\Controllers\MediaPanelController;
   //  echo $mediaPanel->index();
    @endphp
    @yield('scripts')
</body>

</html>
