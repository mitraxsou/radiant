<?php
require 'PHPMailerAutoload.php';
require 'class.phpmailer.php';

$mail = new PHPMailer();
$mailInside = new PHPMailer();

/**** Outside mail configuration****/  
$mail->IsSMTP();   
$mail->Host = "smtp.example.com";
$mail->SMTPAuth = true;                
$mail->SMTPSecure = "ssl";              // sets the prefix to the servier
$mail->Host = "smtp.zoho.com";        // sets Gmail as the SMTP server
$mail->Port = 465; 

$mail->Username = "no-reply@interiorradiant.com";  // Gmail username
$mail->Password = "interiorradiant";      // Gmail password

$mail->CharSet = 'windows-1250';
$mail->SetFrom ('no-reply@interiorradiant.com', 'Radiant Interior');
$mail->AddReplyTo("contact@interiorradiant.com","Interior Radiant");
/****Ends****/

/**** Inside mail configuration****/    
$mailInside->IsSMTP();  
//$mailInside->Host = "smtp.example.com";  
$mailInside->SMTPAuth = true;               
$mailInside->SMTPSecure = "ssl";              // sets the prefix to the servier
$mailInside->Host = "smtp.zoho.com";        // sets Gmail as the SMTP server
$mailInside->Port = 465;       
$mailInside->Username = "no-reply@interiorradiant.com";  // Gmail username
$mailInside->Password = "interiorradiant";      // Gmail password
$mailInside->CharSet = 'windows-1250';
$mailInside->SetFrom ('no-reply@interiorradiant.com', 'Radiant Interior');
$mail->AddReplyTo("contact@interiorradiant.com","Radiant Interior");
/**Ends**/

