    <?php
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
	 $data['access'] = $session_data['access'];
	 $access=$data['access'];
	 $this->load->view('templates/header',$data);
	 ?>
<SCRIPT language=Javascript>
<!--
function isNumberKey(evt)
{
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57))
return false;

return true;
}
//-->
</SCRIPT>
        	<div class="main_body">
            	<div class="main_container">
                 <?php if(isset($single_student)){?>
                <?php echo form_open('result_gen/insert_result'); ?>               
                	<div class="container">
                    <h2>Result Generate</h2>
					  <?php foreach ($single_student as $single_student): ?>
                      <div class="form_box">
                      		
					        <div class="form_row">
                   	        <h5>Name <span style="color:#F00; font-weight:400;">*</span></h5>
                                <input type="text" class="form_input" name="name" value="<?php echo $single_student->name; ?>" readonly/>
                                <?php echo form_error('name'); ?>
                            </div>
                            
                            <div class="form_row">
                           	<h5>Name of Father/ Mother /Guardian <span style="color:#F00; font-weight:400;">*</span>:</h5>
                             <input type="text" class="form_input" name="guardian_nm" value="<?php echo $single_student->guardian_nm; ?>" readonly/>
                             <?php echo form_error('guardian_nm'); ?>
                            </div>
                            
                            <div class="form_row">
                            	<h5>Roll <span style="color:#F00; font-weight:400;">*</span></h5>
                                <input type="text" class="form_input" name="roll" value="<?php echo $single_student->roll; ?>" readonly/>
                                <?php echo form_error('roll'); ?>
                            </div>
                                                        <div class="form_row">
                            	<h5>No <span style="color:#F00; font-weight:400;">*</span>:</h5>
                                <input type="text" class="form_input" name="no" value="<?php echo $single_student->no; ?>" readonly/>
                                <?php echo form_error('no'); ?>
                          </div>
                            
                          <div class="form_row">
                           	<h5>College Ref. No. <span style="color:#F00; font-weight:400;">*</span>:</h5>
                             <input type="text" class="form_input" name="clg_ref_no" value="<?php echo $single_student->clg_ref_no; ?>" readonly/>
                             <?php echo form_error('clg_ref_no'); ?>
                            </div>
                            
                          <div class="form_row">
                           	<h5>C.U. Reg. No. <span style="color:#F00; font-weight:400;">*</span>:</h5>
                             <input type="text" class="form_input" name="cu_reg_no" value="<?php echo $single_student->cu_reg_no; ?>" readonly/>
                             <?php echo form_error('cu_reg_no'); ?>
                            </div>
                            <div class="form_row">
                           	<h5>Result Date<span style="color:#F00; font-weight:400;">*</span>:</h5>
                             <input type="text" class="form_input" name="result_date" id="dob" value="">
                             <?php echo form_error('result_date'); ?>
                            </div>
                            </div>    
                            <input type="hidden" id="id" name="id" value="<?php echo $single_student->id; ?>">
                            <input type="hidden" id="session_current" name="session_current" value="<?php echo $single_student->exam_session; ?>">
                             <?php endforeach; ?>
                         
                     <div class="form_box">
                          <div class="form_row">
                           	<h5>Enter Marks Obtained<span style="color:#F00; font-weight:400;">*</span>:</h5>
                       </div>
                            
                          
                          <?php echo form_error('caste'); ?>
                            <div class="form_row">
                            <div style=" width:40%; float:left;">Papaer Name</div>
                            <div style=" width:20%; float:left;">Group A Marks</div>
                            <div style=" width:20%; float:left;">Group B/Practical Marks</div>
                            <div style=" width:10%; float:left;">Is Absent</div>
                           </div>
                          <?php 
						  $x=0;
						  foreach ($student_subject as $student_subject): 
						  $x++;
						  ?>
                          <div class="form_row">
                        	<div style=" width:40%; float:left;"><?php echo $student_subject->paper_name;?></div>
                           <input type="hidden" name="admit_id[]" value="<?php echo $student_subject->id; ?>">
                           <input type="hidden" name="subject_id[]" value="<?php echo $student_subject->subject_id; ?>">
                            <div style=" width:20%; float:left;"><input type="text" name="grp_a_marks[]" value="" style="width:100px;" onkeypress="return isNumberKey(event);"></div>
                            <div style=" width:20%; float:left;"><input type="text" name="grp_b_marks[]" value="" style="width:100px;" onkeypress="return isNumberKey(event);"></div>
                            <div style=" width:10%; float:left;">
                            <input type="checkbox" name="absent<?php echo $x;?>" id="absent<?php echo $x;?>" value="1" <?php if($student_subject->is_absent==1){echo 'checked';}?> >
                            <input type="hidden" name="is_absent<?php echo $x;?>" id="is_absent<?php echo $x;?>" value="<?php if($student_subject->is_absent==1){echo '1';}else{echo '0';}?>">
                            <script>
							$('#absent<?php echo $x;?>').change(function(){
    var checkChange = this.checked ? '1' : '0';
    $('#is_absent<?php echo $x;?>').val(checkChange);
});
							</script>
                            </div>
                           </div>
                        <input type="hidden" id="sem" name="sem" value="<?php echo $student_subject->sem; ?>">
                        <input type="hidden" id="sem" name="session_admit" value="<?php echo $student_subject->session; ?>">
                             <?php endforeach; ?>
                              
                             <?php foreach ($current_session as $current_session): ?>
                         <input type="hidden" name="current_session" value="<?php echo $current_session->id; ?>" /> 
                         <?php endforeach; ?>
                            <div class="form_row">
                            	<h5></h5>
                                <input type="submit" class="button" name="add" value="Generate" onclick="return confirm('Are you sure to genarate result? Result once created can not change');"/>
                                
                            </div>
                            </div>
                     </div> 
                     <?php } else if(isset($show_result_id)){?> 
                     <?php echo form_open('result_gen/edit_result'); ?>             
                	<div class="container">
                    <h2>Result Edit</h2>
					  <?php foreach ($show_result_id as $single_student): ?>
                      <div class="form_box">
                      		
					        <div class="form_row">
                   	        <h5>Name <span style="color:#F00; font-weight:400;">*</span></h5>
                                <input type="text" class="form_input" name="name" value="<?php echo $single_student->name; ?>" readonly/>
                                <?php echo form_error('name'); ?>
                            </div>
                            
                            <div class="form_row">
                           	<h5>Name of Father/ Mother /Guardian <span style="color:#F00; font-weight:400;">*</span>:</h5>
                             <input type="text" class="form_input" name="guardian_nm" value="<?php echo $single_student->guardian_nm; ?>" readonly/>
                             <?php echo form_error('guardian_nm'); ?>
                            </div>
                            
                            <div class="form_row">
                            	<h5>Roll <span style="color:#F00; font-weight:400;">*</span></h5>
                                <input type="text" class="form_input" name="roll" value="<?php echo $single_student->roll; ?>" readonly/>
                                <?php echo form_error('roll'); ?>
                            </div>
                                                        <div class="form_row">
                            	<h5>No <span style="color:#F00; font-weight:400;">*</span>:</h5>
                                <input type="text" class="form_input" name="no" value="<?php echo $single_student->no; ?>" readonly/>
                                <?php echo form_error('no'); ?>
                          </div>
                            
                          <div class="form_row">
                           	<h5>College Ref. No. <span style="color:#F00; font-weight:400;">*</span>:</h5>
                             <input type="text" class="form_input" name="clg_ref_no" value="<?php echo $single_student->clg_ref_no; ?>" readonly/>
                             <?php echo form_error('clg_ref_no'); ?>
                            </div>
                            
                          <div class="form_row">
                           	<h5>C.U. Reg. No. <span style="color:#F00; font-weight:400;">*</span>:</h5>
                             <input type="text" class="form_input" name="cu_reg_no" value="<?php echo $single_student->cu_reg_no; ?>" readonly/>
                             <?php echo form_error('cu_reg_no'); ?>
                            </div>
                            <div class="form_row">
                           	<h5>Result Date<span style="color:#F00; font-weight:400;">*</span>:</h5>
                             <input type="text" class="form_input" name="dob" value="">
                             <?php echo form_error('result_date'); ?>
                            </div>
                            </div> 
                            <input type="hidden" id="session_current" name="session_current" value="<?php echo $single_student->exam_session; ?>">   
                            <input type="hidden" id="id" name="id" value="<?php echo $single_student->id; ?>">
                             <?php endforeach; ?>
                         
                     <div class="form_box">
                          <div class="form_row">
                           	<h5>Edit Marks Obtained<span style="color:#F00; font-weight:400;">*</span>:</h5>
                       </div>
                            
                          
                          <?php echo form_error('caste'); ?>
                            <div class="form_row">
                            <div style=" width:40%; float:left;">Papaer Name</div>
                            <div style=" width:20%; float:left;">Group A Marks</div>
                            <div style=" width:20%; float:left;">Group B/Practical Marks</div>
                            <div style=" width:10%; float:left;">Is Absent</div>
                           </div>
                          <?php 
						  $x=0;
						  foreach ($student_subject as $student_subject): 
						  $x++;
						  ?>
                          <div class="form_row">
                        	<div style=" width:40%; float:left;"><?php echo $student_subject->paper_name;?></div>
                           <input type="hidden" name="admit_id[]" value="<?php echo $student_subject->id; ?>">
                           <input type="hidden" name="subject_id[]" value="<?php echo $student_subject->subject_id; ?>">
                            <div style=" width:20%; float:left;"><input type="text" name="grp_a_marks[]" value="<?php echo $student_subject->grp_a_marks; ?>" style="width:100px;" onkeypress="return isNumberKey(event);"></div>
                            <div style=" width:20%; float:left;"><input type="text" name="grp_b_marks[]" value="<?php echo $student_subject->grp_b_marks; ?>" style="width:100px;" onkeypress="return isNumberKey(event);"></div>
                            <div style=" width:10%; float:left;">
           <input type="checkbox" name="absent<?php echo $x;?>" id="absent<?php echo $x;?>" value="1" <?php if($student_subject->is_absent==1){echo 'checked';}?> >
                            <input type="hidden" name="is_absent<?php echo $x;?>" id="is_absent<?php echo $x;?>" value="<?php if($student_subject->is_absent==1){echo '1';}else{echo '0';}?>">
                            <script>
							$('#absent<?php echo $x;?>').change(function(){
    var checkChange = this.checked ? '1' : '0';
    $('#is_absent<?php echo $x;?>').val(checkChange);
});
							</script>
                            </div>
                           </div>
                        <input type="hidden" id="sem" name="sem" value="<?php echo $student_subject->sem; ?>">   
                        <input type="hidden" id="sem" name="session_admit" value="<?php echo $student_subject->session; ?>"> 
                             <?php endforeach; ?>
                              
                             <?php foreach ($current_session as $current_session): ?>
                         <input type="hidden" name="current_session" value="<?php echo $current_session->id; ?>" /> 
                         <?php endforeach; ?>
                            <div class="form_row">
                            	<h5></h5>
                                <input type="submit" class="button" name="add" value="Generate" onclick="return confirm('Are you sure to genarate result? Result once created can not change');"/>
                                
                            </div>
                            </div>
                     </div>  
                     <?php } else if(isset($show_review_id)){?> 
                     <?php echo form_open('result_gen/insertexam_subject'); ?>            
                	<div class="container">
                    <h2>Result Review</h2>
					  <?php foreach ($show_review_id as $single_student): ?>
                      <div class="form_box">
                      		
					        <div class="form_row">
                   	        <h5>Name <span style="color:#F00; font-weight:400;">*</span></h5>
                                <input type="text" class="form_input" name="name" value="<?php echo $single_student->name; ?>" readonly/>
                                <?php echo form_error('name'); ?>
                            </div>
                            
                            <div class="form_row">
                           	<h5>Name of Father/ Mother /Guardian <span style="color:#F00; font-weight:400;">*</span>:</h5>
                             <input type="text" class="form_input" name="guardian_nm" value="<?php echo $single_student->guardian_nm; ?>" readonly/>
                             <?php echo form_error('guardian_nm'); ?>
                            </div>
                            
                            <div class="form_row">
                            	<h5>Roll <span style="color:#F00; font-weight:400;">*</span></h5>
                                <input type="text" class="form_input" name="roll" value="<?php echo $single_student->roll; ?>" readonly/>
                                <?php echo form_error('roll'); ?>
                            </div>
                                                        <div class="form_row">
                            	<h5>No <span style="color:#F00; font-weight:400;">*</span>:</h5>
                                <input type="text" class="form_input" name="no" value="<?php echo $single_student->no; ?>" readonly/>
                                <?php echo form_error('no'); ?>
                          </div>
                            
                          <div class="form_row">
                           	<h5>College Ref. No. <span style="color:#F00; font-weight:400;">*</span>:</h5>
                             <input type="text" class="form_input" name="clg_ref_no" value="<?php echo $single_student->clg_ref_no; ?>" readonly/>
                             <?php echo form_error('clg_ref_no'); ?>
                            </div>
                            
                          <div class="form_row">
                           	<h5>C.U. Reg. No. <span style="color:#F00; font-weight:400;">*</span>:</h5>
                             <input type="text" class="form_input" name="cu_reg_no" value="<?php echo $single_student->cu_reg_no; ?>" readonly/>
                             <?php echo form_error('cu_reg_no'); ?>
                            </div>
                            <div class="form_row">
                           	<h5>Result Date<span style="color:#F00; font-weight:400;">*</span>:</h5>
                             <input type="text" class="form_input" name="result_date" value="">
                             <?php echo form_error('result_date'); ?>
                            </div>
                            </div>    
                            <input type="hidden" id="id" name="id" value="<?php echo $single_student->id; ?>">
                            <input type="hidden" id="session_current" name="session_current" value="<?php echo $single_student->exam_session; ?>">
                             <?php endforeach; ?>
                         <input type="hidden" id="session" name="session" value="<?php foreach ($studentac_session as $studentac_session){echo $studentac_session->id; }?>">
                     <div class="form_box">
                          <div class="form_row">
                           	<h5>Marks Obtained<span style="color:#F00; font-weight:400;">*</span>:</h5>
                       </div>
                            
                          
                          <?php echo form_error('caste'); ?>
                            <div class="form_row">
                            <div style=" width:40%; float:left;">Papaer Name</div>
                            <div style=" width:20%; float:left;">Group A Marks</div>
                            <div style=" width:20%; float:left;">Group B/Practical Marks</div>
                            <div style=" width:10%; float:left;">Is  Review?</div>
                           </div>
                          <?php foreach ($student_subject as $student_subject): ?>
                          <div class="form_row">
                        	<div style=" width:40%; float:left;"><?php echo $student_subject->paper_name;?></div>
                           <input type="hidden" name="admit_id[]" value="<?php echo $student_subject->id; ?>">                        
                            <div style=" width:20%; float:left;"><input type="text" name="grp_a_marks[]" value="<?php echo $student_subject->grp_a_marks; ?>" style="width:100px;" readonly="readonly" onkeypress="return isNumberKey(event);"></div>
                            <div style=" width:20%; float:left;"><input type="text" name="grp_b_marks[]" value="<?php echo $student_subject->grp_b_marks; ?>" style="width:100px;" readonly="readonly" onkeypress="return isNumberKey(event);"></div>
                            <div style=" width:10%; float:left;">
                            <input type="checkbox" name="subject_id[]" value="<?php echo $student_subject->subject_id; ?>">
                             <input type="hidden" name="sub_id[]" value="<?php echo $student_subject->subject_id; ?>">
                            </div>
                           </div>
                        <input type="hidden" id="sem" name="sem" value="<?php echo $student_subject->sem; ?>">   
                        <input type="hidden" id="sem" name="session_admit" value="<?php echo $student_subject->session; ?>"> 
                             <?php endforeach; ?>
                              
                             <?php foreach ($current_session as $current_session): ?>
                         <input type="hidden" name="current_session" value="<?php echo $current_session->id; ?>" /> 
                         <?php endforeach; ?>
                            <div class="form_row">
                            	<h5></h5>
                                <input type="submit" class="button" name="add" value="Generate Review" onclick="return confirm('Are you sure to genarate result? Result once created can not change');"/>
                                
                            </div>
                            </div>
                     </div>  
                     <?php } else if(isset($show_review_marks)){?> 
                     <?php echo form_open('result_gen/review_result'); ?>            
                	<div class="container">
                    <h2>Result Review Marks</h2>
					  <?php foreach ($show_review_marks as $single_student): ?>
                      <div class="form_box">
                      		
					        <div class="form_row">
                   	        <h5>Name <span style="color:#F00; font-weight:400;">*</span></h5>
                                <input type="text" class="form_input" name="name" value="<?php echo $single_student->name; ?>" readonly/>
                                <?php echo form_error('name'); ?>
                            </div>
                            
                            <div class="form_row">
                           	<h5>Name of Father/ Mother /Guardian <span style="color:#F00; font-weight:400;">*</span>:</h5>
                             <input type="text" class="form_input" name="guardian_nm" value="<?php echo $single_student->guardian_nm; ?>" readonly/>
                             <?php echo form_error('guardian_nm'); ?>
                            </div>
                            
                            <div class="form_row">
                            	<h5>Roll <span style="color:#F00; font-weight:400;">*</span></h5>
                                <input type="text" class="form_input" name="roll" value="<?php echo $single_student->roll; ?>" readonly/>
                                <?php echo form_error('roll'); ?>
                            </div>
                                                        <div class="form_row">
                            	<h5>No <span style="color:#F00; font-weight:400;">*</span>:</h5>
                                <input type="text" class="form_input" name="no" value="<?php echo $single_student->no; ?>" readonly/>
                                <?php echo form_error('no'); ?>
                          </div>
                            
                          <div class="form_row">
                           	<h5>College Ref. No. <span style="color:#F00; font-weight:400;">*</span>:</h5>
                             <input type="text" class="form_input" name="clg_ref_no" value="<?php echo $single_student->clg_ref_no; ?>" readonly/>
                             <?php echo form_error('clg_ref_no'); ?>
                            </div>
                            
                          <div class="form_row">
                           	<h5>C.U. Reg. No. <span style="color:#F00; font-weight:400;">*</span>:</h5>
                             <input type="text" class="form_input" name="cu_reg_no" value="<?php echo $single_student->cu_reg_no; ?>" readonly/>
                             <?php echo form_error('cu_reg_no'); ?>
                            </div>
                            <div class="form_row">
                           	<h5>Result Date<span style="color:#F00; font-weight:400;">*</span>:</h5>
                             <input type="text" class="form_input" name="result_date" value="">
                             <?php echo form_error('result_date'); ?>
                            </div>
                            </div>    
                            <input type="hidden" id="session_current" name="session_current" value="<?php echo $single_student->exam_session; ?>">
                            <input type="hidden" id="id" name="id" value="<?php echo $single_student->id; ?>">
                             <?php endforeach; ?>
                         
                     <div class="form_box">
                          <div class="form_row">
                           	<h5>Marks Obtained<span style="color:#F00; font-weight:400;">*</span>:</h5>
                       </div>
                            
                          
                          <?php echo form_error('caste'); ?>
                            <div class="form_row">
                            <div style=" width:40%; float:left;">Papaer Name</div>
                            <div style=" width:30%; float:left;">Group A Marks</div>
                            <div style=" width:30%; float:left;">Group B/Practical Marks</div>
                           </div>
                          <?php foreach ($student_subject as $student_subject): ?>
                          <div class="form_row">
                        	<div style=" width:40%; float:left;"><?php echo $student_subject->paper_name;?></div>
                          <input type="hidden" name="admit_id[]" value="<?php echo $student_subject->id; ?>">
                          <input type="hidden" name="subject_id[]" value="<?php echo $student_subject->subject_id; ?>">                      
                            <div style=" width:30%; float:left;"><input type="text" name="grp_a_marks[]" value="<?php echo $student_subject->grp_a_marks; ?>" style="width:100px;" onkeypress="return isNumberKey(event);"></div>
                            <div style=" width:30%; float:left;"><input type="text" name="grp_b_marks[]" value="<?php echo $student_subject->grp_b_marks; ?>" style="width:100px;" onkeypress="return isNumberKey(event);"></div>
                             <input type="hidden" name="sub_id[]" value="<?php echo $student_subject->subject_id; ?>">
                           </div>
                        <input type="hidden" id="sem" name="sem" value="<?php echo $student_subject->sem; ?>"> 
                        <input type="hidden" id="sem" name="session_admit" value="<?php echo $student_subject->session; ?>">  
                             <?php endforeach; ?>
                              
                             <?php foreach ($current_session as $current_session): ?>
                         <input type="hidden" name="current_session" value="<?php echo $current_session->id; ?>" /> 
                         <?php endforeach; ?>
                            <div class="form_row">
                            	<h5></h5>
                                <input type="submit" class="button" name="add" value="Generate Review Result" onclick="return confirm('Are you sure to genarate result? Result once created can not change');"/>
                                
                            </div>
                            </div>
                     </div>                 
                     <?php } else {?>
					  <div class="container">
                      <h5 style="color:green;"><?php echo $this->session->flashdata('message')."<br>";?></h5>                      
                		<h2>Result Generation</h2>
                        <br/>
                        <?php echo form_open('result_gen/search_student_id'); ?>
                        <p>
                          <select name="session">
                            <option value="">Select Session</option>
                                <?php foreach ($student_session as $student_session): ?>
                                	<option value="<?php echo $student_session->id; ?>"><?php echo $student_session->session_yr; ?></option>
                                    <?php endforeach; ?>
                         </select> 
                          AND 
                          <select name="sem">
                                	<option value="">Select Sem</option>
                                    <option value="1st">1st</option>
                                    <option value="2nd">2nd</option>
                                    <option value="3rd">3rd</option>
                                    <option value="4th">4th</option>
                          </select>
                        <input type="submit" class="button" name="search" value="Search"/></p>
                        <?php echo form_close();?>
                         <?php if (isset($search_student)){?>
                    	<div class="table">
                        <?php if (empty($search_student)){?>
                        <div class="row">
                        	<div class="cell">NO DATA FOUND</div>
                        </div>
						<?php }else {?>                        
                    	<div class="row table_header">
                        	<div class="cell">Name</div>
                            <div class="cell">Roll</div>
                            <div class="cell">No</div>
                            <div class="cell">College Ref.No.</div>
                            <div class="cell">C.U Reg.No.</div>
                            <div class="cell">Contact No.</div>
                            <div class="cell">Date Of Birth</div>
                            <div class="cell">Sem</div>
                            <div class="cell">Session</div>
                            <?php if($access==1){?>
                            <div class="cell">Edit</div><?php }?>
                            <?php if($access==1){?>
                            <div class="cell">Review</div><?php }?>
                            <div class="cell">Result</div>
                            
                            
                        </div>
                        <?php foreach($search_student as $student) { 
						$sid= $student->id;?>
                        <div class="row">
                        
                        	<div class="cell"><?php echo $student->name; ?></div>
                            <div class="cell"><?php echo $student->roll; ?></div>
                            <div class="cell"><?php echo $student->no; ?></div>
                            <div class="cell"><?php echo $student->clg_ref_no; ?></div>
                            <div class="cell"><?php echo $student->cu_reg_no; ?></div>
                            <div class="cell"><?php echo $student->phn; ?></div>
                            <div class="cell"><?php echo $student->dob; ?></div>
                            <div class="cell"><?php echo $student->sem; ?></div>
                            <div class="cell"><?php echo $student->session_yr; ?></div>
                            <?php if($access==1){?>
                             <div class="cell"><a href="<?php echo base_url() . "index.php/result_gen/show_result_id/" . $student->id."/". $sem."/". $session; ?>">Edit</a></div><?php }?>
                             <?php if($access==1){?>
                             
                             <div class="cell">
      <?php $data['ad_gen']=$this->result_gen_model->review_generation($sid,$sem,$session);if($data['ad_gen']=='C'){?>
      <a href="<?php echo base_url() . "index.php/result_gen/show_review_id/" . $student->id."/". $sem."/". $session; ?>">Create</a>
      <?php }else{?>
      <a href="<?php echo base_url() . "index.php/result_gen/show_review_marks/" . $student->id."/". $sem."/". $session; ?>">Marks</a>
      <?php }?>
      </div>
							 <?php }?>
                            <div class="cell">
                            <?php $data['ad_gen']=$this->result_gen_model->result_generation($sid,$sem,$session);if($data['ad_gen']=='A'){?>ADMIT NOT CREATED
                            <?php } else if($data['ad_gen']=='Y'){?>
                            <a href="<?php echo base_url() . "index.php/marksheet/result_details/" . $student->id."/". $sem."/". $session; ?>" target="_blank">Download</a>
							<?php }else{?>
                            <a href="<?php echo base_url() . "index.php/result_gen/show_student_id/" . $student->id."/". $sem."/". $session; ?>">Generate</a>
                            <?php }?>
                            </div>
                            
                        </div>
                        <?php }} } else{?><div class="table"><div class="row"><div class=""></div></div></div><?php }?>
                    </div>                                                          
                  </div>
                    <?php }?>
                </div>
            </div>
<?php $this->load->view('templates/footer');?>

