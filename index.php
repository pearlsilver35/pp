<?php date_default_timezone_set('Africa/Lagos');?>
<?php require_once('Connections/pp.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
 $k = $_SERVER['REMOTE_ADDR'];
mysql_select_db($database_pp, $pp);
$query_bt = "SELECT * FROM vistor_info where ip_address='$k'";
$bt = mysql_query($query_bt, $pp) or die(mysql_error());
$row_bt = mysql_fetch_assoc($bt);
$totalRows_bt = mysql_num_rows($bt);

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form")) {
  $insertSQL = sprintf("INSERT INTO message (Name, Email, Message) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['name'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['message'], "text"));

  mysql_select_db($database_pp, $pp);
  $Result1 = mysql_query($insertSQL, $pp) or die(mysql_error());

 
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: index.php?resp=1#contact"));
}
/* echo $_SERVER['REMOTE_ADDR'];
  echo $_SERVER['HTTP_REFERER'];
 echo date("D dS M,Y h:i a");*/
 
 
 

	
	 $c = date("D dS M,Y ");
	  $a = $_SERVER['REMOTE_ADDR'];
		  
	
				 $e = $row_bt['counter']+ 1;
			$query_data ="update vistor_info set counter='$e' where ip_address='$a'";
			$result_data = mysql_query($query_data);
			$count_entry =mysql_affected_rows();
			

	
 if($count_entry == 0 ){
	
	   $b = $_SERVER['HTTP_REFERER'];
	 $c = date("D dS M,Y ");
	  $a = $_SERVER['REMOTE_ADDR'];
		 
	    
		$insertSQL = sprintf( "INSERT INTO vistor_info (ip_address , referer ,  date ) VALUES( %s, %s, %s)",
	
    				   GetSQLValueString($a, "text"),
                       GetSQLValueString($b, "text"),
					   GetSQLValueString($c, "date"));
        

			mysql_select_db($database_pp, $pp);
  $Result1 = mysql_query($insertSQL, $pp) or die(mysql_error());
 }
?>

<!DOCTYPE html>
<html lang="en-US" class="no-js">
	

<head>

		<!-- ==============================================
		Title and Meta Tags
		=============================================== -->
		<meta charset="utf-8">
		<title>Abigail</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta description="Site description">

		<!-- ==============================================
		Favicons
		=============================================== -->
		<link rel="shortcut icon" href="assets/images/about.jpg">
        <link rel="apple-touch-icon" href="assets/images/about.jpg">
        <link rel="apple-touch-icon" sizes="72x72" href="assets/images/about.jpg">
        <link rel="apple-touch-icon" sizes="114x114" href="assets/images/about.jpg">
        <link rel="apple-touch-icon" sizes="144x144" href="assets/images/about.jpg">
		
		<!-- ==============================================
		CSS
		=============================================== -->    
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/animate.css">
		<link rel="stylesheet" href="assets/css/styles-orange.css">
		
		<!-- ==============================================
		Fonts
		=============================================== -->
        <link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
        <style type="text/css">
        body {
	background-color: #FFF;
	background-image: url(assets/images/bground.jpg);
	background-repeat: no-repeat;
}
        </style>
        <link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
        <link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css">
		<!-- ==============================================
		JS
		=============================================== -->
			
		<!--[if lt IE 9]>
			<script src="assets/js/libs/respond.min.js"></script>
		<![endif]-->
		
		<script type="text/javascript" src="assets/js/libs/modernizr.min.js"></script>
		<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
		<script src="SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
		<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-67037259-1', 'auto');
          ga('send', 'pageview');
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
    } if (errors) alert('The following error(s) occurred:\n'+errors);
    document.MM_returnValue = (errors == '');
} }
        </script>
        
        
