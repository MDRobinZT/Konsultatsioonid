<link rel="stylesheet" href="styles.css">
<?php
if (isset($_GET['code'])) {
    die(highlight_file(__FILE__, 1));
}
require('conf.php');
?>

<!--Header ja navbar-->
<h1 class="header">Konsultatsioonide tabel</h1>
<nav>
    <ul>
        <li><a href="Lisamine.php">Lisamise leht</a></li>
        <li><a href="Konsultatsioon.php">Konsultatsiooni tabeli leht</a></li>
    </ul>
</nav>

<form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="sort">Sorteeri perioodi järgi:</label>
    <select name="sort" id="sort">
        <option value="asc">Suurenevas</option>
        <option value="desc">Vähenevas</option>
    </select>
    <input type="submit" value="Sorteeri">
</form>

<!--Tabel-->
<table class="tabel" border="1">
    <tr>
        <th>id</th>
        <th>ÕpetajaNimi</th>
        <th>Päev</th>
        <th>Tund</th>
        <th>Klassiruum</th>
        <th>Periood</th>
        <th>Kommentaar</th>
    </tr>

    <?php
    global $yhendus;

    // Sorteerimine
    $sortOrder = isset($_GET['sort']) && ($_GET['sort'] == 'desc') ? 'DESC' : 'ASC';

    $paring = $yhendus->prepare("SELECT opetajaID, opetajaNimi, paev, tund, klassiruum, periood, kommentaar FROM opetajad ORDER BY periood $sortOrder");
    $paring->bind_result($id, $opetajaNimi, $paev, $tund, $klassiruum, $periood, $kommentaar);
    $paring->execute();

    while ($paring->fetch()) {
        echo "<tr>";
        echo "<td>$id</td>";
        echo "<td>$opetajaNimi</td>";
        echo "<td>$paev</td>";
        echo "<td>$tund</td>";
        echo "<td>$klassiruum</td>";
        echo "<td>$periood</td>";
        echo "<td>$kommentaar</td>";
        echo "</tr>";
    }
    ?>
</table>
<br>
