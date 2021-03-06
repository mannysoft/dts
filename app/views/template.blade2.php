<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Document Tracking System</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="{{URL::base()}}/public/css/bootstrap.css">
<link rel="stylesheet" href="{{URL::base()}}/public/css/bootstrap-responsive.css">
<link rel="stylesheet" href="{{URL::base()}}/public/css/jquery.fancybox.css">
<link rel="stylesheet" href="{{URL::base()}}/public/css/uniform.default.css">
<link rel="stylesheet" href="{{URL::base()}}/public/css/bootstrap.datepicker.css">
<link rel="stylesheet" href="{{URL::base()}}/public/css/jquery.cleditor.css">
<link rel="stylesheet" href="{{URL::base()}}/public/css/jquery.plupload.queue.css">
<link rel="stylesheet" href="{{URL::base()}}/public/css/jquery.tagsinput.css">
<link rel="stylesheet" href="{{URL::base()}}/public/css/jquery.ui.plupload.css">
<link rel="stylesheet" href="{{URL::base()}}/public/css/chosen.css">
<link rel="stylesheet" href="{{URL::base()}}/public/css/jquery.jgrowl.css">
<link rel="stylesheet" href="{{URL::base()}}/public/css/style.css">
<script src="{{URL::base()}}/public/js/jquery-1.7.2.js"></script>
</head>
<body>
<div class="topbar">
	<div class="container-fluid">
		<a href="{{URL::base()}}/document" class='company'>Document Tracking System</a>
		<form action="#">
			<input type="text" value="" placeholder="Search here...">
		</form>
		<ul class='mini'>
			<li class='dropdown dropdown-noclose supportContainer'>
				<a href="#" class='dropdown-toggle' data-toggle="dropdown">
					<img src="{{URL::base()}}/public/img/icons/fugue/book-question.png" alt="">
					Total Documents
					<span class="label label-warning">5</span>
				</a>
				<ul class="dropdown-menu pull-right custom custom-dark">
					<li class='custom'>
						<div class="title">
							What is the question?
							<span>Jul 22, 2012 by <a href="#" class='pover' data-title="Hover me" data-content="User information comes here">Hover me</a></span>
						</div>
						<div class="action">
							<div class="btn-group">
								<a href="#" class='tip btn btn-mini' title="Show ticket"><img src="{{URL::base()}}/public/img/icons/fugue/magnifier.png" alt=""></a>
								<a href="#" class='tip btn btn-mini' title="Delete ticket"><img src="{{URL::base()}}/public/img/icons/fugue/cross.png" alt=""></a>
							</div>
						</div>
					</li>
					<li class='custom'>
						<div class="title">
							How can i do this and that?
							<span>Jul 19, 2012 by <a href="#" class='pover' data-title="Username" data-content="User information comes here">Username</a></span>
						</div>
						<div class="action">
							<div class="btn-group">
								<a href="#" class='tip btn btn-mini' title="Show ticket"><img src="{{URL::base()}}/public/img/icons/fugue/magnifier.png" alt=""></a>
								<a href="#" class='tip btn btn-mini' title="Delete ticket"><img src="{{URL::base()}}/public/img/icons/fugue/cross.png" alt=""></a>
							</div>
						</div>
					</li>
					<li class='custom'>
						<div class="title">
							I want more support tickets!
							<span>Jul 19, 2012 by <a href="#" class='pover' data-title="Lorem" data-content="User information comes here">Lorem</a></span>
						</div>
						<div class="action">
							<div class="btn-group">
								<a href="#" class='tip btn btn-mini' title="Show ticket"><img src="{{URL::base()}}/public/img/icons/fugue/magnifier.png" alt=""></a>
								<a href="#" class='tip btn btn-mini' title="Delete ticket"><img src="{{URL::base()}}/public/img/icons/fugue/cross.png" alt=""></a>
							</div>
						</div>
					</li>
					<li class='custom custom-hidden'>
						<div class="title">
							This is a great feature, BUT...
							<span>Jul 18, 2012 by <a href="#" class='pover' data-title="Lorem" data-content="User information comes here">Ipsum</a></span>
						</div>
						<div class="action">
							<div class="btn-group">
								<a href="#" class='tip btn btn-mini' title="Show ticket"><img src="{{URL::base()}}/public/img/icons/fugue/magnifier.png" alt=""></a>
								<a href="#" class='tip btn btn-mini' title="Delete ticket"><img src="{{URL::base()}}/public/img/icons/fugue/cross.png" alt=""></a>
							</div>
						</div>
					</li>
					<li class='custom custom-hidden'>
						<div class="title">
							I want more colors! How?
							<span>Jul 16, 2012 by <a href="#" class='pover' data-title="Lorem" data-content="User information comes here">Lorem</a></span>
						</div>
						<div class="action">
							<div class="btn-group">
								<a href="#" class='tip btn btn-mini' title="Show ticket"><img src="{{URL::base()}}/public/img/icons/fugue/magnifier.png" alt=""></a>
								<a href="#" class='tip btn btn-mini' title="Delete ticket"><img src="{{URL::base()}}/public/img/icons/fugue/cross.png" alt=""></a>
							</div>
						</div>
					</li>
					<li class="custom">
						<div class="expand_custom">
							<a href="#">Show all support tickets</a>
						</div>
					</li>
				</ul>
			</li>
			<li class='dropdown pendingContainer'>
				<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
					<img src="{{URL::base()}}/public/img/icons/fugue/document-task.png" alt="">
					Pending Documents
					<span class="label label-important">1</span>
				</a>
				<ul class="dropdown-menu pull-right custom custom-dark">
					<li class='custom'>
						<div class="title">
							Pending order #1 
							<span>Jul 22, 2012 by <a href="#" class='pover' data-title="Hover me" data-content="User information comes here">Hover me</a></span>
						</div>
						<div class="action">
							<div class="btn-group">
								<a href="#" class='tip btn btn-mini' title="Show order"><img src="{{URL::base()}}/public/img/icons/fugue/magnifier.png" alt=""></a>
								<a href="#" class='tip btn btn-mini' title="Delete order"><img src="{{URL::base()}}/public/img/icons/fugue/cross.png" alt=""></a>
							</div>
						</div>
					</li>
				</ul>
			</li>
			<li class='dropdown messageContainer'>
				<a href="#" class='dropdown-toggle' data-toggle='dropdown'>
					<img src="{{URL::base()}}/public/img/icons/fugue/balloons-white.png" alt="">
					Messages
					<span class="label label-info">3</span>
				</a>
				<ul class="dropdown-menu pull-right custom custom-dark">
					<li class='custom'>
						<div class="title">
							Hello, whats your name?
							<span>Jul 22, 2012 by <a href="#" class='pover' data-title="Hover me" data-content="User information comes here">Hover me</a></span>
						</div>
						<div class="action">
							<div class="btn-group">
								<a href="#" class='tip btn btn-mini' title="Show message"><img src="{{URL::base()}}/public/img/icons/fugue/magnifier.png" alt=""></a>
								<a href="#" class='tip btn btn-mini' title="Reply message"><img src="{{URL::base()}}/public/img/icons/fugue/mail-reply.png" alt=""></a>
							</div>
						</div>
					</li>
				</ul>
			</li>
			<li>
				<a href="#">
					<img src="{{URL::base()}}/public/img/icons/fugue/gear.png" alt="">
					Settings
				</a>
			</li>
			<li>
				<a href="{{URL::base()}}/login/logout">
					<img src="{{URL::base()}}/public/img/icons/fugue/control-power.png" alt="">
					Logout
				</a>
			</li>
		</ul>
	</div>
