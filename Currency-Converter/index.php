<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currency Converter</title>

</head>
<body>

<div class="container">
    <h1>Currency Converter</h1>

    <?php 
    if (isset($_POST['submit'])) {
        $from = $_POST['from'];
        $to = $_POST['to'];
        $amount = $_POST['amount'];

        $apiKey = '5b14c25b497d4c43b52fa1e56bd3de5b'; 
        $url = "https://api.currencyfreaks.com/latest?apikey=$apiKey";

        $response = file_get_contents($url);
        $data = json_decode($response, true);

        if ($data && isset($data['rates'][$from]) && isset($data['rates'][$to])) {
            $rateFrom = $data['rates'][$from];
            $rateTo = $data['rates'][$to];

            $convertedAmount = ($amount / $rateFrom) * $rateTo;

            echo "<p class='converted-succes' ><strong>Converted Amount:</strong> $convertedAmount $to</p>";
        } else {
            echo "<p class='converted-amount' >Invalid currency codes or failed to fetch exchange rates.</p>";
        }
    }
    ?>

    <form method="post" action="index.php">
        <div class="form-group">
            <label class="up" for="from">From (Put your currency ,EUR..)</label>
            <input type="text" name="from" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="to">(Put your currency ,EUR..)</label>
            <input type="text" name="to" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" name="amount" class="form-control" required>
        </div>
        <input type="submit" name="submit" class="btn btn-info" value="Convert">
    </form>
</div>

<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #EEEEEE;
            color: #333;
            text-align: center;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 500px;
            margin: auto;
            background: #091057;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 450px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        input {
            width: 400px;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .btn {
            background-color: #EC8305;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 150px;
            font-size: 18px;
            text-transform: uppercase;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        h1 {
            color: #EC8305;
        }
        .container .form-group label{
            color: #DBD3D3;
        }
        .converted-amount{
            color: red;
        }
        .converted-succes{
            color: green;
            padding: 20px;
            background-color: #DBD3D3;
            border-radius: 25px;
            width: 250px;
            margin: 0 auto;
            font-weight: 700;
            box-shadow: 4px 4px 8px rgba(0, 0, 0, 0.2);
        }
        .converted-succes:hover{
            background-color: #0056b3;
            cursor: pointer;
            color: white;
        }
        .up{
            margin-top: 20px;
        }
    </style>
    
</body>
</html>
