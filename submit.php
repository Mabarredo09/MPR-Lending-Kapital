<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $conn = new mysqli("localhost", "root", "", "mprlendingdb");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Capture and escape form data to prevent SQL injection
    $fName = mysqli_real_escape_string($conn, $_POST['first_name']);
    $mName = mysqli_real_escape_string($conn, $_POST['middle_name']);
    $surname = mysqli_real_escape_string($conn, $_POST['surname']);
    $suffix = mysqli_real_escape_string($conn, $_POST['suffix']);
    $sex = mysqli_real_escape_string($conn, $_POST['sex']);
    $DOB = mysqli_real_escape_string($conn, $_POST['DOB']);
    $maritalStatus = mysqli_real_escape_string($conn, $_POST['maritalStatus']);
    $contactNo = mysqli_real_escape_string($conn, $_POST['contactNo']);
    $homeNo = mysqli_real_escape_string($conn, $_POST['homeNo']);
    $street = mysqli_real_escape_string($conn, $_POST['street']);
    $baranggay = mysqli_real_escape_string($conn, $_POST['baranggay']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $province = mysqli_real_escape_string($conn, $_POST['province']);
    $region = mysqli_real_escape_string($conn, $_POST['region']);
    $idType = mysqli_real_escape_string($conn, $_POST['idType']);
    $idNo = mysqli_real_escape_string($conn, $_POST['idNo']);
    $expiryDate = mysqli_real_escape_string($conn, $_POST['expiryDate']);
    $employerName = mysqli_real_escape_string($conn, $_POST['employerName']);
    $noOfYearsWorked = mysqli_real_escape_string($conn, $_POST['noOfYearsWorked']);
    $position = mysqli_real_escape_string($conn, $_POST['position']);
    $phoneNoEmployer = mysqli_real_escape_string($conn, $_POST['phoneNoEmployer']);
    $salary = mysqli_real_escape_string($conn, $_POST['salary']);

    // Employer Address
    $employerHomeNo = mysqli_real_escape_string($conn, $_POST['homeNo']);
    $employerStreet = mysqli_real_escape_string($conn, $_POST['street']);
    $employerBaranggay = mysqli_real_escape_string($conn, $_POST['baranggay']);
    $employerCity = mysqli_real_escape_string($conn, $_POST['city']);
    $employerProvince = mysqli_real_escape_string($conn, $_POST['province']);
    $employerRegion = mysqli_real_escape_string($conn, $_POST['region']);

    // Insurance Details
    $insuranceType = mysqli_real_escape_string($conn, $_POST['insuranceType']);
    $issuedDate = mysqli_real_escape_string($conn, $_POST['issuedDate']);
    $insuranceExpiryDate = mysqli_real_escape_string($conn, $_POST['expiryDate']);

    // Dependent Details
    $dependentName = mysqli_real_escape_string($conn, $_POST['dependentName']);
    $dependentContactNo = mysqli_real_escape_string($conn, $_POST['dependentContactNo']);

    // Format borrower name for folder naming (sanitize to avoid invalid characters)
    $borrowerFolder = preg_replace("/[^a-zA-Z0-9]/", "_", $fName . "_" . $surname);
    $borrowerDir = "uploads/borrowers/$borrowerFolder/";

    // Create borrower folder if it doesn't exist
    if (!file_exists($borrowerDir)) {
        mkdir($borrowerDir, 0777, true);
    }

    // Function to handle file uploads
    function uploadFile($file, $prefix, $borrowerDir) {
        if ($file['error'] === UPLOAD_ERR_OK) {
            $fileName = $prefix . "_" . basename($file['name']); // Append prefix to file name
            $filePath = $borrowerDir . $fileName;
            move_uploaded_file($file['tmp_name'], $filePath);
            return $filePath; // Return the saved file path
        }
        return "";
    }

    // Handle ID photo upload
    $idPhotoPath = isset($_FILES['idPhoto']) ? uploadFile($_FILES['idPhoto'], "ID", $borrowerDir) : "";

    // Handle insurance file upload
    $insuranceFilePath = "";
    if (isset($_FILES['insurancePhoto']) && $_FILES['insurancePhoto']['error'] === UPLOAD_ERR_OK) {
        $insuranceFilePath = uploadFile($_FILES['insurancePhoto'], "insurancePhoto", $borrowerDir);
    }
    
    // Handle collateral file uploads (multiple files)
    $collateralFiles = [];
    if (isset($_FILES['collateralPhoto']) && is_array($_FILES['collateralPhoto']['name']) && count($_FILES['collateralPhoto']['name']) > 0) {
        foreach ($_FILES['collateralPhoto']['name'] as $key => $filename) {
            if ($_FILES['collateralPhoto']['error'][$key] === UPLOAD_ERR_OK) {
                $collateralFile = [
                    'name' => $filename,
                    'tmp_name' => $_FILES['collateralPhoto']['tmp_name'][$key],
                    'error' => $_FILES['collateralPhoto']['error'][$key]
                ];
                $collateralFilePath = uploadFile($collateralFile, "collateralPhoto_" . ($key + 1), $borrowerDir);
                if ($collateralFilePath) {
                    $collateralFiles[] = $collateralFilePath;
                }
            }
        }
    }
    $collateralFilesString = !empty($collateralFiles) ? implode(',', $collateralFiles) : null;

    // Insert data into the database
    $sql = "INSERT INTO borrowers (first_name, middle_name, surname, suffix, sex, dob, marital_status, contact_number, home_no, street, baranggay, city, province, region, id_type, id_no, expiry_date, id_photo, employer_name, years_with_employer, position, phone_no_employer, salary, employer_home_no, employer_street, employer_baranggay, employer_city, employer_province, employer_region, insurance_type, insurance_issued_date, insurance_expiry_date, insurance_file, dependent_name, dependent_contact_no, collateral_files)
            VALUES ('$fName', '$mName', '$surname', '$suffix', '$sex', '$DOB', '$maritalStatus', '$contactNo', '$homeNo', '$street', '$baranggay', '$city', '$province', '$region', '$idType', '$idNo', '$expiryDate', '$idPhotoPath', '$employerName', '$noOfYearsWorked', '$position', '$phoneNoEmployer', '$salary', '$employerHomeNo', '$employerStreet', '$employerBaranggay', '$employerCity', '$employerProvince', '$employerRegion', '$insuranceType', '$issuedDate', '$insuranceExpiryDate', '$insuranceFilePath', '$dependentName', '$dependentContactNo', '$collateralFilesString')";

    if ($conn->query($sql) === TRUE) {
        echo "<script type='text/javascript'>
                if (confirm('New borrower added successfully! Would you like to add another borrower?')) {
                    window.location.href = 'dashboard.php';
                } else {
                    window.location.href = 'dashboard.php';
                }
              </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>
