import { createRouter, createWebHistory } from "vue-router";

// Auth Features Page
import Login from "./features/auth/Login.vue";
import Register from "./features/auth/register.vue";

import Mycash from "./features/cash/Mycash.vue";
import Transaction from "./features/transactions/Transaction.vue";
import Dashboard from "./features/menu/Dashboard.vue";
import httpInterceptor from "./lib/axiosConfig";
import authStore from "./features/auth/auth.store";

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
      try {
        await httpInterceptor.get("/sanctum/csrf-cookie");
        await httpInterceptor.post("/api/v1/logout");

        return { name: "login" };
      } catch (error) {
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
    if (authStore.State.isAuthenticated) {
      next();
    }

    try {
      const response = await httpInterceptor.get("/user-session");

      authStore.State = response.data;

      next();
    } catch (error) {
      next({ name: "login" });
    }
  }
  next();
});
