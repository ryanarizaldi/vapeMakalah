<?php

namespace App\Controllers;
use App\Models\M_instansi;
use App\Models\M_inst_param;


class Admin extends BaseController
{
	// public function index()
	// {
	// 	return view('v_login');
        
	// }
    
    public function index()
    {
        // echo view('template');
        // $test = new M_instansi();
        // echo $test->test();
        
        echo view('adminLayout/v_home');
        // echo "asd";
    }

    public function tambahInstansi()
    {
        return view('adminLayout/v_tambah_instansi');
    }

    public function laporanNormatif()
    {
        // $instansi = new M_instansi();
        // $data = $instansi->getInstansi();
        // dd($data->getResultArray());

        // $db = \Config\Database::connect();
        // $data = $db->query("SELECT * FROM instansi")->getResultArray();

        $inst = new M_instansi();
        $data = $inst->getInstansi();


        $arr = [
            'data' => $data
        ];

        return view('adminLayout/v_laporan_normatif', $arr);
    }

    public function upload()
    {
        return view('adminLayout/v_upload');
    }

    public function uploadTheXls()
    {
        $file = $this->request->getFile('fileXls');
        $data = array(
            'fileXls' => $file
        );

        // dd($data['fileXls']);

        $extension = $file->getClientExtension();

        if('xls' == $extension){
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        } else {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }

        $spreadsheet = $reader->load($file);
        $arrData = $spreadsheet->getActiveSheet()->toArray();
        $db = \Config\Database::connect();

        foreach($arrData as $idx => $row){
             
            // lewati baris ke 0 pada file excel
            // dalam kasus ini, array ke 0 adalahpara title
            if($idx == 0) {
                continue;
            }
            $kd_instansi     = $row[0];
            $no_identitas = $row[1];
            $nama = $row[2];
            $nominal = $row[3];
            $kd_va = "0$kd_instansi$no_identitas";
 
            $sql = [
                "kd_instansi"   => $kd_instansi,
                "no_identitas"  => $no_identitas,
                "nama"          => $nama,
                "kd_va"          => $kd_va,
                "nominal"       => $nominal
            ];

            $db->table('va2')->insert($sql);
 
        }

        return view('adminlayout/v_home');
        // return view('adminLayout/v_upload');
    }

    public function cariRekening()
    {
        $norek = $this->request->getPost('norek');

        $url = 'http://118.97.30.43:9999/gw_vape/info_rekening.php';
            $ch = curl_init($url);

            //setup request to send json via POST
            $data = array(
                'usergw' => "vape",
                "passgw" => "vape123*",
                'norek' => $norek
            );

            $payload = json_encode($data);

            //attach encoded JSON string to the POST fields
            curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

            //set the content type to application/json
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

            //return response instead of outputting
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            //execute the POST request
            $response = curl_exec($ch);

            //close cURL resource
            // $data = json_decode($result->getBody()->getContents(), true);
            
            $info = curl_getinfo($ch);
            
            // $response = [
            //     'headers' => substr($result, 0, $info["header_size"]),
            //     'body' => substr($result, $info["header_size"]),
            // ];

            $result = json_decode($response, true);


            curl_close($ch);
// dd($result);
            if ($result['rCode'] == 00) {
               session()->setFlashData('succCari', 'Rekening atas nama: '.$result['result']['FULLNM'].'. Ditemukan');
               $show = true;
            } else {
                session()->setFlashData('errCari', 'Terjadi Kesalaahan. '.$result['message']);
                $show = false;
            }
            $data = [
                'result' => $result,
                'show' => $show,
                'norek' => $norek
            ];
            // dd($data);
            

            return view('/adminlayout/v_tambah_instansi', $data);
            
    }

    public function aksi_tambah_inst()
    {
        $inst = new M_instansi();
        $prm = new M_inst_param();
        $data = $inst->getLastKd();
        $lastKd = $data->kd_instansi;
        $lastKd++;
        $newCode = sprintf("%04s", $lastKd);

        $nama = $this->request->getPost('nama');
        $norek = $this->request->getPost('norek');
        $field = $this->request->getPost('field[]');

        // dd($field);

        $inputs = [
            'kd_instansi' => $newCode,
            'nama' => $nama,
            'norek' => $norek
        ];
        for ($i=0; $i < count($field)-1 ; $i++) {
                
                $inputParam = array(
                    'kd_instansi' => $newCode,
                    'id_kolom' => $i+1,
                    'nama_kolom' => $field[$i],
                );
                $prm->addInstParam($inputParam);
            }
        
        $inst->tambah_inst($inputs);

        if(!empty($inst)){
            session()->setFlashData('succAddInst', 'Data Instansi berhasil Ditambahkan!');
            return redirect()->route('admin/laporan_normatif');
        }else{
            session()->setFlashData('errAddInst', 'Data Instansi gagal Ditambahkan!');
            return view('/adminLayout/v_tambah_instansi');
        }


    }

    public function cariInstansi()
    {
        return view ('adminLayout/v_cari_instansi');
    }
}
