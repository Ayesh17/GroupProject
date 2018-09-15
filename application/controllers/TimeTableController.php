<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TimeTableController extends CI_Controller {

	public function index(){

		$data = [];
		$data['formData'] = [];

		$this->load->library('session');

		if(isset($_GET['degree'])){
			$degree_id = $_GET['degree'];
			$this->load->model("Degree_model");
			$degree = $this->Degree_model->getById($degree_id);
			echo $degree->getName();
		}

		if(isset($_GET['group'])){
			$group_id = $_GET['group'];
			$this->load->model("Group_model");
			$group = $this->Group_model->getById($group_id);
			$data['group']= $group;
		}

		$data['semester'] = $data['formData']['semester'] = $_GET['semester'];

		$this->load->model("Subject_model");
		$data['formData']['subjects'] = $this->Subject_model->getSubjectsForGroupSemester($data['group'], $_GET['semester']);
		$data['formData']['group'] = $group;

		$this->load->model("Venue_model");
		$data['formData']['venues'] = $this->Venue_model->getAllVenues();

		$this->load->model("Staff_model");
		$data['formData']['staff'] = $this->Staff_model->getAllStaff();

		$this->load->model("Lecture_model");
		$data['lectures'] = $this->Lecture_model->getLectures($group_id, $_GET['semester']);

		$this->load->view("templates/header");
		$this->load->view("TimeTableView", $data);
		$this->load->view("templates/footer");
	}

}
