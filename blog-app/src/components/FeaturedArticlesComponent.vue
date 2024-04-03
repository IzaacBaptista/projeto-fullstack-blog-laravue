<template>
    <section class="featured-articles section section-header-offset">
        <div class="featured-articles-container container d-grid">
            <div class="featured-content d-grid" id="featuredContent">
                <div class="headline-banner" style="text-align: center; justify-content: center;">
                    <h2 style="padding: 1rem;font-size: var(--font-size-md);color: var(--light-color);">Artigos mais recentes</h2>
                </div>
                <FeaturedArticle v-for="(article, index) in featuredArticle" :article="article" :key="article.id" :index="index" />
            </div>
            <div class="sidebar d-grid">
                <h3 class="title featured-content-title">Artigos mais lidos</h3>
                <MostReadArticle v-for="(article, index) in mostReadArticle" :article="article" :key="article.id" :index="index" />
            </div>
        </div>
    </section>
</template>

<script setup>
    import { onMounted, ref } from "vue";
    import { allArticles } from "../http/blog-api";
    import FeaturedArticle from "./articles/FeaturedArticle.vue";
    import MostReadArticle from "./articles/MostReadArticle.vue";
    
    const featuredArticle = ref([]);
    const mostReadArticle = ref([]);

    onMounted(async () => {
        const response = await allArticles();
        const articles = response.data.data;

        const currentDate = new Date();
        const sortedArticles = articles
            .filter(article => {
                const articleDate = new Date(article.data.split("-").reverse().join("-"));
                return articleDate <= currentDate;
            })
            .sort((a, b) => {
                const dateA = new Date(a.data.split("-").reverse().join("-"));
                const dateB = new Date(b.data.split("-").reverse().join("-"));
                return dateB - dateA;
            });

        const latestArticles = sortedArticles.slice(0,3);
        featuredArticle.value = latestArticles;

        const otherArticles = sortedArticles.slice(3);
        const shuffledOtherArticles = shuffle(otherArticles);
        mostReadArticle.value = shuffledOtherArticles.slice(0, 5);

    });

    const shuffle = (array) => {
        for (let i = array.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [array[i], array[j]] = [array[j], array[i]];
        }
        return array;
    };
</script>
