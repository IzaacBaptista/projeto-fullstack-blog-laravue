<template>
  <a :href="'./post.html?id=' + article.id" class="trending-news-box">
      <div class="trending-news-img-box" >
        <span class="trending-number place-items-center">{{ index + 1 }}</span>
        <img :src="article.image" alt="" class="article-image">
      </div>

      <div class="trending-news-data" >
        <div class="article-data">
          <span>{{ article.data }}</span>
          <span>{{ article.time_read }}</span>
          <i class="fas fa-light fa-eye" style="font-size: 1.5rem;">
              <span>{{ Math.floor(Math.random() * 500) }}</span>
          </i>
          <i class="fas fa-thumbs-up" style="font-size: 1.5rem;">
              <span>{{ Math.floor(Math.random() * 30) }}</span>
          </i>
        </div>
        <h3 class="title article-title">{{ article.title }}</h3>
      </div>
    </a>
</template>

<script setup>
  import { defineProps } from 'vue';

  defineProps({
      article: Object,
      index: Number
  });
</script>
