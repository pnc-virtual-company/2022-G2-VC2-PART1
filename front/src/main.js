import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
// import navAdmin from './components/admin/DashboardView.vue'
import studentsListAdmin from './views/admin/StudentView.vue'
import leaveListAdmin from './views/admin/LeaveView.vue'
import deskbordListAdmin from './views/admin/DashboardView.vue'
// import navAdmin from './components/admin/DashboardView.vue'
import dashboardview from './components/admin/DashboardView.vue'
import navStudents from './components/student/StudentNavbar.vue'
import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap";



const app =createApp(App)
app.component('StudentViewAdmin',studentsListAdmin)
app.component('LeavetViewAdmin',leaveListAdmin)
app.component('DeskbordViewAdmin',deskbordListAdmin)
app.component('dashboardView',dashboardview)
app.component('navStudent',navStudents)


app.use(router)
  .mount('#app')
