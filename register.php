<?php
include_once('dbcon.php');

$error = false;
if(isset($_POST['btn-register'])){
    //clean user input to prevent sql injection
    $username = $_POST['username'];
    $username = strip_tags($username);
    $username = htmlspecialchars($username);

    $email = $_POST['email'];
    $email = strip_tags($email);
    $email = htmlspecialchars($email);

    $password = $_POST['password'];
    $password = strip_tags($password);
    $password = htmlspecialchars($password);


 $aadharno = $_POST['aadharno'];
    $aadharno = strip_tags($aadharno);
    $aadharno = htmlspecialchars($aadharno);



 $firstname = $_POST['firstname'];
    $firstname = strip_tags($firstname);
    $firstname = htmlspecialchars($firstname);


 $lastname = $_POST['lastname'];
    $lastname = strip_tags($lastname);
    $lastname = htmlspecialchars($lastname);

$mobileno = $_POST['mobileno'];
    $mobileno = strip_tags($mobileno);
    $mobileno = htmlspecialchars($mobileno);

$address = $_POST['address'];
    $address = strip_tags($address);
    $address = htmlspecialchars($address);

$state = $_POST['state'];
    $state = strip_tags($state);
    $state= htmlspecialchars($state);

$city = $_POST['city'];
    $city = strip_tags($city);
    $city= htmlspecialchars($city);

$pincode = $_POST['pincode'];
    $pincode = strip_tags($pincode);
    $pincode= htmlspecialchars($pincode);



    //validate
    if(empty($username)){
        $error = true;
        $errorUsername = 'Please input username';
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error = true;
        $errorEmail = 'Please a valid input email';
    }

    if(empty($password)){
        $error = true;
        $errorPassword = 'Please password';
    }elseif(strlen($password) < 6){
        $error = true;
        $errorPassword = 'Password must at least 6 characters';
    }

    //encrypt password with md5
    $password = md5($password);

    //insert data if no error
    if(!$error){
        $sql = "insert into tbl_users(username, email ,password,aadharno,firstname,lastname,mobileno,address,state,city,pincode)
                values('$username', '$email', '$password','$aadharno','$firstname','$lastname','$mobileno','$address','$state','$city','$pincode')";
        if(mysqli_query($conn, $sql)){
            $successMsg = 'Register successfully. <a href="indexx.php">click here to login</a>';
        }else{
            echo 'Error '.mysqli_error($conn);
        }
    }

}

?>

<html>
<head>
<title>PHP Login & Register</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div style="width: 500px; margin: 50px auto;">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
                <center><h2>Register</h2></center>
                <hr/>
                <?php
                    if(isset($successMsg)){
                 ?>
                        <div class="alert alert-success">
                            <span class="glyphicon glyphicon-info-sign"></span>
                            <?php echo $successMsg; ?>
                        </div>
                <?php
                    }
                ?>
                <div class="form-group">
                    <label for="username" class="control-label">Username</label>
                    <input type="text" name="username" class="form-control">
                    <span class="text-danger"><?php if(isset($errorUsername)) echo $errorUsername; ?></span>
                </div>
                <div class="form-group">
                    <label for="email" class="control-label">Email</label>
                    <input type="email" name="email" class="form-control" autocomplete="off">
                    <span class="text-danger"><?php if(isset($errorEmail)) echo $errorEmail; ?></span>
                </div>
                <div class="form-group">
                    <label for="password" class="control-label">Password</label>
                    <input type="password" name="password" class="form-control" autocomplete="off">
                    <span class="text-danger"><?php if(isset($errorPassword)) echo $errorPassword; ?></span>
                </div>


                    <div class="form-group">
                    <label for="aadharno" class="control-label">Aadharno</label>
                    <input type="text" name="aadharno" class="form-control">
                    <span class="text-danger"><?php if(isset($errorAadharno)) echo $errorAadharno; ?></span>
                </div>


   <div class="form-group">
                    <label for="firstname" class="control-label">Firstname</label>
                    <input type="text" name="firstname" class="form-control">
                    <span class="text-danger"><?php if(isset($errorFirstname)) echo $errorFirstname; ?></span>
                </div>

                    <div class="form-group">
                    <label for="lastname" class="control-label">Lastname</label>
                    <input type="text" name="lastname" class="form-control">
                    <span class="text-danger"><?php if(isset($errorLastname)) echo $errorLastname; ?></span>
                </div>


                    <div class="form-group">
                    <label for="moileno" class="control-label">Mobileno</label>
                    <input type="text" name="moileno" class="form-control">
                    <span class="text-danger"><?php if(isset($errorMobileno)) echo $errorMobileno; ?></span>
                </div>


                    <div class="form-group">
                    <label for="address" class="control-label">Address</label>
                    <input type="text" name="address" class="form-control">
                    <span class="text-danger"><?php if(isset($errorAddres)) echo $errorAddress; ?></span>
                </div>

                   
                    <div class="form-group">
                    <label for="state" class="control-label">State</label>
                    <input type="text" name="state" class="form-control">
                    <span class="text-danger"><?php if(isset($errorState)) echo $errorState; ?></span>
                </div>


                   <div class="form-group">
                    <label for="city" class="control-label">City</label>
                    <input type="text" name="city" class="form-control">
                    <span class="text-danger"><?php if(isset($errorCity)) echo $errorCity; ?></span>
                </div>



                <div class="form-group">
                    <label for="pincode" class="control-label">Pincode</label>
                    <input type="text" name="pincode" class="form-control">
                    <span class="text-danger"><?php if(isset($errorPincode)) echo $errorPincode; ?></span>
                </div>


              
                <div class="form-group">
                    <center><input type="submit" name="btn-register" value="Login" class="btn btn-primary"></center>
                </div>
                <hr/>
                
            </form>
        </div>
    </div>

<script id="cid0020000163142087036" data-cfasync="false" async src="//st.chatango.com/js/gz/emb.js" style="width: 200px;height: 300px;">{"handle":"e-mitra","arch":"js","styles":{"a":"0084ef","b":100,"c":"FFFFFF","d":"FFFFFF","k":"0084ef","l":"0084ef","m":"0084ef","n":"FFFFFF","p":"10","q":"0084ef","r":100,"pos":"br","cv":1,"cvbg":"CC0000","cvw":200,"cvh":30,"cnrs":"0.35","ticker":1,"fwtickm":1}}</script>

</body>
</html>