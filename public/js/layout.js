/* load page */
/* load dynamic content */
async function loadDashboardContent(page) {
  const content = document.getElementById('dynamic-content');
  const loading = document.getElementById('loading');


  const rect = content.getBoundingClientRect();
  loading.style.top = content.offsetTop + "px";
  loading.style.left = content.offsetLeft + "px";
  loading.style.width = rect.width + "px";
  loading.style.height = rect.height + "px";


  let showLoading = false;
  const timer = setTimeout(() => {
    loading.style.display = 'flex';
    showLoading = true;
  }, 100);

  try {
    const response = await fetch('/dashboard/content/' + page);

    if (response.status === 302 || response.status === 401 || response.status === 403) {
      const redirect = response.headers.get('Location') || '/';
      window.location.href = redirect;
      return;
    }

    const html = await response.text();
    content.innerHTML = html;

  } catch (err) {
    content.innerHTML = '<p>Error loading content.</p>';
    console.error(err);
  } finally {
    clearTimeout(timer);
    if (showLoading) {
      loading.style.display = 'none';
    }
  }
}
document.addEventListener('DOMContentLoaded', () => loadDashboardContent('home'));


//open and close nav bar with hamburguer
const hamburger = document.getElementById('hamburger');
const nav = document.querySelector('nav');

function openNavBar(open) {
  if (open) {
    nav.classList.toggle('open');
    hamburger.classList.toggle('active');
  } else {
    nav.classList.remove('open');
    hamburger.classList.remove('active');
  }
}

hamburger.addEventListener('click', () => {
  openNavBar(true);
});


//close nav menu by click outside
document.addEventListener('click', (e) => {
  if (!nav.contains(e.target) && !hamburger.contains(e.target)) {
    openNavBar(false);
  }
});


//nav bar button  transitions
document.querySelectorAll('nav .btn-icon').forEach(btn => {
  btn.addEventListener('click', function () {
    document.querySelectorAll('nav .btn-icon').forEach(b => b.classList.remove('active'));
    this.classList.add('active');

    // close when clicking on mobile device
    if (window.innerWidth <= 768) {
      openNavBar(false);;
    }
  });
});


//collapsed navBar
const collapseBtn = document.getElementById('collapse-nav-button');
const navBar = document.querySelector('nav');
const arrow = document.getElementById('collapse-nav-button-icon');

collapseBtn.addEventListener('click', () => {
  navBar.classList.toggle('collapsed');
  if (!navBar.classList.contains('collapsed')) {
    collapseBtn.style.left = '90px';
    arrow.style.transform = 'rotate(0deg)';
  } else {
    collapseBtn.style.left = '250px';
    arrow.style.transform = 'rotate(180deg)';
  }
});


//profile menu
const profileBtn = document.getElementById('profile-btn');
const profileMenu = document.getElementById('profile-menu');

profileBtn.addEventListener('click', () => {
  profileMenu.classList.toggle('show');
  console.log('show');
});



//close if click away
document.addEventListener('click', (e) => {
  if (!profileBtn.contains(e.target) && !profileMenu.contains(e.target)) {
    profileMenu.classList.add('hidden');
  }

  if (!profileMenu.contains(e.target) && !profileBtn.contains(e.target)) {
    profileMenu.classList.remove('show');
  }
});








