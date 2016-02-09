<select name="select" onChange="getstatedetails(this.value)">
<option value="" selected="selected" >Select State</option>
<?php foreach($state as $stt): ?>
<option value="<?php echo $stt->state_id; ?>"><?php echo $stt->state_name; ?></option>
<?php endforeach; ?> 
</select> 