</head>
  
	<body bgcolor="#3300FF" data-spy="scroll" data-target="#main-nav" data-offset="200">
	
		
		
	 <!-- Start Top Header Section -->
        <!--<section class="top-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 hidden-lg hidden-md" >
                        <div class="">
                            <ul class="meee nav navbar-nav navbar-right">
                                <li>
                                <a href="#about" data-toggle="tooltip" data-placement="bottom" title="About Me!"><i class="fa fa-user"></i> </a>
						</li>
						<li>
							<a href="#skills" data-toggle="tooltip" data-placement="bottom" title="My Skills!"><i class="fa fa-pie-chart"></i></a>
						</li>
						<li>
							<a href="#portfolio" data-toggle="tooltip" data-placement="bottom" title="My Works!" ><i class="fa fa-th"></i> </a>
						</li>
						<li>
							<a href="#contact" data-toggle="tooltip" data-placement="bottom" title=" Contact Me!"><i class="fa fa-comments-o"></i> </a>
						</li>
                        <li>
							<a href="assets/new cv.docx" data-toggle="tooltip" data-placement="bottom" title="Download resume"><i class="fa fa-download"></i> </a>
						</li>
                            </ul>
                        </div>
                    </div>
                   
                    </div>
                </div>
            </div>
        </section>-->
        <!-- End Top Header Section -->
<!--==============================================
		MAIN NAV
		=============================================== -->
        
		<div id="main-nav" class="navbar navbar-fixed-top">
            
			<div class="container">
			
				<div class="navbar-header ">
				
				  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#site-nav">
						<span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
				  
                  </button>
					<a class="navbar-brand" href="#home">Ayodele Abigail</a>
				
				</div>
				
				<div id="site-nav" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li class="sr-only">
							<a href="#home">Home</a>
						</li>
						<li>
							<a href="#about"><i class="fa fa-user"></i> About Me</a>
						</li>
						<li>
							<a href="#skills"><i class="fa fa-pie-chart"></i> Skills</a>
						</li>
						<li>
							<a href="#portfolio"><i class="fa fa-th"></i> Works</a>
						</li>
						<li>
							<a href="#contact"><i class="fa fa-comments-o"></i> Contact Me</a>
						</li>
                        <li>
							<a href="assets/new cv.docx"><i class="fa fa-download"></i> Download CV</a>
						</li>
					</ul>
				</div>
				
			</div>
			
	</div><!--End main-nav -->
    
    
		

		<!-- ==============================================
		HEADER
		=============================================== -->
		<header id="home">
			<div class="container text-center">

              <div class="hello">
                    <p>HELLO</p>
                    <h1>I Am Ayodele Abigail</h1>
                    <p class="p2">AND</p>
                <H2>I AM A WEB DEVELOPER</H2>
              </div>
                
			</div>
		</header><!--End home header -->

        <!-- ==============================================
        ABOUT
        =============================================== -->
		<section id="about" class="bg1">
		
			<div class="container">
				
				<div class="row">

                    <div class="col-xs-12">
                      <h1 class="big-text orange wow fadeInDown text-center">
                            <i class="fa fa-user"></i>
                            About Me
                      </h1>
