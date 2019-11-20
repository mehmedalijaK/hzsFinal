<?php
// proveravamo da li je prosleđen parametar pod ključem ID u GET zahtevu
if (!isset($_GET['id'])) {
    echo "Parametar ID nije prosleđen!";
} else {
    // ako jeste prosleđen, čuvamo ga u promenljivoj $pomocna
    if ($_GET["id"] == -1) {
        echo "";
    } else {
        $pomocna = $_GET["id"];
        //uspostavljanje konekcije
        include "../konekcija.php";

        //upit za vraćanje podataka o predmetu koja je selektovan (preko ID-ja)
        $upit = "SELECT * FROM predmeti WHERE id = '$pomocna'";

        // čuvamo rezultat prethodnog upita
        $rezultat = $konekcija->query($upit);

        //ispis naziva kolona u tabeli
        echo "<table>
                <thead>
                    <tr>
                        <th>Naziv</th>
                        <th>Semestar</th>
                        <th>Vrsta</th>
                        <th>Broj prijavljenih</th>
                    </tr>
                </thead>
                <tbody>";

        //ispis podataka o zemlji
        while ($red = $rezultat->fetch_object()) {
            echo "<tr>";
            // dodati odgovarajuće vrednosti između tagova za elemente reda
            echo "<td>" . $red->naziv . "</td>";
            echo "<td>" . $red->semestar . "</td>";
            echo "<td>" . $red->vrsta . "</td>";
            echo "<td>" . $red->brojPrijavljenih . "</td>";
            echo "</tr>";
        }
        echo "</tbody></table>";
    }


}
