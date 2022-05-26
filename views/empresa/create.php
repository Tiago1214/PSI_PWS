<h3>Criar Livro</h3>
</br>
<form action="router.php?c=book&a=store" method="post">
    <div class="mb-3">
        <label for="nome" class="form-label">Nome do Livro</label>
    <input type="text" class="form-control" name="nome" value="<?php if(isset($book)) { echo
    $book->nome; }?>" > </br> <?php if(isset($book->errors)){ echo '<div class="alert alert-danger">'.$book->errors->on('nome') .'</div>';}  ?>
    </div>
    <div class="mb-3">
        <label for="isbn" class="form-label">ISBN</label>
        <input type="text" class="form-control" name="isbn" value="<?php if(isset($book)) { echo
        $book->isbn; }?>">
        </br>
        <?php

        if(isset($book->errors)){

            if(is_array($book->errors->on('isbn'))) {
                $errors= $book->errors->on('isbn');
                foreach($errors as $error)
                {

                    echo '<div class="alert alert-danger">'.$error.'</div>';
                }
            }else
            {
                echo $book->errors->on('isbn');
            }

        }

        ?>
    </div>
    <div class="mb-3">
        <label for="genre_id">Genre:</label><br>
        <select name="genre_id">
            <?php foreach($genres as $genre){?>
                <option value="<?= $genre->id?>"> <?= $genre->name; ?></option>
            <?php } ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
    <a href="router.php?c=book&a=index"  class="btn btn-info" role="button">Cancelar</a>
</form>