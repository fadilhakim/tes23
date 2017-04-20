<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

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

	public function __construct(){
      parent::__construct();
      $this->load->model('model_home');
	     if(!$this->session->userdata('username')){

	     	redirect(base_url("login"));
	     }
  	}

	public function index()
	{
		$this->load->view('templates/meta-admin');
		$this->load->view('templates/menu-admin');
		$this->load->view('admin/home-admin');
		$this->load->view('templates/footer-admin');
	}

	public function slider()
	{
		
		$data['slider'] = $this->model_home->list_slider()->result();

		$this->load->view('templates/meta-admin');
		$this->load->view('templates/menu-admin');
		$this->load->view('templates/leftsidemenu');
		$this->load->view('admin/edit-slider', $data);
		$this->load->view('templates/footer-admin');
	}

	public function clients()
	{
		$data['clients'] = $this->model_home->list_clients()->result();
		$this->load->view('templates/meta-admin');
		$this->load->view('templates/menu-admin');
		$this->load->view('templates/leftsidemenu');
		$this->load->view('admin/v_client', $data);
		$this->load->view('templates/footer-admin');
	}

	public function manufacturer()
	{
		$data['manu'] = $this->model_home->list_manufacturer()->result();
		$this->load->view('templates/meta-admin');
		$this->load->view('templates/menu-admin');
		$this->load->view('templates/leftsidemenu');
		$this->load->view('admin/v_manufacturer', $data);
		$this->load->view('templates/footer-admin');
	}

	public function product()
	{


		$this->load->model('model_manufacturer');
		$data['manu'] = $this->model_manufacturer->list_manufacturer()->result();

		$this->load->model('model_product');
		$data['category'] = $this->model_product->list_category()->result();
		$data['stock'] = $this->model_product->get_stock_status()->result();

		$this->load->view('templates/meta-admin');
		$this->load->view('templates/menu-admin');
		$this->load->view('templates/leftsidemenu');
		$this->load->view('admin/v_product',$data);
		$this->load->view('templates/footer-admin');
	}

	public function category_product()
	{
		$last_status = $this->input->get('status');
		if ($last_status == 'failed') {
			$message = 'Sorry cannot delete category, there is a products in this category';
/*			echo $message;
			die();*/
		}else {
			$message = '';
		}
		$this->load->model('model_product');
		$data1['category'] = $this->model_product->list_category()->result();
		$data = array(
			'message' => $message,
			'category' => $data1['category']
		);

				
		$this->load->view('templates/meta-admin');
		$this->load->view('templates/menu-admin');
		$this->load->view('templates/leftsidemenu');
		$this->load->view('admin/v_product_category',$data);
		$this->load->view('templates/footer-admin');
	}

	public function event()
	{

		$this->load->model('model_event');
		$data['event'] = $this->model_event->list_event()->result();
		$this->load->view('templates/meta-admin');
		$this->load->view('templates/menu-admin');
		$this->load->view('templates/leftsidemenu');
		$this->load->view('admin/v_event',$data);
		$this->load->view('templates/footer-admin');
	}

	public function news()
	{

		$this->load->model('model_news');
		$data['news'] = $this->model_news->list_news()->result();
		$this->load->view('templates/meta-admin');
		$this->load->view('templates/menu-admin');
		$this->load->view('templates/leftsidemenu');
		$this->load->view('admin/v_news',$data);
		$this->load->view('templates/footer-admin');
	}

	public function list_product()
	{

		$this->load->model('model_manufacturer');
		$data['manu'] = $this->model_manufacturer->list_manufacturer()->result();

		$this->load->model('model_product');
		$data['category'] = $this->model_product->list_category()->result();
		$data['product'] = $this->model_product->list_product()->result();
		$data['stock'] = $this->model_product->get_stock_status()->result();

		$this->load->view('templates/meta-admin');
		$this->load->view('templates/menu-admin');
		$this->load->view('templates/leftsidemenu');
		$this->load->view('admin/v_list_product',$data);
		$this->load->view('templates/footer-admin');
	}

	public function edit_slider($id)
	{
		$id = $this->uri->segment(4);
		$id=trim($id);
		$this->load->model('model_update');

		$data['slider'] = $this->model_update->list_slider($id);

		$this->load->view('templates/meta-admin');
		$this->load->view('templates/menu-admin');
		$this->load->view('templates/leftsidemenu');
		$this->load->view('admin/v_edit_slider',$data);
		$this->load->view('templates/footer-admin');
	}

	public function edit_manu($id)
	{
		$id = $this->uri->segment(4);
		$id=trim($id);
		$this->load->model('model_update');
		$data['manu'] = $this->model_update->list_manu($id);

		$this->load->view('templates/meta-admin');
		$this->load->view('templates/menu-admin');
		$this->load->view('templates/leftsidemenu');
		$this->load->view('admin/v_edit_manu',$data);
		$this->load->view('templates/footer-admin');
	}

	public function edit_event($id)
	{
		$id = $this->uri->segment(4);
		$id=trim($id);
		$this->load->model('model_update');
		$data['event'] = $this->model_update->list_event($id);

		$this->load->view('templates/meta-admin');
		$this->load->view('templates/menu-admin');
		$this->load->view('templates/leftsidemenu');
		$this->load->view('admin/v_edit_event',$data);
		$this->load->view('templates/footer-admin');
	}

	public function edit_news($id)
	{
		$id = $this->uri->segment(4);
		$id=trim($id);
		$this->load->model('model_update');
		$data['news'] = $this->model_update->list_news($id);

		$this->load->view('templates/meta-admin');
		$this->load->view('templates/menu-admin');
		$this->load->view('templates/leftsidemenu');
		$this->load->view('admin/v_edit_news',$data);
		$this->load->view('templates/footer-admin');
	}

	public function edit_product($id_brand, $cat, $slug)
	{
		$id_brand=$this->uri->segment(3);
		$cat=$this->uri->segment(4);
		$slug=$this->uri->segment(5);

		$this->load->model('model_product');
		$getcatproduct = $this->model_product->getproductfromSLUGandcat($cat,$slug);
		$data['product_cat'] = $getcatproduct;

		$this->load->model('model_update');
		$data['product'] = $this->model_update->list_product($slug);

		$this->load->model('model_manufacturer');
		$getlistmanu = $this->model_manufacturer->list_manufacturer()->result();
		$data['manu'] = $getlistmanu;

		$getmanufacturer = $this->model_manufacturer->getManufacturer($id_brand);
		$data['manufacturer'] = $getmanufacturer;

		$data['category'] = $this->model_product->list_category()->result();
		$data['stock'] = $this->model_product->get_stock_status()->result();

		$this->load->view('templates/meta-admin');
		$this->load->view('templates/menu-admin');
		$this->load->view('templates/leftsidemenu');
		$this->load->view('admin/v_edit_product',$data);
		$this->load->view('templates/footer-admin');
	}

}
