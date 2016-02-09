<?php
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<style>
	.page_a4_body
	{
		width:767px;
		height:1122px;
		border:1px solid #ccc;
		box-sizing:border-box;
		margin:0px auto;
	}
	.my_table tr td
	{
		font-size:12px;
		text-align:center;
		
	}
	.header
	{
		width:100%;
		float:left;
		
	}
	.header h4
	{
		width:100%;
		float:left;
		
	}
	.header p
	{
		width:100%;
		float:left;
		margin:0px;
		
	}
	.header h5
	{
		width:100%;
		float:left;
		margin:0px;
		margin:10px 0px;
		
	}
	.logo
	{
		float:left;
		width:15%;
		padding-top:45px;
	}
	.middle
	{
		float:left;
		width:70%;
	}
</style>
<script language="JavaScript">
function printPage() {
if(document.all) {
document.all.divButtons.style.visibility = 'hidden';
window.print();
document.all.divButtons.style.visibility = 'visible';
} else {
document.getElementById('divButtons').style.visibility = 'hidden';
window.print();
document.getElementById('divButtons').style.visibility = 'visible';
}
}
</script>
</head>

<body>
<div id="divButtons" name="divButtons" align="center" style="height:10px;">
<input type="button" value= "Print this page" onclick="printPage()" style="font:bold 11px verdana;color:#FF0000;background-color:#FFFFFF;" />
<a href="<?php echo base_url() . "index.php/viewexam"; ?>"><input type="button" value="Back" style="font:bold 11px verdana;color:#FF0000;background-color:#FFFFFF;" /></a>
</div>
	<div class="page_a4_body" align="center">
   	  <div class="header">
      <div class="logo" align="center">
      	<img src="<?php echo base_url()?>/images/cu_logo.jpg" />
      </div>
      <div class="middle">
        	<h4>SHIBPUR DINOBONDHU INSTITUTION (COLLEGE)</h4>
            <p>(Accredited by NAAC)</p>
            <p>Post Graduate Section (Commerce)</p>
            <p>Affilated to University of Calcutta </p>	
            
            <h5>MASTER OF COMMERCE EXAMINATION <?php  echo $sem;  ?> SEMESTER , <?php  echo date("F, Y",strtotime($date));  ?>.</h5>
  	</div>
    <div class="logo" align="center">
    	<img src="<?php echo base_url()?>/images/logo2.png" />
    </div>
        </div>
        <br />
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><strong>Exam:</strong> <?php  echo date("d/m/Y",strtotime($date));  ?></td>
            <td><strong>Subject:</strong> <?php  echo $paper_code;  ?></td>
            <td><?php  echo $paper_name;  ?></td>
          </tr>
		</table>

    	<br />
        	
    	<table width="100%" border="1" cellspacing="1" cellpadding="1" class="my_table" style="border-collapse:collapse;">
  <tr>
    <td width="6%" rowspan="2">Sl No.</td>
    <td width="24%" rowspan="2">NAME</td>
    <td colspan="2">Examination</td>
    <td width="14%" rowspan="2">C. U Regn</td>
    <td width="14%" rowspan="2">College Roll No</td>
    <td width="14%" rowspan="2">Student Signature</td>
  </tr>
  <tr>
    <td width="14%">Roll</td>
    <td width="14%">No</td>
    </tr>
    <?php $i=0; foreach($show_student as $student) { $i++; ?>
  <tr>
    <td><?php echo $i;?></td>
    <td><?php echo $student->name; ?></td>
    <td><?php echo $student->roll; ?></td>
    <td><?php echo $student->no; ?></td>
    <td><?php echo $student->cu_reg_no; ?></td>
    <td><?php echo $student->clg_ref_no; ?></td>
    <td>&nbsp;</td>
  </tr>
  <?php }?>
      </table>



    </div>
</body>
</html>
