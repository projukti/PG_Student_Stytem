  </div>
</body>
<!--------------------------------------time-picker------------------------------------->


<script type="text/javascript" src="<?php echo base_url()?>/datepicker/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>/datepicker/jquery.datetimepicker.js"></script>
<script type="text/javascript">
/*$('#datetimepicker').datetimepicker()
	.datetimepicker({value:'2015/04/15 05:03',step:10});

$('#datetimepicker_mask').datetimepicker({
	mask:'9999/19/39 29:59'
});*/

$('#from_tm').datetimepicker({
	datepicker:false,
	format:'H:i',
	step:5
});

$('#to_tm').datetimepicker({
	datepicker:false,
	format:'H:i',
	step:5
});

</script> 
<!--------------------------------------time-picker------------------------------------->
</html>