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
<title>Admit Card</title>

<style>
	@charset "utf-8";
/* CSS Document */

html, body, address, blockquote, div, dl, form, h1, h2, h3, h4, h5, h6, ol, p, pre, table, ul,
dd, dt, li, tbody, td, tfoot, th, thead, tr, button, del, ins, map, object,
a, abbr, acronym, b, bdo, big, br, cite, code, dfn, em, i, img, kbd, q, samp, small, span,
strong, sub, sup, tt, var, legend, fieldset, nav, header {
    margin: 0;
    padding: 0;
}
img, fieldset {
    border: 0;
}


/* set img max-width */
img {
    height: auto;
    box-sizing: border-box;
	border:none;
}
:focus{outline:0}

/* ie 8 img max-width */
@media \0screen {
  img { width: auto;}
}

/* set html5 elements to block */
article, aside, details, figcaption, figure, footer, header, hgroup, menu, nav, section {
    display: block;
}

/************************************************************************************
GENERAL STYLING
*************************************************************************************/
body {
    font-size:14px;
    word-wrap:break-word;
	font-family:Arial, Helvetica, sans-serif;
	
	

}
html, body {
   height: 100%;
}	


p {
    margin: 0 0 ;
    padding: 0;
}
a {
    text-decoration: none;
    outline: none;
}
a:hover {
    text-decoration: none;
}
small {
    font-size:12px;
}
em, i {
}
ul, ol {
    margin:0px;
    padding: 0;
}
li {
    margin:0;
    padding: 0;
}

h1, h2, h3, h4, h5, h6 {
    color: #333;
    text-shadow: 0 1px 1px rgba(0,0,0,.2);
}
h1 {
    font-size: 24px;
	font-weight:normal;
}
h2 {
    font-size: 20px;
}
h3 {
    font-size: 18px;
}
h4 {
    font-size: 14px;
}
h5 {
    font-size:12px;
}
h6 {
    font-size: 11px;
}
	.page_a4_body
	{
		width:767px;
		height:1000px;
/*		border:1px solid #ccc;*/
		box-sizing:border-box;
		margin:0px auto;
	}
	.my_table tr td
	{
		font-size:12px;
		text-align:center;
		border-collapse:collapse;
		
	}
	.header
	{
		width:100%;
		float:left;
		padding:10px 10px;
		width:100%;
		float:left;
		height:auto;
		box-sizing:border-box;
		
	}
	.header h4
	{
		font-size:16px;
	}
	.table_inner tr td
	{
		padding:5px 3px;
	}
