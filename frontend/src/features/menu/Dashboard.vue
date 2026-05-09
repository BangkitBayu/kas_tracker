<script setup lang="js">
import { onMounted, ref } from "vue";
import Footer from "../../components/Footer.vue";
import Header from "../../components/Header.vue";
import authStore from "../auth/auth.store";
import DashboardService from "./dashboard.service";

const user = ref();
const isLoading = ref(true);
const dashboardService = new DashboardService();

onMounted(async () => {
  try {
    user.value = await dashboardService.getUser(authStore.State.user.data.id);
  } catch (error) {
    console.error(error.response);
  } finally {
    isLoading.value = false;
  }
});
</script>

<template>
  <div>
    <Header></Header>
    <main class="min-h-screen w-full z-10 overflow-x-hidden">
      <div
        v-if="isLoading == true"
        class="flex items-center justify-center min-h-screen"
      >
        <svg
          class="w-5 h-5 animate-spin border-4 rounded-full border-black/70 mr-3 border-t-transparent"
          viewBox="0 0 24 24"
        ></svg>
        <h1 class="text-black/70">Sedang memuat data ...</h1>
      </div>
      <div v-else class="px-3 py-4 flex flex-col space-y-2">
        <h1 class="font-bold text-xl text-black/70">Dashboard</h1>
        <div class="rounded shadow p-4 space-y-2">
          <h1 class="text-2xl text-black/80">
            Welcome to your Dashboard, {{ user.data.data.username }}! 👋
          </h1>
          <p class="text-black/75">Let's track and record your cash flow.</p>
        </div>
        <div class="px-3 py-2 bg-yellow-200 text-yellow-600 rounded">
          <h3 class="font-semibold">
            Summary of your activities and cash flow.
          </h3>
        </div>
        <div
          class="rounded shadow p-4 flex flex-col items-center justify-center space-y-2"
        >
          <h3 class="text-sm text-black/70">Total Saldo Kamu</h3>
          <h1 class="font-bold text-xl">1.000.000</h1>
        </div>
        <div
          class="rounded shadow p-4 flex items-center relative overflow-y-hidden"
        >
          <div
            class="flex flex-col items-center justify-center w-[45%] space-y-2"
          >
            <h3 class="text-sm text-black/70">Total Pemasukan</h3>
            <h1 class="font-bold text-xl">1.000.000</h1>
          </div>
          <hr class="border-gray-200 w-[20%] h-[10%] rotate-90" />
          <div
            class="flex flex-col items-center justify-center w-[45%] space-y-2"
          >
            <h3 class="text-sm text-black/70">Total Pengeluaran</h3>
            <h1 class="font-bold text-xl">1.000.000</h1>
          </div>
        </div>
        <div class="rounded shadow p-4 space-y-2">
          <h3 class="text-sm text-black/70">Go Back</h3>
          <div v-if="user.data.data.cashs.length <= 0">
            <p class="font-bold text-black/70 text-center text-sm py-2">
              Data Not Found
            </p>
          </div>
        </div>
        <div class="rounded shadow p-4 space-y-2">
          <h3 class="text-sm text-black/70">Transactions History</h3>
          <div v-if="user.data.data.transactions.length <= 0">
            <p class="font-bold text-black/70 text-center text-sm py-2">
              Data Not Found
            </p>
          </div>
        </div>
      </div>
    </main>
    <Footer></Footer>
  </div>
</template>
