<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- link od CDN za jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- naša klijentska skripta -->
    <script>
        // koristimo jQuery da proverimo da li je završeno učitavanje dokumenta
        $(document).ready(function() {
            $("#listaPredmeta").change(function () {
                var vrednost = $("#listaPredmeta").val();
                $.ajax({
                    url: "prikaziPredmete.php",
                    type: "get",
                    data: {
                        id: vrednost
                    },
                    success: function(predmeti) {
                        $("#popuni").html(predmeti);
                    }
                });
            });
        });
    </script>
</head>

<body>
    <?php
    // 
    include "../konekcija.php";
    // 
    $upit = "SELECT id, naziv FROM predmeti";
    // čuvanje rezultata izvršenja upita u promenljivoj
    $rezultat = $konekcija->query($upit);
    ?>
    <div class="container">
        <form>
            <!-- iz padajućeg menija može da se izabere predmet o kom želimo da vidimo podatke -->
            <b>Izaberi predmet:</b>

            <!-- padajući meni pravimo preko elementa "select",
            a stavke padajućeg menija su elementi "option" -->
            <select name="predmeti" id="listaPredmeta">
                <!-- jedan prazan option -->
                <option value="kljuc">sadrzaj</option>
                <?php
                // dok postoje redovi u rezultatu, nad njima pozivamo funkciju fetch_object()
                // otkomentarisati sledeći red
                while ($red = $rezultat->fetch_object()) {
                    ?>
                    <!-- atribut value treba da bude ID drŽave, a tekstualni sadržaj elementa option treba da bude IME DRŽAVE  -->
                    <option value="<?php echo "$red->id"; ?>"> <?php echo "$red->naziv"; ?> </option>
                <?php
                    // otkomentarisati sledeći red
                }
                ?>
            </select>
        </form>

        <br>
        <hr>
        <br>

        <p>
            <div id="popuni">
                Podaci o selektovanom predmetu će biti prikazani umesto ovog div elementa. Stranica se ne učitava ponovo.
            </div>
        </p>

    </div>

    <?php
    $konekcija->close();
    ?>
</body>

</html>