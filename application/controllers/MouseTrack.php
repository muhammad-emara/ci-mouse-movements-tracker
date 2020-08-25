<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	/**
	 * Created by PhpStorm.
	 * User: Emara/Muhammad Emara (muhammad.emara@gmail.com)
	 * Date: 2020-08-25
	 * Time: 11:51
	 * File: MouseTrack
	 * File  MouseTrack.php
	 * */
	
	class MouseTrack extends CI_Controller
	{
		
		function __construct(){
			parent::__construct();
			$this->load->model('m_mouseTrack');
		}
		
		function index(){
			$this->load->view('v_mouse-tracker');
		}
		
		function inputPage(){
			$this->load->view('v_input');
		}
		function outputPage(){
			$this->load->view('v_output');
		}
	
	
	
//save records
	//take points as all points till click on save button
		function save_record(){
			$pointsjson=$this->input->post('mousepointJson');
			
			$data=$this->m_mouseTrack->save_point($pointsjson);
			echo json_encode($data);
		}
		
		
		//get records
		//get points as all points till click on save button
		function get_record(){
			//$pointsjson=$this->input->post('mousepointJson');
			
			$data=$this->m_mouseTrack->get_point();
			echo json_encode($data);
		}
		
		
	
	
		
		
	}