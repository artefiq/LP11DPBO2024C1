<?php


interface KontrakPresenter
{
	public function prosesDataPasien();
	public function prosesDataSatuPasien($id);
	public function getId($i);
	public function getNik($i);
	public function getNama($i);
	public function getTempat($i);
	public function getTl($i);
	public function getGender($i);
	public function getSize();
	public function hapusPasien($id);
	public function tambahPasien($data);

}
