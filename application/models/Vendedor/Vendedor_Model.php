<?php

class Vendedor_Model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function CriarConta(){
		$nome = $this->input->post('name_user');
		$email = $this->input->post('email_user');
		$password = $this->input->post('password_user');
		$agree = $this->input->post('agree');

		$dados = $this->db->get_where('vendedor',array('email'=>$this->input->post('email_user')));

		if($dados->num_rows() != null){
			/* flash message dizendo o que ta no echo */
			echo "<script>alert('Email Existe! Insira Outro e Tente Novamente')</script>";
			redirect(base_url().'vendedor/sign_up','refresh');
		}

		else{
		$insert_vendedor = $this->db->insert('vendedor',['nome_completo'=>$nome,'email'=>$email,'password'=>$password,'agree'=>'Yes']);			
		
		}
		if ($insert_vendedor) {
			return true;
			
		}
		else{
			return false;
		}
	}

	function Login(){
		$email_user = $this->input->post('email_login');
		$password_user = $this->input->post('password_login');

		//Mensagem de parabens, login efectuado com sucesso

		$check_user = $this->db->get_where('vendedor',['email'=>$email_user, 'password' => $password_user]);

		if($check_user->num_rows() > 0){
			return true;
		}
		else{
			return false;
		}
	}

	function CheckInfo(){
		$email_user = $this->session->userdata('email');
		$password_user = $this->session->userdata('password');

		$check_vend = $this->db->get_where('vendedor',['email'=>$email_user,'password'=>$password_user]);

		if($check_vend->num_rows() > 0){
			$id_vend = $check_vend->row('vend_id');
			$chk_img = $this->db->get_where('vendedor',['vend_id'=>$id_vend,'vend_localizacao'=>'']);

			if($chk_img->num_rows() > 0){
				//colocar flashdata a dizer preencha estes forms e valide a sua conta
				return true;
			}
			else{ return false;}
		}
		else
			return false;
	}

	function InserirDados(){
		$cont1 = $this->input->post('contact1');
		$cont2 = $this->input->post('contact2');
		$local = $this->input->post('local');

		$email_user = $this->session->userdata('email');
		$password_user = $this->session->userdata('password');

		$check_vend = $this->db->get_where('vendedor',['email'=>$email_user,'password'=>$password_user]);

		if($check_vend->num_rows() > 0){
			$vend_id = $check_vend->row('vend_id');
			$update_info = $this->db->where('vend_id',$vend_id)
					 				->update('vendedor',['vend_contato1'=>$cont1,'vend_contato2'=>$cont2,'vend_localizacao'=>$local,'data_cadastro'=>date('Y-m-d')]);
			//Colocar flashdata dizendo que atualizou os dados com sucesso, agora faltam as fotos para comecar a vender os produtos
			if($update_info){
				return true;
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}

	function get_user_info($vend_id){
		$get_info = $this->db->get_where('vendedor',['vend_id'=>$vend_id]);

		if($get_info->num_rows() > 0){
			return $get_info->row();
		}
		else{
			return $get_info->row();
		}
	}

	/*function GetEletrodomesticos(){
		$result = $this->db->get_where('subcategorias',['cat_id'=>'1']);
		if($result->num_rows() > 0){
			$item_id = $result->row('subcat_id');
			$get_brand = $this->db->get_where('categorias',['cat_id'=>$item_id]);

			if($get_brand->num_rows() > 0){
				return $get_brand->result();
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}*/

	function GetVendData(){
			$username = $this->session->userdata('email');
			$password = $this->session->userdata('password');

			$check_vend = $this->db->get_where('vendedor', ['email'=>$username, 'password'=>$password]);

			if($check_vend->num_rows() > 0){
				return $check_vend->row();
			}
			else
				return false;
	}


	function InsertPersonalCars($vend_id){
		/* No Futuro Proximo, Antes de Inserir
		// O Programa vai pegar o Id do vendedor
		// E ver se aquilo que ele ta introduzir existe na base de dados
		// OU Nao!! */

		$part_title = $this->input->post('part_title');
		$mobile_brand = $this->input->post('mobile_brand');
        $part_modelo = $this->input->post('part_modelo');
        $part_cor = $this->input->post('part_cor');
        $part_quilometragem = $this->input->post('part_quilometragem');
        $part_combustivel = $this->input->post('part_combustivel');
        $part_ano = $this->input->post('part_ano');
        $part_transmissao = $this->input->post('part_transmissao');
        $part_tipocarro = $this->input->post('part_tipocarro');
        $part_descricao = $this->input->post('part_descricao');
        $product_price = $this->input->post('product_price');

        $insert_pcar = $this->db->insert('particulares',[
        	'part_title'=>$part_title,
        	'mobile_brand'=>$mobile_brand,
        	'part_modelo'=>$part_modelo,
        	'part_cor'=>$part_cor,
        	'part_quilometragem'=>$part_quilometragem,
        	'part_combustivel'=>$part_combustivel,
        	'part_ano'=>$part_ano,
        	'part_transmissao'=>$part_transmissao,
        	'part_tipocarro'=>$part_tipocarro,
        	'part_descricao'=>$part_descricao,
        	'car_categoria'=>'Carros',
        	'product_status'=>'Active',
        	'product_price'=>$product_price,
        	'data_cadastro'=>date('Y-m-d'),
        	'vend_id'=>$vend_id]);

        if($insert_pcar){
        	return $this->db->insert_id();
        }
        else{
        	return false;
        }
	}

	function InsertProductImages(){
		$config['upload_path'] = "./CarrsImages";
		$config['allowed_types'] = "jpg|jpeg|png|gif";
		$this->load->library('upload',$config);

		$prod_id = $this->input->post('product_id');

		$i_one = $this->upload->do_upload('image_one').$this->upload->data('file_name');
		$i_two = $this->upload->do_upload('image_two').$this->upload->data('file_name');
		$i_three = $this->upload->do_upload('image_three').$this->upload->data('file_name');
		$i_four = $this->upload->do_upload('image_four').$this->upload->data('file_name');

		$img_one = substr($i_one, 1);
		$img_two = substr($i_two, 1);
		$img_three = substr($i_three, 1);
		$img_four = substr($i_four, 1);
		
		$update_img = $this->db->where('part_id',$prod_id)
				 				->update('particulares',['image_one'=>$img_one,'image_two'=>$img_two,'image_three'=>$img_three,'image_four'=>$img_four]);

				 if($update_img){
				 	$get_p_detail = $this->db->get_where('particulares',['part_id'=>$prod_id]);
				 	if($get_p_detail->num_rows() > 0){
				 		return $get_p_detail->row();
				 	}
				 	else{
				 		return false;
				 	}
				 }
				 else{
				 	return false;
				 }		 	
	}

	//Colective Carrs Section
	function InsertColetiveCars($vend_id){
		$col_title = $this->input->post('col_title');
		$mobile_brand = $this->input->post('mobile_brand');
        $col_modelo = $this->input->post('col_modelo');
        $col_cor = $this->input->post('col_cor');
        $col_quilometragem = $this->input->post('col_quilometragem');
        $col_combustivel = $this->input->post('col_combustivel');
        $col_ano = $this->input->post('col_ano');
        $col_transmissao = $this->input->post('col_transmissao');
        $col_tipoCarro = $this->input->post('col_tipoCarro');
        $col_descricao = $this->input->post('col_descricao');
        $product_price = $this->input->post('product_price');

        $insert_Ccar = $this->db->insert('colectivos',[
        	'col_title'=>$col_title,
        	'mobile_brand'=>$mobile_brand,
        	'col_modelo'=>$col_modelo,
        	'col_cor'=>$col_cor,
        	'col_quilometragem'=>$col_quilometragem,
        	'col_combustivel'=>$col_combustivel,
        	'col_ano'=>$col_ano,
        	'col_transmissao'=>$col_transmissao,
        	'col_tipoCarro'=>$col_tipoCarro,
        	'col_descricao'=>$col_descricao,
        	'car_categoria'=>'Carros',
        	'product_status'=>'Active',
        	'product_price'=>$product_price,
        	'data_cadastro'=>date('Y-m-d'),
        	'vend_id'=>$vend_id]);

        if($insert_Ccar){
        	return $this->db->insert_id();
        }
        else{
        	return false;
        }
	}

	function InsertColectiveImages(){
		$config['upload_path'] = "./CarrsImages";
		$config['allowed_types'] = "jpg|jpeg|png|gif";
		$this->load->library('upload',$config);

		$prod_id = $this->input->post('product_id');

		$i_one = $this->upload->do_upload('image_one').$this->upload->data('file_name');
		$i_two = $this->upload->do_upload('image_two').$this->upload->data('file_name');
		$i_three = $this->upload->do_upload('image_three').$this->upload->data('file_name');
		$i_four = $this->upload->do_upload('image_four').$this->upload->data('file_name');

		$img_one = substr($i_one, 1);
		$img_two = substr($i_two, 1);
		$img_three = substr($i_three, 1);
		$img_four = substr($i_four, 1);
		
		$update_img = $this->db->where('col_id',$prod_id)
				 				->update('colectivos',['image_one'=>$img_one,'image_two'=>$img_two,'image_three'=>$img_three,'image_four'=>$img_four]);

				 if($update_img){
				 	$get_p_detail = $this->db->get_where('colectivos',['col_id'=>$prod_id]);
				 	if($get_p_detail->num_rows() > 0){
				 		return $get_p_detail->row();
				 	}
				 	else{
				 		return false;
				 	}
				 }
				 else{
				 	return false;
				 }	

	}

	//Cargo Cars Section Start
	function InsertCargoCars($vend_id){
		$pes_title = $this->input->post('pes_title');
		$mobile_brand = $this->input->post('mobile_brand');
        $pes_modelo = $this->input->post('pes_modelo');
        $pes_cor = $this->input->post('pes_cor');
        $pes_quilometragem = $this->input->post('pes_quilometragem');
        $pes_combustivel = $this->input->post('pes_combustivel');
        $pes_ano = $this->input->post('pes_ano');
        $pes_transmissao = $this->input->post('pes_transmissao');
        $pes_descricao = $this->input->post('pes_descricao');
        $product_price = $this->input->post('product_price');

        $insert_Pcar = $this->db->insert('pesados',[
        	'pes_title'=>$pes_title,
        	'mobile_brand'=>$mobile_brand,
        	'pes_modelo'=>$pes_modelo,
        	'pes_cor'=>$pes_cor,
        	'pes_quilometragem'=>$pes_quilometragem,
        	'pes_combustivel'=>$pes_combustivel,
        	'pes_ano'=>$pes_ano,
        	'pes_transmissao'=>$pes_transmissao,
        	'pes_descricao'=>$pes_descricao,
        	'car_categoria'=>'Carros',
        	'product_status'=>'Active',
        	'product_price'=>$product_price,
        	'data_cadastro'=>date('Y-m-d'),
        	'vend_id'=>$vend_id]);

        if($insert_Pcar){
        	return $this->db->insert_id();
        }
        else{
        	return false;
        }
	}

	function InsertCargoImages(){
		$config['upload_path'] = "./CarrsImages";
		$config['allowed_types'] = "jpg|jpeg|png|gif";
		$this->load->library('upload',$config);

		$prod_id = $this->input->post('product_id');

		$i_one = $this->upload->do_upload('image_one').$this->upload->data('file_name');
		$i_two = $this->upload->do_upload('image_two').$this->upload->data('file_name');
		$i_three = $this->upload->do_upload('image_three').$this->upload->data('file_name');
		$i_four = $this->upload->do_upload('image_four').$this->upload->data('file_name');

		$img_one = substr($i_one, 1);
		$img_two = substr($i_two, 1);
		$img_three = substr($i_three, 1);
		$img_four = substr($i_four, 1);
		
		$update_img = $this->db->where('pes_id',$prod_id)
				 				->update('pesados',['image_one'=>$img_one,'image_two'=>$img_two,'image_three'=>$img_three,'image_four'=>$img_four]);

				 if($update_img){
				 	$get_p_detail = $this->db->get_where('pesados',['pes_id'=>$prod_id]);
				 	if($get_p_detail->num_rows() > 0){
				 		return $get_p_detail->row();
				 	}
				 	else{
				 		return false;
				 	}
				 }
				 else{
				 	return false;
				 }	
	}

	//Motos Section Start

	function InsertMotos($vend_id){
		$moto_title = $this->input->post('moto_title');
		$mobile_brand = $this->input->post('mobile_brand');
        $moto_modelo = $this->input->post('moto_modelo');
        $moto_cor = $this->input->post('moto_cor');
        $moto_quilometragem = $this->input->post('moto_quilometragem');
        $moto_combustivel = $this->input->post('moto_combustivel');
        $moto_ano = $this->input->post('moto_ano');
        $moto_descricao = $this->input->post('moto_descricao');
        $product_price = $this->input->post('product_price');

        $insert_moto = $this->db->insert('motos',[
        	'moto_title'=>$moto_title,
        	'mobile_brand'=>$mobile_brand,
        	'moto_modelo'=>$moto_modelo,
        	'moto_cor'=>$moto_cor,
        	'moto_quilometragem'=>$moto_quilometragem,
        	'moto_combustivel'=>$moto_combustivel,
        	'moto_ano'=>$moto_ano,
        	'moto_descricao'=>$moto_descricao,
        	'categoria'=>'Motos',
        	'product_status'=>'Active',
        	'product_price'=>$product_price,
        	'data_cadastro'=>date('Y-m-d'),
        	'vend_id'=>$vend_id]);

        if($insert_moto){
        	return $this->db->insert_id();
        }
        else{
        	return false;
        }
	}

	function InsertMotoImages(){
		$config['upload_path'] = "./CarrsImages";
		$config['allowed_types'] = "jpg|jpeg|png|gif";
		$this->load->library('upload',$config);

		$prod_id = $this->input->post('product_id');

		$i_one = $this->upload->do_upload('image_one').$this->upload->data('file_name');
		$i_two = $this->upload->do_upload('image_two').$this->upload->data('file_name');
		$i_three = $this->upload->do_upload('image_three').$this->upload->data('file_name');
		$i_four = $this->upload->do_upload('image_four').$this->upload->data('file_name');

		$img_one = substr($i_one, 1);
		$img_two = substr($i_two, 1);
		$img_three = substr($i_three, 1);
		$img_four = substr($i_four, 1);
		
		$update_img = $this->db->where('moto_id',$prod_id)
				 				->update('motos',['image_one'=>$img_one,'image_two'=>$img_two,'image_three'=>$img_three,'image_four'=>$img_four]);

				 if($update_img){
				 	$get_p_detail = $this->db->get_where('motos',['moto_id'=>$prod_id]);
				 	if($get_p_detail->num_rows() > 0){
				 		return $get_p_detail->row();
				 	}
				 	else{
				 		return false;
				 	}
				 }
				 else{
				 	return false;
				 }	
	}

	//Bics Section Start

	function InsertBics($vend_id){
		$bic_title = $this->input->post('bic_title');
		$mobile_brand = $this->input->post('mobile_brand');
        $bic_modelo = $this->input->post('bic_modelo');
        $bic_cor = $this->input->post('bic_cor');
        $bic_descricao = $this->input->post('bic_descricao');
        $product_price = $this->input->post('product_price');

        $insert_bic = $this->db->insert('bicicletas',[
        	'bic_title'=>$bic_title,
        	'mobile_brand'=>$mobile_brand,
        	'bic_modelo'=>$bic_modelo,
        	'bic_cor'=>$bic_cor,
        	'bic_descricao'=>$bic_descricao,
        	'categoria'=>'Bicicletas',
        	'product_status'=>'Active',
        	'product_price'=>$product_price,
        	'data_cadastro'=>date('Y-m-d'),
        	'vend_id'=>$vend_id]);

        if($insert_bic){
        	return $this->db->insert_id();
        }
        else{
        	return false;
        }
	}

	function InsertBicImages(){
		$config['upload_path'] = "./CarrsImages";
		$config['allowed_types'] = "jpg|jpeg|png|gif";
		$this->load->library('upload',$config);

		$prod_id = $this->input->post('product_id');

		$i_one = $this->upload->do_upload('image_one').$this->upload->data('file_name');
		$i_two = $this->upload->do_upload('image_two').$this->upload->data('file_name');

		$img_one = substr($i_one, 1);
		$img_two = substr($i_two, 1);
		
		$update_img = $this->db->where('bic_id',$prod_id)
				 				->update('bicicletas',['image_one'=>$img_one,'image_two'=>$img_two]);

				 if($update_img){
				 	$get_p_detail = $this->db->get_where('bicicletas',['bic_id'=>$prod_id]);
				 	if($get_p_detail->num_rows() > 0){
				 		return $get_p_detail->row();
				 	}
				 	else{
				 		return false;
				 	}
				 }
				 else{
				 	return false;
				 }
	}

	// Acessories Section Start

	function InsertAcc($vend_id){
		$ac_title = $this->input->post('ac_title');
		$ac_brand = $this->input->post('ac_brand');
        $ac_descricao = $this->input->post('ac_descricao');
        $product_price = $this->input->post('product_price');

        $insert_ac = $this->db->insert('acessorioscarros',[
        	'ac_title'=>$ac_title,
        	'ac_brand'=>$ac_brand,
        	'ac_descricao'=>$ac_descricao,
        	'categoria'=>'Acessorios',
        	'product_status'=>'Active',
        	'product_price'=>$product_price,
        	'data_cadastro'=>date('Y-m-d'),
        	'vend_id'=>$vend_id]);

        if($insert_ac){
        	return $this->db->insert_id();
        }
        else{
        	return false;
        }
	}

	function InsertAccImages(){
		$config['upload_path'] = "./CarrsImages";
		$config['allowed_types'] = "jpg|jpeg|png|gif";
		$this->load->library('upload',$config);

		$prod_id = $this->input->post('product_id');

		$i_one = $this->upload->do_upload('image_one').$this->upload->data('file_name');
		$i_two = $this->upload->do_upload('image_two').$this->upload->data('file_name');
		
		$img_one = substr($i_one, 1);
		$img_two = substr($i_two, 1);
		
		$update_img = $this->db->where('ac_id',$prod_id)
				 				->update('acessorioscarros',['image_one'=>$img_one,'image_two'=>$img_two]);

				 if($update_img){
				 	$get_p_detail = $this->db->get_where('acessorioscarros',['ac_id'=>$prod_id]);
				 	if($get_p_detail->num_rows() > 0){
				 		return $get_p_detail->row();
				 	}
				 	else{
				 		return false;
				 	}
				 }
				 else{
				 	return false;
				 }
	}

	function update_vendedor($vend_id){
		$data = [
			'nome_completo' => $this->input->post('full_name'),
			'vend_contato1' => $this->input->post('contact1'),
			'vend_contato2' => $this->input->post('contact2'),
			'vend_localizacao' => $this->input->post('local')
		];
		$update_vend = $this->db->where('vend_id',$vend_id)
				 				->update('vendedor',$data);
		if($update_vend){
			return true;
		}
		else{
			return false;
		}
	}

	function update_login_details($vend_id){
		$login = [
			'email' => $this->input->post('full_email'),
			'password' => $this->input->post('confirm_password')
		];

		//Verificar Se As Passwords Coincidem!

		$update_login = $this->db->where('vend_id',$vend_id)
								 ->update('vendedor',$login);
		if($update_login){
			return true;
		}
		else{
			return false;
		}
	}

	function Listar($listing_type,$vend_id){
		if($listing_type == 'carros particulares'){
			$get_Pcar = $this->db->select()
					 			 ->from('particulares')
					 			 ->order_by('part_id','desc')
					 			 ->where('vend_id',$vend_id)
					 		  	 ->get();

			if($get_Pcar->num_rows() > 0){
				return $get_Pcar->result();
			}
			else{
				return $get_Pcar->result();
			}
		}
		else if($listing_type == 'geleiras & congeladores'){
			$getFreez = $this->db->select()
								 ->from('gel_cong')
								 ->order_by('freeze_id','desc')
								 ->where('vend_id',$vend_id)
								 ->get();

			if($getFreez->num_rows() > 0){
				return $getFreez->result();
			}
			else{
				return $getFreez->result();
			}
		}
		elseif($listing_type == 'celulares'){
			$get_cel = $this->db->select()
								->from('celulares')
								->order_by('cel_id','desc')
								->where('vend_id',$vend_id)
								->get();

			if($get_cel->num_rows() > 0){
				return $get_cel->result();
			}
			else{
				return $get_cel->result();
			}
		}
		elseif($listing_type == 'laptops'){
			$get_laps = $this->db->select()
								 ->from('laptops')
								 ->order_by('lap_id','desc')
								 ->where('vend_id',$vend_id)
								 ->get();

			if($get_laps->num_rows() > 0){
				return $get_laps->result();
			}
			else{
				return $get_laps->result();
			}
		}
		elseif($listing_type == 'camisas masculinas'){
			$get_mshirt = $this->db->select()
								   ->from('shirts')
								   ->order_by('shirt_id','desc')
								   ->where('vend_id',$vend_id)
								   ->get();

			if($get_mshirt->num_rows() > 0)
				return $get_mshirt->result();
			else
				return $get_mshirt->result();

		}
		elseif($listing_type == 'camisas femeninas'){
			$get_blusas = $this->db->select()
								   ->from('wshirts')
								   ->order_by('wshirt_id','desc')
								   ->where('vend_id',$vend_id)
								   ->get();

			if($get_blusas->num_rows() > 0)
				return $get_blusas->result();
			else
				return $get_blusas->result();
		}
		else{
			return false;
		}
	}
	// Freezers Info Section Start
	function getOnlineFreeze($vend_id){
		$get_online = $this->db->get_where('gel_cong',['vend_id'=>$vend_id,'product_status'=>'Active']);

		if($get_online->num_rows() > 0){
			return $get_online->result();
		}
		else{
			return $get_online->result();
		}
	}

	function getSoldFreeze($vend_id){
		$sold = $this->db->get_where('gel_cong',['vend_id'=>$vend_id,'product_status'=>'Vendido']);

		if($sold->num_rows() > 0){
			return $sold->result();
		}
		else{
			return $sold->result();
		}
	}

	function getSuspendedFreeze($vend_id){
		$get_suspended = $this->db->get_where('gel_cong',['vend_id'=>$vend_id,'product_status'=>'Suspended']);

		if($get_suspended->num_rows() > 0){
			return $get_suspended->result();
		}
		else
			return $get_suspended->result();
	}

	function Editar_Freeze($freeze_id){
		$freze = $this->db->get_where('gel_cong',['freeze_id'=>$freeze_id]);
		if($freze->num_rows() > 0){
			return $freze->row();
		}
		else
			return $freze->row();
	}

	function GetFreezeName(){
		$item = $this->db->get_where('produtos',['nome_produto'=>'Geleiras & Congeladores']);
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

	function Update_Freeze($freeze_id){
		$data = [
			'freeze_title'=>$this->input->post('update_freezetitle'),
			'freeze_type'=>$this->input->post('update_freezetype'),
			'mobile_brand'=>$this->input->post('update_brand'),
			'freeze_cor'=>$this->input->post('update_freezecor'),
			'freeze_size'=>$this->input->post('update_freezesize'),
			'freeze_descricao'=>$this->input->post('update_freezedescricao'),
			'product_price'=>$this->input->post('update_productprice'),
			'data_cadastro'=>date('Y-m-d')
		];

		$update_freeze = $this->db->where('freeze_id',$freeze_id)
										  ->update('gel_cong',$data);
			if($update_freeze){
				return true;
			}
			else
				return false;
	}

	function freeze_image_update($img,$img_pos,$freeze_id){
		$get_img_data = $this->db->get_where('gel_cong',['freeze_id'=>$freeze_id]);

		if($get_img_data->num_rows() > 0){
			$old_img = $get_img_data->row();
		}
		else{
			$old_img = $get_img_data->row();
		}

		if($img_pos == "1"){
			unlink('DomesticImages/'.$old_img->image_one);
			$data = ['image_one'=>$img];
		}
		elseif($img_pos == "2"){
			unlink('DomesticImages/'.$old_img->image_two);
			$data = ['image_two'=>$img];
		}
		elseif ($img_pos == "3") {
			unlink('DomesticImages/'.$old_img->image_three);
			$data = ['image_three'=>$img];
		}
		elseif ($img_pos == "4") {
			unlink('DomesticImages/'.$old_img->image_four);
			$data = ['image_four'=>$img];
		}
		else{
			return false;
		}
		$update_img = $this->db->where('freeze_id',$freeze_id)
				 			   ->update('gel_cong',$data);

		if($update_img){
			return true;
		}
		else{
			return false;
		}
	}

	function set_freeze_status($freeze_id){
		$set = [
			'product_status'=>$this->input->post('status'),
			'data_cadastro'=>date('Y-m-d')
		];

		$update = $this->db->where('freeze_id',$freeze_id)
						   ->update('gel_cong',$set);
		if($update){
			return true;
		}
		else{
			return false;
		}
	}

	function remove_freeze($freeze_id){
		$get_img_data = $this->db->get_where('gel_cong',['freeze_id'=>$freeze_id]);

		if($get_img_data->num_rows() > 0){
			$old_img = $get_img_data->row();
		}
		else{
			$old_img = $get_img_data->row();
		}
		unlink('DomesticImages/'.$old_img->image_one);
		unlink('DomesticImages/'.$old_img->image_two);
		unlink('DomesticImages/'.$old_img->image_three);
		unlink('DomesticImages/'.$old_img->image_four);


		$del = $this->db->where('freeze_id', $freeze_id)
    					->delete('gel_cong');

    	if($del){
    		return true;
    	}
    	else{
    		return false;
    	}
	}

	// Freezers Info Section End

	//Particular Info Section Start

	function getSoldParticular($vend_id){
		$sold = $this->db->get_where('particulares',['vend_id'=>$vend_id,'product_status'=>'Vendido']);

		if($sold->num_rows() > 0){
			return $sold->result();
		}
		else{
			return $sold->result();
		}
	}

	function getOnlineParticular($vend_id){
		$get_online = $this->db->get_where('particulares',['vend_id'=>$vend_id,'product_status'=>'Active']);

		if($get_online->num_rows() > 0){
			return $get_online->result();
		}
		else{
			return $get_online->result();
		}
	}

	function getSuspended($vend_id){
		$get_suspended = $this->db->get_where('particulares',['vend_id'=>$vend_id,'product_status'=>'Suspended']);

		if($get_suspended->num_rows() > 0){
			return $get_suspended->result();
		}
		else
			return $get_suspended->result();
	}


	//Method to get information that will be used to edit cars

	function GetBrandName(){
		$item = $this->db->get_where('produtos',['nome_produto'=>'Carros']);
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

	function Editar_Produto($part_id){
		$part_car = $this->db->get_where('particulares',['part_id'=>$part_id]);
		if($part_car->num_rows() > 0){
			return $part_car->row();
		}
		else
			return $part_car->row();
	}

	function Update_Produto($part_id){
		$data = [
			'part_title'=>$this->input->post('update_title'),
			'part_modelo'=>$this->input->post('update_modelo'),
			'mobile_brand'=>$this->input->post('update_marca'),
			'part_cor'=>$this->input->post('update_cor'),
			'part_quilometragem'=>$this->input->post('update_quilometragem'),
			'part_combustivel'=>$this->input->post('update_combustivel'),
			'part_ano'=>$this->input->post('update_ano'),
			'part_transmissao'=>$this->input->post('update_transmissao'),
			'part_tipocarro'=>$this->input->post('update_tipo'),
			'part_descricao'=>$this->input->post('update_descricao'),
			'product_price'=>$this->input->post('update_preco'),
			'data_cadastro'=>date('Y-m-d')
		];

		$update_car_particular = $this->db->where('part_id',$part_id)
										  ->update('particulares',$data);
			if($update_car_particular){
				return true;
			}
			else
				return false;
	}

	function car_image_update($img,$img_pos,$part_id){
		$get_img_data = $this->db->get_where('particulares',['part_id'=>$part_id]);

		if($get_img_data->num_rows() > 0){
			$old_img = $get_img_data->row();
		}
		else{
			$old_img = $get_img_data->row();
		}

		if($img_pos == "1"){
			unlink('CarrsImages/'.$old_img->image_one);
			$data = ['image_one'=>$img];
		}
		elseif($img_pos == "2"){
			unlink('CarrsImages/'.$old_img->image_two);
			$data = ['image_two'=>$img];
		}
		elseif ($img_pos == "3") {
			unlink('CarrsImages/'.$old_img->image_three);
			$data = ['image_three'=>$img];
		}
		elseif ($img_pos == "4") {
			unlink('CarrsImages/'.$old_img->image_four);
			$data = ['image_four'=>$img];
		}
		else{
			return false;
		}
		$update_img = $this->db->where('part_id',$part_id)
				 			   ->update('particulares',$data);

		if($update_img){
			return true;
		}
		else{
			return false;
		}
	}

	function remove_product($part_id){

		$get_img_data = $this->db->get_where('particulares',['part_id'=>$part_id]);

		if($get_img_data->num_rows() > 0){
			$old_img = $get_img_data->row();
		}
		else{
			$old_img = $get_img_data->row();
		}
		unlink('CarrsImages/'.$old_img->image_one);
		unlink('CarrsImages/'.$old_img->image_two);
		unlink('CarrsImages/'.$old_img->image_three);
		unlink('CarrsImages/'.$old_img->image_four);


		$del = $this->db->where('part_id', $part_id)
    					->delete('particulares');

    	if($del){
    		return true;
    	}
    	else{
    		return false;
    	}

	}

	function set_status($part_id){
		$set = [
			'product_status'=>$this->input->post('status'),
			'data_cadastro'=>date('Y-m-d')
		];

		$update = $this->db->where('part_id',$part_id)
						   ->update('particulares',$set);
		if($update){
			return true;
		}
		else{
			return false;
		}
				
	}

	//Categoria Eletrodomesticos
	/* Geleiras & Congeladores Section Start */

	function InsertFreeze($vend_id){
		$freeze_title = $this->input->post('freeze_title');
		$mobile_brand = $this->input->post('mobile_brand');
		$freeze_type = $this->input->post('freeze_type');
		$freeze_size = $this->input->post('freeze_size');
		$freeze_cor = $this->input->post('freeze_cor');
        $freeze_descricao = $this->input->post('freeze_descricao');
        $product_price = $this->input->post('product_price');

        $insert_freeze = $this->db->insert('gel_cong',[
        	'freeze_title'=>$freeze_title,
        	'mobile_brand'=>$mobile_brand,
        	'freeze_type'=>$freeze_type,
        	'freeze_size'=>$freeze_size,
        	'freeze_cor'=>$freeze_cor,
        	'freeze_descricao'=>$freeze_descricao,
        	'freeze_categoria'=>'Eletrodomesticos',
        	'product_status'=>'Active',
        	'product_price'=>$product_price,
        	'data_cadastro'=>date('Y-m-d'),
        	'vend_id'=>$vend_id]);

        if($insert_freeze){
        	return $this->db->insert_id();
        }
        else{
        	return false;
        }
	}

	function InsertGelImages(){
		$config['upload_path'] = "./DomesticImages";
		$config['allowed_types'] = "jpg|jpeg|png|gif";
		$this->load->library('upload',$config);

		$prod_id = $this->input->post('product_id');

		$i_one = $this->upload->do_upload('image_one').$this->upload->data('file_name');
		$i_two = $this->upload->do_upload('image_two').$this->upload->data('file_name');

		$img_one = substr($i_one, 1);
		$img_two = substr($i_two, 1);
		
		$update_img = $this->db->where('freeze_id ',$prod_id)
				 			   ->update('gel_cong',['image_one'=>$img_one,'image_two'=>$img_two]);

				 if($update_img){
				 	$get_p_detail = $this->db->get_where('gel_cong',['freeze_id '=>$prod_id]);
				 	if($get_p_detail->num_rows() > 0){
				 		return $get_p_detail->row();
				 	}
				 	else{
				 		return false;
				 	}
				 }
				 else{
				 	return false;
				 }
	}

	/* Geleiras & Congeladores Section End */

	/* Fogoes Section Start */

	function InsertFogao($vend_id){
		$fog_title = $this->input->post('fog_title');
		$fog_number = $this->input->post('fog_number');
		$fog_type = $this->input->post('fog_type');
		$fog_cor = $this->input->post('fog_cor');
        $fog_descricao = $this->input->post('fog_descricao');
        $product_price = $this->input->post('product_price');

        $insert_fog = $this->db->insert('fogoes',[
        	'fog_title'=>$fog_title,
        	'fog_number'=>$fog_number,
        	'fog_type'=>$fog_type,
        	'fog_descricao'=>$fog_descricao,
        	'fog_cor'=>$fog_cor,
        	'fog_categoria'=>'Eletrodomesticos',
        	'product_status'=>'Active',
        	'product_price'=>$product_price,
        	'data_cadastro'=>date('Y-m-d'),
        	'vend_id'=>$vend_id]);

        if($insert_fog){
        	return $this->db->insert_id();
        }
        else{
        	return false;
        }
	}

	function InsertFogImages(){
		$config['upload_path'] = "./DomesticImages";
		$config['allowed_types'] = "jpg|jpeg|png|gif";
		$this->load->library('upload',$config);

		$prod_id = $this->input->post('product_id');

		$i_one = $this->upload->do_upload('image_one').$this->upload->data('file_name');
		$i_two = $this->upload->do_upload('image_two').$this->upload->data('file_name');
		$i_three = $this->upload->do_upload('image_three').$this->upload->data('file_name');
		$i_four = $this->upload->do_upload('image_four').$this->upload->data('file_name');

		$img_one = substr($i_one, 1);
		$img_two = substr($i_two, 1);
		$img_three = substr($i_three, 1);
		$img_four = substr($i_four, 1);
		
		$update_img = $this->db->where('fog_id ',$prod_id)
				 			   ->update('fogoes',['image_one'=>$img_one,'image_two'=>$img_two,'image_three'=>$img_three,'image_four'=>$img_four]);

				 if($update_img){
				 	$get_p_detail = $this->db->get_where('fogoes',['fog_id '=>$prod_id]);
				 	if($get_p_detail->num_rows() > 0){
				 		return $get_p_detail->row();
				 	}
				 	else{
				 		return false;
				 	}
				 }
				 else{
				 	return false;
				 }
	}
	
	/* Fogoes Section End */

	/* TV's section Start */

	function InsertTvInfo($vend_id){
		$tv_title = $this->input->post('tv_title');
		$tv_brand = $this->input->post('mobile_brand');
		$tv_size = $this->input->post('tv_size');
		$tv_cor = $this->input->post('tv_cor');
        $tv_descricao = $this->input->post('tv_descricao');
        $product_price = $this->input->post('product_price');

        $insert_fog = $this->db->insert('televisores',[
        	'tv_title'=>$tv_title,
        	'tv_brand'=>$tv_brand,
        	'tv_size'=>$tv_size,
        	'tv_descricao'=>$tv_descricao,
        	'tv_cor'=>$tv_cor,
        	'tv_categoria'=>'Eletrodomesticos',
        	'product_status'=>'Active',
        	'product_price'=>$product_price,
        	'data_cadastro'=>date('Y-m-d'),
        	'vend_id'=>$vend_id]);

        if($insert_fog){
        	return $this->db->insert_id();
        }
        else{
        	return false;
        }
	}

	function InsertTvImages(){
		$config['upload_path'] = "./DomesticImages";
		$config['allowed_types'] = "jpg|jpeg|png|gif";
		$this->load->library('upload',$config);

		$prod_id = $this->input->post('product_id');

		$i_one = $this->upload->do_upload('image_one').$this->upload->data('file_name');
		$i_two = $this->upload->do_upload('image_two').$this->upload->data('file_name');

		$img_one = substr($i_one, 1);
		$img_two = substr($i_two, 1);
		
		$update_img = $this->db->where('tv_id ',$prod_id)
				 			   ->update('televisores',['image_one'=>$img_one,'image_two'=>$img_two]);

				 if($update_img){
				 	$get_p_detail = $this->db->get_where('televisores',['tv_id '=>$prod_id]);
				 	if($get_p_detail->num_rows() > 0){
				 		return $get_p_detail->row();
				 	}
				 	else{
				 		return false;
				 	}
				 }
				 else{
				 	return false;
				 }
	}

	/* TV's section End */

	/* Eletrodomestic Acessories Section Start */


	function InsertEletrodAcc($vend_id){
		$ac_title = $this->input->post('ac_title');
		$ac_brand = $this->input->post('ac_brand');
        $ac_descricao = $this->input->post('ac_descricao');
        $product_price = $this->input->post('product_price');

        $insert_ac = $this->db->insert('acessorioseletrodomesticos',[
        	'ac_title'=>$ac_title,
        	'ac_brand'=>$ac_brand,
        	'ac_descricao'=>$ac_descricao,
        	'categoria'=>'Acessorios',
        	'product_status'=>'Active',
        	'product_price'=>$product_price,
        	'data_cadastro'=>date('Y-m-d'),
        	'vend_id'=>$vend_id]);

        if($insert_ac){
        	return $this->db->insert_id();
        }
        else{
        	return false;
        }
	}

	function InsertEletroAccImages(){
		$config['upload_path'] = "./DomesticImages";
		$config['allowed_types'] = "jpg|jpeg|png|gif";
		$this->load->library('upload',$config);

		$prod_id = $this->input->post('product_id');

		$i_one = $this->upload->do_upload('image_one').$this->upload->data('file_name');
		$i_two = $this->upload->do_upload('image_two').$this->upload->data('file_name');

		$img_one = substr($i_one, 1);
		$img_two = substr($i_two, 1);
		
		$update_img = $this->db->where('ac_id ',$prod_id)
				 			   ->update('acessorioseletrodomesticos',['image_one'=>$img_one,'image_two'=>$img_two]);

				 if($update_img){
				 	$get_p_detail = $this->db->get_where('acessorioseletrodomesticos',['ac_id '=>$prod_id]);
				 	if($get_p_detail->num_rows() > 0){
				 		return $get_p_detail->row();
				 	}
				 	else{
				 		return false;
				 	}
				 }
				 else{
				 	return false;
				 }
	}

	/* Eletrodomestic Acessories Section End */

	/* Eletronic Section Start */

	function InsertCellInfo($vend_id){
		$cel_title = $this->input->post('cel_title');
		$mobile_brand = $this->input->post('mobile_brand');
        $cel_modelo = $this->input->post('cel_modelo');
        $cel_cor = $this->input->post('cel_cor');
        $cel_cards = $this->input->post('cel_cards');
        $cel_processor = $this->input->post('cel_processor');
        $cel_ram = $this->input->post('cel_ram');
        $cel_storage = $this->input->post('cel_storage');
        $cel_battery_size = $this->input->post('cel_battery_size');
        $cel_descricao = $this->input->post('cel_descricao');
        $cel_camera = $this->input->post('cel_camera');
        $product_price = $this->input->post('product_price');

        $insert_cell = $this->db->insert('celulares',[
        	'cel_title'=>$cel_title,
        	'mobile_brand'=>$mobile_brand,
        	'cel_modelo'=>$cel_modelo,
        	'cel_cor'=>$cel_cor,
        	'cel_cards'=>$cel_cards,
        	'cel_processor'=>$cel_processor,
        	'cel_ram'=>$cel_ram,
        	'cel_storage'=>$cel_storage,
        	'cel_battery_size'=>$cel_battery_size,
        	'cel_descricao'=>$cel_descricao,
        	'cel_camera'=>$cel_camera,
        	'categoria'=>'Eletronicos',
        	'product_status'=>'Active',
        	'product_price'=>$product_price,
        	'data_cadastro'=>date('Y-m-d'),
        	'vend_id'=>$vend_id]);

        if($insert_cell){
        	return $this->db->insert_id();
        }
        else{
        	return false;
        }
	}

	function InsertCellImages(){
		$config['upload_path'] = "./EletronicImages";
		$config['allowed_types'] = "jpg|jpeg|png|gif";
		$this->load->library('upload',$config);

		$prod_id = $this->input->post('product_id');

		$i_one = $this->upload->do_upload('image_one').$this->upload->data('file_name');
		$i_two = $this->upload->do_upload('image_two').$this->upload->data('file_name');
		$i_three = $this->upload->do_upload('image_three').$this->upload->data('file_name');
		$i_four = $this->upload->do_upload('image_four').$this->upload->data('file_name');

		$img_one = substr($i_one, 1);
		$img_two = substr($i_two, 1);
		$img_three = substr($i_three, 1);
		$img_four = substr($i_four, 1);
		
		$update_img = $this->db->where('cel_id ',$prod_id)
				 			   ->update('celulares',['image_one'=>$img_one,'image_two'=>$img_two,'image_three'=>$img_three,'image_four'=>$img_four]);

				 if($update_img){
				 	$get_p_detail = $this->db->get_where('celulares',['cel_id '=>$prod_id]);
				 	if($get_p_detail->num_rows() > 0){
				 		return $get_p_detail->row();
				 	}
				 	else{
				 		return false;
				 	}
				 }
				 else{
				 	return false;
				 }

	}

	//Mobile Editing Section Start 
	function Editar_Mobile($cel_id){
		$mobile = $this->db->get_where('celulares',['cel_id'=>$cel_id]);
		if($mobile->num_rows() > 0){
			return $mobile->row();
		}
		else
			return $mobile->row();	
	}

	function GetMobileName(){
		$item = $this->db->get_where('produtos',['nome_produto'=>'Celulares']);
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

	function Update_Mobile($cel_id){
		$data = [
			'cel_title'=>$this->input->post('cel_title'),
			'mobile_brand'=>$this->input->post('update_marca'),
			'cel_modelo'=>$this->input->post('cel_modelo'),
			'cel_cor'=>$this->input->post('cel_cor'),
			'cel_cards'=>$this->input->post('cel_cards'),
			'cel_processor'=>$this->input->post('cel_processor'),
			'cel_ram'=>$this->input->post('cel_ram'),
			'cel_storage'=>$this->input->post('cel_storage'),
			'cel_battery_size'=>$this->input->post('cel_battery_size'),
			'cel_camera'=>$this->input->post('cel_camera'),
			'cel_descricao'=>$this->input->post('cel_descricao'),
			'product_price'=>$this->input->post('product_price'),
			'data_cadastro'=>date('Y-m-d')
		];

		$update_freeze = $this->db->where('cel_id',$cel_id)
										  ->update('celulares',$data);
			if($update_freeze){
				return true;
			}
			else
				return false;
	}

	function mobile_image_update($img,$img_pos,$cel_id){
		$get_img_data = $this->db->get_where('celulares',['cel_id'=>$cel_id]);

		if($get_img_data->num_rows() > 0){
			$old_img = $get_img_data->row();
		}
		else{
			$old_img = $get_img_data->row();
		}

		if($img_pos == "1"){
			unlink('EletronicImages/'.$old_img->image_one);
			$data = ['image_one'=>$img];
		}
		elseif($img_pos == "2"){
			unlink('EletronicImages/'.$old_img->image_two);
			$data = ['image_two'=>$img];
		}
		elseif ($img_pos == "3") {
			unlink('EletronicImages/'.$old_img->image_three);
			$data = ['image_three'=>$img];
		}
		elseif ($img_pos == "4") {
			unlink('EletronicImages/'.$old_img->image_four);
			$data = ['image_four'=>$img];
		}
		else{
			return false;
		}
		$update_img = $this->db->where('cel_id',$cel_id)
				 			   ->update('celulares',$data);

		if($update_img){
			return true;
		}
		else{
			return false;
		}
	}

	function set_mobile_status($cel_id){
		$set = [
			'product_status'=>$this->input->post('status'),
			'data_cadastro'=>date('Y-m-d')
		];

		$update = $this->db->where('cel_id',$cel_id)
						   ->update('celulares',$set);
		if($update){
			return true;
		}
		else{
			return false;
		}
	}

	function remove_mobile($cel_id){
		$get_img_data = $this->db->get_where('celulares',['cel_id'=>$cel_id]);

		if($get_img_data->num_rows() > 0){
			$old_img = $get_img_data->row();
		}
		else{
			$old_img = $get_img_data->row();
		}
		unlink('EletronicImages/'.$old_img->image_one);
		unlink('EletronicImages/'.$old_img->image_two);
		unlink('EletronicImages/'.$old_img->image_three);
		unlink('EletronicImages/'.$old_img->image_four);


		$del = $this->db->where('cel_id', $cel_id)
    					->delete('celulares');

    	if($del){
    		return true;
    	}
    	else{
    		return false;
    	}
	}

	function getOnlineMobile($vend_id){
		$get_online = $this->db->get_where('celulares',['vend_id'=>$vend_id,'product_status'=>'Active']);

		if($get_online->num_rows() > 0){
			return $get_online->result();
		}
		else{
			return $get_online->result();
		}
	}

	function getSoldMobile($vend_id){
		$get_sold = $this->db->get_where('celulares',['vend_id'=>$vend_id,'product_status'=>'Vendido']);

		if($get_sold->num_rows() > 0){
			return $get_sold->result();
		}
		else{
			return $get_sold->result();
		} 
	}

	function getsuspendedMobile($vend_id){
		$get_suspended = $this->db->get_where('celulares',['vend_id'=>$vend_id,'product_status'=>'Suspended']);

		if($get_suspended->num_rows() > 0){
			return $get_suspended->result();
		}
		else{
			return $get_suspended->result();
		}
	}

	//Mobile Editing Section End

	//Laptop Editing Section Start

	function getOnlineLap($vend_id){
		$get_online = $this->db->get_where('laptops',['vend_id'=>$vend_id,'product_status'=>'Active']);

		if($get_online->num_rows() > 0){
			return $get_online->result();
		}
		else{
			return $get_online->result();
		}
	}

	function getSoldLap($vend_id){
		$get_sold = $this->db->get_where('laptops',['vend_id'=>$vend_id,'product_status'=>'Vendido']);

		if($get_sold->num_rows() > 0){
			return $get_sold->result();
		}
		else
			return $get_sold->result();
	}

	function getSuspendedLap($vend_id){
		$get_suspended = $this->db->get_where('laptops',['vend_id'=>$vend_id,'product_status'=>'Suspended']);

		if($get_suspended->num_rows() > 0){
			return $get_suspended->result();
		}
		else
			return $get_suspended->result();
	}

	function Editar_Laptop($lap_id){
		$laps = $this->db->get_where('laptops',['lap_id'=>$lap_id]);
		if($laps->num_rows() > 0){
			return $laps->row();
		}
		else
			return $laps->row();
	}

	function GetLapBrand(){
		$item = $this->db->get_where('produtos',['nome_produto'=>'Computadores']);
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

	function Update_Laptop($lap_id){
		$data = [
			'lap_title'=>$this->input->post('lap_title'),
			'mobile_brand'=>$this->input->post('update_marca'),
			'lap_so'=>$this->input->post('lap_so'),
			'lap_ram'=>$this->input->post('lap_ram'),
			'lap_processor'=>$this->input->post('lap_processor'),
			'lap_size'=>$this->input->post('lap_size'),
			'lap_hdd'=>$this->input->post('lap_hdd'),
			'lap_descricao'=>$this->input->post('lap_descricao'),
			'product_price'=>$this->input->post('product_price'),
			'data_cadastro'=>date('Y-m-d')
		];

		$update_lap = $this->db->where('lap_id',$lap_id)
										  ->update('laptops',$data);
			if($update_lap){
				return true;
			}
			else
				return false;	
	}

	function laptop_image_update($img,$img_pos,$lap_id){
		$get_img_data = $this->db->get_where('laptops',['lap_id'=>$lap_id]);

		if($get_img_data->num_rows() > 0){
			$old_img = $get_img_data->row();
		}
		else{
			$old_img = $get_img_data->row();
		}

		if($img_pos == "1"){
			unlink('EletronicImages/'.$old_img->image_one);
			$data = ['image_one'=>$img];
		}
		elseif($img_pos == "2"){
			unlink('EletronicImages/'.$old_img->image_two);
			$data = ['image_two'=>$img];
		}
		elseif ($img_pos == "3") {
			unlink('EletronicImages/'.$old_img->image_three);
			$data = ['image_three'=>$img];
		}
		elseif ($img_pos == "4") {
			unlink('EletronicImages/'.$old_img->image_four);
			$data = ['image_four'=>$img];
		}
		else{
			return false;
		}
		$update_img = $this->db->where('lap_id',$lap_id)
				 			   ->update('laptops',$data);

		if($update_img){
			return true;
		}
		else{
			return false;
		}
	}

	function set_laptop_status($lap_id){
		$set = [
			'product_status'=>$this->input->post('status'),
			'data_cadastro'=>date('Y-m-d')
		];

		$update = $this->db->where('lap_id',$lap_id)
						   ->update('laptops',$set);
		if($update){
			return true;
		}
		else{
			return false;
		}
	}

	function remove_laptop($lap_id){
		$get_img_data = $this->db->get_where('laptops',['lap_id'=>$lap_id]);

		if($get_img_data->num_rows() > 0){
			$old_img = $get_img_data->row();
		}
		else{
			$old_img = $get_img_data->row();
		}
		unlink('EletronicImages/'.$old_img->image_one);
		unlink('EletronicImages/'.$old_img->image_two);
		unlink('EletronicImages/'.$old_img->image_three);
		unlink('EletronicImages/'.$old_img->image_four);


		$del = $this->db->where('lap_id', $lap_id)
    					->delete('laptops');

    	if($del){
    		return true;
    	}
    	else{
    		return false;
    	}
	}

	//Laptop Editing Section End

	/*Desktop Section Start */

	function InsertDeskInfo($vend_id){
		$desk_title = $this->input->post('desk_title');
		$mobile_brand = $this->input->post('mobile_brand');
        $desk_monitor = $this->input->post('desk_monitor');
        $desk_so = $this->input->post('desk_so');
        $desk_processor = $this->input->post('desk_processor');
        $desk_hdd = $this->input->post('desk_hdd');
        $desk_ram = $this->input->post('desk_ram');
        $desk_descricao = $this->input->post('desk_descricao');
        $product_price = $this->input->post('product_price');

        $insert_desk = $this->db->insert('desktop',[
        	'desk_title'=>$desk_title,
        	'mobile_brand'=>$mobile_brand,
        	'desk_monitor'=>$desk_monitor,
        	'desk_so'=>$desk_so,
        	'desk_processor'=>$desk_processor,
        	'desk_hdd'=>$desk_hdd,
        	'desk_ram'=>$desk_ram,
        	'desk_descricao'=>$desk_descricao,
        	'categoria'=>'Eletronicos',
        	'product_status'=>'Active',
        	'product_price'=>$product_price,
        	'data_cadastro'=>date('Y-m-d'),
        	'vend_id'=>$vend_id]);

        if($insert_desk){
        	return $this->db->insert_id();
        }
        else{
        	return false;
        }
	}

	function InsertDeskImages(){
		$config['upload_path'] = "./EletronicImages";
		$config['allowed_types'] = "jpg|jpeg|png|gif";
		$this->load->library('upload',$config);

		$prod_id = $this->input->post('product_id');

		$i_one = $this->upload->do_upload('image_one').$this->upload->data('file_name');
		$i_two = $this->upload->do_upload('image_two').$this->upload->data('file_name');
		$i_three = $this->upload->do_upload('image_three').$this->upload->data('file_name');
		$i_four = $this->upload->do_upload('image_four').$this->upload->data('file_name');

		$img_one = substr($i_one, 1);
		$img_two = substr($i_two, 1);
		$img_three = substr($i_three, 1);
		$img_four = substr($i_four, 1);
		
		$update_img = $this->db->where('desk_id ',$prod_id)
				 			   ->update('desktop',['image_one'=>$img_one,'image_two'=>$img_two,'image_three'=>$img_three,'image_four'=>$img_four]);

				 if($update_img){
				 	$get_p_detail = $this->db->get_where('desktop',['desk_id '=>$prod_id]);
				 	if($get_p_detail->num_rows() > 0){
				 		return $get_p_detail->row();
				 	}
				 	else{
				 		return false;
				 	}
				 }
				 else{
				 	return false;
				 }
	}

	/*Desktop Section End */

	/*Laptops Section Start */

	function InsertLapInfo($vend_id){
		$lap_title = $this->input->post('lap_title');
		$mobile_brand = $this->input->post('mobile_brand');
        $lap_size = $this->input->post('lap_size');
        $lap_so = $this->input->post('lap_so');
        $lap_processor = $this->input->post('lap_processor');
        $lap_hdd = $this->input->post('lap_hdd');
        $lap_ram = $this->input->post('lap_ram');
        $lap_descricao = $this->input->post('lap_descricao');
        $product_price = $this->input->post('product_price');

        $insert_desk = $this->db->insert('laptops',[
        	'lap_title'=>$lap_title,
        	'mobile_brand'=>$mobile_brand,
        	'lap_size'=>$lap_size,
        	'lap_so'=>$lap_so,
        	'lap_processor'=>$lap_processor,
        	'lap_hdd'=>$lap_hdd,
        	'lap_ram'=>$lap_ram,
        	'lap_descricao'=>$lap_descricao,
        	'categoria'=>'Eletronicos',
        	'product_status'=>'Active',
        	'product_price'=>$product_price,
        	'data_cadastro'=>date('Y-m-d'),
        	'vend_id'=>$vend_id]);

        if($insert_desk){
        	return $this->db->insert_id();
        }
        else{
        	return false;
        }
	}

	function InsertLapImages(){
		$config['upload_path'] = "./EletronicImages";
		$config['allowed_types'] = "jpg|jpeg|png|gif";
		$this->load->library('upload',$config);

		$prod_id = $this->input->post('product_id');

		$i_one = $this->upload->do_upload('image_one').$this->upload->data('file_name');
		$i_two = $this->upload->do_upload('image_two').$this->upload->data('file_name');
		$i_three = $this->upload->do_upload('image_three').$this->upload->data('file_name');
		$i_four = $this->upload->do_upload('image_four').$this->upload->data('file_name');

		$img_one = substr($i_one, 1);
		$img_two = substr($i_two, 1);
		$img_three = substr($i_three, 1);
		$img_four = substr($i_four, 1);
		
		$update_img = $this->db->where('lap_id ',$prod_id)
				 			   ->update('laptops',['image_one'=>$img_one,'image_two'=>$img_two,'image_three'=>$img_three,'image_four'=>$img_four]);

				 if($update_img){
				 	$get_p_detail = $this->db->get_where('laptops',['lap_id '=>$prod_id]);
				 	if($get_p_detail->num_rows() > 0){
				 		return $get_p_detail->row();
				 	}
				 	else{
				 		return false;
				 	}
				 }
				 else{
				 	return false;
				 }
	}

	/*Laptops Section End */

	/* Tablets Section Start */

	function InsertTabInfo($vend_id){
		$tab_title = $this->input->post('tab_title');
		$mobile_brand = $this->input->post('mobile_brand');
        $tab_modelo = $this->input->post('tab_modelo');
        $tab_cor = $this->input->post('tab_cor');
        $tab_cards = $this->input->post('tab_cards');
        $tab_processor = $this->input->post('tab_processor');
        $tab_ram = $this->input->post('tab_ram');
        $tab_storage = $this->input->post('tab_storage');
        $tab_battery_size = $this->input->post('tab_battery_size');
        $tab_descricao = $this->input->post('tab_descricao');
        $tab_camera = $this->input->post('tab_camera');
        $product_price = $this->input->post('product_price');

        $insert_cell = $this->db->insert('tablets',[
        	'tab_title'=>$tab_title,
        	'mobile_brand'=>$mobile_brand,
        	'tab_modelo'=>$tab_modelo,
        	'tab_cor'=>$tab_cor,
        	'tab_cards'=>$tab_cards,
        	'tab_processor'=>$tab_processor,
        	'tab_ram'=>$tab_ram,
        	'tab_storage'=>$tab_storage,
        	'tab_battery_size'=>$tab_battery_size,
        	'tab_descricao'=>$tab_descricao,
        	'tab_camera'=>$tab_camera,
        	'categoria'=>'Eletronicos',
        	'product_status'=>'Active',
        	'product_price'=>$product_price,
        	'data_cadastro'=>date('Y-m-d'),
        	'vend_id'=>$vend_id]);

        if($insert_cell){
        	return $this->db->insert_id();
        }
        else{
        	return false;
        }	
    }

    function InsertTabImages(){
    	$config['upload_path'] = "./EletronicImages";
		$config['allowed_types'] = "jpg|jpeg|png|gif";
		$this->load->library('upload',$config);

		$prod_id = $this->input->post('product_id');

		$i_one = $this->upload->do_upload('image_one').$this->upload->data('file_name');
		$i_two = $this->upload->do_upload('image_two').$this->upload->data('file_name');
		$i_three = $this->upload->do_upload('image_three').$this->upload->data('file_name');
		$i_four = $this->upload->do_upload('image_four').$this->upload->data('file_name');

		$img_one = substr($i_one, 1);
		$img_two = substr($i_two, 1);
		$img_three = substr($i_three, 1);
		$img_four = substr($i_four, 1);
		
		$update_img = $this->db->where('tab_id ',$prod_id)
				 			   ->update('tablets',['image_one'=>$img_one,'image_two'=>$img_two,'image_three'=>$img_three,'image_four'=>$img_four]);

				 if($update_img){
				 	$get_p_detail = $this->db->get_where('tablets',['tab_id '=>$prod_id]);
				 	if($get_p_detail->num_rows() > 0){
				 		return $get_p_detail->row();
				 	}
				 	else{
				 		return false;
				 	}
				 }
				 else{
				 	return false;
				 }
    }

	/* Tablets Sectoin End */

	/* Printer Section Start */
	

	function InsertPrinterInfo($vend_id){
		$print_title = $this->input->post('print_title');
		$mobile_brand = $this->input->post('mobile_brand');
        $print_descricao = $this->input->post('print_descricao');
        $product_price = $this->input->post('product_price');

        $insert_ac = $this->db->insert('impressoras',[
        	'print_title'=>$print_title,
        	'mobile_brand'=>$mobile_brand,
        	'print_descricao'=>$print_descricao,
        	'categoria'=>'Eletronicos',
        	'product_status'=>'Active',
        	'product_price'=>$product_price,
        	'data_cadastro'=>date('Y-m-d'),
        	'vend_id'=>$vend_id]);

        if($insert_ac){
        	return $this->db->insert_id();
        }
        else{
        	return false;
        }
	}

	function InsertPrintImages(){
		$config['upload_path'] = "./EletronicImages";
		$config['allowed_types'] = "jpg|jpeg|png|gif";
		$this->load->library('upload',$config);

		$prod_id = $this->input->post('product_id');

		$i_one = $this->upload->do_upload('image_one').$this->upload->data('file_name');
		$i_two = $this->upload->do_upload('image_two').$this->upload->data('file_name');
		$i_three = $this->upload->do_upload('image_three').$this->upload->data('file_name');
		$i_four = $this->upload->do_upload('image_four').$this->upload->data('file_name');

		$img_one = substr($i_one, 1);
		$img_two = substr($i_two, 1);
		$img_three = substr($i_three, 1);
		$img_four = substr($i_four, 1);
		
		$update_img = $this->db->where('print_id ',$prod_id)
				 			   ->update('impressoras',['image_one'=>$img_one,'image_two'=>$img_two,'image_three'=>$img_three,'image_four'=>$img_four]);

				 if($update_img){
				 	$get_p_detail = $this->db->get_where('impressoras',['print_id '=>$prod_id]);
				 	if($get_p_detail->num_rows() > 0){
				 		return $get_p_detail->row();
				 	}
				 	else{
				 		return false;
				 	}
				 }
				 else{
				 	return false;
				 }
	}

	/* Printer Section End */

	/* Eletronic Accessories Section Start */

	function InsertAccEletronic($vend_id){
		$ac_title = $this->input->post('ac_title');
		$ac_brand = $this->input->post('ac_brand');
        $ac_descricao = $this->input->post('ac_descricao');
        $product_price = $this->input->post('product_price');

        $insert_ac = $this->db->insert('acc_eletro',[
        	'ac_title'=>$ac_title,
        	'ac_brand'=>$ac_brand,
        	'ac_descricao'=>$ac_descricao,
        	'categoria'=>'Acessorios',
        	'product_status'=>'Active',
        	'product_price'=>$product_price,
        	'data_cadastro'=>date('Y-m-d'),
        	'vend_id'=>$vend_id]);

        if($insert_ac){
        	return $this->db->insert_id();
        }
        else{
        	return false;
        }
	}

	function InsertAccEltroImages(){
		$config['upload_path'] = "./EletronicImages";
		$config['allowed_types'] = "jpg|jpeg|png|gif";
		$this->load->library('upload',$config);

		$prod_id = $this->input->post('product_id');

		$i_one = $this->upload->do_upload('image_one').$this->upload->data('file_name');
		$i_two = $this->upload->do_upload('image_two').$this->upload->data('file_name');
		
		$img_one = substr($i_one, 1);
		$img_two = substr($i_two, 1);
			
		$update_img = $this->db->where('acc_id ',$prod_id)
				 			   ->update('acc_eletro',['image_one'=>$img_one,'image_two'=>$img_two]);

				 if($update_img){
				 	$get_p_detail = $this->db->get_where('acc_eletro',['acc_id '=>$prod_id]);
				 	if($get_p_detail->num_rows() > 0){
				 		return $get_p_detail->row();
				 	}
				 	else{
				 		return false;
				 	}
				 }
				 else{
				 	return false;
				 }
	}

	/* Eletronic Section End */

	/* Men Fashion Section Start */

	/* Shirts Section Start */

	function InsertShirtInfo($vend_id){
		$shirt_title = $this->input->post('shirt_title');
		$shirt_size = $this->input->post('shirt_size');
        $shirt_descricao = $this->input->post('shirt_descricao');
        $product_price = $this->input->post('product_price');

        $insert_sh = $this->db->insert('shirts',[
        	'shirt_title'=>$shirt_title,
        	'shirt_size'=>$shirt_size,
        	'shirt_descricao'=>$shirt_descricao,
        	'categoria'=>'Moda Masculina',
        	'product_status'=>'Active',
        	'product_price'=>$product_price,
        	'data_cadastro'=>date('Y-m-d'),
        	'vend_id'=>$vend_id]);

        if($insert_sh){
        	return $this->db->insert_id();
        }
        else{
        	return false;
        }

	}

	function InsertShirtImages(){
		$config['upload_path'] = "./MenImages";
		$config['allowed_types'] = "jpg|jpeg|png|gif";
		$this->load->library('upload',$config);

		$prod_id = $this->input->post('product_id');

		$i_one = $this->upload->do_upload('image_one').$this->upload->data('file_name');
		$i_two = $this->upload->do_upload('image_two').$this->upload->data('file_name');
		
		$img_one = substr($i_one, 1);
		$img_two = substr($i_two, 1);
			
		$update_img = $this->db->where('shirt_id ',$prod_id)
				 			   ->update('shirts',['image_one'=>$img_one,'image_two'=>$img_two]);

				 if($update_img){
				 	$get_p_detail = $this->db->get_where('shirts',['shirt_id '=>$prod_id]);
				 	if($get_p_detail->num_rows() > 0){
				 		return $get_p_detail->row();
				 	}
				 	else{
				 		return false;
				 	}
				 }
				 else{
				 	return false;
				 }
	}

	function getMonlineShirt($vend_id){
		$get_onlineShirt = $this->db->get_where('shirts',['vend_id'=>$vend_id,'product_status'=>'Active']);

		if($get_onlineShirt->num_rows() > 0){
			return $get_onlineShirt->result();
		}
		else{
			return $get_onlineShirt->result();
		}
	}

	function getMsoldShirt($vend_id){
		$get_soldShirt = $this->db->get_where('shirts',['vend_id'=>$vend_id,'product_status'=>'Vendido']);

		if($get_soldShirt->num_rows() > 0){
			return $get_soldShirt->result();
		}
		else{
			return $get_soldShirt->result();
		}
	}

	function getMsuspended($vend_id){
		$get_suspendedShirt = $this->db->get_where('shirts',['vend_id'=>$vend_id,'product_status'=>'Suspended']);

		if($get_suspendedShirt->num_rows() > 0){
			return $get_suspendedShirt->result();
		}
		else{
			return $get_suspendedShirt->result();
		}
	}

	function Editar_Info($shirt_id){
		$sh = $this->db->get_where('shirts',['shirt_id'=>$shirt_id]);
		if($sh->num_rows() > 0){
			return $sh->row();
		}
		else
			return $sh->row();
	}

	function Update_Shirt($shirt_id){
		$data = [
			'shirt_title'=>$this->input->post('shirt_title'),
			'shirt_size'=>$this->input->post('shirt_size'),
			'shirt_descricao'=>$this->input->post('shirt_descricao'),
			'product_price'=>$this->input->post('product_price'),
			'data_cadastro'=>date('Y-m-d')
		];

		$update_shirt = $this->db->where('shirt_id',$shirt_id)
										  ->update('shirts',$data);
			if($update_shirt){
				return true;
			}
			else
				return false;
	}

	function shirt_image_update($img,$img_pos,$shirt_id){
		$get_img_data = $this->db->get_where('shirts',['shirt_id'=>$shirt_id]);

		if($get_img_data->num_rows() > 0){
			$old_img = $get_img_data->row();
		}
		else{
			$old_img = $get_img_data->row();
		}

		if($img_pos == "1"){
			unlink('MenImages/'.$old_img->image_one);
			$data = ['image_one'=>$img];
		}
		elseif($img_pos == "2"){
			unlink('MenImages/'.$old_img->image_two);
			$data = ['image_two'=>$img];
		}
		else{
			return false;
		}
		$update_img = $this->db->where('shirt_id',$shirt_id)
				 			   ->update('shirts',$data);

		if($update_img){
			return true;
		}
		else{
			return false;
		}
	}

	function set_shirt_status($shirt_id){
		$set = [
			'product_status'=>$this->input->post('status'),
			'data_cadastro'=>date('Y-m-d')
		];

		$update = $this->db->where('shirt_id',$shirt_id)
						   ->update('shirts',$set);
		if($update){
			return true;
		}
		else{
			return false;
		}
	}

	function remove_shirt($shirt_id){
		$get_img_data = $this->db->get_where('shirts',['shirt_id'=>$shirt_id]);

		if($get_img_data->num_rows() > 0){
			$old_img = $get_img_data->row();
		}
		else{
			$old_img = $get_img_data->row();
		}
		unlink('MenImages/'.$old_img->image_one);
		unlink('MenImages/'.$old_img->image_two);

		$del = $this->db->where('shirt_id', $shirt_id)
    					->delete('shirts');

    	if($del){
    		return true;
    	}
    	else{
    		return false;
    	}
	}

	/* Shirts Section End */

	/*Trousers Section Start */

	function InsertCalcInfo($vend_id){
		$calc_title = $this->input->post('calc_title');
		$calc_size = $this->input->post('calc_size');
        $calc_descricao = $this->input->post('calc_descricao');
        $product_price = $this->input->post('product_price');

        $insert_sh = $this->db->insert('trousers',[
        	'calc_title'=>$calc_title,
        	'calc_size'=>$calc_size,
        	'calc_descricao'=>$calc_descricao,
        	'categoria'=>'Moda Masculina',
        	'product_status'=>'Active',
        	'product_price'=>$product_price,
        	'data_cadastro'=>date('Y-m-d'),
        	'vend_id'=>$vend_id]);

        if($insert_sh){
        	return $this->db->insert_id();
        }
        else{
        	return false;
        }
	}

	function InsertCalcImages(){
		$config['upload_path'] = "./MenImages";
		$config['allowed_types'] = "jpg|jpeg|png|gif";
		$this->load->library('upload',$config);

		$prod_id = $this->input->post('product_id');

		$i_one = $this->upload->do_upload('image_one').$this->upload->data('file_name');
		$i_two = $this->upload->do_upload('image_two').$this->upload->data('file_name');
		
		$img_one = substr($i_one, 1);
		$img_two = substr($i_two, 1);
			
		$update_img = $this->db->where('trous_id ',$prod_id)
				 			   ->update('trousers',['image_one'=>$img_one,'image_two'=>$img_two]);

				 if($update_img){
				 	$get_p_detail = $this->db->get_where('trousers',['trous_id '=>$prod_id]);
				 	if($get_p_detail->num_rows() > 0){
				 		return $get_p_detail->row();
				 	}
				 	else{
				 		return false;
				 	}
				 }
				 else{
				 	return false;
				 }
	}


	/*Trousers Section End */

	/* FootWears Section Start */

	function InsertMfootInfo($vend_id){
		$mfoot_title = $this->input->post('mfoot_title');
		$mfoot_size = $this->input->post('mfoot_size');
        $mfoot_descricao = $this->input->post('mfoot_descricao');
        $product_price = $this->input->post('product_price');

        $insert_sh = $this->db->insert('footwears',[
        	'mfoot_title'=>$mfoot_title,
        	'mfoot_size'=>$mfoot_size,
        	'mfoot_descricao'=>$mfoot_descricao,
        	'categoria'=>'Moda Masculina',
        	'product_status'=>'Active',
        	'product_price'=>$product_price,
        	'data_cadastro'=>date('Y-m-d'),
        	'vend_id'=>$vend_id]);

        if($insert_sh){
        	return $this->db->insert_id();
        }
        else{
        	return false;
        }
	}

	function InsertMfootImages(){
		$config['upload_path'] = "./MenImages";
		$config['allowed_types'] = "jpg|jpeg|png|gif";
		$this->load->library('upload',$config);

		$prod_id = $this->input->post('product_id');

		$i_one = $this->upload->do_upload('image_one').$this->upload->data('file_name');
		$i_two = $this->upload->do_upload('image_two').$this->upload->data('file_name');
		
		$img_one = substr($i_one, 1);
		$img_two = substr($i_two, 1);
			
		$update_img = $this->db->where('mfoot_id ',$prod_id)
				 			   ->update('footwears',['image_one'=>$img_one,'image_two'=>$img_two]);

				 if($update_img){
				 	$get_p_detail = $this->db->get_where('footwears',['mfoot_id '=>$prod_id]);
				 	if($get_p_detail->num_rows() > 0){
				 		return $get_p_detail->row();
				 	}
				 	else{
				 		return false;
				 	}
				 }
				 else{
				 	return false;
				 }
	}

	/* FootWears Section End */

	/* Men Acessories Section Start */

	function InsertMenAcc($vend_id){
		$ac_title = $this->input->post('ac_title');
        $ac_descricao = $this->input->post('ac_descricao');
        $product_price = $this->input->post('product_price');

        $insert_ac = $this->db->insert('acc_men',[
        	'ac_title'=>$ac_title,
        	'ac_descricao'=>$ac_descricao,
        	'categoria'=>'Moda Masculina',
        	'product_status'=>'Active',
        	'product_price'=>$product_price,
        	'data_cadastro'=>date('Y-m-d'),
        	'vend_id'=>$vend_id]);

        if($insert_ac){
        	return $this->db->insert_id();
        }
        else{
        	return false;
        }	
	}

	function InsertMenAccImages(){
		$config['upload_path'] = "./MenImages";
		$config['allowed_types'] = "jpg|jpeg|png|gif";
		$this->load->library('upload',$config);

		$prod_id = $this->input->post('product_id');

		$i_one = $this->upload->do_upload('image_one').$this->upload->data('file_name');
		$i_two = $this->upload->do_upload('image_two').$this->upload->data('file_name');
		
		$img_one = substr($i_one, 1);
		$img_two = substr($i_two, 1);
			
		$update_img = $this->db->where('ac_id ',$prod_id)
				 			   ->update('acc_men',['image_one'=>$img_one,'image_two'=>$img_two]);

				 if($update_img){
				 	$get_p_detail = $this->db->get_where('acc_men',['ac_id '=>$prod_id]);
				 	if($get_p_detail->num_rows() > 0){
				 		return $get_p_detail->row();
				 	}
				 	else{
				 		return false;
				 	}
				 }
				 else{
				 	return false;
				 }
	}

	/* Men Acessories Section End */

	/* Women Fashion Section Start */

	function getOnlineWshirt($vend_id){
		$get_online = $this->db->get_where('wshirts',['vend_id'=>$vend_id,'product_status'=>'Active']);

		if($get_online->num_rows() > 0)
			return $get_online->result();
		else
			return $get_online->result();
	}

	function getSuspendedWshirt($vend_id){
		$get_suspended = $this->db->get_where('wshirts',['vend_id'=>$vend_id,'product_status'=>'Suspended']);
		if($get_suspended->num_rows() > 0)
			return $get_suspended->result();
		else
			return $get_suspended->result();
	}

	function getSoldWshirt($vend_id){
		$get_sold = $this->db->get_where('wshirts',['vend_id'=>$vend_id,'product_status'=>'Vendido']);

		if($get_sold->num_rows() > 0)
			return $get_sold->result();
		else
			return $get_sold->result();
	}

	function Editar_Blusas($wshirt_id){
		$get_blusa = $this->db->get_where('wshirts',['wshirt_id'=>$wshirt_id]);
		if($get_blusa->num_rows() > 0){
			return $get_blusa->row();
		}
		else
			return $get_blusa->row();
	}

	function Update_Wshirt($wshirt_id){
		$data = [
			'wshirt_title'=>$this->input->post('wshirt_title'),
			'wshirt_size'=>$this->input->post('wshirt_size'),
			'wshirt_descricao'=>$this->input->post('wshirt_descricao'),
			'product_price'=>$this->input->post('product_price'),
			'data_cadastro'=>date('Y-m-d')
		];

		$update_wshirt = $this->db->where('wshirt_id',$wshirt_id)
										  ->update('wshirts',$data);
			if($update_wshirt){
				return true;
			}
			else
				return false;
	}

	function wshirt_image_update($img,$img_pos,$wshirt_id){
		$get_img_data = $this->db->get_where('wshirts',['wshirt_id'=>$wshirt_id]);

		if($get_img_data->num_rows() > 0){
			$old_img = $get_img_data->row();
		}
		else{
			$old_img = $get_img_data->row();
		}

		if($img_pos == "1"){
			unlink('WomenImages/'.$old_img->image_one);
			$data = ['image_one'=>$img];
		}
		elseif($img_pos == "2"){
			unlink('WomenImages/'.$old_img->image_two);
			$data = ['image_two'=>$img];
		}
		else{
			return false;
		}
		$update_img = $this->db->where('wshirt_id',$wshirt_id)
				 			   ->update('wshirts',$data);

		if($update_img){
			return true;
		}
		else{
			return false;
		}
	}

	function set_wshirt_status($wshirt_id){
		$set = [
			'product_status'=>$this->input->post('status'),
			'data_cadastro'=>date('Y-m-d')
		];

		$update = $this->db->where('wshirt_id',$wshirt_id)
						   ->update('wshirts',$set);
		if($update){
			return true;
		}
		else{
			return false;
		}
	}

	function delete_wshirt($wshirt_id){
		$get_img_data = $this->db->get_where('wshirts',['wshirt_id'=>$wshirt_id]);

		if($get_img_data->num_rows() > 0){
			$old_img = $get_img_data->row();
		}
		else{
			$old_img = $get_img_data->row();
		}
		unlink('WomenImages/'.$old_img->image_one);
		unlink('WomenImages/'.$old_img->image_two);

		$del = $this->db->where('wshirt_id', $wshirt_id)
    					->delete('wshirts');

    	if($del){
    		return true;
    	}
    	else{
    		return false;
    	}
	}

	function InsertWomenShirtInfo($vend_id){
		$wshirt_title = $this->input->post('wshirt_title');
		$wshirt_size = $this->input->post('wshirt_size');
        $wshirt_descricao = $this->input->post('wshirt_descricao');
        $product_price = $this->input->post('product_price');

        $insert_wsh = $this->db->insert('wshirts',[
        	'wshirt_title'=>$wshirt_title,
        	'wshirt_size'=>$wshirt_size,
        	'wshirt_descricao'=>$wshirt_descricao,
        	'categoria'=>'Moda Feminina',
        	'product_status'=>'Active',
        	'product_price'=>$product_price,
        	'data_cadastro'=>date('Y-m-d'),
        	'vend_id'=>$vend_id]);

        if($insert_wsh){
        	return $this->db->insert_id();
        }
        else{
        	return false;
        }	
	}

	function InsertWshirtImages(){
		$config['upload_path'] = "./WomenImages";
		$config['allowed_types'] = "jpg|jpeg|png|gif";
		$this->load->library('upload',$config);

		$prod_id = $this->input->post('product_id');

		$i_one = $this->upload->do_upload('image_one').$this->upload->data('file_name');
		$i_two = $this->upload->do_upload('image_two').$this->upload->data('file_name');
		
		$img_one = substr($i_one, 1);
		$img_two = substr($i_two, 1);
			
		$update_img = $this->db->where('wshirt_id ',$prod_id)
				 			   ->update('wshirts',['image_one'=>$img_one,'image_two'=>$img_two]);

				 if($update_img){
				 	$get_p_detail = $this->db->get_where('wshirts',['wshirt_id '=>$prod_id]);
				 	if($get_p_detail->num_rows() > 0){
				 		return $get_p_detail->row();
				 	}
				 	else{
				 		return false;
				 	}
				 }
				 else{
				 	return false;
				 }
	}

	function InsertWcalcInfo($vend_id){
		$calc_title = $this->input->post('calc_title');
		$calc_size = $this->input->post('calc_size');
        $calc_descricao = $this->input->post('calc_descricao');
        $product_price = $this->input->post('product_price');

        $insert_sh = $this->db->insert('wTrousers',[
        	'calc_title'=>$calc_title,
        	'calc_size'=>$calc_size,
        	'calc_descricao'=>$calc_descricao,
        	'categoria'=>'Moda Feminina',
        	'product_status'=>'Active',
        	'product_price'=>$product_price,
        	'data_cadastro'=>date('Y-m-d'),
        	'vend_id'=>$vend_id]);

        if($insert_sh){
        	return $this->db->insert_id();
        }
        else{
        	return false;
        }
	}

	function InsertWcalcImages(){
		$config['upload_path'] = "./WomenImages";
		$config['allowed_types'] = "jpg|jpeg|png|gif";
		$this->load->library('upload',$config);

		$prod_id = $this->input->post('product_id');

		$i_one = $this->upload->do_upload('image_one').$this->upload->data('file_name');
		$i_two = $this->upload->do_upload('image_two').$this->upload->data('file_name');
		
		$img_one = substr($i_one, 1);
		$img_two = substr($i_two, 1);
			
		$update_img = $this->db->where('wtrou_id ',$prod_id)
				 			   ->update('wTrousers',['image_one'=>$img_one,'image_two'=>$img_two]);

				 if($update_img){
				 	$get_p_detail = $this->db->get_where('wTrousers',['wtrou_id '=>$prod_id]);
				 	if($get_p_detail->num_rows() > 0){
				 		return $get_p_detail->row();
				 	}
				 	else{
				 		return false;
				 	}
				 }
				 else{
				 	return false;
				 }
	}

	function InsertWfootInfo($vend_id){
		$mfoot_title = $this->input->post('mfoot_title');
		$mfoot_size = $this->input->post('mfoot_size');
        $mfoot_descricao = $this->input->post('mfoot_descricao');
        $product_price = $this->input->post('product_price');

        $insert_wft = $this->db->insert('wfootwears',[
        	'mfoot_title'=>$mfoot_title,
        	'mfoot_size'=>$mfoot_size,
        	'mfoot_descricao'=>$mfoot_descricao,
        	'categoria'=>'Moda Feminina',
        	'product_status'=>'Active',
        	'product_price'=>$product_price,
        	'data_cadastro'=>date('Y-m-d'),
        	'vend_id'=>$vend_id]);

        if($insert_wft){
        	return $this->db->insert_id();
        }
        else{
        	return false;
        }	
	}

	function InsertWfootImages(){
		$config['upload_path'] = "./WomenImages";
		$config['allowed_types'] = "jpg|jpeg|png|gif";
		$this->load->library('upload',$config);

		$prod_id = $this->input->post('product_id');

		$i_one = $this->upload->do_upload('image_one').$this->upload->data('file_name');
		$i_two = $this->upload->do_upload('image_two').$this->upload->data('file_name');
		
		$img_one = substr($i_one, 1);
		$img_two = substr($i_two, 1);
			
		$update_img = $this->db->where('wfoot_id ',$prod_id)
				 			   ->update('wfootwears',['image_one'=>$img_one,'image_two'=>$img_two]);

				 if($update_img){
				 	$get_p_detail = $this->db->get_where('wfootwears',['wfoot_id '=>$prod_id]);
				 	if($get_p_detail->num_rows() > 0){
				 		return $get_p_detail->row();
				 	}
				 	else{
				 		return false;
				 	}
				 }
				 else{
				 	return false;
				 }
	}

	function InsertWomenAcc($vend_id){
		$ac_title = $this->input->post('ac_title');
        $ac_descricao = $this->input->post('ac_descricao');
        $product_price = $this->input->post('product_price');

        $insert_ac = $this->db->insert('acc_women',[
        	'ac_title'=>$ac_title,
        	'ac_descricao'=>$ac_descricao,
        	'categoria'=>'Moda Feminina',
        	'product_status'=>'Active',
        	'product_price'=>$product_price,
        	'data_cadastro'=>date('Y-m-d'),
        	'vend_id'=>$vend_id]);

        if($insert_ac){
        	return $this->db->insert_id();
        }
        else{
        	return false;
        }	
	}

	function InsertWmAccImages(){
		$config['upload_path'] = "./WomenImages";
		$config['allowed_types'] = "jpg|jpeg|png|gif";
		$this->load->library('upload',$config);

		$prod_id = $this->input->post('product_id');

		$i_one = $this->upload->do_upload('image_one').$this->upload->data('file_name');
		$i_two = $this->upload->do_upload('image_two').$this->upload->data('file_name');
		
		$img_one = substr($i_one, 1);
		$img_two = substr($i_two, 1);
			
		$update_img = $this->db->where('acc_wid ',$prod_id)
				 			   ->update('acc_women',['image_one'=>$img_one,'image_two'=>$img_two]);

				 if($update_img){
				 	$get_p_detail = $this->db->get_where('acc_women',['acc_wid '=>$prod_id]);
				 	if($get_p_detail->num_rows() > 0){
				 		return $get_p_detail->row();
				 	}
				 	else{
				 		return false;
				 	}
				 }
				 else{
				 	return false;
				 }	
	}

	/* Women Fashion Section End */

}

?>