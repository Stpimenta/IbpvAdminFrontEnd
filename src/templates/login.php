<!DOCTYPE html>

<html lang="pt-BR">
    <head>
        
        <meta charset="UTF-8">
        <!-- responsive -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>Login - GestPV</title>

        <!-- fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">   
        <!-- css -->

        <link rel="stylesheet" href="/css/default.css">
        <link rel="stylesheet" href="/css/login.css">
        <link rel="stylesheet" href="/css/theme.css">
       

    </head>

    <body>

        <main class="login-main">

            <section class="login-section fade-in">
                <img src="/img/logo1.png" alt="logo IBPV admin" class="ibpv-logo">

                <h1>GestPV</h1>
                <?php if (!empty($error)): ?>
                    <div class="login-error"><?= $error ?></div>
                <?php endif; ?>
                <form id="login-form" method="post" action="/login">
                     <div class="form-group">
                        <input type="email" name="email" placeholder="E-mail" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" placeholder="Senha" required>
                    </div>
                    <button type="submit">Entrar</button>
                </form>

            </section>

        </main>

    </body>

    <script>

    const form = document.getElementById('login-form');

        form.addEventListener('keydown', function(event){

            if(event.key === 'Enter')
            {
                event.preventDefault();
                form.submit();
            }
        
        });
    </script>

</html>