import { createRouter, createWebHistory } from 'vue-router'

const routes = [
  {
    name: 'Register',
    path: '/register',
    component: () => import('../components/Register.vue')
  },
  {
    name: 'Login',
    path: '/',
    component: () => import('../components/Login.vue')
  },
  {
    name: 'ListUsers',
    path: '/listusers',
    component: () => import('../components/ListUsers.vue')
  },
  {
    name: 'Tasks',
    path: '/tasks',
    component: () => import('../components/Tasks.vue')
  },
  {
    name: 'NewTask',
    path: '/newtask',
    component: () => import('../components/NewTask.vue')
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
})

export default router
