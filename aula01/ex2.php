<?php

include_once('index.php');


if (isset($_POST['values'])) {
    $values = $_POST['values'];

    $sum = 0;

    foreach ($values as $value) {
        $sum += $value;
    }

    $mean = $sum / 4;

    if ($mean >= 7) {
        echo 'Aprovado';
    } else if ($mean >= 5) {
        echo 'Recuperação, aluno precisa tirar ' . (10 - $mean) . ' para passar';
    } else {
        echo 'Reprovado';
    }
?>
    <br />
    <a href="ex2.php">Voltar</a>
<?php
} else {
?>

    <form action='ex2.php' method='post'>
        <?php
        for ($i = 0; $i < 4; $i++) {
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