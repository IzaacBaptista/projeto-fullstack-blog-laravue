import api from "./api";

const resource = "/articles";

export const allArticles = () => api.get(resource);

export const createArticle = (article) => api.post(resource, article);

export const updateArticle = (id, article) =>
    api.put(`${resource}/${id}`, article);

export const removeArticle = (id) => api.delete(`${resource}/${id}`);