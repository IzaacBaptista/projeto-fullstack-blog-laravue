<template>
    <section class="quick-read section">

        <div class="container">

            <h2 class="title section-title" data-name="Leitura Rápida">Leitura Rápida</h2>
            <!-- Slider main container -->
            <Swiper>
                <template #default>
                    <swiper-slide v-for="article, index in quickReadArticle" :key="`slide-${index}`">
                        <QuickReadArticle :article="article" :index="index" />
                    </swiper-slide>
                </template>
            </Swiper>

        </div>

    </section>
</template>

<script setup>
    import { onMounted, ref } from "vue";
    import { allArticles } from "../http/blog-api";
    import QuickReadArticle from "./articles/QuickReadArticle.vue";
    import Swiper from "./swiper/SwiperCarrousel.vue"
    import { SwiperSlide } from "swiper/vue"
    
    const quickReadArticle = ref([]);

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

        const latestArticles = sortedArticles.slice(0,9);
        const shuffledOtherArticles = shuffle(latestArticles);
        quickReadArticle.value = shuffledOtherArticles
    });

    const shuffle = (array) => {
        for (let i = array.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [array[i], array[j]] = [array[j], array[i]];
        }
        return array;
    };

   
</script>
