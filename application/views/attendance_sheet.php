<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Attendance Sheet</title>

<style>
	.page_a4_body
	{
		width:1122px;
		height:767px;
		border:1px solid #ccc;
		box-sizing:border-box;
		margin:0px auto;
	}
	.my_table tr td
	{
		font-size:8px;
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
</div>
	<div class="page_a4_body" align="center">
    	
    	<h4 style="margin:15px 0px;">SHIBPUR DINOBONDHU INSTITUTION (COLLEGE)</h4>
      <h5 style="margin:0px 0px 15px 0px;">ELIGIBILITY SHEET OF M.COM <?php echo strtoupper($sem);?> SEMESTER EXAMINATION - <?php if(($sem=='1st')||($sem=='3rd')){echo 'FEBRUARY';}else{echo 'NOVEMBER';}?>: <?php foreach ($student_session as $student_session): echo $student_session->year;  endforeach; ?></h5>
        
        <table width="100%" border="1" cellspacing="0" cellpadding="0" class="my_table">
        <?php if(!empty($search_student)){?>
          <tr>
            <td width="2%" align="left" valign="middle">#</td>
            <td width="13%" align="left" valign="middle">NAME</td>
            <td colspan="2" align="left" valign="middle">Exam</td>
            <td width="6%" align="left" valign="middle">College Ref No</td>
            <td width="7%" align="left" valign="middle">C.U Roll No</td>
             <?php
	       foreach ($subject_admit as $sub)
             {
			?>
            <td colspan="2" align="left" valign="middle">Paper : <?php echo $sub->paper_code?></td>
            <?php }?>
          </tr>
          <tr>
            <td align="left" valign="middle">&nbsp;</td>
            <td align="left" valign="middle">&nbsp;</td>
            <td width="3%" align="left" valign="middle">Roll</td>
            <td width="4%" align="left" valign="middle">No.</td>
            <td align="left" valign="middle">&nbsp;</td>
            <td align="left" valign="middle">&nbsp;</td>
            <td align="left" valign="middle">Paper Name</td>
            <td align="left" valign="middle">Status</td>
            <td align="left" valign="middle">Paper Name</td>
            <td align="left" valign="middle">Status</td>
            <td align="left" valign="middle">Paper Name</td>
            <td align="left" valign="middle">Status</td>
            <td align="left" valign="middle">Paper Name</td>
            <td align="left" valign="middle">Status</td>
            <td align="left" valign="middle">Paper Name</td>
            <td align="left" valign="middle">Status</td>
          </tr>
          <?php 
		  $x=0;
		  foreach($search_student as $student) {
			 $student_id = $student->id; 
			 $x++
			  ?>
          <tr>
            <td align="left" valign="middle"><?php echo $x; ?></td>
            <td align="left" valign="middle"><?php echo $student->name; ?></td>
            <td align="left" valign="middle"><?php echo $student->roll; ?></td>
            <td align="left" valign="middle"><?php echo $student->no; ?></td>
            <td align="left" valign="middle"><?php echo $student->clg_ref_no; ?></td>
            <td align="left" valign="middle"><?php echo $student->cu_reg_no; ?></td>
            <?php
	foreach ($subject_admit as $fetch)
    {
	$subject_id = $fetch->id;
			?>
            <td align="left" valign="middle"><?php echo $fetch->paper_name; ?></td>
            <td align="left" valign="middle"><?php echo $data['status'] = $this->attendance_model->sub_status($student_id,$subject_id,$session,$sem);?></td>          
          <?php }?>            
            </tr>
            <?php }}else{?>
            <tr>
            <td colspan="16" align="left" valign="middle" height="50">SORRY! NO DATA FOUND</td>
          </tr><?php }?>
		</table>

        
    	

    </div>
</body>
</html>
