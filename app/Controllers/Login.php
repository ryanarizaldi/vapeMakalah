<?php

namespace App\Controllers;

class Login extends BaseController
{
	// public function index()
	// {
	// 	return view('v_login');
        
	// }
    public function __construct()
    {
        helper('url');
    }
    
    public function index()
    {
        echo view('loginPage/v_login');
        // echo "asd";
    }

    public function actionLogin()
    {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            // $password = $this->input->post('password');
            $url = 'http://118.97.30.43:9999/gw_vape/login.php';
            $ch = curl_init($url);

             $data = array(
                'usergw' => "vape",
                'passgw' => "vape123*",
                'userolibs' => $username,
                'passolibs' => $password,
                'ipadd' => "10.10.21.13"
            );


            $payload = json_encode($data);

            //attach encoded JSON string to the POST fields
            curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

            //set the content type to application/json
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

            //return response instead of outputting
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            //execute the POST request
            $result = curl_exec($ch);

            //close cURL resource
            // $data = json_decode($result->getBody()->getContents(), true);
            
            $info = curl_getinfo($ch);
            
            // $response = [
            //     'headers' => substr($result, 0, $info["header_size"]),
            //     'body' => substr($result, $info["header_size"]),
            // ];

            $response = json_decode($result, true);

            curl_close($ch);

             if($response['rCode'] == 00){

                session()->set([
                    'nama' => $response['result']['USERMAP']['USERNM'],
                    'cabang' => $response['result']['BRANCHMAP']['BRANCHNM'],
                    'id_cabang' => $response['result']['BRANCHMAP']['BRANCHID']
                ]);
                return redirect()->to(base_url('Admin'));
            }else{

                // $this->session->set_flashdata("failLogin", $response['message']);
                // redirect(base_url("Login"));
                session()->setFlashdata('error', $response['message'].'. Error Code: '.$response['rCode']);
                return redirect()->route('/');
                // print_r($result['message']);
                // print_r($result['rCode']);
            }

            
        }
        
        public function logout()
        {
            session()->destroy();
            return redirect()->to('/');
        }
}
