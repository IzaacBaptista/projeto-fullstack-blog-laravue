<template>
    <button class="btn btn-primary" :data-category="'category.name'">
        <span>#{{ category.name }}</span>
    </button>
</template>

<script setup>
defineProps({
    category: Object,
    index: Number
});
</script>
