
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

<style type="text/css">

	@import url('https://fonts.googleapis.com/css?family=Roboto');

	*{
		font-family: 'Roboto', sans-serif;
	}

	body{
		width: 600px;
		margin: 20 auto;
		padding: 20px;
	}

	#rodape{
		position: fixed;
		bottom: 0px;
		right: 0px;
		font-size: 10px;
		margin-right: 12px;
	}

	a{
		color:#e11a1a;
		text-decoration: none;
	}

	.small{
		font-size: 18px;
	}

	.btn-table{
		float: right;
	}

	.btn-table i{
		margin-left: 10px;
	}

	table{
		border-collapse: collapse;
		margin-bottom: 30px;
		width: 100%;
	}

	table td, table th{
		border: 1px solid #ccc;
		padding: 10px;
	}

	table th{
		font-weight: bold;
	}

	form{
		width: 100%;
		box-sizing: border-box;
	}

	form input, form button{
		font-size: 18px;
	}

	form input{
		padding: 10px;
		border: 1px solid #ccc;
		border-radius: 5px;
		width: 92%;
	}

	form button{
		border: 1px solid #ccc;
		border-radius: 5px;
		background: white;
		padding: 12px;
		cursor: pointer;
		float: right;
	}

	form button:hover{
		background: #e11a1a;
		color:white;
	}

</style>


<body>

<?php

	include_once ("../autoload.php");

	use Turma3\Wrapper;

	function home(){
		header('Location:index.php');
	}

	$html = "<h1><a href='index.php' title='home'> <i class='fas fa-home'></i> trabalho php7</a><h1>";
	$html.= '<h1>Categorias ';
	$html.= "<a href='?op=cad' title='Adicionar Categoria'> <i class='far fa-plus-square'></i> </a>";
	$html.= '</h1>';

	echo $html;

	$wrapper = new Wrapper();

	/*

		INSERIR
		$wrapper->inserirCategoria('nova categoria');

		EDITAR
		$wrapper->editarCategoria('ID','novo nome');

		DELETAR
		$wrapper->deletarCategoria('ID');

		LISTAR
		$wrapper->listarCategoria();

	*/

	if (isset($_GET['op']))
	{
		switch ($_GET['op']) {
			case 'cad':
				include_once('addCategoria.php');
				break;
			case 'edi':
				include_once ('ediCategoria.php');
				break;
			case 'del':
				include_once ('delCategoria.php');
				break;
		}
	}

	$res = $wrapper->listarCategorias();

	$html = '<table>';
	if($res){
		foreach ($res as $key) {
			$html.= '<tr>';
				$html.= '<td> '.$key->nome;

				$html.="<span class='btn-table'>";

				$html.='<a href="?op=edi&id='.$key->id.'">';
				$html.="<i class='far fa-edit'>";
				$html.="</i>";
				$html.="</a>";				

				$html.='<a href="?op=del&id='.$key->id.'">';
				$html.="<i class='far fa-trash-alt'>";
				$html.="</i>";
				$html.="</a>";

				$html.="</span>";

				$html.='</td>';
			$html.= '</tr>';
		}
	}else{
		$html.='<tr>';
		$html.= '<td>Não contém dados</td>';
		$html.='</tr>';
	}
	$html.= '</table>';
	echo $html;

	

?>

<p id="rodape">
	Desenvolvimento: Gustavo Morini - Pós Alfa 2018
</p>

</body>