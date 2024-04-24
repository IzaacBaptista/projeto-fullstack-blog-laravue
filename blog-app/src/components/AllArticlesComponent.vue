<template>
    <section class="older-posts section">
       
        <div class="container" style="padding-top:10%;">
            <div class="title-and-sort">
                <h2 class="title section-title" data-name="Todos os artigos" style="width:50%">Todos os artigos</h2>
                <select id="sortSelector" onchange="sortArticles()">
                    <option value="recent">Mais recentes</option>
                    <option value="oldest">Mais antigos</option>
                </select>
            </div>
            <div class="older-posts-grid-wrapper d-grid">
                <a v-for="(article, index) in articles" 
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
    import { allArticles } from "../http/blog-api";

    const articles = ref([]);
    const currentPage = ref(1);
    const totalPages = ref(2);
    const perPage = ref(50);
    const orderBy = ref('id');
    const order = ref('desc');

    const fetchArticles = async (page) => {
        const response = await allArticles(page, perPage.value, orderBy.value, order.value);
        articles.value = response.data.data;
        totalPages.value = response.data.last_page;
    }

    onMounted(() => {
        fetchArticles(currentPage.value);
    });
</script>
