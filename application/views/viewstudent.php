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
                <?php echo form_open('viewstudent/update_student_id1'); ?>               
                	<div class="container">
                    <h2>Edit Student</h2>
					  <?php foreach ($single_student as $single_student): ?>
                      <div class="form_box">
                      		<div class="form_row">
                            	<h5>Session <span style="color:#F00; font-weight:400;">*</span>:</h5>
                               
                                <select name="session">
                                <?php foreach ($student_session as $student_session): ?>
                                	<option value="<?php echo $student_session->id; ?>"<?php if($single_student->session==$student_session->id){echo "selected";}?>><?php echo $student_session->session_yr; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php echo form_error('session'); ?>
                            </div>
                            
					        <div class="form_row">
                   	        <h5>Name <span style="color:#F00; font-weight:400;">*</span></h5>
                                <input type="text" class="form_input" name="name" value="<?php echo $single_student->name; ?>"/>
                                <?php echo form_error('name'); ?>
                            </div>
                            
                           <!-- <div class="form_row">
                            	<h5>Roll <span style="color:#F00; font-weight:400;">*</span></h5>
                                <input type="text" class="form_input" name="roll" value="<?php echo $single_student->roll; ?>"/>
                                <?php //echo form_error('roll'); ?>
                            </div>
                            
                            <div class="form_row">
                            	<h5>No <span style="color:#F00; font-weight:400;">*</span>:</h5>
                                <input type="text" class="form_input" name="no" value="<?php echo $single_student->no; ?>"/>
                                <?php //echo form_error('no'); ?>
                          </div>-->
                            
                          <div class="form_row">
                           	<h5>College Ref. No. <span style="color:#F00; font-weight:400;">*</span>:</h5>
                            <?php $clg= explode("/", $single_student->clg_ref_no);?>
                            <input type="text" name="gen" value="<?php echo $clg[0]."/"; ?>" style="width:50px; background-color:#CCCCCC" readonly="readonly" />
                            <input type="text" name="cat" value="<?php echo $clg[1]."/"; ?>" style="width:50px; background-color:#CCCCCC" readonly="readonly" />
                            <input type="text" name="ses" value="<?php echo $clg[2]."/"; ?>" style="width:50px; background-color:#CCCCCC" readonly="readonly"/>
                             <input type="text" class="form_input" name="clg_ref_no" value="<?php echo $clg[3]; ?>" style="width:50px;" maxlength="3"/>
                             <input type="hidden" name="ssn" value="<?php echo $clg[0]; ?>"/>
                             <?php echo form_error('clg_ref_no'); ?>
                            </div>
                            
                          <div class="form_row">
                           	<h5>C.U. Reg. No. <span style="color:#F00; font-weight:400;">*</span>:</h5>
                             <input type="text" class="form_input" name="cu_reg_no" value="<?php echo $single_student->cu_reg_no; ?>"/>
                             <?php echo form_error('cu_reg_no'); ?>
                            </div>
                            
                          <div class="form_row">
                           	<h5>Mobile No. <span style="color:#F00; font-weight:400;">*</span>:</h5>
                             <input type="text" class="form_input" name="phn" value="<?php echo $single_student->phn; ?>"/>
                             <?php echo form_error('phn'); ?>
                            </div>
                            
                            <div class="form_row">
                           	<h5>Landline No. :</h5>
                             <input type="text" class="form_input" name="landline" value="<?php echo $single_student->landline; ?>"/>
                             
                            </div>
                            
                            <div class="form_row">
                           	<h5>Email Id.:</h5>
                             <input type="text" class="form_input" name="email" value="<?php echo $single_student->email; ?>"/>
                             <?php echo form_error('email'); ?>
                            </div>
                            
                            <div class="form_row">
                           	<h5>Address <span style="color:#F00; font-weight:400;">*</span>:</h5>
                             <input type="text" class="form_input" name="address" value="<?php echo $single_student->address; ?>"/>
                             <?php echo form_error('address'); ?>
                            </div>
                            
                          <div class="form_row">
                           	<h5>Name of Father/ Mother /Guardian <span style="color:#F00; font-weight:400;">*</span>:</h5>
                             <input type="text" class="form_input" name="guardian_nm" value="<?php echo $single_student->guardian_nm; ?>"/>
                             <?php echo form_error('guardian_nm'); ?>
                            </div>
                            
                            <div class="form_row">
                           	<h5>Relation With Guardian:</h5>
                             <input type="text" class="form_input" name="relation" value="<?php echo $single_student->relation; ?>"/>
                            </div>
                            
                          <div class="form_row">
                           	<h5>Date Of Birth <span style="color:#F00; font-weight:400;">*</span>:</h5>
                             <input type="text" class="form_input" name="dob" id="dob" value="<?php echo $single_student->dob; ?>"/>
                             <?php echo form_error('dob'); ?>
                             
                            </div>     
                            </div>
                      <div class="form_box">
                          <div class="form_row">
                           	<h5>Caste <span style="color:#F00; font-weight:400;">*</span>:</h5>
                             
                              <select name="caste">
                                	<option value="GENERAL" <?php if($single_student->caste=="GENERAL"){echo "selected";}?>>GENERAL</option>
                                    <option value="SC" <?php if($single_student->caste=="SC"){echo "selected";}?>>SC</option>
                                    <option value="ST" <?php if($single_student->caste=="ST"){echo "selected";}?>>ST</option>
                                    <option value="OBC-A" <?php if($single_student->caste=="OBC-A"){echo "selected";}?>>OBC-A</option>
                                    <option value="OBC-B" <?php if($single_student->caste=="OBC-B"){echo "selected";}?>>OBC-B</option>
                                </select>
                                <?php echo form_error('caste'); ?>
                            </div>
                            
                            <div class="form_row">
                           	<h5>Is Handicaped :</h5>
                             
                              <select name="is_handicaped">
                              		<option value="N" <?php if($single_student->is_handicaped=="N"){echo "selected";}?>>No</option>
                                	<option value="Y" <?php if($single_student->is_handicaped=="Y"){echo "selected";}?>>Yes</option>
                                </select>
                                
                            </div>
                            
                          <div class="form_row">
                           	<h5>Gender <span style="color:#F00; font-weight:400;">*</span>:</h5>
                            <ul>
                               <li><input type="radio" name="sex" value="Male"<?php if($single_student->sex=="Male"){echo "checked";}?>/><p>Male</p></li>
                               <li><input type="radio" name="sex" value="Female"<?php if($single_student->sex=="Female"){echo "checked";}?>/><p>Female</p></li>
                               <li><input type="radio" name="sex" value="Transgender"<?php if($single_student->sex=="Transgender"){echo "checked";}?>/><p>Transgender</p></li>
                            </ul>
                            <?php echo form_error('sex'); ?>
                            </div>
                            
                          
                            
                          <div class="form_row">
                           	<h5>Last Exam Attended <span style="color:#F00; font-weight:400;">*</span>:</h5>
                             <input type="text" class="form_input" name="last_exam" value="<?php echo $single_student->last_exam; ?>"/>
                             <?php echo form_error('last_exam'); ?>
                            </div>
                            
                          <div class="form_row">
                           	<h5>Exam Marks <span style="color:#F00; font-weight:400;">*</span> :</h5>
                             <input type="text" class="form_input" name="last_exam_marks" value="<?php echo $single_student->last_exam_marks; ?>"/><?php echo form_error('last_exam_marks'); ?>
                            </div>
                            
                          <div class="form_row">
                           	<h5>Exam Percentage <span style="color:#F00; font-weight:400;">*</span> :</h5>
                             <input type="text" class="form_input" name="last_exam_per" value="<?php echo $single_student->last_exam_per; ?>"/><?php echo form_error('last_exam_per'); ?>
                            </div>
                            
                          <div class="form_row">
                           	<h5>Passing Year <span style="color:#F00; font-weight:400;">*</span> :</h5>
                             <input type="text" class="form_input" name="last_exam_yr" value="<?php echo $single_student->last_exam_yr; ?>"/><?php echo form_error('last_exam_yr'); ?>
                            </div>
                            
                          <div class="form_row">
                           	<h5>University Name <span style="color:#F00; font-weight:400;">*</span> :</h5>
                             <input type="text" class="form_input" name="last_uni_nm" value="<?php echo $single_student->last_uni_nm; ?>"/>
                             <?php echo form_error('last_uni_nm'); ?>
                            </div>
                            
                            <div class="form_row">
                           	<h5>College Last Attended :</h5>
                             <input type="text" class="form_input" name="last_college" value="<?php echo $single_student->last_college; ?>"/>
                            
                            </div>
                            
                            <div class="form_row">
                            	<h5></h5>
                                <input type="submit" class="button" name="add" value="Update"/>
                                <input type="hidden" id="id" name="id" value="<?php echo $single_student->id; ?>">
                            </div>
                            </div>   
                      <?php endforeach; ?>
                     </div>                       
                     <?php } else {?>
					  <div class="container">
                      <h5 style="color:green;"><?php echo $this->session->flashdata('messagedel')."<br>";?></h5>
                     <h5 style="color:green;"><?php echo $this->session->flashdata('messageup')."<br>";?></h5>                        
                		<h2>Student Listings</h2>
                        <br/>
                        <?php echo form_open('viewstudent/search_student_id'); ?>
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
                        <input type="submit" class="button" name="search" value="Search"/>
                        <!--<input type="submit" class="button" name="print" value="Print Student Details"/>-->
                        </p>
                        <?php echo form_close();?>
                        <?php /*?><?php if(isset($search_student)){ ?>
                       <span style="float:right;"><button onclick="location.href='<?php echo base_url();?>index.php/print_student/card_details/<?php echo $search_student;?>'">Print Student Details</button></span>
                       <?php }else{?>
                       <span style="float:right;"><button onclick="location.href='<?php echo base_url();?>index.php/print_student/<?php echo $results; ?>'">Print Student Details</button></span>
                       <?php }?><?php */?>
                 <span style="float:right;">
                 <a href="<?php echo base_url() . "index.php/print_student/student_details/"?>" target="_blank">
                 <input type="button" class="button" name="print" value="Print Student Details"/>
                 </a>
                 </span>      
			<?php if(isset($search_student)){?>
                    	<div class="table">
                        <?php if (empty($search_student)){?>
						<div class="row">                       
                        	<div class="cell">No data found</div>                            
                        </div>
						<?php }else {?>                        
                    	<div class="row table_header">
                        
                        	<div class="cell">Name</div>
                            <div class="cell">Roll</div>
                            <div class="cell">No</div>
                            <div class="cell">College Ref.No.</div>
                            <div class="cell">C.U Reg.No.</div>
                            <div class="cell">Mobile No.</div>
                            <div class="cell">Date Of Birth</div>
                            <div class="cell">Caste</div>
                            <div class="cell">Session yr</div>
                            <div class="cell">Application Form</div>
                            <?php if($access==1){?>
                            <div class="cell">Edit</div>
                            <div class="cell">Delete</div>
                            <?php }?>
                        </div>
                        <?php foreach($search_student as $student) { ?>
                        <div class="row">
                        
                        	<div class="cell"><?php echo $student->name; ?></div>
                            <div class="cell"><?php echo $student->roll; ?></div>
                            <div class="cell"><?php echo $student->no; ?></div>
                            <div class="cell"><?php echo $student->clg_ref_no; ?></div>
                            <div class="cell"><?php echo $student->cu_reg_no; ?></div>
                            <div class="cell"><?php echo $student->phn; ?></div>
                            <div class="cell"><?php echo $student->dob; ?></div>
                            <div class="cell"><?php echo $student->caste; ?></div>
                             <div class="cell"><?php echo $student->session_yr; ?></div>
                             <div class="cell"><a href="<?php echo base_url() . "index.php/application_form/card_details/" . $student->id .'/'. $student->sem; ?>" target="_blank">Download Application</a></div>
                            <?php if($access==1){?>
                            <div class="cell"><a href="<?php echo base_url() . "index.php/viewstudent/show_student_id/" . $student->id; ?>">Edit</a></div>
                            <div class="cell"><a href="<?php echo base_url() . "index.php/viewstudent/delete_student/" . $student->id; ?>" onclick="return confirm('Are you sure to delete this student?');">Delete</a></div>
							<?php }?>
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
                            <div class="cell">Roll</div>
                            <div class="cell">No</div>
                            <div class="cell">College Ref.No.</div>
                            <div class="cell">C.U Reg.No.</div>
                            <div class="cell">Mobile No.</div>
                            <div class="cell">Date Of Birth</div>
                            <div class="cell">Caste</div>
                            <div class="cell">Session yr</div>
                            <div class="cell">Application form</div>
                            <?php if($access==1){?>
                            <div class="cell">Edit</div>
                            <div class="cell">Delete</div>
                            <?php }?>
                        </div>
                        <?php foreach($results as $student) { ?>
                        <div class="row">
                        
                        	<div class="cell"><?php echo $student->name; ?></div>
                            <div class="cell"><?php echo $student->roll; ?></div>
                            <div class="cell"><?php echo $student->no; ?></div>
                            <div class="cell"><?php echo $student->clg_ref_no; ?></div>
                            <div class="cell"><?php echo $student->cu_reg_no; ?></div>
                            <div class="cell"><?php echo $student->phn; ?></div>
                            <div class="cell"><?php echo $student->dob; ?></div>
                            <div class="cell"><?php echo $student->caste; ?></div>
                             <div class="cell"><?php echo $student->session_yr; ?></div>
                             <div class="cell"><a href="<?php echo base_url() . "index.php/application_form/card_details/" . $student->id .'/'. $student->sem; ?>" target="_blank">Download Application</a></div>
                             <?php if($access==1){?>
                            <div class="cell"><a href="<?php echo base_url() . "index.php/viewstudent/show_student_id/" . $student->id; ?>">Edit</a></div>
                            <div class="cell"><a href="<?php echo base_url() . "index.php/viewstudent/delete_student/" . $student->id; ?>" onclick="return confirm('Are you sure to delete this student?');">Delete</a></div><?php }?>
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

