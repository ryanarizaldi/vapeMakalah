<?php

namespace App\Controllers;
use App\Models\M_instansi;
use App\Models\M_inst_param;
use App\Models\M_Bsps;
use App\Models\M_history;


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
        return view('adminLayout/v_laporan_normatif');
    }

    public function laporanNormatifInst()
    {
        // $instansi = new M_instansi();
        // $data = $instansi->getInstansi();
        // dd($data->getResultArray());

        // $db = \Config\Database::connect();
        // $data = $db->query("SELECT * FROM instansi")->getResultArray();

        $inst = new M_instansi();
        $data = $inst->getInstansi();


        $arr = [
            'res' => $data
        ];

        return view('adminLayout/v_laporan_normatif_inst', $arr);
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
            return redirect()->route('admin/laporan_normatif_inst');
        }else{
            session()->setFlashData('errAddInst', 'Data Instansi gagal Ditambahkan!');
            return view('/adminLayout/v_tambah_instansi');
        }
    }

    public function cariInstansi()
    {
        return view ('adminLayout/v_cari_instansi');
    }

    public function cariInstById()
    {
        $kd_instansi = $this->request->getPost('kd_instansi');
        $inst = new M_instansi();
        $res = $inst->getById($kd_instansi);

        $data = [
            'res' => $res,
            'show' => true
        ];

        return view ('adminLayout/v_cari_instansi', $data);


    }

    public function cariInstByName()
    {
        $nama = $this->request->getPost('nama');
        $inst = new M_instansi();
        $res = $inst->getByName($nama);

        $data = [
            'res' => $res,
            'show' => true
        ];

        return view ('adminLayout/v_cari_instansi', $data);
    }

    public function detailInstansi($kd_instansi)
    {
        $inst = new M_instansi();
        $data['res'] = $inst->getById($kd_instansi);
        return view ('adminLayout/v_detail_inst', $data);
    }

    public function exportPdf()
    {
        $inst = new M_instansi();
        $data = $inst->findAll();

        dd($data);
    }

    public function pilihLaporan()
    {
        $laporan = $this->request->getPost('laporan');
        $inst = new M_instansi();
        $bsps = new M_bsps();
        $show = false;
        if (empty($laporan)) {
            $data = $inst->getInstansi();


            $arr = [
                'res' => $data
            ];

        return view('adminLayout/v_laporan_normatif', $arr);
        }

        

        if($laporan == 'inst'){
            $res = $inst->getInstansi();

            $data = [
                'res' => $res,
                'jenis' => 'inst',
                'show' => $show
            ];

            return view('adminLayout/v_laporan_normatif', $data);
            
        }else if($laporan == 'bsps'){
            $res = $bsps->getBsps();

            $data = [
                'res' => $res,
                'jenis' => 'bsps',
                'show' => $show
            ];
            return view('adminLayout/v_laporan_normatif', $data);

        }

    }

    public function historyVa()
    {
        return view('adminLayout/v_history_va');
    }

    public function rekeningKoran()
    {
        $tgl_awal = $this->request->getPost('tgl_awal');
        $tgl_akhir = $this->request->getPost('tgl_akhir');
        $no_va = $this->request->getPost('no_va');

        // dd($tgl_akhir, $tgl_akhir);

        $history = new M_history();
        $bsps = new M_bsps();
        $name = $bsps->getName($no_va)->getResult();
        // dd($name);
        $sql = $history->getRekeningKoran($tgl_awal, $tgl_akhir, $no_va)->getResult();
        
        $data = [
            'sql' => $sql,
            'tgl_awal' => $tgl_awal,
            'tgl_akhir' => $tgl_akhir,
            'no_va' => $no_va,
            'name' => $name
        ];

        return view('adminLayout/v_history_va', $data);
        
    }

    public function printVa($tgl_awal, $tgl_akhir, $no_va)
    {
        $history = new M_history();
        $bsps = new M_bsps();
        $name = $bsps->getName($no_va)->getResult();
        $sql = $history->getRekeningKoran($tgl_awal, $tgl_akhir, $no_va)->getResult();
        
        $data = [
            'sql' => $sql,
            'no_va' => $no_va,
            'name' => $name
        ];

        return view('adminLayout/v_print_history_va', $data);
    }
    
}
