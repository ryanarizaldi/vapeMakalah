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
}