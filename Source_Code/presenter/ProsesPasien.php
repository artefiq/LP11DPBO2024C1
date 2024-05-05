<?php

include("KontrakPresenter.php");


class ProsesPasien implements KontrakPresenter
{
	private $tabelpasien;
	private $data = [];
	private $dataSingle;

	function __construct()
	{
		//konstruktor
		try {
			$db_host = "localhost"; // host 
			$db_user = "root"; // user
			$db_password = ""; // password
			$db_name = "mvp_php"; // nama basis data
			$this->tabelpasien = new TabelPasien($db_host, $db_user, $db_password, $db_name); //instansi TabelPasien
			$this->data = array(); //instansi list untuk data Pasien
			//data = new ArrayList<Pasien>;//instansi list untuk data Pasien
		} catch (Exception $e) {
			echo "Error 1 : " . $e->getMessage();
		}
	}

	function prosesDataPasien()
	{
		try {
			//mengambil data di tabel pasien
			$this->tabelpasien->open();
			$this->tabelpasien->getPasien();
			while ($row = $this->tabelpasien->getResult()) {
				//ambil hasil query
				$pasien = new Pasien(); //instansiasi objek pasien untuk setiap data pasien
				$pasien->setId($row['id']); //mengisi id
				$pasien->setNik($row['nik']); //mengisi nik
				$pasien->setNama($row['nama']); //mengisi nama
				$pasien->setTempat($row['tempat']); //mengisi tempat
				$pasien->setTl($row['tl']); //mengisi tl
				$pasien->setGender($row['gender']); //mengisi gender
				$pasien->setEmail($row['email']); //mengisi gender
				$pasien->setTelp($row['telp']); //mengisi gender


				$this->data[] = $row; //tambahkan data pasien ke dalam list
			}
			//tutup koneksi
			$this->tabelpasien->close();
		} catch (Exception $e) {
			//memproses error
			echo "Error 2 : " . $e->getMessage();
		}
	}

	function prosesDataSatuPasien($id)
	{
		try {
			// Mengambil data pasien berdasarkan ID
			$this->tabelpasien->open();
			$this->tabelpasien->getPasienById($id);

			// Mendapatkan satu baris data pasien
			$row = $this->tabelpasien->getResult();

			// Jika data pasien ditemukan
			if ($row) {
				// Instansiasi objek pasien
				$pasien = new Pasien();
				$pasien->setId($row['id']);
				$pasien->setNik($row['nik']);
				$pasien->setNama($row['nama']);
				$pasien->setTempat($row['tempat']);
				$pasien->setTl($row['tl']);
				$pasien->setGender($row['gender']);
				$pasien->setEmail($row['email']);
				$pasien->setTelp($row['telp']);

				// Tambahkan data pasien ke dalam list
				$this->dataSingle = $pasien;
			} else {
				echo "Data pasien dengan ID $id tidak ditemukan.";
			}

			// Tutup koneksi
			$this->tabelpasien->close();
		} catch (Exception $e) {
			// Memproses error
			echo "Error 3 : " . $e->getMessage();
		}
	}

	function getId($i)
	{
		//mengembalikan id Pasien dengan indeks ke i
		return $this->data[$i]['id'];
	}
	function getNik($i)
	{
		//mengembalikan nik Pasien dengan indeks ke i
		return $this->data[$i]['nik'];
	}
	function getNama($i)
	{
		//mengembalikan nama Pasien dengan indeks ke i
		return $this->data[$i]['nama'];
	}
	function getTempat($i)
	{
		//mengembalikan tempat Pasien dengan indeks ke i
		return $this->data[$i]['tempat'];
	}
	function getTl($i)
	{
		//mengembalikan tanggal lahir(TL) Pasien dengan indeks ke i
		return $this->data[$i]['tl'];
	}
	function getGender($i)
	{
		//mengembalikan gender Pasien dengan indeks ke i
		return $this->data[$i]['gender'];
	}
	function getEmail($i)
	{
		//mengembalikan email Pasien dengan indeks ke i
		return $this->data[$i]['email'];
	}
	function getTelp($i)
	{
		//mengembalikan NO telp Pasien dengan indeks ke i
		return $this->data[$i]['telp'];
	}
	function getSize()
	{
		return sizeof($this->data);
	}

	function getIdSingle()
	{
		return $this->dataSingle->getId();
	}
	function getNikSingle()
	{
		return $this->dataSingle->getNik();
	}
	function getNamaSingle()
	{
		return $this->dataSingle->getNama();
	}
	function getTempatSingle()
	{
		return $this->dataSingle->getTempat();
	}
	function getTlSingle()
	{
		return $this->dataSingle->getTl();
	}
	function getGenderSingle()
	{
		return $this->dataSingle->getGender();
	}
	function getEmailSingle()
	{
		return $this->dataSingle->getEmail();
	}
	function getTelpSingle()
	{
		return $this->dataSingle->getTelp();
	}

	function hapusPasien($id)
	{
		try {
			//mengambil data di tabel pasien
			$this->tabelpasien->open();
			$this->tabelpasien->deletePasien($id);
			//tutup koneksi
			$this->tabelpasien->close();
		} catch (Exception $e) {
			//memproses error
			echo "Error 4 : " . $e->getMessage();
		}
	}

	function tambahPasien($data)
	{
		try {
			//mengambil data di tabel pasien
			$this->tabelpasien->open();
			$this->tabelpasien->createPasien($data);
			//tutup koneksi
			$this->tabelpasien->close();
		} catch (Exception $e) {
			//memproses error
			echo "Error 5 : " . $e->getMessage();
		}
	}

	function ubahPasien($data)
	{
		try {
			//mengambil data di tabel pasien
			$this->tabelpasien->open();
			$this->tabelpasien->editPasien($data);
			//tutup koneksi
			$this->tabelpasien->close();
		} catch (Exception $e) {
			//memproses error
			echo "Error 6 : " . $e->getMessage();
		}
	}
}
