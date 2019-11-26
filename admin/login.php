<?php
if(!defined('security')){
die('Bạn không thể truy cập trang này');

}	
	if(isset($_POST['sbm'])){
		$email = $_POST['mail'];
		$pass = md5($_POST['pass']);
		$captcha=$_POST['g-recaptcha-response'];
        if(!$captcha){
		$erro = '<div class="alert alert-danger">Please check the the captcha form</div>';
        }
        $secretKey = "6Ldqh8QUAAAAABsJlIdFNcEhQ-GEAxOEQ3bXtRLO";
        $ip = $_SERVER['REMOTE_ADDR'];
        // post request to server
        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
        $response = file_get_contents($url);
        $responseKeys = json_decode($response,true);
        // should return JSON with success as true
        if($responseKeys["success"]) {
			$sql="SELECT * FROM user WHERE user_mail='$email' AND user_pass='$pass'";
			$query=mysqli_query($conn,$sql);// hàm thực thi 
			$row=mysqli_num_rows($query);// đếm
			if($row>0){
				$remember = $_POST['remember'];
				if($remember=='remember me'){
					setcookie("name_login", $email, $time_cookie, "/","", 0);
				}else{
				$_SESSION ['mail'] = $email;		
				$_SESSION ['pass'] = $pass;	
				}
				header('location:index.php');
			}
			else {
				$erro = '<div class="alert alert-danger">Tài khoản không hợp lệ !</div>';
			
			}
        } 
		
	}
	
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Vietpro Mobile Shop - Administrator</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/bootstrap-table.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<script src='https://www.google.com/recaptcha/api.js'></script>
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>

<body>
	
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Vietpro Mobile Shop - Administrator</div>
				<div class="panel-body">
					<!-- kiểm tra lỗi -->
					<?php   if(isset($erro)){echo $erro;}    ?>
					<!-- kết thúc kiểm tra lỗi -->
					<form role="form" method="post">
						<fieldset>
							<div class="form-group">
								<input class="form-control" required placeholder="E-mail" name="mail" type="email" autofocus>
							</div>
							<div class="form-group">
								<input class="form-control" required placeholder="Mật khẩu" name="pass" type="password" value="">
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="remember me">Nhớ tài khoản
								</label>
							</div>
							<div class="g-recaptcha float-right" data-sitekey="6Ldqh8QUAAAAANeeRhE-NPae4WhkJw4BmRFgTWI2"></div>
							<button type="submit" class="btn btn-primar" name="sbm">Đăng nhập</button>
							
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	

</body>

</html>
