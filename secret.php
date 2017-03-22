<?php
    require("config.php");
    if(empty($_SESSION['user'])) 
    {
        header("Location: index.php");
        die("Redirecting to index.php"); 
    }
?>
<!-- Author: Michael Milstead / Mode87.com
     for Untame.net
     Bootstrap Tutorial, 2013
-->

<!DOCTYPE html>
<html>
<head>
	<title>Teach Me How To Code</title>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="assets/bootstrap.min.js"></script>

<!--    <link href="assets/bootstrap.min.css" rel="stylesheet" media="screen">-->
    <link rel="stylesheet" type="text/css" href="CSS/code.css">

</head>
<body>
<div id=everything>
			<div id=content-head>
        <div id=site-logo>
          <div id=logo>
            <a href="secret.php"><img src="IMG/logo.png" /></a>
          </div>
        </div>

        <div id=login-button>
          <a href="logout.php"><button name="logout" style="width:150px; margin-left:-10px; margin-top:12px; float:right;">Log Out!</button></a>
        </div>
	</div> <!-- END OF CONTENT HEADER -->

			<div id=content-body>
				<div id=content>
					<div id=content-box-one>
						<div class=content-box id=box-one-info>
   						<div class="front">
     			 			<span class="word">HTML</span>
    					</div>
    						
              <div class="back">
      					<div class="definition">
        					<h3 class=back-header><a href="to-HTML.html">HTML</a></h3>
        						<p><strong>HTML</strong> stands for <u>H</u>yper-<u>T</u>ext <u>M</u>arkup <u>L</u>anguage which describes the structure of every webpage all over the internet. HTML consists of a number of <u>elements</u> in order to seperate content.</p>

                    
	                    	<div class=next-lesson>
	                    		<a href="to-HTML.html"><button class="next-lesson-button" name="HTML" style="width:100%; margin:auto; background:#D31F38;">Click here to enter this Lesson</button></a>
	                    	</div>
      					</div>
    					</div>

            </div>

					</div>

					<div id=content-box-two>
						<div class=content-box id=box-two-info>
							<div class="front">
     			 			<span class="word">CSS</span>
    					</div>
    					
              <div class="back">
      					<div class="definition">
        					<h3 class=back-header><a href="to-CSS.html">CSS</a></h3>
        						<p><strong>CSS</strong> stands for <u>C</u>ascading-<u>S</u>tyle <u>S</u>heet <u>C</u> ss describes how HTML elements are to be displayed on screen, paper, or in other media. <u>CSS</u> saves a lot of work. It can control the layout of multiple web pages all at once. External stylesheet are stored in CSS files.</p>

                    		<div class=next-lesson>
	                    		<a href="to-CSS.html"><button class="next-lesson-button" name="CSS" style="width:100%; margin:auto; background:#D31F38;">Click here to enter this Lesson</button></a>
	                    	</div>
      					</div>
    					</div>

						</div>

          </div>

					<div id=content-box-three>
						<div class=content-box id=box-three-info>
							<div class="front">
     			 			<span class="word">Javascript</span>
    					</div>
    					
              <div class="back">
      					<div class="definition">
        					<h3 class=back-header><a href="to-JS.html">Javascript</a></h3>
        						<p>Completely different from the programming language Java, <strong>Javscript</strong> is a programming language used to make web pages interactive. It runs on your visitor's computer and does not require constant downloads from your website.</p>

                    		<div class=next-lesson>
	                    		<a href="to-JS.html"><button class="next-lesson-button" name="JS" style="width:100%; margin:auto; background:#D31F38;">Click here to enter this Lesson</button></a>
	                    	</div>
      					</div>
    					</div>
						
            </div>
					
          </div>

					<div id=content-box-four>
						<div class=content-box id=box-four-info>
							<div class="front">
     			 			<span class="word">J Query</span>
    					</div>
    					
              <div class="back">
      					<div class="definition">
        					<h3 class=back-header><a href="to-JQ.html">J Query</a></h3>
        						<p><strong>J Query</strong> is a fast and concise <u>Javascript</u> library created by John Resig in 2006. <u>J Query</u> simplfies HTML document traversing, event handling, animating and Ajax interactions for rapid web development. <u>J Query</u> libraries are free, open source softwares, licenced under the MIT licence. <u>J Query's</u> syntax is designed to make it easierr to navigate a document.</p>


                   	 		<div class=next-lesson>
	                    		<a href="to-JQ.html"><button class="next-lesson-button" name="JQ" style="width:100%; margin:auto; background:#D31F38;">Click here to enter this Lesson</button></a>
	                    	</div>
      					</div>
    					</div>
						
            </div>

					</div><!-- END OF CONTENT-BOX-FOUR -->

				</div><!--  END OF CONTENT -->
			</div><!-- END OF CONTENT BODY -->

			<div id=content-footer>
        <div id="copy">
          <ul>
            <li><a id="footer-list" href="https://about.yahoo.com/">About Us</a></li>
            <li><a id="footer-list" href="https://careers.yahoo.com/us/"> Careers</a></li>
            <li><a id="footer-list" href="https://policies.yahoo.com/us/en/yahoo/terms/utos/">Regulations & Terms of Service</a></li>
            <li><a id="footer-list" href="https://advertising.yahoo.com/">Advertise</a></li>
          </ul>

          <br/>
          <div id=copyright>
            <p id=cr>Copyright &copy; 2017</p>
          </div>

        </div>
      </div> <!-- End of footer -->
		</div>
</body>
</html>