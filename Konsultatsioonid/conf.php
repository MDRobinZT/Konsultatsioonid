<?php
$serverinimi="d125314.mysql.zonevs.eu";
$kasutajanimi="d125314_robin";
$parool="Bababooey!";
$andmebaas="d125314_robinbaas";
$yhendus=new mysqli($serverinimi, $kasutajanimi, $parool, $andmebaas);
$yhendus->set_charset("UTF8");