footer_text {
	font-size: 12px;
}
footer_text {
	font-size: 10px;
}
.passport
{
	border:1px solid #333;
	width:100%;
	height:150px;
	float:left;
	box-sizing:border-box;
	padding:10px;
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
<a href="<?php echo base_url() . "index.php/admitcard_gen"; ?>"><input type="button" value="Back" style="font:bold 11px verdana;color:#FF0000;background-color:#FFFFFF;" /></a>
</div>

	<div class="page_a4_body" align="center">
   	  
      	<table width="100%" border="0" cellspacing="0" cellpadding="0" >
          <tr>
            <td width="23%" valign="top">
            <table width="100%" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
              <tr>
                <td height="77" colspan="2" align="center">Sl No. PG/C/Admit</td>
              </tr>
              <tr>
                <td width="50%" height="58" align="center"><?php  echo $year;  ?> / <?php  echo $sem;  ?></td>
                <td width="50%" align="center">50</td>
              </tr>
            </table>
            </td>
            <td width="55%" align="center" valign="top">
            	<div class="header">
           		  <img src="<?php echo base_url()?>/images/logo2.png"  style="margin-bottom:10px;"/>
                    
              		<h4>SIBPUR DINOBANDHOO INSTITUTION (COLLEGE)</h4>
                    
                	<p>Accredited by NAAC<br />
                    412/1, G.T. ROAD (South), SHIBPUR, HOWRAH-2<br />
                    Affiliated to</p>
                    
                  <img src="<?php echo base_url()?>/images/cu_logo.jpg" style="margin:5px 0px;"/>
              </div>
                
            </td>
            <td width="22%" align="center" valign="top">
            	<div class="passport">
            		<p>PASSPORT SIZE PHOTOGRAPH TO BE PASTED HERE</p>    	
                </div>
                        
            </td>
          </tr>
          <tr>
            <td colspan="3" align="center" valign="top">
            	<h2>UNIVERSITY OF CALCUTTA</h2>
                <h5>MASTER OF COMMERCE <?php  echo $sem;  ?> SEMESTER EXAMINATION : <?php  echo $year;  ?> IN ACCOUNTING AND FINANCE</h5>
            </td>
          </tr>
          <tr>
            <td colspan="3">&nbsp;</td>
          </tr>
          <tr>
            <td height="119" colspan="3" valign="top" class="table_inner">
            <?php foreach($student_details as $student) { ?>
            <table width="100%" border="1" cellspacing="0" cellpadding="10" style="border-collapse:collapse;">
              <tr>
                <td width="20%">NAME</td>
                <td colspan="2"><?php echo $student->name; ?></td>
                <td width="6%">Sex</td>
                <td width="6%"><?php echo $student->sex; ?></td>
              </tr>
              <tr>
                <td>GURDAINS NAME</td>
                <td colspan="4"><?php echo $student->guardian_nm; ?></td>
              </tr>
              <tr>
                <td>COLLEGE/ UNIVERSITY DEPT.</td>
                <td colspan="4">SHIBPUR DINOBANDHOO INSTITUTION (COLLEGE), HOWRAH-2</td>
              </tr>
              <tr>
                <td>C.U. Registration No.</td>
                <td colspan="4"><?php echo $student->cu_reg_no; ?></td>
              </tr>
              <tr>
                <td>College Ref. No.:</td>
                <td colspan="4"><?php echo $student->clg_ref_no; ?></td>
              </tr>
              <tr>
                <td>Roll: <strong><?php echo $student->roll; ?></strong></td>
                <td width="7%">No:</td>
                <td colspan="3"><strong><?php echo $student->no; ?></strong></td>
              </tr>
            </table>
            <?php }?>
            </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3">&nbsp;</td>
          </tr>
          <tr>
            <td height="19" colspan="3">&nbsp;</td>
          </tr>
          <tr>
            <td height="19" colspan="3"><p style="font-size:13px;">PROGRAMME OF <strong><?php  echo $sem;  ?> SEMESTER</strong> EXAMINATION : <?php  echo $year;  ?> MASTER OF COMMERCE IN ACCOUNTING AND FINNANCE</p></td>
          </tr>
          <tr>
            <td height="5" colspan="3">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3">
            <table width="100%" border="1" cellspacing="0" cellpadding="0" class="table_inner" style="border-collapse:collapse;">
              <tr>
                <td width="14%" rowspan="2" align="center" valign="middle">DATE</td>
                <td width="13%" rowspan="2" align="center" valign="middle">DAY</td>
                <td width="9%" rowspan="2" align="center" valign="middle">PAPER No.</td>
                <td width="32%" rowspan="2" align="center" valign="middle">PAPER TITLE</td>
                <td width="11%" rowspan="2" align="center" valign="middle">TIME</td>
                <td colspan="2" align="center" valign="middle">Ans Script Submitted</td>
              </tr>
              <tr>
                <td width="11%" align="center">A</td>
                <td width="10%" align="center">B</td>
              </tr>
              <?php foreach($exam_details as $exam) { 
			  
			  ?>
              <tr>
                <td align="center" valign="middle"><?php echo $exam->date; ?></td>
                <td align="center" valign="middle"><?php echo $exam->day; ?></td>
                <td align="center" valign="middle"><?php echo $exam->paper_code; ?></td>
                <td align="center" valign="middle"><?php echo $exam->paper_name; ?></td>
                <td align="center" valign="middle"><?php echo $exam->from_tm." to ".$exam->to_tm; ?></td>
                <td align="center" valign="middle">&nbsp;</td>
                <td align="center" valign="middle">&nbsp;</td>
              </tr>
              <?php }?>
            </table></td>
          </tr>
          <tr>
            <td height="19" colspan="3">&nbsp;</td>
          </tr>
          <tr>
            <td height="19" colspan="3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="29%" height="65" valign="bottom">Dated: <?php echo date("jS M, Y");?></td>
                <td width="43%">&nbsp;</td>
                <td width="28%" align="left" valign="bottom">
                	<img src="" />
                    <p>Controller of Examination</p>
                </td>
              </tr>
              <tr>
                <td height="16" colspan="3">&nbsp;</td>
              </tr>
              <tr>
                <td height="28" colspan="3"><p style="font-size:13px;">N.B. For Migrating Students This Admit crad is Provisional subject to sanction of Migration and Registration by the University.</p></td>
              </tr>
            </table></td>
          </tr>
	</table>


    </div>
  
</body>
</html>
