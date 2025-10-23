

//open and close nav bar with hamburguer
const hamburger = document.getElementById('hamburger');
const nav = document.querySelector('nav');

function openNavBar(open)
{
  if(open){
    nav.classList.toggle('open');
    hamburger.classList.toggle('active');
  }else{
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
document.querySelectorAll('nav .btn-icon').forEach(btn=>{
  btn.addEventListener('click', function(){
    document.querySelectorAll('nav .btn-icon').forEach(b=>b.classList.remove('active'));
    this.classList.add('active');

    // close when clicking on mobile device
    if(window.innerWidth <=768)
    {
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
  profileMenu.classList.toggle('show');
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





