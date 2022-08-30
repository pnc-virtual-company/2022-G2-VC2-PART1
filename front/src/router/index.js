import { createRouter, createWebHistory } from 'vue-router'
import LeaveView from '../views/student/LeaveView.vue'
import RequestView from '../views/student/RequestView.vue'
import SignOutView from '../views/student/SignoutView.vue'

// admin
import StudentMenu from '../views/admin/StudentView.vue'
import DashbordMenu from '../views/admin/DashboardView.vue'
import LeaveMenu from '../views/admin/LeaveView.vue'
import AddForm from '../components/student/StudentAddForm.vue'
import EditForm from '../components/student/StudentEditForm.vue'
import StudentNav from '../components/student/StudentNavbar.vue'
import AdminNav from '../components/admin/AdminNav.vue'

// import Admin from '../components/admin/DashboardView.vue'

const routes = [

  {
    path: '/admin',
    name: 'admin',
    component: AdminNav
  },
  {
    path: '/dashboard',
    name: 'dashboard',
    component: DashbordMenu
  },

  {
    path: '/addForm',
    name: 'addForm',
    component: AddForm
  },

  {
    path: '/editForm',
    name: 'editForm',
    component: EditForm
  },

  {
    path: '/student/leave',
    name: 'leave',
    component: LeaveView
  },

  {
    path: '/student/request',
    name: 'request',
    component: RequestView
  },

  {
    path: '/student/signout',
    name: 'signout',
    component: SignOutView 
  },

  {
    path: '/student_lists',
    name: 'student_lists',
    component: StudentMenu 
  },
  {
    path: '/dashbord_menu',
    name: 'dashbord_menu',
    component: DashbordMenu 
  },
  {
    path: '/students/nav',
    name: 'studentNav',
    component: StudentNav,
  },
  {
    path: '/leave_menu',
    name: 'leave_menu',
    component: LeaveMenu 
  },
  
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router