<?php

	if($_POST){
		
		$categoria = $_POST['categoria'];
		$wrapper->inserirCategoria($categoria);
		home();

	}

?>


<form method="post" autocomplete="off">
	<input type="text" name="categoria" required="required" autofocus="" placeholder="nova categoria">
	<button type="submit" title="adicionar"><i class="fas fa-check"></i></button>
</form>