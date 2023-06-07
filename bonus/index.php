<?php

    // array alberghi

    $hotels = [
        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],
    ];

    $filteredArray = $hotels;
    if(isset($_GET['vote']) && $_GET['vote'] !== ''){
        $tempHotels = [];
        foreach($hotels as $hotel){
            if($hotel['vote'] >= $_GET['vote']){
                $tempHotels[] = $hotel;
            }
        }
        $filteredArray = $tempHotels;
    }

    if(isset ($_GET['parking']) && $_GET['parking'] !== ''){
        $tempHotels = [];
        foreach($filteredArray as $hotel){
            if($hotel['parking'] == $_GET['parking']){
                $tempHotels[] = $hotel;
            }
        }
        $filteredArray = $tempHotels;

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php Hotel</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
<div class="container">
        <div class="row">
            <div class="col">

                <!-- form per voto e parcheggio -->

                <form action="./index.php" method="GET">
                    <div class="col-4">
                        <label class="control-label">Vote</label>
                        <input type="number" class="form-control" placeholder="Voto" name="vote" value="<?php echo isset($_GET['vote']) ? $_GET['vote'] : '' ?>">
                    </div>

                    <div class="col-4">
                        <label class="control-label">Parking</label>
                        <select class="form-control" name="parking">
                            <option value="">Scegli</option>
                            <option value="0" <?php echo (isset($_GET['parking']) && $_GET['parking'] == 0) ? 'selected' : '' ?>>No</option>
                            <option value="1" <?php echo (isset($_GET['parking']) && $_GET['parking'] == 1) ? 'selected' : '' ?>>Si</option>
                        </select>
                    </div>

                    <div class="col-4">
                        <button type="submit">Cerca</button>
                        <button type="reset">Reset</button>
                    </div>
                </form>

                <!-- tabella -->

                <table class="table">
                    <thead>

                        <!-- ciclo le chiavi dell'array di array -->

                         <?php foreach($hotels[0] as $key => $item){?>
                            <th>
                                <?php echo ($key); ?>
                            </th>
                        <?php
                        }
                        ?>
                    </thead>
                    <tbody>

                        <!-- ciclo gli oggetti dell'array -->

                        <?php foreach($filteredArray as $item){?>
                            <tr>
                                <td><?php echo $item['name']; ?></td>
                                <td><?php echo $item['description']; ?></td>
                                <td>
                                    <?php if($item['parking']){
                                        echo 'Si';
                                    }else{
                                        echo 'No';
                                    }; ?>
                                </td>
                                <td><?php echo $item['vote']; ?></td>
                                <td><?php echo $item['distance_to_center']." Km"; ?></td>
                            </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</body>
</html>