<?php
    include_once '../../config.php';
    include_once '../../func/admin/delete.employee.func.php';
    if (isset($_POST['part']) && isset($_SESSION['app']['id'])) {
        if($_POST['part'] == 'deleteEmployee'){
            $data = sanitize_assoc($_POST['data']);
            echo json_encode(delEmployee($mysqli), JSON_PRETTY_PRINT);
        }
    } else {
        echo 'no if';
    }
?>