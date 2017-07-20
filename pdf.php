<?php

require_once("includes/airports.php");
require_once("vendor/autoload.php"); // biblioteka composera
use NumberToWords\NumberToWords;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (isset($_POST["form-departure"]) &&
        isset($_POST["form-arrival"]) &&
        ($_POST["form-arrival"] != $_POST["form-departure"]) &&
        isset($_POST["time"]) && !empty($_POST["time"]) &&
        isset($_POST["lenght"]) && !empty($_POST["lenght"]) &&
        isset($_POST["price"]) && !empty($_POST["price"]) &&
        ($_POST["price"] > 0)
    ) {

        // Wyciąganie danych z POST

        $departureCode = $_POST["form-departure"];
        $arrivalCode = $_POST["form-arrival"];
        $time = $_POST["time"];
        $length = $_POST["lenght"];
        $price = $_POST["price"];

        foreach ($airports as $value1) {

            if ($value1["code"] === $departureCode) {
                $departureTimeZone = $value1["timezone"];
            }
        }

        foreach ($airports as $value2) {

            if ($value2["code"] === $arrivalCode) {
                $arrivalTimeZone = $value2["timezone"];
            }
        }

        foreach ($airports as $value3) {

            if ($value3["code"] === $departureCode) {
                $departureName = $value3["name"];
            }
        }

        foreach ($airports as $value4) {

            if ($value4["code"] === $arrivalCode) {
                $arrivalName = $value4["name"];
            }
        }

        // Obliczanie lokalnego czasu przylotu

        $dateObject = new DateTime($time);
        $departureDate = $dateObject->format("Y-m-d H:i");
        $newDate = $dateObject->modify("+$length hour");
        $arrivalDate = $newDate->format("Y-m-d H:i");

        // Zmienne do wyświetlenie w HTML

        $price = ($price * 1000) . " USD";
        $length .= " h.";
        $departureCode = "(" . $departureCode . ")";
        $arrivalCode = "(" . $arrivalCode . ")";
        $departureTimeZone = "(" . $departureTimeZone . ")";
        $arrivalTimeZone = "(" . $arrivalTimeZone . ")";

        // Generowanie imienia i nazwiska (composer)

        $faker = Faker\Factory::create();
        $passenger = $faker->name;

        // Cena słownie (composer)

        $numberToWords = new NumberToWords();
        $numberTransformer = $numberToWords->getNumberTransformer('en');
        $priceInWords = $numberTransformer->toWords($price);
        $priceInWords .= " dollars";

        // Generowanie PDF (composer)

        $html = '
        <table>
            <tr>
                <th colspan="2" style="background-color:#858285; text-align:center; font-size:40; color:#ffffff; font-weight:bold"> Ticket </th>
            </tr>
            <tr>
                <th style="background-color:#d5d5d3"> FROM </th>
                <th style="background-color:#d5d5d3"> TO </th>
            </tr>
            <tr>
                <?php
                echo "<td style=\'font-size:30px; font-weight:bold\'> $departureName $departureCode </td>";
                echo "<td style=\'font-size:30px; font-weight:bold\'> $arrivalName $arrivalCode </td>";
                ?>
            </tr>
            <tr>
                <th style="background-color:#d5d5d3"> DEPARTURE (local time) </th>
                <th style="background-color:#d5d5d3"> ARRIVAL (local time) </th>
            </tr>
            <tr>
                <?php
                echo "<td> $departureDate </br> $departureTimeZone </td>";
                echo "<td> $arrivalDate </br> $arrivalTimeZone </td>";
                ?>
            </tr>
            <tr>
                <th style="background-color:#d5d5d3" colspan="2"> FLIGHT LENGHT </th>
            </tr>
            <tr>
                <?php
                echo "<th style=\'font-size:30px; font-weight:bold\' colspan=\'2\'> $length </th>";
                ?>
            </tr>
            <tr>
                <th style="background-color:#d5d5d3" colspan="2"> PASSENGER </th>
            </tr>
            <tr>
                <?php
                echo "<th style=\'font-size:30px; font-weight:bold\' colspan=\'2\'> $passenger </th>";
                ?>
            </tr>
            <tr>
                <th style="background-color:#d5d5d3" colspan="2"> PRICE </th>
            </tr>
            <tr>
                <?php
                echo "<th colspan=\'2\'>
                        <p style=\'font-size:30px; font-weight:bold\'> $price </p>
                        <p> $priceInWords </p>
                     </th>";
                ?>
            </tr>
        </table>';

        $mpdf = new mPDF();
        $mpdf->WriteHTML($html);
//        $mpdf->Output("ticket.pdf", "D");

    } else {
        echo "<h3 style='color:red; font-family:Helvetica, Arial, sans-serif;'> Please fill out all form fields. </h3></br>";

        $departureName = null;
        $arrivalName = null;
        $departureCode = null;
        $arrivalCode = null;
        $departureDate = null;
        $arrivalDate = null;
        $departureTimeZone = null;
        $arrivalTimeZone = null;
        $length = null;
        $price = null;
        $priceInWords = null;
        $passenger = null;
    }
} else {
    $departureName = null;
    $arrivalName = null;
    $departureCode = null;
    $arrivalCode = null;
    $departureDate = null;
    $arrivalDate = null;
    $departureTimeZone = null;
    $arrivalTimeZone = null;
    $length = null;
    $price = null;
    $priceInWords = null;
    $passenger = null;
}



