<?php

?>
<html lang="en" data-textdirection="rtl" class="loading" ng-app= "hosjs" >
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>@yield('title')</title>
    
    <link rel="apple-touch-icon" sizes="60x60" href="app-assets/images/ico/apple-icon-60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="app-assets/images/ico/apple-icon-76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="app-assets/images/ico/apple-icon-120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="app-assets/images/ico/apple-icon-152.png">
    <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
    <link rel="shortcut icon" type="image/png" href="app-assets/images/ico/favicon-32.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <!-- BEGIN VENDOR CSS-->
    
    <link rel="stylesheet" type="text/css" href="app-assets/css-rtl/bootstrap.css">
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="app-assets/fonts/icomoon.css">
    <link rel="stylesheet" type="text/css" href="app-assets/fonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/pace.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN ROBUST CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css-rtl/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css-rtl/app.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css-rtl/colors.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css-rtl/custom-rtl.css">

    <!-- END ROBUST CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css-rtl/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css-rtl/core/menu/menu-types/vertical-overlay-menu.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css-rtl/core/colors/palette-gradient.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/style-rtl.css">
    <link rel="stylesheet" type="text/css" href="assets/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="assets/date/css/datepicker.css">
    <link rel="stylesheet" type="text/css" href="dist/css/angular-datatables.css">
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
     <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.4.2/css/buttons.bootstrap4.min.css">

    
    <!-- END Custom CSS-->
  </head>
  <body ng-controller = "Main" data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns  fixed-navbar">

    <!-- navbar-fixed-top-->
    <nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-semi-dark navbar-shadow">
      <div class="navbar-wrapper">
        <div class="navbar-header">
          <ul class="nav navbar-nav">
            <li class="nav-item mobile-menu hidden-md-up float-xs-left"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5 font-large-1"></i></a></li>
            <li class="nav-item"><a href="#" class="navbar-brand nav-link"><img alt="branding logo" src="app-assets/images/logo/robust-logo-light.png" data-expand="app-assets/images/logo/robust-logo-light.png" data-collapse="app-assets/images/logo/robust-logo-small.png" class="brand-logo"></a></li>
            <li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="icon-ellipsis pe-2x icon-icon-rotate-right-right"></i></a></li>
          </ul>
        </div>
        <div class="navbar-container content container-fluid">
          <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
            <ul class="nav navbar-nav">
              <li class="nav-item hidden-sm-down"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5">         </i></a></li>
              <li class="nav-item hidden-sm-down"><a href="#" class="nav-link nav-link-expand"><i class="ficon icon-expand2"></i></a></li>
            </ul>
            <ul class="nav navbar-nav float-xs-right">
              
           
              <li class="dropdown dropdown-user nav-item"><a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link"><span class="avatar avatar-online"><img src="app-assets/images/portrait/small/avatar-s-1.png" alt="avatar"><i></i></span><span class="user-name">{{ Auth::user()->name }}</span></a>
                <div class="dropdown-menu dropdown-menu-right"><a href="#" class="dropdown-item"><i class="icon-head"></i> تعديل الملف</a>
				
                  <div class="dropdown-divider"></div><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="dropdown-item" ><i class="icon-power3"></i> تسجيل خروج</a>
                
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>


                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <!-- main menu-->
    <div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
      <!-- main menu header-->
      <div class="main-menu-header">
        <input type="text" placeholder="بحث ..." class="menu-search form-control round"/>
      </div>
      <!-- / main menu header-->
      <!-- main menu content-->
      <div class="main-menu-content">
        <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
          <li class=" nav-item"><a href=""><i class="icon-home3"></i><span data-i18n="nav.dash.main" class="menu-title">الصفحة الرئيسية</span></a>
           
          </li>
		  
          <li class=" nav-item"><a href="#"><i class="icon-stack-2"></i><span data-i18n="nav.page_layouts.main" class="menu-title">المرضى</span></a>
            <ul class="menu-content">
             
              <li><a href="addNewPat" data-i18n="nav.page_layouts.2_columns" class="menu-item">قسم المرضى</a>
              </li>
            
            </ul>
          </li>
          
          @if (Auth::user()->hasRole('Admin'))
          <li class=" nav-item"><a href="#"><i class="icon-users"></i><span data-i18n="nav.project.main" class="menu-title">الموظفين</span></a>
            <ul class="menu-content">
              
              <li><a href="AddEmp" data-i18n="nav.gallery_pages.gallery_grid" class="menu-item">قسم الموظفين</a>
              </li>
          
            </ul>
          </li>
          @endif

          @if (Auth::user()->hasRole('Admin'))
          <li class=" nav-item"><a href="#"><i class="icon-ios-albums-outline"></i><span data-i18n="nav.cards.main" class="menu-title">العيادات</span></a>
            <ul class="menu-content">
              
              <li><a href="addcln" data-i18n="nav.cards.card_actions" class="menu-item">قسم العيادات</a>
              </li>
            </ul>
          </li>
          @endif

          @if (Auth::user()->hasRole('Admin'))
        <li class=" nav-item"><a href="#"><i class="icon-folder"></i><span data-i18n="nav.cards.main" class="menu-title">الفروع</span></a>
            <ul class="menu-content">
              
              <li><a href="branchdata" data-i18n="nav.cards.card_actions" class="menu-item">قسم الفروع</a>
              </li>
            </ul>
          </li>
          @endif

          @if (Auth::user()->hasRole('Emp'))
		  <li class=" nav-item"><a href="#"><i class="icon-ei-calendar"></i><span data-i18n="nav.cards.main" class="menu-title">ادارة الحجز والاستعلام</span></a>
           <ul class="menu-content">
              
              <li><a href="booking" data-i18n="nav.cards.card_actions" class="menu-item">شاشة الحجز والاستعلام</a>
              </li>
            </ul>
          </li>
      @endif

          @if (Auth::user()->hasRole('Admin') || Auth::user()->hasRole('doctor') ) 
		  <li class=" nav-item"><a href="#"><i class="icon-user-md"></i><span data-i18n="nav.cards.main" class="menu-title">الطبيب</span></a>
           <ul class="menu-content">

              @if (Auth::user()->hasRole('Admin'))
              <li><a href="doctordata" data-i18n="nav.cards.card_actions" class="menu-item">بيانات الأطباء</a>
              </li>
              @endif

              @if (Auth::user()->hasRole('doctor'))
              <li><a href="doctor" data-i18n="nav.cards.card_actions" class="menu-item">شاشة الطبيب</a>
              </li>
              @endif
            </ul>
          </li>
          @endif
			
          @if (Auth::user()->hasRole('Admin') || Auth::user()->hasRole('Emp'))
  <li class=" nav-item"><a href="#"><i class="icon-file-text"></i><span data-i18n="nav.cards.main" class="menu-title">الفواتير</span></a>
           <ul class="menu-content">
         
              <li><a href="newinv" data-i18n="nav.cards.card_actions" class="menu-item">فاتورة شراء | جديد</a>
			    <li><a href="#" data-i18n="nav.cards.card_actions" class="menu-item">قائمة الفواتير</a>
              </li>
            </ul>
          </li>
          @endif

          @if (Auth::user()->hasRole('Admin'))
			  <li class=" nav-item"><a href="#"><i class="icon-briefcase"></i><span data-i18n="nav.cards.main" class="menu-title">الخزينة</span></a>
           <ul class="menu-content">
             
              <li><a href="banks" data-i18n="nav.cards.card_actions" class="menu-item">الخزائن</a>
             
              <li><a href="disbank" data-i18n="nav.cards.card_actions" class="menu-item">جرد الخزينة</a>
              </li>
            </ul>
          </li>
          @endif
          @if (Auth::user()->hasRole('Admin'))
			  <li class=" nav-item"><a href="defineService"><i class="icon-list"></i><span data-i18n="nav.cards.main" class="menu-title">تعريف الأصناف والخدمات</span></a>
           
          </li>
         @endif
        
        
         
        </ul>
      </div>
      <!-- /main menu content-->
      <!-- main menu footer-->
      <!-- include includes/menu-footer-->
      <!-- main menu footer-->
    </div>
    <!-- / main menu-->

    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
		
        </div>
        <div class="content-body"><!-- stats -->
		
		<div class="row match-height">
    @yield('content')
		</div>





        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

	
    <footer class="footer footer-static footer-light navbar-border">
      <p class="clearfix text-muted text-sm-center mb-0 px-2"><span class="float-md-left d-xs-block d-md-inline-block">تطبيق ادارة المستشفيات. </span><span class="float-md-right d-xs-block d-md-inline-block">برمجة : محمد معتز</span></p>
    </footer>

    <!-- BEGIN VENDOR JS-->
    <script src="app-assets/js/core/libraries/jquery.min.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
 <script src="dist/jquery.dataTables.min.js" ></script>
        <script src="dist/angular-datatables.min.js" ></script>
        <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<script src="dist/plugins/buttons/angular-datatables.buttons.min.js"></script>

    <script src="app-assets/vendors/js/ui/tether.min.js" type="text/javascript"></script>
    <script src="app-assets/js/core/libraries/bootstrap.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/ui/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/ui/unison.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/ui/blockUI.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/ui/jquery.matchHeight-min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/ui/screenfull.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/extensions/pace.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="app-assets/vendors/js/charts/chart.min.js" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN ROBUST JS-->
    <script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
    <script src="app-assets/js/core/app.js" type="text/javascript"></script>
    <!-- END ROBUST JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="app-assets/js/scripts/pages/dashboard-lite.js" type="text/javascript"></script>

    <script src="angular/app.js" ></script>
      <script src="assets/date/js/bootstrap-datepicker.js"></script>
  
      <script src="assets/moment.min.js"></script>
      <script src="assets/daterangepicker.js"></script>
      <link  rel="stylesheet" type="text/css"  href="assets/daterangepicker.css"/>
    @yield('script')
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.all.min.js"></script>
  

    <!-- END PAGE LEVEL JS-->

	<script>
			$(document).ready( function() {
    	$(document).on('change', '.btn-file :file', function() {
		var input = $(this),
			label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [label]);
		});

		$('.btn-file :file').on('fileselect', function(event, label) {
		    
		    var input = $(this).parents('.input-group').find(':text'),
		        log = label;
		    
		    if( input.length ) {
		        input.val(log);
		    } else {
		        if( log ) alert(log);
		    }
	    
		});
		function readURL(input) {
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();
		        
		        reader.onload = function (e) {
		            $('#img-upload').attr('src', e.target.result);
		        }
		      
		        reader.readAsDataURL(input.files[0]);
		    }
		}

		function readURL2(input) {
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();
		        
		        reader.onload = function (e) {
		            $('#img-upload1').attr('src', e.target.result);
		        }
		      
		        reader.readAsDataURL(input.files[0]);
		    }
		}

		$("#imgInp").change(function(){
		    readURL(this);
		}); 	
    	$("#imgInp1").change(function(){
		    readURL2(this);
		}); 	
	});
			</script>

  </body>
</html>
