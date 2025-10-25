<!DOCTYPE html>

<html lang="pt-BR">

<head>

    <meta charset="UTF-8">
    <!-- responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>GestPV</title>
    <link rel="icon" type="image/png" href="/img/logo-blue-fundo.png">

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
            <form id="login-form">
                <div class="form-group">
                    <input type="email" name="email" placeholder="E-mail" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Senha" required>
                </div>
                <button id="login-button" type="submit"><span>Entrar</span></button>
            </form>

        </section>

    </main>

    <!--modal-->
    <div id="app-modal" class="hidden-modal">
        <div class="modal-content modal-error">
            <div class="modal-icon">
                <!-- Ícone de alerta branco dentro de círculo vermelho -->
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10" fill="#BE4E39" />
                    <line x1="12" x2="12" y1="8" y2="12" />
                    <line x1="12" x2="12.01" y1="16" y2="16" />
                </svg>
            </div>
            <h2 id="modal-title">Aviso</h2>
            <p id="modal-message"></p>
            <button id="modal-close">Fechar</button>
        </div>
    </div>

    <script type="module" src="/js/login.js"></script>
</body>



</html>