A Programmer and a graduate of Computer Science from Oduduwa University Ipetumodu. My career goal is to translate my human capital resource  into a result-oriented corporate wealth, in tune with my employers&rsquo; corporate  vision, mission and value, while seeking personal development and professional distinction. </p>
<p class="about-text wow fadeInDown">&nbsp;</p>
                    </div>

                    <!-- ==== PHOTO ==== -->
					<div class="col-sm-6">
                        <div id="trigger1"></div>
					    <div id="pin1" class="imageCont">
						    <img class="wow rollIn image" data-wow-offset="200" src="assets/images/about.jpg" alt="" />
                        </div>
					</div>
                    
                    <!-- ==== TIMELINE ==== -->
					<div class="col-sm-6 timeline">
                        <i id="timeline-top" class="fa fa-clock-o"></i>

                        <div class="wow fadeInRight" data-wow-offset="200">
                            <i class="fa fa-smile-o wow swing" data-wow-offset="200" data-wow-delay="1s"></i>
                            <h3>02.18.</h3>
                            <p>
                                <span>Born</span>
                                I was born on  18th of febuary in Ibadan, Nigeria</p>
                        </div>

                        <div class="wow fadeInRight" data-wow-offset="200">
                            <i class="fa fa-book wow swing" data-wow-offset="200" data-wow-delay="1s"></i>
                            <h3>2007</h3>
                            <p>
                                <span>Grade school</span>First  School Leaving Certificate, Saint Theresa's Primary School, Bwari, Abuja    </p>
                        </div>

                        <div class="wow fadeInRight" data-wow-offset="200">
                            <i class="fa fa-book wow swing" data-wow-offset="200" data-wow-delay="1s"></i>
                            <h3>2012</h3>
                            <p>
                                <span>High school</span>Senior  Secondary School Certificate, National College, Gboko, Benue </p>
                        </div>

                        <div class="wow fadeInRight" data-wow-offset="200"></div>

                        <div class="wow fadeInRight" data-wow-offset="200"><i class="fa fa-trophy wow swing" data-wow-offset="200" data-wow-delay="1s"></i>
                            <h3>2014</h3>
                            <p>
                                <span>Certification</span>Microsoft Office Specialist 2010 :  AnchorGrip Limited (April  2014)                                                                                                         </p>
                        </div>

                        <div class="wow fadeInRight" data-wow-offset="200">
                            <i class="fa fa-graduation-cap wow swing" data-wow-offset="200" data-wow-delay="1s"></i>
                            <h3>2016</h3>
                            <p>
                                <span>University of completion</span>B.Sc.  Computer Science, Oduduwa University, Ipetumodu, Osun State. (second class)  .</p>
                        </div>

                        <div class="wow fadeInRight" data-wow-offset="200">
                            <i class="fa fa-briefcase wow swing" data-wow-offset="200" data-wow-delay="1s"></i>
                            <h3>2015</h3>
                            <p>
                                <span>Work Experince </span>Worked at New Horizons during my Industrial Traning Year</p>
                        </div>

                        <div class="wow fadeInRight" data-wow-offset="200">
                            <i class="fa fa-briefcase wow swing" data-wow-offset="200" data-wow-delay="1s"></i>
                            <h3>2017 - 2018</h3>
                            <p>
                                <span>Work Experince</span>
                                Worked at access solutions limited during my National Youth Service Year from 2017 to 2018 has a software tester....                            </p>
                        </div>

					</div>
				</div>
				
			</div>
		
		</section><!--End about section -->


		<!-- ==============================================
		SKILLS
		=============================================== -->
		<section id="skills" class="bg2">
		
			<div class="container">
				
				<div class="row">

                    <div class="col-xs-12">
                        <h1 class="big-text wow fadeInDown text-center" data-wow-offset="100">
                            <i class="fa fa-pie-chart"></i>
                             My skills
                        </h1>
                    </div>
				
					<div class="col-md-3 col-sm-6 text-center">
                        <span class="chart" data-percent="80">
                            <span class="title">HTML</span>
                            <span class="percent"></span>
                        </span>
					</div>

                    <div class="col-md-3 col-sm-6 text-center">
                        <span class="chart" data-percent="70">
                            <span class="title">PHP</span>
                            <span class="percent"></span>
                        </span>
                    </div>

                    <div class="col-md-3 col-sm-6 text-center">
                        <span class="chart" data-percent="60">
                            <span class="title">CSS</span>
                            <span class="percent"></span>
                        </span>
                    </div>

                  <div class="col-md-3 col-sm-6 text-center">
                        <span class="chart" data-percent="80">
                            <span class="title">Graphics</span>
                            <span class="percent"></span>
                        </span>
                  </div>
                    
                    


                  <!--Language-->

                    <div class="col-lg-6 col-md-6 skill10 text-center">
                        <p>English</p>
                        <i class="fa fa-circle wow fadeInLeft" data-wow-delay="0s"></i>
                        <i class="fa fa-circle wow fadeInLeft" data-wow-delay=".1s"></i>
                        <i class="fa fa-circle wow fadeInLeft" data-wow-delay=".2s"></i>
                        <i class="fa fa-circle wow fadeInLeft" data-wow-delay=".3s"></i>
                        <i class="fa fa-circle wow fadeInLeft" data-wow-delay=".4s"></i>
                        <i class="fa fa-circle wow fadeInLeft" data-wow-delay=".5s"></i>
                        <i class="fa fa-circle wow fadeInLeft" data-wow-delay=".6s"></i>
                        <i class="fa fa-circle wow fadeInLeft" data-wow-delay=".7s"></i>
                        <i class="fa fa-circle-o wow fadeInLeft" data-wow-delay=".8s"></i>
                        <i class="fa fa-circle-o wow fadeInLeft" data-wow-delay=".9s"></i>
                    </div>

                    <div class="col-lg-6 col-md-6 skill10 text-center">
                        <p>Yoruba</p>
                        <i class="fa fa-circle wow fadeInLeft" data-wow-delay="0s"></i>
                        <i class="fa fa-circle wow fadeInLeft" data-wow-delay=".1s"></i>
                        <i class="fa fa-circle wow fadeInLeft" data-wow-delay=".2s"></i>
                        <i class="fa fa-circle wow fadeInLeft" data-wow-delay=".3s"></i>
                        <i class="fa fa-circle wow fadeInLeft" data-wow-delay=".4s"></i>
                        <i class="fa fa-circle-o wow fadeInLeft" data-wow-delay=".5s"></i>
                        <i class="fa fa-circle-o wow fadeInLeft" data-wow-delay=".6s"></i>
                        <i class="fa fa-circle-o wow fadeInLeft" data-wow-delay=".7s"></i>
                        <i class="fa fa-circle-o wow fadeInLeft" data-wow-delay=".8s"></i>
                        <i class="fa fa-circle-o wow fadeInLeft" data-wow-delay=".9s"></i>
                    </div>

                    

			  </div>
				
			</div>
		
		</section><!--End skills section -->
			
		<!-- ==============================================
		PORTFOLIO
		=============================================== -->
		<section id="portfolio" class="">
		
			<div class="container">

                <h1 class="big-text orange wow fadeInDown text-center" data-wow-offset="100">
                    <i class="fa fa-th"></i>
                    My works
                </h1>
				
				<!--==== Portfolio Filters ====-->
				<div id="filter-works">
					<ul>
						<li class="active wow fadeInRight" data-wow-delay="0s">
							<a href="#" data-filter="*">All</a>
						</li>
						
						<li class="wow fadeInRight" data-wow-delay=".6s">
							<a href="#" data-filter=".webdesign">Web design</a>
						</li>
						<li class="wow fadeInRight" data-wow-delay=".9s">
							<a href="#" data-filter=".photography">Photography</a>
						</li>
					</ul>
				</div><!--End portfolio filters -->
				
			</div>
		
			<div class="container masonry-wrapper">
			
				<div id="projects-container">
				
					<!-- ==== PROJECT ITEM ==== -->
					<article class="project-item webdesign" data-toggle="modal" data-target=".project-item-1">
						<img class="img-responsive project-image" src="assets/images/wb1.png"  alt=""><!--Project thumb -->
                        <h2 class="project-title">My personal portfolio</h2><!--Project Title -->
					</article>
                    
                    <!--==== Project Modal ====-->
                    <div class="modal fade project-item-1">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"><i class="fa fa-times"></i>
