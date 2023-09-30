<?php
	$connection=mysqli_connect("localhost","root","","student");
	$sql = "SELECT * FROM record";
	$result = mysqli_query($connection, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  </head>
  <body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Manage <b> Students</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addstudent" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Student</span></a>
						<a href="#deletestudent" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
						<th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Age</th>
						<th>Contact</th>
                        <th>Gender</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                	if ($result->num_rows > 0)
                	{
  						$sn=1;
  						while($data = $result->fetch_assoc())
  						{
 				?>
                    <tr>
                    	<td><?php echo $data['Id']; ?></td>
                        <td><?php echo $data['Name']; ?></td>
                        <td><?php echo $data['Email']; ?></td>
                        <td><?php echo $data['Age']; ?></td>
						<td><?php echo $data['Contact']; ?></td>
                        <td><?php echo $data['Gender']; ?></td>
                        <td>
                          <a href="#editstudent" class="edit" data-toggle="modal" 
                          	 data-id="<?php echo $data['Id']; ?>"
                          	 data-name="<?php echo $data['Name']; ?>" 
                          	 data-email="<?php echo $data['Email']; ?>" 
                          	 data-age="<?php echo $data['Age']; ?>"
                          	 data-contact="<?php echo $data['Contact']; ?>" 
                          	 data-gender="<?php echo $data['Gender']; ?>">
                          	<i class="material-icons" data-toggle="tooltip"  title="Edit">&#xE254;</i>
                          </a>

                          <a href="#deletestudent" class="delete" data-toggle="modal"
                          	 delete-id="<?php echo $data['Id']; ?>" >
                          	<i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                          </a>
                        </td>
                    </tr>
                   		<?php
  							$sn++;
  						}
  					} 
  					else 
  					{
  					 ?>
  					  <?php
  					} ?> 
                </tbody>
            </table>
        </div>
    </div>
	<!-- Add New Student -->
	<div id="addstudent" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="add.php" method="post">
					<div class="modal-header">						
						<h4 class="modal-title">Add Student</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">	
						<div class="form-group">
							<label>Id</label>
							<input type="text" class="form-control" required name="Id" >
						</div>				
						<div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control" required name="Name">
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="text" class="form-control" required name="Email">
						</div>
						<div class="form-group">
							<label>Age</label>
							<input type="text" class="form-control" required name="Age">
						</div>
						<div class="form-group">
							<label>Contact</label>
							<input type="text" class="form-control" required name="Contact">
						</div>
						<div class="form-group">
							<label>Gender</label><br>
							<input type="radio"  required name="Gender"  value="Male">male
							<input type="radio"  required name="Gender" value="Female">female
							<input type="radio"  required name="Gender" value="Other"> other
						</div>					
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-success" value="Add" name="Add">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Edit Student -->
	<div id="editstudent" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="update.php" method="post">
					<div class="modal-header">						
						<h4 class="modal-title">Edit Student</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Id</label>
							<input type="text" class="form-control" required id="editid" name="Id">
						</div>				
						<div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control" required id="editname" name="Name">
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="text" class="form-control" required id="editemail" name="Email">
						</div>
						<div class="form-group">
							<label>Age</label>
							<input type="text" class="form-control" required id="editage" name="Age">
						</div>
						<div class="form-group">
							<label>Contact</label>
							<input type="text" class="form-control" required id="editcontact" name="Contact">
						</div>
						<div class="form-group">
							<label>Gender</label><br>
							<input type="radio"  required id="editgender" name="Gender"  value="Male">male
							<input type="radio"  required id="editgender" name="Gender" value="Female">female
							<input type="radio"  required id="editgender" name="Gender" value="Other"> other
						</div>						
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-info" value="edit" name="edit">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Delete student -->
	<div id="deletestudent" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="delete.php" method="post">
					<div class="modal-header">						
						<h4 class="modal-title">Delete Student</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<label>Enter Student Id: </label>
						<input type="text" name="Id" id="deleteid" required>
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-danger" value="delete" name="delete">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
<script type="text/javascript">
	
	 $(".edit").on("click", function()
	 {

        var Id = $(this).attr("data-id");
        $('#editid').val(Id);

       	var Name = $(this).attr("data-name");
        $('#editname').val(Name);

        var email = $(this).attr("data-email");
        $('#editemail').val(email);

        var age=$(this).attr("data-age");
        $('#editage').val(age);

        var contact = $(this).attr("data-contact");
        $('#editcontact').val(contact);

        var gender = $(this).attr("data-gender");
        $('#editgender').val(gender);

        //$("$editgender") = $("input[name='Gender']:checked").val();
    });

	 $(".delete").on("click",function()
	 {
	 	var Id=$(this).attr("delete-id");
	 	$('#deleteid').val(Id);
	 });
</script>