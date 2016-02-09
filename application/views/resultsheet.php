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
      <h5>RESULT SHEET OF M.COM <?php echo strtoupper($sem);?> SENESTER EXAMINATION - <?php if(($sem=='1st')||($sem=='3rd')){echo 'FEBRUARY';}else{echo 'NOVEMBER';}?> ,  <?php foreach ($session_year as $session_year){echo $session_year->year_exam;}?></h5>
      </div>
    	<div style="width:10%; float:left;" align="center">
      <img src="<?php echo base_url()?>/images/logo2.png" style="float:right" />
      </div>
        <table width="100%" border="1" cellspacing="0" cellpadding="0" class="my_table" bordercolor="#666666">
        <?php if(!empty($search_student)){?>
          <tr>
            <td width="3%" rowspan="2">No.</td>
            <td width="22%" rowspan="2">NAME</td>
            <td colspan="2">Exam</td>
            <td width="10%" rowspan="2">College Roll No.</td>
            <td width="12%" rowspan="2">C.U. Regn. No</td>
            <td colspan="5">Marks Obtained in Paper No.</td>
            <td width="5%" rowspan="2">Total Marks</td>
            <td width="5%" rowspan="2">% of Marks</td>
            <td width="11%">Remarks</td>
          </tr>
          <tr>
            <td width="4%">Roll</td>
            <td width="4%">No</td>
            <?php
	       foreach ($subject_admit as $sub)
             {
			?>
            <td width="5%"><?php echo $sub->paper_code?></td>
            <?php }?>
            <td width="6%">&nbsp;</td>
          </tr>
          <?php 
		  $x=0;
		  foreach($search_student as $student) {
			 $student_id = $student->id;
			 $x++ 
			  ?>
          <tr>
            <td><?php echo $x; ?></td>
            <td><?php echo $student->name; ?></td>
            <td><?php echo $student->roll; ?></td>
            <td><?php echo $student->no; ?></td>
            <td><?php echo $student->clg_ref_no; ?></td>
            <td><?php echo $student->cu_reg_no; ?></td>
            <?php
	foreach ($subject_admit as $fetch)
    {
	$subject_id = $fetch->id;	
	$sel=mysql_query("select * from student_admit where student_id ='".$student_id."' AND subject_id ='".$subject_id."' AND session ='".$session."' and sem ='".$sem."'");
	$res=mysql_fetch_array($sel);
	$count=mysql_num_rows($sel);
			?>
            <td><?php if($count>0){echo $res['total_marks'];}else{echo 'X';}?></td>
      <?php }?>
       <?php 
    $selr=mysql_query("select * from result where student_id ='".$student_id."' AND session ='".$session."' and sem ='".$sem."'");
	$resr=mysql_fetch_array($selr);
	$countr=mysql_num_rows($selr);
	  ?>
            <td><?php if($countr>0){echo $resr['total'];}else{echo 'X';}?></td>
            <td width="6%"><?php if($countr>0){echo $resr['percentage'];}else{echo 'X';}?></td>
            <td width="6%"><?php if($countr>0){echo $resr['remarks'];}else{echo 'X';}?></td>
          </tr>
          <?php }} else {?>
          <tr>
            <td colspan="14" align="left" valign="middle" height="50">SORRY! NO DATA FOUND</td>
          </tr>
          <?php }?>
		</table>


    </div>
</body>
</html>
