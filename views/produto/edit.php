<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Editar Produto</h3>
                    </div>
                    <div class="box-body">
                        <form  action="router.php?c=produto&a=update&id=<?= $produto->id ?>" method="post">
                            <div class="mb-3">
                                <label for="referencia" class="form-label">Referência</label>
                                <input class="form-control" type="text" readonly name="referencia" value="<?= $produto->referencia ?>">
                                </br> <?php  if(isset($produto->errors)){ echo $produto->errors->on('referencia') ;}  ?>
                            </div>
                            <div class="mb-3">
                                <label for="descricao" class="form-label">Descrição</label>
                                <input class="form-control" type="text" name="descricao" value="<?= $produto->descricao ?>"></br>
                                 <?php  if(isset($produto->errors)){ echo $produto->errors->on('descricao') ;}  ?>
                            </div>
                            <div class="mb-3">
                                <label for="preco" class="form-label">Preço</label>
                                <input class="form-control" type="text" name="preco" value="<?= $produto->preco ?>"></br>
                                <?php  if(isset($produto->errors)){ echo $produto->errors->on('preco') ;}  ?>
                            </div>
                            <div class="mb-3">
                                <label for="stock" class="form-label">Stock</label>
                                <input class="form-control" type="number" min=0 name="stock" value="<?= $produto->stock ?>"></br>
                                <?php  if(isset($produto->errors)){ echo $produto->errors->on('stock') ;}  ?>
                            </div>
                            <div class="mb-3">
                                <label for="ivas">Iva:</label><br>
                                <select name="iva_id" class="form-control">
                                    <?php foreach($ivas as $iva){?>
                                        <?php if($iva->id == $produto->iva_id) { ?>
                                            <option value="<?= $iva->id?>" selected><?= $iva->percentagem;
                                                ?> </option>
                                        <?php }else if($iva->emvigor==1) { ?>
                                            <option value="<?= $iva->id?>"> <?= $iva->percentagem;
                                                ?></option>
                                        <?php }
                                    } ?>
                                </select>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-success">Enviar</button>
                            <a href="router.php?c=produto&a=index"  class="btn btn-warning" role="button">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>