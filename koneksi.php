<?php

$conn = mysqli_connect("localhost","root","","dinzz_barbershop");

if(!$conn){
    die("Koneksi gagal: " . mysqli_connect_error());
}

?>