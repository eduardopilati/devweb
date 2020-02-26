<?php

include_once('index.php');


if (isset($_POST['value'])) {
    $value = $_POST['value'];

    $fat = 1;
    for ($i = $value; $i > 0; $i--) {
        $fat *= $i;
    }

    echo $fat;
?>
    <br />
    <a href="ex6.php">Voltar</a>
<?php
} else {
?>

    <form action='ex6.php' method='post'>
        <input type='number' name='value'>
        <br />
        <input type="submit" value='Gerar'>
    </form>

<?php
}
?>