import { createRouter, createWebHistory } from "vue-router";

// Auth Features Page
import Login from "./features/auth/Login.vue";
import Register from "./features/auth/register.vue";
// import Logout from "./features/auth/Logout.vue";

import Mycash from "./features/manage/Mycash.vue";
import Transaction from "./features/manage/Transaction.vue";
import Dashboard from "./features/menu/Dashboard.vue";
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
    path: "/logout",
    name: "logout",
    beforeEnter: async () => {
      await httpInterceptor.get("/sanctum/csrf-cookie");

      const response = await httpInterceptor.post("/api/v1/logout");

      if (response.status === 401 || response.status === 200) {
        return { name: "login" };
      }
    },
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
