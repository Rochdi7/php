
<?php 
require 'user-info.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get User Info</title>
</head>
<body>
    <div class="container">
        <h1>Get User Info</h1>
        <div class="info">
        <h2>Your Ip Adresse :</h2>
        <p><?php echo UserInfo::get_ip(); ?></p>
        </div>
        <div class="info">
        <h2>Your Browser :</h2>
        <p><?php echo UserInfo::get_browser(); ?></p>
        </div>
        <div class="info">
        <h2>Your Device :</h2>
        <p><?php echo UserInfo::get_device(); ?></p>
        </div>
        <div class="info">
        <h2>Your Operating Systems:</h2>
        <p><?php echo UserInfo::get_os(); ?></p>
        </div>

    </div>

    <style>
        body{
            background-color: #1B1833;
        }
        h1{
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            color: #fff;
            background-color: #AB4459;
            padding: 15px;
            width: 600px;
           text-align: center;
           border-radius: 10px;
           text-transform: uppercase;
        }
       
        .container{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .container .info{
           display: flex;
           justify-content: center;
           align-items: center;
           margin: 10px;
           
        }
        .container .info h2{
            margin-right: 60px;
            color: #AB4459;
            width: 300px;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;

        }
        .container .info p{
            background-color: #441752;
            padding: 15px;
            color: #fff;
            border-radius: 10px;
            text-transform: uppercase;
            width: 250px;
            text-align: center;
        }
    </style>
</body>
</html>