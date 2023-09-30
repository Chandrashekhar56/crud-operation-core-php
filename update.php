<?php

  	if(isset($_POST['edit']))
    {
    	$id=$_POST['Id'];
        $name = $_POST['Name'];
        $email= $_POST['Email'];
        $age= $_POST['Age'];
        $contact= $_POST['Contact'];
        $gender= $_POST['Gender'];
    }
	$connection=mysqli_connect("localhost","root","","student");
	if(!$connection)
	{
		die("connection failed: " .mysqli_connect_error());
	}

	$sql = "UPDATE record SET Name='$name',Email='$email',Age='$age',Contact='$contact',Gender='$gender' WHERE Id='$id'";

	$result=mysqli_query($connection,$sql);
	if($result)
	{
		header('Location: index.php');
	}

?>