<?php

class Json_process extends CI_Controller {
	private $host = "localhost";
	private $user = "u6729391_sistemarsip";
	private $password = "u6729391_sistemarsip";
	private $namaDb = "u6729391_sistemarsip";

	function getAllBerkas(){
		$kon = mysqli_connect($this->host, $this->user, $this->password, $this->namaDb);

		// $content = trim(file_get_contents("php://input"));
		// $decoded = json_decode($content);
		// $username = $decoded->username;
		
		$result = mysqli_query($kon, "SELECT * FROM `berkas`");

		if ($result) {
			$dataTidakAda = true;
			while ($row = mysqli_fetch_array($result)) {
				$dataTidakAda = false;
				$row_array['id_berkas'] = $row['id_berkas'];
				$row_array['id_arsip'] = $row['id_arsip'];
				$row_array['id_kategori'] = $row['id_kategori'];
				$row_array['nama_berkas'] = $row['nama_berkas'];
				$row_array['kode_berkas'] = $row['kode_berkas'];
				$row_array['deskripsi'] = $row['deskripsi'];
				$row_array['datetime'] = $row['datetime'];
				$row_array['file'] = $row['file'];
				$row_array['response'] = "Success";
				
				echo json_encode($row_array);
			}

			if ($dataTidakAda) {
				$row_array['response'] = "No Data";

				echo json_encode($row_array);
			}
		}
		else{		
			$row_array['response'] = "Failed connecting to server";
			
			echo json_encode($row_array);
		}
		
	}

	// function getSemuaDataNasabah(){
	// 	$kon = mysqli_connect($this->host, $this->user, $this->password, $this->namaDb);

	// 	$result = mysqli_query($kon, "SELECT * FROM `nasabah` LIMIT 20");
		
	// 	$data_result = array();
		
	// 	if ($result) {
	// 		$dataTidakAda = true;
	// 		while ($row = mysqli_fetch_array($result)) {
	// 			$dataTidakAda = false;
	// 			$row_array['username'] = $row['username'];
	// 			$row_array['nama_nasabah'] = $row['nama_nasabah'];
	// 			$row_array['status_anggota'] = $row['status_anggota'];
	// 			$row_array['luas_tanaman'] = $row['luas_tanaman'];
	// 			$row_array['ktp'] = $row['ktp'];
	// 			$row_array['tgl_lahir'] = $row['tgl_lahir'];
	// 			$row_array['nama_ibu'] = $row['nama_ibu'];
	// 			$row_array['jenis_kelamin'] = $row['jenis_kelamin'];
	// 			$row_array['umur'] = $row['umur'];
	// 			$row_array['id_desa'] = $row['id_desa'];
	// 			$row_array['id_kelompok'] = $row['id_kelompok'];
	// 			$row_array['kordinat_kebun'] = $row['kordinat_kebun'];
	// 			$row_array['foto_petani'] = $row['foto_petani'];
	// 			$row_array['foto_kebun'] = $row['foto_kebun'];
	// 			$row_array['foto_ttd'] = $row['foto_ttd'];
	// 			$row_array['tanaman_utama'] = $row['tanaman_utama'];
	// 			$row_array['tanaman_sekunder'] = $row['tanaman_sekunder'];
	// 			$row_array['umur_tanaman'] = $row['umur_tanaman'];
	// 			$row_array['tanaman_produktif'] = $row['tanaman_produktif'];
	// 			$row_array['tanaman_tidak_produktif'] = $row['tanaman_tidak_produktif'];
	// 			$row_array['jumlah_kebun'] = $row['jumlah_kebun'];
	// 			$row_array['luas_kebun'] = $row['luas_kebun'];
	// 			$row_array['luas_area'] = $row['luas_area'];
	// 			$row_array['luas_produksi'] = $row['luas_produksi'];
	// 			$row_array['area_ekosistem_alami'] = $row['area_ekosistem_alami'];
	// 			$row_array['area_konservasi'] = $row['area_konservasi'];
	// 			$row_array['hama_kakao'] = $row['hama_kakao'];
	// 			$row_array['penyakit_kakao'] = $row['penyakit_kakao'];
	// 			$row_array['penjualan_kg_non_sertifikasi'] = $row['penjualan_kg_non_sertifikasi'];
	// 			$row_array['penjualan_sertifikasi_kg'] = $row['penjualan_sertifikasi_kg'];
	// 			$row_array['kualitas_dan_klon'] = $row['kualitas_dan_klon'];
	// 			$row_array['fungisida'] = $row['fungisida'];
	// 			$row_array['insektisida'] = $row['insektisida'];
	// 			$row_array['herbisida'] = $row['herbisida'];
	// 			$row_array['nama_pekerja'] = $row['nama_pekerja'];
	// 			$row_array['pohon_pelindung'] = $row['pohon_pelindung'];
	// 			$row_array['pupuk'] = $row['pupuk'];
	// 			$row_array['started_time'] = $row['started_time'];
	// 			$row_array['completed_time'] = $row['completed_time'];
	// 			$row_array['response'] = "Success";
				
	// 			array_push($data_result,$row_array);
				
	// 		}

	// 		if ($dataTidakAda) {
	// 			$row_array['response'] = "No Data";

	// 			array_push($data_result,$row_array);
	// 		}
			
	// 		echo json_encode($data_result);
	// 	}
	// 	else{		
	// 		$row_array['response'] = "Failed connecting to server";
			
	// 		array_push($data_result,$row_array);
	// 		echo json_encode($data_result);
	// 	}
		
	// }
	
	// function getSemuaDataNasabahSearchUsername(){
	// 	$kon = mysqli_connect($this->host, $this->user, $this->password, $this->namaDb);

	// 	$content = trim(file_get_contents("php://input"));
	// 	$decoded = json_decode($content);
	// 	$username = $decoded->username;
		
	// 	$result = mysqli_query($kon, "SELECT * FROM `nasabah` WHERE `username` LIKE '%$username%' OR `nama_nasabah` LIKE '%$username%' LIMIT 20");
		
	// 	$data_result = array();
		
