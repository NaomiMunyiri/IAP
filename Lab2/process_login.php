<?php    
session_start();
include_once 'user.php';    
include_once 'db.php';    
  
if(isset($_POST["login"])){
     $email = $_POST['mail'];        
     $password = $_POST['pwd']; 

     $conn = new DBConnector();    
     $pdo = $conn->connectToDB();

     $user = new User();  
     $user->setEmail($email);
     $user->setPassword($password);      

     $user->login($pdo);

    $sql = "SELECT * FROM user WHERE Email='$email'";
    $stmt = $pdo-> prepare($sql);
    $stmt-> execute();
    $row = $stmt-> fetch(PDO::FETCH_ASSOC);
    if($row == null){
        echo 'Row does not exist';
    }else{
        $email = $row['Email'];
        $_SESSION['email'] = $email;
        echo $_SESSION['email'];
        //header('location:member.php');
        //header('location: userDetails.php');
    }


    // $_SESSION['mail']=$mail;
       
    
} 
?>