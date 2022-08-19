import { createRouter, createWebHistory } from 'vue-router'
import LeaveView from '../views/student/LeaveView.vue'
import RequestView from '../views/student/RequestView.vue'
import SignOutView from '../views/student/SignoutView.vue'

// admin
import StudentMenu from '../views/admin/StudentView.vue'
import DashbordMenu from '../views/admin/DashboardView.vue'
import LeaveMenu from '../views/admin/LeaveView.vue'
// import Admin from '../components/admin/DashboardView.vue'


const routes = [
  {
    path: '/',
    name: 'admin',
    component: DashbordMenu
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