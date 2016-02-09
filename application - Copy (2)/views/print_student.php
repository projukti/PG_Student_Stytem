<?php
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
	 $data['access'] = $session_data['access'];
	 $access=$data['access'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<style>
	.page_a4_body
	{
		width:1122px;
		height:767px;
/*		border:1px solid #ccc;*/
		box-sizing:border-box;
		margin:0px auto;
	}
	.my_table tr td
	{
		font-size:10px;
		text-align:center;
		
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
<a href="<?php echo base_url() . "index.php/viewstudent"; ?>"><input type="button" value="Back" style="font:bold 11px verdana;color:#FF0000;background-color:#FFFFFF;" /></a>
</div>
	<div class="page_a4_body" align="center">
    	
    	<h4>SHIBPUR DINOBONDHU INSTITUTION (COLLEGE)</h4>
        <strong>Total :</strong> <?php echo $count_tt; ?>&nbsp;&nbsp; <strong>M :</strong> <?php echo $count_m; ?>&nbsp;&nbsp;   <strong>F :</strong> <?php echo $count_f; ?>&nbsp;&nbsp; <strong>T :</strong> <?php echo $count_t; ?>&nbsp;&nbsp; <strong>General :</strong> <?php echo $count_g; ?>&nbsp;&nbsp; <strong>SC :</strong> <?php echo $count_sc; ?>&nbsp;&nbsp; <strong> ST :</strong> <?php echo $count_st; ?>&nbsp;&nbsp; <strong>OBC-A :</strong> <?php echo $count_oa; ?>&nbsp;&nbsp;  <strong>OBC-B:</strong> <?php echo $count_ob; ?>
    	<table width="100%" border="1" cellspacing="0" cellpadding="0" class="my_table" bordercolor="#666666">
          <tr>
            <td width="2%" rowspan="2">No</td>
            <td width="7%" rowspan="2">College Ref. No.</td>
            <td width="11%" rowspan="2">Name</td>
            <td width="8%" rowspan="2">Telephone No</td>
            <td width="8%" rowspan="2">C.U. Registration No</td>
            <td width="2%" rowspan="2">Session</td>
            <td width="2%" rowspan="2">Semester</td>
            <td colspan="5">B.com Hons</td>
            <td width="8%" rowspan="2">Address</td>
            <td width="10%" rowspan="2">Name of Father/Mother/Gurdian</td>
            <td width="5%" rowspan="2">Date of Birth</td>
            <td width="4%" rowspan="2">Caste</td>
            <td width="3%" rowspan="2">Sex</td>
          </tr>
          <tr>
            <td width="3%">Marks Obtain</td>
            <td width="3%">% of Marks</td>
            <td width="3%">Year of Passing</td>
             <td width="12%">College</td>
            <td width="9%">Name Of the Uneversity</td>
          </tr>
          <?php $i=0;foreach($student_details as $student) { $i++;?>
          <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $student->clg_ref_no;?></td>
            <td><?php echo $student->name;?></td>
            <td><?php echo $student->phn;?></td>
            <td><?php echo $student->cu_reg_no;?></td>
            <td><?php echo $student->session_yr;?></td>
            <td><?php echo $student->sem;?></td>
            <td><?php echo $student->last_exam_marks;?></td>
            <td><?php echo $student->last_exam_per;?></td>
            <td><?php echo $student->last_exam_yr;?></td>
            <td><?php echo $student->last_college;?></td>
            <td><?php echo $student->last_uni_nm;?></td>
            <td><?php echo $student->address;?></td>
            <td><?php echo $student->guardian_nm;?></td>
            <td><?php echo $student->dob;?></td>
            <td><?php echo $student->caste;?></td>
            <td><?php echo $student->sex;?></td>
          </tr>
         <?php }?> 
		</table>

    </div>
</body>
</html>
