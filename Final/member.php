<?php
require_once('db.php');
require_once('user.php');
//$mail='mail';

session_start();

if(!isset($_SESSION['email'])){
    header('location: login.php');
    //echo "log in";

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
    <script>
    function showAlert()
    {
        alert("This functionality is not yet available");
    }
    </script>
    <style>
        body{
            background-color: lavender;
            background-size: cover;
            background-position: center;
            font-family: serif;
        }
        .dets{
            background: #000;
            position: relative;
            z-index: 1;
            max-width: 360px;
            margin: 0 auto 100px;
            padding: 45px;
            text-align: center;
        }
        .message {
            color: white;
        }

        .mes {
            font-size: 25px;
            color: white;
        }
        .mes a {
            font-size: 16px;
            color: white;
            text-decoration: underline;
        }
        .mes a:hover{
            color: gray;
        }
    </style>
</head>
<body>
<?php
include_once("db.php");

$conn= new DBConnector();    
$pdo= $conn->connectToDB();

    $sql = "SELECT * FROM user WHERE Email = '{$_SESSION['email']}'";
    //$stmt= $pdo-> prepare($sql);
    $stmt= $pdo-> query($sql);

    if($stmt)
    {
        while($row = $stmt->fetch(PDO::FETCH_OBJ)){
            echo '
            <div class="dets">
                <h2 class="mes">PROFILE DETAILS</h2>
                    <p class="message"> <img src="'.$row->pp.'" alt="image" style="width:300px"> </p>
                    <p class="message"> FULL NAMES : '.$row->Identity.' </p>
                    <p class="message"> EMAIL : '.$row->Email.' </p>
                    <p class="message"> RESIDENCE : '.$row->Residence.'</p>

                    <p>
                    <label for="food" class="message">ORDER:</label>
                        <select name="food" class="message">
                            <option value="Tomatoes">Tomatoes</option>
                            <option value="Oranges">Oranges</option>
                            <option value="Apples">Apples</option>
                        
                        </select>
                    <label for="quantity" class="message">QUANTITY:</label>
                        <select name="qty" class="message">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                        
                        </select>

                    </p>
                    <button onclick="showAlert()">ORDER</button>
                    <button onclick="showAlert()">STATUS</button>
                    </p>

                    <p class = "mes"><a href = "changepassword.php" id="password">CHANGE PASSWORD?</a></p>
                    <p class = "mes"><a href = "process_logout.php" id="logout">LOGOUT</a></p>
            </div>
            ';
        }
    }else{
        echo 'Row does not exist';
    }
  
    ?>
</body>
</html>