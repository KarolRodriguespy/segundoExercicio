<?php
header("Content-type: text/html; charset=utf-8");

$string = 'Banana';
die($string[3]);

function utf8_strtr($str, $from, $to) {
    $keys = array();
    $values = array();
    preg_match_all('/./u', $from, $keys);
    preg_match_all('/./u', $to, $values);
    $mapping = array_combine($keys[0], $values[0]);
    return strtr($str, $mapping);
}

function retornarQuantidadeVogais ($texto) {

$from = "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ";
$to = "aaaaeeiooouucAAAAEEIOOOUUC";

$vogais = array('a', 'e', 'i', 'o', 'u');
$palavra= strtolower(utf8_strtr($texto, $from, $to));
$count= 0;

    for ($i = 0; $i < mb_strlen($palavra, 'UTF-8');$i++){
      //if (in_array($palavra[$i],$vogais)){
          //echo $palavra[$i];
    //}
        for ($j = 0; $j < count($vogais); $j++){
            if ($palavra[$i] == $vogais[$j]){
                $count++;
                break;
            }
        }
    }

    return $count;
}

if(isset($_POST['texto'])){
    $palavra = ($_POST['texto']);

echo retornarQuantidadeVogais ($palavra);
}

?>



<form method = "POST">
<input name = "texto" type= "text">
<input type ="submit">
</form>
