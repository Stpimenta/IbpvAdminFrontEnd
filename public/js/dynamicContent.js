//dont close menu with data picker open

let isFlatpickrOpen = false;

//add get all data pickers
const dateInputs = document.querySelectorAll('.date-input');
dateInputs.forEach(input => {
  if (!input._flatpickr) {
    flatpickr(input, {
      dateFormat: "d/m/Y",
      allowInput: true,
      disableMobile: true,
      onOpen: () => { isFlatpickrOpen = true; },
      onClose: () => { isFlatpickrOpen = false; }
    });
  }
});

//close menu with click outside data picker

//add Listener on body
document.body.addEventListener('click', (e) => {
  const toggleBtn = e.target.closest('.filter-toggle');
  const containerClose = document.querySelector('.period-and-select-container');
  const panel = containerClose.querySelector('.period-and-select');
  const toggle = document.querySelector('.filter-toggle');

  if (toggleBtn) {
    panel.classList.toggle('show');
    toggleBtn.classList.toggle('active');
    return;
  }

 
  const pickers = document.querySelectorAll('.date-input');
  const isAnyOpen = Array.from(pickers).some(input => input._flatpickr?.isOpen);


  if (!containerClose.contains(e.target) && !isAnyOpen) {
    panel.classList.remove('show');
    toggle.classList.remove('active');
  }
});
