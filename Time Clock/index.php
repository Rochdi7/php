<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Time Clock</title>
</head>
<body>

<div class="container">
    <h1>Time Clock</h1>
    <div class="clock">
        <div class="time">
           <p> <?php echo date('H:i:s A'); ?></p>
        </div>
    </div>
</div>

<style>
        body {
            background-color: #1B1833;
            font-family: Arial, sans-serif;
            text-align: center;
            color: #F29F58;
        }
        .container h1 {
            color: #F29F58;
            margin-bottom: 20px;
        }
        .clock {
            width: 300px;
            height: 300px;
            background-color: #F29F58; 
            border: 10px solid #AB4459; 
            border-radius: 50%; 
            position: relative;
            margin: 0 auto;
        }
        .time {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 2rem;
            color: #FFFFFF;
            background: #1B1833;
            padding: 10px 20px;
            border-radius: 5px;
            width: 200px;
            height: 70px;
        }
        .time p{
            position: absolute;
            top: -5px;
            left: 27px;
        }
    </style>

</body>
</html>
