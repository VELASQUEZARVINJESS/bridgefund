<?php 
    function addBorrower($mysqli,$data) {
    	$mysqli->autocommit(false);
    	$err = array(); $q2 = ""; $counter = 0;
    	$myq = $mysqli->query("SELECT MAX(borrower_no) AS 'M' FROM borrowers");
    	$row = $myq->num_rows;
    	if ($row > 0) {
    		$counter = (int) substr($myq->fetch_assoc()['M'], 1);
    	}
        $id = sprintf("B%07d", $counter+1);
    	$q1 = "INSERT INTO borrowers(
        		first_name,last_name,middle_name,gender,birthdate,
        		mobile,email,landline,civil_status,province,
        		City,barangay,subdivision,street,zipcode,
        		borrower_no,addby
        	) VALUES (
        		'{$data['fname']}','{$data['lname']}','{$data['mname']}','{$data['gender']}','{$data['bdate']}',
        		'{$data['mobile']}','{$data['email']}','{$data['landline']}','{$data['marital']}','{$data['province']}',
        		'{$data['city']}','{$data['barangay']}','{$data['subbuild']}','{$data['street']}','{$data['zipcode']}',
        		'$id','{$_SESSION['app']['id']}'
        	)";
        
        if (!isset($data['employer'],$data['eaddress'],$data['emanager'],$data['econtact'],$data['eemail'],$data['position'],$data['smonthly'],$data['sannual'],$data['stakehome'])) {
        	$q2 = "";
        } else {
        	$q2 = "INSERT INTO borrowers_employer(
        			position,monthly_salary,annual_salary,take_home_pay,company_name,
        			company_address,hr_manager,hr_contact,hr_email,addby,
        			borrower_no
        		) VALUES(
        			'{$data['position']}','{$data['smonthly']}','{$data['sannual']}','{$data['stakehome']}','{$data['employer']}',
        			'{$data['eaddress']}','{$data['emanager']}','{$data['econtact']}','{$data['eemail']}','{$_SESSION['app']['id']}',
        			'$id'
        		)";
        }
        $mysqli->query($q1) or array_push($err,"Error on adding new borrower ".$mysqli->error);
        $mysqli->query($q2) or array_push($err,"Error on adding borrowers employer ".$mysqli->error);
        if (count($err) > 0) {
        	$mysqli->rollback();
            return array('error' => $err);
        } else {
        	$mysqli->commit();
            return array('success' => 'New borrower successfully added');
        }
    }
?>