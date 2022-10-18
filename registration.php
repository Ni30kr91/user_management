<?php
require_once('db_connection.php');

?>
<!DOCTYPE htML>
<html>
    <head>
        <title>User Registration | PHP</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    </head>
    <body>
    
    <div>
        <?php
        if(isset($_POST['create'])){
            $firstname     =$_POST['firstname'];
            $lastname      =$_POST['lastname'];
            $email         =$_POST['email'];
            $phonenumber   =$_POST['phonenumber'];
            $password      =$_POST['password'];

            $sql = $db->prepare("INSERT INTO users (firstname, lastname, email, phonenumber, password ) VALUES(?,?,?,?,?)");
           
           // $stmt = $db->prepare("INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)");
            $sql->bind_param("sssis", $firstname, $lastname, $email, $phonenumber, $password);
           
            //$stmtinsert = $db->prepare($sql);
            $result = $sql->execute(); //mysqli_query($db, $sql) ;
           
            //$result = $stmtinsert->execute([$firstname, $lastname, $email, $phonenumber, $password]);
            if($result){
                echo 'Successfully saved.';
            }else{
                echo 'There were errors while saving the data.';
                echo $result;
            }
        }
        ?>
    </div>    


    <div>
        <form action = "registration.php" method="post">
            <div class="container">

            <div class="row">
                <div class="col-sm-3">
                <h1>Registration</h1>
                <p>Fill up the form with correct values.</p>
                <hr class ="mb-3">
                <label for ="firstname"><b>First Name</b></label>
                <input class="form-control" type ="text" name="firstname" required>
                <br>

                <label for ="lastname"><b>Last Name</b></label>
                <input class="form-control" type ="text" name="lastname" required>
                <br>

                <label for ="email"><b>Email Address</Address></b></label>
                <input class="form-control" type ="email" name="email" required>
                <br>

                <label for ="phonenumber"><b>Phone Number</b></label>
                <input class="form-control" type ="text" name="phonenumber" required minlength="10" maxlength="13">
                <br>

                <label for ="password"><b>Password</b></label>
                <input class="form-control" type ="password" name="password" required>
                <hr class ="mb-3">

                <input class="btn btn-primary" type ="submit" name="create" value="Sign Up">
            </div>
        </form>
    </div>           
    
</body>
</html>