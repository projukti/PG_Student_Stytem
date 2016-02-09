<?php
	 $this->load->view('templates/header');
	 ?>   <?php echo form_open('addstudent'); ?>  
   <div class="main_body">        	
            	<div class="main_container">
                	<div class="container">
                    <?php //echo validation_errors(); ?>
					<?php if (isset($message)) { ?>
                    <h5 style="color:green; font-size:14px;" align="center">Data inserted successfully</h5><br><?php } ?>
                		<h2>Add Student</h2>
                    
                    	<div class="form_box">
                        <div class="form_row">
                            	<h5>Session <span style="color:#F00; font-weight:400;">*</span>:</h5>
                               
                                <select name="session">
                                <?php foreach ($student_session as $student_session): ?>
                                	<option value="<?php echo $student_session->id; ?>"><?php echo $student_session->session_yr; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <input type="hidden" name="ssn" value="<?php foreach ($crntssn as $cssn){echo $cssn->year;} ?>" />
                                <?php echo form_error('session'); ?>
                            </div>
                        	<div class="form_row">
                            	<h5>Name <span style="color:#F00; font-weight:400;">*</span>:</h5>
                                <input type="text" class="form_input" name="name"/>
                                <?php echo form_error('name'); ?>
                            </div>
                            
                            <!--<div class="form_row">
                            	<h5>Roll <span style="color:#F00; font-weight:400;">*</span>:</h5>
                                <input type="text" class="form_input" name="roll"/>
                                <?php //echo form_error('roll'); ?>
                            </div>
                            
                             <div class="form_row">
                            	<h5>No <span style="color:#F00; font-weight:400;">*</span>:</h5>
                                <input type="text" class="form_input" name="no"/>
                                <?php //echo form_error('no'); ?>
                          </div>-->
                            
                          <div class="form_row">
                           	<h5>College Ref. No. <span style="color:#F00; font-weight:400;">*</span>:</h5>
                            <input type="text" class="form_input" name="" style="width:50px; background-color:#CCCCCC" readonly="readonly" value=".....  /"/>
                            <input type="text" class="form_input" name="" style="width:50px; background-color:#CCCCCC" readonly="readonly" value=".....  /"/>
                            <input type="text" class="form_input" name="" style="width:50px; background-color:#CCCCCC" readonly="readonly" value=".....  /"/>
                             <input type="text" class="form_input" name="clg_ref_no" style="width:50px;" maxlength="3"/>
                             <?php echo form_error('clg_ref_no'); ?>
                            </div>
                            
                          <div class="form_row">
                           	<h5>C.U. Reg. No. <span style="color:#F00; font-weight:400;">*</span>:</h5>
                             <input type="text" class="form_input" name="cu_reg_no"/>
                             <?php echo form_error('cu_reg_no'); ?>
                            </div>
                            
                          <div class="form_row">
                           	<h5>Mobile No. <span style="color:#F00; font-weight:400;">*</span>:</h5>
                             <input type="text" class="form_input" name="phn"/>
                             <?php echo form_error('phn'); ?>
                            </div>
                            
                            <div class="form_row">
                           	<h5>Landline No. :</h5>
                             <input type="text" class="form_input" name="landline"/>
                             
                            </div>
                            
                            <div class="form_row">
                           	<h5>Email Id.:</h5>
                             <input type="text" class="form_input" name="email"/>
                             <?php echo form_error('email'); ?>
                            </div>
                            
                            <div class="form_row">
                           	<h5>Address <span style="color:#F00; font-weight:400;">*</span>:</h5>
                             <input type="text" class="form_input" name="address"/>
                             <?php echo form_error('address'); ?>
                            </div>
                            
                          <div class="form_row">
                           	<h5>Name of Father/ Mother /Guardian <span style="color:#F00; font-weight:400;">*</span>:</h5>
                             <input type="text" class="form_input" name="guardian_nm"/>
                             <?php echo form_error('guardian_nm'); ?>
                            </div>
                            
                          <div class="form_row">
                           	<h5>Relation With Guardian:</h5>
                             <input type="text" class="form_input" name="relation"/>
                             
                            </div>  
                            
                          <div class="form_row">
                           	<h5>Date Of Birth <span style="color:#F00; font-weight:400;">*</span>:</h5>
                             <input type="text" class="form_input" name="dob" id="dob" />
                             <?php echo form_error('dob'); ?>                             
                            </div>

                        </div>
                        <div class="form_box">
                                                    
                          <div class="form_row">
                           	<h5>Caste <span style="color:#F00; font-weight:400;">*</span>:</h5>
                             
                              <select name="caste">
                                	<option value="GENERAL">GENERAL</option>
                                    <option value="SC">SC</option>
                                    <option value="ST">ST</option>
                                    <option value="OBC-A">OBC-A</option>
                                    <option value="OBC-B">OBC-B</option>
                                </select>
                                <?php echo form_error('caste'); ?>
                            </div>
                            
                            <div class="form_row">
                           	<h5>Is Handicaped :</h5>
                             
                              <select name="is_handicaped">
                              		<option value="N">No</option>
                                	<option value="Y">Yes</option>
                                </select>
                                
                            </div>
                            
                            <div class="form_row">
                           	<h5>Gender <span style="color:#F00; font-weight:400;">*</span>:</h5>
                            <ul>
                                	<li><input type="radio" name="sex" value="Male"/><p>Male</p></li>
                                    <li><input type="radio" name="sex" value="Female"/><p>Female</p></li>
                                    <li><input type="radio" name="sex" value="Transgender"/><p>Transgender</p></li>
                            </ul>
                            <?php echo form_error('sex'); ?>
                            </div>
                          
                            
                          <div class="form_row">
                           	<h5>Last Exam Attended <span style="color:#F00; font-weight:400;">*</span>:</h5>
                             <input type="text" class="form_input" name="last_exam"/>
                             <?php echo form_error('last_exam'); ?>
                            </div>
                            
                          <div class="form_row">
                           	<h5>Exam Marks <span style="color:#F00; font-weight:400;">*</span> :</h5>
                             <input type="text" class="form_input" name="last_exam_marks"/>
                             <?php echo form_error('last_exam_marks'); ?>
                            </div>
                            
                          <div class="form_row">
                           	<h5>Exam Percentage <span style="color:#F00; font-weight:400;">*</span> :</h5>
                             <input type="text" class="form_input" name="last_exam_per"/>
                             <?php echo form_error('last_exam_per'); ?>
                            </div>
                            
                          <div class="form_row">
                           	<h5>Passing Year <span style="color:#F00; font-weight:400;">*</span> :</h5>
                             <input type="text" class="form_input" name="last_exam_yr"/>
                             <?php echo form_error('last_exam_yr'); ?>
                            </div>
                            
                          <div class="form_row">
                           	<h5>University Name <span style="color:#F00; font-weight:400;">*</span> :</h5>
                             <input type="text" class="form_input" name="last_uni_nm"/>
                             <?php echo form_error('last_uni_nm'); ?>
                            </div>
                            
                            <div class="form_row">
                           	<h5>College Last Attended :</h5>
                             <input type="text" class="form_input" name="last_college"/>
                            
                            </div>
                            
                            <div class="form_row">
                            	<h5></h5>
                                <input type="submit" class="button" name="add" value="Add"/>
                            </div>

                        </div>
                    
                    </div>
                </div>
      </div> 
      <?php echo form_close();?>         
<?php $this->load->view('templates/footer');?>