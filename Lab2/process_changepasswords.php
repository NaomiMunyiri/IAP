<?php 
session_start();   
include_once 'user.php';    
include_once 'db.php';    
  
if(isset($_POST["submit"])){
    $old = $_POST['password1'];        
    $new = $_POST['password2'];
    $confirm = $_POST['password3']; 

    //connect to database
    $conn = new DBConnector();    
    $pdo = $conn->connectToDB();
    
    //check if new and confirm are the same
    if($new == $confirm){
        $user = new User();        
        $user->setPassword($old); 
        $user->setNewPassword($new);

        $user->changePassword($pdo);

    }else{
        echo "Confirmed password does not match new password";
    }


    

       

} 
?>