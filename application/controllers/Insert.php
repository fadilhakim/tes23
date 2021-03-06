<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class insert extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
		parent::__construct();

		$this->load->model('model_insert');


	}

	function do_upload() {

		$product_image_1 = $this->input->post('product_image_1');
		$product_image_2 = $this->input->post('product_image_2');
		$product_image_3 = $this->input->post('product_image_3');
		$product_image_4 = $this->input->post('product_image_4');

		$config = array(

			'upload_path' => "./assets/image/product",
			'allowed_types' => "gif|jpg|png|jpeg|pdf",
			'remove_spaces' => FALSE,
			'overwrite' => TRUE,
			'max_size' => "2048000", 
			'max_height' => "768",
			'max_width' => "1024"

		);

		$data = array(
			'produt_image_1' => $product_image_1,
			'produt_image_2' => $product_image_2,
			'produt_image_3' => $product_image_3,
			'produt_image_4' => $product_image_4
			);

		$this->load->library('upload', $config);

		$this->insert->do_upload($data, 'product_tbl');
		
	}


	function insert_product()
	{


		$product_title = $this->input->post('product_title');
		$product_brand = $this->input->post('manu_id');
		$product_category = $this->input->post('product_category');
		$product_code = $this->input->post('product_code');
		$product_availability = $this->input->post('product_availability');
		$featured_product = $this->input->post('featured_product');
		$product_spec = $this->input->post('product_specification');
		$product_text_preview = $this->input->post('product_text_preview');
		$product_description = $this->input->post('product_descrption');
		$product_category_url = url_title($product_category);
		$product_slug = url_title($product_title);

		$product_image_1 = $_FILES['product_image_1']['name'];
		$product_image_1 = str_replace(' ' , '_' , $product_image_1);

		$product_image_2 = $_FILES['product_image_2']['name'];
		$product_image_2 = str_replace(' ' , '_' , $product_image_2);

		$product_image_3 = $_FILES['product_image_3']['name'];
		$product_image_3 = str_replace(' ' , '_' , $product_image_3);

		$product_image_4 = $_FILES['product_image_4']['name'];
		$product_image_4 = str_replace(' ' , '_' , $product_image_4);

		/*$file_name = time().$product_title;*/
		/*$config = array(

			'upload_path' => "./assets/image/product/",
			'allowed_types' => "gif|jpg|png|jpeg|pdf",
			'remove_spaces' => FALSE,
			'overwrite' => TRUE,
			'max_size' => "2048000", 
			'max_height' => "250",
			'max_width' => "300" ,

		);*/

		$config['upload_path']	=	'./assets/image/product/' ;
		$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
		$config['remove_spaces'] = FALSE;
		$config['overwrite'] 	=	TRUE;
		$config['max_size'] 	=	'2048000';
		$config['max_height']	=  '1250';
		$config['max_width'] 	=	'1300';
		/*$config['file_name'] 	=	array("{$file_name}");*/

		$data = array(
			'product_title' => $product_title,
			'manu_id' => $product_brand,
			'product_category' => $product_category,

			'product_code' => $product_code,
			'product_availability' => $product_availability,
			'featured' => $featured_product,

			'product_specification' => 	$product_spec,
			'product_text_preview' => $product_text_preview,
			'product_descrption' => $product_description,

			'category_url' => $product_category_url,
			'product_slug' => $product_slug,

			'product_image_1' => $product_image_1,
			'product_image_2' => $product_image_2,
			'product_image_3' => $product_image_3,
			'product_image_4' => $product_image_4

		);

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$this->upload->do_upload('product_image_1');
		$this->upload->do_upload('product_image_2');
		$this->upload->do_upload('product_image_3');
		$this->upload->do_upload('product_image_4');
		$result = $this->model_insert->insert($data,'product_tbl');

		if($result!=false)
		{
		$value='Insert Product Success';
		/*$this->do_upload($result);*/
		}
		else
		{
		$value='Insert Product Failed';
		}
		$this->session->set_flashdata('error_product',$value);	

		redirect('admin/product-list');	
	}

	function insert_slider()
	{


		$slider_title = $this->input->post('slider_title');
		$slider_link = $this->input->post('slider_link');
		$slider_image = $_FILES['slider_image']['name'];
		/*str_replace(' ', '_', $slider_image);*/


		$config = array(

			'upload_path' => "./assets/image/slider/",
			'allowed_types' => "gif|jpg|png|jpeg|pdf",
			'remove_spaces' => FALSE,
			'overwrite' => TRUE,
			'max_size' => "2048000", 
			'max_height' => "2200",
			'max_width' => "2200"

		);

		$data = array(
			'slider_title' => $slider_title,
			'slider_link' => $slider_link,
			'silder_image' => $slider_image
		);
		
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$this->upload->do_upload('slider_image');

		$result = $this->model_insert->insert($data,'slider_tbl');

		if($result!=false)
		{
		$value='Insert Product Success';
		/*$this->do_upload($result);*/
		}
		else
		{
		$value='Insert Product Failed';
		}
		$this->session->set_flashdata('error_product',$value);	

		redirect('admin/slider');	
	}

	function insert_client()
	{


		$client_name = $this->input->post('client_name');
		$client_image = $_FILES['client_image']['name'];


		$config = array(

			'upload_path' => "./assets/image/clients/",
			'allowed_types' => "gif|jpg|png|jpeg|pdf",
			'remove_spaces' => FALSE,
			'overwrite' => TRUE,
			'max_size' => "2048000", 
			'max_height' => "600",
			'max_width' => "1400"

		);

		$data = array(
			'client_name' => $client_name,
			'client_image' => $client_image
		);
		
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$this->upload->do_upload('client_image');

		$result = $this->model_insert->insert($data,'client_tbl');

		if($result!=false)
		{
		$value='Insert Product Success';
		/*$this->do_upload($result);*/
		}
		else
		{
		$value='Insert Product Failed';
		}
		$this->session->set_flashdata('error_product',$value);	

		redirect('admin/client');	
	}

	function insert_manufacturer()
	{


		$manu_name = $this->input->post('manu_name');
		$manu_link = $this->input->post('manu_link');
		$manu_desc = $this->input->post('manu_desc');
		$manu_image = $_FILES['manu_image']['name'];


		$config = array(

			'upload_path' => "./assets/image/manufacturer/",
			'allowed_types' => "gif|jpg|png|jpeg|pdf",
			'remove_spaces' => FALSE,
			'overwrite' => TRUE,
			'max_size' => "2048000", 
			'max_height' => "600",
			'max_width' => "1400"

		);

		$data = array(
			'manu_title' => $manu_name,
			'manu_link' => $manu_link,
			'manu_desc' => $manu_desc,
			'manu_image' => $manu_image
		);
		
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$this->upload->do_upload('manu_image');

		$result = $this->model_insert->insert($data,'manufacturer_tbl');

		if($result!=false)
		{
		$value='Insert Product Success';
		/*$this->do_upload($result);*/
		}
		else
		{
		$value='Insert Product Failed';
		}
		$this->session->set_flashdata('error_product',$value);	

		redirect('admin/manufacturer');	
	}

	function insert_event()
	{


		$event_name = $this->input->post('event_name');
		$event_desc = $this->input->post('event_desc');
		$event_image = $_FILES['event_image']['name'];


		$config = array(

			'upload_path' => "./assets/image/events/",
			'allowed_types' => "gif|jpg|png|jpeg|pdf",
			'remove_spaces' => FALSE,
			'overwrite' => TRUE,
			'max_size' => "2048000", 
			'max_height' => "600",
			'max_width' => "1400"

		);

		$data = array(
			'news_title' => $event_name,
			'news_desc' => $event_desc,
			'news_image' => $event_image
		);
		
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$this->upload->do_upload('event_image');

		$result = $this->model_insert->insert($data,'event_tbl');

		if($result!=false)
		{
		$value='Insert Product Success';
		/*$this->do_upload($result);*/
		}
		else
		{
		$value='Insert Product Failed';
		}
		$this->session->set_flashdata('error_product',$value);	

		redirect('admin/event');	
	}

	function insert_news()
	{


		$news_name = $this->input->post('news_name');
		$news_desc = $this->input->post('news_desc');
		$news_image = $_FILES['news_image']['name'];
		$news_thumb_image = $_FILES['news_thumb_image']['name'];


		$config = array(

			'upload_path' => "./assets/image/news/",
			'allowed_types' => "gif|jpg|png|jpeg|pdf",
			'remove_spaces' => FALSE,
			'overwrite' => TRUE,
			'max_size' => "2048000", 
			'max_height' => "600",
			'max_width' => "1400"

		);

		$data = array(
			'news_title' => $news_name,
			'news_desc' => $news_desc,
			'news_image' => $news_image,
			'news_thumbnail' => $news_thumb_image
		);
		
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$this->upload->do_upload('news_image');
		$this->upload->do_upload('news_thumb_image');

		$result = $this->model_insert->insert($data,'news_tbl');

		if($result!=false)
		{
		$value='Insert Product Success';
		/*$this->do_upload($result);*/
		}
		else
		{
		$value='Insert Product Failed';
		}
		$this->session->set_flashdata('error_product',$value);	

		redirect('admin/news');	
	}

}
