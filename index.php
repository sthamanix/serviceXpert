<?php 
require_once("include/initialize.php"); 
$content='home.php';
$view = (isset($_GET['q']) && $_GET['q'] != '') ? $_GET['q'] : '';
switch ($view) { 
	case 'apply' :
        $title="Booking Service";	
		$content='applicationform.php';		
		break;
	case 'login' : 
        $title="Login";	
		$content='login.php';		
		break;
	case 'company' :
        $title="Serviceman";	
		$content='company.php';		
		break;
	case 'hiring' :
		$title = isset($_GET['search']) ? 'Hiring in '.$_GET['search'] :"Hiring"; 
		$content='hirring.php';		
		break;		
	case 'category' :
        $title='Search for '. $_GET['search'];	
		$content='category.php';		
		break;
	case 'viewjob' :
        $title="Service Details";	
		$content='viewjob.php';		
		break;
	case 'success' :
        $title="Success";	
		$content='success.php';		
		break;
	case 'register' :
        $title="Register New Member";	
		$content='register.php';		
		break;
	case 'Contact' :
        $title='Contact Us';	
		$content='Contact.php';		
		break;	
	case 'About' :
        $title='About Us';	
		$content='About.php';		
		break;	
	case 'advancesearch' :
        $title=' Search';	
		$content='advancesearch.php';		
		break;	

	case 'result' :
        $title=' Search';	
		$content='advancesearchresult.php';		
		break;
	case 'search-company' :
        $title='<div class="row row-pb-md">
		<div class="col-md-6 animate-box">
			<h3>Get In Touch</h3>
			<form action="#">
				<div class="row form-group">
					<div class="col-md-12">
						<label class="sr-only" for="name">Name</label>
						<input type="text" id="name" class="form-control" placeholder="Your name">
					</div>
					
				</div>

				<div class="row form-group">
					<div class="col-md-12">
						<label class="sr-only" for="email">Email</label>
						<input type="text" id="email" class="form-control" placeholder="Your email address">
					</div>
				</div>

				<div class="row form-group">
					<div class="col-md-12">
						<label class="sr-only" for="subject">Subject</label>
						<input type="text" id="subject" class="form-control" placeholder="Your subject of this message">
					</div>
				</div>

				<div class="row form-group">
					<div class="col-md-12">
						<label class="sr-only" for="message">Message</label>
						<textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Write us something"></textarea>
					</div>
				</div>
				<div class="form-group">
					<input type="submit" value="Send Message" class="btn btn-primary btn-lg">
				</div>

			</form>		
		</div>
		<div class="col-md-5 col-md-push-1 animate-box">
			
			<div class="gtco-contact-info">
				<h3>Contact Information</h3>
				<ul>
					<li class="address">Chandragiri Hills, <br>Manish Shrestha</li>
					<li class="phone"><a href="tel://180098765432">1800 9876 5432</a></li>
					<li class="email"><a href="mailto:info@servicexpert.com">info@servicexpert.com</a></li>
					<li class="url"><a href="index.php">www.servicexpert.com</a></li>
				</ul>
			</div>


		</div>
	</div>';	
		$content='searchbycompany.php';		
		break;	
	case 'search-function' :
        $title='Search by Function';	
		$content='searchbyfunction.php';		
		break;	
	case 'search-jobtitle' :
        $title='Search by Job Title';	
		$content='searchbytitle.php';		
		break;						
	default :
	    $active_home='active';
	    $title="Home";	
		$content ='home.php';		
}
require_once("theme/templates.php");
?>