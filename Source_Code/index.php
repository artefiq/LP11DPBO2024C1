<?php

/******************************************
Asisten Pemrogaman 13
 ******************************************/

include("model/Template.class.php");
include("model/DB.class.php");
include("model/Pasien.class.php");
include("model/TabelPasien.class.php");
include("view/TampilPasien.php");


$tp = new TampilPasien();

if (!empty($_GET['id_hapus'])) {
    $id = $_GET['id_hapus'];
    $data = $tp->hapus($id);
    header("location: index.php");
} else {
    $data = $tp->tampil(-1);
}
