<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="styles/profile.css">
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

    <title>Profile</title>
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
    <div class="profile-container">
        <h1>Profile</h1>
        <div class="profile-content">

            <div class="profile-picture">
                <h1>Profile Picture</h1>
                <form action="" method="post">
                    <div class="upload-profile-picture-container">
                        <img src="images/profile.jpg" alt="Profile picture of John Doe" id="profile-picture-preview">
                        <div class="upload-profile-picture-btn-container">
                            <p>Upload a new profile picture</p>
                            <input type="file" name="profile-picture" id="profile-picture-upload" accept="image/*">
                        </div>
                    </div>
                    <div class="confirm-upload-profile-btn-container">
                        <button id="cancel-upload-profile-btn">Cancel</button>
                        <button type="submit" id="upload-profile-btn" disabled>Confirm</button>
                    </div>
                </form>
            </div>

            <div class="profile-info">
                <h1>Personal Information</h1>
                <form action="#" method="post">
                    <label for="Name">Full Name</label><br>
                    <input type="text" id="Name" class="inputs" name="Name" value="John Doe" disabled><br>
                    <label for="Email">Email</label><br>
                    <input type="email" id="Email" class="inputs" name="Email" value="jdoe@up.edu.ph" disabled><br>
                    <label for="Password">Password</label><br>
                    <input type="password" id="Password" class="inputs" name="Password" value="********" disabled><br>
                    <label for="Confirm Password">Confirm Password</label><br>
                    <input type="password" id="Confirm Password" class="inputs" name="Confirm Password" disabled><br>
                </form>

                <div class="profile-button-container">
                    <button id="edit-profile-btn">Edit Profile</button>
                    <button id="save-profile-btn">Save Profile</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="scripts/profile.js"></script>

</html>