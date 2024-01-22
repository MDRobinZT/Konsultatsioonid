<link rel="stylesheet" href="styles.css">

<?php if (isset($_GET['code'])) { die(highlight_file(__FILE__, 1)); }
require('conf.php');
// Konsultatsiooni lisamine andmebaasi tabelisse

if (isset($_POST["nimi"]) && !empty(trim($_POST["nimi"]))) {
    global $yhendus;
    $paring = $yhendus->prepare("INSERT INTO opetajad(opetajaNimi, paev, tund, klassiruum, periood, kommentaar) VALUES (?, ?, ?, ?, ?, ?)");
    $paring->bind_param("ssssss", $_POST["nimi"], $_POST["day"], $_POST["tund"], $_POST["classroom"], $_POST["period"], $_POST["comment"]);
    $paring->execute();
}

?>
<!--Header ja navbar -->
<h1 class="header">Konsultatsioonide lisamine</h1>
<nav>
    <ul>
        <li><a href="Lisamine.php">Lisamise leht</a></li>
        <li><a href="Konsultatsioon.php">Konsultatsiooni tabeli leht</a></li>
    </ul>
</nav>

</table>
<form action="?" method="post">
    <!--Ripploend-->
    <select name="nimi" class="opetajad-input">
        <?php
        $teachers_query = $yhendus->prepare("SELECT DISTINCT opetajaNimi FROM opetajad");
        $teachers_query->bind_result($teacher_name);
        $teachers_query->execute();

        while ($teachers_query->fetch()) {
            echo "<option value=\"$teacher_name\">$teacher_name</option>";
        }

        $teachers_query->close();
        ?>
    </select>

    <!--Ripploend-->
    <select name="day" class="day-input">
        <option value="Esmaspäev">Esmaspäev</option>
        <option value="Teisipäev">Teisipäev</option>
        <option value="Kolmapäev">Kolmapäev</option>
        <option value="Neljapäev">Neljapäev</option>
        <option value="Reede">Reede</option>
    </select>


    <input type="text" name="tund" class="tund-input" placeholder="Tund">

    <!--Ripploend-->

    <select name="period" class="period-input">
        <option value="1 Periood">1. Periood</option>
        <option value="2 Periood">2. Periood</option>
        <option value="3 Periood">3. Periood</option>
        <option value="4 Periood">4. Periood</option>
        <option value="5 Periood">5. Periood</option>
        <option value="6 Periood">6. Periood</option>
        <option value="7 Periood">7. Periood</option>
        <option value="8 Periood">8. Periood</option>
    </select>


    <input type="text" name="classroom" class="varv-input" placeholder="Klassiruum">
    <textarea name="comment" class="pilt-input" placeholder="Kommentaar" cols="20"></textarea>
    <input type="submit" value="Lisa" class="lisamine-button">
</form>


</ul>
</body>
</html>

