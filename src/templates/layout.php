<!-- src/templates/layout.php -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>

    <meta charset="UTF-8">

     <!-- responsive -->
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    <title>DashBoard - IBPV</title>

    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">  

    <!-- css -->
    <link rel="stylesheet" href="/css/default.css">
    <link rel="stylesheet" href="/css/theme.css">
    <link rel="stylesheet" href="/css/layout.css">
    
</head>


<body>
    <header>

        <div id="header-div-logo">
            <img src="/img/logo1.png" id="header-logo" alt="Header Logo">
            <h2>GestPV</h2>
        </div>
        
        <button id="hamburger" aria-label="Abrir menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
    

        <div id="header-div-profile">
            <button id="profile-btn" aria-label="Abrir menu de perfil">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" 
                fill="none" stroke="currentColor" stroke-width="2" 
                stroke-linecap="round" stroke-linejoin="round" 
                class="lucide lucide-circle-user-round">
                <path d="M18 20a6 6 0 0 0-12 0"/>
                <circle cx="12" cy="10" r="4"/>
                <circle cx="12" cy="12" r="10"/>
                </svg>
            </button>

            <div id="profile-menu" class="hidden">
                <a href="/perfil">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-round-icon lucide-user-round"><circle cx="12" cy="8" r="5"/><path d="M20 21a8 8 0 0 0-16 0"/></svg>
                    Ver Perfil
                </a>
                <a href="/logout"> 
                    <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-out-icon lucide-log-out"><path d="m16 17 5-5-5-5"/><path d="M21 12H9"/><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/></svg>
                    Sair
                </a>
            </div>
        </div>

    </header>

    <nav>
        <button class="btn-icon active"  onclick="loadDashboardContent('home')">
            <span class="icon" aria-hidden="true">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-diamond-plus-icon lucide-diamond-plus"><path d="M12 8v8"/><path d="M2.7 10.3a2.41 2.41 0 0 0 0 3.41l7.59 7.59a2.41 2.41 0 0 0 3.41 0l7.59-7.59a2.41 2.41 0 0 0 0-3.41L13.7 2.71a2.41 2.41 0 0 0-3.41 0z"/><path d="M8 12h8"/></svg>
            </span>
            <span class="label">Contribuições</span>
        </button>

         <button class="btn-icon"  aria-label="Usuarios" onclick="loadDashboardContent('usuarios')">
            <span class="icon" aria-hidden="true">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-diamond-minus-icon lucide-diamond-minus"><path d="M2.7 10.3a2.41 2.41 0 0 0 0 3.41l7.59 7.59a2.41 2.41 0 0 0 3.41 0l7.59-7.59a2.41 2.41 0 0 0 0-3.41L13.7 2.71a2.41 2.41 0 0 0-3.41 0z"/><path d="M8 12h8"/></svg>
            </span>
            <span class="label">Gastos</span>
        </button>

        <button id="collapse-nav-button" class="collapsed button" aria-label="Reduzir/Expandir menu">
            <svg id="collapse-nav-button-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" 
                viewBox="0 0 24 24" fill="none" stroke="currentColor" 
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m12 19-7-7 7-7"/>
                <path d="M19 12H5"/>
            </svg>
        </button>

    </nav>

      <!--dynamic content -->
    <main id="dynamic-content">
        <?= $this->section('content') ?>
    </main>

    <!-- load dynamic content -->
    <script>
        async function loadDashboardContent(page) {
            const response = await fetch('/dashboard/content/' + page);
            const html = await response.text();
            document.getElementById('dynamic-content').innerHTML = html;
        }
        document.addEventListener('DOMContentLoaded', () => loadDashboardContent('home'));
    </script>


    <script src="/js/global.js"></script>
    <script src="/js/layout.js"></script>
</body>
</html>