</div>
<div class="breadcrumbs">
	<div class="container-fluid">
		<ul class="bread pull-left">
			<li>
				<a href="{{URL::base()}}/document"><i class="icon-home icon-white"></i></a>
			</li>
			<li>
				<a href="{{URL::base()}}/document">
					Dashboard
				</a>
			</li>
		</ul>

	</div>
</div>
<div class="main">
	<div class="container-fluid">
	<div class="navi">
		<ul class='main-nav'>
			<li class='active'>
				<a href="{{URL::base()}}/document" class='light'>
					<div class="ico"><i class="icon-home icon-white"></i></div>
					Dashboard
					<!--<span class="label label-warning">10</span>-->
				</a>
			</li>
			<!--<li>
				<a href="forms.html" class='light'>
					<div class="ico"><i class="icon-list icon-white"></i></div>
					Forms
					<span class="label label-info">1</span>
				</a>
			</li>-->
			<li>
				<a href="#" class='light toggle-collapsed'>
					<div class="ico"><i class="icon-th-large icon-white"></i></div>
					Documents
					<img src="{{URL::base()}}/public/img/toggle-subnav-down.png" alt="">
				</a>
				<ul class='collapsed-nav closed'>
					<li>
						<a href="{{URL::base()}}/document/create">
							Create
						</a>
					</li>
					<li>
						<a href="{{URL::base()}}/document/receive">
							Receive
						</a>
					</li>
					<!--<li>
						<a href="{{URL::base()}}/document/release">
							Release
						</a>
					</li>
                    <li>
						<a href="{{URL::base()}}/document/track">
							Track
						</a>
					</li>-->
                    <li>
						<a href="{{URL::base()}}/document/my">
							My Document
						</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="#" class='light toggle-collapsed'>
					<div class="ico"><i class="icon-tasks icon-white"></i></div>
					Admin Panel
					<img src="{{URL::base()}}/public/img/toggle-subnav-down.png" alt="">
				</a>
				<ul class='collapsed-nav closed'>
					<li>
						<a href="{{URL::base()}}/admin/office">
							Offices
						</a>
					</li>
					<li>
						<a href="{{URL::base()}}/admin/station">
							Stations
						</a>
					</li>
					<li>
						<a href="{{URL::base()}}/admin/user">
							Users
						</a>
					</li>
                    <li>
						<a href="{{URL::base()}}/admin/doc">
							Document Type
						</a>
					</li>
					<li>
						<a href="{{URL::base()}}/admin/time">
							Time Alloted
						</a>
					</li>
				</ul>
			</li>
			<!--<li>
				<a href="statistics.html" class='light'>
					<div class="ico"><i class="icon-signal icon-white"></i></div>
					Statistics
					<span class="label label-important">3</span>
				</a>
			</li>
			<li>
				<a href="#" class='light toggle-collapsed'>
					<div class="ico"><i class="icon-exclamation-sign icon-white"></i></div>
					Error Pages
					<img src="{{URL::base()}}/public/img/toggle-subnav-down.png" alt="">
				</a>
				<ul class='collapsed-nav closed'>
					<li>
						<a href="403.html">
							403
						</a>
					</li>
					<li>
						<a href="404.html">
							404
						</a>
					</li>
					<li>
						<a href="500.html">
							500
						</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="#" class='light toggle-collapsed'>
					<div class="ico"><i class="icon-book icon-white"></i></div>
					Sample Pages
					<img src="{{URL::base()}}/public/img/toggle-subnav-down.png" alt="">
				</a>
				<ul class='collapsed-nav closed'>
					<li>
						<a href="gallery.html">
							Gallery
						</a>
					</li>
					<li>
						<a href="messages.html">
							Messages
						</a>
					</li>
					<li>
						<a href="userprofile.html">
							User Profile
						</a>
					</li>
					<li>
						<a href="index.html">
							Login
						</a>
					</li>
					<li>
						<a href="results.html">
							Search results
						</a>
					</li>
					<li>
						<a href="view.html">
							View form
						</a>
					</li>
					<li>
						<a href="invoice.html">
							Invoice
						</a>
					</li>
					<li>
						<a href="navigation_hover.html">
							Navigation expand on hover
						</a>
					</li>
					<li>
						<a href="calendar.html">Calendar</a>
					</li>
				</ul>
			</li>
			
            <li>
				<a href="#" class='light toggle-collapsed'>
					<div class="ico"><i class="icon-resize-full icon-white"></i></div>
					Layouts
					<img src="{{URL::base()}}/public/img/toggle-subnav-down.png" alt="">
				</a>
				<ul class='collapsed-nav closed'>
					<li>
						<a href="#" class='set-liquid'>
							Liquid
						</a>
					</li>
					<li>
						<a href="#" class='set-fixed'>
							Fixed
						</a>
					</li>
				</ul>
			</li>
            -->
		</ul>
	</div>
	
    <!--Main content-->
    <div class="content">
    	@yield('content')
    </div>
    
    	
	</div>
