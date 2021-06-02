<?php
/**
 * 
 */
class AdminModel extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function Login($username,$password){
		$chk_admin = $this->db->get_where('admin',['admin_username'=>$username,'admin_password'=>$password]);

		if($chk_admin->num_rows() > 0){
			return true;
		}
		else{
			return false;
		}
	}

	function InserirProduto(){
		$produto = $this->input->post('nome_produto');
		$chk_produto = $this->db->get_where('produtos',['nome_produto'=>$produto]);

		if($chk_produto->num_rows() > 0){
			return false;
		}
		else{
			$insert_prod = $this->db->insert('produtos',['nome_produto'=>$produto]);

			if($insert_prod){
				return true;
			}
			else{
				return false;
			}
		}

	}

	function GetAllProducts(){
		$get_prod = $this->db->select()
				 			->from('produtos')
				 			->get();
		if($get_prod->num_rows() > 0){
			return $get_prod->result();
		}
		else{
			return $get_prod->result();
		}
	}

	function InserirMarcas($item,$marca){
		$insert_marca = $this->db->insert('marcas',['product_id'=>$item,'marca'=>$marca]);
		if($insert_marca){
			return true;
		}
		else{
			return false;
		}
	}

	function GetCarName(){
		$item = $this->db->get_where('produtos',['nome_produto'=>'Carros Pesados']);
		if($item->num_rows() > 0){
			$item_id = $item->row('product_id');

			$get_brands = $this->db->get_where('marcas', ['product_id'=>$item_id]);
			if($get_brands->num_rows() > 0){
				return $get_brands->result();
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}

	function GetBrandName(){
		$item = $this->db->get_where('produtos',['nome_produto'=>'Carros']);
		if($item->num_rows() > 0){
			$item_id = $item->row('product_id');

			$get_brands = $this->db->select()
								    ->from('marcas')
									->order_by('marca','asc')
								    ->where('product_id',$item_id)
								    ->get();
								   
			if($get_brands->num_rows() > 0){
				return $get_brands->result();
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}

	function GetMotoName(){
		$item = $this->db->get_where('produtos',['nome_produto'=>'Motos']);
		if($item->num_rows() > 0){
			$item_id = $item->row('product_id');

			$get_brands = $this->db->select()
								    ->from('marcas')
									->order_by('marca','asc')
								    ->where('product_id',$item_id)
								    ->get();

			if($get_brands->num_rows() > 0){
				return $get_brands->result();
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}

	function GetBicName(){
		$item = $this->db->get_where('produtos',['nome_produto'=>'Bicicletas']);
		if($item->num_rows() > 0){
			$item_id = $item->row('product_id');

			$get_brands = $this->db->select()
								    ->from('marcas')
									->order_by('marca','asc')
								    ->where('product_id',$item_id)
								    ->get();

			if($get_brands->num_rows() > 0){
				return $get_brands->result();
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}

	function GetFreezeName(){
		$item = $this->db->get_where('produtos',['nome_produto'=>'Geleiras & Congeladores']);
		if($item->num_rows() > 0){
			$item_id = $item->row('product_id');

			$get_brands = $this->db->select()
								    ->from('marcas')
									->order_by('marca','asc')
								    ->where('product_id',$item_id)
								    ->get();

			if($get_brands->num_rows() > 0){
				return $get_brands->result();
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}

	function GetTvName(){
		$item = $this->db->get_where('produtos',['nome_produto'=>'Televisores']);
		if($item->num_rows() > 0){
			$item_id = $item->row('product_id');

			$get_brands = $this->db->select()
								    ->from('marcas')
									->order_by('marca','asc')
								    ->where('product_id',$item_id)
								    ->get();

			if($get_brands->num_rows() > 0){
				return $get_brands->result();
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}

	function GetCellName(){
		$item = $this->db->get_where('produtos',['nome_produto'=>'Celulares']);
		if($item->num_rows() > 0){
			$item_id = $item->row('product_id');

			$get_brands = $this->db->select()
								    ->from('marcas')
									->order_by('marca','asc')
								    ->where('product_id',$item_id)
								    ->get();

			if($get_brands->num_rows() > 0){
				return $get_brands->result();
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}

	function GetComputerName(){
		$item = $this->db->get_where('produtos',['nome_produto'=>'Computadores']);
		if($item->num_rows() > 0){
			$item_id = $item->row('product_id');

			$get_brands = $this->db->select()
								    ->from('marcas')
									->order_by('marca','asc')
								    ->where('product_id',$item_id)
								    ->get();

			if($get_brands->num_rows() > 0){
				return $get_brands->result();
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}

	function GetPrinterName(){
		$item = $this->db->get_where('produtos',['nome_produto'=>'Impressoras']);
		if($item->num_rows() > 0){
			$item_id = $item->row('product_id');

			$get_brands = $this->db->select()
								    ->from('marcas')
									->order_by('marca','asc')
								    ->where('product_id',$item_id)
								    ->get();
									
			if($get_brands->num_rows() > 0){
				return $get_brands->result();
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}

	// Get Admin Data Method Start
	function getAdminData(){
		$username = $this->session->userdata('admin_username');
		$password = ($this->session->userdata('admin_password'));

			$check_admin = $this->db->get_where('admin', ['admin_password'=>$username, 'admin_password'=>$password]);

			if($check_admin->num_rows() > 0){
				return $check_admin->row();
			}
			else
				return false;
	}

	function getAdminInfo($admin_id){
		$get_info = $this->db->get_where('admin',['admin_id'=>$admin_id]);

		if($get_info->num_rows() > 0){
			return $get_info->row();
		}
		else{
			return $get_info->row();
		}
	}

	//Get Users Info Sectoin Start

	function getVerifiedUsers(){
		$getV_users = $this->db->select()
							   ->from('vendedor')
							   ->where('status','Verified')
							   ->get();
		
		if($getV_users->num_rows() > 0){
			return $getV_users->result();
		}
		else{
			return $getV_users->result();
		}
			
	}

	function getAllUsers(){
		$getA_users = $this->db->get_where('vendedor',['status'=>!'Suspended']);

		if($getA_users->num_rows() > 0){
			return $getA_users->result();
		}
		else
			return $getA_users->result();
	}

	function getSuspendedUsers(){
		$getS_users = $this->db->get_where('vendedor',['status'=>'Suspended']);

		if($getS_users->num_rows() > 0){
			return $getS_users->result();
		}
		else
			return $getS_users->result();
	}
	
	//Ao fazer login, o programa deve verificar o estado do vendedor
}
