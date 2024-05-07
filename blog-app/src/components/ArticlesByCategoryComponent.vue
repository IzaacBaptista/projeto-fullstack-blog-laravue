<template>
    <section class="older-posts section">

        <div class="container">

            <h2 class="title section-title" data-name="Artigos por categoria">Artigos por categoria</h2>

            <div class="older-posts-grid-wrapper d-grid">
                <a v-for="(article, index) in articlesByCategory" 
                    :article="article" 
                    :key="article.id" 
                    :index="index" 
                    :href="'./article/' + article.id"
                    class="article d-grid"
                >
                    <div class="older-posts-article-image-wrapper">
                        <img :src="article.image" alt="" class="article-image">
                    </div>
                    <div class="article-data-container">
                        <div class="article-data">
                            <span>{{ article.data }}</span>
                            <span class="article-data-spacer"></span>
                            <span>{{ article.time_read }}</span>            
                        </div>
                        <h3 class="title article-title">{{ article.title }}</h3>
                        <i class="fas fa-light fa-eye" style="font-size: 1.5rem;">
                            <span> {{ Math.floor(Math.random() * 500) }}</span>
                        </i>
                        <i class="fas fa-thumbs-up" style="font-size: 1.5rem;padding-left:3%;">
                            <span> {{ Math.floor(Math.random() * 30) }}</span>
                        </i>
                    </div>
                    <span class="article-category">{{ article.category.name }}</span>
                </a>
            </div>

        </div>

    </section>
</template>

<script setup>
    import { onMounted, ref } from "vue";
    import { allArticles, getArticlesByCategory } from "../http/blog-api";

    const articlesByCategory = ref([]);
    const categoryId = ref(null);

    onMounted(async () => {
        const response = await allArticles();
        const articles = response.data.data;
        articlesByCategory.value = articles;

        const url = window.location.href;
        const regex = /\d+$/;
        const match = url.match(regex);
        if (match) {
            categoryId.value = match[0];
            const categoryArticlesResponse = await getArticlesByCategory(categoryId.value);
            articlesByCategory.value = categoryArticlesResponse.data.data;
        }
    });
</script>
