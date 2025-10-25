//notice modal
import { showModal } from './global.js';

const form = document.getElementById('login-form');
const loginBtn = document.getElementById('login-button');

form.addEventListener('submit', async (e) => {
  e.preventDefault();
  

  // console.log('Formulário enviado!');


  // payload for request
  const payload = {
    email: form.elements.email.value,
    password: form.elements.password.value
  };

  // console.log('payload', payload);

  //request http
  try {
    loginBtn.classList.add('loading');
    const response = await fetch('/login', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(payload)
    });

    if (!response.ok) {
      let message = 'Erro inesperado, tente novamente mais tarde';
      if (response.status === 401) message = 'Email ou senha inválidos';
      else if (response.status === 403) message = 'Verifique suas permissões com um administrador';

      showModal({ title: 'Atenção', message, type: 'error' });
      return;
    }


    const result = await response.json();
    if (result.success) {
      window.location.href = result.redirect;
    }


  } catch (err) {
    showModal({
      title: 'Atenção',
      message: 'Servidor indisponivel, tente novamente mais tarde',
      type: 'error'
    })
  } finally{
    loginBtn.classList.remove('loading');
  }

});


