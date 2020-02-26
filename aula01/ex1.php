<?php

include_once('index.php');

if (isset($_POST['values'])) {
    $values = $_POST['values'];
    sort($values);

    foreach ($values as $value) {
        echo $value . '<br />';
    }

?>
    <br />
    <a href="ex1.php">Voltar</a>
<?php
} else {
?>

    <form action='ex1.php' method='post'>
        <?php
        for ($i = 0; $i < 5; $i++) {
        ?>
            <input type='number' step='any' name='values[]'>
        <?php
        }
        ?>

        <input type="submit" value='Gerar'>
    </form>

<?php
}
?>