	// 	if ($result) {
	// 		$dataTidakAda = true;
	// 		while ($row = mysqli_fetch_array($result)) {
	// 			$dataTidakAda = false;
	// 			$row_array['username'] = $row['username'];
	// 			$row_array['nama_nasabah'] = $row['nama_nasabah'];
	// 			$row_array['status_anggota'] = $row['status_anggota'];
	// 			$row_array['luas_tanaman'] = $row['luas_tanaman'];
	// 			$row_array['ktp'] = $row['ktp'];
	// 			$row_array['tgl_lahir'] = $row['tgl_lahir'];
	// 			$row_array['nama_ibu'] = $row['nama_ibu'];
	// 			$row_array['jenis_kelamin'] = $row['jenis_kelamin'];
	// 			$row_array['umur'] = $row['umur'];
	// 			$row_array['id_desa'] = $row['id_desa'];
	// 			$row_array['id_kelompok'] = $row['id_kelompok'];
	// 			$row_array['kordinat_kebun'] = $row['kordinat_kebun'];
	// 			$row_array['foto_petani'] = $row['foto_petani'];
	// 			$row_array['foto_kebun'] = $row['foto_kebun'];
	// 			$row_array['foto_ttd'] = $row['foto_ttd'];
	// 			$row_array['tanaman_utama'] = $row['tanaman_utama'];
	// 			$row_array['tanaman_sekunder'] = $row['tanaman_sekunder'];
	// 			$row_array['umur_tanaman'] = $row['umur_tanaman'];
	// 			$row_array['tanaman_produktif'] = $row['tanaman_produktif'];
	// 			$row_array['tanaman_tidak_produktif'] = $row['tanaman_tidak_produktif'];
	// 			$row_array['jumlah_kebun'] = $row['jumlah_kebun'];
	// 			$row_array['luas_kebun'] = $row['luas_kebun'];
	// 			$row_array['luas_area'] = $row['luas_area'];
	// 			$row_array['luas_produksi'] = $row['luas_produksi'];
	// 			$row_array['area_ekosistem_alami'] = $row['area_ekosistem_alami'];
	// 			$row_array['area_konservasi'] = $row['area_konservasi'];
	// 			$row_array['hama_kakao'] = $row['hama_kakao'];
	// 			$row_array['penyakit_kakao'] = $row['penyakit_kakao'];
	// 			$row_array['penjualan_kg_non_sertifikasi'] = $row['penjualan_kg_non_sertifikasi'];
	// 			$row_array['penjualan_sertifikasi_kg'] = $row['penjualan_sertifikasi_kg'];
	// 			$row_array['kualitas_dan_klon'] = $row['kualitas_dan_klon'];
	// 			$row_array['fungisida'] = $row['fungisida'];
	// 			$row_array['insektisida'] = $row['insektisida'];
	// 			$row_array['herbisida'] = $row['herbisida'];
	// 			$row_array['nama_pekerja'] = $row['nama_pekerja'];
	// 			$row_array['pohon_pelindung'] = $row['pohon_pelindung'];
	// 			$row_array['pupuk'] = $row['pupuk'];
	// 			$row_array['started_time'] = $row['started_time'];
	// 			$row_array['completed_time'] = $row['completed_time'];
	// 			$row_array['response'] = "Success";
				
	// 			array_push($data_result,$row_array);
				
	// 		}

	// 		if ($dataTidakAda) {
	// 			$row_array['response'] = "No Data";

	// 			array_push($data_result,$row_array);
	// 		}
			
	// 		echo json_encode($data_result);
	// 	}
	// 	else{		
	// 		$row_array['response'] = "Failed connecting to server";
			
	// 		array_push($data_result,$row_array);
	// 		echo json_encode($data_result);
	// 	}
		
	// }
	
	// function getSemuaDataUserFilterNasabah(){
	// 	$kon = mysqli_connect($this->host, $this->user, $this->password, $this->namaDb);
		
		
	// 	$result = mysqli_query($kon, "SELECT * FROM `users` WHERE `level` = 'nasabah' LIMIT 20");

	// 	if ($result) {
	// 		$data_result = array();
			
	// 		$dataTidakAda = true;
	// 		while ($row = mysqli_fetch_array($result)) {
	// 			$dataTidakAda = false;
	// 			$row_array['username'] = $row['username'];
	// 			$row_array['password'] = md5($row['password']);
	// 			$row_array['level'] = $row['level'];
	// 			$row_array['session_id'] = $row['session_id'];
	// 			$row_array['email'] = $row['email'];
	// 			$row_array['nama'] = $row['nama'];
	// 			$row_array['imei'] = $imei;
	// 			$row_array['response'] = "Success";
				
	// 			array_push($data_result,$row_array);
				
	// 		}

	// 		if ($dataTidakAda) {
	// 			$row_array['response'] = "No Data";

	// 			array_push($data_result,$row_array);
	// 		}
			
	// 		echo json_encode($data_result);
	// 	}
	// 	else{		
	// 		$row_array['response'] = "Failed connecting to server";
			
	// 		array_push($data_result,$row_array);
	// 		echo json_encode($data_result);
	// 	}
		
	// }
	
	// function getDataUserFilterUsername(){
	// 	$kon = mysqli_connect($this->host, $this->user, $this->password, $this->namaDb);
		
	// 	$content = trim(file_get_contents("php://input"));
	// 	$decoded = json_decode($content);
	// 	$username = $decoded->username;
		
	// 	$result = mysqli_query($kon, "SELECT * FROM `users` WHERE `username` = '$username'");

	// 	if ($result) {
	// 		$data_result = array();
			
	// 		$dataTidakAda = true;
	// 		while ($row = mysqli_fetch_array($result)) {
	// 			$dataTidakAda = false;
	// 			$row_array['username'] = $row['username'];
	// 			$row_array['password'] = md5($row['password']);
	// 			$row_array['level'] = $row['level'];
	// 			$row_array['session_id'] = $row['session_id'];
	// 			$row_array['email'] = $row['email'];
	// 			$row_array['nama'] = $row['nama'];
	// 			$row_array['imei'] = $imei;
	// 			$row_array['response'] = "Success";
				
	// 			echo json_encode($row_array);
	// 		}

	// 		if ($dataTidakAda) {
	// 			$row_array['response'] = "Failed";
				
	// 			echo json_encode($row_array);
	// 		}
	// 	}
	// 	else{		
	// 		$row_array['response'] = "Error";

	// 		echo json_encode($row_array);
	// 	}
		
	// }

	// function updateProfil(){
	// 	$kon = mysqli_connect($this->host, $this->user, $this->password, $this->namaDb);

	// 	$content = trim(file_get_contents("php://input"));
	// 	$decoded = json_decode($content);
	// 	$username = $decoded->username;
	// 	$password = $decoded->password;
	// 	$email = $decoded->email;

	// 	$pass = md5($password);
		
	// 	$result = mysqli_query($kon, "UPDATE `users` SET `pass` = '$pass' AND `email` = '$email' WHERE `users`.`username` = '$username'");

	// 	if ($result) {
	// 		echo "Success";
	// 	}
	// 	else{		
	// 		echo "Failed connecting to server";
	// 	}
		
	// }
	
	// function updateLogout(){
	// 	$kon = mysqli_connect($this->host, $this->user, $this->password, $this->namaDb);

	// 	$content = trim(file_get_contents("php://input"));
	// 	$decoded = json_decode($content);
	// 	$username = $decoded->username;
	// 	$last_update = $decoded->last_update;
		
	// 	$result = mysqli_query($kon, "UPDATE `users` SET `last_update` = '$last_update' WHERE `users`.`username` = '$username'");

