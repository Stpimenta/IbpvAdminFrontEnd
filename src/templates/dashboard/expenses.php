<section class="dynamic-main-section" id="expenses-main-section">
    <div class="dynamic-title content-width">
        <h1>Gastos</h1>
        <button class="btn-icon" id="btn-icon-expensive-add" onclick="">
            <span class="icon" aria-hidden="true">
                <svg xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus-icon lucide-plus">
                    <path d="M5 12h14" />
                    <path d="M12 5v14" />
                </svg>
            </span>
            <span class="label">Criar gasto</span>
        </button>
    </div>

    <div class="container-filter-search-menu content-width">
        <div class="container-search-bar">
            <div class="search-bar">
                <input type="text" placeholder="Pesquisar..." id="expenses-search-bar" />
                <button id="expenses-search-button">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24"
                        viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-search-icon lucide-search">
                        <path d="m21 21-4.34-4.34" />
                        <circle cx="11" cy="11" r="8" />
                    </svg>


                </button>
            </div>

            <button class="filter-toggle" aria-label="Abrir filtros">
                <span></span>
                <span></span>
                <span></span>
            </button>

        </div>

        <div class="period-and-select-container">

            <div class="period-and-select">
                <div class="period-filter">
                    <input type="text" class="date-input" placeholder="dd/mm/yyyy" id="expenses-initial-date" />

                    <svg id="arrow-period" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24"
                        viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-arrow-left-right-icon lucide-arrow-left-right">
                        <path d="M8 3 4 7l4 4" />
                        <path d="M4 7h16" />
                        <path d="m16 21 4-4-4-4" />
                        <path d="M20 17H4" />
                    </svg>

                    <div class="final-date-clear-btn" >
                        <input type="text" class="date-input" placeholder="dd/mm/yyyy" id="expenses-final-date" />
                        <button class="clear-btn" id="expenses-clear-btn">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-circle-x-icon lucide-circle-x">
                                <circle cx="12" cy="12" r="10" />
                                <path d="m15 9-6 6" />
                                <path d="m9 9 6 6" />
                            </svg>
                        </button>
                    </div>

                </div>

                <select class="select-fund" id="fund-expenses">
                    <option value="">Selecione uma opção</option>
                </select>

            </div>
        </div>

    </div>


    <div class="container-cards content-width" id="expensive-container-card">




        <!-- <div class="card">
            <div>
                <h3 class="card-title">Transferência para Revitalização Musical</h3>
                <p class="card-subtitle">Categoria ou descrição</p>
            </div>

            <div class="card-details-and-actions">
                <div class="card-details">
                    <h3 class="card-title">R$ 22230,00</h3>
                    <p class="card-subtitle">29/10/2024</p>
                </div>

                <div class="card-actions">
                    <span class="btn-icon card-btn-more">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-chevron-right-icon lucide-chevron-right">
                            <path d="m9 18 6-6-6-6" />
                        </svg>
                    <span>
                </div>
            </div>
        </div> -->
    </div>
</section>