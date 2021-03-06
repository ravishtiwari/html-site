<?php
require_once('includes/includes.php');
?>
@@include('partials/header.html',
{
  "title": "Accessibility Test  : HTML Site :  Thank you",
  "page":"thankout"
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
          <a href="#main" style="color:#1161ec"   class="visuallyhidden focusable">Skip Navigation </a>
        </div>
		<div class="navbar-collapse">
		  <ul class="nav navbar-nav navbar-right">
			  <li><a href="index.html">HOME</a></li>
			  <li class="active"><a href="about.php">ABOUT</a></li>
			  <li><a href="services.html">SERVICES</a></li>
			  <li><a href="works.html">WORKS</a></li>
			  <li><a href="video.html">VIDEO</a></li>
			  <li><a href="table.html">TABLE</a></li>
              <?php
                if(loggedInUser()){
                    echo '<li><a href="logout.php">LOGOUT</a></li>';
                } else {
                    echo '<li><a href="login.php">LOGIN</a></li>';
                }
               ?>
			  <li><a data-toggle="modal" data-target="#myModal" href="#myModal"><span class="fa fa-envelope-o"></span></a></li>
		  </ul>
		</div><!--/.nav-collapse -->
		  </div>
	  </div>
  </nav>

  <main id="main">

	<!-- PORTFOLIO SECTION -->
	<div id="dg">
		<div class="container well">
			<div class="row centered">
                <?php if(array_key_exists('login', $_GET)) { ?>
                    <div class="well">
                        <div class="alert alert-info">
                            You are now logged in, please note, session is only working on following 2 pages:
                            <a href="about.php" title="About page"> About</a> &amp;
                            <a href="login.php" title="Login page">login</a>.
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="well">
                        Thank you for contacting us, we will get back to you soon.
                    </div>
                <?php } ?>

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
