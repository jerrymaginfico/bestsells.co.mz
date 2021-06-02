<?php

class Admin extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Admin/AdminModel','am');
	}

	function index(){
		if($this->session->userdata('admin_username') == "" && $this->session->userdata('admin_password') == ""){
			$this->load->view('Admin/index');
		}
		else{
			return redirect('Admin/Dashboard');		
		}
	}

	function Login(){
		$username = $this->input->post('admin_username');
		$password = $this->input->post('admin_password');
		$login = $this->am->Login($username,$password);

		if($login){
			$admin_session = ['admin_username' => $username,'admin_password' => $password];
			$this->session->set_userdata($admin_session);
			return redirect('Admin/Dashboard');
		}
		else {
			$this->session->set_flashdata('msg','Your Username e Password Do Not Match To Any Account');
			return redirect('Admin/index', 'refresh');
		}
	}

	function Dashboard(){
		if($this->session->userdata('admin_username') == "" && $this->session->userdata('admin_password') == ""){
			return redirect('Admin/index');
		}
		else{
			$admin_info = $this->am->getAdminData();
			$admin_id = $admin_info->admin_id;
			$result = $this->am->getAdminInfo($admin_id);
			$getVerified = $this->am->getVerifiedUsers();
			$getAll = $this->am->getAllUsers();
			$getSuspended = $this->am->getSuspendedUsers();
			$this->load->view('Admin/Dashboard',['admin'=>$result,'vusers'=>$getVerified,'ausers'=>$getAll,'susers'=>$getSuspended]);
		}
	}

	function InserirProduto(){
		if($this->session->userdata('admin_username')=="" && $this->session->userdata('admin_password')==""){
			return redirect('Admin/index');
		}
		else{
			$insert = $this->am->InserirProduto();
			if($insert){
				echo json_encode($result);
			}
		}
	}

	function GetAllProducts(){
		if($this->session->userdata('admin_username')=="" && $this->session->userdata('admin_password')==""){
			return redirect('Admin/index');
		}
		else{
			$output = '';
			$result = $this->am->GetAllProducts();
			if($result){
				$output .= '<select name="item_select" id="item_select" style="width:50%;height:35px;">';
				foreach($result as $prod){
					$output .= '<option value='.$prod->product_id.'>'.$prod->nome_produto.'</option>';
				}
				$output .= '</select>';
			}
		}
		echo $output;
	}

	function InserirMarcas(){
		if($this->session->userdata('admin_username')=="" && $this->session->userdata('admin_password')==""){
			return redirect('Admin/index');
		}
		else{
			$item = $this->input->post('item_select');
			$subcat = $this->input->post('marca');
			$result = $this->am->InserirMarcas($item,$subcat);
			if($result){
				echo json_encode($result);
			}
		}
	}

	function Logout(){
		$this->session->unset_userdata('admin_username');
		$this->session->unset_userdata('admin_password');
		return redirect('Admin/index');
	}

	function GetCarName(){
		$output = '';
		$result = $this->am->GetCarName();

		if($result){
			if(count($result)){
				$output .= '<select name="mobile_brand" id="mobile_brand" style="height:38px;width:50%; padding:5px;">';
				foreach($result as $brand){
					$output .= '<option>'.$brand->marca.'</option>';
				}
				$output .= '</select>';
			}
			else{
				$output .= '<select disabled></select>';
			}

		}
		echo $output;
	}

	function GetBrandName(){

		$output = '';
		$result = $this->am->GetBrandName();

		if($result){
			if(count($result)){
				$output .= '<select name="mobile_brand" id="mobile_brand" style="height:38px;width:50%; padding:5px;">';
				foreach($result as $brand){
					$output .= '<option>'.$brand->marca.'</option>';
				}
				$output .= '</select>';
			}
			else{
				$output .= '<select disabled></select>';
			}

		}
		echo $output;
	}

	function GetMotoName(){
		$output = '';
		$result = $this->am->GetMotoName();

		if($result){
			if(count($result)){
				$output .= '<select name="mobile_brand" id="mobile_brand" style="height:38px;width:50%; padding:5px;">';
				foreach($result as $brand){
					$output .= '<option>'.$brand->marca.'</option>';
				}
				$output .= '</select>';
			}
			else{
				$output .= '<select disabled></select>';
			}

		}
		echo $output;
	}

	function GetBicName(){
		$output = '';
		$result = $this->am->GetBicName();

		if($result){
			if(count($result)){
				$output .= '<select name="mobile_brand" id="mobile_brand" style="height:38px;width:50%; padding:5px;">';
				foreach($result as $brand){
					$output .= '<option>'.$brand->marca.'</option>';
				}
				$output .= '</select>';
			}
			else{
				$output .= '<select disabled></select>';
			}

		}
		echo $output;
	}

	function GetFreezeName(){
		$output = '';
		$result = $this->am->GetFreezeName();

		if($result){
			if(count($result)){
				$output .= '<select name="mobile_brand" id="mobile_brand" style="height:38px;width:50%; padding:5px;">';
				foreach($result as $brand){
					$output .= '<option>'.$brand->marca.'</option>';
				}
				$output .= '</select>';
			}
			else{
				$output .= '<select disabled></select>';
			}

		}
		echo $output;	
	}

	function GetTvName(){
		$output = '';
		$result = $this->am->GetTvName();

		if($result){
			if(count($result)){
				$output .= '<select name="mobile_brand" id="mobile_brand" style="height:38px;width:50%; padding:5px;">';
				foreach($result as $brand){
					$output .= '<option>'.$brand->marca.'</option>';
				}
				$output .= '</select>';
			}
			else{
				$output .= '<select disabled></select>';
			}

		}
		echo $output;
	}

	function GetCellName(){
		$output = '';
		$result = $this->am->GetCellName();

		if($result){
			if(count($result)){
				$output .= '<select name="mobile_brand" id="mobile_brand" style="height:38px;width:50%; padding:5px;">';
				foreach($result as $brand){
					$output .= '<option>'.$brand->marca.'</option>';
				}
				$output .= '</select>';
			}
			else{
				$output .= '<select disabled></select>';
			}

		}
		echo $output;
	}

	function GetComputerName(){
		$output = '';
		$result = $this->am->GetComputerName();

		if($result){
			if(count($result)){
				$output .= '<select name="mobile_brand" id="mobile_brand" style="height:38px;width:50%; padding:5px;">';
				foreach($result as $brand){
					$output .= '<option>'.$brand->marca.'</option>';
				}
				$output .= '</select>';
			}
			else{
				$output .= '<select disabled></select>';
			}

		}
		echo $output;
	}

	function GetPrinterName(){
		$output = '';
		$result = $this->am->GetPrinterName();

		if($result){
			if(count($result)){
				$output .= '<select name="mobile_brand" id="mobile_brand" style="height:38px;width:50%; padding:5px;">';
				foreach($result as $brand){
					$output .= '<option>'.$brand->marca.'</option>';
				}
				$output .= '</select>';
			}
			else{
				$output .= '<select disabled></select>';
			}

		}
		echo $output;
	}
}

?>