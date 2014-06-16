<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" dir="rtl" > 
	<head>
		<title> </title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="css/style.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
		
		<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
		<script src="js/init.js"></script>
		
		
		
	</head>
	<body class="homepage">
	
		<div id="header-bar">
			<a href="#" class="image"><img src="css/images/mazaltov.png" alt="" /></a>
		</div>	
	
		<div id="main">
		
				<!-- Iphone -->
					<div id="phone">
						<img src="css/images/iphone.png" alt="" />
					</div>
					

				<!-- Content -->
					<div id="content">
						
						<div class="content">
								
						<!-- Logo -->
							<h1><a href="#" id="logo"><span class="round">Glance</span></a></h1>
							
							<div class="mobile-wrapper">
							
								<h2>
									אנחנו יודעים שיש לכם צלם לחתונה,<br />
									אבל מה אם היו לכם 200 או 400 ?<br />
									עם glance זה אפשרי ובחינם!
								</h2>
								

								<p>
									glance הינה אפליקציית צילום חברתית שיוצרת אלבום
									<br />תמונות משותף לכם ולכל החברים שלכם. אז איך זה עובד?
								</p>
								
								<ul class="features">
									<li><img src="css/images/icon1.png" alt="" /><span class="f1"> פותחים אלבום חתונה </span></li>
									<li><img src="css/images/icon2.png" alt="" /><span class="f2"> שולחים רשימת מוזמנים </span></li>
									<li><img src="css/images/icon3.png" alt="" /><span class="f3"> כל האורחים מתחברים<br />לאלבום ומצלמים תמונות! </span></li>
								</ul>
								
								<p>תמונות
									עם glance לא תצטרכו לחכות לצלם שיוריד את התמונות,<br />
									לתרץ לחברים שכבר מתים לראות את כל הרגעים הגדולים<br />
									ואיך הם יצאו... ובעיקר לא תפספסו אף רגע חד פעמי!
								</p>
								
								<div class="poptrox">
									<a class="button">להתקנת האפליקציה בחינם!</a>
								</div>
								
								<div class="mobile-button">
									<a class="button" href="https://www.useglance.com/app/">להתקנת האפליקציה בחינם!</a>
								</div>								
																
							</div>
							
						</div>
							
					</div>

		</div>
		
		<div class="popup">
		
			
			
			<div class="form">
			
				<script type="text/javascript">

				$(document).ready(function() {

					$(".submit").click(function() {
					
						//get input field values
						
						var user_name       = $('input[name=fname]').val();
						var user_email      = $('input[name=femail]').val();
						var user_phone      = $('input[name=fphone]').val();
					   
						var proceed = true;
						
						if(user_name==""){
							$('input[name=fname]').focus();
							proceed = false;
						}
						if(user_email==""){
							$('input[name=femail]').focus();
							proceed = false;
						}
						if(user_phone=="") {    
							$('input[name=fphone]').focus();
							proceed = false;
						}

						//everything looks good! proceed...
						if(proceed)
						{
							//data to be sent to server
							post_data = {'userName':user_name, 'userEmail':user_email, 'userPhone':user_phone};
						   
							//Ajax post data to server
							$.post('email.php', post_data, function(response){  

								//load json data from server and output message    
								if(response.type == 'error')
								{
									output = '<div class="error">'+response.text+'</div>';
								}else{
							   
									output = '<div class="success">'+response.text+'</div>';
								   
									//reset values in all input fields
									$('#contact_form input').val('');
								   
								}
							   
								$("#result").hide().html(output).show();
							}, 'json');
						   
						}
					});
				   
					//reset previously set border colors and hide all message on .keyup()
					$("#contact_form input, #contact_form textarea").keyup(function() {
					 
						$("#result").hide();
					});
				   
				});
				</script>		
			
					<div class="closer">X</div>
		
					<header>
						<h1><img src="css/images/logo-alt.png" alt="glance" /></h1>
						<h2>
							לקבלת לינק להתקנת האפליקציה<br />
							בחינם השאירו מספר טלפון
						</h2>
					</header>
					
					<div id="contact_form">	
					
						<div id="result"></div>		
						
						<form method="post" action="#">
											
							
											
							<input type="text" id="fphone" name="fphone" class="text" placeholder="טלפון" />
											
							
				
							<a class="button submit" href="#">שלח</a>
											
						</form>
						
					</div>
										
					<footer>
							או חייגו עכשיו 03-5282088
					</footer>
										
			</div>	
			
		</div>

	</body>
</html>
