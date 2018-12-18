<?php
function recorrerTabla($tabla){
    $salida = "";
    if(is_array($tabla)){
        if(count($tabla)>0){
        //Suponiendo que $tabla tiene al menos un renglón
        //Sacar el nombre de los campos o columnas
        $salida .= '<table class ="tabla" border="1">';
        $salida .= "<tr>";
        $renglon = $tabla[0];
        foreach($renglon as $campo=>$valor){
            $salida .= "<th> $campo </th>";
        }
        $salida .= "</tr>";
        //Sacar los renglones de la tabla
        foreach ($tabla as $renglon){
            $salida .= "<tr>";
            foreach($renglon as $campo=>$valor){
                $salida .= "<td> $valor </td>";
            }
            $salida .= "</tr>";
        }
        $salida .= "</table>";
    }
    return $salida;
 }}?>