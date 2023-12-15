<?php

include("connection.php");

if(isset($_POST['submit'])){ 

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $cpassword = $_POST['cpass'];

    $sql = "select * from signup where username = '$username'";
    $result = mysqli_query($conn, $sql);
    $user_count = mysqli_num_rows($result);

    $sql = "select * from signup where email = '$email'";
    $result = mysqli_query($conn, $sql);
    $email_count = mysqli_num_rows($result);

    
    if($user_count == 0 & $email_count == 0 ){
        if($password == $cpassword){
            $hash = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO signup(username, email, password) VALUES('$username', '$email', '$hash')";
            $result = mysqli_query($conn, $sql);

            if($result){
                header("location:welcome.php");
            }
    }

        else{
            echo '<script>
            window.location.href="index.php";
            alert("passwords do not match");
            </script>';
        }
}

        else{
            if($user_count>0){
            echo '<script>
                window.loction.href="index.php";
                alert("username already exist");
                </script>';
        }

            if($email_count>0){
            echo '<script>
            window.location.href="index.php";
            alert("email already exist");
            </script>';
        }

    }


}