<template>
  <ul class="footer-list list">
    <li class="list-item">
      <a :href="'./categorias.html?category=' + category.name.toLowerCase()" class="list-link">
        <span>#{{ category.name }}</span>
      </a>
    </li>
  </ul>
</template>

<script setup>
defineProps({
    category: Object,
    index: Number
});
</script>