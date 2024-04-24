<template>
    <section id="tags-category" class="section section-header-offset">
        <div id="categoryButtons" class="category-buttons-container">
            <button v-for="(category, index) in categoryButtons" :key="category.id" :data-category="category.name" :index="index" class="btn btn-primary">
                <span>#{{ category.name }}</span>
            </button>
        </div>
    </section>
</template>

<script setup>
import { onMounted, ref } from "vue";
import { allCategories } from "../http/blog-api";

const categoryButtons = ref([]);

onMounted(async () => {
  const response = await allCategories();
  const categories = response.data.data;
  categoryButtons.value = categories;
});

</script>
