<?php 
    
    // defined('BASEPATH') OR exit('No direct script access allowed');
    
    
    class Login_old extends BaseController {

        private $_client;

        function __construct()
        {
            parent::__construct();		
            $this->load->model('m_login');

            $this->_client = new Client([
                'base_uri' => '118.97.30.43:9999/gw_vape/'
            ]);
            // $this->load->library('curl');
            
        }
        
        public function index()
        {
            // $this->load->view('header');
            // $this->load->view('loginPage/v_login');
            echo "hello world";
            // $this->load->view('footer');
            
        }

        function login_guzzle(){ 
            
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $data = [
                'usergw' => "psak73",
                'passgw' => "Psak73*",
                'userolibs' => $username,
                'passolibs' => $password,
                // 'userolibs' => "i1157",
                // 'passolibs' => "P@ssw0rd",
                'ipadd' => "10.10.21.13"
            ];
            
            // $client = new Client();
            $response = $this->_client->request('POST', 'login.php', [
                'json' => $data
            ]);

            $result = json_decode($response->getBody()->getContents(), true);
            print_r($result);
            // print_r($result['rCode']);
            var_dump($result) ;
            echo "asds";


            // $this->m_login->log_login($result['result'][]);


            // if($result['rCode'] == 00){

            //     $data_session = array(
            //         'nama' => $result['result']['USERMAP']['USERNM'],
            //         'cabang' => $result['result']['BRANCHMAP']['BRANCHNM'],
            //         'id_cabang' => $result['result']['BRANCHMAP']['BRANCHID'],
            //         // 'role' => $result['ROLESMAP']['USERNM'],
            //         'status' => "login"
            //         );
     
            //     $this->session->set_userdata($data_session);
            //     $this->session->set_flashdata("loginSucc", $result['message']);
     
            //     redirect(base_url("Admin"));
            //     // echo 'login berhasilga ya ';
            //     // print_r($data_session);
            // }else{

            //     $this->session->set_flashdata("failLogin", $result['message']);
            //     redirect(base_url("Login"));
            //     // echo 'login failed';
            //     // print_r($result['message']);
            //     // print_r($result['rCode']);
            // }
        }

        public function loginCurl()
        {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $url = 'http://118.97.30.43:9999/gw_vape/login.php';
            $ch = curl_init($url);

            //setup request to send json via POST
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

            // var_dump($response['rCode']);
            if($response['rCode'] == 00){

                $data_session = array(
                    'nama' => $response['result']['USERMAP']['USERNM'],
                    'cabang' => $response['result']['BRANCHMAP']['BRANCHNM'],
                    'id_cabang' => $response['result']['BRANCHMAP']['BRANCHID'],
                    // 'role' => $result['ROLESMAP']['USERNM'],
                    'status' => "login"
                    );
     
                $this->session->set_userdata($data_session);
                $this->session->set_flashdata("loginSucc", $response['message']);
     
                redirect(base_url("Admin"));
                // echo 'login berhasilga ya ';
                // print_r($data_session);
            }else{

                $this->session->set_flashdata("failLogin", $response['message']);
                redirect(base_url("Login"));
                // echo 'login failed';
                // print_r($result['message']);
                // print_r($result['rCode']);
            }
        }
        

        

        function login_curl_old(){
            
            $curl_handle = curl_init();
            curl_setopt($curl_handle, CURLOPT_URL, 'http://118.97.30.43:9999/gw_psak73/login.php');
            curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl_handle, CURLOPT_POST, 1);
            curl_setopt($curl_handle, CURLOPT_POSTFIELDS, array(
                'usergw' => "psak73",
                'passgw' => "Psak73*",
                'userolibs' => "i1157",
                'passolibs' => "P@ssw0rd",
                'ipadd' => "10.10.21.13"
            ));

            // Optional, delete this line if your API is open
            // curl_setopt($curl_handle, CURLOPT_USERPWD, $username . ':' . $password);
            
            $buffer = curl_exec($curl_handle);
            curl_close($curl_handle);
            
            $result = json_decode($buffer);

            // echo Curl;
        
            if(isset($result))
            {
                echo 'User has been updated.';
            }
            
            else
            {
                echo 'Something has gone wrong';
            }
        }

        function login_action(){
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $where = array(
                'username' => $username,
                'password' => $password
                );
            $cek = $this->m_login->login_check("user",$where)->num_rows();
            if($cek > 0){
     
                $data_session = array(
                    'nama' => $username,
                    'status' => "login"
                    );
     
                $this->session->set_userdata($data_session);
     
                redirect(base_url("Admin"));
     
            }else{
                $this->session->set_flashdata("Warning","Username atau Password tidak sesuai!");
                redirect(base_url("Login"));

            }
        }
     
        function logout(){
            $this->session->sess_destroy();
            redirect(base_url('Login'));
        }
    
    }
    
?>