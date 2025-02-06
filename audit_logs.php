<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="styles/audit_logs.css">
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
    <title>Audit Logs</title>
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

    <div class="audit-logs-header">
        <h1>Audit Logs</h1>
    </div>

    <div class="audit-logs-container">
        <div class="audit-logs-buttons">
            <div class="audit-logs-search">
                <input type="text" placeholder="Search">
                <button>Search</button>
            </div>
            <div class="audit-logs-buttons-right">
                <button id="filter-audit-logs-btn">Filter</button>
                <button id="export-audit-logs-btn">Export</button>
                <button id="print-audit-logs-btn">Print</button>
            </div>
        </div>
        <div class="audit-logs-table">
            <table>
                <tr>
                    <th>Date</th>
                    <th>Time</th>
                    <th>User</th>
                    <th>Summary</th>
                    <th>Category</th>
                </tr>
                <tr>
                    <td>2021-09-01</td>
                    <td>12:00:00</td>
                    <td>John Doe</td>
                    <td>John Doe has been added</td>
                    <td>User Management</td>
            </table>
        </div>
    </div>
    <script src="scripts/audit_logs.js"></script>
</body>

</html>