<?php
$connection = mysqli_connect('ksenon','domgradh_dbadmin','ykE92rzj','domgradh_domgrad3417');
if (mysqli_connect_errno())
  {
  echo "Pogre�ska: " . mysqli_connect_error();
  }
mysqli_set_charset($connection,"utf8");
?>