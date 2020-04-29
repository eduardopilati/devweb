<?php


include_once('index.php');


function random($string, $letras)
{
    for ($i = 0; $i < sizeof($letras); $i++) {
        $array = array();
        for ($j = 0; $j < sizeof($letras); $j++) {
            if ($i != $j) {
                $array[] = $letras[$j];
            }
        }

        random($string . $letras[$i], $array);
    }

    if (sizeof($letras) == 0) {
        echo $string . '<br />';
    }
}

if (isset($_POST['string'])) {
    $string = $_POST['string'];

    $letras = array();
    for ($i = 0; $i < strlen($string); $i++) {
        $letras[] = $string[$i];
    }

    random('', $letras);

?>
    <br />
    <a href="ex9.php">Voltar</a>
<?php
} else {
?>

    <form action='ex9.php' method='post'>
        <input type='text' name='string'>

        <input type="submit" value='Gerar'>
    </form>

<?php
}
?>