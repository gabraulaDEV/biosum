<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">  
	    <title>Admin - Login</title>
        <meta name="description" content="Login administración">
        <meta name="author" content="Design view template: templatemo - Development: danieldmc123@hotmail.com , vapedraza1706@gmail.com">
        <!-- 
        Visual Admin Template
        http://www.templatemo.com/preview/templatemo_455_visual_admin
        -->
        <link rel="shortcut icon" type="image/x-icon" href=<?php echo base_url()."assets/images/icon.ico"; ?> />
	    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet' type='text/css'>
	    <link href=<?php echo base_url()."assets/admin/css/font-awesome.min.css"; ?> rel="stylesheet">
    	<link href=<?php echo base_url()."assets/admin/css/bootstrap.min.css"; ?> rel="stylesheet">
    	<link href=<?php echo base_url()."assets/admin/css/dashboard-style.css"; ?> rel="stylesheet">
    	<link href=<?php echo base_url()."assets/admin/css/alerts.css"; ?> rel="stylesheet">
	    
	    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->

 <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-125425472-1"></script>
    <script>
     window.dataLayer = window.dataLayer || [];
     function gtag(){dataLayer.push(arguments);}
     gtag('js', new Date());

     gtag('config', 'UA-125425472-1');
	  </script>
	</head>
	<body class="light-gray-bg">
		<?php
			/*Manejando algún tipo de error con alert de CSS*/
			if(isset($error))
			{
				echo "<div id='alert' onClick='exit()' class='alert_error'><b>".$error."</b></div>";
				echo "<script>";
				echo "function exit(){document.getElementById('alert').style.display='none'};";
				echo "</script>";
			}
		?>
		<div class="templatemo-content-widget templatemo-login-widget white-bg">
			<header class="text-center">
	          <div><image src=<?php echo base_url()."assets/images/logo.png"; ?> alt="Biosuministros" width="250px" style="margin-bottom:15px;" /></div>
	          <h1>Login</h1>
	        </header>
	        <form class="templatemo-login-form" method="post" action=<?php echo base_url().index_page()."/adminPanel/login/index";?>>
	        	<div class="form-group">
	        		<div class="input-group">
		        		<div class="input-group-addon"><i class="fa fa-user fa-fw"></i></div>	        		
		              	<input type="text" name="itUser" class="form-control" placeholder="ejemplo@dominio.com">           
		          	</div>	
	        	</div>
	        	<div class="form-group">
	        		<div class="input-group">
		        		<div class="input-group-addon"><i class="fa fa-key fa-fw"></i></div>	        		
		              	<input type="password" name="itPass" class="form-control" placeholder="******">           
		          	</div>	
	        	</div>	          	
	          
				<div class="form-group">
					<button type="submit" class="templatemo-blue-button width-100">Login</button>
				</div>
	        </form>
		</div>
	</body>
</html>