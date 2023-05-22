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
    echo json_encode($chatSessions);
?>