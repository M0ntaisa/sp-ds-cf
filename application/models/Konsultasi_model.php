<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Konsultasi_model extends CI_Model {

    public function proses()
    {
        $gejala=array();
                $query = $this->db->query("SELECT GROUP_CONCAT(b.kode_penyakit), a.cf
                FROM tb_aturan a
                JOIN tb_penyakit b ON a.id_penyakit=b.id_penyakit
                WHERE a.id_gejala IN(".implode(',',$_POST['gejala']).") 
                GROUP BY a.id_gejala");
                foreach ($query->result_array() as $row)
                {
                    $gejala[]=$row;
                }
                $jumlah_g = count($gejala);
                for ($i=0; $i < $jumlah_g ; $i++) { 
                    $gejala[$i] = array_values($gejala[$i]);
                }
                
                // echo "<pre>";
                // print_r($gejala);
                //-- masukkan kode perhitungannya di sini

                //--- menentukan environement
                $query = $this->db->query("SELECT GROUP_CONCAT(kode_penyakit) FROM tb_penyakit");
                $row = $query->result_array();
                $fod = array_values($row[0]);
                // echo "<pre>";
                // print_r($fod);exit;

                //--- menentukan nilai densitas
                $densitas_baru=array();
                $riwayat = array();
                $riwayat_x = array();
                $r = 0;
                $densi = 3;
                echo "<hr>";
                while(!empty($gejala)){
                    $densitas1[0]=array_shift($gejala);
                    // print_r($densitas1);
                    $densitas1[1]=array($fod[0],1-$densitas1[0][1]);
                    // print_r($densitas1);exit;
                    $densitas2=array();
                    if(empty($densitas_baru)){
                        $densitas2[0]=array_shift($gejala);
                    }else{
                        foreach($densitas_baru as $k=>$r){
                            if($k!="&theta;"){
                                $densitas2[]=array($k,$r);
                            }
                        }
                    }
                    // print_r($densitas2);exit;
                    $theta=1;
                    foreach($densitas2 as $d) $theta-=$d[1];
                    $densitas2[]=array($fod[0],$theta);
                    // print_r($densitas2);exit;
                    $m=count($densitas2);
                    $densitas_baru=array();
                    $densi_x = $densi-2;
                    $densi_y = $densi-1;
                    // echo "Menentukan Nilai Densitas (m$densi) dari Densitas (m$densi_x) dan Densitas (m$densi_y)!"."<br>";
                    // echo "Menentukan Nilai Densitas (m) baru!"."<br>";
                    
                    for($y=0;$y<$m;$y++){
                        for($x=0;$x<2;$x++){
                          // echo "<hr>";
                            if(!($y==$m-1 && $x==1)){
                                // print_r($densitas1);exit;
                                $v=explode(',',$densitas1[$x][0]);
                                $w=explode(',',$densitas2[$y][0]);
                                sort($v);
                                sort($w);
                                $vw=array_intersect($v,$w);
                                
                                if(empty($vw)){
                                    $k="&theta;";
                                }else{
                                    $k=implode(',',$vw);
                                }
                                // print_r($densitas1);
                                // print_r($densitas2);
                                
                                if(!isset($densitas_baru[$k])){
                                    $densitas_baru[$k]=$densitas1[$x][1]*$densitas2[$y][1];
                                    // echo $densitas2[$y][0]."<br>";
                                    // echo $densitas1[$x][0]." x ".$densitas2[$y][0]." = ".$densitas1[$x][0].",".$densitas2[$y][0]."<br>";
                                    // echo $densitas1[$x][1]." x ".$densitas2[$y][1]." = ".$densitas_baru[$k]."<br>";
                                  }else{
                                    $densitas_baru[$k]+=$densitas1[$x][1]*$densitas2[$y][1];
                                    // echo $densitas1[$x][1]." x ".$densitas2[$y][1]." = ".$densitas_baru[$k]."<br>";
                                  }
                                  
                            }
                        } 
                    } 
                    
                    echo "<br>-----------------------------<br>";
                    echo "Proses densitas baru (m)"."<br>";
                    $densi = $densi + 2;
                    foreach($densitas_baru as $k=>$d){
                      
                        if($k!="&theta;"){
                            $densitas_baru[$k]=$d/(1-(isset($densitas_baru["&theta;"])?$densitas_baru["&theta;"]:0));
                            
                            echo $k." = ".round($d,2)." / ".round((1-(isset($densitas_baru["&theta;"])?$densitas_baru["&theta;"]:0)),2)." = ".round($densitas_baru[$k],2)."<br>";
                        }
                        
                        // print_r($densitas_baru);
                        $riwayat = $densitas_baru;
                        $r++;
                    }
                    
                    $riwayat_x[] = $riwayat;
                    // echo "<hr><br>";
                }
                
                // echo "<pre>";
                // print_r($riwayat_x);
                // echo "<hr><br>";
                //--- perangkingan
                unset($densitas_baru["&theta;"]);
                arsort($densitas_baru);
                // print_r($densitas_baru);
                echo "<br>=============================================================<br>";
                $kode_penyakit = array_keys($densitas_baru)[0];
                $rank = $this->Penyakit_model->getNamaPenyakit($kode_penyakit);
                echo "Nilai tertinggi dari perhitungan gejala adalah ".$rank->nama_penyakit.", dengan nilai DS = ".round(array_values($densitas_baru)[0],2);
                
                // $data = [
                //     'title' =>  "Hasil Konsultasi",
                //     'riwayat'    =>  $riwayat_x,
                //     'h_akhir'  =>  $densitas_baru,
                //     'isi'   =>  "user/hasil_konsultasi"
                // ];
    
                // $this->load->view('layout/wrapper', $data, FALSE);
    }

    public function prosesCF()
    {
        // group kemungkinan terdapat penyakit
        $groupKemungkinanPenyakit = $this->Konsultasi_model->getGroupAturan(implode(",", $_POST['gejala']));

        // menampilkan kode gejala yang di pilih
        $sql = $_POST['gejala'];

        if (isset($sql)) {
          // mencari data penyakit kemungkinan dari gejala
          for ($h=0; $h < count($sql); $h++) {
            $kemungkinanPenyakit[] = $this->Konsultasi_model->getKemungkinanPenyakit($sql[$h]);
            for ($x=0; $x < count($kemungkinanPenyakit[$h]); $x++) {
              for ($i=0; $i < count($groupKemungkinanPenyakit); $i++) {
                $namaPenyakit = $groupKemungkinanPenyakit[$i]['nama_penyakit'];
                if ($kemungkinanPenyakit[$h][$x]['nama_penyakit'] == $namaPenyakit) {
                  // list di kemungkinan dari gejala
                  $listIdKemungkinan[$namaPenyakit][] = $kemungkinanPenyakit[$h][$x]['id_aturan'];
                }
              }
            }
          }

        //   echo "<pre>";
        //   print_r($listIdKemungkinan);die;

          $id_penyakit_terbesar = '';
          $nama_penyakit_terbesar = '';
          // list penyakit kemungkinan
          for ($h=0; $h < count($groupKemungkinanPenyakit); $h++) { 
            $namaPenyakit = $groupKemungkinanPenyakit[$h]['nama_penyakit'];
            echo "<hr><br/>Proses Penyakit ".$h.".".$namaPenyakit."<br/>========================================================<br/>";
            echo "Jumlah Gejala = ".
                      count($listIdKemungkinan[$namaPenyakit])."<br/>";
            // list penyakit kemungkinan dari gejala
            for ($x=0; $x < count($listIdKemungkinan[$namaPenyakit]); $x++) { 
              $daftarKemungkinanPenyakit = $this->Konsultasi_model->getListPenyakit($listIdKemungkinan[$namaPenyakit][$x]);
              $proc = $x+1;
              
              echo "<br/>proses ".$proc."<br/>------------------------------------<br/>";
                      
              for ($i=0; $i < count($daftarKemungkinanPenyakit); $i++) {
                  
                  if (count($listIdKemungkinan) == 1) {
                    // echo "Jumlah Gejala = ".
                    //   count($listIdKemungkinan[$namaPenyakit])."<br/>";
                        
                    // bila list kemungkinan terdapat 1
                    $mb = $daftarKemungkinanPenyakit[$i]['mb'];
                    $md = $daftarKemungkinanPenyakit[$i]['md'];
                    $cf = $mb - $md;
                    $daftar_cf[$namaPenyakit][] = $cf;

                    echo "<br/>proses 1<br/>------------------------<br/>";
                    echo "mb = ".$mb."<br/>";
                    echo "md = ".$md."<br/>";
                    echo "cf = mb - md = ".$mb." - ".$md." = ".$cf."<br/><br/><br/>";
                    // end bila list kemungkinan terdapat 1
                  } else {
                    // list kemungkinanan lebih dari satu
                    if ($x == 0)
                    {
                      // echo "Jumlah Gejala = ".
                      // count($listIdKemungkinan[$namaPenyakit])."<br/>";
                      // record md dan mb sebelumnya
                      $mblama = $daftarKemungkinanPenyakit[$i]['mb'];
                      $mdlama = $daftarKemungkinanPenyakit[$i]['md'];
                      // md yang di esekusi
                      $mb = $daftarKemungkinanPenyakit[$i]['mb'];
                      $md = $daftarKemungkinanPenyakit[$i]['md'];
                      echo "<br/>";
                      echo "mb_baru = ".$mb."<br/>";
                      echo "md_baru = ".$md."<br/>";
                      $cf = $mb - $md;
                      echo "cf = mb - md = ".$mb." - ".$md." = ".$cf."<br/><br/><br/>";

                      $daftar_cf[$namaPenyakit][] = $cf;
                    } 
                    else
                    {
                      $mbbaru = $daftarKemungkinanPenyakit[$i]['mb'];
                      $mdbaru = $daftarKemungkinanPenyakit[$i]['md'];
                      echo "mb_baru = ".$mbbaru."<br/>";
                      echo "md_baru = ".$mdbaru."<br/>";
                      $mbsementara = $mblama + ($mbbaru * (1 - $mblama));
                      $mdsementara = $mdlama + ($mdbaru * (1 - $mdlama));
                      echo "mb_sementara = mb_lama + (mb_baru * (1 - mb_lama)) = $mblama + ($mbbaru * (1 - $mblama)) = ".$mbsementara."<br/>";
                      echo "md_sementara = md_lama + (md_baru * (1 - md_lama)) = $mdlama + ($mdbaru * (1 - $mdlama)) = ".$mdsementara."<br/>";

                      $mb = $mbsementara;
                      $md = $mdsementara;
                      $cf = $mb - $md;
                      echo "cf = mb_sementara - md_sementara = ".$mb." - ".$md." = ".$cf."<br/><br/><br/>";
                      $daftar_cf[$namaPenyakit][] = $cf;;
                    }
                    // end list kemungkinanan lebih dari satu
                  }
                }
              }  
            }
          }
          echo "<br/>===================================================================<br/>";
        $this->Konsultasi_model->hasilCFTertinggi($daftar_cf,$groupKemungkinanPenyakit);
        $this->Konsultasi_model->hasilAkhir($daftar_cf,$groupKemungkinanPenyakit);

    }

     /**
     * Gets the group tb_aturan.
     *
     * mengambil salah satu nama penyakit bila terdapat nama penyakit sama
     */
    public function getGroupAturan($value)
    {
      // p, g , pyt merupakan inisialisasi dari tabel yang dituju
      $query = $this->db->query("SELECT
            pyt.nama_penyakit 
        FROM
            tb_aturan p
            JOIN tb_gejala g ON p.id_gejala = g.id_gejala
            JOIN tb_penyakit pyt ON p.id_penyakit = pyt.id_penyakit 
        WHERE
            p.id_gejala IN ( $value ) 
        GROUP BY
            p.id_penyakit 
        ORDER BY
            p.id_penyakit");

      return $query->result_array();

    //   if (isset($result)) {
    //     // merubah data tabel menjadi array
    //     $row = [];
    //     while ($row = $result->fetch_assoc()) {
    //       $rows[] = $row;
    //     }

    //     return $rows;
    //   }

    }

    /**
     * Gets the kemungkinan penyakit.
     *
     * mengambil data tb_aturan bila terdapat gejala
     */
    public function getKemungkinanPenyakit($sql)
    {
      // p, g , pyt merupakan inisialisasi dari tabel yang dituju
      $query = $this->db->query("SELECT pyt.nama_penyakit, p.id_aturan FROM tb_aturan p
        JOIN tb_gejala g ON p.id_gejala = g.id_gejala
        JOIN tb_penyakit pyt ON p.id_penyakit = pyt.id_penyakit
        WHERE g.id_gejala IN ($sql)");
      
      return $query->result_array();

    //   if (isset($result)) {
    //     // merubah data tabel menjadi array
    //     $row = [];
    //     while ($row = $result->fetch_assoc()) {
    //       $rows[] = $row;
    //     }

    //     return $rows;
    //   }

    }

    public function getListPenyakit($value)
    {
      // p, g , pyt merupakan inisialisasi dari tabel yang dituju
      $query = $this->db->query("SELECT * FROM tb_aturan p
        JOIN tb_gejala g ON p.id_gejala = g.id_gejala
        JOIN tb_penyakit pyt ON p.id_penyakit = pyt.id_penyakit
        WHERE p.id_aturan IN ($value)");
      
      return $query->result_array();

    // if (isset($result)) {
    //     // merubah data tabel menjadi array
    //     $row = [];
    //     while ($row = $result->fetch_assoc()) {
    //     $rows[] = $row;
    //     }

    //     return $rows;
    // }
    }

    public function hasilCFTertinggi($daftar_cf,$groupKemungkinanPenyakit)
    {
      for ($i=0; $i < count($groupKemungkinanPenyakit); $i++) { 
        $namaPenyakit = $groupKemungkinanPenyakit[$i]['nama_penyakit'];
        echo "<br/>Nama Penyakit = ".$namaPenyakit."<br/>";
        for ($x=0; $x < count($daftar_cf[$namaPenyakit]); $x++) {
          $merubahIndexCF = max($daftar_cf[$namaPenyakit]);
        }

        echo "Nilai CF Tertinggi Di Kandidat Penyakit = ".$merubahIndexCF."<br>";
        echo "<br/>-------------------------------------------------------------------------<br/>";
      }
    }

    public function hasilAkhir($daftar_cf,$groupKemungkinanPenyakit)
    {
      for ($i=0; $i < count($groupKemungkinanPenyakit); $i++) { 
        $namaPenyakit = $groupKemungkinanPenyakit[$i]['nama_penyakit'];
        for ($x=0; $x < count($daftar_cf[$namaPenyakit]); $x++) {
          $merubahIndexCF[$i] = max($daftar_cf[$namaPenyakit]);
        }
      }

      for ($i=0; $i < count($groupKemungkinanPenyakit); $i++) { 
        $hasilMax = max($merubahIndexCF);
        $namaPenyakit = $groupKemungkinanPenyakit[$i]['nama_penyakit'];
        if ($merubahIndexCF[$i] === $hasilMax) {
          echo "Nilai tertinggi dari perhitungan gejala adalah ".$namaPenyakit.", dengan nilai CF = ".$merubahIndexCF[$i];  
        }
      }

    }

}

/* End of file Konsultasi_model.php */
