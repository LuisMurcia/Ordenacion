<!DOCTYPE html>
<html>
    <head>
        <title>Algoritmos de ordenación</title>
    </head>

    <body style="text-align: center; margin: 0;">
        <?php
        /**
         * Función que crea array aleatorio
         * 
         * Con la función rand() generamos un entero y con la función array_push lo introducimos en la posición que pertoque en el array
         * 
         * @param int $long recibe por parámetro un entero con la longitud que tendrá el array generado 
         * @return array devuelve el array para que sea ordenado
         * 
         */
        function randArray($long) {

            $array = array();
            for ($i = 0; $i < $long; $i++) {
                $random = rand(-99, 99); //guarda 1 número aleatorio entre -99 y 99
                array_push($array, $random); //cada número aleatorio generado se incorpora al array
            }
            return $array;
        }
        /**
         * Impresión array desordenado
         * 
         * @param array $array
         */
        function impArray($array) {

            for ($i = 0; $i < count($array); $i++) {
                echo $array[$i] . "\n";
            }
            echo "<br>";
        }
        /**
         * Método de burbuja
         * 
         * Este método de ordenación es la versión mejoradav del bucle burbuja ya que mediante un bucle while
         * y una variable booleana evitará que se den más vueltas de las necesarias cuando ya se encuente ordenado el array
         * 
         * @param array $array recibe el array desordenado para ordenarlo
         * @return array devuelve el array ordenado
         */
        function burbuja($array) {

            $ended = false;
            while (!$ended) {
                $ended = true;

                for ($i = 1; $i < count($array); $i++) {
                    if ($array[$i] < $array[$i - 1]) {
                        $aux = $array[$i];
                        $array[$i] = $array[$i - 1];
                        $array[$i - 1] = $aux;
                        $ended = false;
                    }
                }
            }
            return $array;
        }
        /**
         * Método de intercambio
         * 
         * @param array $array recibe el array desordenado para ordenarlo
         * @return array devuelve el array ordenado
         */
        function intercambio($array) {

            for ($i = 0; $i < count($array) - 1; $i++) {

                for ($j = $i + 1; $j < count($array); $j++) {
                    if ($array[$i] > $array[$j]) {
                        $aux = $array[$i];
                        $array[$i] = $array[$j];
                        $array[$j] = $aux;
                    }
                }
            }
            return $array;
        }
        /**
         * Método de inserción directa
         * 
         * @param array $array recibe el array desordenado para ordenarlo
         * @return array devuelve el array ordenado
         */
        function insercionDirecta($array) {

            for ($i = 1; $i < count($array); $i++) {
                $aux = $array[$i];

                for ($j = $i - 1; $j >= 0 && $array[$j] > $aux; $j--) {
                    $array[$j + 1] = $array[$j];
                }
                $array[$j + 1] = $aux;
            }
            return $array;
        }
        /**
         * Impresión del array ordenado por el método burbuja
         * 
         * Modificamos la variable global de $array mediante "&"
         * 
         * @param array $array recibe el array ya ordenado por método burbuja
         */
        function impBurbuja(&$array) {
            $resultado = burbuja($array);
            for ($i = 0; $i < count($resultado); $i++) {
                echo $resultado[$i] . "\n";
            }
        }
        /**
         * Impresión del array ordenado por el método de intercambio
         * 
         * Modificamos la variable global de $array mediante "&"
         * 
         * @param array $array recibe el array ya ordenado por método el método de intercambio
         */
        function impIntercambio(&$array) {
            $resultado = intercambio($array);
            for ($i = 0; $i < count($resultado); $i++) {
                echo $resultado[$i] . "\n";
            }
        }
        /**
         * Impresión del array ordenado por el método de inserción directa
         * 
         * Modificamos la variable global de $array mediante "&"
         * 
         * @param array $array recibe el array ya ordenado por el método de inserción directa
         */
        function impInsercionDirecta(&$array) {
            $resultado = insercionDirecta($array);
            for ($i = 0; $i < count($resultado); $i++) {
                echo $resultado[$i] . "\n";
            }
        }
        ?>

        <div>
            <br>
            <h1>Métodos de ordenación</h1><hr>
            <form method="post">
                <h3><b>Matriz precargada</b></h3>
                <p>¿Cómo desea ordenarla?</p>
                <select name="opc">
                    <option></option>
                    <option value="opc1">Burbuja</option>
                    <option value="opc2">Intercambio</option>
                    <option value="opc3">Inserción directa</option>
                </select>
                <input type="submit" value="Ordena">
                <br>
                <?php
                $pre = array(8, 9, 3, 1, 4, 5, 6, 2, 7);
                if (isset($_POST['opc'])) {
                    echo "<br>Array desordenado: ";
                    for ($i = 0; $i < count($pre); $i++) {
                        echo $pre[$i] . "\n";
                    }
                    if ('opc1' == $_POST['opc']) {
                        echo "<br><br>Burbuja: ";
                        impBurbuja($pre);
                    }

                    if ('opc2' == $_POST['opc']) {
                        echo "<br><br>Intercambio: ";
                        impIntercambio($pre);
                    }

                    if ('opc3' == $_POST['opc']) {
                        echo "<br><br>Inserción directa: ";
                        impInsercionDirecta($pre);
                    }
                }
                ?>
            </form><br><hr>

            <form method="post">
                <h3><b>Matriz generada aleatoriamente</b></h3>
                <p>Introduzca la longitud del array que desee y elija el método para ordenarlo:</p>
                <input type="number" min="5" max="25" name="longitud">
                <select name="opcion">
                    <option></option>
                    <option value="opcion1">Burbuja</option>
                    <option value="opcion2">Intercambio</option>
                    <option value="opcion3">Inserción directa</option>
                </select>
                <input type="submit" value="Ordena">
            </form><br>
            <?php
            if (isset($_POST['longitud'])) {

                $random = randArray($_POST['longitud']);
                echo "Array desordenado: ";
                impArray($random);

                if ('opcion1' == $_POST['opcion']) {
                    echo "<br>Burbuja: ";
                    impBurbuja($random);
                }

                if ('opcion2' == $_POST['opcion']) {
                    echo "<br>Intercambio: ";
                    impIntercambio($random);
                }

                if ('opcion3' == $_POST['opcion']) {
                    echo "<br>Inserción directa: ";
                    impInsercionDirecta($random);
                }
            }
            ?>
        </div>
    </body>
</html>