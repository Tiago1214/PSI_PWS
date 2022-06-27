<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Ver Dados da Empresa

        </h1>

    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a href="router.php?c=empresa&a=edit&id=<?=$empresa->id ?>"
                           class="btn btn-warning" role="button">Editar</a>
                        <h3>Designação Social</h3><td><?=$empresa->designacaosocial ?></td>
                        <h3>Email</h3><td><?=$empresa->email ?></td>
                        <h3>Telefone</h3><td><?=$empresa->telefone ?></td>
                        <h3>NIF</h3><td><?=$empresa->nif ?></td>
                        <h3>Morada</h3><td><?=$empresa->morada ?></td>
                        <h3>Código Postal</h3><td><?=$empresa->codpostal ?></td>
                        <h3>Localidade</h3><td><?=$empresa->localidade ?></td>
                        <h3>Capital Social</h3><td><?=$empresa->capitalsocial ?>€</td>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