	// 	if ($result) {
	// 		echo "Success";
	// 	}
	// 	else{		
	// 		echo "Failed connecting to server";
	// 	}
		
	// }

	// function createUser(){
	// 	$kon = mysqli_connect($this->host, $this->user, $this->password, $this->namaDb);

	// 	$content = trim(file_get_contents("php://input"));
	// 	$decoded = json_decode($content);
	// 	$username = $decoded->username;
	// 	$nama = $decoded->nama;
	// 	$password = $decoded->password;
	// 	$level = $decoded->level;
	// 	$email = $decoded->email;
	// 	$create_time = $decoded->create_time;

	// 	$pass = md5($password);
		
	// 	$result = mysqli_query($kon, "INSERT INTO `users` (`username`, `password`, `nama`, `level`, `email`, `create_time`, `last_update`, `status`, `session_id`, `imei`) VALUES ('$username', '$pass', '$nama', '$level', '$email', '$create_time', '$create_time', '1', '', '');");

	// 	if ($result) {
	// 		echo "Success";
	// 	}
	// 	else{		
			
	// 		echo "Failed connecting to server";
	// 	}
		
	// }
	
	// function updateUser(){
	// 	$kon = mysqli_connect($this->host, $this->user, $this->password, $this->namaDb);

	// 	$content = trim(file_get_contents("php://input"));
	// 	$decoded = json_decode($content);
	// 	$username = $decoded->username;
	// 	$nama = $decoded->nama;
	// 	$level = $decoded->level;
		
	// 	$result = mysqli_query($kon, "UPDATE `users` SET `nama` = '$nama' WHERE `username` = '$username'");

	// 	if ($result) {
	// 		echo "Success";
	// 	}
	// 	else{		
			
	// 		echo "Failed connecting to server";
	// 	}
		
	// }
	
	// function createCatatan(){
	// 	$kon = mysqli_connect($this->host, $this->user, $this->password, $this->namaDb);

	// 	$content = trim(file_get_contents("php://input"));
	// 	$decoded = json_decode($content);
	// 	$username = $decoded->username;
	// 	$petugas = $decoded->petugas;
	// 	$deskripsi = $decoded->deskripsi;
	// 	$datetime = $decoded->datetime;

	// 	$pass = md5($password);
		
	// 	$result = mysqli_query($kon, "INSERT INTO `catatan_kebun` (`id_catatan`, `username`, `petugas`, `deskripsi`, `datetime`) VALUES (NULL, '$username', '$petugas', '$deskripsi', '$datetime');");

	// 	if ($result) {
	// 		echo "Success";
	// 	}
	// 	else{		
			
	// 		echo "Failed connecting to server";
	// 	}
		
	// }
	
	// function updateCatatan(){
	// 	$kon = mysqli_connect($this->host, $this->user, $this->password, $this->namaDb);

	// 	$content = trim(file_get_contents("php://input"));
	// 	$decoded = json_decode($content);
	// 	$username = $decoded->username;
	// 	$petugas = $decoded->petugas;
	// 	$deskripsi = $decoded->deskripsi;
		
	// 	$result = mysqli_query($kon, "UPDATE `catatan_kebun` SET `petugas` = '$petugas', `deskripsi` = '$deskripsi' WHERE `username` = '$username';");

	// 	if ($result) {
	// 		echo "Success";
	// 	}
	// 	else{		
			
	// 		echo "Failed connecting to server";
	// 	}
		
	// }
	
	// function simpanDataNasabah(){
	// 	$kon = mysqli_connect($this->host, $this->user, $this->password, $this->namaDb);

	// 	$content = trim(file_get_contents("php://input"));
	// 	$decoded = json_decode($content);
	// 	$username = $decoded->username;
	// 	$nama_nasabah = $decoded->nama_nasabah;
	// 	$status_anggota = $decoded->status_anggota;
	// 	$luas_tanaman = $decoded->luas_tanaman;
	// 	$ktp = $decoded->ktp;
	// 	$tgl_lahir = $decoded->tgl_lahir;
	// 	$nama_ibu = $decoded->nama_ibu;
	// 	$jenis_kelamin = $decoded->jenis_kelamin;
	// 	$umur = $decoded->umur;
	// 	$id_desa = $decoded->id_desa;
	// 	$id_kelompok = $decoded->id_kelompok;
	// 	$koordinat_kebun = $decoded->koordinat_kebun;
	// 	$foto_petani = $decoded->foto_petani;
	// 	$foto_kebun = $decoded->foto_kebun;
	// 	$foto_ttd = $decoded->foto_ttd;
	// 	$tanaman_utama = $decoded->tanaman_utama;
	// 	$tanaman_sekunder = $decoded->tanaman_sekunder;
	// 	$umur_tanaman = $decoded->umur_tanaman;
	// 	$tanaman_produktif = $decoded->tanaman_produktif;
	// 	$tanaman_tidak_produktif = $decoded->tanaman_tidak_produktif;
	// 	$jumlah_kebun = $decoded->jumlah_kebun;
	// 	$luas_kebun = $decoded->luas_kebun;
	// 	$luas_area = $decoded->luas_area;
	// 	$luas_produksi = $decoded->luas_produksi;
	// 	$area_ekosistem_alami = $decoded->area_ekosistem_alami;
	// 	$area_konservasi = $decoded->area_konservasi;
	// 	$hama_kakao = $decoded->hama_kakao;
	// 	$penyakit_kakao = $decoded->penyakit_kakao;
	// 	$penjualan_kg_non_sertifikasi = $decoded->penjualan_kg_non_sertifikasi;
	// 	$penjualan_sertifikasi_kg = $decoded->penjualan_sertifikasi_kg;
	// 	$kualitas_dan_klon = $decoded->kualitas_dan_klon;
	// 	$fungisida = $decoded->fungisida;
	// 	$insektisida = $decoded->insektisida;
	// 	$herbisida = $decoded->herbisida;
	// 	$nama_pekerja = $decoded->nama_pekerja;
	// 	$pohon_pelindung = $decoded->pohon_pelindung;
	// 	$pupuk = $decoded->pupuk;
	// 	$started_time = $decoded->started_time;

	// 	$pass = md5($password);
		
