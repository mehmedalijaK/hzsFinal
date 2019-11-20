<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- link za css -->
    <link rel="stylesheet" href="darkly.css">

</head>

<body>
    <?php
    // učitavanje fajla
    $jsonFajl = file_get_contents("predmeti.json");
    // pretvaranje učitanog sadržaja u niz u PHP-u
    $jsonObjekat = json_decode($jsonFajl);
    ?>
    <div class="container">
        <!-- tabela -->
        <table class="table">
            <!-- nazivi kolona -->
            <thead class="table-success">
                <tr>
                    <th>Naziv</th>
                    <th>Semestar</th>
                    <th>Vrsta</th>
                    <th>Broj prijavljenih</th>
                </tr>
            </thead>

            <!-- podaci iz tabele -->
            <tbody>
                <?php
                // otkomentarisati sledeći red
                // alijas elementNiza za elemente niza predmeti
                foreach ($jsonObjekat->predmeti as $elementNiza) {
                ?>
                <!-- jedan red u tabeli -->
                <tr>
                    <!-- po jedna ćelija u tabeli -->
                    <td><?php echo $elementNiza->naziv; ?></td>
                    <td><?php echo $elementNiza->semestar; ?></td>
                    <td><?php echo $elementNiza->vrsta; ?></td>
                    <td><?php echo $elementNiza->broj_prijavljenih; ?></td>
                </tr>
                <?php
                // otkomentarisati sledeći red
                }
                ?>
            </tbody>

        </table>

    </div>

</body>

</html>