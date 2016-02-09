<?php
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
	 $data['access'] = $session_data['access'];
	 $access=$data['access'];
	 $this->load->view('templates/header',$data);
	 ?>
        	<div class="main_body">
            	<div class="main_container">
					  <div class="container">
                      <h5 style="color:green;"><?php echo $this->session->flashdata('message')."<br>";?></h5>                      
                		<h2>Certificate Generation</h2>
                        <br/>
                        <?php echo form_open('certificate_gen/search_student_id'); ?>
                        <p><input type="text"  class="form_input" name="key" placeholder="keyword"/> 
                        OR
                          <select name="session">
                            <option value="">Select Session</option>
                                <?php foreach ($student_session as $student_session): ?>
                                	<option value="<?php echo $student_session->id; ?>"><?php echo $student_session->session_yr; ?></option>
                                    <?php endforeach; ?>
                         </select> 
                          OR
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
                            <div class="cell">College Ref.No.</div>
                            <div class="cell">C.U Reg.No.</div>
                            <div class="cell">Contact No.</div>
                            <div class="cell">Date Of Birth</div>
                            <div class="cell">Session</div>
                            <div class="cell">Certificate</div>
                            <div class="cell">Final Tabulation Sheet</div>
                            <div class="cell">Final Result</div>
                            
                        </div>
                        <?php foreach($search_student as $student) { $sid= $student->id;?>
                        <div class="row">
                        
                        	<div class="cell"><?php echo $student->name; ?></div>
                            <div class="cell"><?php echo $student->clg_ref_no; ?></div>
                            <div class="cell"><?php echo $student->cu_reg_no; ?></div>
                            <div class="cell"><?php echo $student->phn; ?></div>
                            <div class="cell"><?php echo $student->dob; ?></div>
                             <div class="cell"><?php echo $student->session_yr; ?></div>
                            <div class="cell">
           <a href="<?php echo base_url() . "index.php/certificate/certificate_details/" . $student->id; ?>" target="_blank">Download</a>
                            </div>
                            <div class="cell">
           <a href="<?php echo base_url() . "index.php/resultall/search_student_result/" . $student->id; ?>" target="_blank">Download</a>
                            </div>
                            <div class="cell">
           <a href="<?php echo base_url() . "index.php/marksheet_final/result_details/" . $student->id; ?>" target="_blank">Download</a>
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
                            <div class="cell">College Ref.No.</div>
                            <div class="cell">C.U Reg.No.</div>
                            <div class="cell">Contact No.</div>
                            <div class="cell">Date Of Birth</div>
                            <div class="cell">Session</div>
                            <div class="cell">Certificate</div>
                            <div class="cell">Final Tabulation Sheet</div>
                            <div class="cell">Final Result</div>
                            
                        </div>
                        <?php
						foreach($results as $student) { 
						$sid= $student->id;
						?>
                        
                        <div class="row">
                        
                        	<div class="cell"><?php echo $student->name; ?></div>
                            <div class="cell"><?php echo $student->clg_ref_no; ?></div>
                            <div class="cell"><?php echo $student->cu_reg_no; ?></div>
                            <div class="cell"><?php echo $student->phn; ?></div>
                            <div class="cell"><?php echo $student->dob; ?></div>
                            <div class="cell"><?php echo $student->session_yr; ?></div>
                            <div class="cell">
             <a href="<?php echo base_url() . "index.php/certificate/certificate_details/" . $student->id; ?>" target="_blank">Download</a>
                            </div>
                            <div class="cell">
             <a href="<?php echo base_url() . "index.php/resultall/search_student_result/" . $student->id; ?>" target="_blank">Download</a>
                            </div>
                            <div class="cell">
             <a href="<?php echo base_url() . "index.php/marksheet_final/result_details/" . $student->id; ?>" target="_blank">Download</a>
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
                </div>
            </div>
<?php $this->load->view('templates/footer');?>

