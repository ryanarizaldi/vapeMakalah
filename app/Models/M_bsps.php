<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class M_bsps extends Model
{
    protected $table = 'bsps';
    protected $skipValidation = true;
    // protected $allowedFields = ['kd_instansi','id_kolom','nama_kolom'];

    public function getBsps()
    {
        return $this->findAll();
    }

    public function getName($no_va)
    {
        return $this->query("SELECT nama from bsps where no_va = '$no_va'");
    }

    public function getByVa($no_va)
    {
        return $this->query("SELECT * from bsps where no_va = '$no_va'");
    }

    public function getByName($nama)
    {
        return $this->query("SELECT nama from bsps where nama = '$nama'");
    }

    public function getVaByName($nama)
    {
        return $this->query("SELECT no_va from bsps where nama like '%$nama%'");
    }
    
    public function getAllByName($nama)
    {
        return $this->query("SELECT * from bsps where nama like '%$nama%'");
    }


}