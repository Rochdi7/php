<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Reader</title>
</head>
<body>

     <div class="container">
        <div class="wrapper">
            <div class="header">
            <h1>PDF Reader</h1>
            </div>
            <div class="image">
                <img src="https://artmapp.ma/wp-content/uploads/2024/10/marrakech.jpeg" width="350px" height="450px" alt="">
            </div>
            <div class="bottom">
            <button onclick="window.location.href='pdf-reader.php';">Read File</button>

            </div>
        </div>
     </div>
    
     <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .container{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container .wrapper{
            background-color: #8EA3A6;
        }
        .container .wrapper .header{
            background-color: #D7D3BF;
            height: 50px;
        }
        .container .wrapper .header h1{
            text-align: center;
            color: #2A3335;
        }
        .container .wrapper .bottom{
            background-color: #D7D3BF;
            height: 50px;
        }
        .container .wrapper .bottom button{
            background-color: #2A3335;
            color: #D7D3BF;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            width: 150px;
            display: block;
            margin: 0 auto;
        }
     </style>
</body>
</html>