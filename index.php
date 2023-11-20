<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Examen Victor PHP</title>
</head>
<body>
    <?php
        $puntos_array = array() ;
        $nombre = $_POST["nombre"];
        $correo = $_POST["correo"];
        $puntos_media=0;
        


        function sumar_puntos($entrada) {

            $total = 0; 
        
           
            for ($i = 1; $i <=3; $i++) { 
                $puntaje = ($_POST["$entrada$i"]);
                
                if (is_numeric($puntaje) && $puntaje == (int)$puntaje) {
                    $total=$total+$puntaje;
                    
                } else {
                    $total = $total + 0;
                    
                }
            }
            return $total;
        }

        function total_puntos($entrada) {

            $total = 0; 
        
           
            for ($i = 1; $i <=12; $i++) { 
                $puntaje = ($_POST["$entrada$i"]);
                
                if (is_numeric($puntaje) && $puntaje == (int)$puntaje) {
                    $total=$total+$puntaje;
                    
                } else {
                    $total = $total + 0;
                    
                }
            }
            return $total;
        }

        

        function comprobar($nombre, $correo, $puntos) {

            # COMPROBAR LA VALIDEZ DEL CORREO #
            function correo($correo){
                if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                    $correcto_correo = 0;
                } else {
                    $correcto_correo = 1;
                    
                }
                return $correcto_correo;
            }

            # COMPROBAR LA VALIDEZ DEL NOMBRE #
            function nombre($nombre){
                if (preg_match("/^[a-zA-Z ]*$/", $nombre)) {
                    global $correcto_nombre;
                    $correcto_nombre = 0;
                } else {
                    $correcto_nombre = 1;
                }
                return $correcto_nombre;
            }

            function nota($puntos) {
                if (is_numeric($puntos) && $puntos == (int)$puntos or $puntos < 0) {
                    $correcto_puntos = 1;
                } else {
                    $correcto_puntos = 0;
                }
                return $correcto_puntos;
            }
            
            # QUE DEVUELVA EL VALOR DE CORRECTO SEGUN ESTEN TODOS LOS VALORES
            if ( correo($correo) == 0 and nombre($nombre) == 0 and nota($puntos) == 0 ) {
                $correcto = 0;
            } else {
                $correcto = 1;
            }
            return $correcto;
        }

        $comprobacion = comprobar($nombre, $correo, $puntos);
        $p = (sumar_puntos("pr"));
        $pt = (total_puntos("pr"));
        $media = $pt / 4;
        echo $media;
    ?>
    <h3>Calculadora de la liga</h3>
    <form action="index.php" method="post">
        <!-- #################### PROFESOR 1 ####################-->   
            <br>        
            <h4>Profesor 1</h4>
            <p><FONT COLOR="red"> * Requerido</FONT></p>
            <p>Nombre: <input type="text" name="nombre" value="<?php if ($comprobacion != 0) { echo $nombre; } ?>" placeholder="Ej: Jhon Doe"/><FONT COLOR="red"> *
                    <?php
                        if (nombre($nombre) != 0) {
                            echo "El nombre esta mal puesto";
                        } 
                    ?>
                </FONT>
            </p>
            <p>Correo: <input type="text" name="correo" value="<?php if ($comprobacion != 0) { echo $correo; } ?>" placeholder="Ej: ejemplo@ejemplo.com"/><FONT COLOR="red"> *
                    <?php
                        if (correo($correo) != 0) {
                            
                            echo "El correo esta mal puesto";
                        }
                    ?>
                </FONT>
            </p>
        
            <br>


            <p>Partida 1: <input type="text" name="pr1" value="<?php if ($comprobacion != 0) { echo $puntos; } else {echo "0";} ?>"><FONT COLOR="red"> *
            <?php
                $num_puntos = $_POST["pr1"];
                if (is_numeric($num_puntos) && $num_puntos == (int)$num_puntos or $num_puntos < 0) {
                    $null = 0;
                } else {
                    echo "Valor de nota incorrecto";
                    $comprobacion = 1;
                }
            ?>
            </FONT>
        </p>
        <p>Partida 2: <input type="text" name="pr2" value="<?php if ($comprobacion != 0) { echo $puntos; } else {echo "0";} ?>"><FONT COLOR="red"> *
        <?php
                $num_puntos = $_POST["pr2"];
                if (is_numeric($num_puntos) && $num_puntos == (int)$num_puntos or $num_puntos < 0) {
                    $null = 0;
                } else {
                    echo "Valor de nota incorrecto";
                    $comprobacion = 1;
                }
            ?>
            </FONT>
        </p>
        <p>Partida 3: <input type="text" name="pr3" value="<?php if ($comprobacion != 0) { echo $puntos; } else {echo "0";} ?>"><FONT COLOR="red"> *
        <?php
                $num_puntos = $_POST["pr3"];
                if (is_numeric($num_puntos) && $num_puntos == (int)$num_puntos or $num_puntos < 0) {
                    $null = 0;
                } else {
                    echo "Valor de nota incorrecto";
                    $comprobacion = 1;
                }
            ?>
            </FONT>
        </p>



        <br>   
        <!-- #################### PROFESOR 2 ####################-->     
            <h4>Profesor 2</h4>
            <p><FONT COLOR="red"> * Requerido</FONT></p>
            <p>Nombre: <input type="text" name="nombre" value="<?php if ($comprobacion != 0) { echo $nombre; } ?>" placeholder="Ej: Jhon Doe"/><FONT COLOR="red"> *
                    <?php
                        if (nombre($nombre) != 0) {
                            echo "El nombre esta mal puesto";
                        }
                    ?>
                </FONT>
            </p>
            <p>Correo: <input type="text" name="correo" value="<?php if ($comprobacion != 0) { echo $correo; } ?>" placeholder="Ej: ejemplo@ejemplo.com"/><FONT COLOR="red"> *
                    <?php
                        if (correo($correo) != 0) {
                            
                            echo "El correo esta mal puesto";
                        }
                    ?>
                </FONT>
            </p>
        
            <br>


            <p>Partida 1: <input type="text" name="pr4" value="<?php if ($comprobacion != 0) { echo $puntos; } else {echo "0";} ?>"><FONT COLOR="red"> *
            <?php
                $num_puntos = $_POST["pr4"];
                if (is_numeric($num_puntos) && $num_puntos == (int)$num_puntos or $num_puntos < 0) {
                    $null = 0;
                } else {
                    echo "Valor de nota incorrecto";
                    $comprobacion = 1;
                }
            ?>
            </FONT>
        </p>
        <p>Partida 2: <input type="text" name="pr5" value="<?php if ($comprobacion != 0) { echo $puntos; } else {echo "0";} ?>"><FONT COLOR="red"> *
        <?php
                $num_puntos = $_POST["pr5"];
                if (is_numeric($num_puntos) && $num_puntos == (int)$num_puntos or $num_puntos < 0) {
                    $null = 0;
                } else {
                    echo "Valor de nota incorrecto";
                    $comprobacion = 1;
                }
            ?>
            </FONT>
        </p>
        <p>Partida 3: <input type="text" name="pr6" value="<?php if ($comprobacion != 0) { echo $puntos; } else {echo "0";} ?>"><FONT COLOR="red"> *
        <?php
                $num_puntos = $_POST["pr6"];
                if (is_numeric($num_puntos) && $num_puntos == (int)$num_puntos or $num_puntos < 0) {
                    $null = 0;
                } else {
                    echo "Valor de nota incorrecto";
                    $comprobacion = 1;
                }
            ?>
            </FONT>
        </p>
        <br>      
        
        <!-- #################### PROFESOR 3 ####################-->   
            <h4>Profesor 3</h4>
            <p><FONT COLOR="red"> * Requerido</FONT></p>
            <p>Nombre: <input type="text" name="nombre" value="<?php if ($comprobacion != 0) { echo $nombre; } ?>" placeholder="Ej: Jhon Doe"/><FONT COLOR="red"> *
                    <?php
                        if (nombre($nombre) != 0) {
                            echo "El nombre esta mal puesto";
                        }
                    ?>
                </FONT>
            </p>
            <p>Correo: <input type="text" name="correo" value="<?php if ($comprobacion != 0) { echo $correo; } ?>" placeholder="Ej: ejemplo@ejemplo.com"/><FONT COLOR="red"> *
                    <?php
                        if (correo($correo) != 0) {
                            
                            echo "El correo esta mal puesto";
                        }
                    ?>
                </FONT>
            </p>
        
            <br>


            <p>Partida 1: <input type="text" name="pr7" value="<?php if ($comprobacion != 0) { echo $puntos; } else {echo "0";} ?>"><FONT COLOR="red"> *
            <?php
                $num_puntos = $_POST["pr7"];
                if (is_numeric($num_puntos) && $num_puntos == (int)$num_puntos or $num_puntos < 0) {
                    $null = 0;
                } else {
                    echo "Valor de nota incorrecto";
                    $comprobacion = 1;
                }
            ?>
            </FONT>
        </p>
        <p>Partida 2: <input type="text" name="pr8" value="<?php if ($comprobacion != 0) { echo $puntos; } else {echo "0";} ?>"><FONT COLOR="red"> *
        <?php
                $num_puntos = $_POST["pr8"];
                if (is_numeric($num_puntos) && $num_puntos == (int)$num_puntos or $num_puntos < 0) {
                    $null = 0;
                } else {
                    echo "Valor de nota incorrecto";
                    $comprobacion = 1;
                }
            ?>
            </FONT>
        </p>
        <p>Partida 3: <input type="text" name="pr9" value="<?php if ($comprobacion != 0) { echo $puntos; } else {echo "0";} ?>"><FONT COLOR="red"> *
        <?php
                $num_puntos = $_POST["pr9"];
                if (is_numeric($num_puntos) && $num_puntos == (int)$num_puntos or $num_puntos < 0) {
                    $null = 0;
                } else {
                    echo "Valor de nota incorrecto";
                    $comprobacion = 1;
                }
            ?>
            </FONT>
        </p>
        <br>    
        
        <!-- #################### PROFESOR 4 ####################-->   
            <h4>Profesor 4</h4>
            <p><FONT COLOR="red"> * Requerido</FONT></p>
            <p>Nombre: <input type="text" name="nombre" value="<?php if ($comprobacion != 0) { echo $nombre; } ?>" placeholder="Ej: Jhon Doe"/><FONT COLOR="red"> *
                    <?php
                        if (nombre($nombre) != 0) {
                            echo "El nombre esta mal puesto";
                        }
                    ?>
                </FONT>
            </p>
            <p>Correo: <input type="text" name="correo" value="<?php if ($comprobacion != 0) { echo $correo; } ?>" placeholder="Ej: ejemplo@ejemplo.com"/><FONT COLOR="red"> *
                    <?php
                        if (correo($correo) != 0) {
                            
                            echo "El correo esta mal puesto";
                        }
                    ?>
                </FONT>
            </p>
        
            <br>


            <p>Partida 1: <input type="text" name="pr10" value="<?php if ($comprobacion != 0) { echo $puntos; } else {echo "0";} ?>"><FONT COLOR="red"> *
            <?php
                $num_puntos = $_POST["pr10"];
                if (is_numeric($num_puntos) && $num_puntos == (int)$num_puntos or $num_puntos < 0) {
                    $null = 0;
                } else {
                    echo "Valor de nota incorrecto";
                    $comprobacion = 1;
                }
            ?>
            </FONT>
        </p>
        <p>Partida 2: <input type="text" name="pr11" value="<?php if ($comprobacion != 0) { echo $puntos; } else {echo "0";} ?>"><FONT COLOR="red"> *
        <?php
                $num_puntos = $_POST["pr11"];
                if (is_numeric($num_puntos) && $num_puntos == (int)$num_puntos or $num_puntos < 0) {
                    $null = 0;
                } else {
                    echo "Valor de nota incorrecto";
                    $comprobacion = 1;
                }
            ?>
            </FONT>
        </p>
        <p>Partida 3: <input type="text" name="pr12" value="<?php if ($comprobacion != 0) { echo $puntos; } else {echo "0";} ?>"><FONT COLOR="red"> *
        <?php
                $num_puntos = $_POST["pr12"];
                if (is_numeric($num_puntos) && $num_puntos == (int)$num_puntos or $num_puntos < 0) {
                    $null = 0;
                } else {
                    echo "Valor de nota incorrecto";
                    $comprobacion = 1;
                }
            ?>
            </FONT>
        </p>
        
        
        <p><input type="submit" value="CALCULAR LIGA"/></p>
    </form>

    <?php
    
    echo "Puntuacion Media: $media"
    

    ?>
  
 
</body>
</html>
