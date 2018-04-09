<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "apc";
$fullname=$_POST["fullname"];
$age=$_POST["age"];
$gender=$_POST["gender"];
$contact=$_POST["contact"];
$email=$_POST["email"];
$entity=$_POST["entity"];
$position=$_POST["position"];
$reason=$_POST["reason"];
$advertised=$_POST["advertised"];


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt=$conn->prepare("INSERT INTO registration (fullname, age, gender,contact,email,entity,position,reason,advertised)
    VALUES (:fullname,:age,:gender,:contact,:email,:entity,:position,:reason,:advertised)");
    
   $stmt->execute(array(":fullname"=> $fullname,":age"=> $age, ":gender"=> $gender, ":contact"=> $contact, ":email"=> $email, ":entity" => $entity, ":position" => $position, ":reason"=> $reason, ":advertised"=>$advertised));
             header("Location:Payments.html");
   exit;
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>s