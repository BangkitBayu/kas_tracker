<script setup lang="js">
import { computed, reactive, ref } from "vue";
import useVuelidate from "@vuelidate/core";
import {
  email,
  helpers,
  minLength,
  required,
  sameAs,
} from "@vuelidate/validators";
import BaseButton from "../../components/BaseButton.vue";
import BaseForm from "../../components/BaseForm.vue";
import { useRouter } from "vue-router";
import AuthService from "./auth.service";

const router = useRouter();
const authService = new AuthService();
const setErrors = ref({});

const userInput = reactive({
  email: "",
  password: "",
  remember: "",
});

let isShowPassword = ref(false);

const showedPassword = () => {
  isShowPassword.value = !isShowPassword.value;
};

const rules = computed(() => ({
  email: {
    required: helpers.withMessage("Email wajib diisi", required),
    email: helpers.withMessage("Email tidak valid", email),
  },
  password: {
    required: helpers.withMessage("Password wajib diisi", required),
    minlength: helpers.withMessage("Password minimal 8 karakter", minLength(8)),
  },
}));

const v$ = useVuelidate(rules, userInput);

const submitForm = async () => {
  const result = await v$.value.$validate();
  console.log(userInput);
  if (result) {
    try {
      const response = await authService.login(
        userInput.email,
        userInput.password,
        userInput.remember,
      );
      if (response.status === 200 || response.status === 201) {
        return router.push({ name: "dashboard" });
      }
    } catch (error) {
      if (error.response?.status === 401) {
        setErrors.value = { form: error.response.data.message };
        // return router.push({ name: "login" });
      }
    }
  }
};
</script>

<template>
  <div class="flex flex-col justify-center items-center h-screen">
    <h1 class="font-bold text-3xl mb-4">Masuk Akun</h1>
    <BaseForm>
      <div
        v-if="setErrors.form"
        class="border border-red-600 bg-red-200 text-red-600 rounded w-full p-2"
      >
        <p>{{ setErrors.form }}</p>
      </div>
      <div class="form-group flex flex-col w-full relative">
        <input
          class="p-2.5 w-full rounded-[5px] border border-[#cfcfcf] focus:outline-[3px] focus:outline-[#45a8ff8d] focus:border-primary focus:rounded-xs"
          type="email"
          name="email"
          id="email"
          placeholder="Email"
          v-model="userInput.email"
          :class="v$.email.$error ? ' border-red-500' : ' border-[#cfcfcf]'"
        />
        <p class="info mt-1 ml-1 text-red-500" v-if="v$.email.$error">
          {{ v$.email.$errors[0].$message }}
        </p>
      </div>
      <div class="form-group flex flex-col w-full relative">
        <div class="relative flex w-full rounded-[5px] border border-[#cfcfcf]">
          <input
            class="w-[85%] p-[0.6rem] focus:outline-[3px] focus:outline-[#45a8ff8d] focus:border focus:border-primary focus:rounded-xs"
            :type="isShowPassword ? 'text' : 'password'"
            name="password"
            id="password"
            placeholder="Password"
            v-model="userInput.password"
          />
          <button
            id="togglePassword"
            type="button"
            class="ml-2.5"
            @click="showedPassword"
          >
            <svg
              v-show="isShowPassword === false"
              xmlns="http://www.w3.org/2000/svg"
              width="20"
              height="20"
              viewBox="0 0 24 24"
              id=" open-eye"
              class="transition-transform delay-150 ease-in-out"
            >
              <g
                fill="none"
                stroke="#727272db"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="1.5"
              >
                <path d="M3 13c3.6-8 14.4-8 18 0" />
                <path d="M12 17a3 3 0 1 1 0-6a3 3 0 0 1 0 6" />
              </g>
            </svg>

            <svg
              v-show="isShowPassword === true"
              xmlns="http://www.w3.org/2000/svg"
              width="20"
              height="20"
              viewBox="0 0 16 16"
              id=" close-eye"
              class="transition-transform delay-150 ease-in-out"
            >
              <path
                fill="#727272db"
                d="m10.12 10.827l4.026 4.027a.5.5 0 0 0 .708-.708l-13-13a.5.5 0 1 0-.708.708l3.23 3.23A6 6 0 0 0 3.2 6.182a6.7 6.7 0 0 0-1.117 1.982c-.021.061-.047.145-.047.145l-.018.062s-.076.497.355.611a.5.5 0 0 0 .611-.355l.001-.003l.008-.025l.035-.109a5.7 5.7 0 0 1 .945-1.674a5 5 0 0 1 1.124-1.014L6.675 7.38a2.5 2.5 0 1 0 3.446 3.446m-.74-.74A1.5 1.5 0 1 1 7.413 8.12zM6.32 4.2l.854.854Q7.564 5 8 5c2.044 0 3.286.912 4.028 1.817a5.7 5.7 0 0 1 .945 1.674q.025.073.035.109l.008.025v.003l.001.001a.5.5 0 0 0 .966-.257v-.003l-.001-.004l-.004-.013a2 2 0 0 0-.06-.187a6.7 6.7 0 0 0-1.117-1.982C11.905 5.089 10.396 4 8.002 4c-.618 0-1.177.072-1.681.199"
              />
            </svg>
          </button>
        </div>
        <p class="info mt-1 ml-1 text-red-500" v-if="v$.password.$error">
          {{ v$.password.$errors[0].$message }}
        </p>
      </div>
      <div class="form-group flex">
        <input
          type="checkbox"
          name="rememberMe"
          id="rememberMe"
          class="w-4"
          v-model="userInput.remember"
        />
        <label for="rememberMe" class="ml-2 text-[#1c1c1c]">Remember me</label>
      </div>
      <router-link class="text-right text-primary hover:underline"
        >Lupa password?</router-link
      >
      <BaseButton
        :id="'loginBtn'"
        :type="'submit'"
        :variant="'primary'"
        @click="submitForm"
        >Masuk</BaseButton
      >
    </BaseForm>
    <p class="text-center text-[#1c1c1c] font-normal mt-4">
      Belum punya akun? Ayo
      <router-link
        :to="{ name: 'register' }"
        class="text-primary hover:underline"
      >
        daftar
      </router-link>
    </p>
  </div>
</template>

<style scoped>
input {
  transition: transform 0.2s ease-in-out;
}
</style>
