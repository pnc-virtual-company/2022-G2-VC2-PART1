import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
// import navAdmin from './components/admin/DashboardView.vue'
import studentsListAdmin from './views/admin/StudentView.vue'
import leaveListAdmin from './views/admin/LeaveView.vue'
import deskbordListAdmin from './views/admin/DashboardView.vue'
import studentsLeave from './components/leave/StudentLeave.vue'
// import navAdmin from './components/admin/DashboardView.vue'
import navStudents from './components/student/StudentNavbar.vue'
import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap";
// sweet alert
import VueSweetalert2 from 'vue-sweetalert2';


const app =createApp(App)
app.component('StudentViewAdmin',studentsListAdmin)
app.component('LeavetViewAdmin',leaveListAdmin)
app.component('DeskbordViewAdmin',deskbordListAdmin)
app.component('navStudent',navStudents)
app.component('studentsLeave',studentsLeave)


app.use(router)
app.use(VueSweetalert2)
  .mount('#app')
