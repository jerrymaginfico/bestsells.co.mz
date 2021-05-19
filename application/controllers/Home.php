<?php

/**
 * 
 */
class Home extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Home/Home_Model','hm');
	}

	function index(){
		$cars = $this->hm->get_all_cars();
		$freezers = $this->hm->get_all_freezers();
		$cells = $this->hm->get_all_cells();
		$laptops = $this->hm->get_all_laptops();
		$mshirt = $this->hm->get_all_mshirts();
		$wshirt = $this->hm->get_all_wshirts();
		$this->load->view('Home/index',['cars'=>$cars,'freeze'=>$freezers,'cell'=>$cells,'laps'=>$laptops,'mshirts'=>$mshirt,'wshirt'=>$wshirt]);
	}

	function carro_particular($part_id){
		$call = $this->hm->carro_particular($part_id);
		$this->load->view('Home/product_info',['car_info'=>$call]);
	}

	/* Products "Pagination" Section Start */

	// All Eletronic Products Section Start

	function store_celulares(){
		$this->load->library('Pagination_bootstrap');
		$sql_code = $this->db->select()
							 ->from('celulares')
							 ->where('product_status','Active')
							 ->order_by('cel_id','desc')
							 ->get();

		$this->pagination_bootstrap->offset(12);

		$data['results'] = $this->pagination_bootstrap->config("/home/store_celulares",$sql_code);

		$this->load->view('Home/store_celulares',$data);
	}

	function store_desktops(){
		$this->load->library('Pagination_bootstrap');

		$sql_code = $this->db->select()
							 ->from('desktop')
							 ->where('product_status','Active')
							 ->order_by('desk_id','desc')
							 ->get();
		$this->pagination_bootstrap->offset(12);

		$data['results'] = $this->pagination_bootstrap->config("/home/store_desktops",$sql_code);

		$this->load->view('Home/store_desktops',$data);
	}

	function store_laptops(){
		$this->load->library('Pagination_bootstrap');

		$sql_code = $this->db->select()
							 ->from('laptops')
							 ->where('product_status','Active')
							 ->order_by('lap_id','desc')
							 ->get();
		$this->pagination_bootstrap->offset(12);

		$data['results'] = $this->pagination_bootstrap->config("/home/store_laptops",$sql_code);

		$this->load->view('Home/store_laptops',$data);
	}

	function store_tablets(){
		$this->load->library('Pagination_bootstrap');

		$sql_code = $this->db->select()
							 ->from('tablets')
							 ->where('product_status','Active')
							 ->order_by('tab_id','desc')
							 ->get();
		$this->pagination_bootstrap->offset(12);

		$data['results'] = $this->pagination_bootstrap->config("/home/store_tablets",$sql_code);

		$this->load->view('Home/store_tablets',$data);
	}

	function store_printers(){
		$this->load->library('Pagination_bootstrap');

		$sql_code = $this->db->select()
							 ->from('impressoras')
							 ->where('product_status','Active')
							 ->order_by('print_id','desc')
							 ->get();
		$this->pagination_bootstrap->offset(12);

		$data['results'] = $this->pagination_bootstrap->config("/home/store_printers",$sql_code);

		$this->load->view('Home/store_printers',$data);
	}

	function store_eletronic_acessories(){
		$this->load->library('Pagination_bootstrap');

		$sql_code = $this->db->select()
							 ->from('acc_eletro')
							 ->where('product_status','Active')
							 ->order_by('acc_id','desc')
							 ->get();
		$this->pagination_bootstrap->offset(12);

		$data['results'] = $this->pagination_bootstrap->config("/home/store_eletronic_acessories",$sql_code);

		$this->load->view('Home/store_eletronic_acessories',$data);	
	}

	// All Eletronic Products Section End

	// All Eletrodomestic Products Section Start

	function store_freezers(){
		$this->load->library('Pagination_bootstrap');

		$sql_code = $this->db->select()
							 ->from('gel_cong')
							 ->where('product_status','Active')
							 ->order_by('freeze_id','desc')
							 ->get();
		$this->pagination_bootstrap->offset(12);

		$data['results'] = $this->pagination_bootstrap->config("/home/store_freezers",$sql_code);

		$this->load->view('Home/store_freezers',$data);	
	}

	function store_fogoes(){
		$this->load->library('Pagination_bootstrap');

		$sql_code = $this->db->select()
							 ->from('fogoes')
							 ->where('product_status','Active')
							 ->order_by('fog_id','desc')
							 ->get();
		$this->pagination_bootstrap->offset(12);

		$data['results'] = $this->pagination_bootstrap->config("/home/store_fogoes",$sql_code);

		$this->load->view('Home/store_fogoes',$data);
	}

	function store_televisores(){
		$this->load->library('Pagination_bootstrap');

		$sql_code = $this->db->select()
							 ->from('televisores')
							 ->where('product_status','Active')
							 ->order_by('tv_id','desc')
							 ->get();
		$this->pagination_bootstrap->offset(12);

		$data['results'] = $this->pagination_bootstrap->config("/home/store_televisores",$sql_code);

		$this->load->view('Home/store_televisores',$data);
	}

	function store_eletrodomestic_acessories(){
		$this->load->library('Pagination_bootstrap');

		$sql_code = $this->db->select()
							 ->from('acessorioseletrodomesticos')
							 ->where('product_status','Active')
							 ->order_by('ac_id','desc')
							 ->get();
		$this->pagination_bootstrap->offset(12);

		$data['results'] = $this->pagination_bootstrap->config("/home/store_eletrodomestic_acessories",$sql_code);

		$this->load->view('Home/store_eletrodomestic_acessories',$data);
	}

	// All Eletrodomestic Products Section End

	// All Carrs Products Section Start

	function store_carros_particulares(){
		$this->load->library('Pagination_bootstrap');

		$sql_code = $this->db->select()
							 ->from('particulares')
							 ->where('product_status','Active')
							 ->order_by('part_id','desc')
							 ->get();
		$this->pagination_bootstrap->offset(12);

		$data['results'] = $this->pagination_bootstrap->config("/home/store_carros_particulares",$sql_code);

		$this->load->view('Home/store_particulares',$data);
	}

	function store_carros_colectivos(){
		$this->load->library('Pagination_bootstrap');

		$sql_code = $this->db->select()
							 ->from('colectivos')
							 ->where('product_status','Active')
							 ->order_by('col_id','desc')
							 ->get();
		$this->pagination_bootstrap->offset(12);

		$data['results'] = $this->pagination_bootstrap->config("/home/store_carros_colectivos",$sql_code);

		$this->load->view('Home/store_carros_colectivos',$data);
	}

	function store_carros_de_carga(){
		$this->load->library('Pagination_bootstrap');

		$sql_code = $this->db->select()
							 ->from('pesados')
							 ->where('product_status','Active')
							 ->order_by('pes_id','desc')
							 ->get();
		$this->pagination_bootstrap->offset(12);

		$data['results'] = $this->pagination_bootstrap->config("/home/store_carros_de_carga",$sql_code);

		$this->load->view('Home/store_carros_de_carga',$data);
	}

	function store_motos_e_triciclos(){
		$this->load->library('Pagination_bootstrap');

		$sql_code = $this->db->select()
							 ->from('motos')
							 ->where('product_status','Active')
							 ->order_by('moto_id','desc')
							 ->get();
		$this->pagination_bootstrap->offset(12);

		$data['results'] = $this->pagination_bootstrap->config("/home/store_motos_e_triciclos",$sql_code);

		$this->load->view('Home/store_motos_e_triciclos',$data);
	}

	function store_bicicletas(){
		$this->load->library('Pagination_bootstrap');

		$sql_code = $this->db->select()
							 ->from('bicicletas')
							 ->where('product_status','Active')
							 ->order_by('bic_id','desc')
							 ->get();
		$this->pagination_bootstrap->offset(12);

		$data['results'] = $this->pagination_bootstrap->config("/home/store_bicicletas",$sql_code);

		$this->load->view('Home/store_bicicletas',$data);
	}

	function store_cars_acessories(){
		$this->load->library('Pagination_bootstrap');

		$sql_code = $this->db->select()
							 ->from('acessorioscarros')
							 ->where('product_status','Active')
							 ->order_by('ac_id','desc')
							 ->get();
		$this->pagination_bootstrap->offset(12);

		$data['results'] = $this->pagination_bootstrap->config("/home/store_cars_acessories",$sql_code);

		$this->load->view('Home/store_cars_acessories',$data);
	}

	// All Carrs Products Section End

	// All Men Products Section Start
	function store_camisas_masculinas(){
		$this->load->library('Pagination_bootstrap');

		$sql_code = $this->db->select()
							 ->from('shirts')
							 ->where('product_status','Active')
							 ->order_by('shirt_id','desc')
							 ->get();
		$this->pagination_bootstrap->offset(12);

		$data['results'] = $this->pagination_bootstrap->config("/home/store_camisas_masculinas",$sql_code);

		$this->load->view('Home/store_camisas_masculinas',$data);
	}

	function store_calcas_masculinas(){
		$this->load->library('Pagination_bootstrap');

		$sql_code = $this->db->select()
							 ->from('trousers')
							 ->where('product_status','Active')
							 ->order_by('trous_id','desc')
							 ->get();
		$this->pagination_bootstrap->offset(12);

		$data['results'] = $this->pagination_bootstrap->config("/home/store_calcas_masculinas",$sql_code);

		$this->load->view('Home/store_calcas_masculinas',$data);
	}

	function store_calcados_masculinos(){
		$this->load->library('Pagination_bootstrap');

		$sql_code = $this->db->select()
							 ->from('footwears')
							 ->where('product_status','Active')
							 ->order_by('mfoot_id','desc')
							 ->get();
		$this->pagination_bootstrap->offset(12);

		$data['results'] = $this->pagination_bootstrap->config("/home/store_calcados_masculinos",$sql_code);

		$this->load->view('Home/store_calcados_masculinos',$data);
	}

	function store_men_accesories(){
		$this->load->library('Pagination_bootstrap');

		$sql_code = $this->db->select()
							 ->from('acc_men')
							 ->where('product_status','Active')
							 ->order_by('ac_id','desc')
							 ->get();
		$this->pagination_bootstrap->offset(12);

		$data['results'] = $this->pagination_bootstrap->config("/home/store_men_accesories",$sql_code);

		$this->load->view('Home/store_men_accesories',$data);
	}

	// All Men Products Section End

	// All Women Products Section Start

	function store_blusas_femininas(){
		$this->load->library('Pagination_bootstrap');

		$sql_code = $this->db->select()
							 ->from('wshirts')
							 ->where('product_status','Active')
							 ->order_by('wshirt_id','desc')
							 ->get();
		$this->pagination_bootstrap->offset(12);

		$data['results'] = $this->pagination_bootstrap->config("/home/store_blusas_femininas",$sql_code);

		$this->load->view('Home/store_blusas_femininas',$data);
	}

	function store_calcas_femininas(){
		$this->load->library('Pagination_bootstrap');

		$sql_code = $this->db->select()
							 ->from('wtrousers')
							 ->where('product_status','Active')
							 ->order_by('wtrou_id','desc')
							 ->get();
		$this->pagination_bootstrap->offset(12);

		$data['results'] = $this->pagination_bootstrap->config("/home/store_calcas_femininas",$sql_code);

		$this->load->view('Home/store_calcas_femininas',$data);
	}

	function store_calcados_femininos(){
		$this->load->library('Pagination_bootstrap');

		$sql_code = $this->db->select()
							 ->from('wfootwears')
							 ->where('product_status','Active')
							 ->order_by('wfoot_id','desc')
							 ->get();
		$this->pagination_bootstrap->offset(12);

		$data['results'] = $this->pagination_bootstrap->config("/home/store_calcados_femininos",$sql_code);

		$this->load->view('Home/store_calcados_femininos',$data);
	}

	function store_women_acessories(){
		$this->load->library('Pagination_bootstrap');

		$sql_code = $this->db->select()
							 ->from('acc_women')
							 ->where('product_status','Active')
							 ->order_by('acc_wid','desc')
							 ->get();
		$this->pagination_bootstrap->offset(12);

		$data['results'] = $this->pagination_bootstrap->config("/home/store_women_acessories",$sql_code);

		$this->load->view('Home/store_women_acessories',$data);
	}


	// All Women Products Section End

	/* Products "Pagination" Section End */

	/* Product Information(When Clicked) Section Start */

	// Eletronic Section Start
	
	//Mobiles
	function celular_info($cel_id){

	/*$bigdata = $this->db->select()
						->from('celulares,desktop,laptops,tablets,impressoras,acc_eletro')
						->where('celulares.product_status','Active','desktop.product_status','Active')
						->join('vendedor','vendedor.vend_id=celulares.vend_id')
						->get();
	
	foreach($bigdata->result() as $res){

	} */
		
	$sdata = $this->db->select()
					  ->from('celulares')
					  ->where('cel_id',$cel_id)
					  ->join('vendedor','vendedor.vend_id=celulares.vend_id')
					  ->get();
	foreach($sdata->result() as $row){
		$this->load->view('Home/Product_info/celular_info',['eletro'=>$row]);
	}
	
	
	}

	//Desktops's
	function desktop_info($desk_id){
		$sdata = $this->db->select()
						  ->from('desktop')
						  ->where('desk_id',$desk_id)
						  ->join('vendedor','vendedor.vend_id=desktop.vend_id')
						  ->get();
		foreach($sdata->result() as $row){
			$this->load->view('Home/Product_info/desktop_info',['eletro'=>$row]);
		}

	}

	//Laptops's
	function laptop_info($lap_id){
		$sdata = $this->db->select()
						  ->from('laptops')
						  ->where('lap_id',$lap_id)
						  ->join('vendedor','vendedor.vend_id=laptops.vend_id')
						  ->get();
		foreach($sdata->result() as $row){
			$this->load->view('Home/Product_info/laptop_info',['eletro'=>$row]);
		}
	}

	//Tablet's
	function tablet_info($tab_id){
		$sdata = $this->db->select()
						  ->from('tablets')
						  ->where('tab_id',$tab_id)
						  ->join('vendedor','vendedor.vend_id=tablets.vend_id')
						  ->get();
		foreach($sdata->result() as $row){
			$this->load->view('Home/Product_info/tablet_info',['eletro'=>$row]);
		}
	}

	//Printers
	function printer_info($print_id){
		$sdata = $this->db->select()
						  ->from('impressoras')
						  ->where('print_id',$print_id)
						  ->join('vendedor','vendedor.vend_id=impressoras.vend_id')
						  ->get();
		foreach($sdata->result() as $row){
			$this->load->view('Home/Product_info/printer_info',['eletro'=>$row]);
		}
	}

	//Eletronic Accessories
	function eletronic_accessory_info($acc_id){
		$sdata = $this->db->select()
						  ->from('acc_eletro')
						  ->where('acc_id',$acc_id)
						  ->join('vendedor','vendedor.vend_id=acc_eletro.vend_id')
						  ->get();
		foreach($sdata->result() as $row){
			$this->load->view('Home/Product_info/eletronic_accessory_info',['eletro'=>$row]);
		}
	}

	// Eletronic Section End

	//Eletrodmestic Section Start
	
	//Freezers
	function freezer_info($freeze_id){
		$sdata = $this->db->select()
						  ->from('gel_cong')
						  ->where('freeze_id',$freeze_id)
						  ->join('vendedor','vendedor.vend_id=gel_cong.vend_id')
						  ->get();
		foreach($sdata->result() as $row){
			$this->load->view('Home/Product_info/freezer_info',['domestic'=>$row]);
		}
	}

	//Fogoes
	function fogao_info($fog_id){
		$sdata = $this->db->select()
						  ->from('fogoes')
						  ->where('fog_id',$fog_id)
						  ->join('vendedor','vendedor.vend_id=fogoes.vend_id')
						  ->get();
		foreach($sdata->result() as $row){
			$this->load->view('Home/Product_info/fogao_info',['domestic'=>$row]);
		}
	}

	//TV's
	function tv_info($tv_id){
		$sdata = $this->db->select()
						  ->from('televisores')
						  ->where('tv_id',$tv_id)
						  ->join('vendedor','vendedor.vend_id=televisores.vend_id')
						  ->get();
		foreach($sdata->result() as $row){
			$this->load->view('Home/Product_info/tv_info',['domestic'=>$row]);
		}
	}

	//Eletrodomestic_accessories
	function eletrodomestic_acessory_info($ac_id){
		$sdata = $this->db->select()
						  ->from('acessorioseletrodomesticos')
						  ->where('ac_id',$ac_id)
						  ->join('vendedor','vendedor.vend_id=acessorioseletrodomesticos.vend_id')
						  ->get();
		foreach($sdata->result() as $row){
			$this->load->view('Home/Product_info/eletrodomestic_acessory_info',['domestic'=>$row]);
		}
	}

	//Eletrodmestic Section End

	//Cars Section Start

	//Particular Cars
	function particular_car_info($part_id){
		$sdata = $this->db->select()
						  ->from('particulares')
						  ->where('part_id',$part_id)
						  ->join('vendedor','vendedor.vend_id=particulares.vend_id')
						  ->get();
		foreach($sdata->result() as $row){
			$this->load->view('Home/Product_info/particular_car_info',['car'=>$row]);
		}
	}

	//Colective Cars
	function bus_car_info($col_id){
		$sdata = $this->db->select()
						  ->from('colectivos')
						  ->where('col_id',$col_id)
						  ->join('vendedor','vendedor.vend_id=colectivos.vend_id')
						  ->get();
		foreach($sdata->result() as $row){
			$this->load->view('Home/Product_info/bus_car_info',['car'=>$row]);
		}
	}

	//Cargo Cars
	function cargo_car_info($pes_id){
		$sdata = $this->db->select()
						  ->from('pesados')
						  ->where('pes_id',$pes_id)
						  ->join('vendedor','vendedor.vend_id=pesados.vend_id')
						  ->get();
		foreach($sdata->result() as $row){
			$this->load->view('Home/Product_info/cargo_car_info',['car'=>$row]);
		}
	}

	//Moto
	function moto_info($moto_id){
		$sdata = $this->db->select()
						  ->from('motos')
						  ->where('moto_id',$moto_id)
						  ->join('vendedor','vendedor.vend_id=motos.vend_id')
						  ->get();
		foreach($sdata->result() as $row){
			$this->load->view('Home/Product_info/moto_info',['car'=>$row]);
		}
	}

	//Bics
	function bic_info($bic_id){
		$sdata = $this->db->select()
						  ->from('bicicletas')
						  ->where('bic_id',$bic_id)
						  ->join('vendedor','vendedor.vend_id=bicicletas.vend_id')
						  ->get();
		foreach($sdata->result() as $row){
			$this->load->view('Home/Product_info/bic_info',['car'=>$row]);
		}
	}

	//Cars Accessories
	function cars_acessories_info($ac_id){
		$sdata = $this->db->select()
						  ->from('acessorioscarros')
						  ->where('ac_id',$ac_id)
						  ->join('vendedor','vendedor.vend_id=acessorioscarros.vend_id')
						  ->get();
		foreach($sdata->result() as $row){
			$this->load->view('Home/Product_info/cars_acessories_info',['car'=>$row]);
		}
	}

	//Cars Section End

	//Men Section Start

	//Shirts
	function camisa_masculina_info($shirt_id){
		$sdata = $this->db->select()
						  ->from('shirts')
						  ->where('shirt_id',$shirt_id)
						  ->join('vendedor','vendedor.vend_id=shirts.vend_id')
						  ->get();
		foreach($sdata->result() as $row){
			$this->load->view('Home/Product_info/camisa_masculina_info',['man'=>$row]);
		}
	}

	//Trousers
	function calca_masculina_info($trous_id){
		$sdata = $this->db->select()
						  ->from('trousers')
						  ->where('trous_id',$trous_id)
						  ->join('vendedor','vendedor.vend_id=trousers.vend_id')
						  ->get();
		foreach($sdata->result() as $row){
			$this->load->view('Home/Product_info/calca_masculina_info',['man'=>$row]);
		}
	}

	//FootWears
	function calcado_masculina_info($mfoot_id){
		$sdata = $this->db->select()
						  ->from('footwears')
						  ->where('mfoot_id',$mfoot_id)
						  ->join('vendedor','vendedor.vend_id=footwears.vend_id')
						  ->get();
		foreach($sdata->result() as $row){
			$this->load->view('Home/Product_info/calcado_masculina_info',['man'=>$row]);
		}
	}

	//Acessries
	function men_acessory_info($ac_id){
		$sdata = $this->db->select()
						  ->from('acc_men')
						  ->where('ac_id',$ac_id)
						  ->join('vendedor','vendedor.vend_id=acc_men.vend_id')
						  ->get();
		foreach($sdata->result() as $row){
			$this->load->view('Home/Product_info/men_acessory_info',['man'=>$row]);
		}
	}

	//Men Section End

	//Women Section Start

	//Shirts
	function blusa_feminina_info($wshirt_id){
		$sdata = $this->db->select()
						  ->from('wshirts')
						  ->where('wshirt_id',$wshirt_id)
						  ->join('vendedor','vendedor.vend_id=wshirts.vend_id')
						  ->get();
		foreach($sdata->result() as $row){
			$this->load->view('Home/Product_info/blusa_feminina_info',['woman'=>$row]);
		}
	}

	//Trousers
	function calca_feminina_info($wtrou_id){
		$sdata = $this->db->select()
						  ->from('wtrousers')
						  ->where('wtrou_id',$wtrou_id)
						  ->join('vendedor','vendedor.vend_id=wtrousers.vend_id')
						  ->get();
		foreach($sdata->result() as $row){
			$this->load->view('Home/Product_info/calca_feminina_info',['woman'=>$row]);
		}
	}

	//Footwears
	function calcado_feminino_info($wfoot_id){
		$sdata = $this->db->select()
						  ->from('wfootwears')
						  ->where('wfoot_id',$wfoot_id)
						  ->join('vendedor','vendedor.vend_id=wfootwears.vend_id')
						  ->get();
		foreach($sdata->result() as $row){
			$this->load->view('Home/Product_info/calcado_feminino_info',['woman'=>$row]);
		}
	}

	//Acessories
	function women_acessory_info($acc_wid){
		$sdata = $this->db->select()
						  ->from('acc_women')
						  ->where('acc_wid',$acc_wid)
						  ->join('vendedor','vendedor.vend_id=acc_women.vend_id')
						  ->get();
		foreach($sdata->result() as $row){
			$this->load->view('Home/Product_info/women_acessory_info',['woman'=>$row]);
		}
	}

	//Women Section End
	/* Product Information(When Clicked) Section Start */

	/* Search Section Start */

	function search_result(){
		$this->load->library('Pagination_bootstrap');

		$search_category = $this->input->post('listing_items');
		$search_article = $this->input->post('article');
		
		if($search_category == "celulares"){

			$search_result = $this->db->select()
									  ->from('celulares')
									  ->order_by('cel_id','desc')
									  ->where('product_status','Active')
									  ->like('cel_title',$search_article)
									  ->get();
			$this->pagination_bootstrap->offset(12);
			
			if($search_result->num_rows() > 0){
				$data['mobile'] = $this->pagination_bootstrap->config("/home/Search/search_celulares",$search_result);
				$this->load->view('Home/Search/search_celulares',$data);
			}
			else{
				
				echo"<h1 style='text-align:center'>Artigo ($search_article) Não Encontrado</h1>";
			}
			
		}
		elseif($search_category == "desktop"){
			$search_result = $this->db->select()
									  ->from('desktop')
									  ->order_by('desk_id','desc')
									  ->where('product_status','Active')
									  ->like('desk_title',$search_article)
									  ->get();
			$this->pagination_bootstrap->offset(12);

			if($search_result->num_rows() > 0){
				$data['desktop'] = $this->pagination_bootstrap->config('home/Search/search_desktops',$search_result);
				$this->load->view('Home/Search/search_desktops',$data);
			}
			else
				echo"<h1 style='text-align:center'>Artigo ($search_article) Não Encontrado</h1>";
		}
		elseif($search_category == 'laptops'){
			$search_result = $this->db->select()
									  ->from('laptops')
									  ->order_by('lap_id','desc')
									  ->where('product_status','Active')
									  ->like('lap_title',$search_article)
									  ->get();
			
			$this->pagination_bootstrap->offset(12);
			if($search_result->num_rows() > 0){
				$data['laptop'] = $this->pagination_bootstrap->config('home/Search/search_lpatops',$search_result);
				$this->load->view('Home/Search/search_laps',$data);
			}
			else
				echo"<h1 style='text-align:center'>Artigo ($search_article) Não Encontrado</h1>";
		}
		elseif ($search_category == "geleiras") {
			$search_result = $this->db->select()
									  ->from('gel_cong')
									  ->order_by('freeze_id','desc')
									  ->where('product_status','Active')
									  ->like('freeze_title',$search_article)
									  ->get();

			$this->pagination_bootstrap->offset(12);
			if($search_result->num_rows() > 0){
				$data['freeze'] = $this->pagination_bootstrap->config('home/Search/search_freezers',$search_result);
				$this->load->view('Home/Search/search_freezers',$data);
			}
			else
				echo"<h1 style='text-align:center'>Artigo ($search_article) Não Encontrado</h1>";
									  
		}
		elseif($search_category == "carros particulares"){
			$search_result = $this->db->select()
										->from('particulares')
										->order_by('part_id','desc')
										->where('product_status','Active')
										->like('part_title',$search_article)
										->get();
			
			$this->pagination_bootstrap->offset(12);

			if($search_result->num_rows() > 0){
				$data['car'] = $this->pagination_bootstrap->config('home/Search/search_carros_particulares',$search_result);
				$this->load->view('Home/Search/search_carros_particulares',$data);
			}
			else	
				echo"<h1 style='text-align:center'>Artigo ($search_article) Não Encontrado</h1>";

		}
		elseif($search_category == "semi colectivos"){
			$search_result = $this->db->select()
										->from('colectivos')
										->order_by('col_id','desc')
										->where('product_status','Active')
										->like('col_title',$search_article)
										->get();
			
			$this->pagination_bootstrap->offset(12);

			if($search_result->num_rows() > 0){
				$data['car'] = $this->pagination_bootstrap->config('home/Search/search_carros_coletivos',$search_result);
				$this->load->view('Home/Search/search_carros_coletivos',$data);
			}
			else	
				echo"<h1 style='text-align:center'>Artigo ($search_article) Não Encontrado</h1>";
		}
		elseif($search_category == "carros de carga"){
			$search_result = $this->db->select()
										->from('pesados')
										->order_by('pes_id','desc')
										->where('product_status','Active')
										->like('pes_title',$search_article)
										->get();
			
			$this->pagination_bootstrap->offset(12);

			if($search_result->num_rows() > 0){
				$data['car'] = $this->pagination_bootstrap->config('home/Search/search_carros_pesados',$search_result);
				$this->load->view('Home/Search/search_carros_pesados',$data);
			}
			else	
				echo"<h1 style='text-align:center'>Artigo ($search_article) Não Encontrado</h1>";
		}
		elseif($search_category == "camisetes masculinas"){
			$search_result = $this->db->select()
										->from('shirts')
										->order_by('shirt_id','desc')
										->where('product_status','Active')
										->like('shirt_title',$search_article)
										->get();
			
			$this->pagination_bootstrap->offset(12);

			if($search_result->num_rows() > 0){
				$data['man'] = $this->pagination_bootstrap->config('home/Search/search_camisetes_masculinas',$search_result);
				$this->load->view('Home/Search/search_camisetes_masculinas',$data);
			}
			else	
				echo"<h1 style='text-align:center'>Artigo ($search_article) Não Encontrado</h1>";
		}
		elseif($search_category == "calcados masculinos"){
			$search_result = $this->db->select()
										->from('footwears')
										->order_by('mfoot_id','desc')
										->where('product_status','Active')
										->like('mfoot_title',$search_article)
										->get();
			
			$this->pagination_bootstrap->offset(12);

			if($search_result->num_rows() > 0){
				$data['man'] = $this->pagination_bootstrap->config('home/Search/search_calcados_masculinos',$search_result);
				$this->load->view('Home/Search/search_calcados_masculinos',$data);
			}
			else	
				echo"<h1 style='text-align:center'>Artigo ($search_article) Não Encontrado</h1>";
		}
		elseif($search_category == "blusas femeninas"){
			$search_result = $this->db->select()
										->from('wshirts')
										->order_by('wshirt_id','desc')
										->where('product_status','Active')
										->like('wshirt_title',$search_article)
										->get();
			
			$this->pagination_bootstrap->offset(12);

			if($search_result->num_rows() > 0){
				$data['woman'] = $this->pagination_bootstrap->config('home/Search/search_blusas_femininas',$search_result);
				$this->load->view('Home/Search/search_blusas_femininas',$data);
			}
			else	
				echo"<h1 style='text-align:center'>Artigo ($search_article) Não Encontrado</h1>";
		}
		elseif($search_category == "calcados femeninos"){
			$search_result = $this->db->select()
										->from('wfootwears')
										->order_by('wfoot_id','desc')
										->where('product_status','Active')
										->like('mfoot_title',$search_article)
										->get();
			
			$this->pagination_bootstrap->offset(12);

			if($search_result->num_rows() > 0){
				$data['woman'] = $this->pagination_bootstrap->config('home/Search/search_calcados_femininas',$search_result);
				$this->load->view('Home/Search/search_calcados_femininas',$data);
			}
			else	
				echo"<h1 style='text-align:center'>Artigo ($search_article) Não Encontrado</h1>";
		}
	}

	/* Search Section End */
	
}

?>