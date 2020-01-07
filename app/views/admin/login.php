<!DOCTYPE html>
<html>
<head>
	<title>Login Admin</title>
	<!-- meta_tags-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="connective login form a Flat Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
	<!-- Meta_tag_Keywords -->
	<link href="/public/admin/stylesheets/login.css" rel="stylesheet" type="text/css" media="all"><!--style_sheet-->
	<link href="/public/admin/stylesheets/font-awesome.min.css" rel="stylesheet" type="text/css" media="all"><!--font_awesome_icons-->
	<!--web_fonts-->
	<link href="//fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900&amp;subset=latin-ext" rel="stylesheet">
	<!--//web_fonts-->
	<body>
		<script src='//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script><script src="//m.servedby-buysellads.com/monetization.js" type="text/javascript"></script>
		<div class="form">
			<h1>Comicola Management</h1>
			<div class="form-content">
				<form action="/admin/DoLogin" method="post">
					<div class="form-info">
						<h2>Login</h2>
						<!---728x90--->

					</div>
					<div class="email-w3l">
						<span class="i1"><i class="fa fa-envelope" aria-hidden="true"></i></span>
						<input class="email" type="text" name="username" placeholder="Username" required="">
					</div>
					<div class="pass-w3l">
						<span class="i2"><i class="fa fa-unlock" aria-hidden="true"></i></span>
						<input class="pass" type="password" name="password" placeholder="Password" required="">
					</div>
					<div class="form-check">
						<p style="color:#fff;padding:10px;font-style:italic"><?php if (isset($_SESSION['noUserFound'])) {
							echo $_SESSION['noUserFound'];
						}?></p>
					</div>
					<div class="submit-agileits">
						<input class="login" type="submit" value="login">
					</div>
				</form>
			</div>
		</div>
		<!---728x90--->
		<footer>&copy; 2018 NhaAn login form. All rights reserved | Design by <a href="#">NhaAn</a></footer>
		<!---728x90--->
	</body>
	</html>
