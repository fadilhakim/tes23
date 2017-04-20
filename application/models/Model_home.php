<?php 

class Model_home extends CI_Model {


		function list_clients() {

			$clients = $this->db->get('client_tbl');
			return $clients;
		}

		function list_slider() {

			$slider = $this->db->get('slider_tbl');
			return $slider;
		}

		function list_manufacturer() {

			$slider = $this->db->get('manufacturer_tbl');
			return $slider;
		}

		function list_news() {
			$news = $this->db->get('news_tbl');
			return $news;
		}
}