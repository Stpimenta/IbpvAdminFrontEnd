//pages control 
let currentPage = 1;
let totalPages = null;
let isLoading = false;

function setupEventListeners() {

    //infinite scroll
    const container = document.getElementById('expenses-main-section');
    container.addEventListener('scroll', () => {
        const nearBottom =
            container.scrollTop + container.clientHeight >= container.scrollHeight - 200;

        if (nearBottom && !isLoading && (!totalPages || currentPage <= totalPages)) {
            loadExpenses(currentPage);
        }
    });

    const searchInput = document.getElementById('expenses-search-bar');
    const searchButton = document.getElementById('expenses-search-button');

    //search button and enter event
    searchButton.addEventListener('click', () => {
        searchFunction();
    });

    searchInput.addEventListener('keypress', (e) => {
        if (e.key == 'Enter') {
            searchFunction();
        }
    });

    //select
    const selectFundValue = document.getElementById('fund-expenses');
    selectFundValue.addEventListener('change', () => {
        searchFunction();
    });

    //dates filter
    const initialDateInput = document.getElementById('expenses-initial-date');
    const finalDateInput = document.getElementById('expenses-final-date');

    initialDateInput.addEventListener('change', () => {
        searchFunction(); //update cards
    });

    finalDateInput.addEventListener('change', () => {
        searchFunction(); //update cards
    });

    //clear btn
    const clearBtn = document.getElementById('expenses-clear-btn');
    clearBtn.addEventListener('click', () => {

        //clear inputs
        document.getElementById('expenses-search-bar').value = '';
        document.getElementById('expenses-initial-date').value = '';
        document.getElementById('expenses-final-date').value = '';
        document.getElementById('fund-expenses').value = '';

        // reset page
        currentPage = 1;
        totalPages = null;
        isLoading = false;

        //clear html
        document.getElementById('expensive-container-card').innerHTML = ''

        //resetcards
        searchFunction();

        //close menu
        const toggle = document.querySelector('.filter-toggle');
        const panel = document.querySelector('.period-and-select');
        panel.classList.remove('show');
        toggle.classList.remove('active');
    });


}

//search function 
function searchFunction() {

    //search bar
    const searchInputDesc = document.getElementById('expenses-search-bar').value.trim();

    // inicial
    const initialVal = document.getElementById('expenses-initial-date').value.trim();
    const initialDate = initialVal
        ? (() => { const [dd, mm, yyyy] = initialVal.split('/'); return `${mm}-${dd}-${yyyy}` })()
        : '';

    // final
    const finalVal = document.getElementById('expenses-final-date').value.trim();
    const finalDate = finalVal
        ? (() => { const [ddF, mmF, yyyyF] = finalVal.split('/'); return `${mmF}-${ddF}-${yyyyF}` })()
        : '';

    //select funds
    const selectFundValue = document.getElementById('fund-expenses').value;


    console.log('select', selectFundValue);
    console.log(searchInputDesc);
    console.log(initialDate);
    console.log(finalDate);



    //reset pages
    currentPage = 1;
    totalPages = null;


    //reset html
    document.getElementById('expensive-container-card').innerHTML = '';

    loadExpenses(currentPage, searchInputDesc, initialDate, finalDate, selectFundValue)
}

async function loadExpenses(page = 1, descricao = '', initialDate = '', finalDate = '', fundid = '') {
    if (isLoading) return;
    isLoading = true;

    try {

        //request

        const url = `/proxy/Gasto?pageNumber=${page}&pageQuantity=100` +
            `&descricao=${encodeURIComponent(descricao)}` +
            `&initialDate=${encodeURIComponent(initialDate)}` +
            `&finalDate=${encodeURIComponent(finalDate)}` +
            `&idCaixa=${encodeURIComponent(fundid)}`;

        console.log(url);

        const res = await fetch(url, { headers: { 'Accept': 'application/json' } });

        //render content
        const data = await res.json();
        totalPages = data.pages

        //pages control
        console.log('Resposta do backend:', data);

        const container = document.getElementById('expensive-container-card');
        data.items.forEach(expense => {

            const card = document.createElement('div');
            card.classList.add('card');
            card.dataset.id = expense.id

            card.innerHTML =
                `
                    <div>
                    <h3 class="card-title">${expense.descricao || 'Sem título'}</h3>
                    <p class="card-subtitle">${expense.caixa || ''}</p>
                    </div>

                    <div class="card-details-and-actions">
                    <div class="card-details">
                        <h3 class="card-title">R$ ${(expense.valor ?? 0).toFixed(2).replace('.', ',')}</h3>
                        <p class="card-subtitle">${expense.data ? new Date(expense.data).toLocaleDateString('pt-BR') : ''}</p>
                    </div>

                    <div class="card-actions">
                        <span class="btn-icon card-btn-more">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-chevron-right">
                            <path d="m9 18 6-6-6-6"/>
                        </svg>
                        </span>
                    </div>
                    </div>
                `;
            container.appendChild(card);

        });

        currentPage++;


    } catch (err) {
        console.error('Fail to load expenses:', err);
    } finally {
        isLoading = false;
    }
}

//load funds
async function loadfunds() {
    const select = document.getElementById('fund-expenses');

    //clear select
    select.innerHTML = '';

    //default option
    const defaultOption = document.createElement('option');
    defaultOption.value = '';
    defaultOption.textContent = 'Selecione um caixa';
    select.appendChild(defaultOption);

    //request funds
    try {
        const res = await fetch('/proxy/Caixa');
        const data = await res.json();

        data.forEach(fund => {
            const option = document.createElement('option');
            option.value = fund.id;
            option.textContent = fund.nome;
            select.appendChild(option);
        });

    } catch (err) {
        console.error('Fail to load funds:', err);
    }

}

export async function pageInit() {

    //reset
    currentPage = 1;
    totalPages = null;
    isLoading = false;

    await loadExpenses();
    setupEventListeners();
    await loadfunds();

}