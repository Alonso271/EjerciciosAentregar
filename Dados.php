<html>
<head>
<title></title>
</head>
<body>
<?php
define('uno',"&#9856;");
define('dos',"&#9857;");
define('tres',"&#9858;");
define('cuatro',"&#9859;");
define('cinco',"&#9860;");
define('seis',"&#9861;");
$cont=0;
$cont1=0;
$jugador1 = [NULL,NULL,NULL,NULL,NULL];
$jugador2 = [NULL,NULL,NULL,NULL,NULL];
$jugador3 = [NULL,NULL,NULL,NULL,NULL];
$jugador4 = [NULL,NULL,NULL,NULL,NULL];
$total1=0;
$total2=0;
while ($cont!=6) {
    $n = random_int(1, 6);
    valor($jugador1,1,$n);
    valor($jugador2,2,$n);
    $cont++;
}

while ($cont1!=6) {
    $n1 = random_int(1, 6);
    valor($jugador3,3,$n1);
    valor($jugador4,4,$n1);
    $cont1++;
}
calcularResultado($jugador1, $jugador3, $total1, $total2);
function calcularResultado($j1,$j2,&$n,&$m) {
    $menor1 = $j1[0];
    $mayor1 = 1 ;
    $menor2 = $j2[0];
    $mayor2 = 1 ;
    for ($i=0; $i < sizeof($j1); $i++ ){
        if ($menor1 > $j1[$i]) {
            $menor1 = $j1[$i];
        }
        if ($mayor1 < $j1[$i]) {
            $mayor1 = $j1[$i];
        }
        $n = $n +$j1[$i];
    }
    for ($h=0; $h < sizeof($j1); $h++ ){
        if ($menor2 > $j2[$h]) {
            $menor2 = $j2[$h];
        }
        if ($mayor2 < $j2[$h]) {
            $mayor2 = $j2[$h];
        }
        $m = $m + $j2[$h];
    }
    $n = $n-($menor1+$mayor1);
    $m = $m-($menor2+$mayor2);
}

function valor(&$j,$m,$n) {
    if ($m==1 || $m==3) {
        for ($i = 0; $i < sizeof($j); $i++) {
            if ($j[$i] == NULL) {
                $j[$i]=$n ;
                break;
            }
        }
 
    }
    if($m==2 || $m==4){
        for ($i = 0; $i < sizeof($j); $i++) {
            if ($j[$i]==NULL) {
                switch ($n) {
                    case 1:
                        $j[$i]=uno;
                        break;
                    case 2:
                        $j[$i]=dos;
                        break;
                    case 3:
                        $j[$i]=tres;
                        break;
                    case 4:
                        $j[$i]=cuatro;
                        break;
                    case 5:
                        $j[$i]=cinco;
                        break;
                    case 6:
                        $j[$i]=seis;
                        break;
                    default:
                        ;
                        break;
                };
                break;
            }
           
        }
        
    }
}
?>

<table>
		<tr>
			<th>Jugador1</th>
			<td  style="background-color:red; font-size:100px"><?php for ($i=0; $i < sizeof($jugador2); $i++ ){
             echo $jugador2[$i];
            }?></td>
			<th><?php echo $total1; ?></th>
		</tr>
		<tr>
		<th>Jugador2</th>
		<td style="background-color:blue; font-size:100px"><?php for ($i=0; $i < sizeof($jugador4); $i++ ){
        echo $jugador4[$i];
        }?></td>
        <th><?php echo $total2; ?></th>
		</tr>
	</table>
	<p><b>Resultado: </b><?php if ($total1>$total2) {
	    echo "ha ganado el jugador1";
	}
	if($total2>$total1){
	    echo "ha ganado el jugador2";
	}
	if ($total1==$total2){
	echo "empate"; 
	}?></p>
</body>
</html>
