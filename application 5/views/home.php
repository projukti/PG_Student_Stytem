<script type="text/javascript" src="http://ajax.googleapis.com/ajax/
libs/jquery/1.3.0/jquery.min.js"></script>
<script type="text/javascript">
var auto_refresh = setInterval(
function ()
{
$('#load').load('home.php').fadeIn("slow");
}, 100); // refresh every 10000 milliseconds
</script>
        	
            <div class="main_body">
        	
            <div class="main_container">
                	<div class="container" style="height:480px; vertical-align:central;" align="center">
                    
                		<h2>WELCOME  <?php echo strtoupper($username); ?></h2>
                        <h3 id="load">Current Date/Time: <?php date_default_timezone_set("Asia/Kolkata");  echo date('d M Y H:i:s A');?></h3>
                        <h3>Current Session:
                          <?php 
						  $selectsession=mysql_fetch_array(mysql_query('select * from session where active=1'));
						  echo $selectsession['session_yr'];?>
                        </h3>
                    
                    </div>
                </div>
        </div>


