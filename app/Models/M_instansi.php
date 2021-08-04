<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class M_instansi extends Model
{
    protected $table = 'instansi';
    protected $primaryKey = 'kd_instansi';
    protected $allowedFields = ['kd_instansi','nama','status','norek'];
    // protected $returnType     = 'object';

    public function test()
    {
        $res = $this->findAll();
        dd($res);
    }
 
    public function getInstansi()
    {
        $result = $this->findAll();
        return $result;

        // dd($result);
    }

    public function getlastKd()
    {
        $last = $this->query('SELECT * FROM instansi')->getLastRow();
        return $last;
    }

    public function tambah_inst($data)
    {
        return $this->insert($data);
    }

    

 
}