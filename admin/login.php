<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="eLearning is a modern and fully responsive Template by WebThemez.">
	<meta name="author" content="webThemez.com">
	<title>eLearning - Free Educational Responsive Web Template </title>
	<link rel="favicon" href="assets/images/favicon.png">
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen">
	<link rel="stylesheet" type="text/css" href="assets/css/da-slider.css" />
	<link rel="stylesheet" href="assets/css/style.css">
<style>
th, td {
    padding:5px;   
}
</style>
</head>
<body>
	<?php
		include "nav.php";
		$strconn=mysqli_connect("localhost","root","","project");
		if(!$strconn)
			echo "Connection failed".mysqli_connect_error();
		else{}
	?>
	<header id="head" class="secondary">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <h1>Admin</h1>
                </div>
            </div>
        </div>
    </header>
	<br>
	<form action="" method="post">
		<table border=0 align="center">
			<tr>
				<td><label>Admin Login:</label></td>
				<td><input type="text" class="form-control" name="id" placeholder="User Name"></td>
			</tr>
			<tr>
				<td><label> Admin Password:</label></td>
				<td><input type="password" class="form-control" name="pass" placeholder="Password"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><button name="btnsubmit" class="btn btn-block">Đăng Nhập</button></td>
			</tr>
		</table>
	</form>
	
	<?php
	if(!empty($_POST['id'])&&!empty($_POST['pass']))
	{
		if(isset($_POST['btnsubmit']))
		{
			$name = $_POST["id"]; 
            $password = $_POST["pass"]; 
			$query = "SELECT * FROM admin_info WHERE UserName='$name' and Password='$password'";
			$result = mysqli_query($strconn,$query);
			$count = mysqli_num_rows($result);
			if($count==1)
			{
				session_start();
				//session_id("my_session");
				$_SESSION["username"]=$_POST['id'];
				//header("location:user/index.php");
				echo("<script>location.href = './index.php';</script>");
			}
			else
			{
				echo "<div class='alert alert-danger' role='alert'>Username or password is incorrect..Try again</div>";
			}
		}
	}?>
	<?php
	?>
</body>
</html>