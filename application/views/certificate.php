<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Certificate</title>
<link href='http://fonts.googleapis.com/css?family=Oswald:700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Tangerine:700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Marck+Script' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Cantata+One' rel='stylesheet' type='text/css'>
<style>
	.page_a4_body
	{
		width:767px;
		height:1101px;
		border:1px solid #ccc;
		box-sizing:border-box;
		margin:0px auto;
		background:url(<?php echo base_url()?>/images/cu.jpg) no-repeat;
		background-size:100% auto;
	}
	.my_table tr td
	{
		font-size:12px;
		text-align:center;
		
		
	}
	.bt
	{
		width:100%;
		float:left;
		border-top:1px dashed #333333;
		padding-top:10px;
		text-align:center;
	}
	.bb
	{
		width:100%;
		float:left;
		border-bottom:1px dashed #333333;
		padding-top:10px;
		text-align:center;
	}
	.cer_con
	{
		width:100%;
		float:left;
		margin-top:290px;
		margin-bottom:70px
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

<?php foreach($student_details as $student) { ?>
	<div class="page_a4_body" align="center">
   	  <p style="margin:0px; float:right;font-family: 'Crimson Text', serif;">
      	Code:<?php echo $student->clg_ref_no; ?>
      </p>
      <div class="cer_con">
      <h3 style="font-size:24px;"> This is to certify that <span style="font-size:55px; font-weight:bold; font-family:'Tangerine', cursive; text-transform:capitalize !important; padding-left:10px; text-shadow:0 0 1px #000;"> <?php echo strtolower($student->name); ?></span><br /> <br />obtained the degree of </h3>
      
      <h1 style="font-size:38px;">MASTER OF COMMERCE</h1>
      <h3  style="font-size:24px">Under Semester System in the year <?php echo $student->year; ?> from</h3>

      <h2 style="font-size:36px;font-family: 'Oswald', sans-serif;"><strong>SHIBPUR DINOBUNDHOO INSTITUTION [COLLEGE]</strong></h2>
      <h3  style="font-size:24px">Affiliated to this University<br /><br />the special branch in which he/ she was examined having been</h3>
      <h2 style="font-size:60px;font-family:'Tangerine', cursive;">Accounting & Finance</h2>
      <h3 style="font-size:24px">and that he/she was placed in the <?php echo $student->grade; ?></h3>
      </div>
      
      
      <table width="100%" border="0" cellspacing="0" cellpadding="0" >
          <tr>
            <td align="left"><h3  style="font-size:15px">Senate House<br />The 30th November,2012</h3></td>
            <td align="right"><h3  style="font-size:15px">Vice-Chancellor</h3></td>
        </tr>
      </table>
<?php }?>
    </div>
</body>
</html>
