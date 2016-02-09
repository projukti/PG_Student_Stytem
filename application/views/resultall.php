<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Result Sheet</title>

<style>
	.page_a4_body
	{
		width:767px;
		height:1122px;
		
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
</div>
	<div class="page_a4_body" align="center">
    	<div style="width:10%; float:left;" align="center">
    <img src="<?php echo base_url()?>/images/cu_logo.jpg" style="float:left; margin:10px 0px 0px 10px;" width="70" />
    </div>
    	<div style="width:80%; float:left;" align="center">
    	<h4>SHIBPUR DINOBONDHU INSTITUTION (COLLEGE)</h4>        
      <h5>RESULT SHEET OF M.COM   EXAMINATION 
        <?php //if(($sem=='1st')||($sem=='3rd')){echo 'FEBRUARY';}else{echo 'NOVEMBER';}?><?php //foreach ($session_year as $session_year){echo $session_year->year_exam;}?></h5>
      
      <h5><?php foreach ($search_student as $search_student){echo "NAME - ".$search_student->name."<br> College Ref. No. -".$search_student->clg_ref_no."<br> CU Reg. No.".$search_student->cu_reg_no;}?></h5>
      
      </div>
   	  <div style="width:10%; float:left;" align="center">
      <img src="<?php echo base_url()?>/images/logo2.png" style="float:right" />
      </div>
        <table width="100%" border="1" cellspacing="0" cellpadding="0" class="my_table" bordercolor="#666666">
        <?php if(!empty($search_result)){?>
          <tr>
            <td width="3%">No.</td>
            <td width="15%">Semester</td>
            <td width="12%">Session</td>
            <td width="10%">Roll.</td>
            <td width="10%"> No</td>
            <td>Marks Obtained in Paper No.</td>
            <td width="5%">Total Marks</td>
            <td width="5%">% of Marks</td>
            <td width="11%">Remarks</td>
          </tr>
          <?php 
		  $x=0;
		  foreach($search_result as $search_result) {
			 $student_id = $search_result->id;
			 $sem = $search_result->sem;
			 $x++ 
			  ?>
          <tr>
            <td><?php echo $x; ?></td>
            <td><?php echo $search_result->sem; ?></td>
            <td><?php echo $search_result->session_yr; ?></td>
            <td><?php echo $search_result->roll; ?></td>
            <td><?php echo $search_result->no; ?></td>
            <td><?php
	$seladmit=mysql_query("select * from subjects where  sem_no ='".$sem."'");
	while($fetch=mysql_fetch_array($seladmit))
    {
	$subject_id = $fetch['id'];	
	$sel=mysql_query("select * from student_admit where student_id ='".$student_id."' AND subject_id ='".$subject_id."' AND session ='".$session."' and sem ='".$sem."'");
	$res=mysql_fetch_array($sel);
	$count=mysql_num_rows($sel);
	echo $fetch['paper_code']."-  ";
	if($count>0){echo $res['total_marks'].", ";}else{echo 'X'.", ";}}?>
	</td>
       <?php 
    $selr=mysql_query("select * from result where student_id ='".$student_id."' AND session ='".$session."' and sem ='".$sem."'");//echo "select * from result where student_id ='".$student_id."' AND session ='".$session."' and sem ='".$sem."'";
	$resr=mysql_fetch_array($selr);
	$countr=mysql_num_rows($selr);
	  ?>
            <td width="6%"><?php if($countr>0){echo $resr['total'];}else{echo 'X';}?></td>
            <td width="6%"><?php if($countr>0){echo $resr['percentage'];}else{echo 'X';}?></td>
            <td width="6%"><?php if($countr>0){echo $resr['remarks'];}else{echo 'X';}?></td>
          </tr>
          <?php }} else {?>
          <tr>
            <td colspan="13" align="left" valign="middle" height="50">SORRY! NO DATA FOUND</td>
          </tr>
          <?php }?>
		</table>


    </div>
</body>
</html>
