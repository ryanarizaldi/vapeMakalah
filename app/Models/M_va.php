<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class M_va extends Model
{
    protected $table = 'va2';
    // protected $skipValidation = true;
    // protected $allowedFields = ['kd_instansi','id_kolom','nama_kolom'];

    public function getByKdInst($kd_inst)
    {
        return $this->query("SELECT * from va2 where kd_instansi = '$kd_inst' ");
    }
    
    public function getByKdVa($kd_va)
    {
        return $this->query("SELECT * from va2 where kd_va = '$kd_va' ");
    }

    public function getByName($name)
    {
        return $this->query("SELECT * from va2 where nama like '%$name%' ");
    }

    public function getNameByVa($kd_va)
    {
        return $this->query("SELECT nama from va2 where kd_va = '$kd_va' ");
    }
}

