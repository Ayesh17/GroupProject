<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//create Subject Controller by extending codeignitor Controller
class Subject extends CI_Controller {

    //load the subject data and load the subject View with the relevant data
    public function index(){
        $this->load->library('session');
        if(!$this->session->userdata("logged") || $this->session->userdata("type") != "admin"){
            $this->load->view("templates/header");
            $this->load->view("errors/unauthorized_access");
            $this->load->view("templates/footer");
            return;
        }
        $data = [];
        $this->load->model("Subject_model");
        $this->load->model("degree_model");

        $data['array'] = [];
        $subjects = $this->Subject_model->getAllSubjects();
        foreach($subjects as $subject){
            $g = [];
            $g['subject'] = $subject;
            $g['degree'] = $this->degree_model->getById($subject->getDegreeId());
            array_push($data['array'], $g);
        }

        $data['degree_id'] = $this->degree_model->getName();


        $path['path'] = array(
            "Dashboard" => base_url("dashboard"),
            "Subjects" => base_url("subjects")
        );

        $this->load->view("templates/header", $path);
        $this->load->view('views/SubjectsView', $data);
        $this->load->view('templates/footer');
    }


    //load form to add subjects
	public function add(){
        $this->load->library('session');
        if(!$this->session->userdata("logged") || $this->session->userdata("type") != "admin"){
            $this->load->view("templates/header");
            $this->load->view("errors/unauthorized_access");
            $this->load->view("templates/footer");
            return;
        }
        $this->load->model("Degree_model");
        $data['degrees'] = $this->Degree_model->getAllDegrees();

        $path['path'] = array(
            "Dashboard" => base_url("dashboard"),
            "Subjects" => base_url("subjects"),
            "Add Subject" => base_url("subjects/add"),
        );

        $this->load->view("templates/header", $path);
        $this->load->view('forms/addSubject', $data);
		$this->load->view('templates/footer');
	}


    //load form to edit subjects
    public function edit(){
        $this->load->library("session");
        if(!$this->session->userdata("logged") || $this->session->userdata("type") != "admin"){
            $this->load->view("templates/header");
            $this->load->view("errors/unauthorized_access");
            $this->load->view("templates/footer");
            return;
        }
        $data['id'] = $_GET['id'];
        $this->load->model("subject_model");
        $data['subject'] = $this->subject_model->getSubjectById($data['id']);
        $this->load->model("Degree_model");
        $data['degrees'] = $this->Degree_model->getAllDegrees();

        $path['path'] = array(
            "Dashboard" => base_url("dashboard"),
            "Subjects" => base_url("subjects"),
            "Edit Subject" => "#",
        );
        $this->load->view("templates/header", $path);
        $this->load->view('forms/editSubject', $data);
        $this->load->view("templates/footer");
    }


    //delete a subject
    public function delete(){
        $this->load->library("session");
        if(!$this->session->userdata("logged") || $this->session->userdata("type") != "admin"){
            echo "unauthorized access";
            return;
        }
        try{
            $data['id'] = $_GET['id'];
            $this->load->model("subject_model");
            $data['subject'] = $this->subject_model->deleteSubjectById($data['id']);
            redirect(base_url("subjects"), 'location');
        }
        catch(Exception $ex){
            redirect(base_url("subjects")."?error=true", 'location');
        }
    }

    //back end validation
    private function  validate(){
        $this->load->library('form_validation');
        $this->load->database();

        $this->form_validation->set_rules(
            'code',
            'Code',
            'required'
        );

        $this->form_validation->set_rules(
            'name',
            'Name',
            'required'
        );

        $this->form_validation->set_rules(
            'degree',
            'Degree',
            'required|integer'
        );

        $this->form_validation->set_rules(
            'year',
            'Year',
            'required|integer|in_list[1,2,3,4]'
        );

        $this->form_validation->set_rules(
            'semester',
            'Semester',
            'required|integer|in_list[1,2]'
        );

        if($this->form_validation->run() == false){
            echo validation_errors();
            exit();
            //throw new Exception();
        }

    }

    //Validate and insert new subjects to the database
    public function process_add(){
        $this->load->library("session");
        if(!$this->session->userdata("logged") || $this->session->userdata("type") != "admin"){
            echo "unauthorized access";
            return;
        }
        try{

            $this->validate();

            $semester = $_POST['semester'];
            $code = $_POST['code'];
            $name = $_POST['name'];
            $degreeId = $_POST['degree'];
            $year = $_POST['year'];

            $this->load->database();
            $this->db->set("semester", $semester);
            $this->db->set("code", $code);
            $this->db->set("name", $name);
            $this->db->set("degree_id", $degreeId);
            $this->db->set("year", $year);
            $this->db->insert("subject");

            redirect(base_url("subjects")."?success=true", 'location');

        }
        catch(Exception $e){
            redirect(base_url("subjects/add")."?error=true", 'location');
        }

    }

    //Validate and update existing subjects to the database
    public function process_edit(){
        $this->load->library("session");
        if(!$this->session->userdata("logged") || $this->session->userdata("type") != "admin"){
            echo "unauthorized access";
            return;
        }
        try{
            $id = $_GET['id'];
            $this->validate();
            $semester = $_POST['semester'];
            $code = $_POST['code'];
            $name = $_POST['name'];
            $degreeId = $_POST['degree'];
            $year = $_POST['year'];

            $this->load->database();
            $this->db->set("semester", $semester);
            $this->db->set("code", $code);
            $this->db->set("name", $name);
            $this->db->set("degree_id", $degreeId);
            $this->db->set("year", $year);
            $this->db->where("subject_id", $_GET['id']);
            $this->db->update("subject");



            redirect(base_url("subjects")."?success=true", 'location');

        }
        catch(Exception $e){
            redirect(base_url("subjects/edit")."?error=true&id=$id", 'location');
        }

    }
}
