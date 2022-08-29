<?php $this->layout('master', ['title' => $title]) ?>


<section class="container-left">
    <article class="logo-img">
        <header class="site-header">
            <div class="site-title">Blog</div>
            <div class="site-slogan">Um sistema completo em <strong>PHP</strong> utilizando<p><strong>SLIM Framework</strong></div>
        </header>
    </article>
    
    <article class="logo-text">
        <h3>Seja bem vindo á</h3>
        <h1>Tela de Cadastro</h1>
    </article>
</section>

<section class="container-right">
    
    <h1>Cadastre-se conosco</h1>
    
    <div id="message">
        
    </div>
    <form class="form-signup" id="form-signup" style="margin: 0 auto;">
        <div>
            <label>Usuário:</label>
            <input type="text" name="email" placeholder="Ex.: usuarioteste" class="input input-dark" value="">
            <?= getFlash('email'); ?>
        </div>
        <div id="passwordContainer">
            <label>Senha:</label>
            <input id="password" name="passwrd" type="password" placeholder="Ex.: senhateste"
            class="input input-dark" value="">
            <?= getFlash('password'); ?>
            <i data-feather="eye-off" class="iconFeather"></i>
        </div>
        <div>
            <label>Telefone:</label>
            <input type="text" name="phone" placeholder="Ex.: 18997039595" class="input input-dark" value="">
            <?= getFlash('phone'); ?>
        </div>
        <button type="submit" class="btn btn-login">Entrar</button>
    </form>
</section>
<script src="/assets/scripts/signup.js"></script>
