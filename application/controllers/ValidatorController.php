<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ValidatorController extends CI_Controller {

    public function emailExists(){

        if(!isset($_GET['email'])) {
            echo json_encode("Invalid");
            return;
        }

        $this->load->database();
        $this->db->where("email", $_GET['email']);
        $query = $this->db->get('user');
        if ($query->num_rows() > 0){
            echo json_encode("Email address has already been taken.");
            return;
        }
        echo json_encode(true);

    }

    public function codeExists(){

        if(!isset($_GET['code'])) {
            echo json_encode("Invalid");
            return;
        }

        $this->load->database();
        $this->db->where("code", $_GET['code']);
        $query = $this->db->get('equipment');
        if ($query->num_rows() > 0){
            echo json_encode("Equipment code has already been taken.");
            return;
        }
        echo json_encode(true);

    }

    public function editCodeExists(){

        if(!isset($_GET['code'])) {
            echo json_encode("Invalid");
            return;
        }
        if(!isset($_GET['eq_id'])) {
            echo json_encode("Invalid");
            return;
        }

        $this->load->database();
        $this->db->where("code", $_GET['code']);
        $this->db->where("eq_id !=", $_GET['eq_id']);
        $query = $this->db->get('equipment');
        if ($query->num_rows() > 0){
            echo json_encode("Equipment code has already been taken.");
            return;
        }
        echo json_encode(true);

    }

    public function hallCodeExists(){

        if(!isset($_GET['code'])) {
            echo json_encode("Invalid");
            return;
        }

        $this->load->database();
        $this->db->where("code", $_GET['code']);
        $query = $this->db->get('lecture_hall');
        if ($query->num_rows() > 0){
            echo json_encode("Hall code has already been taken.");
            return;
        }
        echo json_encode(true);

    }

    public function editHallCodeExists(){

        if(!isset($_GET['code'])) {
            echo json_encode("Invalid");
            return;
        }
        if(!isset($_GET['hall_id'])) {
            echo json_encode("Invalid");
            return;
        }

        $this->load->database();
        $this->db->where("code", $_GET['code']);
        $this->db->where("hall_id !=", $_GET['hall_id']);
        $query = $this->db->get('lecture_hall');
        if ($query->num_rows() > 0){
            echo json_encode("Hall code has already been taken.");
            return;
        }
        echo json_encode(true);

    }

    public function lecturerIdExists(){

        if(!isset($_GET['id'])) {
            echo json_encode("Invalid");
            return;
        }

        $this->load->database();
        $this->db->where("id", $_GET['id']);
        $query = $this->db->get('academic_staff');
        if ($query->num_rows() > 0){
            echo json_encode("Lecturer id has already been taken.");
            return;
        }
        echo json_encode(true);

    }

    public function editLecturerIdExists(){

        if(!isset($_GET['id'])) {
            echo json_encode("Invalid");
            return;
        }
        if(!isset($_GET['staff_id'])) {
            echo json_encode("Invalid");
            return;
        }

        $this->load->database();
        $this->db->where("id", $_GET['id']);
        $this->db->where("staff_id !=", $_GET['staff_id']);
        $query = $this->db->get('academic_staff');
        if ($query->num_rows() > 0){
            echo json_encode("Lecturer id has already been taken.");
            return;
        }
        echo json_encode(true);

    }
    public function subjectCodeExists(){

        if(!isset($_GET['code'])) {
            echo json_encode("Invalid");
            return;
        }

        $this->load->database();
        $this->db->where("code", $_GET['code']);
        $query = $this->db->get('subject');
        if ($query->num_rows() > 0){
            echo json_encode("Subject code has already been taken.");
            return;
        }
        echo json_encode(true);

    }

    public function editSubjectCodeExists(){

        if(!isset($_GET['code'])) {
            echo json_encode("Invalid");
            return;
        }
        if(!isset($_GET['subject_id'])) {
            echo json_encode("Invalid");
            return;
        }

        $this->load->database();
        $this->db->where("code", $_GET['code']);
        $this->db->where("subject_id !=", $_GET['subject_id']);
        $query = $this->db->get('subject');
        if ($query->num_rows() > 0){
            echo json_encode("Subject code has already been taken.");
            return;
        }
        echo json_encode(true);

    }

    public function groupNameExists(){

        if(!isset($_GET['groupname'])) {
            echo json_encode("Invalid");
            return;
        }

        $this->load->database();
        $this->db->where("name", $_GET['groupname']);
        $query = $this->db->get('student_group');
        if ($query->num_rows() > 0){
            echo json_encode("Student group name has already been taken.");
            return;
        }
        echo json_encode(true);

    }

    public function editGroupNameExists(){

        if(!isset($_GET['groupname'])) {
            echo json_encode("Invalid");
            return;
        }
        if(!isset($_GET['group_id'])) {
            echo json_encode("Invalid");
            return;
        }

        $this->load->database();
        $this->db->where("name", $_GET['groupname']);
        $this->db->where("group_id !=", $_GET['group_id']);
        $query = $this->db->get('student_group');
        if ($query->num_rows() > 0){
            echo json_encode("Student group name has already been taken.");
            return;
        }
        echo json_encode(true);

    }
    public function rubricsExists(){

        if(!isset($_GET['code'])) {
            echo json_encode("Invalid");
            return;
        }

        $this->load->database();
        $this->db->where("subject_id", $_GET['code']);
        $query = $this->db->get('rubric');
        if ($query->num_rows() > 0){
            echo json_encode("Rubric code has already been taken.");
            return;
        }
        echo json_encode(true);

    }

    public function editRubricsExists(){

        if(!isset($_GET['code'])) {
            echo json_encode("Invalid");
            return;
        }
        if(!isset($_GET['rubric_id'])) {
            echo json_encode("Invalid");
            return;
        }

        $this->load->database();
        $this->db->where("subject_id", $_GET['code']);
        $this->db->where("rubric_id !=", $_GET['rubric_id']);
        $query = $this->db->get('rubric');
        if ($query->num_rows() > 0){
            echo json_encode("Rubric id has already been taken.");
            return;
        }
        echo json_encode(true);

    }


    public function validNic(){

        $nic=($_GET['nic']);
        if(!isset($nic)) {
            echo json_encode("Invalid1");
            return;
        }

        if(strlen($nic)!=10){
            echo json_encode("Invalid2");
            return;
        }

        for($a=0;$a<9;$a++){
            if(!is_numeric($nic[$a])){
                echo json_encode("Invalid3");
                return;
            }
        }

        if($nic[9]!="v" && $nic[9]!="V"){
            echo json_encode("Invalid4");
            return;
        }

        echo json_encode(true);

    }
}
