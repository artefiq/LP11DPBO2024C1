<?php

/******************************************
Asisten Pemrogaman 13
 ******************************************/

include("model/Template.class.php");
include("model/DB.class.php");
include("model/Pasien.class.php");
include("model/TabelPasien.class.php");
include("view/TampilEditPasien.php");


$tp = new TampilEditPasien();

if (isset($_POST["submit"])) {
    $dt = $_POST;
    $data = $tp->ubah($dt);
    header("location: index.php");
} else {
    $data = $tp->tampil($_GET['id_edit']);
}