<div class="content-wrapper">
    <form  action="router.php?c=iva&a=update&id=<?= $iva->id ?>" method="post">
        <div class="mb-3">
            <label for="percentagem" class="form-label">Percentagem</label>
            <input type="text" name="descricao" value="<?= $iva->percentagem ?>"></br>
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <input type="text" name="descricao" value="<?= $iva->descricao ?>"></br>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Enviar</button>
        <a href="router.php?c=iva&a=index"  class="btn btn-info" role="button">Cancelar</a>
    </form>
</div>



