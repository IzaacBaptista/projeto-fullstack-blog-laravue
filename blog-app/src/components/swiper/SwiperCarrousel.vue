<template>
    <swiper :slidesPerView="3"
    :spaceBetween="30"
    :pagination="{
      clickable: true,
    }"
    :modules="modules"
    class="mySwiper">
        <slot />
    </swiper>
  </template>
  <script>
    import { Swiper } from 'swiper/vue';
    import 'swiper/css';
    import 'swiper/css/pagination';
    import { Pagination } from 'swiper/modules';
  
    export default {
      components: {
        Swiper,
      },
      setup() {
        return {
          modules: [Pagination],
        };
      },
    };
  </script>
  
  
<style>

.swiper {
  width: 100%;
  height: 100%;
}

.swiper-slide {
  text-align: center;
  font-size: 18px;
  background: #fff;
  display: flex;
  justify-content: center;
  align-items: center;
}

.swiper-slide img {
  display: block;
  width: 100%;
  height: 100%;
  object-fit: cover;
}

</style>