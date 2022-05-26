<h3>Editar Livro</h3>
</br>
<form action="router.php?c=book&a=update&id=<?= $book->id ?>" method="post">
    <div class="mb-3">
        <label for="nome" class="form-label">Nome do Livro</label>
        <input type="text" name="nome" value="<?= $book->nome ?>"></br> <?php if(isset($book->errors)){ echo $book->errors->on('nome') ;}  ?>
    </div>
    <div class="mb-3">
        <label for="isbn" class="form-label">ISBN</label>
        <input type="text" name="isbn" value="<?= $book->isbn ?>"></br>
        <?php

        if(isset($book->errors)){
           if(is_array($book->errors->on('isbn'))) {
               $errors= $book->errors->on('isbn');
               foreach($errors as $error)
               {

                   echo $error.'</br>';
               }
           }else
           {
               echo $book->errors->on('isbn');
           }

        }

        ?>
    </div>
    <div class="mb-3">
    <label for="genres">Genre:</label><br>
    <select name="genre_id">
        <?php foreach($genres as $genre){?>
            <?php if($genre->id == $book->genre_id) { ?>
                <option value="<?= $genre->id?>" selected><?= $genre->name;
                    ?> </option>
            <?php }else { ?>
                <option value="<?= $genre->id?>"> <?= $genre->name;
                    ?></option>
            <?php }
        } ?>
    </select>
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
    <a href="router.php?c=book&a=index"  class="btn btn-info" role="button">Cancelar</a>
</form>
