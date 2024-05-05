<?php

/******************************************
Asisten Pemrogaman 13
 ******************************************/

include("model/Template.class.php");
include("model/DB.class.php");
include("model/Pasien.class.php");
include("model/TabelPasien.class.php");
include("view/TampilCreatePasien.php");


$tp = new TampilCreatePasien();

if (isset($_POST["submit"])) {
    $dt = $_POST;
    $data = $tp->tambah($dt);
    header("location: index.php");
} else {
    $data = $tp->tampil(-1);
}
