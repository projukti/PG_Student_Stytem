<?php
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
	 $data['access'] = $session_data['access'];
	 $access=$data['access'];
	 $this->load->view('templates/header',$data);
	 ?>
        	<div class="main_body"> 
            	<div class="main_container">
                <?php echo form_open('editaccount/update_account'); ?>           
                	<div class="container">
                    <h5 style="color:green;"><?php echo $this->session->flashdata('messageup')."<br>";?></h5>
                    <h2>Edit Account</h2>
                     <div class="form_box"> 
                          <div class="form_row">
                           	<h5>Username <span style="color:#F00; font-weight:400;">*</span>:</h5>
                            <select name="username">
                                <?php foreach ($username as $username): ?>
                                	<option value="<?php echo $username->id; ?>"><?php echo $username->username; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            
                          <div class="form_row">
                           	<h5>Password <span style="color:#F00; font-weight:400;">*</span>:</h5>
                             <input type="password" class="form_input" name="password" id="password" value="" />
                             <?php echo form_error('password'); ?>
                            </div>
                            </div> 
                            <div class="form_row">
                            	<h5></h5>
                                <input type="submit" class="button" name="add" value="Update"/>
                            </div>
                      
                     </div>  

                </div>
                
            </div>
<?php $this->load->view('templates/footer');?>

