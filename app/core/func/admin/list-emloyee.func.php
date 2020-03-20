<?php
    function getUsersEmloyee(){
        $query = "SELECT
            u.id,
            u.user,
            u.username,
            u.level
        FROM users
        WHERE u.level = 1
        ORDER BY b.users_id DESC";
        return $mysqli->query($query)->fetch_all(MYSQLI_ASSOC);
    }

?>