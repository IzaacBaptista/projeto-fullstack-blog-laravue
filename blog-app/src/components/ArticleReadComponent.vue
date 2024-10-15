<template>
    <!-- Article -->
    <div class="blog-post-container container" id="featuredContent" style="padding-top: 10%;">
        <div class="blog-post-container container">
            <div class="blog-post-data">
                <h3 class="title blog-post-title">{{ articleRead.title }}</h3>
                <div class="article-data">
                    <span>{{ articleRead.data }}</span>
                    <span class="article-data-spacer"></span>
                    <span>{{ articleRead.time_read }}</span>
                    <a v-if="articleRead.category" :href="'./category/' + articleRead.category.id">{{ articleRead.category.name }}</a>

                    <i class="fas fa-light fa-eye" style="font-size: 1.5rem;">
                        <span>{{ Math.floor(Math.random() * 500) }}</span>
                    </i>
                    <i class="fas fa-thumbs-up" style="font-size: 1.5rem;">
                        <span>{{ Math.floor(Math.random() * 30) }}</span>
                    </i>
                </div>
                <img :src="articleRead.image" alt="">
            </div>
            <div class="container" style="text-align: justify;">
                <div class="container" style="text-align: justify;">
                    <p v-for="(content, index) in articleRead.contents" :key="index" v-html="content.content"></p>
                </div>
            </div>
            <blockquote class="quote">
               <p>
                  <span>
                     <i class="ri-double-quotes-l"></i>
                  </span> 
                     {{ articleRead.blockquote }}
                  <span>
                     <i class="ri-double-quotes-r"></i>
                  </span>
               </p>
            </blockquote>
            <div class="interactive-icons" style="display: flex; gap: 10px;">
               <div class="icon-container">
                  <i class="ri ri-star-line interactive-icon" data-icon-name="star"></i>
               </div>
               <div class="icon-container">
                  <i class="ri ri-heart-line interactive-icon" data-icon-name="heart"></i>
               </div>
               <div class="icon-container">
                  <i class="ri ri-lightbulb-line interactive-icon" data-icon-name="idea"></i>
               </div>
            </div>
            <div class="references">
                <h3>Referências:</h3>
                <ul class="references-list">
                    <li v-for="(reference, index) in articleRead.references" :key="index">- {{ reference.reference }}</li>
                </ul>
            </div>
            <div class="author d-grid">
               <div class="author-image-box">
                  <img  v-if="articleRead.author" :src="articleRead.author.image" alt="" class="article-image">
               </div>
               <div  v-if="articleRead.author" class="author-about">
                  <h3 class="author-name">{{articleRead.author.name}} {{articleRead.author.surname}}</h3>
                  <p>{{articleRead.author.about}}</p>
                  <ul class="list social-media">
                     <li class="list-item">
                        <a :href="'{{articleRead.author.instagram}}'" class="list-link" target="_blank">
                           <i class="ri-instagram-line"></i>
                        </a>
                     </li>
                     <li class="list-item">
                        <a href="https://www.linkedin.com/in/izaac-baptista-78562311b/" class="list-link" target="_blank">
                           <i class="ri-linkedin-box-line"></i>
                        </a>
                     </li>
                     <li class="list-item">
                        <a href="https://github.com/IzaacBaptista" class="list-link" target="_blank">
                           <i class="ri-github-line"></i>
                        </a>
                     </li>
                  </ul>
               </div>
            </div>
            <div class="buttons buttons-container">
               <button v-if="articleRead.id != 1" class="btn btn-primary btn-previous" @click="previousArticle">Anterior</button>
               <button v-if="showNextButton == true" class="btn btn-primary btn-next" @click="nextArticle" >Próximo</button>
            </div>
         </div>
    </div>
  
    <!-- Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content" style="text-align: center;">
            <span class="close">&times;</span>
            <p>O link do artigo foi copiado.</p>
        </div>
    </div>
  
    <!-- Artigos Relacionados -->
    <section class="quick-read section">
  
        <div class="container">
  
            <h2 class="title section-title" data-name="Artigos Relacionados">Artigos Relacionados</h2>
            <!-- Slider main container -->
            <Swiper>
               <template #default>
                   <swiper-slide v-for="article, index in quickReadArticle" :key="`slide-${index}`">
                       <QuickReadArticle :article="article" :index="index" />
                   </swiper-slide>
               </template>
           </Swiper>
  
        </div>
  
    </section>
  
     
</template>
  
<script setup>
  import { onMounted, ref, nextTick, watch  } from "vue";
  import { getArticle, getArticlesByCategory } from "../http/blog-api";
  import { useRoute, useRouter } from 'vue-router';
  import QuickReadArticle from "./articles/QuickReadArticle.vue";
  import { SwiperSlide } from "swiper/vue"
  import Swiper from "./swiper/SwiperCarrousel.vue"
  
  const articleRead = ref([]); 
  const quickReadArticle = ref([]);
  const showNextButton = ref(false);
  
  const route = useRoute();
  const router = useRouter();
  
  onMounted(async () => {
      const articleId = route.params.id;
      const response = await getArticle(articleId);
      articleRead.value = response.data;

      articleRead.value.contents.forEach((content) => {
          content.content = content.content.replace(/<a/g, '<a target="_blank" class="text-blue"');
      });
      
      if(articleId != 1){
         const previousArticle = await getArticle(articleId - 1);
         articleRead.value.previousArticle = previousArticle.data;
      }
      
      try {
         const nextArticle = await getArticle(Number(articleId) + 1);
         if (nextArticle.status === 200) {
               articleRead.value.nextArticle = nextArticle.data;
               showNextButton.value = true;
         } else {
               showNextButton.value = false;
         }
      } catch (error) {
         console.error('Erro ao buscar o próximo artigo:', error);
         showNextButton.value = false;
      }

      const categoryId = articleRead.value.category.id;
      const responseAll = await getArticlesByCategory(categoryId);
      responseAll.data.data.forEach((article) => {
          if (article.id === articleId) {
              responseAll.data.data.splice(article, 1);
          }
      });
      quickReadArticle.value = responseAll.data.data;
  });
  p
  const previousArticle = async () => {
      // if (articleRead.value.previousArticle) {
          const previousArticleId = articleRead.value.previousArticle.id;
          console.log('previousArticleId: ', previousArticleId)
          await loadArticle(previousArticleId);
          router.push(`/article/${previousArticleId}`);
      // }
  };
  
  const nextArticle = async () => {
      // if (articleRead.value.nextArticle) {
          const nextArticleId = articleRead.value.nextArticle.id;
          await loadArticle(nextArticleId);
          router.push(`/article/${nextArticleId}`);
      // }
  };
  
  const loadArticle = async (articleId) => {
      const response = await getArticle(articleId);
      console.log('response: ', response)
      articleRead.value = response.data;

      articleRead.value.contents.forEach((content) => {
          content.content = content.content.replace(/<a/g, '<a target="_blank" class="text-blue"');
      });
  };
  
  // Função para forçar a atualização da interface do usuário após a atualização da variável showNextButton
  const updateUI = async () => {
      await nextTick(); // Aguarda a próxima atualização do DOM
      // Força a atualização da interface do usuário
  };
  
  // Chama a função updateUI após a atualização da variável showNextButton
  watch(showNextButton, () => {
      updateUI();
  });
</script>

  
  