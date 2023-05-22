<?php 
    include("../pages/database.php");
    $sql = mysqli_query($conn, 
    "SELECT DISTINCT userID
    FROM (
        SELECT receiverUID AS userID
        FROM chat
        UNION
        SELECT senderUID AS userID
        FROM chat
    ) AS chatSessions
    WHERE userID != '5000';");
    $results = mysqli_fetch_all($sql);
    $chatSessions = array_map(function($item) {
        return $item[0];
    }, $results);
    $userChats = [];
    foreach ($chatSessions as $key => $value) {
        $sql = mysqli_query($conn, "SELECT `userID`, `fName`, `lName`, `userName`, `userEmail` FROM `user` WHERE `userID` = '$value'");
        $result = mysqli_fetch_assoc($sql);
        array_push($userChats,$result);
    }
    echo json_encode($userChats);
?>