	// 	$result = mysqli_query($kon, "INSERT INTO `nasabah` (`username`, `nama_nasabah`, `status_anggota`, `luas_tanaman`, `ktp`, `tgl_lahir`, `nama_ibu`, `jenis_kelamin`, `umur`, `id_desa`, `id_kelompok`, `kordinat_kebun`, `foto_petani`, `foto_kebun`, `foto_ttd`, `tanaman_utama`, `tanaman_sekunder`, `umur_tanaman`, `tanaman_produktif`, `tanaman_tidak_produktif`, `jumlah_kebun`, `luas_kebun`, `luas_area`, `luas_produksi`, `area_ekosistem_alami`, `area_konservasi`, `hama_kakao`, `penyakit_kakao`, `penjualan_kg_non_sertifikasi`, `penjualan_sertifikasi_kg`, `kualitas_dan_klon`, `fungisida`, `insektisida`, `herbisida`, `nama_pekerja`, `pohon_pelindung`, `pupuk`, `started_time`, `completed_time`) VALUES ('$username', '$nama_nasabah', '$status_anggota', '$luas_tanaman', '$ktp', '$tgl_lahir', '$nama_ibu', '$jenis_kelamin', '$umur', '$id_desa', '$id_kelompok', '$koordinat_kebun', '$foto_petani', '$foto_kebun', '$foto_ttd', '$tanaman_utama', '$tanaman_sekunder', '$umur_tanaman', '$tanaman_produktif', '$tanaman_tidak_produktif', '$jumlah_kebun', '$luas_kebun', '$luas_area', '$luas_produksi', '$area_ekosistem_alami', '$area_konservasi', '$hama_kakao', '$penyakit_kakao', '$penjualan_kg_non_sertifikasi', '$penjualan_sertifikasi_kg', '$kualitas_dan_klon', '$fungisida', '$insektisida', '$herbisida', '$nama_pekerja', '$pohon_pelindung', '$pupuk', '$started_time', '0000-00-00 00:00:00')");

	// 	if ($result) {
	// 		echo "Success";
	// 	}
	// 	else{		
			
	// 		echo "Failed connecting to server";
	// 	}
		
	// }
	
	// function updateDataNasabah(){
	// 	$kon = mysqli_connect($this->host, $this->user, $this->password, $this->namaDb);

	// 	$content = trim(file_get_contents("php://input"));
	// 	$decoded = json_decode($content);
	// 	$username = $decoded->username;
	// 	$nama_nasabah = $decoded->nama_nasabah;
	// 	$status_anggota = $decoded->status_anggota;
	// 	$luas_tanaman = $decoded->luas_tanaman;
	// 	$ktp = $decoded->ktp;
	// 	$tgl_lahir = $decoded->tgl_lahir;
	// 	$nama_ibu = $decoded->nama_ibu;
	// 	$jenis_kelamin = $decoded->jenis_kelamin;
	// 	$umur = $decoded->umur;
	// 	$id_desa = $decoded->id_desa;
	// 	$id_kelompok = $decoded->id_kelompok;
	// 	$koordinat_kebun = $decoded->koordinat_kebun;
	// 	$foto_petani = $decoded->foto_petani;
	// 	$foto_kebun = $decoded->foto_kebun;
	// 	$foto_ttd = $decoded->foto_ttd;
	// 	$tanaman_utama = $decoded->tanaman_utama;
	// 	$tanaman_sekunder = $decoded->tanaman_sekunder;
	// 	$umur_tanaman = $decoded->umur_tanaman;
	// 	$tanaman_produktif = $decoded->tanaman_produktif;
	// 	$tanaman_tidak_produktif = $decoded->tanaman_tidak_produktif;
	// 	$jumlah_kebun = $decoded->jumlah_kebun;
	// 	$luas_kebun = $decoded->luas_kebun;
	// 	$luas_area = $decoded->luas_area;
	// 	$luas_produksi = $decoded->luas_produksi;
	// 	$area_ekosistem_alami = $decoded->area_ekosistem_alami;
	// 	$area_konservasi = $decoded->area_konservasi;
	// 	$hama_kakao = $decoded->hama_kakao;
	// 	$penyakit_kakao = $decoded->penyakit_kakao;
	// 	$penjualan_kg_non_sertifikasi = $decoded->penjualan_kg_non_sertifikasi;
	// 	$penjualan_sertifikasi_kg = $decoded->penjualan_sertifikasi_kg;
	// 	$kualitas_dan_klon = $decoded->kualitas_dan_klon;
	// 	$fungisida = $decoded->fungisida;
	// 	$insektisida = $decoded->insektisida;
	// 	$herbisida = $decoded->herbisida;
	// 	$nama_pekerja = $decoded->nama_pekerja;
	// 	$pohon_pelindung = $decoded->pohon_pelindung;
	// 	$pupuk = $decoded->pupuk;
	// 	$started_time = $decoded->started_time;

	// 	$result = mysqli_query($kon, "UPDATE `nasabah` SET `nama_nasabah` = '$nama_nasabah', `status_anggota` = '$status_anggota' 
	// 		, `luas_tanaman` = '$luas_tanaman' , `ktp` = '$ktp' , `tgl_lahir` = '$tgl_lahir' , `nama_ibu` = '$nama_ibu'
	// 		, `jenis_kelamin` = '$jenis_kelamin' , `umur` = '$umur' , `id_desa` = '$id_desa' , `id_kelompok` = '$id_kelompok'
	// 		, `kordinat_kebun` = '$koordinat_kebun'   
	// 		, `tanaman_utama` = '$tanaman_utama' , `tanaman_sekunder` = '$tanaman_sekunder' 
	// 		, `umur_tanaman` = '$umur_tanaman' , `tanaman_produktif` = '$tanaman_produktif' , `tanaman_tidak_produktif` = '$tanaman_tidak_produktif'
	// 		, `jumlah_kebun` = '$jumlah_kebun' , `luas_kebun` = '$luas_kebun' , `luas_area` = '$luas_area' , `luas_produksi` = '$luas_produksi'
	// 		, `area_ekosistem_alami` = '$area_ekosistem_alami' , `area_konservasi` = '$area_konservasi' , `hama_kakao` = '$hama_kakao'
	// 		, `penyakit_kakao` = '$penyakit_kakao' ,  `penjualan_kg_non_sertifikasi` = '$penjualan_kg_non_sertifikasi' 
	// 		, `penjualan_sertifikasi_kg` = '$penjualan_sertifikasi_kg' , `kualitas_dan_klon` = '$kualitas_dan_klon' , `fungisida` = '$fungisida'
	// 		, `insektisida` = '$insektisida' , `herbisida` = '$herbisida' , `nama_pekerja` = '$nama_pekerja' , `pohon_pelindung` = '$pohon_pelindung'
	// 		, `pupuk` = '$pupuk' WHERE `username` = '$username'");

	// 	if ($result) {
	// 		echo "Success";
	// 	}
	// 	else{		
			
	// 		echo "Failed connecting to server";
	// 	}
		
	// }
	
	// function simpanTransaksi(){
	// 	$kon = mysqli_connect($this->host, $this->user, $this->password, $this->namaDb);

	// 	$content = trim(file_get_contents("php://input"));
	// 	$decoded = json_decode($content);
		
