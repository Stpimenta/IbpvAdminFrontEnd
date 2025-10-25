<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>GestPV</title>
    <link rel="icon" type="image/png" href="/img/logo-blue-fundo.png">

    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">  

    <!-- css -->
    <link rel="stylesheet" href="/css/theme.css">
    <link rel="stylesheet" href="/css/logout.css">
</head>
<body class="logout-container">

    <div class="logout-box">
        <h1>Logout realizado com sucesso</h1>

        <div class="dots">
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>

        <p>Você será redirecionado em <span id="countdown">3</span> segundos...</p>
    </div>

    <script>
        let counter = 3;
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
