<?php

function tarih($par){

  $dates = explode ("-", $par);

  $year = $dates[0];
  $month = $dates[1];
  $day = intval($dates[2]);

  $find = array("01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12");
  $replace = array("Ocak", "Şubat", "Mart", "Nisan", "Mayıs", "Haziran", "Temmuz", "Ağustos", "Eylül", "Ekim", "Kasım", "Aralık");

  $ay = str_replace($find, $replace, $month);

  echo $day," ".$ay." ".$year;

}

 ?>
