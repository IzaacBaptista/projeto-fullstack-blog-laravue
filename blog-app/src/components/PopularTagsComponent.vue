<template>
    <section class="popular-tags section">
      <div class="container">
        <h2 class="title section-title" data-name="Popular tags">Popular tags</h2>
        <div class="popular-tags-container d-grid">
          <a v-for="(category, index) in popularTags" 
            :key="category.id" 
            :index="index" 
            :category="category" 
            :href="'./categorias.html?category=' + category.name.toLowerCase()" class="article"
          >
            <span class="tag-name">#{{ category.name }}</span>
            <img :src="category.image" alt="" class="article-image">
          </a>
        </div>
      </div>
    </section>
  </template>
  
  <script setup>
  import { onMounted, ref } from "vue";
  import { allCategories } from "../http/blog-api";
  
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
  