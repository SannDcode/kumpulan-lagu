<?php
function penyebut($nilai) {
    $nilai = abs($nilai);
    $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($nilai < 12) {
        $temp = " ". $huruf[$nilai];
    } else if ($nilai <20) {
        $temp = penyebut($nilai - 10). " belas";
    } else if ($nilai < 100) {
        $temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
    } else if ($nilai < 200) {
        $temp = " seratus" . penyebut($nilai - 100);
    } else if ($nilai < 1000) {
        $temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
    } else if ($nilai < 2000) {
        $temp = " seribu" . penyebut($nilai - 1000);
    } else if ($nilai < 1000000) {
        $temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
    } else if ($nilai < 1000000000) {
        $temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
        $temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
    } else if ($nilai < 1000000000000000) {
        $temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
    }     
    return $temp;
}

function terbilang($nilai) {
        $hasil = trim(penyebut($nilai));    		
    return $hasil;
}

function tgl_indo($bulanEn){
	$bulan = array (1 =>   'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
 
	return $bulan[ (int)$bulanEn ];
}
function jam_terbilang($jam){
    $dataJam = explode(".",$jam);
    $ejaan = terbilang($dataJam[0]);
    if($dataJam[1]=="00"){
        $ejaan.=" nol nol";
    }else{
        $ejaan.=" lebih ".terbilang($dataJam[1])." menit";
    }
    return $ejaan;
}
function hari_ini($tanggal){
    // $hari = date ("D");
    $timestamp = strtotime($tanggal);
    $hari = date('D', $timestamp);
 
	switch($hari){
		case 'Sun':
			$hari_ini = "Minggu";
		break;
 
		case 'Mon':			
			$hari_ini = "Senin";
		break;
 
		case 'Tue':
			$hari_ini = "Selasa";
		break;
 
		case 'Wed':
			$hari_ini = "Rabu";
		break;
 
		case 'Thu':
			$hari_ini = "Kamis";
		break;
 
		case 'Fri':
			$hari_ini = "Jumat";
		break;
 
		case 'Sat':
			$hari_ini = "Sabtu";
		break;
		
		default:
			$hari_ini = "Tidak di ketahui";		
		break;
	}
 
	return $hari_ini;
}

function zonaIndonesia($zona){

    switch($zona){
        case "WIB":
            $ejaan_zona = "Waktu Indonesia Barat";
        break;
        case "WIT":
            $ejaan_zona = "Waktu Indonesia Timur";
        break;
        case "WITA":
            $ejaan_zona = "Waktu Indonesia Tengah";
    }
    return $ejaan_zona;
}

function bacaGelar($gelar){
    switch($gelar){
        case "S.H., M.Kn.":
            $gelar = " Sarjana Hukum, Magister Kenotariatan";
        break;
        case "S.H.":
            $gelar = 'Sarjana Hukum';
        break;
    }
    return $gelar;
}

function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,0,',','.');
	return $hasil_rupiah;
 
}
// echo rupiah(50000000);