<!DOCTYPE HTML lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="styles/dashboard.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Source+Serif+4:ital,opsz,wght@0,8..60,200..900;1,8..60,200..900&display=swap"
        rel="stylesheet">
    <!-- SweetAlert2 -->
    <script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <!-- Zooming -->
    <script src="node_modules/zooming/build/zooming.min.js"></script>

    <title>Dashboard</title>
</head>

<body>
    <nav>
        <div class="dashboard-container">

            <div class="dashboard-header">
                <div class="logo-container">
                    <img src="images/dashboard.png" alt="Dashboard Logo">
                </div>
                <div class="dashboard-header-right">
                    <div class="dashboard-header-right-content">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M3 13h8V3H3zm0 8h8v-6H3zm10 0h8V11h-8zm0-18v6h8V3z" />
                        </svg>
                        <p>Dashboard</p>
                    </div>
                    <div class="notification">
                        <div class="notification-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M12 22c1.1 0 2-.9 2-2h-4a2 2 0 0 0 2 2m6-6v-5c0-3.07-1.64-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.63 5.36 6 7.92 6 11v5l-2 2v1h16v-1z" />
                            </svg>
                            <p>Notification</p>
                        </div>
                        <div class="notification-dropdown">
                            <div class="notification-dropdown-content">
                                <p>No new notifications</p>
                                <a href="#">View all notifications</a>
                            </div>

                        </div>
                    </div>
                    <div class="profile">
                        <img src="images/profile.jpg" alt="Profile picture of John Doe">
                        <div class="profile-dropdown">
                            <p>Welcome, John Doe</p>
                            <div class="profile-dropdown-content">
                                <a href="#">Profile</a>
                                <a href="#">Manage User Access</a>
                                <a href="#">Borrower List</a>
                                <a href="#">Audit Logs</a>
                                <a href="#">Logout</a>
                            </div>
                        </div>
                        <svg class="arrow-down-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24">
                            <path fill="currentColor" d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6l-6-6z" />
                        </svg>
                    </div>
                </div>
    </nav>


    <div class="dashboard-content">

        <div class="dashboard-content-button">
            <div class="search-container">
                <input type="text" placeholder="Search" class="search-input">
                <button class="search-btn">Search</button>
            </div>
            <div class="button-container">
                <button class="add-btn" id="add-btn">Add</button>
                <button disabled class="edit-btn" id="edit-btn">Edit</button>
                <button disabled class="delete-btn" id="delete-btn">Delete</button>
            </div>
        </div>

        <div class="form-container">
            <h1>Personal Information</h1>
            <form action="#" method="post" enctype="multipart/form-data">
                <div class="input-row">
                    <div>
                        <label for="fName">First Name</label><br>
                        <input type="text" id="fName" name="fName" placeholder="First Name" class="input-text" required
                            disabled>
                    </div>
                    <div>
                        <label for="lName">Middle Name</label><br>
                        <input type="text" id="mName" name="mName" placeholder="Middle Name" class="input-text" required
                            disabled>
                    </div>
                    <div>
                        <label for="email">Surname</label><br>
                        <input type="text" id="surname" name="surname" placeholder="Surname" class="input-text" required
                            disabled>
                    </div>
                    <div>
                        <label for="suffix">Suffix</label><br>
                        <select id="suffix" name="suffix" class="input-text" disabled>
                            <option value="" disabled selected>Select suffix</option>
                            <option value="None">None</option>
                            <option value="Jr.">Jr.</option>
                            <option value="Sr.">Sr.</option>
                            <option value="II">II</option>
                            <option value="III">III</option>
                        </select>
                    </div>
                </div>
                <div class="input-row">
                    <div>
                        <label for="sex">Sex</label><br>
                        <input type="radio" id="male" name="sex" value="male" class="input-radio" disabled required>
                        <label for="male">Male</label>
                        <input type="radio" id="female" name="sex" value="female" class="input-radio" disabled>
                        <label for="female">Female</label>
                    </div>
                    <div>
                        <label for="DOB">Date of Birth</label><br>
                        <input type="date" id="DOB" name="DOB" class="input-text" required disabled>
                    </div>
                    <div>
                        <label for="maritalStatus">Marital Status</label><br>
                        <select id="maritalStatus" name="maritalStatus" class="input-text" disabled>
                            <option value="">Select marital status</option>
                            <option value="single">Single</option>
                            <option value="married">Married</option>
                            <option value="divorced">Divorced</option>
                            <option value="widowed">Widowed</option>
                        </select>
                    </div>
                    <div>
                        <label for="contactNo">Contact Number</label><br>
                        <input type="tel" id="contactNo" name="contactNo" placeholder="09**********" class="input-text"
                            required disabled>
                    </div>
                </div>

                <h1>Address</h1>
                <div class="input-row">

                    <div>
                        <label for="homeNo">Home Number</label><br>
                        <input type="text" id="homeNo" name="homeNo" class="input-text" required disabled>
                    </div>
                    <div>
                        <label for="street">Street</label><br>
                        <input type="text" id="street" name="street" class="input-text" required disabled>
                    </div>
                    <div>
                        <label for="baranggay">Baranggay</label><br>
                        <input type="text" id="baranggay" name="baranggay" class="input-text" required disabled>
                    </div>
                    <div>
                        <label for="city">City</label><br>
                        <input type="text" id="city" name="city" class="input-text" required disabled>
                    </div>

                </div>
                <div class="input-row-few">

                    <div>
                        <label for="province">Province</label><br>
                        <input type="text" id="province" name="province" class="input-text" required disabled>
                    </div>
                    <div>
                        <label for="region">Region</label><br>
                        <input type="text" id="region" name="region" class="input-text" required disabled>
                    </div>

                </div>

                <h1>Identity</h1>
                <div class="input-row">

                    <div>
                        <label for="idType">Type of ID</label><br>
                        <select name="idType" id="idType" class="input-text" disabled>
                            <option value="SSS">SSS</option>
                            <option value="TIN">TIN</option>
                            <option value="PAGIBIG">PAGIBIG</option>
                            <option value="PhilHealth">PhilHealth</option>
                            <option value="PAN">PAN</option>
                            <option value="SSS">SSS</option>
                            <option value="GSIS">GSIS</option>
                            <option value="National ID">National ID</option>
                            <option value="Birth Certificate">Birth Certificate</option>
                            <option value="Voter's ID">Voter's ID</option>
                            <option value="Driver's License">Driver's License</option>
                            <option value="Passport">Passport</option>
                        </select>
                    </div>
                    <div>
                        <label for="idNo">ID Number</label><br>
                        <input type="text" id="idNo" name="idNo" class="input-text" required disabled>
                    </div>
                    <div>
                        <label for="expiryDate">Expiry Date</label><br>
                        <input type="date" id="expiryDate" name="expiryDate" class="input-text" required disabled>
                    </div>
                    <div>
                        <label for="photo">Upload photo of ID</label><br>
                        <input type="file" accept="image/*" id="idPhoto" name="idPhoto" class="img-input" disabled>
                        <div id="idPhotoPreview"></div>

                    </div>

                </div>

                <h1>Employer Details</h1>
                <div class="input-row">
                    <div>
                        <label for="employerName">Name of Employer</label><br>
                        <input type="text" id="employerName" name="employerName" class="input-text" required disabled>
                    </div>
                    <div>
                        <label for="noOfYearsWorked">No. of Years with Employer</label><br>
                        <input type="number" id="noOfYearsWorked" class="input-text" name="noOfYearsWorked" required
                            disabled>
                    </div>
                    <div>
                        <label for="position">Position</label><br>
                        <input type="text" id="position" name="position" class="input-text" disabled>
                    </div>
                    <div>
                        <label for="phoneNoEmployer">Employer's Phone Number</label><br>
                        <input type="tel" id="phoneNoEmployer" name="phoneNoEmployer" class="input-text" disabled>
                    </div>
                </div>
                <div class="input-row">
                    <div>
                        <label for="salary">Salary</label><br>
                        <input type="number" id="salary" name="salary" class="input-text" disabled>
                    </div>
                </div>

                <h1>Employer Address</h1>
                <div class="input-row">
                    <div>
                        <label for="homeNo">Home Number</label><br>
                        <input type="text" id="EmployerhomeNo" name="EmployerhomeNo" class="input-text" required
                            disabled>
                    </div>
                    <div>
                        <label for="street">Street</label><br>
                        <input type="text" id="Employerstreet" name="Employerstreet" class="input-text" required
                            disabled>
                    </div>
                    <div>
                        <label for="baranggay">Baranggay</label><br>
                        <input type="text" id="Employerbaranggay" name="Employerbaranggay" class="input-text" required
                            disabled>
                    </div>
                    <div>
                        <label for="city">City</label><br>
                        <input type="text" id="Employercity" name="Employercity" class="input-text" required disabled>
                    </div>
                </div>
                <div class="input-row-few">
                    <div>
                        <label for="province">Province</label><br>
                        <input type="text" id="Employerprovince" name="Employerprovince" class="input-text" required
                            disabled>
                    </div>
                    <div>
                        <label for="region">Region</label><br>
                        <input type="text" id="Employerregion" name="Employerregion" class="input-text" required
                            disabled>
                    </div>
                </div>
                <!-- 
                <h1>Is Insured</h1>
                <div class="input-row">
                    <div>
                        <label for="isInsured">Is Insured</label><br>
                        <select name="isInsured" id="isInsured" class="input-text" disabled>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div> -->

                <h1>Insurance Details</h1>
                <div class="input-row">
                    <div>
                        <label for="insuranceType">Type of Insurance</label><br>
                        <select name="insuranceType" id="insuranceType" class="input-text" disabled>
                            <option value="" disabled selected>Select type of insurance</option>
                            <option value="Health Insurance">Health Insurance</option>
                            <option value="Life Insurance">Life Insurance</option>
                            <option value="Single Premium">Single Premium</option>
                            <option value="Family Premium">Family Premium</option>
                            <option value="None">None</option>
                        </select>
                    </div>
                    <div>
                        <label for="issuedDate">Date Issued</label><br>
                        <input type="date" id="issuedDate" name="issuedDate" class="input-text" disabled>
                    </div>
                    <div>
                        <label for="expiryDateInsurance">Expiry Date</label><br>
                        <input type="date" id="expiryDateInsurance" name="expiryDateInsurance" class="input-text"
                            disabled>
                    </div>
                    <div>
                        <label for="uploadInsurance">Upload Insurance</label><br>
                        <input type="file" id="insurancePhoto" class="img-input" accept="image/*" disabled>
                        <div id="insurancePhotoPreview"></div>
                    </div>
                </div>
                <div class="input-row-few">
                    <div>
                        <label for="dependentName">Name of Dependent</label><br>
                        <input type="text" id="dependentName" name="dependentName" class="input-text" disabled>
                    </div>
                    <div>
                        <label for="dependentContactNo">Dependent Contact No.</label><br>
                        <input type="tel" id="dependentContactNo" name="dependentContactNo" class="input-text" disabled>
                    </div>
                </div>

                <h1>Collateral</h1>
                <div class="input-row">
                    <div>
                        <label for="collateral">Upload Pictures of Collateral</label><br>
                        <input type="file" accept="image/*" class="img-input" id="collateral" multiple disabled>
                        <div id="collateral-preview"></div> <!-- Add this div for preview -->
                    </div>
                </div>
                <div class="button-container">
                    <input type="submit" value="Confirm" class="confirmBtn">
                </div>
                <div class="button-container">
                    <button class="updateBtn">Update</button>
                </div>
            </form>
        </div>
    </div>

    </div>
    <!-- Payment Modal -->
    <div id="paymentModal" class="modal">
        <div class="modal-content">
            <span class="close-modal" data-modal="paymentModal">&times;</span>
            <h2>Add New Payment</h2>
            <form action="">
                <div>
                    <label for="paymentType">Type of Payment</label><br>
                    <select name="paymentType" id="paymentType" class="input-text-modal" required>
                        <option value="" disabled selected>Select type of payment</option>
                        <option value="Cash">Cash</option>
                        <option value="Cheque">Cheque</option>
                        <option value="Credit Card">Credit Card</option>
                        <option value="Bank Transfer">Bank Transfer</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div>
                    <label for="paymentDate">Payment Date</label><br>
                    <input type="date" id="paymentDate" name="paymentDate" class="input-text-modal" required>
                </div>
                <div>
                    <label for="paymentAmount">Payment Amount</label><br>
                    <input type="number" id="paymentAmount" name="paymentAmount" class="input-text-modal" required>
                </div>
                <div class="button-container">
                    <input type="submit" value="Add Payment" class="confirmBtn">
                </div>
                <div class="button-container">
                    <input type="reset" value="Clear" class="cancelBtn">
                </div>
            </form>
        </div>
    </div>

    <!-- Loan Modal -->
    <div id="loanModal" class="modal">
        <div class="modal-content">
            <span class="close-modal" data-modal="loanModal">&times;</span>
            <h2>Add New Loan</h2>
            <form action="#" method="post" enctype="multipart/form-data">
                <div>
                    <label for="customerType">Type of Customer</label><br>
                    <select name="customerType" id="customerType" class="input-text-modal" required>
                        <option value="" disabled selected>Select type of customer</option>
                        <option value="Regular">Regular</option>
                        <option value="VIP">VIP</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div>
                    <label for="interestRate">Interest Rate</label><br>
                    <input type="number" id="interestRate" name="interestRate" class="input-text-modal" required
                        disabled max="100"
                        oninput="this.value = this.value > 100 ? 100 : this.value < 0 ? 0 : this.value">
                </div>
                <div>
                    <label for="loanDate">Loan Date</label><br>
                    <input type="date" id="loanDate" name="loanDate" class="input-text-modal" required>
                </div>
                <div>
                    <label for="term">Term in Months</label><br>
                    <input type="number" id="term" name="term" class="input-text-modal" required>
                </div>
                <div>
                    <label for="loanAmount">Loan Amount</label><br>
                    <input type="number" id="loanAmount" name="loanAmount" class="input-text-modal" required>
                </div>

                <div class="button-container">
                    <input type="submit" value="Add Loan" class="">
                </div>
                <div class="button-container">
                    <input type="reset" value="Clear" class="cancelBtn">
                </div>
            </form>
        </div>
    </div>

    <!-- Grocery Modal -->
    <div id="groceryModal" class="modal">
        <div class="modal-content">
            <span class="close-modal" data-modal="groceryModal">&times;</span>
            <h2>Add New Grocery</h2>
            <form action="">
                <div>
                    <label for="groceryDate">Grocery Date</label><br>
                    <input type="date" id="groceryDate" name="groceryDate" class="input-text-modal" required>
                </div>
                <div>
                    <label for="groceryAmount">Grocery Amount</label><br>
                    <input type="number" id="groceryAmount" name="groceryAmount" class="input-text-modal" required>
                </div>
                <div class="button-container">
                    <input type="submit" value="Add Grocery" class="confirmBtn">
                </div>
                <div class="button-container">
                    <input type="reset" value="Clear" class="cancelBtn">
                </div>
            </form>
        </div>
    </div>

    <div class="table-container">
        <div class="table-button-container">
            <div class="table-button-group">
                <button id="tblAllBtn" class="active">All</button>
                <button id="tblPaymentBtn">Payment</button>
                <button id="tblLoanBtn">Loan</button>
                <button id="tblGroceryBtn">Grocery Item</button>
            </div>

            <div class="table-button-add">
                <button id="addBtn">Add new</button>
            </div>
        </div>
        <table>
            <tr>
                <th>Transaction Date</th>
                <th>Reference #</th>
                <th>Type</th>
                <th>Due Date</th>
                <th>Amount</th>
                <th>Interest Rate</th>
                <th>Term</th>
                <th>Promisory Note</th>
                <th>Remarks</th>
                <th>Balance</th>
                <th>Action</th>

            </tr>
            <tr>
                <td>01/30/2025</td>
                <td>03/30/2025</td>
                <td>0130202545</td>
                <td>Loan</td>
                <td>20,000</td>
                <td>7%</td>
                <td>30 months</td>
                <td><button>View</button></td>
                <td><button>View</button></td>
                <td>10,000</td>
                <td><button>Pay</button></td>
            </tr>
        </table>
    </div>
</body>
<!-- JavaScript -->
<script src="scripts/dashboard.js"></script>

</html>