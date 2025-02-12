<?php
header('Content-Type: application/json');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $response = array();

    try {
        // Database connection
        $db = new mysqli('localhost', 'root', '', 'mprlendingdb');

        if ($db->connect_error) {
            throw new Exception('Connection Failed: ' . $db->connect_error);
        }

        $db->begin_transaction();

        // Handle file uploads
        $id_photo = $_POST['existing_id_photo'];
        $insurance_file = $_POST['existing_insurance_file'];
        $collateral_files = isset($_POST['existing_collateral_files']) ? $_POST['existing_collateral_files'] : '';

        if (isset($_FILES['idPhoto']) && $_FILES['idPhoto']['error'] === 0) {
            $id_photo = uploadFile($_FILES['idPhoto'], 'id_photos');
        }

        if (isset($_FILES['insurancePhoto']) && $_FILES['insurancePhoto']['error'] === 0) {
            $insurance_file = uploadFile($_FILES['insurancePhoto'], 'insurance_files');
        }

        if (isset($_FILES['collateral'])) {
            $new_collateral_files = array();
            foreach ($_FILES['collateral']['tmp_name'] as $key => $tmp_name) {
                if ($_FILES['collateral']['error'][$key] === 0) {
                    $new_collateral_files[] = uploadFile([
                        'name' => $_FILES['collateral']['name'][$key],
                        'type' => $_FILES['collateral']['type'][$key],
                        'tmp_name' => $tmp_name,
                        'error' => $_FILES['collateral']['error'][$key],
                        'size' => $_FILES['collateral']['size'][$key]
                    ], 'collateral_files');
                }
            }
            if (!empty($new_collateral_files)) {
                $collateral_files = implode(',', $new_collateral_files);
            }
        }

        // Store values that need to be passed by reference
        $fname = $_POST['fName'];
        $mname = $_POST['mName'];
        $surname = $_POST['surname'];
        $suffix = $_POST['suffix'];
        $sex = $_POST['sex'];
        $dob = $_POST['DOB'];
        $marital_status = $_POST['maritalStatus'];
        $contact_no = $_POST['contactNo'];
        $home_no = $_POST['homeNo'];
        $street = $_POST['street'];
        $baranggay = $_POST['baranggay'];
        $city = $_POST['city'];
        $province = $_POST['province'];
        $region = $_POST['region'];
        $id_type = $_POST['idType'];
        $id_no = $_POST['idNo'];
        $expiry_date = $_POST['expiryDate'];
        $employer_name = $_POST['employerName'];
        $years = intval($_POST['noOfYearsWorked']);
        $position = $_POST['position'];
        $phone_employer = $_POST['phoneNoEmployer'];
        $salary = $_POST['salary'];
        $emp_home = $_POST['EmployerhomeNo'];
        $emp_street = $_POST['Employerstreet'];
        $emp_brgy = $_POST['Employerbaranggay'];
        $emp_city = $_POST['Employercity'];
        $emp_province = $_POST['Employerprovince'];
        $emp_region = $_POST['Employerregion'];
        $insurance_type = $_POST['insuranceType'];
        $issued_date = $_POST['issuedDate'];
        $insurance_expiry = $_POST['expiryDateInsurance'];
        $dependent_name = $_POST['dependentName'];
        $dependent_contact = $_POST['dependentContactNo'];
        $user_id = intval($_POST['id']);

        $sql = "UPDATE borrowers SET 
             first_name = ?, middle_name = ?, surname = ?, suffix = ?, sex = ?,
             dob = ?, marital_status = ?, contact_number = ?,
             home_no = ?, street = ?, baranggay = ?, city = ?, province = ?, region = ?,
             id_type = ?, id_no = ?, expiry_date = ?, id_photo = ?,
             employer_name = ?, years_with_employer = ?, position = ?, phone_no_employer = ?,
             salary = ?, employer_home_no = ?, employer_street = ?, employer_baranggay = ?,
             employer_city = ?, employer_province = ?, employer_region = ?,
             insurance_type = ?, insurance_issued_date = ?, insurance_expiry_date = ?,
             insurance_file = ?, dependent_name = ?, dependent_contact_no = ?,
             collateral_files = ?
             WHERE id = ?";

        $stmt = $db->prepare($sql);
        $stmt->bind_param(
            "sssssssssssssssssssississsssssssssssi",
            $fname,
            $mname,
            $surname,
            $suffix,
            $sex,
            $dob,
            $marital_status,
            $contact_no,
            $home_no,
            $street,
            $baranggay,
            $city,
            $province,
            $region,
            $id_type,
            $id_no,
            $expiry_date,
            $id_photo,
            $employer_name,
            $years,
            $position,
            $phone_employer,
            $salary,
            $emp_home,
            $emp_street,
            $emp_brgy,
            $emp_city,
            $emp_province,
            $emp_region,
            $insurance_type,
            $issued_date,
            $insurance_expiry,
            $insurance_file,
            $dependent_name,
            $dependent_contact,
            $collateral_files,
            $user_id
        );

        if ($stmt->execute()) {
            $db->commit();
            $response['status'] = 'success';
            $response['message'] = 'Borrower updated successfully';
        } else {
            throw new Exception("Failed to update borrower");
        }

    } catch (Exception $e) {
        if (isset($db)) {
            $db->rollback();
        }
        $response['status'] = 'error';
        $response['message'] = $e->getMessage();
    }

    if (isset($stmt)) {
        $stmt->close();
    }
    if (isset($db)) {
        $db->close();
    }

    echo json_encode($response);
}

function uploadFile($file, $directory)
{
    $target_dir = "../../images/uploads/" . $directory . "/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $file_extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $new_filename = uniqid() . '.' . $file_extension;
    $target_file = $target_dir . $new_filename;

    if (move_uploaded_file($file['tmp_name'], $target_file)) {
        return $directory . '/' . $new_filename;
    }

    throw new Exception("Failed to upload file");
}
?>