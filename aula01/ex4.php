<?php

include_once('index.php');


if (isset($_POST['altura']) && isset($_POST['sexo'])) {
    $altura = $_POST['altura'];
    $sexo = $_POST['sexo'];

    echo 'Peso ideal: ';
    if ($sexo == 'M') {
        echo (72.7 * $altura) - 58;
    } else {
        echo (62.1 * $altura) - 44;
    }

?>
    <br />
    <a href="ex4.php">Voltar</a>
<?php
} else {
?>

    <form action='ex4.php' method='post'>

        <label>Altura:</label>
        <input type='number' step='any' name='altura'>
        <br /><br />
        <label>Sexo:</label><br />
        Masculino: <input type="radio" name='sexo' value='M' checked> <br />
        Feminino: <input type="radio" name='sexo' value='F'>

        <br /><br />
        <input type="submit" value='Gerar'>
    </form>

<?php
}
?>