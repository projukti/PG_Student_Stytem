<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LOGIN</title>
<link href="<?php echo base_url()?>/css/globalstyle.css" rel="stylesheet" type="text/css" />
<style>
body{
	background-image:url(<?php echo base_url()?>/images/background.jpg);
}
</style>
</head>

<body class="m_bg">
   <?php echo form_open('verifylogin'); ?>
	<div class="login_box">
    	<h3>Log In</h3>
        <div class="form_box">      	
                            
          <div class="form_row">
                            	<h5>Username</h5>
                                <input type="text" class="form_input" name="username"/>
                                <?php echo form_error('password'); ?>
                            </div>                  
                            
          <div class="form_row">
                            	<h5>Password</h5>
                                <input type="password" class="form_input" name="password"/>
                                <?php echo form_error('password'); ?>
                            </div>     
             
             <input type="submit" name="submit" value="LOGIN"  class="button"/>                                    
        </div>               	
    </div>
</body>
</html>