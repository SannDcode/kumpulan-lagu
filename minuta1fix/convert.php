<?php
require_once './vendor/autoload.php';
require_once './function.php';
date_default_timezone_set('UTC'); 
// $phpWord = new \PhpOffice\PhpWord\PhpWord();
// $templateObject = new \PhpOffice\PhpWord\TemplateProcessor('helloWorld.docx');
// $templateObject->setValue('nama', 'Ahmad Gika Darmawan');
// $templateObject->saveAs('Sample_23_TemplateBlock.docx');
$inputFileName = './data.xlsx';
if ( $xlsx = SimpleXLSX::parse($inputFileName) ) {
    $dataArray = $xlsx->rows();
    
    $a =0;
    $count=1;
    foreach($dataArray as $dataExcel){
        if($a>=2){
            $tanngalAkta    = date('d-m-Y', $xlsx->unixstamp( $dataExcel[0] ));
            $tanggalAwal    = str_replace(":",".",date('H:i', $xlsx->unixstamp( $dataExcel[1] )));
            $tanggalAhir    = str_replace(":",".",date('H:i', $xlsx->unixstamp( $dataExcel[2] )));
            $zonaWaktu      = $dataExcel[3];
            $namaNotaris    = $dataExcel[4];
            $gelarNotaris   = $dataExcel[5];
            $kotaNotaris    = $dataExcel[6];
            $noAktaNotaris  = $dataExcel[7];
            
            $panggilanWOM   = $dataExcel[8];
            $wakilWom       = $dataExcel[9];
            $wakilTempatL   = $dataExcel[10];
            $lahirWakit     = date('d-m-Y', $xlsx->unixstamp( $dataExcel[11] ));
            $wakilKewarga   = $dataExcel[12];
            $pekerjaanWakil = $dataExcel[13];
            $alamtWakil     = $dataExcel[14];
            $kelWakil       = $dataExcel[15];
            $kecWakil       = $dataExcel[16];
            $kabWakil       = $dataExcel[17];
            $provWakil      = $dataExcel[18];
            $rtWakil        = $dataExcel[19];
            $rwWakil        = $dataExcel[20];
            $idWakil        = $dataExcel[21];
            $nikWakil       = $dataExcel[22];
            $kadaluarsaWOM  = date('d-m-Y', $xlsx->unixstamp( $dataExcel[23] ));
            $noKuasaWOM     = $dataExcel[24];

            $tglSKPJF       = $dataExcel[25];
            $perjanjianPem  = $dataExcel[26];
            $noPembiayaan   = $dataExcel[27];
            $tglJual        = date('d-m-Y', $xlsx->unixstamp( $dataExcel[28] ));
            $tglAhirJual    = date('d-m-Y', $xlsx->unixstamp( $dataExcel[29] ));
            $hutangPemb     = $dataExcel[30];
            $nilaiJaminan   = $dataExcel[31];
            $objekJaminan   = $dataExcel[32];
            $objekType      = $dataExcel[33];
            $objekJenis     = $dataExcel[34];
            $objekTahun     = $dataExcel[35];
            $objekRangka    = $dataExcel[36];
            $objekMesin     = $dataExcel[37];
            $objekBukti     = $dataExcel[38];
            if(strpos($dataExcel[39],"Nama")>1){
                $pch=explode(": ",$dataExcel[39]);
                $tnnglAtasnama=$pch[2];
                $objekBuktiNo = $pch[0].": ".$pch[1].": ".$pch[2]." (".terbilang(explode("-",$pch[2])[0])." ".tgl_indo(explode("-",$pch[2])[1])." ".terbilang(explode("-",$pch[2])[2]).")";
            }else{
                $objekBuktiNo   = $dataExcel[39];
            }
            $objekNilai     = $dataExcel[40];
            
            $pemberiPanggil = $dataExcel[41];
            $nmaPemberi     = $dataExcel[42];
            $lahirPemberi   = $dataExcel[43];
            $tglLahirPemberi= date('d-m-Y', $xlsx->unixstamp( $dataExcel[44] ));
            $pemberiKewarga = $dataExcel[45];
            $kerjaPemberi   = $dataExcel[46];
            $alamtPemberi   = $dataExcel[47];
            $rtPemberi      = $dataExcel[48];
            $rwPemberi      = $dataExcel[49];
            $kelPemberi     = $dataExcel[50];
            $kecPemberi     = $dataExcel[51];
            $kabPemberi     = $dataExcel[52];
            $idPemberi      = $dataExcel[53];
            $nikPemberi     = $dataExcel[54];
            if(strlen($dataExcel[55])>2){
                $pasanganPanggil= $dataExcel[55];
                $pasanganNama   = $dataExcel[56];
                $lahirPasangan  = $dataExcel[57];
                $tglLahirPasang = date('d-m-Y', $xlsx->unixstamp( $dataExcel[58] ));
                $pasanganKewarga= $dataExcel[59];
                $pasanganKerja  = $dataExcel[60];
                $pasanganAlamat = $dataExcel[61];
                $pasanganRt     = $dataExcel[62];
                $pasanganRw     = $dataExcel[63];
                $pasanganKel    = $dataExcel[64];
                $pasanganKec    = $dataExcel[65];
                $pasanganKab    = $dataExcel[66];
                $pasanganId     = $dataExcel[67];
                $pasanganNIK    = $dataExcel[68];
            }
            if(strlen($dataExcel[69])>1){
                $debiturPanggil = $dataExcel[69];
                $debiturNama    = $dataExcel[70];
                $debiturLahir   = $dataExcel[71];
                $debiturWarga   = $dataExcel[73];
                $debiturKerja   = $dataExcel[74];
                $debiturAlamat  = $dataExcel[75];
                $debiturRt      = $dataExcel[76];
                $debiturRw      = $dataExcel[77];
                $debiturKel     = $dataExcel[78];
                $debiturKec     = $dataExcel[79];
                $debiturKab     = $dataExcel[80];
                $debiturId      = $dataExcel[81];
                $debiturNik     = $dataExcel[82];
            }

            $s1Panggil = $dataExcel[83];
            $s1Nama    = $dataExcel[84];
            $s1Lahir   = $dataExcel[85];
            if(strlen($dataExcel[86])>1){
            	$s1Tgl     = date('d-m-Y', $xlsx->unixstamp( $dataExcel[86] ));
            }
            $s1Warga   = $dataExcel[87];
            $s1Kerja   = $dataExcel[88];
            $s1Alamat  = $dataExcel[89];
            $s1Rt      = $dataExcel[90];
            $s1Rw      = $dataExcel[91];
            $s1Kel     = $dataExcel[92];
            $s1Kec     = $dataExcel[93];
            $s1Kab     = $dataExcel[94];
            $s1Id      = $dataExcel[95];
            $s1Nik     = $dataExcel[96];

            $s2Panggil = $dataExcel[97];
            $s2Nama    = $dataExcel[98];
            $s2Lahir   = $dataExcel[99];
            if(strlen($dataExcel[100])>1){
            	$s2Tgl     = date('d-m-Y', $xlsx->unixstamp( $dataExcel[100] ));
            }
            $s2Warga   = $dataExcel[101];
            $s2Kerja   = $dataExcel[102];
            $s2Alamat  = $dataExcel[103];
            $s2Rt      = $dataExcel[104];
            $s2Rw      = $dataExcel[105];
            $s2Kel     = $dataExcel[106];
            $s2Kec     = $dataExcel[107];
            $s2Kab     = $dataExcel[108];
            $s2Id      = $dataExcel[109];
            $s2Nik     = $dataExcel[110];
            $cekBedaSama = '';
            $fileName = 'tempalteSama.docx';
            if(strlen($dataExcel[81])>2){
                $debiturTgl     = date('d-m-Y', $xlsx->unixstamp( $dataExcel[72] ));
                $cekBedaSama = "diantara Pemberi Fidusia selaku pihak yang menjamin hutang ".$debiturPanggil." ".$debiturNama.", lahir di ".$debiturLahir.", pada tanggal ".$debiturTgl." (".terbilang(explode("-",$debiturTgl)[0])." ".tgl_indo(explode("-",$debiturTgl)[1])." ".terbilang(explode("-",$debiturTgl)[2])."), ".$debiturWarga.", ".$debiturKerja.", bertempat tinggal di ".$debiturAlamat." Rukun Tetangga ".$debiturRt.", Rukun Warga ".$debiturRw.", Kelurahan ".$debiturKel.", Kecamatan ".$debiturKec.", Kabupaten ".$debiturKab.", pemegang ".$debiturId." Nomor : ".$debiturNik.". selaku pihak yang menerima fasilitas kredit (untuk selanjutnya cukup disebut “Debitor”) dan Penerima Fidusia selaku pihak yang memberi fasilitas kredit (untuk selanjutnya cukup disebut “Kreditor”)";
            }else{
                $cekBedaSama = "diantara Pihak Pertama selaku pihak yang menerima fasilitas kredit (selanjutnya disebut “Debitor”) dan Pihak Kedua selaku pihak yang memberikan fasilitas kredit (selanjutnya disebut- “Kreditor”),";
            }
            $phpWord = new \PhpOffice\PhpWord\PhpWord();
            $templateObject = new \PhpOffice\PhpWord\TemplateProcessor($fileName);
            $templateObject->setValue('cekSamaAtauTidak', $cekBedaSama);
            $templateObject->setValue('nomor_fidusia', $noAktaNotaris);
            $templateObject->setValue('hari_fidusia', hari_ini($tanngalAkta));
            $templateObject->setValue('tgl_fidusia', terbilang(explode("-",$tanngalAkta)[0]));
            $templateObject->setValue('bulan_fidusia', tgl_indo(explode("-",$tanngalAkta)[1]));
            $templateObject->setValue('tahun_fidusia', terbilang(explode("-",$tanngalAkta)[2]));
            $templateObject->setValue('date_fidusia', $tanngalAkta);
            $templateObject->setValue('jam_digit', $tanggalAwal);
            $templateObject->setValue('zona', $zonaWaktu);
            $templateObject->setValue('ejaan_jam', jam_terbilang($tanggalAwal));
            $templateObject->setValue('ejaan_zona', zonaIndonesia($zonaWaktu));
            $templateObject->setValue('namaNotaris', $namaNotaris);
            $templateObject->setValue('gelar', bacaGelar($gelarNotaris));
            $templateObject->setValue('kotaNotaris', $kotaNotaris);
            $templateObject->setValue('panggilanWom', $panggilanWOM);
            $templateObject->setValue('namaWom', $wakilWom);
            $templateObject->setValue('TempatLahirWom', $wakilTempatL);
            $templateObject->setValue('tglLahirWom', terbilang(explode("-",$lahirWakit)[0]));
            $templateObject->setValue('bulanLahirWom', tgl_indo(explode("-",$lahirWakit)[1]));
            $templateObject->setValue('tahunLahirWom', terbilang(explode("-",$lahirWakit)[2]));
            $templateObject->setValue('dobWom', $lahirWakit);
            $templateObject->setValue('kewargaNegaraanWom', $wakilKewarga);
            $templateObject->setValue('pekerjaanWom', $pekerjaanWakil);
            $templateObject->setValue('alamatWom', $alamtWakil);
            $templateObject->setValue('kelurahanWom', $kelWakil);
            $templateObject->setValue('kecamatanWom', $kecWakil);
            $templateObject->setValue('rtWom', $rtWakil);
            $templateObject->setValue('rwWom', $rwWakil);
            $templateObject->setValue('kabupatenWom', $kabWakil);
            $templateObject->setValue('provinsiWom', $provWakil);
            $templateObject->setValue('idWom', $idWakil);
            $templateObject->setValue('nomorIdWom', $nikWakil);
            $templateObject->setValue('posisiWOM', $kotaNotaris);
            $templateObject->setValue('tanggalKuasa', $tglJual);
            $templateObject->setValue('ejaanTanggalWom', terbilang(explode("-",$tglJual)[0]));
            $templateObject->setValue('ejaanBulanWom', tgl_indo(explode("-",$tglJual)[1]));
            $templateObject->setValue('ejaanTahunWom', terbilang(explode("-",$tglJual)[2]));
            $templateObject->setValue('panggilanPemberi', $pemberiPanggil);
            $templateObject->setValue('namaPemberi', $nmaPemberi);
            $templateObject->setValue('tempatLahirPemberi', $lahirPemberi);
            $templateObject->setValue('ttlPemberi', $tglLahirPemberi);
            $templateObject->setValue('ejaanTglPemberi', terbilang(explode("-",$tglLahirPemberi)[0]));
            $templateObject->setValue('ejaanBulanPemberi', tgl_indo(explode("-",$tglLahirPemberi)[1]));
            $templateObject->setValue('ejaanTahunPemberi', terbilang(explode("-",$tglLahirPemberi)[2]));
            $templateObject->setValue('kewargaPemberi', $pemberiKewarga);
            $templateObject->setValue('pekerjaanPemberi', $kerjaPemberi);
            $templateObject->setValue('alamatPemberi', $alamtPemberi);
            $templateObject->setValue('rtPemberi', $rtPemberi);
            $templateObject->setValue('rwPemberi', $rwPemberi);
            $templateObject->setValue('kelPemberi', $kelPemberi);
            $templateObject->setValue('kecPemberi', $kecPemberi);
            $templateObject->setValue('kabPemberi', $kabPemberi);
            $templateObject->setValue('idPemberi', $idPemberi);
            $templateObject->setValue('noIdPemberi', $nikPemberi);
            if(strlen($dataExcel[55])>2){
                $templateObject->setValue('adaPasangan', "-menurut keterangannya dalam melakukan tindakan hukum dalam akta ini telah memperoleh persetujuan dari pasangannya yang sah yaitu :");
                $templateObject->setValue('dataPasangan', "- ".$pasanganPanggil." ".$pasanganNama." lahir di ".$lahirPasangan.", pada tanggal ".$tglLahirPasang." (".terbilang(explode("-",$tglLahirPasang)[0])." ".tgl_indo(explode("-",$tglLahirPasang)[1])." ".terbilang(explode("-",$tglLahirPasang)[2])."), ".$pasanganKewarga.", ".$pasanganKerja.", bertempat tinggal di ".$pasanganAlamat.", Rukun Tetangga ".$pasanganRt.", Rukun Warga ".$pasanganRw.", Kelurahan ".$pasanganKel.", Kecamatan ".$pasanganKec.", Kabupaten ".$pasanganKab.", pemegang ".$pasanganId." Nomor : ".$pasanganNIK);
            }else{
                $templateObject->setValue('adaPasangan', "");
                $templateObject->setValue('dataPasangan', "");
            }
            $templateObject->setValue('tglKuasa', $kadaluarsaWOM);
            $templateObject->setValue('ejaantglKuasa', terbilang(explode("-",$kadaluarsaWOM)[0]));
            $templateObject->setValue('ejaanBulanKuasa', tgl_indo(explode("-",$kadaluarsaWOM)[1]));
            $templateObject->setValue('ejaanTahunKuasa', terbilang(explode("-",$kadaluarsaWOM)[2]));
            $templateObject->setValue('nomorKuasa', $noKuasaWOM);
            $templateObject->setValue('tipePerjanjian', strtolower($perjanjianPem));
            $templateObject->setValue('nomorPembiayaan', $noPembiayaan);
            $templateObject->setValue('tglPembiayaan', $tglJual);
            $templateObject->setValue('tglJual', $tglJual);
            $templateObject->setValue('ejaanTanggalPembiayaan', terbilang(explode("-",$tglJual)[0]));
            $templateObject->setValue('ejaanBulanPembiayaan', tgl_indo(explode("-",$tglJual)[1]));
            $templateObject->setValue('ejaanTahunPembiayaan', terbilang(explode("-",$tglJual)[2]));
            $templateObject->setValue('ejaanTanggalJual', terbilang(explode("-",$tglJual)[0]));
            $templateObject->setValue('ejaanBulanJual', tgl_indo(explode("-",$tglJual)[1]));
            $templateObject->setValue('ejaaanTahunJual', terbilang(explode("-",$tglJual)[2]));
            $templateObject->setValue('ejaanTglAhir', terbilang(explode("-",$tglAhirJual)[0]));
            $templateObject->setValue('ejaanBulanAhir', tgl_indo(explode("-",$tglAhirJual)[1]));
            $templateObject->setValue('ejaanTahunAhir', terbilang(explode("-",$tglAhirJual)[2]));
            $templateObject->setValue('tglAhir', $tglAhirJual);
            $templateObject->setValue('tipePembiayaan', $perjanjianPem);
            $templateObject->setValue('tipePembiayaanB', strtoupper($perjanjianPem));
            $templateObject->setValue('jumlahHutang', rupiah($hutangPemb));
            $templateObject->setValue('ejaanJumlahHutang', terbilang($hutangPemb));
            $templateObject->setValue('jumlahPenjaminan', rupiah($nilaiJaminan));
            $templateObject->setValue('ejaanjumlahPenjaminan', terbilang($nilaiJaminan));
            $templateObject->setValue('merkJaminan', $objekJaminan);
            $templateObject->setValue('typejaminan', $objekType);
            $templateObject->setValue('tahunPembuatan', $objekTahun);
            $templateObject->setValue('noRangka', $objekRangka);
            $templateObject->setValue('noMesin', $objekMesin);
            $templateObject->setValue('kepemilikan', $objekBukti);
            $templateObject->setValue('nomorKepemilikan', $objekBuktiNo);
            $templateObject->setValue('nilaiJaminan', rupiah($objekNilai));
            $templateObject->setValue('ejaanNilaiJaminan', terbilang($objekNilai));
            $templateObject->setValue('jamSelesai', $tanggalAhir);
            $templateObject->setValue('zonaSelesai', $zonaWaktu);
            $templateObject->setValue('ejaanJamSelesai', jam_terbilang($tanggalAhir));
            $templateObject->setValue('ejaanZonaWaktu', zonaIndonesia($zonaWaktu));
            $templateObject->setValue('kotaPembuatan', $kotaNotaris);
            if(strlen($dataExcel[86])>1){
            $templateObject->setValue('saksiSatu', "- ".$s1Panggil." ".$s1Nama." lahir di ".$s1Lahir.", pada tanggal ".$s1Tgl." (".terbilang(explode("-",$s1Tgl)[0])." ".tgl_indo(explode("-",$s1Tgl)[1])." ".terbilang(explode("-",$s1Tgl)[2])."), ".$s1Warga.", ".$s1Kerja.", bertempat tinggal di ".$s1Alamat.", Rukun Tetangga ".$s1Rt.", Rukun Warga ".$s1Rw.", Kelurahan ".$s1Kel.", Kecamatan ".$s1Kec.", Kabupaten ".$s1Kab.", pemegang ".$s1Id." Nomor : ".$s1Nik);
        	}else{
        		$templateObject->setValue('saksiSatu', "- ".$s1Panggil." ".$s1Nama." lahir di ".$s1Lahir.", ".$s1Warga.", ".$s1Kerja.", bertempat tinggal di ".$s1Alamat.", Rukun Tetangga ".$s1Rt.", Rukun Warga ".$s1Rw.", Kelurahan ".$s1Kel.", Kecamatan ".$s1Kec.", Kabupaten ".$s1Kab.", pemegang ".$s1Id." Nomor : ".$s1Nik);
        	}
        	if(strlen($dataExcel[100])>1){
            $templateObject->setValue('saksiDua', "- ".$s2Panggil." ".$s2Nama." lahir di ".$s2Lahir.", pada tanggal ".$s2Tgl." (".terbilang(explode("-",$s2Tgl)[0])." ".tgl_indo(explode("-",$s2Tgl)[1])." ".terbilang(explode("-",$s2Tgl)[2])."), ".$s2Warga.", ".$s2Kerja.", bertempat tinggal di ".$s2Alamat.", Rukun Tetangga ".$s2Rt.", Rukun Warga ".$s2Rw.", Kelurahan ".$s2Kel.", Kecamatan ".$s2Kec.", Kabupaten ".$s2Kab.", pemegang ".$s2Id." Nomor : ".$s2Nik);
            }else{
            	$templateObject->setValue('saksiDua', "- ".$s2Panggil." ".$s2Nama." lahir di ".$s2Lahir.", ".$s2Warga.", ".$s2Kerja.", bertempat tinggal di ".$s2Alamat.", Rukun Tetangga ".$s2Rt.", Rukun Warga ".$s2Rw.", Kelurahan ".$s2Kel.", Kecamatan ".$s2Kec.", Kabupaten ".$s2Kab.", pemegang ".$s2Id." Nomor : ".$s2Nik);
            }

            $templateObject->saveAs('./data/'.$noAktaNotaris.'_'.$nmaPemberi.'_'.$noPembiayaan.'.docx');
            // exit;
            // echo $a."-".$lahirWakit."~".$kadaluarsaWOM."~".$tglJual."~".$tglAhirJual."~".$tglLahirPemberi."~".$tglLahirPasang."~".$s1Tgl."\n";
            // echo $a."\n";
            echo "$count. No Akta. $noAktaNotaris. | Berhasil dibuat. \n";
            file_put_contents("success.txt", "$noPembiayaan\r\n", FILE_APPEND | LOCK_EX);
            $count++;
            sleep(1);
        }
        $a++;
    }
} else {
	echo SimpleXLSX::parseError();
}