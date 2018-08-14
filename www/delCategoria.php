<?php

	if (isset($_GET['id'])){

		$wrapper->deletarCategoria($_GET['id']);

	}

	home();