<h3>Criar Capitulo</h3>
</br>
<form action="router.php?c=chapter&a=store" method="post">
    <div class="mb-3">
        <input type="hidden" name="book_id" value="<?= $book->id ?>">

        <label for="name" class="form-label">Nome do Capitulo</label>
        <input type="text" class="form-control" name="name"> </br>
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
    <a href="router.php?c=chapter&a=index&id=<?= $book->id ?>"  class="btn btn-info" role="button">Cancelar</a>
</form>