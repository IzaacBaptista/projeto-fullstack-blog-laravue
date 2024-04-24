import './assets/main.css'
import { createApp } from 'vue'
import route from './router'
import App from './App.vue'

const app = createApp(App)

app.use(route)
app.mount('#app')