	// 	$username = $decoded->username;
	// 	$jenis_transaksi = $decoded->jenis_transaksi;
	// 	$jenis_biji = $decoded->jenis_biji;
	// 	$timedate = $decoded->timedate;
	// 	$berat_bruto = $decoded->berat_bruto;
	// 	$jumlah_karung_plastik = $decoded->jumlah_karung_plastik;
	// 	$jumlah_karung_gunny = $decoded->jumlah_karung_gunny;
	// 	$rata_kadar_air = $decoded->rata_kadar_air;
	// 	$level_brix = $decoded->level_brix;
	// 	$jumlah_biji = $decoded->jumlah_biji;
	// 	$sampah = $decoded->sampah;
	// 	$jamur = $decoded->jamur;
	// 	$slaty = $decoded->slaty;
	// 	$brown = $decoded->brown;
	// 	$pengurangan_karung = $decoded->pengurangan_karung;
	// 	$status_sampah = $decoded->status_sampah;
	// 	$harga_net = $decoded->harga_net;
	// 	$klaim_kadar_air = $decoded->klaim_kadar_air;
	// 	$klaim_bean_qount = $decoded->klaim_bean_qount;
	// 	$klaim_sampah = $decoded->klaim_sampah;
	// 	$klaim_jamur = $decoded->klaim_jamur;
	// 	$berat_netto = $decoded->berat_netto;
	// 	$harga_satuan = $decoded->harga_satuan;
	// 	$nama_buying = $decoded->nama_buying;
	// 	$nohp = $decoded->nohp;
	// 	$catatan = $decoded->catatan;
	// 	$total = $decoded->total;

	// 	$pass = md5($password);
		
	// 	$result = mysqli_query($kon, "INSERT INTO `transaksi` (`id_transaksi`, `username`, `jenis_transaksi`, `jenis_biji`, `timedate`, `berat_bruto`, `jumlah_karung_plastik`, `jumlah_karung_gunny`, `rata_kadar_air`, `level_brix`, `jumlah_biji`, `sampah`, `jamur`, `slaty`, `brown`, `pengurangan_karung`, `status_sampah`, `harga_net`, `klaim_kadar_air`, `klaim_bean_qount`, `klaim_sampah`, `klaim_jamur`, `berat_netto`, `harga_satuan`, `nama_buying`, `nohp`, `catatan`, `total`) VALUES (NULL, '$username', '$jenis_transaksi', '$jenis_biji', '$timedate', '$berat_bruto', '$jumlah_karung_plastik', '$jumlah_karung_gunny', '$rata_kadar_air', '$level_brix', '$jumlah_biji', '$sampah', '$jamur', '$slaty', '$brown', '$pengurangan_karung', '$status_sampah', '$harga_net', '$klaim_kadar_air', '$klaim_bean_qount', '$klaim_sampah', '$klaim_jamur', '$berat_netto', '$harga_satuan', '$nama_buying', '$nohp', '$catatan', '$total');");

	// 	if ($result) {
	// 		echo "Success";
	// 	}
	// 	else{		
			
	// 		echo "Failed connecting to server";
	// 	}
		
	// }
	
	// function getDaftarTransaksi(){
	// 	$kon = mysqli_connect($this->host, $this->user, $this->password, $this->namaDb);

	// 	$content = trim(file_get_contents("php://input"));
	// 	$decoded = json_decode($content);
	// 	$jenis_biji = $decoded->jenis_biji;
		
	// 	$result = mysqli_query($kon, "SELECT * FROM `transaksi` WHERE `jenis_biji` = '$jenis_biji' LIMIT 20");
	// 	$data_result = array();
		
	// 	if ($result) {
	// 		$dataTidakAda = true;
	// 		while ($row = mysqli_fetch_array($result)) {
	// 			$dataTidakAda = false;
	// 			$row_array['id_transaksi'] = $row['id_transaksi'];
	// 			$row_array['username'] = $row['username'];
	// 			$row_array['jenis_transaksi'] = $row['jenis_transaksi'];
	// 			$row_array['jenis_biji'] = $row['jenis_biji'];
	// 			$row_array['timedate'] = $row['timedate'];
	// 			$row_array['berat_bruto'] = $row['berat_bruto'];
	// 			$row_array['jumlah_karung_plastik'] = $row['jumlah_karung_plastik'];
	// 			$row_array['jumlah_karung_gunny'] = $row['jumlah_karung_gunny'];
	// 			$row_array['rata_kadar_air'] = $row['rata_kadar_air'];
	// 			$row_array['level_brix'] = $row['level_brix'];
	// 			$row_array['jumlah_biji'] = $row['jumlah_biji'];
	// 			$row_array['sampah'] = $row['sampah'];
	// 			$row_array['jamur'] = $row['jamur'];
	// 			$row_array['slaty'] = $row['slaty'];
	// 			$row_array['brown'] = $row['brown'];
	// 			$row_array['pengurangan_karung'] = $row['pengurangan_karung'];
	// 			$row_array['status_sampah'] = $row['status_sampah'];
	// 			$row_array['harga_net'] = $row['harga_net'];
	// 			$row_array['klaim_kadar_air'] = $row['klaim_kadar_air'];
	// 			$row_array['klaim_bean_qount'] = $row['klaim_bean_qount'];
	// 			$row_array['klaim_sampah'] = $row['klaim_sampah'];
	// 			$row_array['klaim_jamur'] = $row['klaim_jamur'];
	// 			$row_array['berat_netto'] = $row['berat_netto'];
	// 			$row_array['harga_satuan'] = $row['harga_satuan'];
	// 			$row_array['nama_buying'] = $row['nama_buying'];
	// 			$row_array['nohp'] = $row['nohp'];
	// 			$row_array['catatan'] = $row['catatan'];
	// 			$row_array['total'] = $row['total'];
	// 			$row_array['response'] = "Success";
				
	// 			array_push($data_result,$row_array);
	// 		}

	// 		if ($dataTidakAda) {
	// 			$row_array['response'] = "No Data";

	// 			array_push($data_result,$row_array);
	// 		}
	// 		echo json_encode($data_result);
	// 	}
	// 	else{		
	// 		$row_array['response'] = "Failed connecting to server";

	// 		array_push($data_result,$row_array);
	// 		echo json_encode($data_result);
	// 	}
		
	// }
	
	// function getDaftarTransaksiSearchUsername(){
	// 	$kon = mysqli_connect($this->host, $this->user, $this->password, $this->namaDb);

	// 	$content = trim(file_get_contents("php://input"));
	// 	$decoded = json_decode($content);
	// 	$jenis_biji = $decoded->jenis_biji;
	// 	$username = $decoded->username;
		
	// 	$result = mysqli_query($kon, "SELECT * FROM `transaksi` WHERE `jenis_biji` = '$jenis_biji' AND `username` LIKE '%$username%' LIMIT 20");
	// 	$data_result = array();
		
