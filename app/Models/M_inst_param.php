<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class M_inst_param extends Model
{
    protected $table = 'instansi_param';
    protected $skipValidation = true;
    protected $allowedFields = ['kd_instansi','id_kolom','nama_kolom'];

    public function addInstParam($data)
    {
        return $this->insert($data);
    }
}