<template>
    <header class="header" id="header">
  
      <nav class="navbar container">
          <a href="./index.html">
              <img src="./assets/images/favicon.png" alt="" class="logo" width="26%">
          </a>
  
          <div class="menu" id="menu">
              <ul class="list">
                  <li class="list-item">
                      <a href="/" class="list-link">Inicio</a>
                  </li>
                  <li class="list-item">
                      <a href="/categories" class="list-link">Categorias</a>
                  </li>
                  <li class="list-item">
                      <a href="/articles" class="list-link">Artigos</a>
                  </li>
                  <li class="list-item">
                      <a href="/contact" class="list-link">Contato</a>
                  </li>
                  <li class="list-item">
                      <a href="/more" class="list-link">Saiba mais</a>
                  </li>
              </ul>
          </div>
  
          <div class="list list-right">
              <button class="btn place-items-center" id="theme-toggle-btn">
                  <i class="ri-sun-line sun-icon"></i>
                  <i class="ri-moon-line moon-icon"></i>
              </button>
  
              <button class="btn place-items-center" id="search-icon">
                  <i class="ri-search-line"></i>
              </button>
  
              <button class="btn place-items-center screen-lg-hidden menu-toggle-icon" id="menu-toggle-icon">
                  <i class="ri-menu-3-line open-menu-icon"></i>
                  <i class="ri-close-line close-menu-icon"></i>
              </button>
  
              <a href="./login.html" class="btn sign-up-btn fancy-border list-link screen-sm-hidden ">
                  <span>Sign in</span>
              </a>
          </div>
  
      </nav>
  
  </header>
</template>
  
<script>

//logic to set current link

const links = document.querySelectorAll('.list-link');

//get url from window object
const url = window.location.pathname;

//get href from each link
links.forEach(link => {
    const href = link.getAttribute('href');
    // console.log(href);
    if (href === url) {
        link.classList.add('current');
    }
});

</script>