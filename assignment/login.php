<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$name=$_POST["username"];
$pass=$_POST["password"];

try {
    $conn = new PDO("mysql:host=$servername;dbname=apc", $username, $password);
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $stmt = $conn->prepare("SELECT id FROM users where username=:username and password=:password"); 
     $stmt->execute(array(':username'=>$name, ':password'=>$pass));
     if ($stmt->rowCount() > 0) {
 			echo "Login valid";
 			 $_SESSION['mysession'] = $name;
			} else {
   			echo 'login Invalid';
   			header("Location:hello.html");
		}
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>