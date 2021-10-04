<?php
function timeago($datetime, $full = false) {
  $today = time();
  $createdday= strtotime($datetime);
  $datediff = abs($today - $createdday);
  $difftext="";
  $years = floor($datediff / (365*60*60*24));
  $months = floor(($datediff - $years * 365*60*60*24) / (30*60*60*24));
  $days = floor(($datediff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
  $hours= floor($datediff/3600);
  $minutes= floor($datediff/60);
  $seconds= floor($datediff);
  //year checker
  if($difftext=="")
  {
    if($years>1)
    $difftext=$years." yıl önce";
    elseif($years==1)
    $difftext=$years." yıl önce";
  }
  //month checker
  if($difftext=="")
  {
    if($months>1)
    $difftext=$months." ay önce";
    elseif($months==1)
    $difftext=$months." ay önce";
  }
  //month checker
  if($difftext=="")
  {
    if($days>1)
    $difftext=$days." gün önce";
    elseif($days==1)
    $difftext=$days." gün önce";
  }
  //hour checker
  if($difftext=="")
  {
    if($hours>1)
    $difftext=$hours." saat önce";
    elseif($hours==1)
    $difftext=$hours." saat önce";
  }
  //minutes checker
  if($difftext=="")
  {
    if($minutes>1)
    $difftext=$minutes." dakika önce";
    elseif($minutes==1)
    $difftext=$minutes." dakika önce";
  }
  //seconds checker
  if($difftext=="")
  {
    if($seconds>1)
    $difftext=$seconds." seconds önce";
    elseif($seconds==1)
    $difftext=$seconds." second önce";
  }
  return $difftext;
}
 ?>
