import { createRouter, createWebHistory } from "vue-router";

const routes = [
  {
    path: "/auth/register",
    component: () => import("./pages/auth/register.vue"),
  },
];

export const router = createRouter({
  history: createWebHistory(),
  routes,
});
