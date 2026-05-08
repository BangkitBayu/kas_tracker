<script lang="js" setup>
import { ref } from "vue";
import BaseButton from "../components/BaseButton.vue";
import { useRouter } from "vue-router";
const router = useRouter();

let isExpanded = ref(false);
const expandedMenu = () => {
  isExpanded.value = !isExpanded.value;
};

const logoutUser = () => {
  router.push({ name: "logout" });
};
</script>
<template>
  <header
    class="top-0 w-full min-h-20 shadow relative flex justify-between items-center px-6 py-2 z-999"
  >
    <div class="logo flex items-center gap-2">
      <img src="../assets/img/kas-tracker-logo.png" alt="logo" class="w-6" />
      <h1 class="font-bold text-lg">Kas Tracker</h1>
    </div>

    <nav
      :class="
        isExpanded
          ? 'fixed right-0 top-0 h-screen z-50 p-4 flex flex-col gap-y-5 bg-white w-72 shadow-xl'
          : 'hidden'
      "
    >
      <div class="w-full">
        <button @click="expandedMenu" class="flex justify-self-end">
          <svg
            class="stroke-black/60"
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
          >
            <path
              fill="none"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="1.5"
              d="M4 5h12M4 12h16M4 19h8"
            />
          </svg>
        </button>
        <h3 class="font-medium text-black/60 text-sm mt-5">Menu</h3>
        <ul class="flex flex-col text-black/60 text-lg mt-3 w-full">
          <router-link :to="{ name: 'dashboard' }" class="group">
            <li class="p-2 flex items-start">
              <svg
                class="mr-2 stroke-black/60 group-hover:stroke-primary"
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
              >
                <path
                  fill="none"
                  stroke-linejoin="round"
                  stroke-width="1.5"
                  d="M15.29 20.663h3.017a2.194 2.194 0 0 0 2.193-2.194v-6.454a3.3 3.3 0 0 0-1.13-2.48l-5.93-5.166a2.194 2.194 0 0 0-2.88 0L4.63 9.534a3.3 3.3 0 0 0-1.13 2.481v6.454c0 1.212.982 2.194 2.194 2.194h3.29m6.306 0v-6.581c0-.908-.736-1.645-1.645-1.645H10.63c-.909 0-1.645.737-1.645 1.645v6.581m6.306 0H8.984"
                />
              </svg>
              <p class="group-hover:text-primary">Dashboard</p>
            </li>
          </router-link>
        </ul>
      </div>
      <div>
        <h3 class="font-medium text-black/60 text-sm">Manage</h3>
        <ul
          class="flex flex-col text-black/60 text-lg mt-3 items-start gap-y-4 w-full"
        >
          <router-link :to="{ name: 'mycash' }" class="group">
            <li class="p-2 flex items-center justify-center">
              <svg
                class="mr-2 stroke-black/60 group-hover:stroke-primary"
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
              >
                <g
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="1.5"
                >
                  <path
                    d="M14.5 12.001a2.5 2.5 0 1 1-5 0a2.5 2.5 0 0 1 5 0m-8.875.499H5.5m.25 0a.25.25 0 1 1-.5 0a.25.25 0 0 1 .5 0m12.875-1H18.5m.25 0a.25.25 0 1 1-.5 0a.25.25 0 0 1 .5 0"
                  />
                  <path
                    d="M16 5.001c2.48 0 4.19.384 5.133.676c.543.168.867.683.867 1.251v9.755c0 1.115-1.228 1.954-2.324 1.747c-.94-.177-2.165-.32-3.676-.32c-4.75 0-5.89 1.806-12.855.27A1.47 1.47 0 0 1 2 16.94V6.921c0-.976.92-1.687 1.878-1.497C10.197 6.678 11.421 5 16 5"
                  />
                </g>
              </svg>
              <p class="group-hover:text-primary">My Cash</p>
            </li>
          </router-link>
          <router-link :to="{ name: 'transaction' }" class="group">
            <li class="p-2 flex items-center justify-center w-full">
              <svg
                class="mr-2 stroke-black/60 group-hover:stroke-primary"
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
              >
                <g
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="1.5"
                >
                  <path
                    d="M4.58 8.607L2 8.454C3.849 3.704 9.158 1 14.333 2.344c5.513 1.433 8.788 6.918 7.314 12.25c-1.219 4.411-5.304 7.337-9.8 7.406"
                  />
                  <path stroke-dasharray=".5 3" d="M12 22C6.5 22 2 17 2 11" />
                  <path
                    d="M13.604 9.722c-.352-.37-1.213-1.237-2.575-.62c-1.361.615-1.577 2.596.482 2.807c.93.095 1.537-.11 2.093.47c.556.582.659 2.198-.761 2.634s-2.341-.284-2.588-.509m1.653-6.484v.79m0 6.337v.873"
                  />
                </g>
              </svg>
              <p class="group-hover:text-primary">Transaction</p>
            </li>
          </router-link>
        </ul>
      </div>

      <BaseButton
        :id="'logoutButton'"
        :type="'button'"
        :variant="'danger'"
        @click="logoutUser"
        >Logout</BaseButton
      >
    </nav>

    <button @click="expandedMenu">
      <svg
        class="stroke-black/60"
        xmlns="http://www.w3.org/2000/svg"
        width="24"
        height="24"
        viewBox="0 0 24 24"
      >
        <path
          fill="none"
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="1.5"
          d="M4 5h12M4 12h16M4 19h8"
        />
      </svg>
    </button>
  </header>
</template>

<style scoped>
nav {
  transition: all 0.3s ease-in-out;
}
</style>
