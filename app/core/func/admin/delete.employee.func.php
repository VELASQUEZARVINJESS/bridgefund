<?php
    function delEmployee ($mysqli, $data){
        $query = "UPDATE users SET active = 0 WHERE id = $data";
    }


?>