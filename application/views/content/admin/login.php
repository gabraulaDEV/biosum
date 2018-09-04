<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
  <title>Administrador</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href=<?php echo base_url()."assets/images/icon.ico"; ?> />
  <link rel="stylesheet" href= <?php echo base_url()."assets/css/adminindex.css"; ?> />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <script type="text/javascript">  
    window.onload=function()
    {
      
    }

  </script>
</head>
<body>
	<div class="content">
		<form method="post" action=<?php echo base_url()."index.php/admin/login";?> >
			<div class="icon">
				<image class="logo" src=<?php echo base_url()."assets/images/logo.png"; ?> />
			</div>
			<div class="label">
				Usuario:
				<input type="text" name="itUser">
			</div>
			<div class="label">
				Contraseña:
				<input type="password" name="itPass">
			</div>
			<div class="label">
				<input class="submit" type="submit" value="LOGIN">
			</div>			
		</form>
	</div>	
</body>
</html>
