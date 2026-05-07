import { createRouter, createWebHistory } from "vue-router";
import Dashboard from "./features/menu/Dashboard.vue";
import Login from "./features/auth/Login.vue";
import Register from "./features/auth/register.vue";
import Mycash from "./features/manage/Mycash.vue";
import Transaction from "./features/manage/Transaction.vue";
import httpInterceptor from "./lib/axiosConfig";

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
    meta: {
      requiresAuth: true,
    },
  },
  {
    path: "/dashboard/mycash",
    name: "mycash",
    component: Mycash,
    meta: {
      requiresAuth: true,
    },
  },
  {
    path: "/dashboard/transaction",
    name: "transaction",
    component: Transaction,
    meta: {
      requiresAuth: true,
    },
  },
];

export const router = createRouter({
  history: createWebHistory(),
  routes,
});

router.beforeEach(async (to, from, next) => {
  if (to.matched.some((record) => record.meta.requiresAuth)) {
    const response = await httpInterceptor.get("/user-session");

    if (response.status === 401) {
      return { name: "login" };
    }
    return next();
  }
  return next();
});
