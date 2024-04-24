import HomePage from '../pages/HomePage.vue';
import CategoriesPage from '../pages/CategoriesPage.vue';
import ArticlesPage from '../pages/ArticlesPage.vue';
import ArticleReadPage from '../pages/ArticleReadPage.vue';

const routes = [
    {
        path: '/',
        name: 'home',
        component: HomePage
    },
    {
        path: '/categories',
        name: 'categories',
        component: CategoriesPage
    },
    {
        path: '/articles',
        name: 'articles',
        component: ArticlesPage
    },
    {
        path: '/article/:id',
        name: 'ArticleReadPage',
        component: ArticleReadPage
    }
];

export default routes;