<?php 

class Model_delete extends CI_Model {


	public function __construct() {
 		
 		$this->load->database();
 	}

	function delete_slider($id,$image){

		$this->db->get('slider_tbl');
		$this->db->where('slider_id', $id);
        unlink(FCPATH . "assets/image/slider/".$image);
        $this->db->delete('slider_tbl', array('slider_id' => $id));

	}
	function delete_client($id,$image){

		$this->db->get('client_tbl');
		$this->db->where('client_id', $id);
        unlink(FCPATH . "assets/image/clients/".$image);
        $this->db->delete('client_tbl', array('client_id' => $id));

	}
	
	function delete_manufacturer($id,$image){

		$this->db->get('manufacturer_tbl');
		$this->db->where('manu_id', $id);
        unlink(FCPATH . "assets/image/manufacturer/".$image);
        $this->db->delete('manufacturer_tbl', array('manu_id' => $id));

	}

	function delete_event($id,$image){

		$this->db->get('event_tbl');
		$this->db->where('news_id', $id);
        unlink(FCPATH . "assets/image/events/".$image);
        $this->db->delete('event_tbl', array('news_id' => $id));

	}

	function delete_news($id){

		$this->db->get('news_tbl');
		$this->db->where('news_id', $id);
        $this->db->delete('news_tbl', array('news_id' => $id));
	}

	function delete_product($id){

		$this->db->get('product_tbl');
		$this->db->where('product_id', $id);
        $this->db->delete('product_tbl', array('product_id' => $id));

	}
	function check_product($get_category_id) {

	$this->db->select('*');
    $this->db->from('product_tbl');
    $this->db->where('category_url' , $get_category_id);
	$query = $this->db->get();

	      if($query->num_rows() != 0)
	      {
	        return $query->result();
	       //  return true;
	      }
	      else
	      {
	        return false;
	      }
	}


  	function delete_data_1_condition($get_id_data,$table_name,$colloum_table)
  	{
	    $this->db->where(''.$colloum_table.'', $get_id_data);
	    $this->db->delete(''.$table_name.''); 

	  
	    return true;
  	}


}