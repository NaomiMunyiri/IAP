<?php    
include_once 'db.php'; 
include_once 'user.php';   
   
if(isset($_POST["register"])){
    $identity = $_POST['identity'];        
    $mail = $_POST['mail'];   
    $password = $_POST['pwd'];      
    $res = $_POST['res'];      
    $prof = $_FILES['prof'];  
    
    $conn = new DBConnector();
    $pdo = $conn-> connectToDB();

    $original_file_name = $_FILES['prof']['name'];
    //echo "$original_file_name";
    $file_tmp_location = $_FILES['prof']['tmp_name'];
    //echo "$file_tmp_location";
    $file_path = "photos/";
    $path = $file_path.$original_file_name;
    //echo "$path";

    move_uploaded_file($file_tmp_location, $file_path.$original_file_name);
    header('location:login.php');
    


    $user = new User();        
    $user->setIdentity($identity);  
    $user->setEmail($mail);
    $user->setPassword($password);
    $user->setResidence($res); 
    $user->setPicture($path);

    $user->register($pdo);   
}

?>
