<?php 

define('DIVISOR', 45);


$cometas = array(
		'HALLEY',
		'ENCKE',
		'WOLF',
		'KUSHIDA',
		'LARANJA'
	);

$grupos = array(
		'AMARELO',
		'VERMELHO',
		'PRETO',
		'AZUL'
	);

//print_r($letras);
/*foreach($cometas as $cometa){
	$produto_letras = 1;
	for($i = 0; $i<strlen($cometa); $i++){
		$produto_letras *= array_search($cometa[$i], $letras)+1;
		
	}
	echo $produto_letras;
	echo '<br>';
}*/

print_r(calcularValores($grupos));
echo '<br><br><br> grupos<br><br><br>';
print_r(calcularValores($cometas));
echo '<br><br><br>Grupo = '. 6552%DIVISOR;
echo '<br>Cometa = '. 1264032%DIVISOR;
echo '<br><br><br><br> Resultado <br>';

$valores_grupos  = calcularValores($grupos);
$valores_cometas = calcularValores($cometas);

echo'<br> Grupo não levado: ' . $grupos[gruposNaoLevado(calcularValores($grupos), calcularValores($cometas))];


function calcularValores($palavras){
	$alfabeto = range('A', 'Z');
	$produto_letras = array();

	foreach($palavras as $key => $palavra){
		$produto_letras[$key] = 1;
		for($i = 0; $i<strlen($palavra); $i++){
			$produto_letras[$key] *= array_search($palavra[$i], $alfabeto)+1;
			
		}
	}

	return $produto_letras;
}


function gruposNaoLevado($grupos, $cometas){
	$grupos_nao_levado = array();
	for($i = 0; $i<sizeof($grupos); $i++){
		if(!verificarSeraLevado($grupos[$i], $cometas[$i])){
			$grupos_nao_levado[] = $i;
		}
	}

	return implode(', ', $grupos_nao_levado);
}

function verificarSeraLevado($grupo, $cometa){
	return ($grupo%DIVISOR == $cometa%DIVISOR ? true : false);
}




?>