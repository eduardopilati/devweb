<?php

include_once('index.php');


if (isset($_POST['values'])) {
    $values = $_POST['values'];
    sort($values);

    $a = $values[0];
    $b = $values[1];

    for ($i = $a + 1; $i < $b; $i++) {
        echo $i;
        echo '<br />';
    }

?>
    <br />
    <a href="ex7.php">Voltar</a>
<?php
} else {
?>

    <form action='ex7.php' method='post'>
        <input type='number' step='any' name='values[]'>
        <input type='number' step='any' name='values[]'>

        <input type="submit" value='Gerar'>
    </form>

<?php
}
?>