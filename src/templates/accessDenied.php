<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>GestPV</title>
    <link rel="icon" type="image/png" href="/img/logo-blue-fundo.png">

    <!-- favicon -->
    <link rel="icon" type="image/png" href="/img/favicon.png">

    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">  

    <!-- css -->
    <link rel="stylesheet" href="/css/theme.css">
    <link rel="stylesheet" href="/css/errorPage.css">
</head>
<body>
    <main class="access-denied-container">
        <h1>Acesso Negado</h1>

        <div class="dots">
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>

        <p class="message">Você não tem permissão de acesso,<br>Contate o administrador.</p>
        <p class="redirect">Redirecionando em <span id="countdown">5</span> segundos...</p>
    </main>

    <script>
        let counter = 5;
        const countdownEl = document.getElementById('countdown');
        const interval = setInterval(() => {
            counter--;
            countdownEl.textContent = counter;
            if (counter <= 0) {
                clearInterval(interval);
                window.location.href = '/';
            }
        }, 1000);
    </script>
</body>
</html>
