import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import vuetify from './plugins/vuetify'
import { loadFonts } from './plugins/webfontloader'
import studentsListAdmin from './views/admin/StudentView.vue'
import leaveListAdmin from './views/admin/LeaveView.vue'
import deskbordListAdmin from './views/admin/DashboardView.vue'
import navAdmin from './components/admin/DashboardView.vue'
import navStudents from './components/studentnav/StudentNavbar.vue'
import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap";


loadFonts()
const app =createApp(App)
app.component('StudentViewAdmin',studentsListAdmin)
app.component('LeavetViewAdmin',leaveListAdmin)
app.component('DeskbordViewAdmin',deskbordListAdmin)
app.component('navAdmin',navAdmin)
app.component('navStudent',navStudents)

app.use(router)
  .use(vuetify)
  .mount('#app')
