<?php
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
	 $data['access'] = $session_data['access'];
	 $access=$data['access'];
	 $this->load->view('templates/header',$data);
	 ?>
        	<div class="main_body">
            	<div class="main_container">
					  <div class="container" style="height:470px;" align="center">
                      <h5 style="color:green;"><?php echo $this->session->flashdata('messagedel')."<br>";?></h5>
                     <h5 style="color:green;"><?php echo $this->session->flashdata('messageup')."<br>";?></h5>                        
                		<h2>Result Sheet Generation- Search Result</h2>
                        <br/>
                        <form action="" method="post" target="_blank">
                        <select name="session">
                            <option value="">Select Session</option>
                                <?php foreach ($student_session as $student_session): ?>
                                	<option value="<?php echo $student_session->id; ?>"><?php echo $student_session->session_yr; ?></option>
                                    <?php endforeach; ?>
                         </select> AND 
                         <select name="sem">
                                	<option value="">Select Sem</option>
                                    <option value="1st">1st</option>
                                    <option value="2nd">2nd</option>
                                    <option value="3rd">3rd</option>
                                    <option value="4th">4th</option>
                                </select>
                        <input type="submit" class="button" name="search" value="Search & View Tabulation Sheet" onclick="this.form.method='post'; this.form.action='result_search/search_student_tabulation';this.form.submit();"/>
                        <input type="submit" class="button" name="search" value="Search & View Result Sheet" onclick="this.form.method='post'; this.form.action='result_search/search_student_result';this.form.submit();"/>
                        <input type="submit" class="button" name="search" value="Search & View Tabulation Sheet (ALL)" onclick="this.form.method='post'; this.form.action='result_search/search_student_tabulationall';this.form.submit();"/></p>
                        </form>                                    
                    </div>
                </div>
            </div>
<?php $this->load->view('templates/footer');?>

