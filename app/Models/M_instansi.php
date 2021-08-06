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

    public function getById($kd_instansi)
    {
        // $mres = $this->query('SELECT *WHERE kd_instansi = 0001');
        $data = $this->table('instansi')->like('kd_instansi', $kd_instansi)->findAll();
        return $data;
        // $asd = $this->findAll();
    }

    public function getByName($nama)
    {
        $res = $this->table('instansi')->like('nama', $nama)->findAll();
        return $res;
    }
}