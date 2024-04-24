import api from "./api";

const resource = "/articles";

export const allCategories = () => api.get("/categories");

export const allArticles = () => api.get(resource);

export const getArticlesByCategory = (category) => api.get(`article/category/${category}`);

export const getArticle = (id) => api.get(`article/${id}`);

export const createArticle = (article) => api.post(resource, article);

export const updateArticle = (id, article) => api.put(`${resource}/${id}`, article);

export const removeArticle = (id) => api.delete(`${resource}/${id}`);