
<h2>ID: </h2><?=$book->id ?> </br>
<h2>Nome: </h2><?=$book->nome ?> </br>
<h2>ISBN: </h2><?=$book->isbn?> </br>
<a href="router.php?c=book&a=edit&id=<?=$book->id ?>"
   class="btn btn-info" role="button">Edit</a>
