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
                      <h5 style="color:green;"><?php echo $this->session->flashdata('messageup')."<br>";?></h5>                      
                		<h2>Give Access to Sub Admin</h2>
                    	<div class="table">
                    	<div class="row table_header">
                        
                        	<div class="cell">Page</div>
                            <div class="cell">Block / Unblock</div>
                            
                        </div>
                        <?php
						foreach($results as $results) { 
						$sid= $results->id;
						?>                        
                        <div class="row">
                        
                        	<div class="cell"><?php echo $results->page; ?></div>
                            <div class="cell">
             <a href="<?php echo base_url() . "index.php/access/block/" . $results->id."/" . $results->block; ?>" onclick="return confirm('Are You Sure?');">
             <?php if($results->block==1){echo 'Unblock';}else{echo 'Block';}?>
             </a>
                            </div>
                        </div>
                        <?php } ?>
                    </div>                                      
                    </div>
                </div>
            </div>
<?php $this->load->view('templates/footer');?>

