<?php 
    include("../pages/database.php"); 
    include("login-process.php");//for the adminID whose chatbox are we opening?
    // include("chat-sessions.php");//who are the people we are having convo with
    $adminLoggedIn = $_SESSION['loggedInAdmin'];
    $adminID = $adminLoggedIn['adminID'];
    
    $allMessages = [];


    //receiving all incoming
    if (isset($_POST['userID'])){
        $userID = $_POST['userID'];
        $sqlReceive = mysqli_query($conn,"SELECT * FROM `chat` WHERE `receiverUID` = '5000' AND `senderUID` = '$userID'");       
        if ($sqlReceive){
            $results = mysqli_fetch_all($sqlReceive, MYSQLI_ASSOC);
            foreach ($results as $result){
                // $userID = $result['senderUID'];
                $sql = mysqli_query($conn, "SELECT `fName` FROM `user` WHERE `userID`='$userID';");
                $senderName = mysqli_fetch_assoc($sql);
                array_push($allMessages, array("SentOrReceived" => "received", "chatID" => $result['chatID'], "sender" => $senderName['fName'], "chatMessage" => $result['chatMessage'], "chatTimestamp" => $result['sentDate']));
            }
        }
        $sqlReceive = mysqli_query($conn,"SELECT * FROM `chat` WHERE `receiverUID` = '$userID' AND `senderUID` = '5000'");       
        if ($sqlReceive){
            $results = mysqli_fetch_all($sqlReceive, MYSQLI_ASSOC);
            foreach ($results as $result){
                $sql = mysqli_query($conn, "SELECT `fName` FROM `user` WHERE `userID`='$userID';");
                $senderName = mysqli_fetch_assoc($sql);
                array_push($allMessages, array("SentOrReceived" => "sent", "chatID" => $result['chatID'], "sender" => $senderName['fName'], "chatMessage" => $result['chatMessage'], "chatTimestamp" => $result['sentDate']));
            }
        }
    }    
    
    
    function compareByTimestamp($a, $b) {
        $timestampA = strtotime($a["chatTimestamp"]);
        $timestampB = strtotime($b["chatTimestamp"]);
    
        return $timestampA - $timestampB;
    }
    
    usort($allMessages, "compareByTimestamp");
    echo json_encode($allMessages);
?>