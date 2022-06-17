<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Criar Iva

        </h1>

    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <form action="router.php?c=iva&a=store" method="post">
                            <div class="mb-3">
                                <label for="percentagem" class="form-label">Percentagem</label>
                                <input type="number" maxlength="2" min=1 max=99 class="form-control" required name="percentagem" value="<?php  if(isset($iva)) { echo
                                $iva->percentagem; }?>" > </br> <?php if(isset($iva->percentagem)){ echo '<div class="alert alert-danger">'.$iva->errors->on('percentagem') .'</div>';}  ?>
                            </div>
                            <div class="mb-3">
                                <label for="descricao" class="form-label">Descrição</label>
                                <input type="text" class="form-control" required name="descricao" value="<?php if(isset($iva)) { echo
                                $iva->descricao; }?>">
                                </br>
                            </div>
                        <button type="submit" class="btn btn-success">Enviar</button>
                            <a href="router.php?c=iva&a=index"  class="btn btn-danger" role="button">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>