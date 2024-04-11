<template>
  <a :href="'./categorias.html?category=' + category.name.toLowerCase()" class="article">
    <span class="tag-name">#{{ category.name }}</span>
    <img :src="category.image" alt="" class="article-image">
  </a>
</template>

<script setup>
defineProps({
    category: Object,
    index: Number
});
</script>