<!DOCTYPE html>
<html lang="en">
	<head>
		@include('includes.head')
	</head>
	<body>
		 <div class="navbar navbar-fixed-top">
		 <div  class="container menubar">
		 <div class="navbar-header">
			 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span> 
			  </button>
			  <a href="{{ url('web/doctors') }}" class="navbar-brand">Screenshot Saver</a>  
		</div>
			<!--<div class="navbar-inner pull-right">
					<ul class="nav navbar-nav">
						<li class="pull-right"><a href="#" id="searchagain" class="slidingbutton">Search Again</a></li>
					</ul>
				</div>-->
			</div>
		</div>
		</div>
		 <div id="wrap" class="container main-content">
			@yield('content')
		 </div>
		 <div class="bottom container-fluid">
			<!-- @include('includes.foot')-->
		 </div>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
		{!! Html::script('js/screenshot.js') !!}
		</script>
	</body>
</html>