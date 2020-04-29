<?php

include_once('index.php');


if (isset($_POST['gasolina']) && isset($_POST['alcool'])) {
    $gasolina = $_POST['gasolina'];
    $alcool = $_POST['alcool'];

    if ($gasolina * .7 > $alcool) {
        echo 'Abasteça com Alcool';
    } else {
        echo 'Abasteça com Gasolina';
    }
?>
    <br />
    <a href="ex3.php">Voltar</a>
<?php
} else {
?>

    <form action='ex3.php' method='post'>

        <label>Valor da Gasolina:</label>
        <input type='number' step='any' name='gasolina'>
        <br />
        <label>Valor do Alcool:</label>
        <input type='number' step='any' name='alcool'>


        <input type="submit" value='Gerar'>
    </form>

<?php
}
?>