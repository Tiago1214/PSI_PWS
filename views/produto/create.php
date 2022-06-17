<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Criar Produto

        </h1>

    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <form action="router.php?c=produto&a=store" method="post">
                            <div class="mb-3">
                                <label for="referencia" class="form-label">Referência</label>
                                <input type="text"  class="form-control" required name="referencia" value="<?php  if(isset($produto)) { echo
                                $produto->referencia; }?>" > </br> <?php if(isset($produto->referencia)){ echo '<div class="alert alert-danger">'.$produto->errors->on('referencia') .'</div>';}  ?>
                            </div>
                            <div class="mb-3">
                                <label for="descricao" class="form-label">Descrição</label>
                                <input type="text" class="form-control" required name="descricao" value="<?php if(isset($produto)) { echo
                                $produto->descricao; }?>"></br> <?php if(isset($produto->referencia)){ echo '<div class="alert alert-danger">'.$produto->errors->on('descricao') .'</div>';}  ?>
                                </br>
                            </div>
                            <div class="mb-3">
                                <label for="preco" class="form-label">Preço</label>
                                <input type="text" class="form-control" required name="preco" value="<?php if(isset($produto)) { echo
                                $produto->preco; }?>"></br> <?php if(isset($produto->referencia)){ echo '<div class="alert alert-danger">'.$produto->errors->on('preco') .'</div>';}  ?>
                                </br>
                            </div>
                            <div class="mb-3">
                                <label for="stock" class="form-label">Stock</label>
                                <input type="text" class="form-control" required name="stock" value="<?php if(isset($produto)) { echo
                                $produto->stock; }?>"></br> <?php if(isset($produto->referencia)){ echo '<div class="alert alert-danger">'.$produto->errors->on('stock') .'</div>';}  ?>
                                </br>
                            </div>
                                <?php
                                /*
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
                                */
                                ?>

                            <div class="mb-3">
                                <label for="iva_id">Iva:</label><br>
                                <select name="iva_id">
                                    <?php foreach($ivas as $iva){
                                        if($iva->emvigor==1){?>
                                            <option value="<?= $iva->id?>"> <?= $iva->percentagem; ?></option>
                                        <?php }
                                        ?>
                                    <?php } ?>
                                </select>
                            </div>
                        </br>
                        <button type="submit" class="btn btn-success">Enviar</button>
                            <a href="router.php?c=user&a=index"  class="btn btn-warning" role="button">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
