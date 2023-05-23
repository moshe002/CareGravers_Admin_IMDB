<?php 
    include("../pages/database.php"); 
    include("login-process.php");//for the adminID whose chatbox are we opening?
    $adminLoggedIn = $_SESSION['loggedInAdmin'];
    $adminID = $adminLoggedIn['adminID'];

    //send message
    if (isset($_POST['message'])){         
        $message = $_POST['message'];
        $receiverUID = $_POST['userID'];
        $sql = mysqli_query($conn,"INSERT INTO `chat` (`senderUID`,`receiverUID`,`chatMessage`,`sentDate`) VALUES ('5000','$receiverUID','$message', current_timestamp())");    
        echo json_encode($sql);
    }
    
?>