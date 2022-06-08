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

        <div class="mb-3">
            <label for="emvigor">Em Vigor:</label><br>
            <select name="emvigor">
             <option value="<?php if($iva->emvigor == '1') echo '1'; else echo '0'; ?>"><?php if($iva->emvigor == '1') echo 'Ativo'; else echo 'Desativo';?></option>
                <option value="<?php if($iva->emvigor == '1') echo '0'; else echo '1';?>"><?php if($iva->emvigor == '1') echo 'Desativo'; else echo 'Ativo';?></option>
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
        <a href="router.php?c=iva&a=index"  class="btn btn-info" role="button">Cancelar</a>
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


