import { createRouter, createWebHistory } from "vue-router";
import Dashboard from "./features/menu/Dashboard.vue";
import Login from "./features/auth/Login.vue";
import Register from "./features/auth/register.vue";
import Mycash from "./features/manage/Mycash.vue";
import Transaction from "./features/manage/Transaction.vue";

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
    path: "/dashboard/mycash",
    name: "mycash",
    component: Mycash,
  },
  {
    path: "/dashboard/transaction",
    name: "transaction",
    component: Transaction,
  },
];

export const router = createRouter({
  history: createWebHistory(),
  routes,
});
