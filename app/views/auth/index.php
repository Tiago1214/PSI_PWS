<!-- Iniciar Sessão -->
<section class="contact section" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <h2 class="mb-3 pb-2" data-aos="fade-up" data-aos-delay="200">Entre na sua conta Fatura+</h2>
                <form method="post" action="router.php?c=auth&a=auth" class="contact-form webform" data-aos="fade-up" data-aos-delay="400">
                    <?php if(isset($_SESSION['failed'])==true){
                        ?>
                        <p style="color:red"> Inicio de sessão falhou, por favor verifique as suas credenciais </p>
                    <?php
                    } ?>
                    Utilizador:<input type="text" required class="form-control" name="username">

                    Palavra-Passe:<input type="password" required class="form-control" name="pass">

                    <button type="submit" class="form-control" id="submit-button" name="submit">Login</button>
                </form>
            </div>
        </div>
    </div>
</section>
<script id="verificalogin"></script>

