<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Login Screen Project - Made by Abdulmecit Demirhan</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>
<body>
	<div id="giris"> 
		<div class="resim">

			<div class="kg">
				<h1>Login</h1>
				<p><?php echo validation_errors(); ?></p>
				<?php echo form_open('') ?>
				Username:<br>
				<input type="text" class="email" name="username"></input><br>
				Password:<br>
				<input type="password"  class="sifre" name="password"></input><br>
				<input type="submit" class="buton" value="Login"></input>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</body>
</html>
<style>
body{

	background: white;
	font-family: 'Montserrat', sans-serif;

}

#giris {
	
	background:white;
	width:500px;
	height:500px;
	margin-top:90px;
	margin-left:auto;
	margin-right: auto;
	border-radius:15px;
	-webkit-box-shadow: 0 15px 10px -10px rgba(0, 0, 0, 0.5), 0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
	-moz-box-shadow: 0 15px 10px -10px rgba(0, 0, 0, 0.5), 0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
	box-shadow: 0 15px 10px -10px rgba(0, 0, 0, 0.5), 0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
}
.kg h1{
	
	font-size:25px;
	margin-top:-90px;
	position:relative;
	top:-50px;

}
.kg p{
	
	
	font-size:15px;
	position:relative;
	top:-45px;
}
.kg a {
	width:90px;
	height:30px;
	text-decoration:none;
	color:blue;
	font-size:10px;
	position:relative;
	top:-15px;
	left:55px;
}
.resim {
	
	background:url(<?php echo base_url('assets/img/login-header.jpg') ?>) ;
	background-repeat:no-repeat;
	background-size: cover;
	width:170px;
	height:460px;
	padding:20px;
	border-top-left-radius:15px;
	border-bottom-left-radius:15px;
}
.kg {


	width:170px;
	height:500px;
	margin-left:220px;
	margin-top:180px;
}
input {
	border:none;
	margin-bottom:30px;
}
input[type="text"] {
	width:220px;
	height:25px;
	border-bottom:2px solid #adadad;
}
input[type="text"]:focus {
	width:220px;
	height:25px;
	border-bottom:2px solid #324D5C;
	outline:none;
	transition:0.5s;
}
input[type="password"] {
	width:220px;
	height:25px;
	border-bottom:2px solid #adadad;
	
}
input[type="password"]:focus {
	width:220px;
	height:25px;
	border-bottom:2px solid #324D5C;
	transition:0.5s;
	outline:none;
	
}
input[type="button"] {
	margin-top:-5px;
	margin-left:65px;
	height:35px;
	width:90px;
	outline:none;
	background-color:#540032;
	color:white;
	border-radius:10px;
}
input[type="button"]:focus {
	margin-top:-5px;
	margin-left:65px;
	height:35px;
	width:90px;
	outline:none;
	background-color:#2E112D;
	color:white;
	transition:0.5s;
	border-radius:10px;
}
input[type="button"]:hover {
	margin-top:-5px;
	margin-left:65px;
	height:35px;
	width:90px;
	outline:none;
	background-color:#1C61BF;
	color:white;
	transition:0.5s;
	border-radius:10px;
}




</style>