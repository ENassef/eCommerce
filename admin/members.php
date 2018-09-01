<?php 




	/*
	================================================
	== Manger Members Page 
	== You Can Add | Edit | Delete Members From Here
	================================================
	*/	

	$pageTitle = 'Members';
	
    session_start();


      if (isset($_SESSION['Username'])){

      		
      	include 'init.php';


      	$do = isset($_GET['do']) ? $_GET['do'] : 'Manage' ; 

		// Start Manage Page 

		if ($do == 'Manage'){

		echo 'Manage';

		} elseif ($do == 'Edit') { // Edit Page ?>

			<?php 
				// cheak if the userid is exist and Numeric
				$userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0;
				// Select The User Depend on This UserID
		        $stmt = $con->prepare("SELECT * FROM users WHERE UserID = ? LIMIT  1");
		        // Execute Query
		        $stmt->execute(array($userid));
		        // Fetch The Data From The Database
		        $row = $stmt->fetch();
		        // the row count
		        $count = $stmt->rowCount();
		        // if there is such id Show The Form
		        if ($count > 0){


			?>

			<h1 class="text-center">Edit Member</h1>

			<div class="container">

				<form class="form-horizontal" action="?do=Update" method="POST">
					<input type="hidden" name="UserID" value="<?php echo $userid ?>">
					<!-- Start Username Field -->
					<div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">Username</label>
						<div class="col-sm-10 col-md-6">
							<input type="text" name="username" class="form-control" value="<?php echo $row['Username'] ?>" autocomplete="off"  />
						</div>
					</div>
					<!-- End Username Field -->
					<!-- Start Password Field -->
					<div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">Password</label>
						<div class="col-sm-10 col-md-6">
							<input type="password" name="newpassword" class="form-control" placeholder="Leave it Empty If You Don't want to change" autocomplete="new-password" />
							<input type='hidden' name='oldpassword' value="<?php echo  $row['Password'] ?>">
						</div>
					</div>
					<!-- End Password Field -->
					<!-- Start Email Field -->
					<div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">Email</label>
						<div class="col-sm-10 col-md-6">
							<input type="email" name="email" value="<?php echo $row['Email'] ?>" class="form-control" />
						</div>
					</div>
					<!-- End Email Field -->
					<!-- Start FullName Field -->
					<div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">FullName</label>
						<div class="col-sm-10 col-md-6">
							<input type="text" name="FullName" value="<?php echo $row['FullName'] ?>" class="form-control" />
						</div>
					</div>
					<!-- End FullName Field -->
					<!-- Start Submit Field -->
					<div class="form-group form-group-lg">
						<div class="col-sm-offset-2 col-sm-10">
							<input type="submit" value="Update" class="btn btn-primary btn-lg" />
						</div>
					</div>
					<!-- End Submit Field -->
				</form>

		
		<?php }else{
		 echo 'There\' No Such ID';}
		}elseif($do == 'Update'){
		

			if ($_SERVER['REQUEST_METHOD'] == 'POST'){
					echo "<h1 class= 'text-center' > Update Member </h1>";

					// get Variabales from The Form

					$id = $_POST['UserID'];
					$User = $_POST['username'];
					$email = $_POST['email'];
					$name = $_POST['FullName'];

					// Password Trick

					$pass = empty($_POST['newpassword']) ? $_POST['oldpassword'] : $pass = sha1($_POST['newpassword']);

					// validate the form

					$formErrors = array();

					if (strlen($User) < 4){
						$formErrors[] = "Username Can't be Less Than 4 Char";
					}
					if (strlen($User) > 21){
						$formErrors[] = "Username Can't be More Than 20 Char";
					}
					if (empty($User)){

						$formErrors[] =  "Username Can't be Empty";

					}

					if (empty($email)){

						$formErrors[] =  "Email Can't be Empty";

					}

					if (empty($name)){

						$formErrors[] = "FullName Can't be Empty </h1>";

					}

					

					// Update The Information To The DataBase
					if (empty($formErrors)){

					$stmt = $con->prepare(" UPDATE users SET Username = ? , Email = ? , FullName = ? , Password = ? WHERE UserID = ?");
					$stmt->execute(array($User, $email, $name, $pass, $id));
					
					// Echo Success Message

					echo $stmt->rowCount() . "Record Update" ; 
					}else{
						echo '<div class=container>';
						foreach ($formErrors as $errors) {
						echo "<div class='alert alert-danger danger-alert'> " . $errors . "</div>";
					}
						echo '</div>';
					}

			}else{
				echo "<h1 class='text-danger text-center' > you can't browse this page directly";
			}
		}


        include $tpl . 'footer.php' ;
       
      }else{
      	header('location: index.php');
      }
