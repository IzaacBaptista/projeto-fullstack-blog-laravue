<template>
    <a :href="'./post.html?id=' + article.id" :class="'article featured-article featured-article-' + (index + 1)">
        <img :src="article.image" alt="" class="article-image">
        <span class="article-category">{{ article.category.name }}</span>
        <div class="article-data-container">
            <div class="article-data">
                <span>{{ article.data }}</span>
                <span class="article-data-spacer"></span>
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
    defineProps({
        article: Object,
        index: Number
    });
</script>