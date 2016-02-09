<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Marksheet Final</title>

<style>
	.page_a4_body
	{
		width:767px;
		height:1022px;
		/*border:1px solid #ccc;*/
		box-sizing:border-box;
		margin:0px auto;
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
	.txt
	{
		text-align:left;
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
   	  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="my_table" bordercolor="#FFFFFF">
          <tr>
            <td width="26%" height="36">
            	<table width="100%" border="1" cellspacing="0" cellpadding="0" bordercolor="#333333">
                  <tr>
                    <td height="22">Colege Reference No.</td>
                  </tr>
                  <tr>
                    <td height="22"><?php echo $clg_ref_no;?></td>
                  </tr>
                </table>

            </td>
            <td width="49%" align="center">
            	<img src="<?php echo base_url()?>/images/logo1.png" />
            </td>
            <td width="25%">&nbsp;</td>
          </tr>
    	</table>
        
        <h2 style="margin:0px; margin-bottom:10px;">SHIBPUR DINOBANDHOO INSTITUTION (COLLEGE)</h2>
        <p style="margin-bottom:5px;">(Accredited by NAAC)<br />
        412/1, G.T. ROAD (SOUTH), SHIBPUR, HOWRAH-2<br />
        Affilated to</p>
        <img src="<?php echo base_url()?>/images/cu_logo.jpg" />
        <h2 style="margin:0px;">UNIVERSITY OF CALCUTTA IN ACCOUNTING AND FINANCE</h2>
        <br />
        <?php foreach($student_details as $student) { ?>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td colspan="2">The following is the statement of marks obtained by <?php echo $student->name; ?></td>
          </tr>
          <tr>
            <td width="46%">Registration No : <?php echo $student->cu_reg_no; ?></td>
            <td width="54%">At the final semester held in 
			<?php 
			$sel=mysql_fetch_array(mysql_query("select * from result where id='".$student->id."' order by id desc"));
			$sem=$sel['sem'];
			if(($sem=='1st')||($sem=='3rd')){echo 'FEBRUARY';}else{echo 'AUGUST';}
			echo ",";
			foreach($result_final as $resultfinal) { echo $resultfinal->year;}
			?></td>
          </tr>
        </table>
        <?php }?>
        <br />
        
      <table width="100%" border="1" cellspacing="0" cellpadding="2" class="my_table">
          <tr>
            <td width="13%">SEMESTER</td>
            <td width="55%">PAPER TITTLE</td>
            <td width="16%">Full Marks</td>
            <td width="16%">Marks Obtained</td>
          </tr>
          <?php //foreach($result_details1 as $res1) { ?>
          <tr>
            <td rowspan="6" valign="top">1st</td>
            <td style="text-align:left;">Organisational Behaviour</td>
            <td>50</td>
            <td><?php echo $this->marksheet_final_model->result_semi($id,'1','1st');?></td>
          </tr>
		  <?php //}?>
          <tr>
            <td style="text-align:left;">Advanced Economic Analysis</td>
            <td>50</td>
            <td><?php echo $this->marksheet_final_model->result_semi($id,'2','1st');?></td>
          </tr>
          <tr>
            <td style="text-align:left;">Statistical Analysis for Business Decisions</td>
            <td>50</td>
            <td ><?php echo $this->marksheet_final_model->result_semi($id,'3','1st');?></td>
          </tr>
          <tr>
            <td style="text-align:left;">Corporate Financial Accounting And Reporting</td>
            <td>50</td>
            <td><?php echo $this->marksheet_final_model->result_semi($id,'4','1st');?></td>
          </tr>
          <tr>
            <td style="text-align:left;">Strategic Financial Management</td>
            <td>50</td>
            <td><?php echo $this->marksheet_final_model->result_semi($id,'5','1st');?></td>
          </tr>
          
          <tr>
            <td style="text-align:right;"><strong>1ST SEMESTER TOTAL:</strong></td>
            <td>250</td>
            <td><?php echo $this->marksheet_final_model->result_i($id,'1st');?></td>
          </tr>
          <tr>
            <td rowspan="6" valign="top">2nd</td>
            <td style="text-align:left;">Marketing Management and Human Resource Management</td>
            <td>50</td>
            <td><?php echo $this->marksheet_final_model->result_semi($id,'6','2nd');?></td>
          </tr>
          <tr>
            <td style="text-align:left;">Strategic and Operations Management</td>
            <td>50</td>
            <td><?php echo $this->marksheet_final_model->result_semi($id,'7','2nd');?></td>
          </tr>
          <tr>
            <td style="text-align:left;">Advanced Cost &amp; Management Accounting</td>
            <td>50</td>
            <td><?php echo $this->marksheet_final_model->result_semi($id,'8','2nd');?></td>
          </tr>
          <tr>
            <td style="text-align:left;">Operations Research</td>
            <td>50</td>
            <td><?php echo $this->marksheet_final_model->result_semi($id,'9','2nd');?></td>
          </tr>
          <tr>
            <td style="text-align:left;">Computer Applications in Business</td>
            <td>50</td>
            <td><?php echo $this->marksheet_final_model->result_semi($id,'10','2nd');?></td>
          </tr>
          <tr>
            <td style="text-align:right;"><strong>2ND SEMESTER TOTAL:</strong></td>
            <td>250</td>
            <td><?php echo $this->marksheet_final_model->result_i($id,'2nd');?></td>
          </tr>
          <tr>
            <td rowspan="6" valign="top">3rd</td>
            <td style="text-align:left;">Information System Management and E-Commerce</td>
            <td>50</td>
            <td><?php echo $this->marksheet_final_model->result_semi($id,'11','3rd');?></td>
          </tr>
          <tr>
            <td style="text-align:left;">Business Ethics and Corporate Governance</td>
            <td>50</td>
            <td><?php echo $this->marksheet_final_model->result_semi($id,'12','3rd');?></td>
          </tr>
          <tr>
            <td style="text-align:left;">Taxation for Business Decision Making</td>
            <td>50</td>
            <td><?php echo $this->marksheet_final_model->result_semi($id,'13','3rd');?></td>
          </tr>
          <tr>
            <td style="text-align:left;">Advanced Auditing &amp; Assurance Services</td>
            <td>50</td>
            <td><?php echo $this->marksheet_final_model->result_semi($id,'14','3rd');?></td>
          </tr>
          <tr>
            <td style="text-align:left;">Financial Institutions &amp; Market </td>
            <td>50</td>
            <td><?php echo $this->marksheet_final_model->result_semi($id,'15','3rd');?></td>
          </tr>
          <tr>
            <td style="text-align:right;"><strong>3RD SEMESTER TOTAL:</strong></td>
            <td>250</td>
            <td><?php echo $this->marksheet_final_model->result_i($id,'3rd');?></td>
          </tr>
          <tr>
            <td rowspan="5" valign="top">4th</td>
            <td style="text-align:left;">International Business</td>
            <td>50</td>
            <td><?php echo $this->marksheet_final_model->result_semi($id,'16','4th');?></td>
          </tr>
          <tr>
            <td style="text-align:left;">Securities Analysis &amp; Portfolio Management</td>
            <td>50</td>
            <td><?php echo $this->marksheet_final_model->result_semi($id,'17','4th');?></td>
          </tr>
          <tr>
            <td style="text-align:left;">Advanced Financial Statement Analysis</td>
            <td>50</td>
            <td><?php echo $this->marksheet_final_model->result_semi($id,'18','4th');?></td>
          </tr>
          <tr>
            <td style="text-align:left;">Research Methodology,Project Work(75) and Seminar Presentation(25)</td>
            <td>100</td>
            <td><?php echo $this->marksheet_final_model->result_semi($id,'19','4th');?></td>
          </tr>
          <tr>
            <td style="text-align:right;"><strong>4TH SEMESTER TOTAL</strong>:</td>
            <td>250</td>
            <td><?php echo $this->marksheet_final_model->result_i($id,'4th');?></td>
          </tr>
          
          <?php foreach($result_final as $result_final) { ?>
          <tr>
            <td colspan="3" align="right"> GRAND TOTAL :</td>
            <td><?php echo $result_final->marks; ?></td>
          </tr>
          <?php  }?>
        </table>
        <br /><br />
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="43%">
            <p class="bt">CONTROLLER OF EXAMINATIONS<BR />SHIBPUR DINOBANDHOO INSTITUTION(COLLEGE)</p>
            
            </td>
            <td width="14%">&nbsp;</td>
            <td width="43%"><p class="bt">PRINCIPAL <BR />SHIBPUR DINOBANDHOO INSTITUTION(COLLEGE)</p> </td>
          </tr>
        </table>
        
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="8%">Date -</td>
            <td width="25%"><p class="bb"></p></td>
            <td width="67%"><p style="text-align:right; margin:10px 0px;">l- Denotes 1st class & Secured 60% & above.<br />
        ll- Denotes 2nd class & Secured below 60% but above 40%.</p></td>
          </tr>
        </table>
        



</div>
</body>
</html>
