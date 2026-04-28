import { createRouter, createWebHistory } from "vue-router";

const routes = [
  {
    path: "/auth/register",
    name: "register",
    component: () => import("./pages/auth/register.vue"),
  },
  {
    path: "/auth/register",
    name: "login",
    component: () => import("./pages/auth/login.vue"),
  },
];

export const router = createRouter({
  history: createWebHistory(),
  routes,
});
