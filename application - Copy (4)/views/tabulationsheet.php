<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tabulation Sheet</title>

<style>
	.page_a4_body
	{
		width:1122px;
		height:767px;
		
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
    <div style="width:10%; float:left;" align="center">
    <img src="<?php echo base_url()?>/images/cu_logo.jpg" style="float:left; margin:10px 0px 0px 10px;" width="70" />
    </div>
    <div style="width:80%; float:left;" align="center">
    	<h4 style="margin:15px 0px;">SHIBPUR DINOBONDHU INSTITUTION (COLLEGE)</h4>
      <h5 style="margin:0px 0px 15px 0px;">TABULATION SHEET OF M.COM <?php echo strtoupper($sem);?> SEMESTER EXAMINATION -  <?php if(($sem=='1st')||($sem=='3rd')){echo 'FEBRUARY';}else{echo 'NOVEMBER';}?>: <?php foreach ($session_year as $session_year)
             {echo $session_year->year_exam;}?></h5>
      </div>
    <div style="width:10%; float:left;" align="center">
      <img src="<?php echo base_url()?>/images/logo2.png" style="float:right" />
      </div>
        <table width="100%" border="1" cellspacing="0" cellpadding="0" class="my_table">
        <?php if(!empty($search_student)){?>
          <tr>
            <td width="2%" align="left" valign="middle">#</td>
            <td width="13%" align="left" valign="middle">NAME</td>
            <td colspan="2" align="left" valign="middle">Exam</td>
            <td width="6%" align="left" valign="middle">College Roll No</td>
            <td width="7%" align="left" valign="middle">C.U Roll No</td>
            <?php
	       foreach ($subject_admit as $sub)
             {
			?>
            <td colspan="3" align="left" valign="middle">Paper : <?php echo $sub->paper_code?></td>
            <?php }?>
            <td width="5%" align="left" valign="middle">Total Marks</td>
            <td width="5%" align="left" valign="middle">% Of Marks</td>
            <td width="7%" align="left" valign="middle">Remarks</td>
          </tr>
          <tr>
            <td align="left" valign="middle">&nbsp;</td>
            <td align="left" valign="middle">&nbsp;</td>
            <td width="3%" align="left" valign="middle">Roll</td>
            <td width="4%" align="left" valign="middle">No.</td>
            <td align="left" valign="middle">&nbsp;</td>
            <td align="left" valign="middle">&nbsp;</td>
            <?php
	       foreach ($subject_admit as $sub)
             {
			?>
            <td align="left" valign="middle">Gr.-A</td>
            <td align="left" valign="middle">Gr.-B</td>
            <td align="left" valign="middle">TOT</td>
            <?php }?>
            <td align="left" valign="middle">&nbsp;</td>
            <td align="left" valign="middle">&nbsp;</td>
            <td align="left" valign="middle">&nbsp;</td>
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
	$sel=mysql_query("select * from student_admit where student_id ='".$student_id."' AND subject_id ='".$subject_id."' AND session ='".$session."' and sem ='".$sem."'");
	$res=mysql_fetch_array($sel);
	$count=mysql_num_rows($sel);
			?>
            <td align="left" valign="middle"><?php if($count>0){echo $res['grp_a_marks'];}else{echo 'X';}?></td>
            <td align="left" valign="middle"><?php if($count>0){echo $res['grp_b_marks'];}else{echo 'X';}?></td>
            <td align="left" valign="middle"><?php if($count>0){echo $res['total_marks'];}else{echo 'X';}?></td>
         <?php }?>
     <?php 
    $selr=mysql_query("select * from result where student_id ='".$student_id."' AND session ='".$session."' and sem ='".$sem."'");
	$resr=mysql_fetch_array($selr);
	$countr=mysql_num_rows($selr);
	  ?>
            <td align="left" valign="middle"><?php if($countr>0){echo $resr['total'];}else{echo 'X';}?></td>
            <td align="left" valign="middle"><?php if($countr>0){echo $resr['percentage'];}else{echo 'X';}?></td>
            <td align="left" valign="middle"><?php if($countr>0){echo $resr['remarks'];}else{echo 'X';}?></td>
          </tr>
          <?php } }else{?>
            <tr>
            <td colspan="24" align="left" valign="middle" height="50">SORRY! NO DATA FOUND</td>
          </tr><?php }?>
		</table>
    </div>
</body>
</html>
