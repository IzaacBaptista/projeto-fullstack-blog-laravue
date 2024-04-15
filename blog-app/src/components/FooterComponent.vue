<template>
    <br>

    <footer class="footer section">
    <br>

        <div class="footer-container container d-grid">
            
            <div class="company-data">
                <a href="./index.html">
                    <h2 class="logo">Codigo Simples</h2>
                </a>
                <p class="company-description">Programação não é só código.</p>
                
                <ul class="list social-media">
                    <li class="list-item">
                        <a href="https://www.instagram.com/blogcodigosimples/" class="list-link" target="_blank"><i class="ri-instagram-line"></i></a>
                    </li>
                    <li class="list-item">
                        <a href="https://www.linkedin.com/in/izaac-baptista-78562311b/" class="list-link" target="_blank"><i class="ri-linkedin-box-line"></i></a>
                    </li>
                    <li class="list-item">
                        <a href="https://github.com/IzaacBaptista" class="list-link" target="_blank"><i class="ri-github-line"></i></a>
                    </li>
                    <li class="list-item">
                        <a href="https://discord.gg/3YBZgqZ" class="list-link" target="_blank"><i class="ri-discord-line"></i></a>
                    </li>
                </ul>

                <span class="copyright-notice">&copy;2023 Código Simples. All rights reserved.</span>
            </div>

            <div>
                <h6 class="title footer-title">Principais Categorias</h6>

                <ul class="footer-list list">
                    <MainCategories v-for="(category, index) in popularTags" :key="category.id" :index="index" :category="category" />
                </ul>

            </div>

            <div>
                <h6 class="title footer-title">LINKS</h6>
                
                <ul class="footer-list list">
                    <li class="list-item">
                        <a href="./index.html" class="list-link">Inicio</a>
                    </li>
                    <li class="list-item">
                        <a href="./artigos.html" class="list-link">Artigos</a>
                    </li>
                    <li class="list-item">
                        <a href="#" class="list-link">Autores</a>
                    </li>
                    <li class="list-item">
                        <a href="#" class="list-link">Materiais para download</a>
                    </li>
                    <li class="list-item">
                        <a href="./contato.html" class="list-link">Contato</a>
                    </li>
                </ul>
            </div>

            <div>
                <h6 class="title footer-title">O BLOG</h6>
                
                <ul class="footer-list list">
                    <li class="list-item">
                        <a href="./saiba-mais.html" class="list-link">Saiba mais</a>
                    </li>
                    <li class="list-item">
                        <a href="#" class="list-link">Ajude</a>
                    </li>
                    <li class="list-item">
                        <a href="./contato.html" class="list-link">Trabalhe com a gente</a>
                    </li>
                    <li class="list-item">
                        <a href="#" class="list-link">Política de Privacidade</a>
                    </li>
                </ul>

            </div>

        </div>
        
    </footer>
</template>
<script setup>
import { onMounted, ref } from "vue";
import { allCategories } from "../http/blog-api";
import MainCategories from "./articles/MainCategories.vue";

const popularTags = ref([]);

onMounted(async () => {
  const response = await allCategories();
  const categories = response.data.data;

  const shuffledCategories = shuffle(categories);
  popularTags.value = shuffledCategories.slice(0, 6);
});

const shuffle = (array) => {
      for (let i = array.length - 1; i > 0; i--) {
          const j = Math.floor(Math.random() * (i + 1));
          [array[i], array[j]] = [array[j], array[i]];
      }
      return array;
  };
</script>