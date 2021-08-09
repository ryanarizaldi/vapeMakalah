<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class M_history extends Model
{
    protected $table = 'histori';
    protected $skipValidation = true;
    // protected $allowedFields = ['kd_instansi','id_kolom','nama_kolom'];

    public function getRekeningKoran($awal, $akhir, $no_va)
    {
        return $this->query("SELECT * from histori where no_va = $no_va and tgl between '$awal' and '$akhir' order by time_stamp");
    }

    public function getByName($name)
    {
        return $this->query("SELECT * from histori where no_va = $no_va and tgl between '$awal' and '$akhir' order by time_stamp");
    }

    public function getByVa($no_va)
    {
        return $this->query("SELECT * from histori where no_va = '$no_va' order by time_stamp");
        // return $this->query("SELECT * from histori where no_va like '%$no_va%' order by time_stamp");
    }
}