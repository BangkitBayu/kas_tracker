<script setup lang="js">
import Footer from "../../components/Footer.vue";
import Header from "../../components/Header.vue";
</script>

<template>
  <div>
    <Header></Header>
    <main class="min-h-screen min-w-screen">
      <div class="px-3 py-4 flex flex-col space-y-2">
        <h1 class="font-bold text-xl text-black/70">Dashboard</h1>
        <div class="rounded shadow p-4 space-y-2">
          <h1 class="text-2xl text-black/80">
            Welcome to your Dashboard, Bangkit Bayu! 👋
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
        <div class="rounded shadow p-4 flex items-center">
          <div
            class="flex flex-col items-center justify-center w-[45%] space-y-2"
          >
            <h3 class="text-sm text-black/70">Total Pemasukan</h3>
            <h1 class="font-bold text-xl">1.000.000</h1>
          </div>
          <hr class="border-gray-200 w-[20%] h-full rotate-90" />
          <div
            class="flex flex-col items-center justify-center w-[45%] space-y-2"
          >
            <h3 class="text-sm text-black/70">Total Pengeluaran</h3>
            <h1 class="font-bold text-xl">1.000.000</h1>
          </div>
        </div>
        <div class="rounded shadow p-4 space-y-2">
          <h3 class="text-sm text-black/70">Go Back</h3>
          <div></div>
        </div>
        <div class="rounded shadow p-4 space-y-2">
          <h3 class="text-sm text-black/70">Transactions History</h3>
          <div></div>
        </div>
      </div>
    </main>
    <Footer></Footer>
  </div>
</template>
