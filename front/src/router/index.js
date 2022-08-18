import { createRouter, createWebHistory } from 'vue-router'
import LeaveView from '../views/student/LeaveView.vue'
import RequestView from '../views/student/RequestView.vue'
import SignOutView from '../views/student/SignoutView.vue'


const routes = [


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
  
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
