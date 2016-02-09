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
<title>PG Student Management System</title>
<style>
.four {
	text-align:justify;
	font-size:16px;
	
	
}
u {    
    border-bottom: 1px dotted #000;
    text-decoration: none;
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
 <div id="divButtons" name="divButtons" align="center" style="height:5px;">
<input type="button" value= "Print this page" onclick="printPage()" style="font:bold 11px verdana;color:#FF0000;background-color:#FFFFFF;" />
<a href="<?php echo base_url() . "index.php/viewstudent"; ?>"><input type="button" value="Back" style="font:bold 11px verdana;color:#FF0000;background-color:#FFFFFF;" /></a>
</div>
  <?php foreach($card_details as $student) { $id= $student->id;?>
<table width="595" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td width="68" rowspan="2"><img src="<?php echo base_url()?>/images/logo2.png" width="50" height="65"  /></td>
    <td height="43" colspan="2"><span style="padding-left:12px; font-size:20px; text-align:left;"><strong>SHIBPUR DINOBUNDHOO INSTITUTION (COLLEGE)</strong></span></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><strong>Post Graduate Section (Commerce)</strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2" align="center"><span style="padding-left:0px;"><strong>Affiliated to University of Calcutta</strong></span></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2" align="center"><strong>ACCREDITED BY NAAC</strong></td>
  </tr>
  <tr>
    <td colspan="3" class="four">To</td>
  </tr>
  <tr>
    <td colspan="3" class="four">The Controller of Examinations,</td>
  </tr>
  <tr>
    <td colspan="3" class="four">Shibpur Dinobundhoo Institution (College),</td>
  </tr>
  <tr>
    <td colspan="3" class="four">Post Graduate Section (Commerce),</td>
  </tr>
  <tr>
    <td colspan="3" class="four">Affiliated to University of Calcutta,</td>
  </tr>
  <tr>
    <td colspan="3" class="four">412/1,G.T.Road (South),</td>
  </tr>
  <tr>
    <td colspan="3" class="four" style="text-decoration:underline;">Howrah - 711102</td>
  </tr>
  <tr>
    <td colspan="3" class="four" style="text-align:center;">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" class="four" style="text-align:center;">Sub. : <span style="text-decoration:underline;"><strong><em>Application for Appearing At Examination</em></strong></span></td>
  </tr>
  <tr>
    <td colspan="3" class="four" style="text-align:center;">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="left" class="four" style="text-align:justify;">Sir,</td>
  </tr>
  <tr>
    <td colspan="3" class="four" style="text-align:justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I would like to apply to sit for the Examination stated below. I satisfy all the conditions for this purpose under the Regulations. I undertake that I shall abide by all the decisions, rules, Regulations of the College. Any wrong information /non-compliance will render my candidature liable to be cancelled at any stage of the Examinations as will be decided by the College. Details are furnished below for your consideration.</td>
  </tr>
  <tr>
    <td colspan="3" class="four" style="text-align:justify;">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" class="four" style="text-align:justify;">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" class="four" style="text-align:justify;">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="37%" style="font-size:14px;"><strong>Examination : P.G. (Commerce)</strong></td>
    <td width="42%" align="center" style="font-size:14px;"><strong>Semester : (ie. I/II/III/IV)[<u>&nbsp;&nbsp;
	<?php foreach($sem_details as $semd) { echo $semd->sem.","; } ?>
    &nbsp;&nbsp;</u>]</strong>
    </td>
    <td width="21%" style="font-size:14px;"><strong>Year : <u>&nbsp;&nbsp;<?php echo date("Y");?>&nbsp;&nbsp;</u></strong></td>
  </tr>
</table>

    </td>
  </tr>
  <tr>
    <td colspan="3" class="four" style="text-align:justify;">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" class="four" style="text-align:justify;">NAME ( In Block Letters ) : <u>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $student->name; ?>&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
  </tr>
  <tr>
    <td colspan="3" class="four" style="text-align:justify;">Father's / Guardian's Name : <u>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $student->guardian_nm; ?>&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
  </tr>
  <tr>
    <td colspan="3" class="four" style="text-align:justify;">Relationship with Guardian :<u>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $student->relation; ?>&nbsp;&nbsp;&nbsp;&nbsp;</u>Sex :[M/F] <u>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $student->sex; ?>&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
  </tr>
  <tr>
    <td colspan="3" class="four" style="text-align:justify;">Mailing Address : <u>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $student->address; ?>&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
  </tr>
  
  <tr>
    <td colspan="3" class="four" style="text-align:justify;">Contact No.[1] Telephone : <u>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $student->landline; ?>&nbsp;&nbsp;&nbsp;&nbsp;</u> [2] Mobile : <u>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $student->phn; ?>&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
  </tr>
  <tr>
    <td colspan="3" class="four" style="text-align:justify;">C.U. Registration No. <u>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $student->cu_reg_no; ?>&nbsp;&nbsp;&nbsp;&nbsp;</u> Year : <u>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $yr; ?>&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
  </tr>
  <tr>
    <td colspan="3" class="four" style="text-align:justify;">Papers Applied for examination (To be filled up for <em><strong>Back Papers only</strong></em> )</td>
  </tr>
  <tr>
    <td colspan="3">
    <table width="100%" border="1" cellspacing="0" cellpadding="0" style="text-align:center;">
  <tr>
    <td width="18%" rowspan="2">Semester</td>
    <td width="47%" rowspan="2">Paper Code No</td>
    <td colspan="2">Total No. of paper(s) applied for</td>
    </tr>
  <tr>
    <td width="17%">In figure</td>
    <td width="18%">In words</td>
  </tr>
  <?php foreach($sem_details as $semd) { 
  $sem= $semd->sem;
  $data['sub_details']=$this->application_form_model->sub_details($id,$sem);
  $data['cnt_sub']=$this->application_form_model->cnt_sub($id,$sem);
  ?>
  <tr>
    <td><?php if($semd->sem == "1st"){echo "I";}elseif($semd->sem == "2nd"){echo "II";}elseif($semd->sem == "3rd"){echo "III";}elseif($semd->sem == "4th"){echo "IV";}?></td>
    <td><?php foreach($data['sub_details'] as $sub_details) { echo $sub_details->paper_code.", ";}?></td>
    <td><?php foreach($data['cnt_sub'] as $cnt_sub) { echo $cnt_sub->cnt;}?></td>
    <td><?php foreach($data['cnt_sub'] as $cnt_sub) { if($cnt_sub->cnt == "1"){echo "ONE";}elseif($cnt_sub->cnt == "2"){echo "TWO";}elseif($cnt_sub->cnt == "3"){echo "THREE";}elseif($cnt_sub->cnt == "4"){echo "FOUR";}elseif($cnt_sub->cnt == "5"){echo "FIVE";}}?></td>
  </tr>
  
  <?php }?>
  
    </table>

    </td>
  </tr>
</table>
<table width="595" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td height="30" colspan="2" align="right"><span style="padding-right:50px;"><strong>Yours faithfully,</strong></span></td>
  </tr>
  <tr>
    <td height="50" colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right">.....................................................</td>
  </tr>
  <tr>
    <td width="37%">Date : ..........................................</td>
    <td width="63%" align="right">(Full Signature of the Candidate )</td>
  </tr>
</table>
<?php }?>
</body>
</html>
