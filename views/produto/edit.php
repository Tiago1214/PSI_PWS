<div class="content-wrapper">
    <form  action="router.php?c=produto&a=update&id=<?= $produto->id ?>" method="post">
        <div class="mb-3">
            <label for="referencia" class="form-label">Referência</label>
            <input type="text" readonly name="referencia" value="<?= $produto->referencia ?>"></br> <?php /* if(isset($book->errors)){ echo $book->errors->on('nome') ;} */ ?>
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <input type="text" name="descricao" value="<?= $produto->descricao ?>"></br>
        </div>
        <div class="mb-3">
            <label for="preco" class="form-label">Preço</label>
            <input type="text" name="preco" value="<?= $produto->preco ?>"></br>
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="text" name="stock" value="<?= $produto->stock ?>"></br>
        </div>
        <div class="mb-3">
            <label for="ivas">Iva:</label><br>
            <select name="iva_id">
                <?php foreach($ivas as $iva){?>
                    <?php if($iva->id == $produto->iva_id) { ?>
                        <option value="<?= $iva->id?>" selected><?= $iva->percentagem;
                            ?> </option>
                    <?php }else { ?>
                        <option value="<?= $iva->id?>"> <?= $iva->percentagem;
                            ?></option>
                    <?php }
                } ?>
            </select>
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