</span><span class="sr-only">Close</span></button>
                             <!--Modal Title, Subtitle -->
                            <img src="assets/images/wb1.png" alt="" />
                          </div>
                          <div class="modal-body">
                            <p>www.ayodeleabigail.ml</p>
                          </div>
                        </div>
                      </div>
                    </div>
					<!-- ==== END PROJECT ITEM ==== -->	
                    <!-- ==== PROJECT ITEM ==== -->
					<article class="project-item webdesign" data-toggle="modal" data-target=".project-item-2">
						<img class="img-responsive project-image" src="assets/images/abiadmin.PNG"  alt=""><!--Project thumb -->
                        <h2 class="project-title">Administrative Panel</h2><!--Project Title -->
					</article>
                    
                    <!--==== Project Modal ====-->
                    <div class="modal fade project-item-2">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"><i class="fa fa-times"></i>
</span><span class="sr-only">Close</span></button>
                             <!--Modal Title, Subtitle -->
                            <img src="assets/images/abiadmin.PNG" alt="" />
                          </div>
                          <div class="modal-body">
                            <p>My personal portfolio  Admin Panel</p>
                          </div>
                        </div>
                      </div>
                    </div>
					<!-- ==== END PROJECT ITEM ==== -->	
                    
                    <!-- ==== PROJECT ITEM ==== -->	
					<article class="project-item webdesign" data-toggle="modal" data-target=".project-item-4">
						<img class="img-responsive project-image" src="assets/images/home.PNG"  alt=""><!--Project thumb -->
                      <h2 class="project-title">True worshiper</h2><!--Project Title -->
					</article>
                    
                    <!--==== Project Modal ====-->
                    <div class="modal fade project-item-4">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"><i class="fa fa-times"></i>
