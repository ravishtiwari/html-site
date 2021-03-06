<?php
require_once('includes/includes.php');
include_once('includes/about-us-form.php');
?>
@@include('partials/header.html',
{
  "title": "Accessibility Test : HTML Site : About Us",
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
          <a href="#main" style="color:#1161ec"   class="visuallyhidden focusable">Skip Navigation </a>
        </div>
              <div class="navbar-collapse">
                  <ul class="nav navbar-nav navbar-right">
                      <li><a href="index.html">HOME</a></li>
                      <li class="active" aria-selected="true"
                          role="presentation" class="dropdown" aria-haspopup="true" aria-labelledby="menu-1">
                          <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="menuitem" id="menu-1" aria-expanded="false">
                              About <span class="caret"></span>
                          </a>
                          <ul class="dropdown-menu" role="menu"  class="active" aria-selected="true">
                              <li role="menuitem"  class="active" aria-selected="true">
                                  <a href="about.php" >ABOUT US</a>
                              </li>
                              <li role="menuitem" >
                                  <a href="ajax.html">Ajax</a>
                              </li>
                          </ul>
                      </li>
                      <li><a href="services.html">SERVICES</a></li>
                      <li><a href="works.html">WORKS</a></li>
                      <li><a href="video.html">VIDEO</a></li>
                      <li><a href="table.html">TABLE</a></li>
                      <li><a href="login.php">LOGIN</a></li>
                      <li><a data-toggle="modal" data-target="#myModal" href="#myModal"><span class="fa fa-envelope-o"><desc class="invisible"></desc></span></a></li>

                  </ul>
              </div><!--/.nav-collapse -->
		  </div>
	  </div>
  </nav>

  <main id="main">
  <script src="assets/vendor/chart/javascript/Chart.js"></script>
	<div class="container w">
		<div class="row centered">
			<br><br>
			<div class="col-lg-3" tabindex="0">
				<img class="img-circle" src="assets/img/pic.jpg" width="110" height="110" alt="Frank Lampard">
				<h4>Frank Lampard</h4>
				<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
				<p><a href="#">@Frank_BlackTie</a></p>
			</div><!-- col-lg-3 -->

			<div class="col-lg-3" tabindex="0">
				<img class="img-circle" src="assets/img/pic2.jpg" width="110" height="110" alt="David Wrigh">
				<h4>David Wright</h4>
				<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
				<p><a href="#">@David_BlackTie</a></p>
			</div><!-- col-lg-3 -->

			<div class="col-lg-3" tabindex="0">
				<img class="img-circle" src="assets/img/pic3.jpg" width="110" height="110" alt="Mark Milestone">
				<h4>Mark Milestone</h4>
				<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
				<p><a href="#">@Mark_BlackTie</a></p>
			</div><!-- col-lg-3 -->

			<div class="col-lg-3" tabindex="0">
				<img class="img-circle" src="assets/img/pic4.jpg" width="110" height="110" alt="Tania Tissen">
				<h4>Tania Tissen</h4>
				<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
				<p><a href="#">@Tania_BlackTie</a></p>
			</div><!-- col-lg-3 -->

		</div><!-- row -->
		<br>
		<br>
	</div>
  	<!-- forms container -->
	<div class="container">
        <p>Form below is example of accessible form</p>
		  @@include('partials/form.html')
	</div><!-- end forms container -->

	<!-- PORTFOLIO SECTION -->
	<div id="dg">
		<div class="container">
			<div class="row centered">
				<h4>OUR SKILLS</h4>
				<br>

			<!-- First Chart -->
			<div class="col-lg-3" tabindex="0">
				<canvas id="canvas" height="130" width="130"></canvas>
				<br>
				<script>
					var doughnutData = [
							{
								value: 70,
								color:"#3498db"
							},
							{
								value : 30,
								color : "#ecf0f1"
							}
						];
						var myDoughnut = new Chart(document.getElementById("canvas").getContext("2d")).Doughnut(doughnutData);
				</script>
				<p><strong>Design & Brand</strong></p>
				<p><small>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</small></p>
			</div><!-- /col-lg-3 -->

			<!-- Second Chart -->
			<div class="col-lg-3" tabindex="0">
				<canvas id="canvas2" height="130" width="130"></canvas>
				<br>
				<script>
					var doughnutData = [
							{
								value: 90,
								color:"#3498db"
							},
							{
								value : 10,
								color : "#ecf0f1"
							}
						];
						var myDoughnut = new Chart(document.getElementById("canvas2").getContext("2d")).Doughnut(doughnutData);
				</script>
				<p><strong>Web Development</strong></p>
				<p><small>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</small></p>
			</div><!-- /col-lg-3 -->

			<!-- Third Chart -->
			<div class="col-lg-3" tabindex="0">
				<canvas id="canvas3" height="130" width="130"></canvas>
				<br>
				<script>
					var doughnutData = [
							{
								value: 50,
								color:"#3498db"
							},
							{
								value : 50,
								color : "#ecf0f1"
							}
						];
						var myDoughnut = new Chart(document.getElementById("canvas3").getContext("2d")).Doughnut(doughnutData);
				</script>
				<p><strong>Seo Services</strong></p>
				<p><small>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</small></p>
			</div><!-- /col-lg-3 -->

			<!-- Fourth Chart -->
			<div class="col-lg-3" tabindex="0">
				<canvas id="canvas4" height="130" width="130"></canvas>
				<br>
				<script>
					var doughnutData = [
							{
								value: 80,
								color:"#3498db"
							},
							{
								value : 20,
								color : "#ecf0f1"
							}
						];
						var myDoughnut = new Chart(document.getElementById("canvas4").getContext("2d")).Doughnut(doughnutData);
				</script>
				<p><strong>Printing</strong></p>
				<p><small>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</small></p>
			</div><!-- /col-lg-3 -->


			</div><!-- row -->
		</div><!-- container -->
	</div><!-- DG -->




	<div id="r">
	  <div class="container">
		  <div class="row centered">
			  <div class="col-lg-8 col-lg-offset-2" tabindex="0">
				  <h4>WE ARE STORYTELLERS. BRANDS ARE OUR SUBJECTS. DESIGN IS OUR VOICE.</h4>
				  <p>We believe ideas come from everyone, everywhere. At BlackTie, everyone within our agency walls is a designer in their own right. And there are a few principles we believe—and we believe everyone should believe—about our design craft. These truths drive us, motivate us, and ultimately help us redefine the power of design.</p>
			  </div>
		  </div><!-- row -->
	  </div><!-- container -->
	</div><!-- r wrap -->
  </main>
  @@include('partials/footer.html')
