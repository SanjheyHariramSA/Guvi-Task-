<?PHP
if($_POST["action"] == "submit"){
    forgot();
    
}

function forgot(){
    $con = mysqli_connect("localhost:3306", "root", "", "guvi");
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error()); 
    }
    $email = $_POST["email"];
    $New_Password=$_POST["New_Password"];
    $sql="UPDATE register SET password= $New_Password WHERE email='$email'";
    $result = mysqli_query($con, $sql);  
    echo 1;
exit;
}
?>