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
                                <input type="text" class="form-control" name="percentagem" value="<?php  if(isset($iva)) { echo
                                $iva->percentagem; }?>" > </br> <?php if(isset($iva->percentagem)){ echo '<div class="alert alert-danger">'.$iva->errors->on('percentagem') .'</div>';}  ?>
                            </div>
                            <div class="mb-3">
                                <label for="descricao" class="form-label">Descrição</label>
                                <input type="text" class="form-control" name="descricao" value="<?php if(isset($iva)) { echo
                                $iva->descricao; }?>">
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
                                <label for="emvigor">Em vigor:</label><br>
                                <select name="emvigor">

                                    <option value="1"> Ativo</option>
                                    <option value="0"> Desativo</option>

                                </select>
                            </div>
                        </br>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                            <a href="router.php?c=iva&a=index"  class="btn btn-info" role="button">Cancelar</a>
                        </form>

    </section>

</div>
</div>
</div>