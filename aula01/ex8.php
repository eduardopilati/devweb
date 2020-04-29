<?php


include_once('index.php');


function tirarAcentos($string)
{
    return preg_replace(array("/(á|à|ã|â|ä)/", "/(Á|À|Ã|Â|Ä)/", "/(é|è|ê|ë)/", "/(É|È|Ê|Ë)/", "/(í|ì|î|ï)/", "/(Í|Ì|Î|Ï)/", "/(ó|ò|õ|ô|ö)/", "/(Ó|Ò|Õ|Ô|Ö)/", "/(ú|ù|û|ü)/", "/(Ú|Ù|Û|Ü)/", "/(ñ)/", "/(Ñ)/", "/(ç)/", "/(Ç)/"), explode(" ", "a A e E i I o O u U n N c C"), $string);
}
if (isset($_FILES['file']['tmp_name'])) {
    $file = fopen($_FILES['file']['tmp_name'], 'r');
    $array = array();

    foreach (range('a', 'z') as $l) {
        $array[$l] = 0;
    }

    while (($char = fgetc($file)) != false) {
        $char = strtolower(tirarAcentos($char));
        if (array_key_exists($char, $array)) {
            $array[$char]++;
        }
    }

    foreach ($array as $k => $v) {
        echo $k . ' => ' . $v . '<br/>';
    }
?>
    <br />
    <a href="ex8.php">Voltar</a>
<?php
} else {
?>

    <form action='ex8.php' method='post' enctype="multipart/form-data">
        <input type="file" name='file'>
        <input type="submit" value='Gerar'>
    </form>

<?php
}
?>