</span><span class="sr-only">Close</span></button>
                              <!--Modal Title, Subtitle -->
                            <img src="assets/images/login.PNG" alt="" />
                          </div>
                          <div class="modal-body">
                            <p>True worshiper</p>
                          </div>
                        </div>
                      </div>
                    </div>
					<!-- ==== END PROJECT ITEM ==== -->	
                    
                    
                    <!-- ==== PROJECT ITEM ==== -->
					<article class="project-item webdesign" data-toggle="modal" data-target=".project-item-9">
						<img class="img-responsive project-image" src="assets/images/eeee.PNG"  alt=""><!--Project thumb -->
                        <h2 class="project-title">Pearlsilver.ga</h2><!--Project Title -->
					</article>
                    
                    <!--==== Project Modal ====-->
                    <div class="modal fade project-item-9">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"><i class="fa fa-times"></i>
</span><span class="sr-only">Close</span></button>
                              <!--Modal Title, Subtitle -->
                            <img src="assets/images/pearl2.PNG" alt="" />
                          </div>
                          <div class="modal-body">
                            <p>www.Pearlsilver.ga is a gaming site where users can download apk for free like completely free. </p>
                          </div>
                        </div>
                      </div>
                    </div>
					<!-- ==== END PROJECT ITEM ==== -->	
                    
                                        <!-- ==== PROJECT ITEM ==== -->
					<article class="project-item webdesign" data-toggle="modal" data-target=".project-item-8">
						<img class="img-responsive project-image" src="assets/images/dashboard.PNG"  alt=""><!--Project thumb -->
                      <h2 class="project-title">Admin</h2><!--Project Title -->
					</article>
                    
                    <!--==== Project Modal ====-->
                    <div class="modal fade project-item-8">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"><i class="fa fa-times"></i>
</span><span class="sr-only">Close</span></button>
                              <!--Modal Title, Subtitle -->
                            <img src="assets/images/dashboard.PNG" alt="" />
                          </div>
                          <div class="modal-body">
                            <p>True worshiper Admin panel</p>
                          </div>
                        </div>
                      </div>
                    </div>
					<!-- ==== END PROJECT ITEM ==== -->	

				</div><!-- End projects --> 
				
			</div><!-- End container --> 
			
		
		</section><!-- End portfolio section --> 

        <!-- ==============================================
        CONTACT
        =============================================== -->
		<section id="contact" class="">
		
			<div class="container">
				
				<div class="row">

                    <div class="col-xs-12 hidden-sm hidden-xs">
                        <h1 class="big-text orange wow fadeInDown text-center" data-wow-offset="100">
                            <i class="fa fa-comments-o"></i>
                            Contact Me
                        </h1>
                    </div>
				
                    <div class="clear"></div>
                    
					<div class="col-md-6 text-right ">
                        
                        <!-- MAP -->
                        <div  class="wow fadeInLeft" data-wow-offset="100">  
                   <div class="container">
	<div class="row">
      <div class="col-md-6 text-left">
        <div class="well well-sm">
       
                               
          <form name="form" action="<?php echo $editFormAction; ?>" method="POST" class="form-horizontal" >
          <fieldset>
            <legend class="text-center">Leave me a message</legend>
                           
            <!-- Name input-->
            <span id="sprytextfield1">
            <div class="form-group">
              <label class="col-md-3 control-label" for="name">Name</label>
              <div class="col-md-9">
                <input id="name" name="name" type="text" placeholder="Your name" class="form-control">
              </div>
            </div>
            <span class="textfieldRequiredMsg">Your Name is required.</span></span>
    
            <!-- Email input-->
            <span id="email">
            <div class="form-group">
              <label class="col-md-3 control-label" for="name">Your E-mail</label>
              <div class="col-md-9">
                <input id="email" name="email" type="text" placeholder="Your email" class="form-control">
              </div>
            </div>
            <span class="textfieldRequiredMsg">Your E-mail is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span>

            <!-- Message body -->
            <span id="message">
            <div class="form-group">
              <label class="col-md-3 control-label" for="message">Your message</label>
              <div class="col-md-9">
 <textarea class="form-control" id="message" name="message" placeholder="Please enter your message here..." rows="5"></textarea>
              </div>
            </div>
            <span class="textareaRequiredMsg">A Message is required.</span></span>
    
            <!-- Form actions -->
            <div class="form-group">
              <div class="col-md-12 text-right">
                <input type="submit" class="btn btn-success btn-md" value="Submit">
              </div>
            </div>
          </fieldset>
          <input type="hidden" name="MM_insert" value="form">
          </form>
          
          <div class="alert-success text-center">
        <?php 

                                $messages = array(
                                    1=>"Message Sent Successfully",
                                    2=>"Message not sent"
                                  );

                                $message_id = isset($_GET['resp']) ? (int)$_GET['resp'] : 0;

                                if ($message_id == 1) {
                                        echo '<p class="text-success">'.$messages[$message_id].'</p>';
                                    }elseif ($message_id == 2) {
                                        echo '<p class="text-danger">'.$messages[$message_id].'</p>';
                                    }
                               ?>
                               </div>
        </div>
           
		
      </div>
	</div>
