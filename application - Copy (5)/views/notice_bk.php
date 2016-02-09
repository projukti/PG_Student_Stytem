<?php
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
	 $this->load->view('templates/header',$data);
	 ?>
        	<div class="main_body">
            	<div class="main_container">
					  <div class="container" align="center">
                      <h5 style="color:green;"><?php echo $this->session->flashdata('messagedel')."<br>";?></h5>
                     <h5 style="color:green;"><?php echo $this->session->flashdata('messageup')."<br>";?></h5>                        
                		<h2>Search Exam</h2>
                        <br/>
                        
                        <form action="notice/search_student_id" method="post" target="_blank">
                        <table align="center" width="350">
                        <tr>
                        <td width="128" height="50" align="center">
                        <select name="session">
                            <option value="">Select Session</option>
                                <?php foreach ($student_session as $student_session): ?>
                                	<option value="<?php echo $student_session->id; ?>"><?php echo $student_session->session_yr; ?></option>
                                    <?php endforeach; ?>
                         </select></td>
                        <td width="50" align="center">AND</td>
                         <td width="156" height="50" align="center">
                         <select name="sem">
                                	<option value="">Select Sem Type</option>
                                    <option value="O">Odd Semester</option>
                                    <option value="E">Even Semester</option>
                                </select>
                                </td></tr>
                               <tr> <td colspan="3" valign="top" height="50">
                       Exam Message:&nbsp;&nbsp;&nbsp;<textarea name="msg" ></textarea>
                        </td>
                        </tr>
                         <tr> <td colspan="3" align="center">
                        <input type="submit" class="button" name="print" value="Print Notice"/>
                        </td>
                        </tr>
                        </table>
                        </form>                                    
                    </div>
                </div>
            </div>
<?php $this->load->view('templates/footer');?>

