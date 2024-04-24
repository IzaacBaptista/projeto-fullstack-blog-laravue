<script setup>
import HeadComponent from "../components/HeadComponent.vue";
import NavbarComponent from "../components/NavbarComponent.vue";
import SearchComponent from "../components/SearchComponent.vue";
import AllArticlesComponent from "../components/AllArticlesComponent.vue";
import FooterComponent from "../components/FooterComponent.vue";

import { onMounted } from "vue";
import { allArticles } from "../http/blog-api";
onMounted(async () => {
    const { data } = await allArticles();
    // console.log(data);
});
</script>

<template>
    <HeadComponent />
    <NavbarComponent />
    <SearchComponent />
    <AllArticlesComponent />
    <FooterComponent />
</template>

<style scoped></style>