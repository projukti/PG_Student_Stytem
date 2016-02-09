<?php
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
	 $data['access'] = $session_data['access'];
	 $access=$data['access'];
	 $this->load->view('templates/header',$data);
	 ?>
        	<div class="main_body">
            	<div class="main_container">
                 <?php if(isset($single_student)){?>
                <?php echo form_open('admitcard_gen/insertexam_subject'); ?>               
                	<div class="container">
                    <h2>Admit Card Generate</h2>
					  <?php foreach ($single_student as $single_student): ?>
                      <div class="form_box">
                      		<div class="form_row">
                   	        <h5>Exam Session <span style="color:#F00; font-weight:400;">*</span></h5>
                                <select name="session">
                                <option value="">Select</option>
                                <?php foreach ($student_session as $student_session): ?>
                                	<option value="<?php echo $student_session->id; ?>"><?php echo $student_session->session_yr; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php echo form_error('session'); ?>
                            </div>
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
                            
                            </div>
                            <input type="hidden" id="id" name="id" value="<?php echo $single_student->id; ?>">
                            <input type="hidden" id="ses" name="ses" value="<?php echo $single_student->session; ?>">
                             <?php endforeach; ?>
                            <?php /*?> <input type="hidden" id="session" name="session" value="<?php foreach ($studentac_session as $studentac_session){echo $studentac_session->id; }?>"><?php */?>
                      <div class="form_box">
                          <div class="form_row">
                           	<h5>Subjects To be Attend For <span style="color:#F00; font-weight:400;">*</span>:</h5>
                            </div>
                            
                          
                          <?php echo form_error('caste'); ?>
                          <?php foreach ($student_subject as $student_subject): ?>
                          <div class="form_row">
                        	<input type="checkbox" name="subject_id[]" value="<?php echo $student_subject->id; ?>"><?php echo $student_subject->paper_name;?>
                            <input type="hidden" name="sub_id[]" value="<?php echo $student_subject->id; ?>">
                            </div>
                        <input type="hidden" id="sem" name="sem" value="<?php echo $student_subject->sem_no; ?>">   
                             <?php endforeach; ?>
                              
                            
                            <div class="form_row">
                            	<h5></h5>
                                <input type="submit" class="button" name="add" value="Generate" onclick="return confirm('Are You Sure? Admit Card Once Generated Cant be modified');"/>
                                
                            </div>
                            </div>   
                     
                     </div>                       
                     <?php } elseif(isset($edit_student)){?>
                <?php echo form_open('admitcard_gen/update_admit'); ?>               
                	<div class="container">
                    <h2>Admit Card Edit</h2>
					  <?php foreach ($edit_student as $single_student): ?>
                      <div class="form_box">
                      		<div class="form_row">
                   	        <h5>Exam Session <span style="color:#F00; font-weight:400;">*</span></h5>
                                <select name="session">
                                <option value="">Select</option>
                                <?php foreach ($student_session as $student_session): ?>
                                	<option value="<?php echo $student_session->id; ?>" <?php if(($student_session->id)==($single_student->exam_session)){echo 'Selected';} ?>><?php echo $student_session->session_yr; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php echo form_error('session'); ?>
                            </div>
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
                            
                            </div>
                            <input type="hidden" id="id" name="id" value="<?php echo $single_student->id; ?>">
                            <input type="hidden" id="ses" name="ses" value="<?php echo $single_student->session; ?>">
                             <?php endforeach; ?>
                            <?php /*?> <input type="hidden" id="session" name="session" value="<?php foreach ($studentac_session as $studentac_session){echo $studentac_session->id; }?>"><?php */?>
                      <div class="form_box">
                          <div class="form_row">
                           	<h5>Subjects To be Attend For <span style="color:#F00; font-weight:400;">*</span>:</h5>
                            </div>
                            
                          
                          <?php echo form_error('caste'); ?>
                          <?php foreach ($student_subject as $student_subject): ?>
                          <div class="form_row">
                        	<input type="hidden" name="subject_id[]" value="<?php echo $student_subject->id; ?>">
							<?php echo $student_subject->paper_name;?>
                            <input type="hidden" name="sub_id[]" value="<?php echo $student_subject->id; ?>">
                            </div>
                        <input type="hidden" id="sem" name="sem" value="<?php echo $student_subject->sem; ?>">   
                             <?php endforeach; ?>
                              
                            
                            <div class="form_row">
                            	<h5></h5>
                                <input type="submit" class="button" name="add" value="Update" onclick="return confirm('Are You Sure?');"/>
                                
                            </div>
                            </div>   
                     
                     </div>                       
                     <?php } else {?>
					  <div class="container">
                      <h5 style="color:green;"><?php echo $this->session->flashdata('messagedel')."<br>";?></h5>
                     <h5 style="color:green;"><?php echo $this->session->flashdata('messageup')."<br>";?></h5>                        
                		<h2>Student Listings</h2>
                        <br/>
                        <?php echo form_open('admitcard_gen/search_student_id'); ?>
                        <p><input type="text"  class="form_input" name="key" placeholder="keyword"/>OR
                        <select name="session">
                            <option value="">Select Session</option>
                                <?php foreach ($student_session as $student_session): ?>
                                	<option value="<?php echo $student_session->id; ?>"><?php echo $student_session->session_yr; ?></option>
                                    <?php endforeach; ?>
                         </select>OR
                         <select name="sem">
                                	<option value="">Select Sem</option>
                                    <option value="1st">1st</option>
                                    <option value="2nd">2nd</option>
                                    <option value="3rd">3rd</option>
                                    <option value="4th">4th</option>
                                </select>
                        <input type="submit" class="button" name="search" value="Search"/></p>
                        <?php echo form_close();?>
					 <?php if(isset($search_student)){?>
                    	<div class="table">
                        <?php if (empty($search_student)){?>
						<div class="row">                       
                        	<div class="cell">No data found</div>                            
                        </div>
						<?php }else {?>                        
                    	<div class="row table_header">
                        
                        	<div class="cell">Name</div>
                            <div class="cell">Roll-No</div>
                            <div class="cell">Sem</div>
                            <div class="cell">Status</div>
                            <div class="cell">College Ref.No.</div>
                            <div class="cell">C.U Reg.No.</div>
                            <div class="cell">Contact No.</div>
                            <div class="cell">Guardian</div>
                            <div class="cell">Gender</div>
                            <div class="cell">Admit Card</div>
                            <div class="cell">Edit</div>
                            
                            
                        </div>
                        <?php foreach($search_student as $student) { 
						 $sid= $student->id;
						 $sem= $student->sem;
						 if($student->status=='R'){$sta="Running";}elseif($student->status=='NQ'){$sta="Not Qualified";}elseif($student->status=='NC'){$sta="Not Clear";}
						 ?>
                        <div class="row">
                        
                        	<div class="cell"><?php echo $student->name; ?></div>
                            <div class="cell"><?php echo $student->roll."-".$student->no; ?></div>
                            <div class="cell"><?php echo $student->sem; ?></div>
                            <div class="cell"><?php echo $sta; ?></div>
                            <div class="cell"><?php echo $student->clg_ref_no; ?></div>
                            <div class="cell"><?php echo $student->cu_reg_no; ?></div>
                            <div class="cell"><?php echo $student->phn; ?></div>
                            <div class="cell"><?php echo $student->guardian_nm; ?></div>
                             <div class="cell"><?php echo $student->sex; ?></div>
                            <div class="cell">
                            <?php //$data['ad_gen']=$this->admitcard_gen_model->admit_generation($sid,$sem);
							if($student->admit=='1'){?>
                            <a href="<?php echo base_url() . "index.php/admit_card/card_details/" . $student->id . "/" . $student->sem. "/" . $student->exam_session; ?>" target="_blank">Download</a>
							<?php }else{?>
                            <a href="<?php echo base_url() . "index.php/admitcard_gen/show_student_id/" . $student->id . "/" . $student->sem . "/" . $student->session; ?>" target="_blank">Generate</a>
                            <?php }?>
                            </div>
                            <div class="cell">
                            <?php //$data['ad_gen']=$this->admitcard_gen_model->admit_generation($sid,$sem);
							if($student->admit=='1'){?>
                            <a href="<?php echo base_url() . "index.php/admitcard_gen/edit_admit_id/" . $student->id . "/" . $student->sem . "/" . $student->session; ?>" target="_blank">Edit</a>
                            <?php }?>
                            </div>
                            
                        </div>
                        <?php }} ?>
                    </div>                    
                    <?php }else{?>  
                        <?php echo form_close();?>
                    	<div class="table">
                        <?php if (empty($results)){?>
						<div class="row">                       
                        	<div class="cell">No data found</div>                            
                        </div>
						<?php }else {?>
                    	<div class="row table_header">
                        
                        	<div class="cell">Name</div>
                            <div class="cell">Roll-No</div>
                            <div class="cell">Sem</div>
                            <div class="cell">Status</div>
                            <div class="cell">College Ref.No.</div>
                            <div class="cell">C.U Reg.No.</div>
                            <div class="cell">Contact No.</div>
                            <div class="cell">Guardian</div>
                            <div class="cell">Gender</div>
                            <div class="cell">Admit Card</div>
                            <div class="cell">Edit</div>
                            
                        </div>
                        <?php
						foreach($results as $student) { 
						$sid= $student->id;
						$sem= $student->sem;
						if($student->status=='R'){$sta="Running";}elseif($student->status=='NQ'){$sta="Not Qualified";}elseif($student->status=='NC'){$sta="Not Clear";}
						?>
                        
                        <div class="row">
                        
                        	<div class="cell"><?php echo $student->name; ?></div>
                            <div class="cell"><?php echo $student->roll."-".$student->no; ?></div>
                            <div class="cell"><?php echo $student->sem; ?></div>
                            <div class="cell"><?php echo $student->status; ?></div>
                            <div class="cell"><?php echo $student->clg_ref_no; ?></div>
                            <div class="cell"><?php echo $student->cu_reg_no; ?></div>
                            <div class="cell"><?php echo $student->phn; ?></div>
                            <div class="cell"><?php echo $student->guardian_nm; ?></div>
                            <div class="cell"><?php echo $student->sex; ?></div>
                            <div class="cell">
                            <?php //$data['ad_gen']=$this->admitcard_gen_model->admit_generation($sid,$sem);
							if($student->admit=='1'){?>
                            <a href="<?php echo base_url() . "index.php/admit_card/card_details/" . $student->id . "/" . $student->sem . "/" . $student->exam_session; ?>" target="_blank">Download</a>
							<?php }else{?>
                            <a href="<?php echo base_url() . "index.php/admitcard_gen/show_student_id/" . $student->id. "/" . $student->sem. "/" . $student->session; ?>" target="_blank">Generate</a>
                            <?php }?>
                            </div>
                            <div class="cell">
                            <?php //$data['ad_gen']=$this->admitcard_gen_model->admit_generation($sid,$sem);
							if($student->admit=='1'){?>
                            <a href="<?php echo base_url() . "index.php/admitcard_gen/edit_admit_id/" . $student->id . "/" . $student->sem . "/" . $student->session; ?>" target="_blank">Edit</a>
                            <?php }?>
                            </div>
                        </div>
                        <?php } ?>
                        <div id="pagination">
<ul class="tsc_pagination">

<!-- Show pagination links -->
<?php foreach ($links as $link) {
echo "<li>". $link."</li>";
} ?>
</ul>
</div>
                        <?php }?>
                    </div>
                    <?php }?>                                        
                    </div>
                    <?php }?>
                </div>
            </div>
<?php $this->load->view('templates/footer');?>

