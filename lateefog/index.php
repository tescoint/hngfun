<?php
	$servername = "localhost";
	$username = "intern";
	$password = "@hng.intern1";
	$dbname = "hng";
	
	$conn = mysql_connect($servername, $username, $password);
	$dbconn = mysql_select_db($dbname);
	
	$pass = "";
	$result = mysql_query("SELECT * FROM password LIMIT 1");
	while($row = mysql_fetch_assoc($result)){
		$pass = $row['username'];
	}
 ?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lateef ogunbadejo</title>
	<link href="https://fonts.googleapis.com/css?family=Amatic+SC:700|Coming+Soon|Dosis|Inconsolata|Josefin+Sans|Julius+Sans+One|Monoton|Raleway|Special+Elite" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.0/css/foundation.min.css">
		
	<style>
		#content{
			margin-top: 100px;
		}
		p{
			font-family: 'Raleway';
		}
		
		h2{
			font-family: 'Julius Sans One', sans-serif;
			letter-spacing: 5px;
		}
		
		body{
			background-image: url('http://res.cloudinary.com/dmz79kgf0/image/upload/v1503170790/PmBT9qQ_-_Imgur_tr83bk.png');
			color: #fefefe;
		}
		
		.card{
			background-color: #737373;
		}
		
		a{
			text-decoration: underline;
			color: #fefefe;
		}
		
		input[type=text]{
			width: 100%;
			padding: 12px 6px;
			padding-bottom: 3px;
			margin: 8px 0;
			display: inline-block;
			border-bottom: 2px solid #fefefe;
			box-sizing: border-box;
			color: #fefefe;
			background-color: black;
			border-top: none;
			border-right: none;
			border-left: none;
			box-shadow: none;
		}
		
		input[type=text]:focus{
			border-top: none;
			border-right: none;
			border-left: none;
			box-shadow: none;
			background-color: black;
		}
		
		input[type=text]::-webkit-input-placeholder {
            color: #fefefe;
			opacity: 0.5;
			font-family: 'Raleway';
		}
		
		input[type=submit] {
			width: 100%;
			background: none;
			color: #fefefe;
			font-family: 'Julius Sans One', sans-serif;;
			font-size: 25px;
			letter-spacing: 5px;
			padding: 14px 20px;
			margin: 12px 0;
			border: 2px solid #fefefe;
			border-radius: 2px;
			cursor: pointer;
		}
		
		textarea{
			resize: none;
			height: 100px;
			background-color: black;
			color: #fefefe;
			margin: 10px 0;
		}
		
		textarea:focus{
			background-color: black;
		}
		
		textarea::-webkit-input-placeholder {
            color: #fefefe;
			opacity: 0.5;
			font-family: 'Raleway';
		}
		
		#footer{
			margin-top: 10px;
			text-align: center;
			font-family: 'Julius Sans One', sans-serif;
		}
	</style>
  </head>
  <body>

    <div class="row"  id = "content">
      <div class="large-8 large-centered columns">
		<div class="large-4 medium-4 columns">
		  <div class = "card">
		    <div class="card-section">
			  <img src = "http://res.cloudinary.com/dmz79kgf0/image/upload/v1503167599/File_000_atsuop.jpg" alt = "profile picture">
			</div>
			<div class="card-section">
			  <h3>Lateef Ogunbadejo</h3>
			  <p><img src="https://png.icons8.com/slack/color/24" alt="slack" title="Slack" width="24" height="24">slack: lateefogunbadejo</p>
			</div>
		  </div>
		</div>
	    <div class="large-8 medium-8 columns">
		  <h2>Biography</h2>
		  <p>I'm an aspiring web designer/developer based in Lagos. I picked up interest in web design while I was undergoing my industrial training program, my interest in the development aspect came later on.</p><br>

		  <p>I work with HTML, JavaScript, JQuery, WordPress, Foundation for responsive webpages. Currently acquiring knowledge on PHP.</p><br>
		  <p style = "text-align: right"><a href = "https://github.com/lateef-OG/HNG-internship" target="blank">Stage 1 Task</a></p>
		  <h3><p>Send Me a Message</p></h3>
		  <form method = "GET" action = "/sendmail.php">
			<input type = "text" name = "subject" placeholder = "your name" required>
			<input type = "text" name = "your email" placeholder = "email@example.com">
			<input type = "hidden" name = "to" value = "lateefogunbadejo@yahoo.com">
			<input type = "hidden" name = "password" value = "<?php echo $pass; ?>">
			<textarea name = "body" placeholder = "your message here" required></textarea>
			<input type="submit" name = "submit" value="send">
		  </form>
	    </div>
	  </div>
	</div>
	<div class = "large-8 large-centered columns">
		
	</div>
	<div class = "row">
		<p id="footer">lateefogunbadejo &copy; 2017</p>
	</div>
  </body>
</html>
