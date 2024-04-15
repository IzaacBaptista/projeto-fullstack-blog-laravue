<template>
    <section class="older-posts section">

        <div class="container">

            <h2 class="title section-title" data-name="Artigos mais antigos">Artigos mais antigos</h2>

            <div class="older-posts-grid-wrapper d-grid">
                <ArticlesByCategory v-for="(article, index) in articlesByCategory" :article="article" :key="article.id" :index="index" />
            </div>

            <div class="see-more-container">
                <a href="./artigos.html" class="btn see-more-btn place-items-center">
                    Veja mais
                    <i class="ri-arrow-right-s-line"></i>
                </a>
            </div>

        </div>

    </section>
</template>

<script setup>
    import { onMounted, ref } from "vue";
    import { allArticles } from "../http/blog-api";
    import ArticlesByCategory from "./articles/ArticlesByCategory.vue";

    const articlesByCategory = ref([]);

    onMounted(async () => {
        const response = await allArticles();
        const articles = response.data.data;
        articlesByCategory.value = articles
    });

</script>
