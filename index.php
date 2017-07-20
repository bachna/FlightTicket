<?php

require_once("includes/visits.php");
require_once("includes/form.php");
require_once("includes/airports.php");
require_once("pdf.php");

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Flights reservations </title>
    <style>
        body {
            font-family: Helvetica, Arial, sans-serif;
        }
        table {
            font-family:Helvetica, Arial, sans-serif;
            width:700px;
            border:1px solid black;
        }
        tr, th, td {
            border:1px solid black;
            text-align:left;
            padding:10px;
            vertical-align:middle;
        }
        th, td {
            width:50%;
            vertical-align:top;
        }
        select {
            width:300px;
            height:30px;
        }
        input {
            width:200px;
            height:30px;
            line-height: 24px;
        }
        label {
            font-size:16px;
            line-height: 24px;
        }
        button {
            width:200px;
            height:50px;
            font-size:16px;
            font-weight:bold;
            background-color: #d5d5d3;
        }
    </style>
</head>
<body>
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
            echo "<td style='font-size:30px; font-weight:bold'> $departureName $departureCode </td>";
            echo "<td style='font-size:30px; font-weight:bold'> $arrivalName $arrivalCode </td>";
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
            <th style="background-color:#d5d5d3" colspan="2"> FLIGHT LENGTH </th>
        </tr>
        <tr>
            <?php
            echo "<th style='font-size:30px; font-weight:bold' colspan='2'> $length </th>";
            ?>
        </tr>
        <tr>
            <th style="background-color:#d5d5d3" colspan="2"> PASSENGER </th>
        </tr>
        <tr>
            <?php
            echo "<th style='font-size:30px; font-weight:bold' colspan='2'> $passenger </th>";
            ?>
        </tr>
        <tr>
            <th style="background-color:#d5d5d3" colspan="2"> PRICE </th>
        </tr>
        <tr>
            <?php
            echo "<th colspan='2'>
                    <p style='font-size:30px; font-weight:bold'> $price </p>
                    <p> $priceInWords </p>
                 </th>";
            ?>
        </tr>
    </table>
</body>
</html>
