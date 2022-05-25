<h3>Editar Capitulo</h3>
</br>
<form action="router.php?c=chapter&a=update&id=<?= $chapter->id ?>" method="post">
    <div class="mb-3">
        <label for="nome" class="form-label">Nome do Capitulo</label>



        <input type="text" name="name" value="<?= $chapter->name ?>"></br>
        <input type="hidden" name="book_id" value="<?= $chapter->book_id ?>">
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
    <a href="router.php?c=book&a=index"  class="btn btn-info" role="button">Cancelar</a>
</form>
