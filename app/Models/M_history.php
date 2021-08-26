<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class M_history extends Model
{
    protected $table = 'histori';
    protected $skipValidation = true;
    // protected $allowedFields = ['kd_instansi','id_kolom','nama_kolom'];

    public function getRekeningKoran($awal, $akhir, $no_va)
    {
        return $this->query("SELECT * from histori where kd_va = $no_va and tgl between '$awal' and '$akhir' order by time_stamp");
    }

    public function getByName($name)
    {
        return $this->query("SELECT * from histori where kd_va = $no_va and tgl between '$awal' and '$akhir' order by time_stamp");
    }

    public function getByVa($no_va)
    {
        return $this->query("SELECT * from histori where kd_va = '$no_va' order by time_stamp");
        // return $this->query("SELECT * from histori where no_va like '%$no_va%' order by time_stamp");
    }

    public function getHistorybyInst($kd_instansi, $awal, $akhir)
    {
        return $this->query("select a.tgl, a.no_arsip, a.kd_va, a.keterangan, a.jml_tx, b.kd_instansi from histori a, va2 b where b.kd_instansi='$kd_instansi' and b.kd_va=a.kd_va and a.tgl between '$awal' and '$akhir'");
    }
}