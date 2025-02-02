<?php
    include_once('config/db.php');
    include_once('includes/header.php');
    include_once('includes/side_bar.php');
?>

<div class="col-md-10 col-lg-9 py-4 text-white main-content" style="width: 1080px;">
    <h1 class="fw-bold mb-4">Admin Dashboard</h1>

    <!-- Overview Section -->
    <div class="overview">
        <h2>Overview</h2>
        <div class="d-flex justify-content-between">
            <div class="card bg-dark text-white p-3 shadow">
                <h4>Total Users</h4>
                <p>1234</p>
            </div>
            <div class="card bg-dark text-white p-3 shadow">
                <h4>Active Sessions</h4>
                <p>56</p>
            </div>
            <div class="card bg-dark text-white p-3 shadow">
                <h4>Total Tracks</h4>
                <p>756</p>
            </div>
            <div class="card bg-dark text-white p-3 shadow">
                <h4>Total Playlists</h4>
                <p>234</p>
            </div>
        </div>
    </div>

    <!-- User Management Section -->
    <div class="user-management mt-4">
        <h2>User Management</h2>
        <table class="table table-dark table-bordered">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Example user data -->
                <tr>
                    <td>john.doe@example.com</td>
                    <td>JohnDoe</td>
                    <td>Active</td>
                    <td><button class="btn btn-warning btn-sm">Edit</button> <button class="btn btn-danger btn-sm">Delete</button></td>
                </tr>
                <!-- Add more users dynamically -->
            </tbody>
        </table>
    </div>

    <!-- Music Management Section -->
    <div class="music-management mt-4">
        <h2>Music Management</h2>
        <button class="btn btn-success">Add New Track</button>
        <table class="table table-dark table-bordered mt-3">
            <thead>
                <tr>
                    <th>Track</th>
                    <th>Artist</th>
                    <th>Album</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Example track data -->
                <tr>
                    <td>Song Title</td>
                    <td>Artist Name</td>
                    <td>Album Name</td>
                    <td><button class="btn btn-warning btn-sm">Edit</button> <button class="btn btn-danger btn-sm">Delete</button></td>
                </tr>
            </tbody>
        </table>
    </div>

    <?php
    include_once('includes/footer.php');
?>
</div>


