
<h1>Empresa:</h1>
<h3>Designação Social</h3><td><?=$empresa->designacaosocial ?></td>
<h3>Telefone</h3><td><?=$empresa->telefone ?></td>
<h3>NIF</h3><td><?=$empresa->nif ?></td>
<h3>Morada</h3><td><?=$empresa->morada ?></td>
<h3>Código Postal</h3><td><?=$empresa->codpostal ?></td>
<h3>Localidade</h3><td><?=$empresa->localidade ?></td>
<h3>Capital Social</h3><td><?=$empresa->capitalsocial ?></td>

<a href="router.php?c=empresa&a=edit&id=<?=$empresa->id ?>"
   class="btn btn-info" role="button">Edit</a>
