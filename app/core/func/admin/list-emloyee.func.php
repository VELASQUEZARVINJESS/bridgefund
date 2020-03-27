<?php
    function getEmployee($mysqli){
        $query = "SELECT
            u.id,
            u.name,
            u.username,
            u.level
        FROM users u
        ORDER BY u.id DESC";
        return $mysqli->query($query)->fetch_all(MYSQLI_ASSOC);
    }

?>