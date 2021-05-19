<?php

/**
 * 
 */
class Home_Model extends CI_Model
{

	/* Get Products Section Start */
	function get_all_cars(){
	 $get_cars = $this->db->select()
	 					  ->from('particulares')
			 			  ->order_by('part_id','desc')
			 			  ->where('product_status','Active')
			 			  ->limit(10)
			 			  ->get();			 			  

			 if($get_cars->num_rows() > 0){
			 	return $get_cars->result();
			 }
			 else{
			 	return $get_cars->result();
			 }
	}

	function get_all_freezers(){
		$get_freezers = $this->db->select()
								 ->from('gel_cong')
								 ->order_by('freeze_id','desc')
								 ->where('product_status','Active')
								 ->limit(10)
								 ->get();

		if($get_freezers->num_rows() > 0)
			return $get_freezers->result();
		else
			return $get_freezers->result();
	}

	function get_all_cells(){
		$get_cells = $this->db->select()
							  ->from('celulares')
							  ->order_by('cel_id','desc')
							  ->where('product_status','Active')
							  ->limit(10)
							  ->get();

		if($get_cells->num_rows() > 0)
			return $get_cells->result();
		else
			return $get_cells->result();
	}

	function get_all_laptops(){
		$get_laps = $this->db->select()
							 ->from('laptops')
							 ->order_by('lap_id','desc')
							 ->where('product_status','Active')
							 ->limit(10)
							 ->get();

		if($get_laps->num_rows() > 0)
			return $get_laps->result();
		else
			return $get_laps->result();
	}

	function get_all_mshirts(){
		$get_mshisrts = $this->db->select()
								 ->from('shirts')
								 ->order_by('shirt_id','desc')
								 ->where('product_status','Active')
								 ->limit(10)
								 ->get();
		
		if($get_mshisrts->num_rows() > 0)
			return $get_mshisrts->result();
		else
			return $get_mshisrts->result();						
	}

	function get_all_wshirts(){
		$get_wshirts = $this->db->select()
								->from('wshirts')
								->order_by('wshirt_id','desc')
								->where('product_status','Active')
								->limit(10)
								->get();
			
			if($get_wshirts->num_rows() > 0)
				return $get_wshirts->result();
			else
				return $get_wshirts->result();								
	}
	
}

?>