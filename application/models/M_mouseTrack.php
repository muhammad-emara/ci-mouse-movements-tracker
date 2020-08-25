<?php
	/**
	 * Created by PhpStorm.
	 * User: Emara/Muhammad Emara (muhammad.emara@gmail.com)
	 * Date: 2020-08-25
	 * Time: 11:52
	 * File: M_mouseTrack
	 * File  M_mouseTrack.php
	 * */
	
	class M_mouseTrack extends CI_Model
	{
		
		
		function save_point($pointsTxt){
			$recods=$this->db->query("INSERT INTO movements_record (points_txt)VALUES('$pointsTxt')");
			return $recods;
		}
	
	
		
		function get_point($id=0){
			$recods=false;
			
			$query = $this->db->get_where('movements_record', array('id' => $id), 1);
			
			foreach ($query->result() as $row)
			{
				echo $row->title;
			}
			
			if($id == 0)
			{
				$this->db->limit(1);
				$this->db->order_by('id', 'DESC');
				
			//	$recods=$this->db->query("SELECT `points_txt` FROM `movements_record` limit 1 ");
				
				$query = $this->db->get('movements_record');//->result_array();
				
				foreach ($query->result() as $row)
				{
					$recods= $row->points_txt;
				}
			}else{
			//	$recods=$this->db->query("SELECT `points_txt` FROM `movements_record` limit 1 ");
				
				
				$recods = $this->db->get_where('movements_record', array('id' => $id), 1)->result_array();
			}
			
			return $recods;
		}
		
	}