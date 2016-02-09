<?php
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
	 $data['access'] = $session_data['access'];
	 $access=$data['access'];
	 $this->load->view('templates/header',$data);
	 ?>
        	<div class="main_body"> 
            	<div class="main_container">
                 <?php if(!empty($single_exam)){?>
                <?php echo form_open('viewexam/update_exam_id'); ?>
               
                	<div class="container">
                    <h2>Edit Exam</h2>
                     <?php foreach ($single_exam as $single_exam): ?>
                     <div class="form_box">
                        <div class="form_row">
                            	<h5>Session <span style="color:#F00; font-weight:400;">*</span>:</h5>
                                <?php /*?><input type="text" class="form_input" name="session" id="session" value="<?php foreach ($studentac_session as $studentac_session){ echo $studentac_session->session_yr;} ?>" readonly="readonly"/><?php */?>
                                <select name="session">
                                <?php foreach ($student_session as $student_session): ?>
                                	<option value="<?php echo $student_session->id; ?>"<?php if($single_exam->session==$student_session->id){echo "selected";}?>><?php echo $student_session->session_yr; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php echo form_error('session'); ?>
                            </div>
                            
                          <div class="form_row">
                           	<h5>Date Of Exam <span style="color:#F00; font-weight:400;">*</span>:</h5>
                             <input type="text" class="form_input" name="dob" id="dob" value="<?php echo $single_exam->date; ?>" />
                             <?php echo form_error('dob'); ?>
                            </div>
                            
                          <?php /*?><div class="form_row">
                           	<h5>Exam Day <span style="color:#F00; font-weight:400;">*</span>:</h5>
                             <input type="text" class="form_input" name="day" id="day" value="<?php echo $single_exam->day; ?>" />
                             <?php echo form_error('day'); ?>
                            </div><?php */?>
                            
                          <div class="form_row">
                           	<h5>Exam Time <span style="color:#F00; font-weight:400;">*</span>:</h5>
                            
                           <input type="text" class="form_input" name="from_tm" id="from_tm" style="width:110px;" placeholder="From" value="<?php echo $single_exam->from_tm; ?>"/>&nbsp;&nbsp;<strong>--</strong>&nbsp;<input type="text" class="form_input" name="to_tm" id="to_tm" style="width:110px; float:right;" placeholder="To" value="<?php echo $single_exam->to_tm; ?>"/>
                               <?php echo form_error('from_tm'); ?><?php echo form_error('to_tm'); ?>     
                            </div>
                            </div>
                      <div class="form_box">
                          <div class="form_row">
                           	<h5>Semester <span style="color:#F00; font-weight:400;">*</span>:</h5>
                             <select name="sem" onchange="getpapercd(this.value);">
                             <option value="">Select Semester</option>
                           	   <option value="1st"<?php if($single_exam->sem=="1st"){echo "selected";}?>>1st Sem</option>
                                    <option value="2nd"<?php if($single_exam->sem=="2nd"){echo "selected";}?>>2nd Sem</option>
                                    <option value="3rd"<?php if($single_exam->sem=="3rd"){echo "selected";}?>>3rd Sem</option>
                                    <option value="4th"<?php if($single_exam->sem=="4th"){echo "selected";}?>>4th Sem</option>
                             </select>
                             <?php echo form_error('sem'); ?>
                            </div>
                            
                          <div class="form_row">
                           	<h5>Paper Code <span style="color:#F00; font-weight:400;">*</span>:</h5>
                           
                             <select name="paper_code" id="getpapercd">
   								<?php foreach ($paper_code as $paper_code): ?>
   								<option value="<?php echo $paper_code->id; ?>"<?php if($single_exam->paper_id==$paper_code->id){echo "selected";}?>><?php echo $paper_code->paper_code." - ".$paper_code->paper_name; ?></option>
 								<?php endforeach; ?>
							</select>
                            <?php echo form_error('paper_code'); ?>
                            </div>
                            
                          <?php /*?><div class="form_row">
                           	<h5>Paper Name<span style="color:#F00; font-weight:400;">*</span> :</h5>
                             <input type="text" class="form_input" name="paper_name" value="<?php echo $single_exam->paper_name; ?>"/>
                             <?php echo form_error('paper_name'); ?>
                            </div><?php */?>
                          <div class="form_row">

                       	    <h5></h5>
                                <input type="submit" class="button" name="add" value="Update"/>
                                <input type="hidden" id="id" name="id" value="<?php echo $single_exam->id; ?>">
                            </div>  
                            </div>      
					<?php endforeach; ?>
                      
                     </div>    
                     <?php } else {?>      
                    <div class="container">
                    <h5 style="color:green;"><?php echo $this->session->flashdata('messagedel')."<br>";?></h5>
                    <h5 style="color:green;"><?php echo $this->session->flashdata('messageup')."<br>";?></h5> 
                    <h5 style="color:#F00;"><?php echo $this->session->flashdata('messageerr')."<br>";?></h5>
                    <h5 style="color:green;"><?php echo $this->session->flashdata('messagein')."<br>";?></h5>                         
                		<h2>Exam Listings</h2>
                    <br/>
                        <?php echo form_open('viewexam/search_exam_id'); ?>
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
                        <span style="float:right;">
                 		<a href="<?php echo base_url() . "index.php/notice"?>" target="_blank">
                		 <input type="button" class="button" name="print" value="Print Exam Notice"/>
                 		</a>
                 		</span>
                        <?php echo form_close();?>
                        <?php if(isset($search_exam)){?>
                    	<div class="table">
                         <?php if (empty($search_exam)){?>
						<div class="row">                       
                        	<div class="cell">No data found</div>                            
                        </div>
                        <?php } else {?>
                    	<div class="row table_header">
                        
                        	<div class="cell">Exam Date</div>
                            <div class="cell">Exam Day</div>
                            <div class="cell">Exam Time</div>
                            <div class="cell">Semester</div>
                            <div class="cell">Paper Code</div>
                            <div class="cell">Paper</div>
                            <div class="cell">Session</div>
                            <div class="cell">Print</div>
                            <div class="cell">Edit</div>
                            <?php if($access==1){?>
                            <div class="cell">Delete</div><?php }?>
                            
                        </div>
                        <?php foreach($search_exam as $exam) { ?>
                        <div class="row">
                        
                        	<div class="cell"><?php echo $exam->date; ?></div>
                            <div class="cell"><?php echo $exam->day; ?></div>
                            <div class="cell"><?php echo $exam->from_tm ."--". $exam->to_tm; ?></div>
                            <div class="cell"><?php echo $exam->sem; ?></div>
                            <div class="cell"><?php echo $exam->paper_code; ?></div>
                            <div class="cell"><?php echo $exam->paper_name; ?></div>
                             <div class="cell"><?php echo $exam->session_yr; ?></div>
                             <div class="cell"><a href="<?php echo base_url() . "index.php/signature_copy/show_student/" . $exam->id; ?>" target="_blank">Signature Copy</a></div>
                            <div class="cell"><a href="<?php echo base_url() . "index.php/viewexam/show_exam_id/" . $exam->id; ?>">Edit</a></div>
                            <?php if($access==1){?>
                            <div class="cell"><a href="<?php echo base_url() . "index.php/viewexam/delete_exam/" . $exam->id; ?>" onclick="return confirm('Are you sure to delete this exam?');">Delete</a></div>
                            <?php }?>
                        </div>
                        <?php } }?>
                    </div>
                         <?php }else{?>  
                        <?php echo form_close();?>
                    	<div class="table">
                        <?php if (empty($results)){?>
                        <div class="row">                       
                        	<div class="cell">No data found</div>                            
                        </div>
                        <?php } else {?>
                    	<div class="row table_header">
                        
                        	<div class="cell">Exam Date</div>
                            <div class="cell">Exam Day</div>
                            <div class="cell">Exam Time</div>
                            <div class="cell">Semester</div>
                            <div class="cell">Paper Code</div>
                            <div class="cell">Paper</div>
                            <div class="cell">Session</div>
                            <div class="cell">Print</div>
                            <div class="cell">Edit</div>
                            <?php if($access==1){?>
                            <div class="cell">Delete</div><?php }?>
                            
                        </div>
                        <?php foreach($results as $exam) { ?>
                        <div class="row">
                        
                        	<div class="cell"><?php echo $exam->date; ?></div>
                            <div class="cell"><?php echo $exam->day; ?></div>
                            <div class="cell"><?php echo $exam->from_tm ."--". $exam->to_tm; ?></div>
                            <div class="cell"><?php echo $exam->sem; ?></div>
                            <div class="cell"><?php echo $exam->paper_code; ?></div>
                            <div class="cell"><?php echo $exam->paper_name; ?></div>
                            <div class="cell"><?php echo $exam->session_yr; ?></div>
                            <div class="cell"><a href="<?php echo base_url() . "index.php/signature_copy/show_student/" . $exam->id; ?>" target="_blank">Signature Copy</a></div>

                            <div class="cell"><a href="<?php echo base_url() . "index.php/viewexam/show_exam_id/" . $exam->id; ?>">Edit</a></div>
                            <?php if($access==1){?>
                            <div class="cell"><a href="<?php echo base_url() . "index.php/viewexam/delete_exam/" . $exam->id; ?>" onclick="return confirm('Are you sure to delete this exam?');">Delete</a></div>
                            <?php }?>
                        </div>
                        <?php } }?>
                        <div id="pagination">
<ul class="tsc_pagination">

<!-- Show pagination links -->
<?php foreach ($links as $link) {
echo "<li>". $link."</li>";
} ?>
</ul>
</div>
                    </div>
                    <?php }?>
                    </div>
                    <?php }?>
                </div>
                
            </div>
<?php $this->load->view('templates/footer');?>

