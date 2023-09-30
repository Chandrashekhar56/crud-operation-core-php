<?php

  	if(isset($_POST['delete']))
    {
    	$id=$_POST['Id'];
    }

	$connection=mysqli_connect("localhost","root","","student");
	if(!$connection)
	{
		die("connection failed: " .mysqli_connect_error());
	}

	if(empty($id))
	{
		echo "Record not exist <br>";
	}
	else
	{	
		
		$sql = "DELETE FROM record WHERE Id= $id";
		$result=mysqli_query($connection,$sql);
		if($result)
		{
			header('Location: index.php');
		}
	}
?>