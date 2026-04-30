import { createRouter, createWebHistory } from "vue-router";
import Dashboard from "./pages/Dashboard.vue";
import Login from "./pages/auth/Login.vue";
import Register from "./pages/auth/register.vue";

const routes = [
  {
    path: "/register",
    name: "register",
    component: Register,
  },
  {
    path: "/login",
    name: "login",
    component: Login,
  },
  {
    path: "/dashboard",
    name: "dashboard",
    component: Dashboard,
  },
  {
    path: "/dashboard/cash",
    name: "cash",
    // component: Das
  }
];

export const router = createRouter({
  history: createWebHistory(),
  routes,
});
