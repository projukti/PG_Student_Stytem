<script>
function getpapercd(id)
{
	//alert(id);
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("getpapercd").innerHTML=xmlhttp.responseText;
    }
  }
 
  
xmlhttp.open("POST","<?php echo base_url() . "index.php/addexam/paper_code/"; ?>id="+id,true);
//alert(xmlhttp.open);
xmlhttp.send();
}
</script>
<!--<script>
            function getpapercd(id)
            {
                //alert('this id value :'+id);
                $.ajax({
                    type: "POST",
                    url: '<?php //echo site_url('addexam/ajax_state_list').'/';?>'+id,
                    data: id='id',
                    success: function(data){
                        alert(data);
                        $('#old_state').html(data);
                },
});
            }
            </script>-->
<?php
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
	 $data['access'] = $session_data['access'];
	 $access=$data['access'];
	 $this->load->view('templates/header',$data);
	 ?>

   <?php echo form_open('addexam'); ?>
          	
            <div class="main_body"> 
            	<div class="main_container">
                	<div class="container">
					<?php if (isset($message)) { ?>
                    <h5 style="color:green; font-size:14px;" align="center">Data inserted successfully</h5><br><?php } ?>
                		<h2>Create Exam</h2>
                    
                    	<div class="form_box">
                        <div class="form_row">
                            	<h5>Session <span style="color:#F00; font-weight:400;">*</span>:</h5>
                               
                                <select name="session">
                                <?php foreach ($student_session as $student_session): ?>
                                	<option value="<?php echo $student_session->id; ?>"><?php echo $student_session->session_yr; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php echo form_error('session'); ?>
                            </div>
                            
                          <div class="form_row">
                           	<h5>Date Of Exam <span style="color:#F00; font-weight:400;">*</span>:</h5>
                             <input type="text" class="form_input" name="dob" id="dob" />
                             <?php echo form_error('dob'); ?>
                            </div>
                            
                          <?php /*?><div class="form_row">
                           	<h5>Exam Day <span style="color:#F00; font-weight:400;">*</span>:</h5>
                             <input type="text" class="form_input" name="day" id="day" />
                             <?php echo form_error('day'); ?>
                            </div><?php */?>
                            
                          <div class="form_row">
                           	<h5>Exam Time <span style="color:#F00; font-weight:400;">*</span>:</h5>
                            
                           <input type="text" class="form_input" name="from_tm" id="from_tm" style="width:110px;" placeholder="From"/>
                           &nbsp;&nbsp;<strong>--</strong>&nbsp;
                           <input type="text" class="form_input" name="to_tm" id="to_tm" style="width:110px; float:right;" placeholder="To"/><?php echo form_error('from_tm'); ?><?php echo form_error('to_tm'); ?> 
                            </div>
                        </div>
                        
                        <div class="form_box">
                            
                          <div class="form_row">
                           	<h5>Semester <span style="color:#F00; font-weight:400;">*</span>:</h5>
                             <select name="sem" onchange="getpapercd(this.value);">
                             <option value="">Select Semester</option>
                           	   <option value="1st">1st Sem</option>
                                    <option value="2nd">2nd Sem</option>
                                    <option value="3rd">3rd Sem</option>
                                    <option value="4th">4th Sem</option>
                             </select>
                             <?php echo form_error('sem'); ?>
                            </div>
                            
                          <div class="form_row">
                           	<h5>Paper Code <span style="color:#F00; font-weight:400;">*</span>:</h5>
                           
                             <div id="getpapercd">
                             <select name="paper_code">
   								<?php foreach ($paper_code as $paper_code): ?>
   								<option value="<?php echo $paper_code->id; ?>"><?php echo $paper_code->paper_code." - ".$paper_code->paper_name; ?></option>
 								<?php endforeach; ?>
							</select>
                            <?php echo form_error('paper_code'); ?>
                            </div>
                            </div>
                            
                          <?php /*?><div class="form_row">
                           	<h5>Paper Name<span style="color:#F00; font-weight:400;">*</span> :</h5>
                             <input type="text" class="form_input" name="paper_name"/>
                             <?php echo form_error('paper_name'); ?>
                            </div><?php */?>
                          <div class="form_row">
                       	    <h5></h5>
                                <input type="submit" class="button" name="add" value="Add"/>
                            </div>

                        </div>
                    
                    </div>
                </div>
                
            </div>

<?php $this->load->view('templates/footer');?>