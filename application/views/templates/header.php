<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PG Student Management System</title>

<link href="<?php echo base_url()?>/css/globalstyle.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url()?>/css/styles.css">
   <script src="<?php echo base_url()?>/js/jquery-latest.min.js" type="text/javascript"></script>
   <script src="<?php echo base_url()?>/js/script.js"></script>
   <!---------------------------------datepicker----------------------------------------->   
   <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>/datepicker/jsDatePick_ltr.min.css" />
<script type="text/javascript" src="<?php echo base_url()?>/datepicker/jsDatePick.min.1.3.js"></script>
<script type="text/javascript">
	window.onload = function(){
		new JsDatePick({
			useMode:2,
			target:"dob",
			dateFormat:"%d-%m-%Y"
		});
		
		new JsDatePick({
			useMode:2,
			target:"date",
			dateFormat:"%d-%m-%Y"
		});
		
		new JsDatePick({
			useMode:2,
			target:"resultdate",
			dateFormat:"%d-%m-%Y"
		});

	};
</script>
<!---------------------------------datepicker----------------------------------------->   
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/datepicker/jquery.datetimepicker.css"/>
 
<!------------------datetime------------------->
<?php 
$s1=mysql_fetch_array(mysql_query('select * from page_acess where id=1'));
$s2=mysql_fetch_array(mysql_query('select * from page_acess where id=2'));
$s3=mysql_fetch_array(mysql_query('select * from page_acess where id=3'));
?>   
</head>

<body>
	<div class="wrapper">
    	<div class="header">
        	<div class="top">
        		<a class="logo" href="">
            	<img src="<?php echo base_url()?>/images/logo.png" />
            </a>
            
            	<ul class="right_m">
            	<li>Welcome <?php echo $username; ?>!</li>
            	<li><a href="<?php echo base_url()?>index.php/home/logout">Logout</a></li>
            </ul>
            </div>
            <div class="menu">
            	<ul>
                	<li><a href="<?php echo base_url() . "index.php/home"?>">Home</a></li>
                    <?php if($access==1){?>
                    <li><a href="<?php echo base_url() . "index.php/editaccount"?>">Edit Account</a></li><?php }?>
                    <?php if($access==1){?>
                    <li><a href="<?php echo base_url() . "index.php/access"?>">Give Access</a></li><?php }?>
                    <li><a href="">Student</a>
                    	<ul class="menu_sub">
                        <?php if(($access==1)||($s1['block']=='0')){?>
                        	<li><a href="<?php echo base_url() . "index.php/addstudent"?>">Add Student</a></li><?php }?>
                            <li><a href="<?php echo base_url() . "index.php/viewstudent"?>">View & Search Student</a></li>
                        </ul>
                    </li>
                    <li><a href='#'><span>Exam</span></a>
                          <ul class="menu_sub">
                             <li><a href='<?php echo base_url() . "index.php/addexam"?>'>Create Exam</a></li>
                             <li><a href='<?php echo base_url() . "index.php/viewexam"?>'>View Exam</a></li>
                          </ul>
                       </li>
                       <?php if(($access==1)||($s2['block']=='0')){?>
                       <li><a href='<?php echo base_url() . "index.php/admitcard_gen"?>'>Admit Card Generation</a></li><?php }?>
                    <li><a href='<?php echo base_url() . "index.php/attendance"?>'>Eligibility Sheet Generation</a></li>
                   <li><a href='#'>Result</a>
                   <ul class="menu_sub">
                   <?php if(($access==1)||($s3['block']=='0')){?>
                             <li><a href='<?php echo base_url() . "index.php/result_gen"?>'>Generate Result</a></li><?php }?>
                             <li><a href='<?php echo base_url() . "index.php/result_search"?>'>Print Result Sheet</a></li>
                          </ul>
                   </li>
                    <li><a href='<?php echo base_url() . "index.php/certificate_gen"?>'>Certificate</a></li>     
                </ul>
            </div>
            
        </div>