	// 	if ($result) {
	// 		$dataTidakAda = true;
	// 		while ($row = mysqli_fetch_array($result)) {
	// 			$dataTidakAda = false;
	// 			$row_array['id_transaksi'] = $row['id_transaksi'];
	// 			$row_array['username'] = $row['username'];
	// 			$row_array['jenis_transaksi'] = $row['jenis_transaksi'];
	// 			$row_array['jenis_biji'] = $row['jenis_biji'];
	// 			$row_array['timedate'] = $row['timedate'];
	// 			$row_array['berat_bruto'] = $row['berat_bruto'];
	// 			$row_array['jumlah_karung_plastik'] = $row['jumlah_karung_plastik'];
	// 			$row_array['jumlah_karung_gunny'] = $row['jumlah_karung_gunny'];
	// 			$row_array['rata_kadar_air'] = $row['rata_kadar_air'];
	// 			$row_array['level_brix'] = $row['level_brix'];
	// 			$row_array['jumlah_biji'] = $row['jumlah_biji'];
	// 			$row_array['sampah'] = $row['sampah'];
	// 			$row_array['jamur'] = $row['jamur'];
	// 			$row_array['slaty'] = $row['slaty'];
	// 			$row_array['brown'] = $row['brown'];
	// 			$row_array['pengurangan_karung'] = $row['pengurangan_karung'];
	// 			$row_array['status_sampah'] = $row['status_sampah'];
	// 			$row_array['harga_net'] = $row['harga_net'];
	// 			$row_array['klaim_kadar_air'] = $row['klaim_kadar_air'];
	// 			$row_array['klaim_bean_qount'] = $row['klaim_bean_qount'];
	// 			$row_array['klaim_sampah'] = $row['klaim_sampah'];
	// 			$row_array['klaim_jamur'] = $row['klaim_jamur'];
	// 			$row_array['berat_netto'] = $row['berat_netto'];
	// 			$row_array['harga_satuan'] = $row['harga_satuan'];
	// 			$row_array['nama_buying'] = $row['nama_buying'];
	// 			$row_array['nohp'] = $row['nohp'];
	// 			$row_array['catatan'] = $row['catatan'];
	// 			$row_array['total'] = $row['total'];
	// 			$row_array['response'] = "Success";
				
	// 			array_push($data_result,$row_array);
	// 		}

	// 		if ($dataTidakAda) {
	// 			$this->getNasabahTransaksiSearchName($data_result);
	// 		}
	// 		else{
	// 			$this->getNasabahTransaksiSearchName($data_result);
	// 		}
	// 	}
	// 	else{		
	// 		$this->getNasabahTransaksiSearchName($data_result);
	// 	}
		
	// }

	// function getNasabahTransaksiSearchName($dataSebelumnya){
	// 	$kon = mysqli_connect($this->host, $this->user, $this->password, $this->namaDb);

	// 	$content = trim(file_get_contents("php://input"));
	// 	$decoded = json_decode($content);
	// 	$nama = $decoded->nama;
		
	// 	$result = mysqli_query($kon, "SELECT * FROM `nasabah` WHERE `nama_nasabah` LIKE '%$nama%' LIMIT 20");
		
	// 	$data_result = array();
		
	// 	if ($result) {
	// 		$dataTidakAda = true;
	// 		while ($row = mysqli_fetch_array($result)) {
	// 			$dataTidakAda = false;
	// 			$row_array['username'] = $row['username'];
				
	// 			array_push($data_result,$row_array);
				
	// 		}

	// 		if ($dataTidakAda) {
	// 			echo json_encode($dataSebelumnya);
	// 		}
	// 		else{
	// 			$this->getNasabahTransaksiSearchName($dataSebelumnya, $data_result);
	// 		}
	// 	}
	// 	else{
	// 		echo json_encode($dataSebelumnya);
	// 	}
	// }

	// function getUsernameTransaksi($data_sebelumnya, $data_baru){
	// 	$kon = mysqli_connect($this->host, $this->user, $this->password, $this->namaDb);
		
	// 	$content = trim(file_get_contents("php://input"));
	// 	$decoded = json_decode($content);
	// 	$jenis_biji = $decoded->jenis_biji;

	// 	$size = 1;
	// 	for ($i=0; $i < sizeof($data_baru); $i++) { 
	// 		$size++;
	// 		$result = mysqli_query($kon, "SELECT * FROM `transaksi` WHERE `jenis_biji` = '$jenis_biji' AND `username` = '$username' LIMIT 20");

	// 		if ($result) {
	// 			$dataTidakAda = true;
	// 			while ($row = mysqli_fetch_array($result)) {
	// 				$dataTidakAda = false;
	// 				$row_array['id_transaksi'] = $row['id_transaksi'];
	// 				$row_array['username'] = $row['username'];
	// 				$row_array['jenis_transaksi'] = $row['jenis_transaksi'];
	// 				$row_array['jenis_biji'] = $row['jenis_biji'];
	// 				$row_array['timedate'] = $row['timedate'];
	// 				$row_array['berat_bruto'] = $row['berat_bruto'];
	// 				$row_array['jumlah_karung_plastik'] = $row['jumlah_karung_plastik'];
	// 				$row_array['jumlah_karung_gunny'] = $row['jumlah_karung_gunny'];
	// 				$row_array['rata_kadar_air'] = $row['rata_kadar_air'];
	// 				$row_array['level_brix'] = $row['level_brix'];
	// 				$row_array['jumlah_biji'] = $row['jumlah_biji'];
	// 				$row_array['sampah'] = $row['sampah'];
	// 				$row_array['jamur'] = $row['jamur'];
	// 				$row_array['slaty'] = $row['slaty'];
	// 				$row_array['brown'] = $row['brown'];
	// 				$row_array['pengurangan_karung'] = $row['pengurangan_karung'];
	// 				$row_array['status_sampah'] = $row['status_sampah'];
	// 				$row_array['harga_net'] = $row['harga_net'];
	// 				$row_array['klaim_kadar_air'] = $row['klaim_kadar_air'];
	// 				$row_array['klaim_bean_qount'] = $row['klaim_bean_qount'];
	// 				$row_array['klaim_sampah'] = $row['klaim_sampah'];
	// 				$row_array['klaim_jamur'] = $row['klaim_jamur'];
	// 				$row_array['berat_netto'] = $row['berat_netto'];
	// 				$row_array['harga_satuan'] = $row['harga_satuan'];
	// 				$row_array['nama_buying'] = $row['nama_buying'];
	// 				$row_array['nohp'] = $row['nohp'];
	// 				$row_array['catatan'] = $row['catatan'];
	// 				$row_array['total'] = $row['total'];
	// 				$row_array['response'] = "Success";

	// 				array_push($data_sebelumnya,$row_array);
	// 			}
	// 		}
	// 	}

	// 	if ($size >= sizeof($data_baru)) {
	// 		echo json_encode($data_sebelumnya);
	// 	}
	// }
	
	// function getSemuaDataCatatanKebun(){
	// 	$kon = mysqli_connect($this->host, $this->user, $this->password, $this->namaDb);
		
	// 	$result = mysqli_query($kon, "SELECT * FROM `catatan_kebun` LIMIT 20");

