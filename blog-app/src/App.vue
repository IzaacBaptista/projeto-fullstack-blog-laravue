
<template>
    <Home />
</template>

<script setup>
import Home from "./pages/Home.vue";
import { onMounted } from "vue";
import { allArticles } from "./http/blog-api";
onMounted(async () => {
    const { data } = await allArticles();
    console.log(data);
});
</script>