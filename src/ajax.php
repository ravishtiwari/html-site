<?php
require_once('includes/includes.php');
include_once('includes/about-us-form.php');
?>
@@include('partials/header.html',
{
  "title": "Accessibility Test  : HTML Site : About Us",
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
                      <li  role="presentation" class="dropdown" aria-haspopup="true" aria-labelledby="menu-1"
                           class="active" aria-selected="true"
                          >
                          <a class="dropdown-toggle" data-toggle="dropdown"

                             href="#" role="menuitem" id="menu-1" aria-expanded="false">
                              About <span class="caret"></span>
                          </a>
                          <ul class="dropdown-menu" role="menu"  class="active" aria-selected="true">
                              <li role="menuitem">
                                  <a href="about.php" >ABOUT US</a>
                              </li>
                              <li role="menuitem"  class="active" aria-selected="true">
                                  <a href="ajax.php">Ajax</a>
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
	<div class="container w">
		<div class="row">
            <h1>Example of Accessible HTML Tabs and Ajax</h1>
            <div id="tabsContainer" role="tabpanel">
                <ul role="tablist" class="nav nav-tabs" id="featuresTabs">
                    <li id="tabDashboard" role="presentation" class="active" aria-selected="true">
                        <a href="#dashboardTab" role="tab" aria-controls="dashboardTab" data-toggle="tab" data-load-page="dashboard.html" class="ajaxtab">Dashboard</a>
                    </li>
                    <li id="tabArticles" role="presentation" aria-selected="false">
                        <a href="#articleTab" role="tab" aria-controls="articleTab" data-toggle="tab" data-load-page="article.html" class="ajaxtab">Articles</a>
                    </li>
                    <li id="tabUtils" role="presentation" aria-selected="false">
                        <a href="#utilityTab" role="tab" aria-controls="utilityTab"  data-toggle="tab"  data-load-page="utils.html" class="ajaxtab">Utilities</a>
                    </li>
                </ul>

                <div class="tab-content panel" >
                    <div aria-labelledby="tabDashboard" id="dashboardTab" role="tabpanel" class="tab-pane active container" aria-hidden="false" >
                        <div class="">
                            <h3>Dashboard</h3>
                            <p>Lorem ipsum</p>
                        </div>

                    </div>

                    <div aria-labelledby="tabArticles"
                         id="articleTab" role="tabpanel"
                         class="tab-pane container"
                         aria-hidden="true"
                         aria-live="assertive"
                         aria-relevant="all"
                        >
                        <div class="">
                            <h3>Articles</h3>
                            <p>Lorem ipsum</p>
                        </div>
                    </div>

                    <div aria-labelledby="tabUtils" id="utilityTab" role="tabpanel" class="tab-pane container" aria-hidden="true">
                        <div class="">
                            <h3>Utilities</h3>
                            <p>Lorem ipsum</p>
                        </div>
                    </div>
                </div>

            </div>
		</div><!-- row -->
		<br>
		<br>
	</div>
  </main>
  @@include('partials/footer.html')
