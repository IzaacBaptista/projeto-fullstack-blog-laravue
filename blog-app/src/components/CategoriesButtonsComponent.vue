<template>
    <section id="tags-category" class="section section-header-offset">
        <div id="categoryButtons" class="category-buttons-container">
            <CategoryButtons  v-for="(category, index) in categoryButtons" :key="category.id" :index="index" :category="category" />
        </div>
    </section>
</template>

<script setup>
import { onMounted, ref } from "vue";
import { allCategories } from "../http/blog-api";
import CategoryButtons from "./categories/buttons/CategoryButton.vue";

const categoryButtons = ref([]);

onMounted(async () => {
  const response = await allCategories();
  const categories = response.data.data;
  categoryButtons.value = categories;
});

</script>
