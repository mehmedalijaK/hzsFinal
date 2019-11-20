<?php
// učitavanje skripte sa podacima o konekciji
// komande include ili require
require "../konekcija.php";

// promenljiva u kojoj čuvamo SQL upit za bazu 
$upit = "SELECT * FROM predmeti";

// da li je upit uspešno izvršen
if ( !$rezultat = $konekcija->query($upit) ) {
    // ako dođe do greške
    // pravimo promenljivu (tipa string) koja čuva json podatke o grešci
    $jsonString = '{ "greska": "Neuspesno izvrsavanje." }';
} else {
    //ako je izvršen upit
    // da li rezultat koji je vraćen iz baze ima više od 0 redova
    if ( $rezultat->num_rows > 0 ) {
        // pravimo promenljivu (tipa string) koja čuva json podatke iz baze
        $jsonString = '{ "predmeti": ';
        // inicijalizujemo prazan niz u kom ćemo čuvati predmete
        $niz = array();

        while ( $red = $rezultat->fetch_object() ) {
            // dodajemo sledeći element u niz
            $niz[] = $red;
        }

        // dodajemo postojećoj promenljivoj $jsonString niz koji smo napravili u prethodnoj petlji

        $jsonString .= json_encode($niz);
        // dodajemo promenljivoj zatvorenu vitićastu zagradu
        $jsonString .= '}';
    } else {
        //ako nema rezultata u bazi
        $jsonString = '{"greska":"Nema rezultata."}';
    }
}
// otvaranje novog fajla
// da li je uspešno otvoren
if ( $fajl = fopen("jsonIzBaze.json", 'w') ) {
    // upis podataka u fajl
    if ( fwrite($fajl, $jsonString) ) {
        //zatvaranje fajla
        echo "uspesno upisivanje";
        fclose($fajl);
    }
}
