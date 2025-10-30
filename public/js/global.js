//icon button
document.querySelectorAll('.btn-icon').forEach(btn=>{
  btn.addEventListener('click', function(e){
    const rect = this.getBoundingClientRect();
    const ripple = document.createElement('span');
    ripple.className = 'ripple';
    ripple.style.left = (e.clientX - rect.left) + 'px';
    ripple.style.top  = (e.clientY - rect.top) + 'px';
    const size = Math.max(rect.width, rect.height) * 1.2;
    ripple.style.width = ripple.style.height = size + 'px';
    this.appendChild(ripple);
    ripple.addEventListener('animationend', ()=> ripple.remove());
  });
});


//modal
export function showModal({ title = 'Aviso', message = '', type = 'error' }) {
  const modal = document.getElementById('app-modal');
  const content = modal.querySelector('.modal-content');
  const titleEl = document.getElementById('modal-title');
  const messageEl = document.getElementById('modal-message');

  content.classList.remove('modal-error', 'modal-success', 'modal-warning');
  content.classList.add(`modal-${type}`);

  titleEl.textContent = title;
  messageEl.textContent = message;

  modal.classList.remove('hidden-modal');
}

export function closeModal() {
  document.getElementById('app-modal').classList.add('hidden-modal');
}


window.addEventListener('DOMContentLoaded', () => {
  const closeBtn = document.getElementById('modal-close');
  if (closeBtn) closeBtn.addEventListener('click', closeModal);
});





