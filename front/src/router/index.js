import { createRouter, createWebHistory } from 'vue-router'
import LeaveView from '../views/LeaveView.vue'
import RequestView from '../views/RequestView.vue'
import SignOutView from '../views/SignoutView.vue'


const routes = [


  {
    path: '/leave',
    name: 'leave',
    component: LeaveView
  },

  {
    path: '/request',
    name: 'request',
    component: RequestView
  },

  {
    path: '/signout',
    name: 'signout',
    component: SignOutView 
  },
  
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
