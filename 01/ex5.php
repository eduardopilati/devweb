<?php

include_once('index.php');


if (isset($_POST['value'])) {
    $value = $_POST['value'];

    for ($i = 0; $i <= $value; $i++) {
        echo $i;
        echo '<br/>';
    }
?>
    <br />
    <a href="ex5.php">Voltar</a>
<?php
} else {
?>

    <form action='ex5.php' method='post'>
        <input type='number' name='value'>
        <br />
        <input type="submit" value='Gerar'>
    </form>

<?php
}
?>