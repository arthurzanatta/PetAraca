<?php
function busca($query, $dataType, $id, $adType) {
$mysqli = new mysqli('*********', '****', '', 'petaraca') or die('Erro ao conectar ao banco: ' . mysqli_error($mysqli));
$result = $mysqli->query($query);

while($fetch = $result->fetch_assoc()) {
    foreach($fetch as $field => $value) {
        if($dataType == 0) $value .= ' ';
        else if($dataType == 1){
            $array = explode("-", $value);
            $value = $array[1] . '/' . $array[0];
        }
        else if($dataType == 2) /*echo*/ $value = '<img class="img" src="img/' . $adType . '' . $id . '.jpg" width="100px" height="100px"></img>';
    }
}
mysqli_close($mysqli);
return $value;
}

function buscaDataAtual($query) {
$mysqli = new mysqli('*********', '****', '', 'petaraca') or die('Erro ao conectar ao banco: ' . mysqli_error($mysqli));
$result = $mysqli->query($query);

while($fetch = $result->fetch_assoc()) {
    foreach($fetch as $field => $value) {
        if($value != "") {
            $array = explode("-", $value);
            $value = $array[2] . '/' . $array[1] . '/' . $array[0];
        }
    }
}
mysqli_close($mysqli);
return $value;
}

function buscaNum($query) {
$mysqli = new mysqli('*********', '****', '', 'petaraca') or die('Erro ao conectar ao banco: ' . mysqli_error($mysqli));
$result = $mysqli->query($query);
$teste = 0;

while($fetch = $result->fetch_assoc()) {
    foreach($fetch as $field => $value) {
        $teste = $value;
    }
}
mysqli_close($mysqli);
return $teste;
}
?>