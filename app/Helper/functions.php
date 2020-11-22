<?php
function valorMensal($creditos){
	$valor = $creditos * 100.00;
	return 'R$'. number_format($valor,2,',','.');
}
function valorBolsista($creditos,$percentual){
	$valor = ($creditos * 100.00) - (($percentual / 100) * ($creditos * 100.00));
	return 'R$'. number_format($valor,2,',','.');
}
function valorBolsistaDB($creditos,$percentual){
	$valor = ($creditos * 100.00) - (($percentual / 100) * ($creditos * 100.00));
	return $valor;
}function valorMensalDB($creditos){
	$valor = $creditos * 100.00;
	return $valor;
}
function in_array_r($item , $array){
    return preg_match('/"'.preg_quote($item, '/').'"/i' , json_encode($array));
}
function moeda($x){
	$y = floatval($x);
	return 'R$'. number_format($y,2,',','.');
}
function tofloat($num) {
    $dotPos = strrpos($num, '.');
    $commaPos = strrpos($num, ',');
    $sep = (($dotPos > $commaPos) && $dotPos) ? $dotPos :
        ((($commaPos > $dotPos) && $commaPos) ? $commaPos : false);

    if (!$sep) {
        return floatval(preg_replace("/[^0-9]/", "", $num));
    }

    return floatval(
        preg_replace("/[^0-9]/", "", substr($num, 0, $sep)) . '.' .
        preg_replace("/[^0-9]/", "", substr($num, $sep+1, strlen($num)))
    );
}
function meses($x){
	if($x==1){
		$meses = ['03', '04', '05', '06', '07','08'];
	}else{
		$meses = ['09','10','11','12','01','02'];
	}
	return $meses;
}
function mes($m){
	switch($m){
		case "01":
			$mes = 'Jan';
			break;
		case "02":
			$mes = 'Fev';
			break;
		case "03":
			$mes = 'Mar';
			break;
		case "04":
			$mes = 'Abr';
			break;
		case "05":
			$mes = 'Mai';
			break;
		case "06":
			$mes = 'Jun';
			break;
		case "07":
			$mes = 'Jul';
			break;
		case "08":
			$mes = 'Ago';
			break;
		case "09":
			$mes = 'Set';
			break;
		case "10":
			$mes = 'Out';
			break;
		case "11":
			$mes = 'Nov';
			break;
		case "12":
			$mes = 'Dez';
			break;
	}
	return $mes;
}
function mes2($date){

	setlocale(LC_ALL, 'ptb');

	$format = date('d/M/Y', strtotime(str_replace('/', '-', $date)));

	return $format;
	return ucwords(strftime('%B', strtotime($format)));

}
function mask($val, $mask){
	$maskared = '';
	$k = 0;
	for($i = 0; $i<strlen($mask); $i++){
		if($mask[$i] == '#'){
			if(isset($val[$k]))
				$maskared .= $val[$k++];
		}
		else{
			if(isset($mask[$i]))
				$maskared .= $mask[$i];
		}
	}
	return $maskared;
}
function matriculaMask($x){
	// dd(str_split($x));
	$result = mask(str_split($x),"####.##.#.###");
	return $result;
}
function data($d){
	$data = new DateTime($d);

	return $data->format('d/m/Y');
}
?>
