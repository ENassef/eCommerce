<?php 

    session_start();
    $noNavbar = '';  
    $pagetitle = 'Login';
      if (isset($_SESSION['Username'])){
        header('location: dashboard.php');
      }

    include 'init.php';
    // Cheak if User Coming From HTTP post request
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $user = $_POST['user'];
        $password = $_POST['Password'];
        $hashPass = sha1($password);

        // Cheak If THe USer Exist in the database 
        
        $stmt = $con->prepare("SELECT  
                                    UserID,Username,Password,FullName
                                FROM 
                                    users 
                                WHERE 
                                    Username = ? 
                                AND 
                                    Password = ? 
                                AND 
                                    GroupID = 1
                                LIMIT  1");

        $stmt->execute(array($user,$hashPass));
        $row = $stmt->fetch();
        $count = $stmt->rowCount();

        // If Count > 0  This mean that the user Exist in the database  

        if( $count > 0 ) {

           $_SESSION['Username'] = $user ;//registar session name
           $_SESSION['ID'] = $row['UserID'] ;//registar session ID 
           $_SESSION['FullName'] = $row['FullName'];
           header('location: dashboard.php');
           exit();

        }else{
            echo "<div class='p-3 mb-2 bg-danger text-white danger-bold'>" . 'Your Username or Password Might be Wrong' . "</div>" ;
        }
        
    }

?>

    <form class="login" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <h4 class="text-center"><?php echo lang('login page'); ?></h4>
        <input class='form-control' type="text" name='user' placeholder='<?php echo lang('username'); ?>' autocomplete="off" />
        
        <input class='form-control' 
               type="password" 
               name='Password' 
               placeholder='<?php echo lang('password'); ?>' 
               autocomplete="new-password" />
        
        <input class="btn btn-primary btn-block" type="submit" value='<?php echo lang('login'); ?>' />
        
    </form>

<?php include 'include/templates/footer.php';?>