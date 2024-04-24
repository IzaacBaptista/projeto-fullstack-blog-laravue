<template>
    <section class="featured-articles section section-header-offset">
        <div class="featured-articles-container container d-grid">
            <div class="featured-content d-grid" id="featuredContent">
                <div class="headline-banner" style="text-align: center; justify-content: center;">
                    <h2 style="padding: 1rem;font-size: var(--font-size-md);color: var(--light-color);">Artigos mais recentes</h2>
                </div>
                <a v-for="(article, index) in featuredArticle" 
                    :article="article" 
                    :key="article.id" 
                    :index="index" 
                    :href="'./article/' + article.id" 
                    :class="'article featured-article featured-article-' + (index + 1)"
                >
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
            </div>
            <div class="sidebar d-grid">
                <h3 class="title featured-content-title">Artigos mais lidos</h3>
                <a v-for="(article, index) in mostReadArticle" 
                    :article="article" 
                    :key="article.id" 
                    :index="index" 
                    :href="'./article/' + article.id"  
                    class="trending-news-box"
                >
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
            </div>
        </div>
    </section>
</template>

<script setup>
    import { onMounted, ref } from "vue";
    import { allArticles } from "../http/blog-api";
    
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
