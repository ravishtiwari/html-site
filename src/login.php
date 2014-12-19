<?php
    require_once('includes/includes.php');
    require_once('includes/login.php');
?>
@@include('partials/header.html',
{
  "title": "KED : HTML Site : Login page",
  "page":"about-us"
}
)

  <body>

  <nav class="navbar navbar-default" role="navigation">
	  <div class="navbar navbar-inverse">
		  <div class="container">

			  <div class="navbar-header">
				  <a class="navbar-brand" href="#">SP<i class="fa fa-circle"></i>T</a>
			  </div>

        <div class="navbar-header">
          <a href="#main" style="color:#1161ec" class="visuallyhidden focusable">Skip Navigation </a>
        </div>
		<div class="navbar-collapse">
		  <ul class="nav navbar-nav navbar-right">
			  <li><a href="index.html">HOME</a></li>
			  <li class="active"><a href="about.php">ABOUT</a></li>
			  <li><a href="services.html">SERVICES</a></li>
			  <li><a href="works.html">WORKS</a></li>
			  <li><a href="video.html">VIDEO</a></li>
			  <li><a href="table.html">TABLE</a></li>
			  <li>
                  <a data-toggle="modal" data-target="#myModal" href="#myModal">
                      <span class="fa fa-envelope-o"></span>
                  </a>
              </li>
		  </ul>
		</div><!--/.nav-collapse -->
		  </div>
	  </div>
  </nav>

  <main id="main">
	<!-- Login Form Section -->
	<div id="dg">
		<div class="container well">
			<div class="row">
                <div class="well">
                    <p>Form below is example of accessible form</p>
                    @@include('partials/login-form.html')
                </div>

			</div><!-- row -->
		</div><!-- container -->
	</div><!-- DG -->

	<div id="r">
	  <div class="container">
		  <div class="row centered">
			  <div class="col-lg-8 col-lg-offset-2">
				  <h4>WE ARE STORYTELLERS. BRANDS ARE OUR SUBJECTS. DESIGN IS OUR VOICE.</h4>
				  <p>We believe ideas come from everyone, everywhere. At BlackTie, everyone within our agency walls is a designer in their own right. And there are a few principles we believe—and we believe everyone should believe—about our design craft. These truths drive us, motivate us, and ultimately help us redefine the power of design.</p>
			  </div>
		  </div><!-- row -->
	  </div><!-- container -->
	</div><!-- r wrap -->
  </main>
  @@include('partials/footer.html')
