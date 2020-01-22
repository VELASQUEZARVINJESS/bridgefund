<?php 
    function addBorrower($mysqli,$data) { $err = array();
        $mysqli->query("INSERT INTO borrowers(first_name,last_name,middle_name,gender,birthdate) VALUES('{$data['fname']}','{$data['lname']}','{$data['mname']}','{$data['gender']}','{$data['bdate']}')") or array_push($err,"Error on adding new borrower ".$mysqli->error);
        if (count($err) > 0) {
            return array('error' => $err);
        } else {
            return array('success' => 'New borrower successfully added');
        }
    }
?>