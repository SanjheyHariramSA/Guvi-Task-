<?php      
    if($_POST["action"] == "submit"){
        login();
    }
    function login(){
        $con = mysqli_connect("localhost:3306", "root", "", "guvi");
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }
    $username = $_POST["lpusername"];  
    $password = $_POST['lppassword'];  

        //to prevent from mysqli injection  
        // $username = stripcslashes($username);  
        // $password = stripcslashes($password);  
        // $username = mysqli_real_escape_string($con, $username);  
        // $password = mysqli_real_escape_string($con, $password);  
        $sql = "SELECT * FROM register WHERE email = '$username' and password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        if($count == 1){  
            echo 1;
            exit;
        }  
        else{  
            echo 2;
            exit;
        }       
    }
