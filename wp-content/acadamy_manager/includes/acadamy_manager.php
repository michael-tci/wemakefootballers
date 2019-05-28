<?php
class accadamy{
	
	public function addForm(){
		//die('accadamy');
	
		?>
		  <div class="add_form">
		  
		  	<form action=""  method="post">
		  	
		  		<div class="form_element">
		  			<label><?php print __('Name'); ?></label>
		  			<input type="text" name="name" required="true">
		  		</div>
		  		<div class="form_element">
		  			<label><?php print __('Address'); ?></label>
		  			<textarea name="address" rows="6" cols="50"></textarea>
		  		</div>
		  	
		  	</form>
		  
		  </div>
		
		
		<?php
		
	}
	
	
	
}