</div>	
<script src="{{URL::base()}}/public/js/less.js"></script>
<script src="{{URL::base()}}/public/js/bootstrap.min.js"></script>
<script src="{{URL::base()}}/public/js/jquery.uniform.min.js"></script>
<script src="{{URL::base()}}/public/js/bootstrap.timepicker.js"></script>
<script src="{{URL::base()}}/public/js/bootstrap.datepicker.js"></script>
<script src="{{URL::base()}}/public/js/chosen.jquery.min.js"></script>
<script src="{{URL::base()}}/public/js/jquery.fancybox.js"></script>
<script src="{{URL::base()}}/public/js/plupload/plupload.full.js"></script>
<script src="{{URL::base()}}/public/js/plupload/jquery.plupload.queue/jquery.plupload.queue.js"></script>
<script src="{{URL::base()}}/public/js/jquery.cleditor.min.js"></script>
<script src="{{URL::base()}}/public/js/jquery.inputmask.min.js"></script>
<script src="{{URL::base()}}/public/js/jquery.tagsinput.min.js"></script>
<script src="{{URL::base()}}/public/js/jquery.mousewheel.js"></script>
<script src="{{URL::base()}}/public/js/jquery.dataTables.min.js"></script>
<script src="{{URL::base()}}/public/js/jquery.dataTables.bootstrap.js"></script>
<script src="{{URL::base()}}/public/js/jquery.textareaCounter.plugin.js"></script>
<script src="{{URL::base()}}/public/js/ui.spinner.js"></script>
<script src="{{URL::base()}}/public/js/jquery.jgrowl_minimized.js"></script>
<script src="{{URL::base()}}/public/js/jquery.form.js"></script>
<script src="{{URL::base()}}/public/js/jquery.validate.min.js"></script>
<script src="{{URL::base()}}/public/js/bbq.js"></script>
<script src="{{URL::base()}}/public/js/jquery-ui-1.8.22.custom.min.js"></script>
<script src="{{URL::base()}}/public/js/jquery.form.wizard-min.js"></script>
<script src="{{URL::base()}}/public/js/jquery.cookie.js"></script>
<script src="{{URL::base()}}/public/js/jquery.metadata.js"></script>
<script src="{{URL::base()}}/public/js/custom.js"></script>
</body>
</html>