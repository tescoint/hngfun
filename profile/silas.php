<?php
<<<<<<< HEAD
     if(isset($_POST['submit'])){
        $config = include('../config.php');
        $dsn = 'mysql:host='.$config['host'].';dbname='.$config['dbname'];
        $con = new PDO($dsn, $config['username'], $config['pass']);
        $result = $con->query('SELECT * FROM password LIMIT 1');
        $data = $result->fetch();
        $to = $_POST['to'];
        $password = $data['password'];
        $subject = $_POST['subject'];
        $full_name = $_POST['full_name'];
        $body = $_POST['body'];
        header("location:http://hng.fun/sendmail.php?password=".$password."&subject=".$subject."&body=".$body."&to=".$to);
     } 
?>
=======
    $config = include('../config.php');
    $dsn = 'mysql:host='.$config['host'].';dbname='.$config['dbname'];
    $con = new PDO($dsn, $config['username'], $config['pass']);
    $exe = $con->query('SELECT * FROM password LIMIT 1');
    $data = $exe->fetch();
    $password = $data['password'];
    if (isset($_GET['sendmessage'])) {
        $subject = "Hello";
        $password = htmlentities(strip_tags(trim($password)));
        $body = htmlentities(strip_tags(trim($_GET['body'])));
        $to = "silassilasm@gmail.com";
        if (!isset($body) || $body == '' || (!isset($_GET['name'])) || $_GET['name'] == '' ) {
            echo "Form cannot be blank";
        }else {
            $location = "../sendmail.php?to=$to&subject=$subject&password=$password&body=$body";
            header("Location: " . $location);
        }
    }
 ?>
>>>>>>> 7b8637e8c329cbd2114e29802cbfdd2427df030d


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width initial scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<title>Silas Profile</title>
	<style type="text/css">
	#bck{background-image: url(http://res.cloudinary.com/siazo/image/upload/v1504241837/gnd_px5ijj.png);}
	.img{height: 200px;

				width:200px;
				border-radius:105px;
				border:8px solid #aaa;}
	#center{text-align: center;}
	#body{
		border-radius: 20px;
		background-color: #f2d9a4; 
		width:500px;
		height:260px;
		margin:0px auto;
		margin-top: 10px;
		margin-bottom: 10px;
		padding:10px;
		border:5px solid #AAAAAA ;
		text-align: center;
	}
	button{background-color: #aaa;
            font-size:20px;
            border-radius: 5px;
	}
	li{float: center;
		}
	.fa{font-size: 40px;
		color: black;
		padding: 7px;
		background-color: #F2D9A4;
		border:4px solid #aaa;
		border-radius: 5px;
	}
	#social{text-align: center;

	}
	
	#form{
		text-align: center;

	}
	#body1{border-radius: 20px;
		background-color: #f2d9a4; 
		width:500px;
		height:450px;
		margin:0px auto;
		margin-top: 20px;
		margin-bottom: 10px;
		padding:1px;
		border:5px solid #AAAAAA ;
		text-align: center;
	}
	.textform{
		margin: 0 auto 10px auto;
	}
	.textform{
			width: 70%;
			margin: auto;
			padding: 10px;
			color: black;
			box-sizing: border-box;
			margin-top: 20px;
		}
	</style>
</head>
<body id="bck">	
	<div id="center" >
		<div><img class="img" src="http://res.cloudinary.com/siazo/image/upload/v1504242053/Silas_mrfpzd.png" alt="profile picture"></div><br>
		<H1>SILAS SILAS</H1>
	</div>
	<h3 id="body"><br>I am a full-stack Web Developer, currently doing my internship with<b>    Start Innovation Hub </b>Uyo <br><br>
					I am open minded and enjoy work that challenges me to learn new things and expand my horizon<br><br>
					<a href="https://github.com/silassilasm/hng-stage1">
						<button class=" btn-lg " id="AboutMe">Stage1 Task</button>
					</a>
					<div id="social">
		        <P><a href="https://github.com/silassilasm" target="_blank" class="fa fa-github social github"></a>
                  <a href="https://twitter.com/silassilasm" target="_blank" class="fa fa-twitter social twitter"></a>
		          </P>		</div>
	</h3>
	
			
		    <h3 id="body1">
				 <div class="containerform">
		<form class="form-vertical" action="silas.php" method="POST">
			<h2 class="htext">Contact Me</h2>
			<input type="text" class="textform" name="full_name" placeholder="Fullname" required><br>
			<input type="email" class="textform" name="to" placeholder="Email" required><br>
<<<<<<< HEAD
            <input type="text" class="textform" name="subject" placeholder="subject" required><br>
			<textarea name="body" cols="10" rows="6" class="textform" required></textarea><br><br>
=======
          		<textarea name="body" cols="10" rows="6" class="textform" required></textarea><br><br>
>>>>>>> 7b8637e8c329cbd2114e29802cbfdd2427df030d
			<button class="submit btnform" name="submit" value="submit">Submit</button>
		</form>
	</div>

			</h3>


		          
</body>
</html>
<<<<<<< HEAD
=======

>>>>>>> 7b8637e8c329cbd2114e29802cbfdd2427df030d
