<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Marksheet</title>

<style>
	.page_a4_body
	{
		width:767px;
		height:1122px;
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
	
</style>
</head>

<body>
	<div class="page_a4_body" align="center">
   	  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="my_table" bordercolor="#FFFFFF">
          <tr>
            <td width="26%" height="36">
            	<table width="100%" border="1" cellspacing="0" cellpadding="0" bordercolor="#333333">
                  <tr>
                    <td height="22">College Reference No.</td>
                  </tr>
                  <tr>
                    <td height="22"><?php echo $clg_ref_no;?></td>
                  </tr>
                </table>

            </td>
            <td width="49%" align="center">
            	<img src="<?php echo base_url()?>/images/logo1.png" />
            </td>
            <td width="25%">
            	<table width="100%" border="1" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="41%" rowspan="2">Serial No.</td>
                    <td width="59%" height="22">PG/C/P.R</td>
                  </tr>
                  <tr>
                    <td height="22"><?php echo $sr_no;?></td>
                  </tr>
                </table>
            </td>
          </tr>
    	</table>
        
        <h2 style="margin:0px; margin-bottom:10px;">SHIBPUR DINOBANDHOO INSTITUTION (COLLEGE)</h2>
        <p style="margin-bottom:5px;">(Accredited by NAAC)<br />
        412/1, G.T. ROAD (SOUTH), SHIBPUR, HOWRAH-2<br />
        Affilated to</p>
        <img src="<?php echo base_url()?>/images/cu_logo.jpg" />
        <h2 style="margin:0px;">UNIVERSITY OF CALCUTTA</h2>
      <h3 style="margin:0px;">MASTER OF COMMERCE <?php echo strtoupper($sem);?> SEMESTER EXAMINATION : <?php if(($sem=='1st')||($sem=='3rd')){echo 'FEBRUARY';}else{echo 'AUGUST';}?>, <?php echo $year_exam?><br />IN ACCOUNTING AND FINANCE</h3>
        <br />
        <?php foreach($student_details as $student) { ?>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td colspan="3">The following is the statement of marks obtained by <?php echo $student->name; ?></td>
          </tr>
          <tr>
            <td width="13%">ROLL : <?php echo $student->roll; ?></td>
            <td width="21%">No. <?php echo $student->no; ?></td>
            <td width="66%">Registration No : <?php echo $student->cu_reg_no; ?></td>
          </tr>
          <tr>
            <td colspan="3">at the aforesaid Examination Held in <strong><?php if(($sem=='1st')||($sem=='3rd')){echo 'FEBRUARY';}else{echo 'AUGUST';}?>, <?php  echo $year;  ?></strong></td>
          </tr>
        </table>
        <?php }?>
        <br />
        
        <table width="100%" border="1" cellspacing="0" cellpadding="2" class="my_table">
          <tr>
            <td width="6%" rowspan="2">PAPER No.</td>
            <td width="37%" rowspan="2">PAPER TITTLE</td>
            <td colspan="2">THEORY</td>
            <td colspan="2">PRACTICAL</td>
            <td colspan="2">PAPER TOTAL</td>
            <td width="10%" rowspan="2">REMARKS</td>
          </tr>
          <tr>
            <td width="7%">Full Marks</td>
            <td width="10%">Marks Obtained</td>
            <td width="6%">Full Marks</td>
            <td width="9%">Marks Obtained</td>
            <td width="7%">Full Marks</td>
            <td width="8%">Marks Obtained</td>
          </tr>
          <?php foreach($result_details as $res) { ?>
          <tr>
            <td><?php echo $res->paper_code; ?></td>
            <td style="text-align:left; padding-left:5px;"><?php echo $res->paper_name; ?></td>
            <td><?php echo $res->paper_marks; ?></td>
            <td><?php if($res->is_absent==1){echo 'AB';}else{echo $res->total_marks;} ?></td>
            <td>--</td>
            <td>--</td>
            <td><?php echo $res->paper_marks; ?></td>
            <td><?php if($res->is_absent==1){echo 'AB';}else{echo $res->total_marks;} ?></td>
            <td><?php if($res->result_status=='NC'){echo $res->result_status;}?></td>
          </tr>
          <?php }?>
          <?php foreach($result_total as $result_total) { ?>
          <tr>
            <td colspan="6" align="right"> GRAND TOTAL :</td>
            <td>250</td>
            <td><?php echo $result_total->total; ?></td>
            <td><?php echo $result_status=$result_total->status; ?></td>
          </tr>
          <?php }?>
        </table>
        <h4 style="text-align:left; margin:0px; margin-top:10px; ">Q = > QUALIFIED <?php if($sem!=4){if($sem=='1st'){$new_sem='2nd';} else if($sem=='2nd'){$new_sem='3rd';}
	  else if($sem=='3rd'){$new_sem='4th';}echo strtoupper($new_sem)." FOR SEMESTER";}?> </h4>
      <P style="text-align:left;">Remarks:'N.C.' Denotes Not Cleared Paper/s<br />* A minimum of 35% marks to be obtained in each paper and 40% marks to be obtained in aggregate.</P>
    	<table width="100%" border="1" cellspacing="0" cellpadding="2" class="my_table">
          <tr>
            <td width="15%" rowspan="2">1st SEMESTER</td>
            <td width="15%" rowspan="2">2nd SEMESTER</td>
            <td width="15%" rowspan="2">3nd SEMESTER</td>
            <td width="15%" rowspan="2">4th SEMESTER</td>
            <td colspan="3">FINAL RESULT</td>
          </tr>
          <tr>
            <td width="14%">FULL MARKS</td>
            <td width="14%">MARKS OBTAINED</td>
            <td width="12%">CLASS</td>
          </tr>
          <tr>
          
            <td><?php echo $data['result1'] = $this->marksheet_model->result_i($id,'1st',$session);?></td>
            <td><?php if(($sem=='2nd')||($sem=='3rd')||($sem=='4th')){echo $data['result2'] = $this->marksheet_model->result_i($id,'2nd',$session);}?></td>
           	<td><?php if(($sem=='3rd')||($sem=='4th')){echo $data['result3'] = $this->marksheet_model->result_i($id,'3rd',$session);}?></td>
            <td><?php if(($sem=='4th')){echo $data['result4'] = $this->marksheet_model->result_i($id,'4th',$session);}?></td>
            <td>1000</td>
            <?php foreach($result_final as $result_final) { ?>
            <td><?php echo $result_final->marks; ?></td>
            <td><?php echo $result_final->grade; ?></td>
            <?php }?>
          </tr>
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
            <td width="67%">&nbsp;</td>
          </tr>
        </table>
        <p style="text-align:left; margin:10px 0px;">l- Denotes 1st class & Secured 60% & above.<br />
        ll- Denotes 2nd class & Secured below 60% but above 40%.</p>
    </div>
</body>
</html>
