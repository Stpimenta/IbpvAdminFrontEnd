
//nav bar transition
document.querySelectorAll('nav .btn-icon').forEach(btn=>{
  btn.addEventListener('click', function(){
    document.querySelectorAll('nav .btn-icon').forEach(b=>b.classList.remove('active'));
    this.classList.add('active');
  });
});


//open and close nav bar 
const hamburger = document.getElementById('hamburger');
const nav = document.querySelector('nav');

hamburger.addEventListener('click', () => {
    nav.classList.toggle('open');
    hamburger.classList.toggle('active');
});



//collapsed navBar
const collapseBtn = document.getElementById('collapse-nav-button'); 
const navBar = document.querySelector('nav');
const arrow = document.getElementById('collapse-nav-button-icon');

collapseBtn.addEventListener('click', () => {
    navBar.classList.toggle('collapsed');
    if(!navBar.classList.contains('collapsed')){
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
  profileMenu.classList.toggle('hidden');
});

//close if click away
document.addEventListener('click', (e) => {
  if (!profileBtn.contains(e.target) && !profileMenu.contains(e.target)) {
    profileMenu.classList.add('hidden');
  }
});




