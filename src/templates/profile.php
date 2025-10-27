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
    <link rel="stylesheet" href="/css/theme.css">
    <link rel="stylesheet" href="/css/profile.css">


</head>

<body>

    <main class="profile-main">

        <header>

            <a href="javascript:history.back()" id="button-back">

                <svg xmlns="http://www.w3.org/2000/svg"
                    id="button-back-logo"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    class="lucide lucide-arrow-left"
                    viewBox="0 0 24 24">
                    <path d="m12 19-7-7 7-7" />
                    <path d="M19 12H5" />
                </svg>
            </a>

            <div id="header-div-logo">
                <!-- <img src="/img/logo1.png" id="header-logo" alt="Header Logo"> -->
                <h2>Perfil</h2>
            </div>

        </header>

        <section class="profile-section fade-in">

            <div class="user-perfil-img">
                <div class="user-perfil-img">
                    <img src="img/default-avatar.jpg">
                </div> 
            </div>

            <div class="user-perfil-about">
                <h2>Perfil</h2>
                <div class="user-perfil-infos">
                    <span class="label">Nome:</span> <span class="value"><?= $name ?></span>
                    <span class="label">E-mail:</span> <span class="value"><?= $email ?></span>
                    <span class="label">Gênero:</span> <span class="value"><?= $gender ?></span>
                    <span class="label">Data de Nascimento:</span> <span class="value"><?= $dob ?></span>
                    <span class="label">Profissão:</span> <span class="value"><?= $profession ?></span>
                    <span class="label">Telefone:</span> <span class="value"><?= $phone ?></span>
                    <span class="label">Token:</span> <span class="value"><?= $token ?></span>
                    <span class="label">Role:</span> <span class="value"><?= $role ?></span>
                </div>
            </div>

        </section>

    </main>



    <!-- <script type="module" src="/js/login.js"></script> -->
</body>



</html>