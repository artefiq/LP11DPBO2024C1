<?php


include("KontrakView.php");
include("presenter/ProsesPasien.php");

class TampilEditPasien implements KontrakView
{
	private $prosespasien; //presenter yang dapat berinteraksi langsung dengan view
	private $tpl;

	function __construct()
	{
		//konstruktor
		$this->prosespasien = new ProsesPasien();
	}

	function tampil($id)
	{
		$this->prosespasien->prosesDataSatuPasien($id);
		$data = null;

		//semua terkait tampilan adalah tanggung jawab view
		$data .= '<div class="card-header bg-dark">
            <h1 class="text-white text-center">  Ubah Data Pasien </h1>
            </div><br>

            <input type="hidden" name="id" class="form-control" value="'.  $this->prosespasien->getIdSingle() .'">

            <label> NIK: </label>
            <input type="text" name="nik" class="form-control" value="'. $this->prosespasien->getNikSingle() .'" required> <br>

            <label> NAMA: </label>
            <input type="text" name="nama" class="form-control" value="'. $this->prosespasien->getNamaSingle() .'" required> <br>

            <label> TEMPAT: </label>
            <input type="text" name="tempat" class="form-control" value="'. $this->prosespasien->getTempatSingle() .'" required> <br>
            
            <label> TANGGAL LAHIR: </label>
            <input type="date" name="tl" class="form-control" value="'. $this->prosespasien->getTlSingle() .'" required> <br>

            <label> GENDER: </label>
            <select name="gender" class="form-control" required> 
                <option value="Laki-laki" '. ($this->prosespasien->getGenderSingle() == "Laki-laki" ? "selected" : "") .'>Laki-laki</option>
                <option value="Perempuan" '. ($this->prosespasien->getGenderSingle() == "Perempuan" ? "selected" : "") .'>Perempuan</option>
            </select>
            <br>

            <label> EMAIL: </label>
            <input type="email" name="email" class="form-control" value="'. $this->prosespasien->getEmailSingle() .'" required> <br>
            
            <label> NO TELP: </label>
            <input type="tel" name="telp" class="form-control" value="'. $this->prosespasien->getTelpSingle() .'" required> <br>

            <button class="btn btn-success" type="submit" name="submit"> Submit </button><br>
            <a class="btn btn-info" href="index.php"> Cancel </a><br>';


		// Membaca template skin.html
		$this->tpl = new Template("templates/skinForm.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("CREATE_FORM", $data);

		// Menampilkan ke layar
		$this->tpl->write();
	}

    function ubah ($data) {
        $this->prosespasien->ubahPasien($data);
    }
}