</div>     
                        
                        
                        
                        </div>
					
					</div>
                                 

				
					<!--=== Contact info ===-->
                    <div class="col-md-6 contact-info">
                        <p class="contact-text wow fadeInRight">
                            You could leave me a message or call by clicking the phone 
                            number or add me any social platform by clicking the icons below                     
                      </p>
                      <ul class="contact-list">
                            <li class="wow fadeInRight" data-wow-delay="0s">
                                <a id="mapLink" target="_blank" href="#">
                                    <i class="fa fa-map-marker"></i> 
                                    Abuja, Nigeria. 
                              </a>
                            </li>
                            <li class="wow fadeInRight" data-wow-delay="0s">
                                <a href="tel:+2347066301932">
                                    <i class="fa fa-phone"></i> +2347066301932
                              </a>
                            </li>
                            <li class="wow fadeInRight" data-wow-delay="0s">
                                <a href="Pearlsilver35@gmail.com">
                                    <i class="fa fa-envelope"></i> Pearlsilver35@gmail.com
                              </a>
                            </li>
                      </ul>
                    </div>
                    <!--=== End Contact ===-->
					
				</div>
                
				
			</div>
         
		</section><!--=== End Contact section ===-->
		
		<!-- ==============================================
		FOOTER
		=============================================== -->	
        
		
		<footer id="main-footer">
         
          <!-- FOOTER Social -->
			<div class="container">
			    <ul class="social">
                    <li class="wow fadeInRight" data-wow-delay="0s"><a href="#"><i class="fa fa-twitter"></i></a></li>
<li class="wow fadeInRight" data-wow-delay=".2s"><a href="https://www.facebook.com/profile.php?id=100006892996047&ref=bookmarks"><i class="fa fa-facebook"></i></a></li>
<li class="wow fadeInRight" data-wow-delay=".4s"><a href="https://www.instagram.com/pearlsilver35/"><i class="fa fa-instagram"></i></a></li>
                    <li class="wow fadeInRight" data-wow-delay=".6s"><a href="https://www.linkedin.com/in/ayodeleabigail/"><i class="fa fa-linkedin"></i></a></li>
                </ul>
                <p>&copy; <?php echo date('Y'); ?> - All rights reserved | <a href="" target="_blank">Made by Ayodele Abigail</a></p>
                   
			 </div>
            
		</footer><!--=== End Footer ===-->
		
		<!-- ==============================================
		SCRIPTS
		=============================================== -->

    <script src="assets/js/libs/jquery-1.11.3.min.js"></script>
	<script src="assets/js/libs/bootstrap.min.js"></script>
    <script src="assets/js/jquery.backstretch.min.js"></script>
    <script src="assets/js/jquery.easypiechart.min.js"></script>
	<script src="assets/js/jquery.masonry.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
        
    <script src="assets/js/jquery.scrollmagic.min.js"></script>
        
		        
    <script src="assets/js/scripts.js"></script>
    
    <script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["blur", "change"]});
var email = new Spry.Widget.ValidationTextField("email", "email", {validateOn:["blur", "change"]});
var message = new Spry.Widget.ValidationTextarea("message", {validateOn:["blur", "change"]}, {validateOn:["blur","change"]});
    </script>
		
		
		
</body>
	
</html>
<?php
mysql_free_result($bt);
?>
