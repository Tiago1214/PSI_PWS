<div class="content-wrapper">
    <form  action="router.php?c=user&a=update&id=<?= $user->id ?>" method="post">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" required name="email" value="<?= $user->email ?>"></br>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Criar Nova Password</label>
            <input type="password" name="password" required"></br>
        </div>
        <button type="submit" class="btn btn-success">Enviar</button>
        <a href="router.php?c=backoffice&a=index"  class="btn btn-warning" role="button">Cancelar</a>
    </form>
</div>
