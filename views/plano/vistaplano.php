
<a href="router.php?c=login&a=logout">Logout</a>

<br>

<table>
    <thead>
    <tr>
        <td>Chave</td>
        <td>Data</td>
        <td>Valor</td>
        <td>Dívida</td>
    </tr>
    </thead>
    <?php
    foreach($matrizPrest as $key => $prestacao)
    {
        ?>
        <tr>
            <td><?=$key?></td>
            <td><?=($prestacao['data']->isoFormat('DD/MM/YYYY'))?></td>
            <td><?=round($prestacao['valor'],2)?></td>
            <td><?=round($prestacao['divida'],2)?></td>
        </tr>
        <?php
    }


    ?>
</table>
