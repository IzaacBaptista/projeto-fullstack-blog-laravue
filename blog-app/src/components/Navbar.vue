<template>
    <header class="header" id="header">

      <nav class="navbar container">
          <a href="./index.html">
              <img src="./assets/images/favicon.png" alt="" class="logo" width="26%">
          </a>

          <div class="menu" id="menu">
              <ul class="list">
                  <li class="list-item">
                      <a href="./index.html" class="list-link current">Inicio</a>
                  </li>
                  <li class="list-item">
                      <a href="./categorias.html" class="list-link">Categorias</a>
                  </li>
                  <li class="list-item">
                      <a href="./artigos.html" class="list-link">Artigos</a>
                  </li>
                  <li class="list-item">
                      <a href="./contato.html" class="list-link">Contato</a>
                  </li>
                  <li class="list-item">
                      <a href="./saiba-mais.html" class="list-link">Saiba mais</a>
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
