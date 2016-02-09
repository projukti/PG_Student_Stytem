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
<title>Exam Notice</title>
<style>
.one {
	font-size:18px;
	padding:4px 0px 4px 0px;
}
.two {
	font-size:18px;
	padding:4px 0px 4px 0px;
}
.three {
	font-size:16px;
	padding-left:10px;
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
<table width="595" border="0" cellspacing="0" cellpadding="0" align="center">
<tr>
    <td colspan="2" class="three" style=" text-align:center; padding:0px;">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="text-align:center;">
  <tr>
    <td colspan="3">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="9%" rowspan="2"><img src="../../images/logo2.png" width="50" height="65"  /></td>
    <td width="91%" style="padding-left:0px; font-size:20px; text-align:left;">SHIBPUR DINOBUNDHOO INSTITUTION (COLLEGE)</td>
  </tr>
  <tr>
    <td width="91%" style="padding-left:0px; font-size:20px;">&nbsp;</td>
  </tr>
</table>

    
    
    </td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>ACCREDITED BY NAAC</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><strong>Post Graduate Section (Commerce)</strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><strong>Affiliated to University of Calcutta</strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>412/I G.T. Road (South)</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="173">&nbsp;</td>
    <td width="241">Howrah - 711102</td>
    <td width="181">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
    </tr>
    </table>

    </td>
  </tr>
  <tr>
    <td class="three" style=" text-align:justify; "><img src="../../images/telephone-512.png" width="18" height="18"  style="float:left;" />: 2688-0496</td>
    <td class="three" style=" text-align:justify; ">Website : www.sdbic.edu.in</td>
  </tr>
  <tr>
    <td class="three" style=" text-align:justify; ">Fax : 033-2688-0344</td>
    <td class="three" style="text-align:justify; ">E-mail : princidb@yahoo.com</td>
  </tr>
  <tr>
    <td width="357" class="three" style=" text-align:justify;">Ref No ......................................</td>
    <td width="238" class="three" style="text-align:justify;">Date : <?php echo date("d/m/Y");?></td>
  </tr>
<tr>
    <td colspan="2" class="one" style="text-decoration:underline; text-align:center; padding:0px; font-size:0px; height:1px; background:#000;">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="one" style="text-decoration:underline; text-align:center; padding:0px;  font-size:0px; height:1px; background:#000;">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="one" style="padding:0px; font-size:0px; height:2px;">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="one" style="text-decoration:underline; text-align:center; padding:0px; font-size:0px; height:1px; background:#000;">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="one" style="text-decoration:underline; text-align:center; padding:0px; font-size:0px; height:1px; background:#000;">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="one" style="text-decoration:underline; text-align:center;"><b>NOTICE</b></td>
  </tr>
  <tr>
    <td colspan="2" class="two" style="text-align:justify; font-size:18px; line-height:2;">The M.Com. Examination, <?php  echo date("F-Y",strtotime($dt1));  ?>, <?php if($sem=='O'){?>Semester-I and Semester -III<?php }else{?>Semester-II and Semester-IV<?php }?> will start on <?php  echo date('l, \t\h\e jS F, Y',strtotime($dt1));  ?>. <?php echo $msg;?> The Time Table for the examination is as follows :</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>

<table width="595" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000;" style="text-align:center;">

  <tr >
    <td width="141" class="one"><strong>Day &amp; Date</strong></td>
    <td width="147" class="one"><strong>Time</strong></td>
    <td width="141" class="one"><strong><?php if($sem=='O'){?>1st Semester<?php }else{?>2nd Semester<?php }?></strong></td>
    <td width="156" class="one"><strong><?php if($sem=='O'){?>3rd Semester<?php }else{?>4th Semester<?php }?></strong></td>
  </tr>
 <?php foreach($search_student as $student) { ?>
  <tr>
    <td class="two"><?php echo $student-> date;?><br />
      (<?php echo date("D", strtotime($student-> date));?>)      </td>
    <td class="two"><?php echo $student-> from_tm;?> to <?php echo $student-> to_tm;?></td>
    <td class="two"><?php if($student-> sem=='1st' || $student-> sem=='2nd'){?>Paper-<?php echo $student-> paper_code;}else{echo "X";}?></td>
    <td class="two"><?php if($student-> sem=='3rd' || $student-> sem=='4th'){?>Paper-<?php echo $student-> paper_code;}else{echo "X";}?></td>
  </tr>
  <?php }?>
  <!--<tr>
    <td class="two">28/08/2014<br />
      (THU)</td>
    <td class="two">2.00 p.m to 4.00 p.m</td>
    <td class="two">X</td>
    <td class="two">Paper-4.1</td>
  </tr>-->
</table>
<table width="595" border="0" cellspacing="0" cellpadding="0" align="center" style="text-align:center; font-size:18px;">
 <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="371">&nbsp;</td>
    <td width="224" rowspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><strong>Controller of Examinations</strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><strong>P.G. Section.</strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td rowspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
 
</table>

</body>
</html>
