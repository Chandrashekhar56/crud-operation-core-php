<?php
  	
  	if(isset($_POST['Add']))
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

	$sql ="INSERT INTO record(Name,Email,Age,Contact,Gender,Id) VALUES ('$name','$email',$age,$contact,'$gender',$id)";

	$result=mysqli_query($connection,$sql);
		if($result)
		{
			header('Location: index.php');
		}
?>