<?php

include_once('index.php');


if (isset($_POST['string'])) {
    $string = $_POST['string'];

    for ($i = strlen($string) - 1; $i >= 0; $i--) {
        echo $string[$i];
    }

?>
    <br />
    <a href="ex10.php">Voltar</a>
<?php
} else {
?>

    <form action='ex10.php' method='post'>
        <input type='number' step='any' name='string'>

        <input type="submit" value='Gerar'>
    </form>

<?php
}
?>