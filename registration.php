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

            if (empty($_POST['firstname'])){ ?>
                <div class="alert alert-danger">
                <strong>Error!</strong> First Name is Required.
                </div>
                <?php
            echo '<br>';
            }else{
                $firstname     =$_POST['firstname'];
            }

            if (empty($_POST['lastname'])){?>
                <div class="alert alert-danger">
                <strong>Error!</strong> Last Name is Required.
                </div>
                <?php
            echo '<br>';
            }else{
                $lastname     =$_POST['lastname']; 
            }

            if (empty($_POST['email'])){?>
             <div class="alert alert-danger">
               <strong>Error!</strong> Email is Required.
               </div>
               <?php
            echo '<br>';
            }else{
                $email     =$_POST['email'];
            }
            if (empty($_POST['phonenumber'])){?>
                <div class="alert alert-danger">
                <strong>Error!</strong> Phone Number is Required.
                </div>
                <?php
            echo '<br>';
            }else{
                $phonenumber   =$_POST['phonenumber'];
            }
            if (empty($_POST['password'])){?>
                <div class="alert alert-danger">
                <strong>Error!</strong> Password is Required.
                </div>
                <?php
            echo '<br>';
            }else{
                $password      =$_POST['password']; 
            }
        }

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
        ?>
    </div>    
    <?php
    if(isset($mag))
    {
        echo "<strong>Error!</strong> $mag";
    }
    if(isset($mag1))
    {
        echo "<strong><span class='err'> $mag1</span></strong>";
    }
    ?>

    <div>
        <form action = "registration.php" method="post">
            <div class="container">

            <div class="row">
                <div class="col-sm-3">
                <h1>Registration</h1>
                <p>Fill up the form with correct values.</p>
                <hr class ="mb-3">
                <label for ="firstname"><b>First Name</b></label>
                <input class="form-control" id="firstname" type ="text" name="firstname">
                <br>

                <label for ="lastname"><b>Last Name</b></label>
                <input class="form-control" id="lastname" type ="text" name="lastname" >
                <br>

                <label for ="email"><b>Email Address</Address></b></label>
                <input class="form-control" id="email" type ="email" name="email" >
                <br>

                <label for ="phonenumber"><b>Phone Number</b></label>
                <input class="form-control" id="phonenumber" type ="text" name="phonenumber" >
                <br>

                <label for ="password"><b>Password</b></label>
                <input class="form-control" id="password" type ="password" name="password" >
                <hr class ="mb-3">

                <input class="btn btn-primary" type ="submit" id="register" name="create" value="Sign Up">
            </div>
        </form>
    </div>       
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>  
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
    $(function(){
        $(function(){
            $('#register').click(function(e){

                 var valid = this.form.checkValidity();
                 if (valid){

                 var firstname     = $('#firstname').val();
                 var lastname      = $('#lastname').val();
                 var email         = $('#email').val();
                 var phonenumber   = $('#phonenumber').val();
                 var password      = $('#password').val();
                    e.preventDefault();

                    $.ajax({
                        type: 'POST',
                        url:  'process.php',
                        data: {firstname: firstname,lastname: lastname,email: email,phonenumber: phonenumber,password: password},
                        sucecess: function(data){
                           swal.fire({
                                      'title': 'Successful',
                                      'text': 'Successfully Registered.',
                                      'type': 'Success'
                                    })  
                        },
                        error: function(data){
                            swal.fire({
                           'title': 'Errors',
                           'text': 'There wase errors while saving the data.',
                           'type': 'Error'
                           })  
                        },
                    
                    });
                
                
                    
                }
              
            });
    }); 
    </script>
</body>
</html>