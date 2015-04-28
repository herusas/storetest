<?php
	if(isset($options) && is_array($options)){
		foreach($options as $key => $val)
			echo "<option value='$key'>$val</option>";
	}
?>