<?php

/**
 * 
 */
class Vendedor extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Vendedor/Vendedor_Model','vm');
		$this->load->helper(array('email'));
	}

	function index(){
		if($this->session->userdata('email') == "" && $this->session->userdata('password') == ""){
			$this->load->view('Vendedor/index');
		}
		else{
			return redirect('Vendedor/Dashboard');
		}
	}

	function sign_up(){
		$this->load->view('Vendedor/sign_up');
	}

	function CriarConta(){

		$result = $this->vm->CriarConta();
		$vend_email = $this->input->post('email_user');
		$vend_password = $this->input->post('password_user');

		/* Mandar o Email de Parabens, contendo Dados de Login */

		if($result){
			return redirect('Vendedor/index');
		/*$this->load->library('email');
			$this->email->set_newline("\r\n");
			$this->email->from("jeremyellmagnifico@gmail.com", 'Best$ells');
			$this->email->subject("Assunto do e-mail");
			$this->email->to($vend_email); 
			$this->email->message("Aqui vai a mensagem ao seu destinatário");
			if($this->email->send()){
				
			}
			else{
				show_error($this->email->print_debugger());
			}*/
						
		}
		else{
			return redirect('Vendedor/sign_up');
		}
	}

	function Login(){
		$vemail = $this->input->post('email_login');
		$vpassword = $this->input->post('password_login');

		$result = $this->vm->Login();
		if($result){
			$session_data = ['email' => $vemail, 'password' => $vpassword];
			$this->session->set_userdata($session_data);
			return redirect('Vendedor/Dashboard');
		}
		else{
			$this->session->set_flashdata('msg','Your Username e Password Do Not Match To Any Account');
			return redirect('Vendedor/index');
		}
	}

	function Logout(){
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('password');
		return redirect('Vendedor/index');
	}

	function Dashboard(){
		if($this->session->userdata('email') == "" && $this->session->userdata('password') == ""){
			return redirect('Vendedor/index');
		}
		else{
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->get_user_info($vend_id);
			$this->load->view('Vendedor/Dashboard',['result'=>$result]);
		}
		
	}

	function Adicionar(){
		if($this->session->userdata('email') == "" && $this->session->userdata('password') == ""){
			return redirect('Vendedor/index');
		}
		else{
			$result = $this->vm->CheckInfo();
			if($result){
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->get_user_info($vend_id);
			$this->load->view('Vendedor/UserInfo',['result'=>$result]);
			}
			else{
				$this->load->view('Vendedor/Adicionar_Produtos');
			}
		}
	}

	function InserirDados(){
		if($this->session->userdata('email') == "" && $this->session->userdata('password') == ""){
			return redirect('Vendedor/index');
		}
		else{
			$call = $this->vm->InserirDados();
			if($call){
				return redirect('Vendedor/Dashboard');
			}
			else{
				$this->load->view('Vendedor/UserInfo');
			}
		}
	}

	function GetAllCategories(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$output = '';
			$result = $this->vm->GetAllCategories();
			if($result){
				$output .= '<select name="item_select" id="item_select" style="width:50%;height:35px;">';
				foreach($result as $cat){
					$output .= '<option value='.$cat->cat_id.'>'.$cat->nome_categoria.'</option>';
				}
				$output .= '</select>';
			}
		}
		echo $output;
	}

	function Carros_Particulares(){
		if($this->session->userdata('email') == "" && $this->session->userdata('password') == ""){
			return redirect('Vendedor/index');
		}else{
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->get_user_info($vend_id);
			$this->load->view('Vendedor/Adicionar/Particulares',['result'=>$result]);
		}
	}

	function Carros_Coletivos(){
		if($this->session->userdata('email') == "" && $this->session->userdata('password') == ""){
			return redirect('Vendedor/index');
		}
		else{

			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->get_user_info($vend_id);
			$this->load->view('Vendedor/Adicionar/Coletivos',['result'=>$result]);
		}
	}


	function InsertPersonalCars(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$output = '';
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->InsertPersonalCars($vend_id);
			if($result){
				$output .= $result;
			}
			else{
				return false;
			}
			echo $output;
		}
	}

	function InsertProductImages(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$result = $this->vm->InsertProductImages();
			/*$output = '';
			if($result){
				$output .= '
				<div class="row">
							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;margin-left: 10px;">
							<img src="'.base_url()."CarrsImages/".$result->image_one.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."CarrsImages/".$result->image_two.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."CarrsImages/".$result->image_three.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."CarrsImages/".$result->image_four.'" class="responsive-img" style="margin-top:20px;">
							</div>
							
				</div>';
                 
			}
			else{
				$output .= 'Erro Mostrando Imagens.';
			}
			echo $output;*/
		}
	}

	//Coletive Section Start

	function InsertColetiveCars(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$output = '';
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->InsertColetiveCars($vend_id);
			if($result){
				$output .= $result;
			}
			else{
				return false;
			}
			echo $output;
		}
	}

	function InsertColectiveImages(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$result = $this->vm->InsertColectiveImages();
			/*$output = '';
			if($result){
				$output .= '
				<div class="row">
							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;margin-left: 10px;">
							<img src="'.base_url()."CarrsImages/".$result->image_one.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."CarrsImages/".$result->image_two.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."CarrsImages/".$result->image_three.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."CarrsImages/".$result->image_four.'" class="responsive-img" style="margin-top:20px;">
							</div>
							
				</div>';
                 
			}
			else{
				$output .= 'Erro Mostrando Imagens.';
			}
			echo $output;*/
			}	
	}

	//Pesados Sections Start

	function Carros_Pesados(){
		if($this->session->userdata('email') == "" && $this->session->userdata('password') == ""){
			return redirect('Vendedor/index');
		}
		else{
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->get_user_info($vend_id);
			$this->load->view('Vendedor/Adicionar/Pesados',['result'=>$result]);
		}
	}

	function InsertCargoCars(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$output = '';
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->InsertCargoCars($vend_id);
			if($result){
				$output .= $result;
			}
			else{
				return false;
			}
			echo $output;
		}
	}

	function InsertCargoImages(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$result = $this->vm->InsertCargoImages();
				/*$output = '';
			if($result){
				$output .= '
				<div class="row">
							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;margin-left: 10px;">
							<img src="'.base_url()."CarrsImages/".$result->image_one.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."CarrsImages/".$result->image_two.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."CarrsImages/".$result->image_three.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."CarrsImages/".$result->image_four.'" class="responsive-img" style="margin-top:20px;">
							</div>
							
				</div>';
                 
			}
			else{
				$output .= 'Erro Mostrando Imagens.';
			}
			echo $output;*/
			}
	}

	//Motos & Triciclos Section Start
	function Motos(){
		if($this->session->userdata('email') == "" && $this->session->userdata('password') == ""){
			return redirect('Vendedor/index');
		}
		else{
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->get_user_info($vend_id);
			$this->load->view('Vendedor/Adicionar/Motos',['result'=>$result]);
		}
	}

	function InsertMotos(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$output = '';
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->InsertMotos($vend_id);
			if($result){
				$output .= $result;
			}
			else{
				return false;
			}
			echo $output;
		}
	}

	function InsertMotoImages(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$result = $this->vm->InsertMotoImages();
				/*$output = '';
			if($result){
				$output .= '
				<div class="row">
							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;margin-left: 10px;">
							<img src="'.base_url()."CarrsImages/".$result->image_one.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."CarrsImages/".$result->image_two.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."CarrsImages/".$result->image_three.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."CarrsImages/".$result->image_four.'" class="responsive-img" style="margin-top:20px;">
							</div>
							
				</div>';
                 
			}
			else{
				$output .= 'Erro Mostrando Imagens.';
			}
			echo $output;*/
			}
	}

	//Bicicles Section Start

	function Bics(){
		if($this->session->userdata('email') == "" && $this->session->userdata('password') == ""){
			return redirect('Vendedor/index');
		}
		else{
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->get_user_info($vend_id);
			$this->load->view('Vendedor/Adicionar/Bicicletas',['result'=>$result]);
		}	
	}

	function InsertBics(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$output = '';
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->InsertBics($vend_id);
			if($result){
				$output .= $result;
			}
			else{
				return false;
			}
			echo $output;
		}
	}

	function InsertBicImages(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$result = $this->vm->InsertBicImages();
				/*$output = '';
			if($result){
				$output .= '
				<div class="row">
							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;margin-left: 10px;">
							<img src="'.base_url()."CarrsImages/".$result->image_one.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."CarrsImages/".$result->image_two.'" class="responsive-img" style="margin-top:20px;">
							</div>
							
				</div>';
                 
			}
			else{
				$output .= 'Erro Mostrando Imagens.';
			}
			echo $output;*/
			}
	}

	//Cars & Veicules Acessories Section Start

	function Accessories(){
		if($this->session->userdata('email') == "" && $this->session->userdata('password') == ""){
			return redirect('Vendedor/index');
		}
		else{
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->get_user_info($vend_id);
			$this->load->view('Vendedor/Adicionar/carsAcessories',['result'=>$result]);
		}
	}

	function InsertAcc(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$output = '';
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->InsertAcc($vend_id);
			if($result){
				$output .= $result;
			}
			else{
				return false;
			}
			echo $output;
		}
	}

	function InsertAccImages(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$result = $this->vm->InsertAccImages();
				/*$output = '';
			if($result){
				$output .= '
				<div class="row">
							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;margin-left: 10px;">
							<img src="'.base_url()."CarrsImages/".$result->image_one.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."CarrsImages/".$result->image_two.'" class="responsive-img" style="margin-top:20px;">
							</div>
							
				</div>';
                 
			}
			else{
				$output .= 'Erro Mostrando Imagens.';
			}
			echo $output;*/
			}
	}

	function Editar_Perfil($vend_id){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->get_user_info($vend_id);
			$this->load->view('Vendedor/Editar_Perfil',['result'=>$result]);
		}
	}

	function update_vendedor($vend_id){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$call = $this->vm->update_vendedor($vend_id);
			if($call){
				echo "Dados Actualizados Com Sucesso!";
				redirect('Vendedor/Dashboard');
			}
			else{
				echo "Erro Actualizando Dados!";
				redirect('Vendedor/Editar_Perfil');
			}
		}
	}

	function update_login_details($vend_id){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$result = $this->vm->update_login_details($vend_id);
			if($result){
				echo "Dados De Login Com Sucesso!";
				$vend_data = $this->vm->GetVendData();
				$vend_id = $vend_data->vend_id;
				$result = $this->vm->get_user_info($vend_id);
				redirect('Vendedor/Dashboard',['result'=>$result]);
			}
			else{
				echo "Erro Actualizando Dados De Login!";
				redirect('Vendedor/Editar_Perfil');
			}
		}
	}

	function Listar_Produtos(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->get_user_info($vend_id);
			$listing_type = $this->input->post('listing_type');
			if($listing_type == 'carros particulares'){
				$call = $this->vm->Listar($listing_type,$vend_id);
				if($call){
					$online = $this->vm->getOnlineParticular($vend_id);
					$sold = $this->vm->getSoldParticular($vend_id);
					$suspended = $this->vm->getSuspended($vend_id);
					$this->load->view('Vendedor/Listar_Produtos',['car'=>$call,'result'=>$result,'sold'=>$sold,'online'=>$online,'suspended'=>$suspended]);
				}
				else{
					return $this->load->view('Vendedor/Error',['result'=>$result]);
				}
			}
			elseif($listing_type == 'geleiras & congeladores'){
				$call = $this->vm->Listar($listing_type,$vend_id);
				if($call){
					$online = $this->vm->getOnlineFreeze($vend_id);
					$sold = $this->vm->getSoldFreeze($vend_id);
					$suspended = $this->vm->getsuspendedFreeze($vend_id);
					$this->load->view('Vendedor/Listar_Freezers',['freeze'=>$call,'result'=>$result,'sold'=>$sold,'online'=>$online,'suspended'=>$suspended]);
				}
				else{
					return $this->load->view('Vendedor/Error',['result'=>$result]);
				}
			}
			elseif($listing_type == 'celulares'){
				$call = $this->vm->Listar($listing_type,$vend_id);
				if($call){
					$online = $this->vm->getOnlineMobile($vend_id);
					$sold = $this->vm->getSoldMobile($vend_id);
					$suspended = $this->vm->getsuspendedMobile($vend_id);
					$this->load->view('Vendedor/Listar_Celulares',['cell'=>$call,'result'=>$result,'sold'=>$sold,'online'=>$online,'suspended'=>$suspended]);
				}
				else{
					return $this->load->view('Vendedor/Error',['result'=>$result]);
				}
			}
			elseif($listing_type == 'laptops'){
				$call = $this->vm->Listar($listing_type,$vend_id);
				if($call){
					$online = $this->vm->getOnlineLap($vend_id);
					$sold = $this->vm->getSoldLap($vend_id);
					$suspended = $this->vm->getSuspendedLap($vend_id);
					$this->load->view('Vendedor/Listar_Laptops',['laptop'=>$call,'result'=>$result,'sold'=>$sold,'online'=>$online,'suspended'=>$suspended]);
				}
				else{
					return $this->load->view('Vendedor/Error',['result'=>$result]);
				}
			}
			elseif($listing_type == 'camisas masculinas'){
				$call = $this->vm->Listar($listing_type,$vend_id);

				if($call){
					$online = $this->vm->getMonlineShirt($vend_id);
					$sold = $this->vm->getMsoldShirt($vend_id);
					$suspended = $this->vm->getMsuspended($vend_id);
					$this->load->view('Vendedor/Listar_CamisetesMasculinas',['shirt'=>$call,'result'=>$result,'sold'=>$sold,'online'=>$online,'suspended'=>$suspended]);
				}
				else{
					return $this->load->view('Vendedor/Error',['result'=>$result]);
				}
			}
			elseif($listing_type == 'camisas femeninas'){
				$call = $this->vm->Listar($listing_type,$vend_id);

				if($call){
					$online = $this->vm->getOnlineWshirt($vend_id);
					$suspended = $this->vm->getSuspendedWshirt($vend_id);
					$sold = $this->vm->getSoldWshirt($vend_id);
					$this->load->view('Vendedor/Listar_Blusas',['blusa'=>$call,'result'=>$result,'online'=>$online,'suspended'=>$suspended,'sold'=>$sold]);
				}
				else
					return $this->load->view('Vendedor/Error',['result'=>$result]);
			}
			else{
				return $this->load->view('Vendedor/Error',['result'=>$result]);
				}
			
			
		}
	}

	//Freeze Edit Section Start

	function Editar_Freeze($freeze_id){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->get_user_info($vend_id);
			$call = $this->vm->Editar_Freeze($freeze_id);
			$brands = $this->vm->GetFreezeName();
			$this->load->view('Vendedor/Editar_Freeze',['result'=>$result,'freeze'=>$call,'brand'=>$brands]);
		}
	}

	function Update_Freeze($freeze_id){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$result = $this->vm->Update_Freeze($freeze_id);
			if($result){
			echo"<script>alert('Dados Actualizados Com Sucesso.')</script>";
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->get_user_info($vend_id);
			$call = $this->vm->Editar_Freeze($freeze_id);
			$brands = $this->vm->GetFreezeName();
			$this->load->view('Vendedor/Editar_Freeze',['result'=>$result,'freeze'=>$call,'brand'=>$brands]);
			}
			else{
				echo"Erro Actualizando Dados!";
			}	
		}
	}

	function Update_freeze_images($freeze_id){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->get_user_info($vend_id);
			$call = $this->vm->Editar_Freeze($freeze_id);
			$this->load->view('Vendedor/Update_Freeze_Images',['result'=>$result,'freeze'=>$call]);
		}
	}

	function freeze_image_update($freeze_id){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$config = [
				'upload_path' => './DomesticImages',
				'allowed_types' => 'jpg|jpeg|png|gif'
			];

			$this->load->library('upload',$config);

			$this->upload->do_upload('image');
			$img = $this->upload->data('file_name');
			$img_pos = $this->input->post('image_position');

			$call = $this->vm->freeze_image_update($img,$img_pos,$freeze_id);

			if($call){
				$this->session->set_flashdata('msg','Imagem Actualizada Com Sucesso');
				return redirect('Vendedor/Update_freeze_images/'.$freeze_id);
			}
			else{
				echo "Erro Actualizando Imagem.";
			}
		}
	}

	function Change_Freeze_Status($freeze_id){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->get_user_info($vend_id);
			$call = $this->vm->Editar_Freeze($freeze_id);
			$brands = $this->vm->GetFreezeName();
			 $this->load->view('Vendedor/Change_Freeze_Status',['result'=>$result,'freeze'=>$call,'brand'=>$brands]);
		}
	}

	function set_freeze_status($freeze_id){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$set = $this->vm->set_freeze_status($freeze_id);
			
			if($set){
				echo"<script>alert('Estado Alterado Com Sucesso.')</script>";
				$vend_data = $this->vm->GetVendData();
				$vend_id = $vend_data->vend_id;
				$result = $this->vm->get_user_info($vend_id);
				return $this->load->view('Vendedor/Listar_Freezers',['result'=>$result]);
			}
			else{
				echo"<script>alert('Erro Actualizando Estado.')</script>";
			}
		}
	}

	function Eliminar_Freeze($freeze_id){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->get_user_info($vend_id);
			$call = $this->vm->Editar_Freeze($freeze_id);
			$brands = $this->vm->GetFreezeName();
			 $this->load->view('Vendedor/Eliminar_Freeze',['result'=>$result,'freeze'=>$call,'brand'=>$brands]);
		}	
	}

	function remove_freeze($freeze_id){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$del = $this->vm->remove_freeze($freeze_id);
			if($del){
				echo"<script>alert('Produto Removido Com Scuesso.')</script>";
				$vend_data = $this->vm->GetVendData();
				$vend_id = $vend_data->vend_id;
				$result = $this->vm->get_user_info($vend_id);
				return $this->load->view('Vendedor/Listar_Freezers',['result'=>$result]);
			}
			else{
				echo"<script>alert('Erro Removendo Produto.')</script>";
			}
		}
	}

	//Freeze Edit Section End

	//Edit Product

	function Editar_Produto($part_id){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->get_user_info($vend_id);
			$call = $this->vm->Editar_Produto($part_id);
			$brands = $this->vm->GetBrandName();
			$this->load->view('Vendedor/Editar_Produto',['result'=>$result,'cars'=>$call,'brand'=>$brands]);
		}
	}

	function Update_Produto($part_id){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$result = $this->vm->Update_Produto($part_id);
			if($result){
				echo"<script>alert('Dados Actualizados Com Sucesso.')</script>";
				$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->get_user_info($vend_id);
			$call = $this->vm->Editar_Produto($part_id);
			$brands = $this->vm->GetBrandName();
			$this->load->view('Vendedor/Editar_Produto',['result'=>$result,'cars'=>$call,'brand'=>$brands]);
			}
			else{
				echo"Erro Actualizando Dados!";
			}
		}
	}

	function Update_product_images($part_id){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->get_user_info($vend_id);
			$call = $this->vm->Editar_Produto($part_id);
			$this->load->view('Vendedor/Update_car_image',['result'=>$result,'cars'=>$call]);
		}
	}

	function car_image_update($part_id){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$config = [
				'upload_path' => './CarrsImages',
				'allowed_types' => 'jpg|jpeg|png|gif'
			];

			$this->load->library('upload',$config);

			$this->upload->do_upload('image');
			$img = $this->upload->data('file_name');
			$img_pos = $this->input->post('image_position');

			$call = $this->vm->car_image_update($img,$img_pos,$part_id);

			if($call){
				$this->session->set_flashdata('msg','Imagem Actualizada Com Sucesso');
				return redirect('Vendedor/Update_product_images/'.$part_id);
			}
			else{
				echo "Erro Actualizando Imagem.";
			}
		}
	}

	function Eliminar($part_id){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->get_user_info($vend_id);
			$call = $this->vm->Editar_Produto($part_id);
			$brands = $this->vm->GetBrandName();
			 $this->load->view('Vendedor/Eliminar_produto',['result'=>$result,'cars'=>$call,'brand'=>$brands]);
		}
	}

	function remove_product($part_id){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$del = $this->vm->remove_product($part_id);
			if($del){
				echo"<script>alert('Carro Removido Com Scuesso.')</script>";
				$vend_data = $this->vm->GetVendData();
				$vend_id = $vend_data->vend_id;
				$result = $this->vm->get_user_info($vend_id);
				return $this->load->view('Vendedor/Listar_Particulares',['result'=>$result]);
			}
			else{
				echo"<script>alert('Erro Removendo Carro.')</script>";
			}
		}
	}

	function Change_Status($part_id){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->get_user_info($vend_id);
			$call = $this->vm->Editar_Produto($part_id);
			$brands = $this->vm->GetBrandName();
			 $this->load->view('Vendedor/Change_status',['result'=>$result,'cars'=>$call,'brand'=>$brands]);
	}
	}

	function set_status($part_id){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$set = $this->vm->set_status($part_id);
			
			if($set){
				echo"<script>alert('Estado Alterado Com Sucesso.')</script>";
				$vend_data = $this->vm->GetVendData();
				$vend_id = $vend_data->vend_id;
				$result = $this->vm->get_user_info($vend_id);
				return $this->load->view('Vendedor/
					Listar_Produtos',['result'=>$result]);
			}
			else{
				echo"<script>alert('Erro Actualizando Estado.')</script>";
			}
		}
	}

	// Categoria Eletrodomesticos
	/* Geleiras & Congeladores Section Start */

	function Geleiras_Congeladores(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->get_user_info($vend_id);
			$this->load->view('Vendedor/Adicionar/Geleiras_Congeladores',['result'=>$result]);
		}
	}

	function InsertFreeze(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$output = '';
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->InsertFreeze($vend_id);
			if($result){
				$output .= $result;
			}
			else{
				return false;
			}
			echo $output;
		}
	}

	function InsertGelImages(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$result = $this->vm->InsertGelImages();
				/*$output = '';
			if($result){
				$output .= '
				<div class="row">
							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;margin-left: 10px;">
							<img src="'.base_url()."DomesticImages/".$result->image_one.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."DomesticImages/".$result->image_two.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."DomesticImages/".$result->image_three.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."DomesticImages/".$result->image_four.'" class="responsive-img" style="margin-top:20px;">
							</div>
							
				</div>';
                 
			}
			else{
				$output .= 'Erro Mostrando Imagens.';
			}
			echo $output;*/
			}
	}

	/* Geleiras & Congeladores Section End */

	/* Fogoes Section Start */

	function Fogoes(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->get_user_info($vend_id);
			$this->load->view('Vendedor/Adicionar/Fogoes',['result'=>$result]);
		}
	}

	function InsertFogao(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$output = '';
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->InsertFogao($vend_id);
			if($result){
				$output .= $result;
			}
			else{
				return false;
			}
			echo $output;
		}
	}

	function InsertFogImages(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$result = $this->vm->InsertFogImages();
				/*$output = '';
			if($result){
				$output .= '
				<div class="row">
							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;margin-left: 10px;">
							<img src="'.base_url()."DomesticImages/".$result->image_one.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."DomesticImages/".$result->image_two.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."DomesticImages/".$result->image_three.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."DomesticImages/".$result->image_four.'" class="responsive-img" style="margin-top:20px;">
							</div>
							
				</div>';
                 
			}
			else{
				$output .= 'Erro Mostrando Imagens.';
			}
			echo $output;*/
			}
	}

	/* Fogoes Section End */

	/* TV's Section Start */

	function Televisores(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->get_user_info($vend_id);
			$this->load->view('Vendedor/Adicionar/Televisores',['result'=>$result]);
		}
	}

	function InsertTvInfo(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$output = '';
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->InsertTvInfo($vend_id);
			if($result){
				$output .= $result;
			}
			else{
				return false;
			}
			echo $output;
		}
	}

	function InsertTvImages(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$result = $this->vm->InsertTvImages();
				/*$output = '';
			if($result){
				$output .= '
				<div class="row">
							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;margin-left: 10px;">
							<img src="'.base_url()."DomesticImages/".$result->image_one.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."DomesticImages/".$result->image_two.'" class="responsive-img" style="margin-top:20px;">
							</div>
							
				</div>';
                 
			}
			else{
				$output .= 'Erro Mostrando Imagens.';
			}
			echo $output;*/
			}	
	}

	/* TV's Section End */

	/* Eletrodomestics Acessories Section Start */

	function Eletro_Acessorios(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->get_user_info($vend_id);
			$this->load->view('Vendedor/Adicionar/Eletro_Acessorios',['result'=>$result]);
		}
	}

	function InsertEletrodAcc(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$output = '';
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->InsertEletrodAcc($vend_id);
			if($result){
				$output .= $result;
			}
			else{
				return false;
			}
			echo $output;
		}
	}

	function InsertEletroAccImages(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$result = $this->vm->InsertEletroAccImages();
				/*$output = '';
			if($result){
				$output .= '
				<div class="row">
							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;margin-left: 10px;">
							<img src="'.base_url()."DomesticImages/".$result->image_one.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."DomesticImages/".$result->image_two.'" class="responsive-img" style="margin-top:20px;">
							</div>

				</div>';
                 
			}
			else{
				$output .= 'Erro Mostrando Imagens.';
			}
			echo $output;*/
			}	
	}

	/* Eletrodomestics Acessories Section End */

	/* Eletronics Section Start */
	function Celulares(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->get_user_info($vend_id);
			$this->load->view('Vendedor/Adicionar/Celulares',['result'=>$result]);
		}

	}

	function InsertCellInfo(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$output = '';
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->InsertCellInfo($vend_id);
			if($result){
				$output .= $result;
			}
			else{
				return false;
			}
			echo $output;
		}
	}

	function InsertCellImages(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$result = $this->vm->InsertCellImages();
				/*$output = '';
			if($result){
				$output .= '
				<div class="row">
							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;margin-left: 10px;">
							<img src="'.base_url()."EletronicImages/".$result->image_one.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."EletronicImages/".$result->image_two.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."EletronicImages/".$result->image_three.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."EletronicImages/".$result->image_four.'" class="responsive-img" style="margin-top:20px;">
							</div>
							
				</div>';
                 
			}
			else{
				$output .= 'Erro Mostrando Imagens.';
			}
			echo $output;*/
			}
	}

	//Mobile Editing Section Start
	function Editar_Mobile($cel_id){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->get_user_info($vend_id);
			$call = $this->vm->Editar_Mobile($cel_id);
			$brands = $this->vm->GetMobileName();
			$this->load->view('Vendedor/Editar_Mobile',['result'=>$result,'mobile'=>$call,'brand'=>$brands]);
		}
	}

	function Update_Mobile($cel_id){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$result = $this->vm->Update_Mobile($cel_id);
			if($result){
			echo"<script>alert('Dados Actualizados Com Sucesso.')</script>";
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->get_user_info($vend_id);
			$call = $this->vm->Editar_Mobile($cel_id);
			$brands = $this->vm->GetMobileName();
			$this->load->view('Vendedor/Editar_Mobile',['result'=>$result,'mobile'=>$call,'brand'=>$brands]);
			}
			else{
				echo"Erro Actualizando Dados!";
			}	
		}
	}

	function Update_Mobile_images($cel_id){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->get_user_info($vend_id);
			$call = $this->vm->Editar_Mobile($cel_id);
			$this->load->view('Vendedor/Update_Mobile_images',['result'=>$result,'mobile'=>$call]);
		}
	}

	function mobile_image_update($cel_id){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$config = [
				'upload_path' => './EletronicImages',
				'allowed_types' => 'jpg|jpeg|png|gif'
			];

			$this->load->library('upload',$config);

			$this->upload->do_upload('image');
			$img = $this->upload->data('file_name');
			$img_pos = $this->input->post('image_position');

			$call = $this->vm->mobile_image_update($img,$img_pos,$cel_id);

			if($call){
				$this->session->set_flashdata('msg','Imagem Actualizada Com Sucesso');
				return redirect('Vendedor/Update_Mobile_images/'.$cel_id);
			}
			else{
				echo "Erro Actualizando Imagem.";
			}
		}
	}

	function Change_Mobile_Status($cel_id){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->get_user_info($vend_id);
			$call = $this->vm->Editar_Mobile($cel_id);
			$brands = $this->vm->GetMobileName();
			 $this->load->view('Vendedor/Change_Mobile_Status',['result'=>$result,'mobile'=>$call,'brand'=>$brands]);
		}
	}

	function set_mobile_status($cel_id){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$set = $this->vm->set_mobile_status($cel_id);
			
			if($set){
				echo"<script>alert('Estado Alterado Com Sucesso.')</script>";
				$vend_data = $this->vm->GetVendData();
				$vend_id = $vend_data->vend_id;
				$result = $this->vm->get_user_info($vend_id);
				return $this->load->view('Vendedor/Listar_Celulares',['result'=>$result]);
			}
			else{
				echo"<script>alert('Erro Actualizando Estado.')</script>";
			}
		}
	}

	function Eliminar_Mobile($cel_id){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->get_user_info($vend_id);
			$call = $this->vm->Editar_Mobile($cel_id);
			$brands = $this->vm->GetMobileName();
			 $this->load->view('Vendedor/Eliminar_Mobile',['result'=>$result,'mobile'=>$call,'brand'=>$brands]);
			}
	}

	function remove_mobile($cel_id){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$del = $this->vm->remove_mobile($cel_id);
			if($del){
				echo"<script>alert('Produto Removido Com Scuesso.')</script>";
				$vend_data = $this->vm->GetVendData();
				$vend_id = $vend_data->vend_id;
				$result = $this->vm->get_user_info($vend_id);
				return $this->load->view('Vendedor/Listar_Celulares',['result'=>$result]);
			}
			else{
				echo"<script>alert('Erro Removendo Produto.')</script>";
			}
		}
	}

	//Mobile Editing Section Start

	function Desktop(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->get_user_info($vend_id);
			$this->load->view('Vendedor/Adicionar/Desktop',['result'=>$result]);
		}
	}

	function InsertDeskInfo(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$output = '';
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->InsertDeskInfo($vend_id);
			if($result){
				$output .= $result;
			}
			else{
				return false;
			}
			echo $output;
		}
	}

	function InsertDeskImages(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$result = $this->vm->InsertDeskImages();
				/*$output = '';
			if($result){
				$output .= '
				<div class="row">
							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;margin-left: 10px;">
							<img src="'.base_url()."EletronicImages/".$result->image_one.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."EletronicImages/".$result->image_two.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."EletronicImages/".$result->image_three.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."EletronicImages/".$result->image_four.'" class="responsive-img" style="margin-top:20px;">
							</div>
							
				</div>';
                 
			}
			else{
				$output .= 'Erro Mostrando Imagens.';
			}
			echo $output;*/
			}
	}

	/*Laptops Section Start */

	function Laptops(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->get_user_info($vend_id);
			$this->load->view('Vendedor/Adicionar/Laptops',['result'=>$result]);
		}
	}

	function InsertLapInfo(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$output = '';
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->InsertLapInfo($vend_id);
			if($result){
				$output .= $result;
			}
			else{
				return false;
			}
			echo $output;
		}
	}

	function InsertLapImages(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$result = $this->vm->InsertLapImages();
				/*$output = '';
			if($result){
				$output .= '
				<div class="row">
							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;margin-left: 10px;">
							<img src="'.base_url()."EletronicImages/".$result->image_one.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."EletronicImages/".$result->image_two.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."EletronicImages/".$result->image_three.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."EletronicImages/".$result->image_four.'" class="responsive-img" style="margin-top:20px;">
							</div>
							
				</div>';
                 
			}
			else{
				$output .= 'Erro Mostrando Imagens.';
			}
			echo $output;*/
			}
	}

	function Editar_Laptop($lap_id){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->get_user_info($vend_id);
			$call = $this->vm->Editar_Laptop($lap_id);
			$brands = $this->vm->GetLapBrand();
			$this->load->view('Vendedor/Editar_Laptop',['result'=>$result,'lap'=>$call,'brand'=>$brands]);
		}
	}

	function Update_Laptop($lap_id){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$result = $this->vm->Update_Laptop($lap_id);
			if($result){
			echo"<script>alert('Dados Actualizados Com Sucesso.')</script>";
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->get_user_info($vend_id);
			$call = $this->vm->Editar_Laptop($lap_id);
			$brands = $this->vm->GetLapBrand();
			$this->load->view('Vendedor/Editar_Laptop',['result'=>$result,'lap'=>$call,'brand'=>$brands]);
			}
			else{
				echo"Erro Actualizando Dados!";
			}	
		}
	}

	function Update_Laptop_images($lap_id){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->get_user_info($vend_id);
			$call = $this->vm->Editar_Laptop($lap_id);
			$this->load->view('Vendedor/Update_Laptop_Images',['result'=>$result,'lap'=>$call]);
		}
	}

	function laptop_image_update($lap_id){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$config = [
				'upload_path' => './EletronicImages',
				'allowed_types' => 'jpg|jpeg|png|gif'
			];

			$this->load->library('upload',$config);

			$this->upload->do_upload('image');
			$img = $this->upload->data('file_name');
			$img_pos = $this->input->post('image_position');

			$call = $this->vm->laptop_image_update($img,$img_pos,$lap_id);

			if($call){
				$this->session->set_flashdata('msg','Imagem Actualizada Com Sucesso');
				return redirect('Vendedor/Update_Laptop_images/'.$lap_id);
			}
			else{
				echo "Erro Actualizando Imagem.";
			}
		}
	}

	function Change_Laptop_Status($lap_id){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->get_user_info($vend_id);
			$call = $this->vm->Editar_Laptop($lap_id);
			$brands = $this->vm->GetLapBrand();
			$this->load->view('Vendedor/Change_Laptop_Status',['result'=>$result,'lap'=>$call,'brand'=>$brands]);
		}
	}

	function set_laptop_status($lap_id){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$set = $this->vm->set_laptop_status($lap_id);
			
			if($set){
				echo"<script>alert('Estado Alterado Com Sucesso.')</script>";
				$vend_data = $this->vm->GetVendData();
				$vend_id = $vend_data->vend_id;
				$result = $this->vm->get_user_info($vend_id);
				return $this->load->view('Vendedor/Listar_Laptops',['result'=>$result]);
			}
			else{
				echo"<script>alert('Erro Actualizando Estado.')</script>";
			}
		}
	}

	function Eliminar_Laptop($lap_id){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->get_user_info($vend_id);
			$call = $this->vm->Editar_Laptop($lap_id);
			$brands = $this->vm->GetLapBrand();
			 $this->load->view('Vendedor/Eliminar_Laptop',['result'=>$result,'lap'=>$call,'brand'=>$brands]);
			}
	}

	function remove_laptop($lap_id){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$del = $this->vm->remove_laptop($lap_id);
			if($del){
				echo"<script>alert('Produto Removido Com Scuesso.')</script>";
				$vend_data = $this->vm->GetVendData();
				$vend_id = $vend_data->vend_id;
				$result = $this->vm->get_user_info($vend_id);
				return $this->load->view('Vendedor/Listar_Laptops',['result'=>$result]);
			}
			else{
				echo"<script>alert('Erro Removendo Produto.')</script>";
			}
		}
	}

	/*Laptops Section End */

	/* Tablets Section Start */

	function Tablets(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->get_user_info($vend_id);
			$this->load->view('Vendedor/Adicionar/Tablets',['result'=>$result]);
		}
	}

	function InsertTabInfo(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$output = '';
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->InsertTabInfo($vend_id);
			if($result){
				$output .= $result;
			}
			else{
				return false;
			}
			echo $output;
		}
	}

	function InsertTabImages(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$result = $this->vm->InsertTabImages();
				/*$output = '';
			if($result){
				$output .= '
				<div class="row">
							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;margin-left: 10px;">
							<img src="'.base_url()."EletronicImages/".$result->image_one.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."EletronicImages/".$result->image_two.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."EletronicImages/".$result->image_three.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."EletronicImages/".$result->image_four.'" class="responsive-img" style="margin-top:20px;">
							</div>
							
				</div>';
                 
			}
			else{
				$output .= 'Erro Mostrando Imagens.';
			}
			echo $output;*/
			}
	}

	/* Tablets Section End */

	/* Printers Section Start */

	function Impressoras(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->get_user_info($vend_id);
			$this->load->view('Vendedor/Adicionar/Impressoras',['result'=>$result]);
		}
	}

	function InsertPrinterInfo(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$output = '';
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->InsertPrinterInfo($vend_id);
			if($result){
				$output .= $result;
			}
			else{
				return false;
			}
			echo $output;
		}
	}

	function InsertPrintImages(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$result = $this->vm->InsertPrintImages();
				/*$output = '';
			if($result){
				$output .= '
				<div class="row">
							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;margin-left: 10px;">
							<img src="'.base_url()."EletronicImages/".$result->image_one.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."EletronicImages/".$result->image_two.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."EletronicImages/".$result->image_three.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."EletronicImages/".$result->image_four.'" class="responsive-img" style="margin-top:20px;">
							</div>
							
				</div>';
                 
			}
			else{
				$output .= 'Erro Mostrando Imagens.';
			}
			echo $output;*/
			}
	}

	/* Printers Section End */

	/* Eletronic Acessories Section Start */

	function Acessorios_Eletronicos(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->get_user_info($vend_id);
			$this->load->view('Vendedor/Adicionar/Acc_Eletronicos',['result'=>$result]);
		}
	}

	function InsertAccEletronic(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$output = '';
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->InsertAccEletronic($vend_id);
			if($result){
				$output .= $result;
			}
			else{
				return false;
			}
			echo $output;
		}
	}

	function InsertAccEltroImages(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$result = $this->vm->InsertAccEltroImages();
				/*$output = '';
			if($result){
				$output .= '
				<div class="row">
							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;margin-left: 10px;">
							<img src="'.base_url()."EletronicImages/".$result->image_one.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."EletronicImages/".$result->image_two.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."EletronicImages/".$result->image_three.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."EletronicImages/".$result->image_four.'" class="responsive-img" style="margin-top:20px;">
							</div>
							
				</div>';
                 
			}
			else{
				$output .= 'Erro Mostrando Imagens.';
			}
			echo $output;*/
			}
	}

	/* Eletronic Acessoires Section End */

	/* Men Fashion Section Start */

	function Camisas(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->get_user_info($vend_id);
			$this->load->view('Vendedor/Adicionar/Camisas_Camisetes',['result'=>$result]);
		}
	}

	function InsertShirtInfo(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$output = '';
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->InsertShirtInfo($vend_id);
			if($result){
				$output .= $result;
			}
			else{
				return false;
			}
			echo $output;
		}
	}

	function InsertShirtImages(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$result = $this->vm->InsertShirtImages();
				/*$output = '';
			if($result){
				$output .= '
				<div class="row">
							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;margin-left: 10px;">
							<img src="'.base_url()."EletronicImages/".$result->image_one.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."EletronicImages/".$result->image_two.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."EletronicImages/".$result->image_three.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."EletronicImages/".$result->image_four.'" class="responsive-img" style="margin-top:20px;">
							</div>
							
				</div>';
                 
			}
			else{
				$output .= 'Erro Mostrando Imagens.';
			}
			echo $output;*/
			}
	}

	function Editar_Info($shirt_id){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->get_user_info($vend_id);
			$call = $this->vm->Editar_Info($shirt_id);
			$this->load->view('Vendedor/Editar_Camisetes',['result'=>$result,'shirt'=>$call]);
		}	
	}

	function Update_Shirt($shirt_id){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$result = $this->vm->Update_Shirt($shirt_id);
			if($result){
			echo"<script>alert('Dados Actualizados Com Sucesso.')</script>";
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->get_user_info($vend_id);
			$call = $this->vm->Editar_Info($shirt_id);
			$this->load->view('Vendedor/Editar_Camisetes',['result'=>$result,'shirt'=>$call]);
			}
			else{
				echo"Erro Actualizando Dados!";
			}	
		}
	}

	function Update_Shirt_images($shirt_id){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->get_user_info($vend_id);
			$call = $this->vm->Editar_Info($shirt_id);
			$this->load->view('Vendedor/Update_Shirt_Images',['result'=>$result,'shirt'=>$call]);
		}
	}

	function shirt_image_update($shirt_id){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$config = [
				'upload_path' => './MenImages',
				'allowed_types' => 'jpg|jpeg|png|gif'
			];

			$this->load->library('upload',$config);

			$this->upload->do_upload('image');
			$img = $this->upload->data('file_name');
			$img_pos = $this->input->post('image_position');

			$call = $this->vm->shirt_image_update($img,$img_pos,$shirt_id);

			if($call){
				$this->session->set_flashdata('msg','Imagem Actualizada Com Sucesso');
				return redirect('Vendedor/Update_Shirt_images/'.$shirt_id);
			}
			else{
				echo "Erro Actualizando Imagem.";
			}
		}
	}

	function Editar_Estado($shirt_id){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->get_user_info($vend_id);
			$call = $this->vm->Editar_Info($shirt_id);
			 $this->load->view('Vendedor/Change_Shirt_Status',['result'=>$result,'shirt'=>$call]);
		}
	}

	function set_shirt_status($shirt_id){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$set = $this->vm->set_shirt_status($shirt_id);
			
			if($set){
				echo"<script>alert('Estado Alterado Com Sucesso.')</script>";
				$vend_data = $this->vm->GetVendData();
				$vend_id = $vend_data->vend_id;
				$result = $this->vm->get_user_info($vend_id);
				return $this->load->view('Vendedor/Listar_CamisetesMasculinas',['result'=>$result]);
			}
			else{
				echo"<script>alert('Erro Actualizando Estado.')</script>";
			}
		}
	}

	function Eliminar_Camisete($shirt_id){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->get_user_info($vend_id);
			$call = $this->vm->Editar_Info($shirt_id);
			 $this->load->view('Vendedor/Eliminar_Camisete',['result'=>$result,'shirt'=>$call]);
		}
	}

	function remove_shirt($shirt_id){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$del = $this->vm->remove_shirt($shirt_id);
			if($del){
				echo"<script>alert('Produto Removido Com Scuesso.')</script>";
				$vend_data = $this->vm->GetVendData();
				$vend_id = $vend_data->vend_id;
				$result = $this->vm->get_user_info($vend_id);
				return $this->load->view('Vendedor/Listar_CamisetesMasculinas',['result'=>$result]);
			}
			else{
				echo"<script>alert('Erro Removendo Produto.')</script>";
			}
		}
	}

	/*Trousers Section Start */

	function Calcas_Masculinas(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->get_user_info($vend_id);
			$this->load->view('Vendedor/Adicionar/Calcas_Masculinas',['result'=>$result]);
		}
	}

	function InsertCalcInfo(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$output = '';
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->InsertCalcInfo($vend_id);
			if($result){
				$output .= $result;
			}
			else{
				return false;
			}
			echo $output;
		}
	}

	function InsertCalcImages(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$result = $this->vm->InsertCalcImages();
				/*$output = '';
			if($result){
				$output .= '
				<div class="row">
							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;margin-left: 10px;">
							<img src="'.base_url()."EletronicImages/".$result->image_one.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."EletronicImages/".$result->image_two.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."EletronicImages/".$result->image_three.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."EletronicImages/".$result->image_four.'" class="responsive-img" style="margin-top:20px;">
							</div>
							
				</div>';
                 
			}
			else{
				$output .= 'Erro Mostrando Imagens.';
			}
			echo $output;*/
			}
	}

	/*Trousers Section End */

	/* FootWears Section Start */	

	function Calcados_Masculinos(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->get_user_info($vend_id);
			$this->load->view('Vendedor/Adicionar/Calcados_Masculinos',['result'=>$result]);
		}
	}

	function InsertMfootInfo(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$output = '';
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->InsertMfootInfo($vend_id);
			if($result){
				$output .= $result;
			}
			else{
				return false;
			}
			echo $output;
		}
	}

	function InsertMfootImages(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$result = $this->vm->InsertMfootImages();
				/*$output = '';
			if($result){
				$output .= '
				<div class="row">
							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;margin-left: 10px;">
							<img src="'.base_url()."EletronicImages/".$result->image_one.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."EletronicImages/".$result->image_two.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."EletronicImages/".$result->image_three.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."EletronicImages/".$result->image_four.'" class="responsive-img" style="margin-top:20px;">
							</div>
							
				</div>';
                 
			}
			else{
				$output .= 'Erro Mostrando Imagens.';
			}
			echo $output;*/
			}
	}

	/* FootWears Section End */

	/* Men Acessories Section Start */

	function Acc_Masculinos(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->get_user_info($vend_id);
			$this->load->view('Vendedor/Adicionar/Acc_Masculinos',['result'=>$result]);
		}
	}

	function InsertMenAcc(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$output = '';
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->InsertMenAcc($vend_id);
			if($result){
				$output .= $result;
			}
			else{
				return false;
			}
			echo $output;
		}
	}

	function InsertMenAccImages(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$result = $this->vm->InsertMenAccImages();
				/*$output = '';
			if($result){
				$output .= '
				<div class="row">
							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;margin-left: 10px;">
							<img src="'.base_url()."EletronicImages/".$result->image_one.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."EletronicImages/".$result->image_two.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."EletronicImages/".$result->image_three.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."EletronicImages/".$result->image_four.'" class="responsive-img" style="margin-top:20px;">
							</div>
							
				</div>';
                 
			}
			else{
				$output .= 'Erro Mostrando Imagens.';
			}
			echo $output;*/
			}
	}

	/* Men Acessories Section End */

	/* Women Fashion Section Start */

	function Editar_Blusas($wshirt_id){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->get_user_info($vend_id);
			$call = $this->vm->Editar_Blusas($wshirt_id);
			$this->load->view('Vendedor/Editor_Blusas',['result'=>$result,'blusa'=>$call]);
		}
	}

	function Update_Wshirt($wshirt_id){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$result = $this->vm->Update_Wshirt($wshirt_id);
			if($result){
			echo"<script>alert('Dados Actualizados Com Sucesso.')</script>";
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->get_user_info($vend_id);
			$call = $this->vm->Editar_Blusas($wshirt_id);
			$this->load->view('Vendedor/Editor_Blusas',['result'=>$result,'blusa'=>$call]);
			}
			else{
				echo"Erro Actualizando Dados!";
			}	
		}
	}

	function Update_Wshirt_images($wshirt_id){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->get_user_info($vend_id);
			$call = $this->vm->Editar_Blusas($wshirt_id);
			$this->load->view('Vendedor/Update_Wshirt_images',['result'=>$result,'blusa'=>$call]);
		}	
	}

	function wshirt_image_update($wshirt_id){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$config = [
				'upload_path' => './WomenImages',
				'allowed_types' => 'jpg|jpeg|png|gif'
			];

			$this->load->library('upload',$config);

			$this->upload->do_upload('image');
			$img = $this->upload->data('file_name');
			$img_pos = $this->input->post('image_position');

			$call = $this->vm->wshirt_image_update($img,$img_pos,$wshirt_id);

			if($call){
				$this->session->set_flashdata('msg','Imagem Actualizada Com Sucesso');
				return redirect('Vendedor/Update_Wshirt_images/'.$wshirt_id);
			}
			else{
				echo "Erro Actualizando Imagem.";
			}
		}
	}

	function Change_Wshirt_Status($wshirt_id){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->get_user_info($vend_id);
			$call = $this->vm->Editar_Blusas($wshirt_id);
			$this->load->view('Vendedor/Change_Wshirt_Status',['result'=>$result,'blusa'=>$call]);
		}	
	}

	function set_wshirt_status($wshirt_id){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$set = $this->vm->set_wshirt_status($wshirt_id);
			
			if($set){
				echo"<script>alert('Estado Alterado Com Sucesso.')</script>";
				$vend_data = $this->vm->GetVendData();
				$vend_id = $vend_data->vend_id;
				$result = $this->vm->get_user_info($vend_id);
				return $this->load->view('Vendedor/Listar_Blusas',['result'=>$result]);
			}
			else{
				echo"<script>alert('Erro Actualizando Estado.')</script>";
			}
		}
	}

	function Eliminar_blusas($wshirt_id){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->get_user_info($vend_id);
			$call = $this->vm->Editar_Blusas($wshirt_id);
			 $this->load->view('Vendedor/Eliminar_blusas',['result'=>$result,'blusa'=>$call]);
		}
	}

	function delete_wshirt($wshirt_id){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$del = $this->vm->delete_wshirt($wshirt_id);
			if($del){
				echo"<script>alert('Produto Removido Com Scuesso.')</script>";
				$vend_data = $this->vm->GetVendData();
				$vend_id = $vend_data->vend_id;
				$result = $this->vm->get_user_info($vend_id);
				return $this->load->view('Vendedor/Listar_Blusas',['result'=>$result]);
			}
			else{
				echo"<script>alert('Erro Removendo Produto.')</script>";
			}
		}
	}

	function Blusas_Femininas(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->get_user_info($vend_id);
			$this->load->view('Vendedor/Adicionar/Blusas_Femininas',['result'=>$result]);
		}
	}

	function InsertWomenShirtInfo(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$output = '';
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->InsertWomenShirtInfo($vend_id);
			if($result){
				$output .= $result;
			}
			else{
				return false;
			}
			echo $output;
		}
	}

	function InsertWshirtImages(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$result = $this->vm->InsertWshirtImages();
				/*$output = '';
			if($result){
				$output .= '
				<div class="row">
							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;margin-left: 10px;">
							<img src="'.base_url()."EletronicImages/".$result->image_one.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."EletronicImages/".$result->image_two.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."EletronicImages/".$result->image_three.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."EletronicImages/".$result->image_four.'" class="responsive-img" style="margin-top:20px;">
							</div>
							
				</div>';
                 
			}
			else{
				$output .= 'Erro Mostrando Imagens.';
			}
			echo $output;*/
			}
	}

	function Calcas_Femeninas(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->get_user_info($vend_id);
			$this->load->view('Vendedor/Adicionar/Calcas_Femininas',['result'=>$result]);
		}
	}

	function InsertWcalcInfo(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$output = '';
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->InsertWcalcInfo($vend_id);
			if($result){
				$output .= $result;
			}
			else{
				return false;
			}
			echo $output;
		}
	}

	function InsertWcalcImages(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$result = $this->vm->InsertWcalcImages();
				/*$output = '';
			if($result){
				$output .= '
				<div class="row">
							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;margin-left: 10px;">
							<img src="'.base_url()."EletronicImages/".$result->image_one.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."EletronicImages/".$result->image_two.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."EletronicImages/".$result->image_three.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."EletronicImages/".$result->image_four.'" class="responsive-img" style="margin-top:20px;">
							</div>
							
				</div>';
                 
			}
			else{
				$output .= 'Erro Mostrando Imagens.';
			}
			echo $output;*/
			}
	}

	function Calcados_Femininos(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->get_user_info($vend_id);
			$this->load->view('Vendedor/Adicionar/Calcados_Femininos',['result'=>$result]);
		}
	}

	function InsertWfootInfo(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$output = '';
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->InsertWfootInfo($vend_id);
			if($result){
				$output .= $result;
			}
			else{
				return false;
			}
			echo $output;
		}
	}

	function InsertWfootImages(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$result = $this->vm->InsertWfootImages();
				/*$output = '';
			if($result){
				$output .= '
				<div class="row">
							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;margin-left: 10px;">
							<img src="'.base_url()."EletronicImages/".$result->image_one.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."EletronicImages/".$result->image_two.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."EletronicImages/".$result->image_three.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."EletronicImages/".$result->image_four.'" class="responsive-img" style="margin-top:20px;">
							</div>
							
				</div>';
                 
			}
			else{
				$output .= 'Erro Mostrando Imagens.';
			}
			echo $output;*/
			}
	}

	function Acc_Femininos(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->get_user_info($vend_id);
			$this->load->view('Vendedor/Adicionar/Acc_Femininos',['result'=>$result]);
		}
	}

	function InsertWomenAcc(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$output = '';
			$vend_data = $this->vm->GetVendData();
			$vend_id = $vend_data->vend_id;
			$result = $this->vm->InsertWomenAcc($vend_id);
			if($result){
				$output .= $result;
			}
			else{
				return false;
			}
			echo $output;
		}
	}

	function InsertWmAccImages(){
		if($this->session->userdata('email')=="" && $this->session->userdata('password')==""){
			return redirect('Vendedor/index');
		}
		else{
			$result = $this->vm->InsertWmAccImages();
				/*$output = '';
			if($result){
				$output .= '
				<div class="row">
							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;margin-left: 10px;">
							<img src="'.base_url()."EletronicImages/".$result->image_one.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."EletronicImages/".$result->image_two.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."EletronicImages/".$result->image_three.'" class="responsive-img" style="margin-top:20px;">
							</div>

							<div class="col l3 m6 s12" style="border: 1px solid silver; width: 150px;height: 150px;">
							<img src="'.base_url()."EletronicImages/".$result->image_four.'" class="responsive-img" style="margin-top:20px;">
							</div>
							
				</div>';
                 
			}
			else{
				$output .= 'Erro Mostrando Imagens.';
			}
			echo $output;*/
			}
	}

	/* Women Fashion Section End */
}

?>