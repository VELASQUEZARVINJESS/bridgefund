<?php
    function getClientInfo($mysqli, $data) {
        $q = "SELECT
                b.first_name,
                b.last_name,
                b.middle_name,
                b.gender,
                b.birthdate,
                b.mobile,
                b.email,
                b.landline,
                b.civil_status,
                b.province,
                b.city,
                b.barangay,
                b.subdivision,
                b.street,
                b.zipcode,
                e.position,
                e.monthly_salary AS 'smonthly',
                e.annual_salary AS 'sannual',
                e.take_home_pay AS 'stakehome',
                e.company_name AS 'employer',
                e.company_address AS 'eaddress',
                e.hr_manager AS 'emanager',
                e.hr_contact AS 'econtact',
                e.hr_email AS 'eemail'
            FROM borrowers b
                LEFT JOIN borrowers_employer e ON b.borrower_no = e.borrower_no
            WHERE b.borrower_no = '{$data['id']}'";
        return $mysqli->query($q)->fetch_assoc();
    }

    function updateClientInfo($mysqli,$data,$id) {
        $mysqli->autocommit(false); $err = array();
        $q1 = "UPDATE borrowers b SET
                b.first_name = '{$data['fname']}',
                b.last_name = '{$data['lname']}',
                b.middle_name = '{$data['mname']}',
                b.gender = '{$data['gender']}',
                b.birthdate = '{$data['bdate']}',
                b.mobile = '{$data['mobile']}',
                b.email = '{$data['email']}',
                b.landline = '{$data['landline']}',
                b.civil_status = '{$data['marital']}',
                b.province = '{$data['province']}',
                b.city = '{$data['city']}',
                b.barangay = '{$data['barangay']}',
                b.subdivision = '{$data['subbuild']}',
                b.street = '{$data['street']}',
                b.zipcode = '{$data['zipcode']}'
            WHERE b.borrower_no = '$id'";
        $q2 = "UPDATE borrowers_employer e SET
                e.position = '{$data['position']}',
                e.monthly_salary = '{$data['smonthly']}',
                e.annual_salary = '{$data['sannual']}',
                e.take_home_pay = '{$data['stakehome']}',
                e.company_name = '{$data['employer']}',
                e.company_address = '{$data['eaddress']}',
                e.hr_manager = '{$data['emanager']}',
                e.hr_contact = '{$data['econtact']}',
                e.hr_email = '{$data['eemail']}'
            WHERE e.borrower_no = '$id'";

        if ($mysqli->query($q1)) {
            if ($mysqli->query($q2)) {
                $mysqli->commit();
                return array('success'=>'Borrower info has been updated');
            } else {
                array_push($err, 'Error on updating borrower employer');
            }
            array_push($err, 'Error on updating borrower details');
        }
        if (count($err) > 0) {
            $mysqli->rollback();
            return array('error'=>$err);
        }
        
    }
?>