<?php
    function getBorrowers($mysqli) {
        $query = "SELECT
            b.borrower_no,
            CONCAT(b.last_name, ', ' ,b.first_name) AS 'borrower',
            b.email,
            b.phone_no
        FROM  borrowers b
        WHERE b.active = 1";
        return $mysqli->query($query)->fetch_all(MYSQLI_ASSOC);
    }
?>