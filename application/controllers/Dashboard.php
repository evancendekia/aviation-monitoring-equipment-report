<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index(){
        if($this->session->userdata('IsLoggedIn') == TRUE){
            $data['menu'] = 'dashboard';
            $data['folder'] = $data['page'] = 'dashboard';
            $data['js'] = 'js_dashboard';
            $this->load->view('layout/layout',$data);
        }else{
            redirect('login');
        }
	}
}