	// 	if ($result) {
	// 		$data_result = array();
			
	// 		$dataTidakAda = true;
	// 		while ($row = mysqli_fetch_array($result)) {
	// 			$dataTidakAda = false;
	// 			$row_array['id_catatan'] = $row['id_catatan'];
	// 			$row_array['username'] = $row['username'];
	// 			$row_array['petugas'] = $row['petugas'];
	// 			$row_array['deskripsi'] = $row['deskripsi'];
	// 			$row_array['date_time'] = $row['date_time'];
	// 			$row_array['response'] = "Success";
				
	// 			array_push($data_result,$row_array);
				
	// 		}

	// 		if ($dataTidakAda) {
	// 			$row_array['response'] = "No Data";

	// 			array_push($data_result,$row_array);
	// 		}
			
	// 		echo json_encode($data_result);
	// 	}
	// 	else{		
	// 		$row_array['response'] = "Failed connecting to server";
			
	// 		array_push($data_result,$row_array);
	// 		echo json_encode($data_result);
	// 	}
		
	// }
	
	// function getSemuaDataCatatanKebunSearchUsername(){
	// 	$kon = mysqli_connect($this->host, $this->user, $this->password, $this->namaDb);
		
	// 	$content = trim(file_get_contents("php://input"));
	// 	$decoded = json_decode($content);
	// 	$username = $decoded->username;
		
	// 	$result = mysqli_query($kon, "SELECT * FROM `catatan_kebun` WHERE `username` LIKE '%$username%'");

	// 	if ($result) {
	// 		$data_result = array();
			
	// 		$dataTidakAda = true;
	// 		while ($row = mysqli_fetch_array($result)) {
	// 			$dataTidakAda = false;
	// 			$row_array['id_catatan'] = $row['id_catatan'];
	// 			$row_array['username'] = $row['username'];
	// 			$row_array['petugas'] = $row['petugas'];
	// 			$row_array['deskripsi'] = $row['deskripsi'];
	// 			$row_array['date_time'] = $row['date_time'];
	// 			$row_array['response'] = "Success";
				
	// 			array_push($data_result,$row_array);
				
	// 		}

	// 		if ($dataTidakAda) {
	// 			$row_array['response'] = "No Data";

	// 			array_push($data_result,$row_array);
	// 		}
			
	// 		echo json_encode($data_result);
	// 	}
	// 	else{		
	// 		$row_array['response'] = "Failed connecting to server";
			
	// 		array_push($data_result,$row_array);
	// 		echo json_encode($data_result);
	// 	}
		
	// }
	
	// function getDataCatatanKebun(){
	// 	$kon = mysqli_connect($this->host, $this->user, $this->password, $this->namaDb);
		
	// 	$content = trim(file_get_contents("php://input"));
	// 	$decoded = json_decode($content);
	// 	$username = $decoded->username;
		
	// 	$result = mysqli_query($kon, "SELECT * FROM `catatan_kebun` WHERE `username` = '$username'");

	// 	if ($result) {
	// 		$data_result = array();
			
	// 		$dataTidakAda = true;
	// 		while ($row = mysqli_fetch_array($result)) {
	// 			$dataTidakAda = false;
	// 			$row_array['id_catatan'] = $row['id_catatan'];
	// 			$row_array['username'] = $row['username'];
	// 			$row_array['petugas'] = $row['petugas'];
	// 			$row_array['deskripsi'] = $row['deskripsi'];
	// 			$row_array['date_time'] = $row['date_time'];
	// 			$row_array['response'] = "Success";
				
	// 			echo json_encode($row_array);
	// 		}

	// 		if ($dataTidakAda) {
	// 			$row_array['response'] = "No Data";

	// 			echo json_encode($row_array);
	// 		}
			
			
	// 	}
	// 	else{		
	// 		$row_array['response'] = "Failed connecting to server";
			
	// 		echo json_encode($row_array);
	// 	}
		
	// }
	
	// function getDataSemuaKelompok(){
	// 	$kon = mysqli_connect($this->host, $this->user, $this->password, $this->namaDb);

	// 	$content = trim(file_get_contents("php://input"));
	// 	$decoded = json_decode($content);
		
	// 	$result = mysqli_query($kon, "SELECT * FROM `kelompok_tani`");
	// 	$data_result = array();
	// 	if ($result) {

	// 		$dataTidakAda = true;
	// 		while ($row = mysqli_fetch_array($result)) {
	// 			$dataTidakAda = false;
	// 			$row_array['id_kelompok'] = $row['id_kelompok'];
	// 			$row_array['nama_kelompok'] = $row['nama_kelompok'];
	// 			$row_array['response'] = "Success";
				
	// 			array_push($data_result,$row_array);
	// 		}

	// 		if ($dataTidakAda) {
	// 			$row_array['response'] = "No Data";

	// 			array_push($data_result,$row_array);
	// 		}
	// 	}
	// 	else{		
	// 		$row_array['response'] = "Failed connecting to server";
	// 		array_push($data_result,$row_array);
	// 	}
		
	// 	echo json_encode($data_result);
	// }
	
	// function getDataKelompok(){
	// 	$kon = mysqli_connect($this->host, $this->user, $this->password, $this->namaDb);

	// 	$content = trim(file_get_contents("php://input"));
	// 	$decoded = json_decode($content);
	// 	$id_kelompok = $decoded->id_kelompok;
		
	// 	$result = mysqli_query($kon, "SELECT * FROM `kelompok_tani` WHERE `id_kelompok` = '$id_kelompok'");

	// 	if ($result) {
	// 		$dataTidakAda = true;
	// 		while ($row = mysqli_fetch_array($result)) {
	// 			$dataTidakAda = false;
	// 			$row_array['id_kelompok'] = $row['id_kelompok'];
	// 			$row_array['nama_kelompok'] = $row['nama_kelompok'];
	// 			$row_array['response'] = "Success";
				
	// 			echo json_encode($row_array);
	// 		}

	// 		if ($dataTidakAda) {
	// 			$row_array['response'] = "No Data";

	// 			echo json_encode($row_array);
	// 		}
	// 	}
	// 	else{		
	// 		$row_array['response'] = "Failed connecting to server";
			
	// 		echo json_encode($row_array);
	// 	}
		
	// }
	
	// function getDataSemuaDesa(){
	// 	$kon = mysqli_connect($this->host, $this->user, $this->password, $this->namaDb);

	// 	$content = trim(file_get_contents("php://input"));
	// 	$decoded = json_decode($content);
		
	// 	$result = mysqli_query($kon, "SELECT * FROM `wilayah_desa`");
	// 	$data_result = array();
	// 	if ($result) {

	// 		$dataTidakAda = true;
	// 		while ($row = mysqli_fetch_array($result)) {
	// 			$dataTidakAda = false;
	// 			$row_array['id_desa'] = $row['id_desa'];
	// 			$row_array['nama_desa'] = $row['nama_desa'];
	// 			$row_array['id_kecamatan'] = $row['id_kecamatan'];
	// 			$row_array['response'] = "Success";
				
