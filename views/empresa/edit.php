<div class="content-wrapper">
    <form  action="router.php?c=empresa&a=update&id=<?= $empresa->id ?>" method="post">
        <div class="mb-3">
            <label for="nome" class="form-label">Designação Social</label>
            <input type="text" name="designacaosocial" value="<?= $empresa->designacaosocial ?>"></br> <?php /* if(isset($book->errors)){ echo $book->errors->on('nome') ;} */ ?>
        </div>
        <div class="mb-3">
            <label for="isbn" class="form-label">Email</label>
            <input type="text" name="isbn" value="<?= $empresa->email ?>"></br>
        </div>
        <div class="mb-3">
            <label for="isbn" class="form-label">Telefone</label>
            <input type="text" name="isbn" value="<?= $empresa->telefone ?>"></br>
        </div>
        <div class="mb-3">
            <label for="isbn" class="form-label">NIF</label>
            <input type="text" name="isbn" value="<?= $empresa->nif ?>"></br>
        </div>
        <div class="mb-3">
            <label for="isbn" class="form-label">Morada</label>
            <input type="text" name="isbn" value="<?= $empresa->morada ?>"></br>
        </div>
        <div class="mb-3">
            <label for="isbn" class="form-label">Código Postal</label>
            <input type="text" name="isbn" value="<?= $empresa->codpostal ?>"></br>
        </div>
        <div class="mb-3">
            <label for="isbn" class="form-label">Localidade</label>
            <input type="text" name="isbn" value="<?= $empresa->localidade ?>"></br>
        </div>
        <div class="mb-3">
            <label for="isbn" class="form-label">Capital Social</label>
            <input type="text" name="isbn" value="<?= $empresa->capitalsocial ?>"></br>
        </div>
        <?php
        /*
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
        */
        ?>
        <button type="submit" class="btn btn-primary">Enviar</button>
        <a href="router.php?c=empresa&a=index"  class="btn btn-info" role="button">Cancelar</a>
    </form>
</div>
<h3>Editar Empresa</h3>
</br>
</div>
<!--<div class="mb-3">
    <label for="genres">Genre:</label><br>
    <select name="genre_id">
        <?php /*foreach($genres as $genre){?>
            <?php if($genre->id == $book->genre_id) { ?>
                <option value="<?= $genre->id?>" selected><?= $genre->name;
                    ?> </option>
            <?php }else { ?>
                <option value="<?= $genre->id?>"> <?= $genre->name;
                    ?></option>
            <?php }
        } */?>
    </select>
    </div> -->


