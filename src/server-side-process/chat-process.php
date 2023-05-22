<?php 
    include("../pages/database.php"); 
    include("login-process.php");//for the adminID whose chatbox are we opening?
    // include("chat-sessions.php");//who are the people we are having convo with
    $adminLoggedIn = $_SESSION['loggedInAdmin'];
    $adminID = $adminLoggedIn['adminID'];
    // $receiverUID = $_POST['receiverUIDs']; 
    $allMessages = [];

    //send message
    if (isset($_POST['message'])){
        $message = $_POST['message'];
        $sql = mysqli_query($mysqli,"INSERT INTO `chat` (`senderUID`,`receiverUID`,`chatMessage`,`sentDate`) VALUES ('5000','$receiverUID','$message', current_timestamp())");    
    }
    //receiving all incoming
    if (isset($_POST['senderUID'])){
        $senderUID = $_POST['senderUID'];
        $sqlReceive = mysqli_query($conn,"SELECT * FROM `chat` WHERE `receiverUID` = '5000' AND `senderUID` = '$senderUID'");
        
        
        if ($sqlReceive){
            $results = mysqli_fetch_all($sqlReceive, MYSQLI_ASSOC);
            foreach ($results as $result){
                // $userID = $result['senderUID'];
                // $sql = mysqli_query($conn, "SELECT `fName` FROM `user` WHERE `userID`='$userID';");
                // $senderName = mysqli_fetch_assoc($sql);"sender" => $senderName['fName'],
                array_push($allMessages, array("SentOrReceived" => "received", "chatID" => $result['chatID'], "chatMessage" => $result['chatMessage'], "chatTimestamp" => $result['sentDate']));
            }
        }   
    }
    
    //all sent messages
    $sqlSent = mysqli_query($conn,"SELECT * FROM `chat` WHERE `senderUID` = '5000'");
    if ($sqlSent){
        $results = mysqli_fetch_all($sqlSent, MYSQLI_ASSOC);
        foreach ($results as $result){ 
            array_push($allMessages, array("SentOrReceived" => "sent","chatID" => $result['chatID'], "chatMessage" => $result['chatMessage'], "chatTimestamp" => $result['sentDate']));
        }
    }
    //error handling
    // if ($sqlReceive == false && $sqlSent == false){
    //     echo "Lost connection to the server. Please refresh the page.";
    // }
    
    function compareByTimestamp($a, $b) {
        $timestampA = strtotime($a["chatTimestamp"]);
        $timestampB = strtotime($b["chatTimestamp"]);
    
        return $timestampA - $timestampB;
    }
    
    usort($allMessages, "compareByTimestamp");
    echo json_encode($allMessages);


?>