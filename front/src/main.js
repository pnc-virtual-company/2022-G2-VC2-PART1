import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import vuetify from './plugins/vuetify'
import { loadFonts } from './plugins/webfontloader'
// import navAdmin from './components/admin/DashboardView.vue'
import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap";


loadFonts()
const app =createApp(App)
app.use(router)
  .use(vuetify)
  .mount('#app')
