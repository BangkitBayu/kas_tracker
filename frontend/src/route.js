import { createRouter, createWebHistory } from "vue-router";

const routes = [
  {
    path: "/register",
    name: "register",
    component: () => import("./pages/auth/register.vue"),
  },
  {
    path: "/login",
    name: "login",
    component: () => import("./pages/auth/login.vue"),
  },
  {
    path: "/",
    name: "home"
    // component: () => import("./pages/auth/login.vue"),
  },
];

export const router = createRouter({
  history: createWebHistory(),
  routes,
});
