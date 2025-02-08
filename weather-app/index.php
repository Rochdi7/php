<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Météo</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-pzjw8f+ua7Kw1TIq0s8kz14eE3F4zUg9z1g2ykzS5my9+v6B8HHRYk07lAkjbk0M" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background: url('assets/rain.jpg') no-repeat center center fixed;
            background-size: cover;
            color: white;
            font-family: 'Lato', sans-serif;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="" method="POST" class="weather-form mb-4 p-4 rounded shadow">
            <div class="form-group">
                <select name="city" id="city" class="form-control rounded-pill p-2" style="width: 100%;">
                    <option value="casablanca">Casablanca</option>
                    <option value="rabat">Rabat</option>
                    <option value="marrakesh">Marrakech</option>
                    <option value="fes">Fès</option>
                    <option value="tangier">Tanger</option>
                    <option value="meknes">Meknès</option>
                    <option value="oujda">Oujda</option>
                    <option value="agadir">Agadir</option>
                    <option value="tetouan">Tétouan</option>
                    <option value="safi">Safi</option>
                    <option value="el-jadida">El Jadida</option>
                    <option value="kenitra">Kénitra</option>
                    <option value="nador">Nador</option>
                    <option value="settat">Settat</option>
                    <option value="larache">Larache</option>
                    <option value="khemisset">Khémisset</option>
                    <option value="berkane">Berkane</option>
                    <option value="benslimane">Benslimane</option>
                    <option value="guelmim">Guelmim</option>
                    <option value="essaouira">Essaouira</option>
                    <option value="midelt">Midelt</option>
                    <option value="khenifra">Khénifra</option>
                    <option value="chefchaouen">Chefchaouen</option>
                    <option value="taza">Taza</option>
                    <option value="errachidia">Errachidia</option>
                    <option value="ouarzazate">Ouarzazate</option>
                    <option value="tan-tan">Tan-Tan</option>
                    <option value="taounate">Taounate</option>
                    <option value="sidi-ifni">Sidi Ifni</option>
                    <option value="tiznit">Tiznit</option>
                </select>
            </div>
            <button type="submit" name="submit" class="btn btn-custom btn-block text-uppercase font-weight-bold">
                Obtenir la Météo
            </button>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $city = $_POST['city'];
            $api = '24118bb993dae186a553b9a612b8e244';
            $url = "https://api.openweathermap.org/data/2.5/weather?q=$city,MA&appid=$api&units=metric";

            $request = curl_init();
            curl_setopt($request, CURLOPT_URL, $url);
            curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($request);
            curl_close($request);

            $data = json_decode($response);

            if (isset($data->main->temp)) {
                $temp = $data->main->temp;
                $feels_like = $data->main->feels_like;
                $description = $data->weather[0]->description;
                $humidity = $data->main->humidity;
                $visibility = $data->visibility / 1000;
                $precipitation = isset($data->rain->{'1h'}) ? $data->rain->{'1h'} : 0;
                $wind_speed = $data->wind->speed * 2.23694;
                $details = "Aujourd'hui, attendez-vous à {$description} avec une température d'environ {$temp}°C.";

                $uv_url = "https://api.openweathermap.org/data/2.5/onecall?lat={$data->coord->lat}&lon={$data->coord->lon}&appid=$api";
                $uv_request = curl_init();
                curl_setopt($uv_request, CURLOPT_URL, $uv_url);
                curl_setopt($uv_request, CURLOPT_RETURNTRANSFER, true);
                $uv_response = curl_exec($uv_request);
                curl_close($uv_request);
                $uv_data = json_decode($uv_response);
                $uv_index = isset($uv_data->current->uvi) ? $uv_data->current->uvi : 'N/A';
            }
        }
        ?>

        <div class="temp">
            <div class="temp-header">
                <i class="fas fa-temperature-high"></i>
                <h1>Température Aujourd'hui à <?php echo ucfirst($city); ?></h1>
            </div>
            <div class="temp-info">
                <h2><?php echo $temp; ?>°C</h2>
                <h4><?php echo ucfirst($description); ?></h4>
                <p><?php echo $details; ?></p>
            </div>
        </div>

        <div class="main-card">
            <div class="cards">
                <div class="card-content">
                    <i class="fas fa-thermometer-half card-icon"></i>
                    <h3>Ressenti</h3>
                    <p><?php echo isset($feels_like) ? "$feels_like °C" : 'N/A'; ?></p>
                    <p>Le ressenti dû à l'humidité</p>
                </div>
            </div>
            <div class="cards">
                <div class="card-content">
                    <i class="fas fa-cloud-rain card-icon"></i>
                    <h3>Précipitations</h3>
                    <p><?php echo isset($precipitation) ? "$precipitation mm" : 'N/A'; ?></p>
                    <p>Précipitations dans les dernières 24h</p>
                </div>
            </div>
            <div class="cards">
                <div class="card-content">
                    <i class="fas fa-eye card-icon"></i>
                    <h3>Visibilité</h3>
                    <p><?php echo isset($visibility) ? "$visibility km" : 'N/A'; ?></p>
                </div>
            </div>
            <div class="cards">
                <div class="card-content">
                    <i class="fas fa-tint card-icon"></i>
                    <h3>Humidité</h3>
                    <p><?php echo isset($humidity) ? "$humidity%" : 'N/A'; ?></p>
                    <p>Niveau d'humidité actuel</p>
                </div>
            </div>
            <div class="cards">
                <div class="card-content">
                    <i class="fas fa-sun card-icon"></i>
                    <h3>Indice UV</h3>
                    <p><?php echo isset($uv_index) ? $uv_index : 'N/A'; ?></p>
                    <p>Niveau de risque UV</p>
                </div>
            </div>
            <div class="cards">
                <div class="card-content">
                    <i class="fas fa-wind card-icon"></i>
                    <h3>Vent</h3>
                    <p><?php echo isset($wind_speed) ? "$wind_speed MPH" : 'N/A'; ?></p>
                    <p>Vitesse du vent</p>
                </div>
            </div>
        </div>
</html>
