<!DOCTYPE html>
<html>
<head>
	<title>Métodos de ordenación</title>
</head>

<body style="text-align: center;">
	<?php
		//creamos un array de números aleatorios
		function randArray($long){

			$array = array();
			for ($i=0; $i < $long; $i++) { 
				$random = rand(-99,99); //guarda 1 número aleatorio entre -99 y 99
				array_push($array, $random); //cada número aleatorio generado se incorpora al array
			}
			return $array;
		}

		//imprimimos el array desordenado
		function impArray($array){

			for ($i=0; $i < count($array); $i++) { 
				echo $array[$i]."\n";
			}
			echo "<br>";
		}

		function burbuja($array){

			$ordenado = false;
			while(!$ordenado){
				$ordenado = true;
        	
		        for($i = 1; $i < count($array); $i++){
		            if($array[$i] < $array[$i-1])
		                $aux = $array[$i]; 
		                $array[$i] = $array[$i-1]; 
		                $array[$i-1] = $aux;
		                $ordenado = false;
            		}
        		}
    		}
    		return $array;
		}

		function intercambio($array){

		    for($i = 0; $i < count($array)-1; $i++){

		    	for($j = $i+1; $j < count($array); $j++){
		    		if($array[$i] > $array[$j]){
		    			$aux = $array[$i];
		    			$array[$i] = $array[$j];
		    			$array[$j] = $aux;
		    		}
		    	}
		    }
		    return $array;
		}

		function insercionDirecta($array){

			for($i = 1; $i < count($array); $i++){
				$aux = $array[$i];

				for($j = $i - 1; $j >= 0 && $array[$j] > $aux; $j--){
					$array[$j +1] = $array[$j];
				}
				$array[$j +1] = $aux;
			}
			return $array;
		}
		
		//impresión de los arrays ya ordenados mediante sus respectivos métodos
		function impBurbuja(&$array){
		    $resultado = burbuja($array);
		    for($i = 0; $i < count($resultado); $i++){
		        echo $resultado[$i]."\n";
		    }
		}
		function impIntercambio(&$array){
		   	$resultado = intercambio($array);
		    for($i = 0; $i < count($resultado); $i++){
		    	echo $resultado[$i]."\n";
		    }
		}
		function impInsercionDirecta(&$array){
		    $resultado = insercionDirecta($array);
		    for($i = 0; $i < count($resultado); $i++){
		    	echo $resultado[$i]."\n";
		    }
		}
	?>

	<div>
		<br>
		<h1>Métodos de ordenación</h1><hr>
		<form method="post">
			<p>Introduzca la longitud del array que desee y elija el método para ordenarlo:</p>
			<input type="number" min="5" max="25" name="longitud">
			<select name="opcion">
				<option></option>
				<option value="opcion1">Burbuja</option>
				<option value="opcion2">Intercambio</option>
				<option value="opcion3">Inserción directa</option>
			</select>
			<input type="submit" value="envia">
		</form><br><hr>

		<?php
			global $random;
			if(isset($_POST['longitud'])){

				$random = randArray($_POST['longitud']);
				echo "<br>Array desordenado: ";
				impArray($random);

				if('opcion1' == $_POST['opcion']){ 
					echo "<br>Burbuja: ";
					impBurbuja($random);
				} 

				else if('opcion2' == $_POST['opcion']){ 
					echo "<br>Intercambio: ";
					impIntercambio($random);
				} 

				else if('opcion3' == $_POST['opcion']){
					echo "<br>Inserción directa: ";
					impInsercionDirecta($random);
				}
			}
		?>
	</div>
</body>
</html>