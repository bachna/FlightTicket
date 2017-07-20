<form action = "" method="POST" role="form">
<table>
    <tr>
        <legend>
            <th colspan="6" style="background-color:#be9501; color:#ffffff; text-align:center; font-size:40; font-weight:bold"> Coders Lab Airlines </th>
        </legend>
    </tr>
    <tr>
         <th colspan="3" style="background-color:#ffdf8a">
            <label> FROM </label></br>
            <select name="form-departure">
                <?php
                include("airports.php");
                foreach ($airports as $destination) {
                    echo "<option value=" . $destination['code'] . ">" . $destination['name'] . "</option>";
                }
                ?>
            </select>
        </th>
        <th colspan="3" style="background-color:#ffdf8a">
            <label> TO </label></br>
            <select name="form-arrival">
                <?php
                include("airports.php");
                foreach ($airports as $arrival) {
                    echo "<option value=" . $arrival['code'] . ">" . $arrival['name'] . "</option>";
                }
                ?>
            </select>
        </th>
    </tr>
    <tr>
        <td colspan="2" style="background-color:#ffdf8a">
            <label> DEPARTURE (local time) </label></br>
            <input type="datetime-local" name="time">
        </td>
        <td colspan="2" style="background-color:#ffdf8a">
            <label> FLIGHT LENGTH </label></br>
            <input type="number" name="lenght" min="0"step="1">
        </td>
        <td colspan="2" style="background-color:#ffdf8a">
            <label> PRICE </label></br>
            <input type="number" name="price" min="0" step="0.01">
        </td>
    </tr>
</table>
    </br>
<table style="border:0px; height:100px">
    <tr>
        <td colspan="6" style="border:0px; text-align:center;">
            <button type="submit"> GENERATE TICKET </button>
        </td>
    </tr>
</table>
</form>
    
