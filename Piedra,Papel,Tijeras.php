<html>
<head>
<title></title>
</head>
<body>
<?php
define ('PIEDRA1',  "&#x1F91C;");
define ('PIEDRA2',  "&#x1F91B;");
define ('TIJERAS',  "&#x1F596;");
define ('PAPEL',    "&#x1F91A;" );
$j1 = valor(1);
$j2 = valor(2);

function valor($num) {
    $n = random_int(1, 3);
    if ($num == 1) {
       switch ($n) {
           case 1:
               return PIEDRA1;
               break;
           case 2:
               return TIJERAS;
               break;
           case 3:
               return PAPEL;
               break;
           default:
               ;
               break;
       }
   }else {
    switch ($n) {
        case 1:
            return PIEDRA2;
            break;
        case 2:
            return TIJERAS;
            break;
        case 3:
            return PAPEL;
            break;
        default:
            ;
            break;
    }
   }
}


function resultado($jug1,$jug2) {
    $resultado = 0;
    if ($jug1 == PIEDRA1 && $jug2 == TIJERAS) {
         $resultado = 1;
    } else{
        if ($jug1 == TIJERAS && $jug2 == PIEDRA2) {
         $resultado = 2;
        } else{
            if ($jug1 == PAPEL && $jug2 == PIEDRA2) {
            $resultado = 1;
            } else{
                if ($jug1 == PIEDRA1 && $jug2 == PAPEL) {
                $resultado = 2;
                } else{
                    if ($jug1 == TIJERAS && $jug2 == PAPEL) {
                    $resultado = 1;
                    } else{
                        if ($jug1 == PAPEL && $jug2 == TIJERAS) {
                        $resultado = 2;
                        }
                    }
                }   
            }
        }
    }
    return $resultado;
}

?>
<table>
		<tr>
			<th>Jugador1</th>
			<th>Jugador2</th>
		</tr>
		<tr>
			<td style="font-size:100px"><?php echo $j1 ?></td>
			<td style="font-size:100px"><?php echo $j2 ?></td>
		</tr>
		<tr>
		<th colspan = "2"><?php   if (resultado($j1,$j2)==0) {
        echo "Empate";
    } 
    if (resultado($j1,$j2)==1) {
        echo "Ha ganado el jugador 1";
    } 
    if (resultado($j1,$j2)==2) {
        echo "Ha gando el jugador 2";
    } 
    ?></th>
		</tr>
	</table>
</body>
</html>