	// 			array_push($data_result,$row_array);
	// 		}

	// 		if ($dataTidakAda) {
	// 			$row_array['response'] = "No Data";

	// 			array_push($data_result,$row_array);
	// 		}
	// 	}
	// 	else{		
	// 		$row_array['response'] = "Failed connecting to server";
	// 		array_push($data_result,$row_array);
	// 	}
		
	// 	echo json_encode($data_result);
	// }
	
	// function getDataDesa(){
	// 	$kon = mysqli_connect($this->host, $this->user, $this->password, $this->namaDb);

	// 	$content = trim(file_get_contents("php://input"));
	// 	$decoded = json_decode($content);
	// 	$id_desa = $decoded->id_desa;
		
	// 	$result = mysqli_query($kon, "SELECT * FROM `wilayah_desa` WHERE `id_desa` = '$id_desa'");

	// 	if ($result) {
	// 		$dataTidakAda = true;
	// 		while ($row = mysqli_fetch_array($result)) {
	// 			$dataTidakAda = false;
	// 			$row_array['id_desa'] = $row['id_desa'];
	// 			$row_array['nama_desa'] = $row['nama_desa'];
	// 			$row_array['id_kecamatan'] = $row['id_kecamatan'];
	// 			$row_array['response'] = "Success";
				
	// 			echo json_encode($row_array);
	// 		}

	// 		if ($dataTidakAda) {
	// 			$row_array['response'] = "No Data";

	// 			echo json_encode($row_array);
	// 		}
	// 	}
	// 	else{		
	// 		$row_array['response'] = "Failed connecting to server";
			
	// 		echo json_encode($row_array);
	// 	}
		
	// }
	
	// function getDataKuota(){
	// 	$kon = mysqli_connect($this->host, $this->user, $this->password, $this->namaDb);

	// 	$content = trim(file_get_contents("php://input"));
	// 	$decoded = json_decode($content);
	// 	$username = $decoded->username;
		
	// 	$tahun = date("Y");
		
	// 	$result = mysqli_query($kon, "SELECT * FROM `jatah` WHERE `username` = '$username' AND `tahun` = '$tahun'");

	// 	if ($result) {
	// 		$dataTidakAda = true;
	// 		while ($row = mysqli_fetch_array($result)) {
	// 			$dataTidakAda = false;
	// 			$row_array['username'] = $row['username'];
	// 			$row_array['tahun'] = $row['tahun'];
	// 			$row_array['jumlah'] = $row['jumlah'];
	// 			$row_array['response'] = "Success";
				
	// 			echo json_encode($row_array);
	// 		}

	// 		if ($dataTidakAda) {
	// 			$row_array['response'] = "No Data";

	// 			echo json_encode($row_array);
	// 		}
	// 	}
	// 	else{		
	// 		$row_array['response'] = "Failed connecting to server";
			
	// 		echo json_encode($row_array);
	// 	}
	// }
	
	// function getDataTransaksiPemakaian(){
	// 	$kon = mysqli_connect($this->host, $this->user, $this->password, $this->namaDb);

	// 	$content = trim(file_get_contents("php://input"));
	// 	$decoded = json_decode($content);
	// 	$username = $decoded->username;
	// 	$tahun = $decoded->tahun;
	// 	$jenis = $decoded->jenis;
	// 	$jenis_biji = $decoded->jenis_biji;
		
	// 	$result = mysqli_query($kon, "SELECT * FROM `transaksi` WHERE `username` = '$username' AND `jenis_transaksi` = '$jenis' AND `jenis_biji` = '$jenis_biji'");
	// 	$data_result = array();
		
	// 	if ($result) {

	// 		$dataTidakAda = true;
	// 		while ($row = mysqli_fetch_array($result)) {
	// 			$dateTime = split(" ", $row['timedate']);
	// 			$date = split("-", $dateTime[0]);

	// 			if ($date[0] == $tahun) {
	// 				$dataTidakAda = false;
	// 				$row_array['timedate'] = $row['timedate'];
	// 				$row_array['berat_netto'] = $row['berat_netto'];
	// 				$row_array['response'] = "Success";


	// 				array_push($data_result,$row_array);
	// 			}
	// 		}

	// 		if ($dataTidakAda) {
	// 			$row_array['response'] = "No Data";

	// 			array_push($data_result,$row_array);
	// 		}
	// 	}
	// 	else{		
	// 		$row_array['response'] = "Failed connecting to server";
	// 		array_push($data_result,$row_array);
	// 	}
		
	// 	echo json_encode($data_result);
	// }
	
	// function uploadImage(){
	// 	$upload_url = site_url().'assets/'; 
	// 	echo $upload_url;
	// 	$response = array(); 

	// 	if($_SERVER['REQUEST_METHOD']=='POST'){
	// 		if(isset($_POST['username']) and isset($_FILES['image']['name'])){
	// 			$con = mysqli_connect($this->host, $this->user, $this->password, $this->namaDb) or die('Unable to Connect...');

	// 			$username = $_POST['username'];
	// 			$folder = $_POST['folder'];
	// 			$jenisRequest = $_POST['jenisRequest'];
	// 			$fileinfo = pathinfo($_FILES['image']['name']);

	// 			$extension = $fileinfo['extension'];

	// 			$file_url = $upload_url.$username.'.'.$extension;

	// 			$file_path = $folder.$username.'.'.$extension; 

	// 			try{
	// 				move_uploaded_file($_FILES['image']['tmp_name'],$file_path);
	// 				$namaFile = $username.'.'.$extension;
	// 				$sql = "UPDATE `nasabah` SET `$jenisRequest` = '$namaFile' WHERE `username` = '$username'";
					
	// 				if(mysqli_query($con,$sql)){
	// 					$response['error'] = false; 
	// 					$response['url'] = $file_url; 
	// 					$response['name'] = $username;
	// 				}
	// 			}catch(Exception $e){
	// 				$response['error']=true;
	// 				$response['message']=$e->getMessage();
	// 			}		
	// 			echo json_encode($response);


	// 			mysqli_close($con);
	// 		}else{
	// 			$response['error']=true;
	// 			$response['message']='Please choose a file';
	// 			echo json_encode($response);
	// 		}
	// 	}

	// }

	// function getFileName(){
	// 	$con = mysqli_connect($this->host, $this->user, $this->password, $this->namaDb) or die('Unable to Connect...');
	// 	$sql = "SELECT max(id) as id FROM images";
	// 	$result = mysqli_fetch_array(mysqli_query($con,$sql));

	// 	mysqli_close($con);
	// 	if($result['id']==null)
	// 		return 1; 
	// 	else 
	// 		return ++$result['id']; 
	// }
}
?>
