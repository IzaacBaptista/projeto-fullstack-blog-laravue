<template>
    <HeadComponent />
    <NavbarComponent />
    <SearchComponent />
    <CategoriesButtonsComponent />
    <ArticlesByCategoryComponent />
    <FooterComponent />
</template>

<style scoped></style>

<script setup>
    import HeadComponent from "../components/HeadComponent.vue";
    import NavbarComponent from "../components/NavbarComponent.vue";
    import SearchComponent from "../components/SearchComponent.vue";
    import CategoriesButtonsComponent from "../components/CategoriesButtonsComponent.vue";
    import ArticlesByCategoryComponent from "../components/ArticlesByCategoryComponent.vue";
    import FooterComponent from "../components/FooterComponent.vue";

    import { onMounted } from "vue";
    import { allArticles } from "../http/blog-api";
    onMounted(async () => {
        const { data } = await allArticles();
        console.log(data);
    });
</script>