if(isset($_REQUEST["submitBtn"])){
$name=$_REQUEST["inputName"];
$email=$_REQUEST["inputEmail"];	
$subject=$_REQUEST["inputSubject"];
$content=$_REQUEST["inputContent"];
$mail->Subject = 'Radiant Interior';
$mail->ContentType = 'text/plain'; 
$mail->IsHTML(false);
$mail->Body = 'Hi '.$name."!"."\n".'Thank you, for writing to us. We will get back to you shortly.'."\n\n\n"."Team Radiant Interior"
				."\n"."Address- 39F/1b, Broad Street - Kolkata 700019"."\n"."Phone- +91 - 9830828319 or 9831164269"."\n"."Email- contact@interiorradiant.com";

// you may also use $mail->Body = file_get_contents('your_mail_template.html');

$mail->AddAddress ($email, $name);     
// you may also use this format $mail->AddAddress ($recipient);

if(!$mail->Send()) 
{
        $error_message = "Mailer Error: " . $mail->ErrorInfo;
        header('Location: error.php');
} else 
{
        $error_message = "Successfully sent!";
        $mailInside->Subject = 'New Query Received from our website: '.$subject;
		$mailInside->ContentType = 'text/plain'; 
		$mailInside->IsHTML(false);
		$mailInside->Body = 'You have a new Query!!'."\n\n"."Person Name : ".$name."\n\n"."Query is : ".$content; 
// you may also use $mail->Body = file_get_contents('your_mail_template.html');

		$mailInside->AddAddress ('contact@interiorradiant.com', 'Radiant Interior');  
		if(!$mailInside->Send()){
				$error_message = "Mailer Error: " . $mailInside->ErrorInfo;
				//echo $error_message;
				header('Location: error.php');
		}
		else{
			$error_message = "Successfully sent!";
			echo $error_message;
			header('Location: email.php');
		}
		
}
//header('Location: email.php');

}
else{

?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Radiant Interior</title>
    <meta name="description" content="Radiant Interior Kolkata - One stop for all your home interior needs ">
    <meta name="keywords" content="Radiant Interior flase ceiling marbel floor painting interior and exterior lighting wardrobe">
    
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:400,300|Raleway:300,400,900,700italic,700,300,600">
    <link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <link rel="apple-touch-icon" sizes="57x57" href="img/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="img/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="img/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="img/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="img/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="img/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="img/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
	<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MDSN6H6');</script>
<!-- End Google Tag Manager -->
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

        <script src="https://code.jquery.com/jquery-1.12.4.js">
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js">
        </script>    


  </head>
  <body>
	<!--google analytics -->
	
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-101939110-1', 'auto');
  ga('send', 'pageview');

</script>
<!--end of google analytics -->
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MDSN6H6"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->


    <div class="loader"></div>
    <div id="myDiv">
    <!--HEADER-->
    <div class="header">
      <div class="bg-color">
        <header id="main-header">
        <nav class="navbar navbar-default navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">Radiant<span class="logo-dec"> Interior</span><br><label style="font-size: x-small">A unit of Radiant Infrastructure</label></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar" >
              <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="#main-header">Home</a></li>
                <li class=""><a href="#feature">About</a></li>
				<li class=""><a href="#portfolio">Recent-Works</a></li>
                <li class=""><a href="#service">Services</a></li>
                <!-- <li class=""><a href="#testimonial">Testimonial</a></li> -->
                <li class=""><a href="#bouquet">Bouquet</a></li>
                <li class=""><a href="#contact">Contact Us</a></li>
              </ul>
            </div>
          </div>
        </nav>
        </header>
       <div class="wrapper">
        <div class="container">
          <div class="row">
            <div class="banner-info text-center wow fadeIn delay-05s">
              <h2 class="pad-bt15"></h2>
              <h2 class="bnr-sub-title pad-bt15">Here is your one stop solution for all your interior and exterior need</h2>
              
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>
    <!--/ HEADER-->
    <!---->
    <section id="feature" class="section-padding wow fadeIn delay-05s">
      <div class="container">
        <div class="row">
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="wrap-item text-center">
              <div class="item-img">
                <img src="img/ser01.png">
              </div>
              <h3 class="pad-bt15">Affordability</h3>
              <p>Get an interior design you'll love – at a price you'll love even more! It's easy with Radiant Interior. Let our team of accomplished designers submit concepts for your space</p>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="wrap-item text-center">
              <div class="item-img">
                <img src="img/ser02.png">
              </div>
              <h3 class="pad-bt15">On Time Delivery</h3>
              <p>We know "Time Matters" to you and hence we promise to value your time. What is promised..is delivered on time..no excuses</p>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="wrap-item text-center">
              <div class="item-img">
                <img src="img/ser03.png">
              </div>
              <h3 class="pad-bt15">Space utilization</h3>
              <p>An inch matters...Maximize space with vertical storage shelving in your pantry, use drawer organizers for dry goods and food storage containers. ... Small interiors don't have to be a challenge anymore</p>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="wrap-item text-center">
              <div class="item-img">
                <img src="img/ser04.png">
              </div>
              <h3 class="pad-bt15">Customized Solution</h3>
              <p>Your taste matters too...Customize your home with the wide variety of ... With Our Design Experts For Your Custom Needs.</p>
            </div>  
          </div>
        </div>
      </div>
    </section>
    <!---->
    <!---->
	
	
	
	<section id="portfolio" class="section-padding wow fadeInUp delay-05s">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="service-title pad-bt15">Our Recent Works</h2>
           
			<p class="sub-title pad-bt15">Our recent work in <span>Ideal Niketan</span> Tangra</p>
			<hr class="bottom-line">
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item padding-right-zero mr-btn-15">
            <figure>
              <img src="img/port01.jpg" class="img-responsive">
              <figcaption>
                  <h2>Class Living Room</h2>
                  
              </figcaption>
            </figure>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item padding-right-zero mr-btn-15">
            <figure>
              <img src="img/port02.jpg" class="img-responsive">
              <figcaption>
                  <h2>World class wardrobe</h2>
                  
              </figcaption>
            </figure>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item padding-right-zero mr-btn-15">
            <figure>
              <img src="img/port03.jpg" class="img-responsive">
              <figcaption>
                  <h2>Happy Walls</h2>
                  
              </figcaption>
            </figure>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item padding-right-zero mr-btn-15">
            <figure>
              <img src="img/port04.jpg" class="img-responsive">
              <figcaption>
                  <h2>Make Your home brand new with great interiors and exterior...</h2>
                  
              </figcaption>
            </figure>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item padding-right-zero mr-btn-15">
            <figure>
              <img src="img/port05.jpg" class="img-responsive">
              <figcaption>
                  <h2>Redesign Your Home with False Ceiling</h2>
                  
              </figcaption>
            </figure>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item padding-right-zero mr-btn-15">
            <figure>
              <img src="img/port06.jpg" class="img-responsive">
              <figcaption>
                  <h2>Match your exterior with interior</h2>
                  
              </figcaption>
            </figure>
          </div>
		  
		  <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item padding-right-zero mr-btn-15">
            <figure>
              <img src="img/port07.jpg" class="img-responsive">
              <figcaption>
                  <h2>Match your Lighting with interior</h2>
                  
              </figcaption>
            </figure>
          </div>
		  
		  <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item padding-right-zero mr-btn-15">
            <figure>
              <img src="img/port08.jpg" class="img-responsive">
              <figcaption>
                  <h2>Great use of space</h2>
                  
              </figcaption>
            </figure>
          </div>
		  
		  <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item padding-right-zero mr-btn-15">
            <figure>
              <img src="img/port09.jpg" class="img-responsive">
              <figcaption>
                  <h2>Magnificient Walls</h2>
                  
              </figcaption>
            </figure>
          </div>
		  
        </div>
      </div>
    </section>
	
	<!--->
	<!---->
	
    <section id="service" class="section-padding wow fadeInUp delay-05s">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="service-title2 pad-bt15">What do We do?</h2>
            <p class="sub-title2 pad-bt15">We do everything to make your home or workspace look more beautiful and precious without losing an inch. Call us for a demo to know how !!</p>
            <hr class="bottom-line">
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="service-item">
              <h3><span>C</span>ustomized Flooring</h3>
              <p>We deal with marble, vitrified tiles, granite, mosaic</p>
              <a href="#contact">learn more...</a>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="service-item">
              <h3><span>E</span>xterior paints </h3>
              <p>We have a set of well-trained people to paint your walls and ceiling</p>
              <a href="#contact">learn more...</a>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="service-item">
              <h3><span>F</span>alse Ceiling</h3>
              <p>Radiant Interior also has a well-defined catalog of the false ceiling which will make your interior look great. We deal with Plaster of Paris, Gypsum board, wooden false ceiling</p>
              <a href="#contact">learn more...</a>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="service-item">
              <h3><span>D</span>esigned walls </h3>
              <p>We also provide furniture suitable for your interior, which will make your walls well defined.</p>
              <a href="#contact">Learn more...</a>
            </div>
          </div>
         </div>

        <!--2nd row-->
        <div class="row">
          
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="service-item">
              <h3><span>B</span>eautiful Gates</h3>
              <p>Install gates which feed your need. It will not only secure your home but also look good. </p>
              <a href="#contact">learn more...</a>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="service-item">
              <h3><span>W</span>all Cabinets</h3>
              <p>We have a variety of wall cabinets, stainless steel modular fittings, granite counter top too</p>
              <a href="#contact">learn more...</a>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="service-item">
              <h3><span>P</span>lumbing Works</h3>
              <p>We have also a set of well-trained plumbers who can fit and fix any of your plumbing need (shower, tiles or sink etc)</p>
              <a href="#contact">learn more...</a>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="service-item">
              <h3><span>E</span>lectronic Works</h3>
              <p>Nothing is complete without an electric or electronic decor. We are at Radiant Interior also take care of your house electrical need.</p>
              <a href="#contact">Learn more...</a>
            </div>
          </div>



          
        </div>
      </div>
    </section>
    <!---->
    <!---->
    <!---->
    <!---->
    
    <!---->
    <!---->
	<!-- 
    <section id="testimonial" class="wow fadeInUp delay-05s">
      <div class="bg-testicolor">
        <div class="container section-padding">
        <div class="row">
          <div class="testimonial-item">
            <ul class="bxslider">
              <li>
                <blockquote>
                  <img src="img/sudhir.png" class="img-responsive">
                  <p>I am really very please and surprised with their work. I am luck to have them in my house..</p>
                </blockquote>
                <small>Sudhir Mitra, Client</small>
              </li>
              <li>
                <blockquote>
                  <img src="img/mosiur.png" class="img-responsive">
                  <p>They make my home more desirable and I can't live one day outside my home. I am very happy with your work and ...</p>
                </blockquote>
                <small>Mosiur Rahman, Client</small>
              </li>
              <li>
                <blockquote>
                  <img src="img/shusma.png" class="img-responsive">
                  <p>You should come to my house and look at my tiles and floor. They are so amazing, I had never imagined before...</p>
                </blockquote>
                <small>Shusma Sengupta, Client</small>
              </li>
              <li>
                <blockquote>
                  <img src="img/tarun.png" class="img-responsive">
                  <p>My house looks better than my office interior, I am speechless..Thank you</p>
                </blockquote>
                <small>Tarun Mohanti, Client</small>
              </li>
            </ul>
          </div>
        </div>
        </div>
      </div>
    </section>
      <!---->
	
	 -->
    <section id="bouquet" class="section-padding wow fadeInUp delay-05s">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="service-title pad-bt15">Our Bouquet of services</h2>
            <p class="sub-title pad-bt15"> Best Quality within budget </p>
            <hr class="bottom-line">
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="bouquet-sec">
              <div class="bouquet-img">
                <a href="#contact">
                  <img src="img/bouquet01.jpg" class="img-responsive">
                </a>
              </div>
              <div class="bouquet-info">
                <h2>Living Room</h2>
                
                <p>The Living Room gives the next impression for the whole house design after looking at its exterior. It is where visitors are received and most of the time becomes the venue for long talks. This part of the house must give relaxation apart from the bedroom and this is where several designs come out. Designers or Homeowners would either want it colorful in style or minimal</p>
                
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="bouquet-sec">
              <div class="bouquet-img">
                <a href="#contact"">
                  <img src="img/bouquet02.jpg" class="img-responsive">
                </a>
              </div>
              <div class="bouquet-info">
                <h2>Customized Flooring</h2>
                
                <p>Looking for a custom floor? Our community of builders and artisans can build custom flooring out of any material and design you want. Custom floors for any budget. One of a kind and creative flooring for your commercial space is easier and closer than you realize. Let us show you the way</p>
                
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="bouquet-sec">
              <div class="bouquet-img">
                <a href="#contact">
                  <img src="img/bouquet03.jpg" class="img-responsive">
                </a>
              </div>
              <div class="bouquet-info">
                <h2>Exterior & Interior Paint</h2>
                
                <p>Interior paint is made to be scrubbed, resist staining, and allow cleaning. Exterior paints are made to combat against fading and mildew. The lack of certain environment-specific additives gives interior paints a disadvantage when used on external surfaces, and the difference between interior and exterior-formulated paints doesn't end there. Let us help you with that</p>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!---->
    <section id="contact" class="section-padding wow fadeInUp delay-05s">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center white">
            <h2 class="service-title pad-bt15">Keep in touch with us</h2>
            <p class="sub-title pad-bt15" > Don't think twice go ahead and pick your phone and dial Radiant Interior<br>We will be at your doorstep at your convenience</p>
            <hr class="bottom-line white-bg">
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="loction-info white">
              <p><i class="fa fa-map-marker fa-fw pull-left fa-2x"></i>39F/1b,Broad Street<br>Kolkata 700019</p>
              <p ><i class="fa fa-envelope-o fa-fw pull-left fa-2x"></i>contact@interiorradiant.com</p>
              
			  <p><i class="fa fa-phone fa-fw pull-left fa-2x"></i>+91 - 9831164269 </p>
			  <p><i class="fa fa-phone fa-fw pull-left fa-2x"></i>+91 - 9830828319 </p>
            </div>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="contact-form" >
                <div id="sendmessage">Your message has been sent. Thank you!</div>
                <div class="help-block with-errors"></div>
                <div id="errormessage"></div>
                <form data-toggle="validator" role="form" method="POST" action="<?php $_PHP_SELF?>">

                  <div class="form-group">
                      
                      <input class="form-control" data-error="Please enter name field." id="inputName" placeholder="Name" name="inputName" type="text" required />
                      <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                    
                    <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="inputEmail" required>
                    <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                    
                    <div class="form-group">
                      <input type="text" data-minlength="5" class="form-control" id="inputSubject" name="inputSubject" data-error="must enter minimum of 5 characters" placeholder="Subject" required>
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>

                  <div class="form-group">
                      
                      <textarea class="form-control" data-error="Enter Your message/enquiry here" id="inputContent" name="inputContent" placeholder="Looking for interior Solution" required=""></textarea>
                      <div class="help-block with-errors"></div>
                  </div>
                  <!-- <div class="form-group">
                    <div class="g-recaptcha" class="form-control" required="" data-sitekey="6LdJaSYUAAAAAInUNiEwo7vwC2dOjIJUQIQef4HK"></div>
                  </div> -->
                  <div >
                      <button  type="submit" name="submitBtn" id="submitBtn" class="btn btn-primary">
                          Submit
                      </button>
                  </div>
                </form>
              
            </div>
          </div>
        </div>
      </div>
    </section>
    <!---->
    <!---->
    <footer id="footer">
      <div class="container">
        <div class="row text-center">
          <p>2017 &copy; Radiant Interior. All Rights Reserved.</p>
          <div class="credits">
          
            Designed  by <a href="#">Radiant Interior [ A unit of Radiant Infrastructure ]</a>
        </div>
        </div>
      </div>
    </footer>
    <!---->
  </div>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/jquery.bxslider.min.js"></script>
    <script src="js/custom.js"></script>
     <script src="contactform/contactform.js"></script>
    <script type="text/javascript">
      $(document).on('click', function(event){
      var $clickedOn = $(event.target),
          $collapsableItems = $('.collapse'),
          isToggleButton = ($clickedOn.closest('.navbar-toggle').length == 1),
          isLink = ($clickedOn.closest('a').length == 1),
          isOutsideNavbar = ($clickedOn.parents('.navbar').length == 0);

      if( (!isToggleButton && isLink) || isOutsideNavbar ) {
        $collapsableItems.each(function(){
          $(this).collapse('hide');
        });
      }
    });
    </script> 
    <!-- validation -->

        <script src="https://code.jquery.com/jquery-1.12.4.js">
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js">
        </script>
    <!-- End validation -->
    <!--gcaptch -->
     <!--<script type="text/javascript">
      window.onload = function() {
    var $recaptcha = document.querySelector('#g-recaptcha-response');

    if($recaptcha) {
        $recaptcha.setAttribute("required", "required");
      }
      };
    </script> -->
    <!--end captch-->
  </body>
</html>
<?php
}
?>