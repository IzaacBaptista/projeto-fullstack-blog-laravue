<script setup>
import Navbar from "../components/Navbar.vue";
import Search from "../components/Search.vue";
import FeaturedArticles from "../components/FeaturedArticles.vue";
import QuickRead from "../components/QuickRead.vue";
import OlderArticles from "../components/OlderArticles.vue";
import PopularTags from "../components/PopularTags.vue";
import Newsletter from "../components/Newsletter.vue";
import Footer from "../components/Footer.vue";

import { onMounted } from "vue";
import { allArticles } from "../http/blog-api";
onMounted(async () => {
    const { data } = await allArticles();
    console.log(data);
});
</script>

<template>
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
