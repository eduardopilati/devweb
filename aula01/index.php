<div>
    <b>Escolha um exercicio:</b>
    <br />
    <?php
    for ($i = 1; $i <= 10; $i++) {
        echo sprintf('<a href="ex%d.php">Ex %2d</a><br/>', $i, $i);
    }
    ?>
</div>
<hr />
<br />