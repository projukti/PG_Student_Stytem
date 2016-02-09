<?php
Class result_gen_model extends CI_Model
{
function __construct() {
parent::__construct();
}
//////pagination

// Count all record of table "contact_info" in database.
public function record_count() {
return $this->db->count_all("student");
}

// Fetch data according to per_page limit.
public function fetch_data($limit,$id,$start) {
$this->db->limit($limit,$start);

$query = $this->db->get("student");	
if ($query->num_rows() > 0) {
foreach ($query->result() as $row) {
//$sid= $row->id;
//$this->result_gen_model->result_generation($sid);
$data[] = $row;
}
return $data;
}
return false;
}

function result_generation($sid,$sem,$session){ 
if(!empty($sid)){
$condition = "student_id ='".$sid."' AND sem ='".$sem."' AND session ='".$session."'";
$this->db->select('status');
$this->db->from('student_admit');
$this->db->where($condition);
$query = $this->db->get();
if ($query->num_rows() == 0) {$ad='A';return $ad;} else{	
$condition = "student_sem.student_id ='".$sid."' AND student_admit.session='".$session."' AND student_admit.sem ='".$sem."'";	
$this->db->select('student_admit.*');
$this->db->from('student_admit');
$this->db->join('student_sem', 'student_sem.student_id = student_admit.student_id');
$this->db->where($condition);
$query = $this->db->get();
//echo $this->db->last_query();
foreach ($query->result() as $row) {
$result_status= $row->result_status;

if (!empty($result_status)) {
$ad='Y';
}else{
$ad='N';	
}
return $ad;
}
}
}
}

function review_generation($sid,$sem,$session){ 
if(!empty($sid)){
$condition = "student_id ='".$sid."' AND sem ='".$sem."' AND session ='".$session."' AND review='Y'";
$this->db->select('review');
$this->db->from('student_admit');
$this->db->where($condition);
$query = $this->db->get();
if ($query->num_rows() == 0) {$ad='C';return $ad;} else{$ad='R';return $ad;}
}
}
function search_student($sem,$session){
$condition = "student_sem.sem ='".$sem."' AND student_sem.session ='".$session."'";
//$condition = "student_sem.sem ='".$sem."' AND student_sem.session ='".$session."'";
$this->db->select('student.*,student_sem.sem,student_sem.roll,student_sem.no,session.session_yr');
$this->db->from('student');
$this->db->join('student_sem','student.id=student_sem.student_id');
$this->db->join('session','session.id=student.session');
$this->db->where($condition);
$query = $this->db->get();
if ($query->num_rows() > 0) {
foreach ($query->result() as $row) {
$data[] = $row;
}
return $data;
}
return false;
}

function show_student_id($data,$sem,$session){
$condition ="student.id ='".$data."' and student_sem.sem ='".$sem."' and student_sem.session ='".$session."' ";
$this->db->select('student.*,student_sem.roll,student_sem.no');
$this->db->from('student');
$this->db->join('student_sem', 'student_sem.student_id = student.id');
$this->db->where($condition);
$query = $this->db->get();
//echo $this->db->last_query();
$result = $query->result();
return $result;
}	

function student_subject($data,$sem,$session){
$condition = "student_admit.student_id ='".$data."' and student_sem.student_id ='".$data."' and student_sem.session ='".$session."' and student_sem.sem ='".$sem."' and student_admit.session='".$session."' and student_admit.sem='".$sem."' and student_sem.status='R'";	
$this->db->select('student_admit.*,subjects.paper_name');
$this->db->from('student_admit');
$this->db->join('student_sem', 'student_sem.sem = student_admit.sem');
$this->db->join('subjects', 'student_admit.subject_id = subjects.id');
$this->db->where($condition);
$this->db->order_by("subjects.id", "asc"); 
$query = $this->db->get(); 
//echo $this->db->last_query();
$result = $query->result();
return $result;
}
function student_subjecte($data,$sem,$session){
$condition = "student_admit.student_id ='".$data."' and student_sem.student_id ='".$data."' and student_sem.sem ='".$sem."' and student_sem.session ='".$session."' and student_admit.session='".$session."' and student_admit.sem='".$sem."' and student_sem.status!='R' and student_admit.review!='X'";	
$this->db->select('student_admit.*,subjects.paper_name');
$this->db->from('student_admit');
$this->db->join('student_sem', 'student_sem.sem = student_admit.sem');
$this->db->join('subjects', 'student_admit.subject_id = subjects.id');
$this->db->where($condition);
$query = $this->db->get(); 
//echo $this->db->last_query();
$result = $query->result();
return $result;
}
function student_subjectr($data,$sem,$session){
$condition = "student_admit.student_id ='".$data."' and student_sem.student_id ='".$data."' and student_sem.sem ='".$sem."'  and student_sem.session ='".$session."' and student_admit.session='".$session."' and student_admit.sem='".$sem."' and student_sem.status!='R'";	
$this->db->select('student_admit.*,subjects.paper_name');
$this->db->from('student_admit');
$this->db->join('student_sem', 'student_sem.sem = student_admit.sem');
$this->db->join('subjects', 'student_admit.subject_id = subjects.id');
$this->db->where($condition);
$query = $this->db->get(); 
$result = $query->result();
return $result;
}
function student_subject_review($data,$sem,$session){
$condition = "student_admit.student_id ='".$data."' and student_admit.session='".$session."' and student_admit.sem='".$sem."' and student_admit.review='Y'";	
//$condition = "student_admit.student_id ='".$data."' and student_sem.student_id ='".$data."' and student_sem.sem ='".$sem."' and student_admit.session='".$session."' and student_admit.sem='".$sem."' and student_sem.status='R' and student_admit.review='Y'";	
$this->db->select('student_admit.*,subjects.paper_name');
$this->db->from('student_admit');
//$this->db->join('student_sem', 'student_sem.sem = student_admit.sem');
$this->db->join('subjects', 'student_admit.subject_id = subjects.id');
$this->db->where($condition);
$query = $this->db->get(); //echo $this->db->last_query();
$result = $query->result();
return $result;
}
// Inserting Result

function insert_result(){
 $id = $this->input->post('admit_id');
 $grp_a_marks = $this->input->post('grp_a_marks');
 $grp_b_marks = $this->input->post('grp_b_marks');
 $is_absent = $this->input->post('is_absent');
 $subject_id = $this->input->post('subject_id');
 $student_id = $this->input->post('id');
 $sem = $this->input->post('sem');
 $current_session = $this->input->post('current_session');
 $session_current = $this->input->post('session_current');
 $count_nc=0;

 ///////////////////////////////insert result subject wise and total/////////////////////////
 $updateArray = array();
 $i=0;
        for($x = 0; $x < sizeof($id); $x++){
			$i++; 
            $total = $grp_a_marks[$x] + $grp_b_marks[$x];
			
			if($subject_id[$x]!=19)
			{
		    if($total==17){$total_marks=$total+1;$grace_marks=1;}else{$total_marks=$total;$grace_marks=0;}	
			if($total<18){$result_status='NC';$count_nc=$count_nc+1;}else{$result_status='C';}	
			}
			else
			{
			if($total==35){$total_marks=$total+1;$grace_marks=1;}else{$total_marks=$total;$grace_marks=0;}	
			if($total<36){$result_status='NC';$count_nc=$count_nc+1;}else{$result_status='C';}
			}
			
			
			//$tot[]=$total_marks;
            $updateArray[] = array(
                'id'=>$id[$x],
                'grp_a_marks' => $grp_a_marks[$x],
                'grp_b_marks' => $grp_b_marks[$x],
				'is_absent' =>  $this->input->post('is_absent'.$i),
                'grace_marks' => $grace_marks,
                'total_marks' => $total_marks,
				'result_status' => $result_status
            );	
			
	   $condition = "student_id ='".$student_id."' AND sem ='".$sem."' AND id!='".$id[$x]."' and subject_id='".$subject_id[$x]."'";	 
	   $this->db->select('*');
       $this->db->from('student_admit');	 
	   $this->db->where($condition);
	   $query = $this->db->get();
       if ($query->num_rows() > 0) {
		  foreach ($query->result() as $row) {
          $admit_id=$row->id; 		          
		  $disposeArray = array(
                'disposed' => 'Yes',
                   ); 
				   }
		    $condition = "id ='".$admit_id."'";	 	 
	        $this->db->where($condition);		   
		    $this->db->update('student_admit',$disposeArray); 		   	   
             }		
	
      }
	  	
	  $this->db->update_batch('student_admit',$updateArray, 'id');

	  	   $condition_res = "student_id ='".$student_id."' AND sem ='".$sem."'";	 
	        $this->db->select('*');
            $this->db->from('result');	 
	        $this->db->where($condition_res);
	        $query_res = $this->db->get();	
            if ($query_res->num_rows() > 0) {
           
		    foreach ($query_res->result() as $row_res) {
				$id= $row_res->id;
		        $disposeresultArray = array(
                'disposed' => 'Yes'
                    );
		           }
				$condition = "id ='".$id."'";	 	 
	            $this->db->where($condition);
				$this->db->update('result',$disposeresultArray);
             }
			 
	   $condition = "student_id ='".$student_id."' AND sem ='".$sem."' AND disposed!='Yes'";	 
	   $this->db->select('*');
       $this->db->from('student_admit');	 
	   $this->db->where($condition);
	   $query = $this->db->get();	
       if ($query->num_rows() > 0) {
          $disposed='Yes';
		  foreach ($query->result() as $row) {
          $tot[]=$row->total_marks; 
		           }
             }	   
	  $percentage=(array_sum($tot)*100)/250;
	  $count_nc_prev_sem=$this->db->query("select id from student_admit where result_status='NC' and disposed!='Yes' and student_id='".$student_id."' and sem='".$sem."'")->num_rows();
	  if(($percentage>=40)&&($count_nc==0)&&($count_nc_prev_sem==0)){$status='Q';}else{$status='NQ';}
	  $data = array(
		'student_id'=> $this->input->post('id'),
		'sem' => $this->input->post('sem'),
		'session'=> $this->input->post('session_current'),
		'total'=>array_sum($tot),
		'percentage'=> $percentage,
		'status'=> $status,
		'remarks'=> $this->input->post('remarks'),
		'result_date'=> $this->input->post('result_date'),
		'entry_date'=> date('Y-m-d')
		);
		
	  $this->db->insert('result', $data); 
	  //echo $this->db->last_query();
	  
	  ///////////////////////////////insert result subject wise and total/////////////////////////
	  
	  ///////////////////////////////insert and upadete semetser/////////////////////////

$count_nc_prev=$this->db->query("select id from student_admit where result_status='NC' and disposed!='Yes' and student_id='".$student_id."'")->num_rows();

$count_nc_paper=$this->db->query("select id from student_admit where result_status='NC' and disposed!='Yes' and student_id='".$student_id."' and sem='".$sem."'")->num_rows();
	  
	  if($status=='Q'){if(($count_nc==0)&&($count_nc_paper==0)){$status_sem='Q';$admit=2;}else{$status_sem='NQ';$admit=0;}}else{$status_sem='NQ';$admit=0;}
	  
	  if($status=='NQ'&&$count_nc_paper==0){$readmit=1;}else{$readmit=0;}

		$dataold = array(
		'status' => $status_sem,
		'admit' => $admit,
		); 
	  $condition = "student_id ='".$student_id."' AND sem ='".$sem."' and session='".$session_current."'";	 
	  $this->db->where($condition);
	  $this->db->update('student_sem',$dataold);
	 //echo $this->db->last_query();exit();

	   $condition = "student_id ='".$student_id."' AND sem ='".$sem."' order by id desc";
	   $this->db->select('*');
       $this->db->from('student_sem');	 
	   $this->db->where($condition);
	   $query = $this->db->get();	
       if ($query->num_rows() > 0) {
       foreach ($query->result() as $row) {
        $current_sem=$row->sem;
		$session_cur=$row->session;
		$roll_old=$row->roll; 
		$no=$row->no; 
		                    }
             }
	  $ryear=substr($roll_old,2)+1;
	  if($current_sem=='1st'){$new_sem='2nd';$roll="28".$ryear; $rolln="12".$ryear;}
	  else if($current_sem=='2nd'){$new_sem='3rd';$roll="32".$ryear;$rolln="28".$ryear;}
	  else if($current_sem=='3rd'){$new_sem='4th';$roll="48".$ryear;$rolln="32".$ryear;}
	  else if($current_sem=='4th'){$rolln="48".$ryear;}
//	  if($current_sem=='1st'){$new_sem='2nd';$roll="28".date('y', strtotime('+1 year')); $rolln="12".date('y', strtotime('+1 year'));}
//	  else if($current_sem=='2nd'){$new_sem='3rd';$roll="32".date('y', strtotime('+1 year'));$rolln="28".date('y', strtotime('+1 year'));}
//	  else if($current_sem=='3rd'){$new_sem='4th';$roll="48".date('y', strtotime('+1 year'));$rolln="32".date('y', strtotime('+1 year'));}
//	  else if($current_sem=='4th'){$rolln="48".date('y', strtotime('+1 year'));}
       if($status_sem=='NQ')
	   {
		$dataoldR = array(
		'student_id' => $this->input->post('id'),
		'status' => 'R',
		'roll' => $rolln,
		'no' => $no,
		'session' => $session_current+1,
		'sem' => $sem,
		'readmit' => $readmit,
		); 
	  $this->db->insert('student_sem',$dataoldR);
	   	}
        
 
	  if($current_sem!='4th'){ 
	  $condition = "student_id ='".$student_id."' AND sem ='".$new_sem."'";	
	  $this->db->from('student_sem'); 
	  $this->db->where($condition);  
	  $query = $this->db->get();	  	
       if ($query->num_rows() == 0) {
	  $datanew = array(
         'student_id' => $this->input->post('id'),
		 'sem' => $new_sem,
		 'roll' => $roll,
		 'no' => $no,
		 'session' => $session_current+1,
		 'status' => 'R',
          );
      $this->db->insert('student_sem', $datanew);
	   }
	  }
	  
	  ///////////////////////////////insert and upadete semetser/////////////////////////
	  
	   ///////////////////////////////insert final result/////////////////////////
	  
	   $condition1 = "student_id ='".$student_id."' AND sem ='1st' AND status='Q'";
	   $this->db->select('*');
       $this->db->from('result');	 
	   $this->db->where($condition1);
	   $query1 = $this->db->get();	
       if ($query1->num_rows() > 0) {
          $sem1='done';
		  foreach ($query1->result() as $row1) {
          $sem1_marks=$row1->total; 
		                    }
             }else{$sem1='';}
	   $condition2 = "student_id ='".$student_id."' AND sem ='2nd' AND status='Q'";
	   $this->db->select('*');
       $this->db->from('result');	 
	   $this->db->where($condition2);
	   $query2 = $this->db->get();	
       if ($query2->num_rows() > 0) {
          $sem2='done';
		  foreach ($query2->result() as $row2) {
          $sem2_marks=$row2->total; 
		                    }
             }else{$sem2='';}
	   $condition3 = "student_id ='".$student_id."' AND sem ='3rd' AND status='Q'";
	   $this->db->select('*');
       $this->db->from('result');	 
	   $this->db->where($condition3);
	   $query3 = $this->db->get();	
       if ($query3->num_rows() > 0) {
          $sem3='done';
		  foreach ($query3->result() as $row3) {
          $sem3_marks=$row3->total; 
		                    }
             }else{$sem3='';}
	   $condition4 = "student_id ='".$student_id."' AND sem ='4th' AND status='Q'";
	   $this->db->select('*');
       $this->db->from('result');	 
	   $this->db->where($condition4);
	   $query4 = $this->db->get();	
       if ($query4->num_rows() > 0) {
          $sem4='done';
		  foreach ($query4->result() as $row4) {
          $sem4_marks=$row4->total; 
		                    }
             }else{$sem4='';}	
			 if(($sem1=='done')&&($sem2=='done')&&($sem3=='done')&&($sem4=='done'))
			 {
				 $marks=$sem1_marks+$sem2_marks+$sem3_marks+$sem4_marks;
				 $percentage=($marks*100)/1000;
				 if($percentage>=60){$grade='1st';} else if($percentage>=40 && $percentage<60){$grade='2nd';}else{ $grade='';}
				 $datafinal = array(
                 'student_id' => $this->input->post('id'),
		         'marks' => $marks,
		         'percentage' => $percentage,
		         'grade' => $grade,
				 'year' => date('Y'),
                      );
               $this->db->insert('result_final', $datafinal);
			      $datastd = array(
				 'status' => 'F'
                      );
			   	  $condition = "id ='".$this->input->post('id')."'";	 
	              $this->db->where($condition);
	              $this->db->update('student',$datastd);
			 }
		///////////////////////////////insert final result/////////////////////////	 
	//exit();	 
}


// Inserting Result

function edit_result(){
 $id = $this->input->post('admit_id');
 $grp_a_marks = $this->input->post('grp_a_marks');
 $grp_b_marks = $this->input->post('grp_b_marks');
 $is_absent = $this->input->post('is_absent');
 $subject_id = $this->input->post('subject_id');
 $student_id = $this->input->post('id');
 $sem = $this->input->post('sem');
 $current_session = $this->input->post('current_session');
 $session_current = $this->input->post('session_current');
 $count_nc=0;
 ///////////////////////////////insert result subject wise and total/////////////////////////
 $updateArray = array();
        $i=0;
        for($x = 0; $x < sizeof($id); $x++){
			$i++;
            $total = $grp_a_marks[$x] + $grp_b_marks[$x];
			
			if($subject_id[$x]!=19)
			{
		    if($total==17){$total_marks=$total+1;$grace_marks=1;}else{$total_marks=$total;$grace_marks=0;}	
			if($total<18){$result_status='NC';$count_nc=$count_nc+1;}else{$result_status='C';}	
			}
			else
			{
			if($total==35){$total_marks=$total+1;$grace_marks=1;}else{$total_marks=$total;$grace_marks=0;}	
			if($total<36){$result_status='NC';$count_nc=$count_nc+1;}else{$result_status='C';}
			}
			
			//$tot[]=$total_marks;
            $updateArray[] = array(
                'id'=>$id[$x],
                'grp_a_marks' => $grp_a_marks[$x],
                'grp_b_marks' => $grp_b_marks[$x],
				'is_absent' =>  $this->input->post('is_absent'.$i),
                'grace_marks' => $grace_marks,
                'total_marks' => $total_marks,
				'result_status' => $result_status
            );	
			
	   $condition = "student_id ='".$student_id."' AND sem ='".$sem."' AND id!='".$id[$x]."' and subject_id='".$subject_id[$x]."'";	 
	   $this->db->select('*');
       $this->db->from('student_admit');	 
	   $this->db->where($condition);
	   $query = $this->db->get();
       if ($query->num_rows() > 0) {
		  foreach ($query->result() as $row) {
          $admit_id=$row->id; 		          
		  $disposeArray = array(
                'disposed' => 'Yes',
                   ); 
				   }
		    $condition = "id ='".$admit_id."'";	 	 
	        $this->db->where($condition);		   
		    $this->db->update('student_admit',$disposeArray); 		   	   
             }		
	
      }
	  //print_r($updateArray);exit();	
	  $this->db->update_batch('student_admit',$updateArray, 'id');

//	  	   $condition_res = "student_id ='".$student_id."' AND sem ='".$sem."'";	 
//	        $this->db->select('*');
//            $this->db->from('result');	 
//	        $this->db->where($condition_res);
//	        $query_res = $this->db->get();	
//            if ($query_res->num_rows() > 0) {
//           
//		    foreach ($query_res->result() as $row_res) {
//				$id= $row_res->id;
//		        $disposeresultArray = array(
//                'disposed' => 'Yes'
//                    );
//		           }
//				$condition = "id ='".$id."'";	 	 
//	            $this->db->where($condition);
//				$this->db->update('result',$disposeresultArray);
//             }
			 
	   $condition = "student_id ='".$student_id."' AND sem ='".$sem."' AND disposed!='Yes'";	 
	   $this->db->select('*');
       $this->db->from('student_admit');	 
	   $this->db->where($condition);
	   $query = $this->db->get();	
       if ($query->num_rows() > 0) {
          $disposed='Yes';
		  foreach ($query->result() as $row) {
          $tot[]=$row->total_marks; 
		           }
             }	   
	  $percentage=(array_sum($tot)*100)/250;
	  if(($percentage>=40)&&($count_nc==0)){$status='Q';}else{$status='NQ';}
	  	  $data = array(
		'total'=>array_sum($tot),
		'percentage'=> $percentage,
		'status'=> $status,
		'remarks'=> $this->input->post('remarks'),
		'entry_date'=> date('Y-m-d')
		);
		$condition = "sem ='".$sem."' and session='".$session_current."' and student_id='".$student_id."'";	 	 
	    $this->db->where($condition);
		$this->db->update('result',$data);
//	  $data = array(
//		'student_id'=> $this->input->post('id'),
//		'sem' => $this->input->post('sem'),
//		'session'=> $this->input->post('session_current'),
//		'total'=>array_sum($tot),
//		'percentage'=> $percentage,
//		'status'=> $status,
//		'remarks'=> $this->input->post('remarks'),
//		'result_date'=> $this->input->post('result_date'),
//		'entry_date'=> date('Y-m-d')
//		);
//		
//	  $this->db->insert('result', $data); 
	  
	  ///////////////////////////////edit result subject wise and total/////////////////////////
	  
	  ///////////////////////////////edit and upadete semetser/////////////////////////
	  
	  if($status=='Q'){if($count_nc==0){$status_sem='Q';$admit=2;}else{$status_sem='NC';$admit=0;}}else{$status_sem='NQ';$admit=0;}

		$dataold = array(
		'status' => $status_sem,
		'admit' => $admit,
		); 
	  $condition = "student_id ='".$student_id."' AND sem ='".$sem."'";	 
	  $this->db->where($condition);
	  $this->db->update('student_sem',$dataold);

	   $condition = "student_id ='".$student_id."' AND sem ='".$sem."' order by id desc";
	   $this->db->select('*');
       $this->db->from('student_sem');	 
	   $this->db->where($condition);
	   $query = $this->db->get();	
       if ($query->num_rows() > 0) {
       foreach ($query->result() as $row) {
        $current_sem=$row->sem;
		$session_cur=$row->session;
		$roll_old=$row->roll; 
		$no=$row->no; 
		                    }
             }
	  $ryear=substr($roll_old,2)+1;
	  if($current_sem=='1st'){$new_sem='2nd';$roll="28".$ryear; $rolln="12".$ryear;}
	  else if($current_sem=='2nd'){$new_sem='3rd';$roll="32".$ryear;$rolln="28".$ryear;}
	  else if($current_sem=='3rd'){$new_sem='4th';$roll="48".$ryear;$rolln="32".$ryear;}
	  else if($current_sem=='4th'){$rolln="48".$ryear;}
//	  if($current_sem=='1st'){$new_sem='2nd';$roll="28".date('y', strtotime('+1 year')); $rolln="12".date('y', strtotime('+1 year'));}
//	  else if($current_sem=='2nd'){$new_sem='3rd';$roll="32".date('y', strtotime('+1 year'));$rolln="28".date('y', strtotime('+1 year'));}
//	  else if($current_sem=='3rd'){$new_sem='4th';$roll="48".date('y', strtotime('+1 year'));$rolln="32".date('y', strtotime('+1 year'));}
//	  else if($current_sem=='4th'){$rolln="48".date('y', strtotime('+1 year'));}
       if($status_sem=='NQ')
	   {
		$dataoldR = array(
		'student_id' => $this->input->post('id'),
		'status' => 'R',
		'roll' => $rolln,
		'no' => $no,
		'session' => $session_current+1,
		'sem' => $sem,
		); 
	  //$this->db->insert('student_sem',$dataoldR);
	   	}
        
 
	  if($current_sem!='4th'){ 
	  $condition = "student_id ='".$student_id."' AND sem ='".$new_sem."'";	
	  $this->db->from('student_sem'); 
	  $this->db->where($condition);  
	  $query = $this->db->get();	  	
       if ($query->num_rows() == 0) {
	  $datanew = array(
         'student_id' => $this->input->post('id'),
		 'sem' => $new_sem,
		 'roll' => $roll,
		 'no' => $no,
		 'session' => $session_current+1,
		 'status' => 'R',
          );
      //$this->db->insert('student_sem', $datanew);
	   }
	  }
	  
	  ///////////////////////////////edit and upadete semetser/////////////////////////
	  
	   ///////////////////////////////edit final result/////////////////////////
	  
	   $condition1 = "student_id ='".$student_id."' AND sem ='1st' AND status='Q'";
	   $this->db->select('*');
       $this->db->from('result');	 
	   $this->db->where($condition1);
	   $query1 = $this->db->get();	
       if ($query1->num_rows() > 0) {
          $sem1='done';
		  foreach ($query1->result() as $row1) {
          $sem1_marks=$row1->total; 
		                    }
             }else{$sem1='';}
	   $condition2 = "student_id ='".$student_id."' AND sem ='2nd' AND status='Q'";
	   $this->db->select('*');
       $this->db->from('result');	 
	   $this->db->where($condition2);
	   $query2 = $this->db->get();	
       if ($query2->num_rows() > 0) {
          $sem2='done';
		  foreach ($query2->result() as $row2) {
          $sem2_marks=$row2->total; 
		                    }
             }else{$sem2='';}
	   $condition3 = "student_id ='".$student_id."' AND sem ='3rd' AND status='Q'";
	   $this->db->select('*');
       $this->db->from('result');	 
	   $this->db->where($condition3);
	   $query3 = $this->db->get();	
       if ($query3->num_rows() > 0) {
          $sem3='done';
		  foreach ($query3->result() as $row3) {
          $sem3_marks=$row3->total; 
		                    }
             }else{$sem3='';}
	   $condition4 = "student_id ='".$student_id."' AND sem ='4th' AND status='Q'";
	   $this->db->select('*');
       $this->db->from('result');	 
	   $this->db->where($condition4);
	   $query4 = $this->db->get();	
       if ($query4->num_rows() > 0) {
          $sem4='done';
		  foreach ($query4->result() as $row4) {
          $sem4_marks=$row4->total; 
		                    }
             }else{$sem4='';}	
			 if(($sem1=='done')&&($sem2=='done')&&($sem3=='done')&&($sem4=='done'))
			 {
				 $marks=$sem1_marks+$sem2_marks+$sem3_marks+$sem4_marks;
				 $percentage=($marks*100)/1000;
				 if($percentage>=60){$grade='1st';} else if($percentage>=40 && $percentage<60){$grade='2nd';}else{ $grade='';}
				 $datafinal = array(
                 'student_id' => $this->input->post('id'),
		         'marks' => $marks,
		         'percentage' => $percentage,
		         'grade' => $grade,
				 'year' => date('Y'),
                      );
               $this->db->insert('result_final', $datafinal);
			      $datastd = array(
				 'status' => 'F'
                      );
			   	  $condition = "id ='".$this->input->post('id')."'";	 
	              $this->db->where($condition);
	              $this->db->update('student',$datastd);
			 }
		///////////////////////////////edit final result/////////////////////////	 
	//exit();	 
}
function review_result(){
 $id = $this->input->post('admit_id');
 $grp_a_marks = $this->input->post('grp_a_marks');
 $grp_b_marks = $this->input->post('grp_b_marks');
 $is_absent = $this->input->post('is_absent');
 $subject_id = $this->input->post('subject_id');
 $student_id = $this->input->post('id');
 $sem = $this->input->post('sem');
 $current_session = $this->input->post('current_session');
 $session_current = $this->input->post('session_current');
 $count_nc=0;
 ///////////////////////////////insert result subject wise and total/////////////////////////
 $updateArray = array();
        for($x = 0; $x < sizeof($id); $x++){
			 
            $total = $grp_a_marks[$x] + $grp_b_marks[$x];
			
			if($subject_id[$x]!=19)
			{
		    if($total==17){$total_marks=$total+1;$grace_marks=1;}else{$total_marks=$total;$grace_marks=0;}	
			if($total<18){$result_status='NC';$count_nc=$count_nc+1;}else{$result_status='C';}	
			}
			else
			{
			if($total==35){$total_marks=$total+1;$grace_marks=1;}else{$total_marks=$total;$grace_marks=0;}	
			if($total<36){$result_status='NC';$count_nc=$count_nc+1;}else{$result_status='C';}
			}
			
			
			//$tot[]=$total_marks;
            $updateArray[] = array(
                'id'=>$id[$x],
                'grp_a_marks' => $grp_a_marks[$x],
                'grp_b_marks' => $grp_b_marks[$x],
				'is_absent' => $is_absent[$x],
                'grace_marks' => $grace_marks,
                'total_marks' => $total_marks,
				'result_status' => $result_status
            );	
			
	   $condition = "student_id ='".$student_id."' AND sem ='".$sem."' AND id!='".$id[$x]."' and subject_id='".$subject_id[$x]."'";	 
	   $this->db->select('*');
       $this->db->from('student_admit');	 
	   $this->db->where($condition);
	   $query = $this->db->get();
       if ($query->num_rows() > 0) {
		  foreach ($query->result() as $row) {
          $admit_id=$row->id; 		          
		  $disposeArray = array(
                'disposed' => 'Yes',
                   ); 
				   }
		    $condition = "id ='".$admit_id."'";	 	 
	        $this->db->where($condition);		   
		    $this->db->update('student_admit',$disposeArray); 		   	   
             }		
	
      }
	  	
	  $this->db->update_batch('student_admit',$updateArray, 'id');

//	  	   $condition_res = "student_id ='".$student_id."' AND sem ='".$sem."'";	 
//	        $this->db->select('*');
//            $this->db->from('result');	 
//	        $this->db->where($condition_res);
//	        $query_res = $this->db->get();	
//            if ($query_res->num_rows() > 0) {
//           
//		    foreach ($query_res->result() as $row_res) {
//				$id= $row_res->id;
//		        $disposeresultArray = array(
//                'disposed' => 'Yes'
//                    );
//		           }
//				$condition = "id ='".$id."'";	 	 
//	            $this->db->where($condition);
//				$this->db->update('result',$disposeresultArray);
//             }
			 
	   $condition = "student_id ='".$student_id."' AND sem ='".$sem."' AND disposed!='Yes'";	 
	   $this->db->select('*');
       $this->db->from('student_admit');	 
	   $this->db->where($condition);
	   $query = $this->db->get();	
       if ($query->num_rows() > 0) {
          $disposed='Yes';
		  foreach ($query->result() as $row) {
          $tot[]=$row->total_marks; 
		           }
             }	   
	  $percentage=(array_sum($tot)*100)/250;
	  if(($percentage>=40)&&($count_nc==0)){$status='Q';}else{$status='NQ';}
	  	  $data = array(
		'total'=>array_sum($tot),
		'percentage'=> $percentage,
		'status'=> $status,
		'remarks'=> $this->input->post('remarks'),
		'entry_date'=> date('Y-m-d')
		);
		$condition = "sem ='".$sem."' and session='".$session_current."' and student_id='".$student_id."'";	 	 
	    $this->db->where($condition);
		$this->db->update('result',$data);
//	  $data = array(
//		'student_id'=> $this->input->post('id'),
//		'sem' => $this->input->post('sem'),
//		'session'=> $this->input->post('session_current'),
//		'total'=>array_sum($tot),
//		'percentage'=> $percentage,
//		'status'=> $status,
//		'remarks'=> $this->input->post('remarks'),
//		'result_date'=> $this->input->post('result_date'),
//		'entry_date'=> date('Y-m-d')
//		);
//		
//	  $this->db->insert('result', $data); 
	  
	  ///////////////////////////////edit result subject wise and total/////////////////////////
	  
	  ///////////////////////////////edit and upadete semetser/////////////////////////
	  
	  if($status=='Q'){if($count_nc==0){$status_sem='Q';$admit=2;}else{$status_sem='NC';$admit=0;}}else{$status_sem='NQ';$admit=0;}

		$dataold = array(
		'status' => $status_sem,
		'admit' => $admit,
		); 
	  $condition = "student_id ='".$student_id."' AND sem ='".$sem."'";	 
	  $this->db->where($condition);
	  $this->db->update('student_sem',$dataold);

	   $condition = "student_id ='".$student_id."' AND sem ='".$sem."' order by id desc";
	   $this->db->select('*');
       $this->db->from('student_sem');	 
	   $this->db->where($condition);
	   $query = $this->db->get();	
       if ($query->num_rows() > 0) {
       foreach ($query->result() as $row) {
        $current_sem=$row->sem;
		$session_cur=$row->session;
		$roll_old=$row->roll; 
		$no=$row->no; 
		                    }
             }
	  $ryear=substr($roll_old,2)+1;
	  if($current_sem=='1st'){$new_sem='2nd';$roll="28".$ryear; $rolln="12".$ryear;}
	  else if($current_sem=='2nd'){$new_sem='3rd';$roll="32".$ryear;$rolln="28".$ryear;}
	  else if($current_sem=='3rd'){$new_sem='4th';$roll="48".$ryear;$rolln="32".$ryear;}
	  else if($current_sem=='4th'){$rolln="48".$ryear;}
//	  if($current_sem=='1st'){$new_sem='2nd';$roll="28".date('y', strtotime('+1 year')); $rolln="12".date('y', strtotime('+1 year'));}
//	  else if($current_sem=='2nd'){$new_sem='3rd';$roll="32".date('y', strtotime('+1 year'));$rolln="28".date('y', strtotime('+1 year'));}
//	  else if($current_sem=='3rd'){$new_sem='4th';$roll="48".date('y', strtotime('+1 year'));$rolln="32".date('y', strtotime('+1 year'));}
//	  else if($current_sem=='4th'){$rolln="48".date('y', strtotime('+1 year'));}
       if($status_sem=='NQ')
	   {
		$dataoldR = array(
		'student_id' => $this->input->post('id'),
		'status' => 'R',
		'roll' => $rolln,
		'no' => $no,
		'session' => $session_current+1,
		'sem' => $sem,
		); 
	  //$this->db->insert('student_sem',$dataoldR);
	   	}
        
 
	  if($current_sem!='4th'){ 
	  $condition = "student_id ='".$student_id."' AND sem ='".$new_sem."'";	
	  $this->db->from('student_sem'); 
	  $this->db->where($condition);  
	  $query = $this->db->get();	  	
       if ($query->num_rows() == 0) {
	  $datanew = array(
         'student_id' => $this->input->post('id'),
		 'sem' => $new_sem,
		 'roll' => $roll,
		 'no' => $no,
		 'session' => $session_current+1,
		 'status' => 'R',
          );
      //$this->db->insert('student_sem', $datanew);
	   }
	  }
	  
	  ///////////////////////////////edit and upadete semetser/////////////////////////
	  
	   ///////////////////////////////edit final result/////////////////////////
	  
	   $condition1 = "student_id ='".$student_id."' AND sem ='1st' AND status='Q'";
	   $this->db->select('*');
       $this->db->from('result');	 
	   $this->db->where($condition1);
	   $query1 = $this->db->get();	
       if ($query1->num_rows() > 0) {
          $sem1='done';
		  foreach ($query1->result() as $row1) {
          $sem1_marks=$row1->total; 
		                    }
             }else{$sem1='';}
	   $condition2 = "student_id ='".$student_id."' AND sem ='2nd' AND status='Q'";
	   $this->db->select('*');
       $this->db->from('result');	 
	   $this->db->where($condition2);
	   $query2 = $this->db->get();	
       if ($query2->num_rows() > 0) {
          $sem2='done';
		  foreach ($query2->result() as $row2) {
          $sem2_marks=$row2->total; 
		                    }
             }else{$sem2='';}
	   $condition3 = "student_id ='".$student_id."' AND sem ='3rd' AND status='Q'";
	   $this->db->select('*');
       $this->db->from('result');	 
	   $this->db->where($condition3);
	   $query3 = $this->db->get();	
       if ($query3->num_rows() > 0) {
          $sem3='done';
		  foreach ($query3->result() as $row3) {
          $sem3_marks=$row3->total; 
		                    }
             }else{$sem3='';}
	   $condition4 = "student_id ='".$student_id."' AND sem ='4th' AND status='Q'";
	   $this->db->select('*');
       $this->db->from('result');	 
	   $this->db->where($condition4);
	   $query4 = $this->db->get();	
       if ($query4->num_rows() > 0) {
          $sem4='done';
		  foreach ($query4->result() as $row4) {
          $sem4_marks=$row4->total; 
		                    }
             }else{$sem4='';}	
			 if(($sem1=='done')&&($sem2=='done')&&($sem3=='done')&&($sem4=='done'))
			 {
				 $marks=$sem1_marks+$sem2_marks+$sem3_marks+$sem4_marks;
				 $percentage=($marks*100)/1000;
				 if($percentage>=60){$grade='1st';} else if($percentage>=40 && $percentage<60){$grade='2nd';}else{ $grade='';}
				 $datafinal = array(
                 'student_id' => $this->input->post('id'),
		         'marks' => $marks,
		         'percentage' => $percentage,
		         'grade' => $grade,
				 'year' => date('Y'),
                      );
               $this->db->insert('result_final', $datafinal);
			      $datastd = array(
				 'status' => 'F'
                      );
			   	  $condition = "id ='".$this->input->post('id')."'";	 
	              $this->db->where($condition);
	              $this->db->update('student',$datastd);
			 }
		///////////////////////////////edit final result/////////////////////////	 
	//exit();	 
}
function students_session(){
$query = $this->db->get('session');
$query_result = $query->result();
return $query_result;
}
function current_session(){
$condition = "active ='1'";	
$this->db->select('*');
$this->db->from('session');
$this->db->where($condition);
$query = $this->db->get();
$query_result = $query->result();
return $query_result;
}
function insert_review(){

   $id = $this->input->post('id');
   $admit_id = $this->input->post('admit_id');
   $se = $this->input->post('sem');
   $ss = $this->input->post('session_current');
   $subject_id = $this->input->post('subject_id');
   $sb2 = $this->input->post('sub_id');
   //print_r($admit_id);print_r($subject_id);exit;
	for($x = 0; $x < sizeof($subject_id); $x++){
	  $sta="Y";
	  $ex_sta="";
	  $data[] = array(
		'subject_id' => $subject_id[$x],
		'sem' => $this->input->post('sem'),
		'student_id'=> $this->input->post('id'),
		'session'=> $ss,
		'status'=>$sta,
		'result_status'=>$ex_sta,
		'review'=>'Y'
		);
		$query=$this->db->query("select id from student_admit where subject_id='".$subject_id[$x]."' and student_id='".$id."' and sem='".$se."' and session='".$ss."'")->result_array();
		$query[0]['id'];
		//if($admit_id[$x]=)
		$aid=$admit_id[$x];	

	  $updateArray[] = array(
		'id' => $query[0]['id'],
		'review'=>'X',
		'disposed'=>'Yes'
		);

	}	
//print_r($updateArray);exit();
	$this->db->update_batch('student_admit',$updateArray, 'id');
	$this->db->insert_batch('student_admit', $data);
}
function insertexam_subject($data,$datau,$dataa){

}
function studentac_session(){
$condition= "active ='1'";	
$this -> db -> select('session.id');
$this -> db -> where($condition);
$query = $this->db->get('session');
$query_result = $query->result();
return $query_result;}
//function up_admit($id,$se){
//$data=array('admit'=>1);
//$condition = "student_id ='".$id."' and sem='".$se."'";	
//$this->db->where($condition);
//$this->db->update('student_sem', $data);
//}
//function up_student($id,$ss){
//$data=array('exam_session'=>$ss);
//$condition = "id ='".$id."'";	
//$this->db->where($condition);
//$this->db->update('student', $data);
//}
}
?>