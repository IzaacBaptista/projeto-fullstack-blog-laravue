<script setup>
import Head from "../components/HeadComponent.vue";
import Navbar from "../components/NavbarComponent.vue";
import Search from "../components/SearchComponent.vue";
import FeaturedArticles from "../components/FeaturedArticlesComponent.vue";
import QuickRead from "../components/QuickReadComponent.vue";
import OlderArticles from "../components/OlderArticlesComponent.vue";
import PopularTags from "../components/PopularTagsComponent.vue";
import Newsletter from "../components/NewsletterComponent.vue";
import Footer from "../components/FooterComponent.vue";

import { onMounted } from "vue";
import { allArticles } from "../http/blog-api";
onMounted(async () => {
    const { data } = await allArticles();
    console.log(data);
});
</script>

<template>
    <Head />
    <Navbar />
    <Search />
    <FeaturedArticles />
    <QuickRead />
    <OlderArticles />
    <PopularTags />
    <Newsletter />
    <Footer />
</template>

<style scoped></style>
