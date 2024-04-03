<template>
  <a :href="'./categorias.html?category=' + category.name.toLowerCase()" class="article">
    <span class="tag-name">#{{ category.name }}</span>
    <img :src="'/images/categories/' + category.name.toLowerCase() + '.jpg'" alt="" class="article-image">
  </a>
</template>


<script setup>
    defineProps({
        category: Object,
        index: Number
    });
</script>