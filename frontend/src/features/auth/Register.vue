<script setup lang="js">
import useVuelidate from '@vuelidate/core';
import { email, helpers, minLength, required, sameAs } from '@vuelidate/validators';
import { computed, reactive, ref } from 'vue';
import { useRouter } from 'vue-router';

const router = useRouter()

const userInput = reactive({
    fullname: '',
    username: '',
    school: '',
    email: '',
    password: '',
    confirmPassword: ''
})

let isShowPassword = ref(false)

const showedPassword = () => {
    isShowPassword.value = !isShowPassword.value
}

const rules = computed(() => ({
    fullname: {
        required: helpers.withMessage('Nama lengkap wajib diisi', required)
    },
    username: {
        required: helpers.withMessage('Nama pengguna wajib diisi', required)
    },
    school: {
        required: helpers.withMessage('Asal sekolah wajib diisi', required)
    },
    email: {
        required:helpers.withMessage('Email wajib diisi', required),
        email: helpers.withMessage('Email invalid', email)
    },
    password: {
        required: helpers.withMessage('Password wajib diisi', required),
        minlength: helpers.withMessage('Password minimal 8 karakter', minLength(8))
    },
    confirmPassword:{
        required: helpers.withMessage('Konfirmasi password tidak cocok', sameAs(userInput.password))
    } 
}))

const v$ = useVuelidate(rules, userInput)

const submitForm = async () => {
    const result = await v$.value.$validate()
    if(result) {
        return router.push({name: 'home'})
    }
    console.log('Form is invalid', v$.value.$errors)
}
</script>

<template>
    <div id="container">
        <h1 class=" font-bold text-3xl mb-2">Buat Akun Baru</h1>
        <form @submit.prevent>
            <div class="form-group">
                <input class=" p-2.5 w-full rounded-[5px] border border-[#cfcfcf]" type="text" name="fullname" id="fullname"
                    placeholder="Nama lengkap" v-model="userInput.fullname">
                <p class="info mt-1 ml-1 text-red-500" v-if="v$.fullname.$error">{{ v$.fullname.$errors[0].$message }}</p>
            </div>
            <div class="form-group">
                <input class=" p-2.5 w-full rounded-[5px] border border-[#cfcfcf]" type="text" name="username" id="username"
                    placeholder="Nama pengguna" v-model="userInput.username">
                <p class="info mt-1 ml-1 text-red-500" v-if="v$.username.$error">{{ v$.username.$errors[0].$message }}</p>
            </div>
            <div class="form-group">
                <input class=" p-2.5 w-full rounded-[5px] border border-[#cfcfcf]" type="text" name="school" id="school"
                    placeholder="Asal sekolah" v-model="userInput.school">
                <p class="info mt-1 ml-1 text-red-500" v-if="v$.school.$error">{{ v$.school.$errors[0].$message }}</p>
            </div>
            <div class="form-group">
                <input class=" p-2.5 w-full rounded-[5px] border border-[#cfcfcf]" type="email" name="email" id="email"
                    placeholder="Email" v-model="userInput.email">
                <p class="info mt-1 ml-1 text-red-500" v-if="v$.email.$error">{{ v$.email.$errors[0].$message }}</p>
            </div>
            <div class="form-group flex flex-col w-full relative">
                <div class=" relative flex w-full rounded-[5px] border border-[#cfcfcf] ">
                    <input
                        class=" w-[85%] p-[0.6rem] focus:outline-[3px] focus:outline-[#45a8ff8d] focus:border focus:border-primary focus:rounded-xs"
                        :type="isShowPassword ? 'text' : 'password'" name="password" id="password" placeholder="Password"
                        v-model="userInput.password">
                    <button id="togglePassword" type="button" class=" ml-2.5" @click="showedPassword">
                        <svg v-show="isShowPassword === false" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                            viewBox="0 0 24 24" id=" open-eye" class=" transition-transform delay-150 ease-in-out">
                            <g fill="none" stroke="#727272db" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1.5">
                                <path d="M3 13c3.6-8 14.4-8 18 0" />
                                <path d="M12 17a3 3 0 1 1 0-6a3 3 0 0 1 0 6" />
                            </g>
                        </svg>
    
                        <svg v-show="isShowPassword === true" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                            viewBox="0 0 16 16" id=" close-eye" class=" transition-transform delay-150 ease-in-out">
                            <path fill="#727272db"
                                d="m10.12 10.827l4.026 4.027a.5.5 0 0 0 .708-.708l-13-13a.5.5 0 1 0-.708.708l3.23 3.23A6 6 0 0 0 3.2 6.182a6.7 6.7 0 0 0-1.117 1.982c-.021.061-.047.145-.047.145l-.018.062s-.076.497.355.611a.5.5 0 0 0 .611-.355l.001-.003l.008-.025l.035-.109a5.7 5.7 0 0 1 .945-1.674a5 5 0 0 1 1.124-1.014L6.675 7.38a2.5 2.5 0 1 0 3.446 3.446m-.74-.74A1.5 1.5 0 1 1 7.413 8.12zM6.32 4.2l.854.854Q7.564 5 8 5c2.044 0 3.286.912 4.028 1.817a5.7 5.7 0 0 1 .945 1.674q.025.073.035.109l.008.025v.003l.001.001a.5.5 0 0 0 .966-.257v-.003l-.001-.004l-.004-.013a2 2 0 0 0-.06-.187a6.7 6.7 0 0 0-1.117-1.982C11.905 5.089 10.396 4 8.002 4c-.618 0-1.177.072-1.681.199" />
                        </svg>
                    </button>
                </div>
                <p class="info mt-1 ml-1 text-red-500" v-if="v$.password.$error">{{ v$.password.$errors[0].$message }}</p>
            </div>
            <div class="form-group flex flex-col w-full relative">
                <div class=" relative flex w-full rounded-[5px] border border-[#cfcfcf] ">
                    <input
                        class=" w-[85%] p-[0.6rem] focus:outline-[3px] focus:outline-[#45a8ff8d] focus:border focus:border-primary focus:rounded-xs"
                        :type="isShowPassword ? 'text' : 'password'" name="password" id="confirmPassword" placeholder="Konfirmasi Password"
                        v-model="userInput.confirmPassword">
                    <button id="togglePassword" type="button" class=" ml-2.5" @click="showedPassword">
                        <svg v-show="isShowPassword === false" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                            viewBox="0 0 24 24" id=" open-eye" class=" transition-transform delay-150 ease-in-out">
                            <g fill="none" stroke="#727272db" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1.5">
                                <path d="M3 13c3.6-8 14.4-8 18 0" />
                                <path d="M12 17a3 3 0 1 1 0-6a3 3 0 0 1 0 6" />
                            </g>
                        </svg>
    
                        <svg v-show="isShowPassword === true" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                            viewBox="0 0 16 16" id=" close-eye" class=" transition-transform delay-150 ease-in-out">
                            <path fill="#727272db"
                                d="m10.12 10.827l4.026 4.027a.5.5 0 0 0 .708-.708l-13-13a.5.5 0 1 0-.708.708l3.23 3.23A6 6 0 0 0 3.2 6.182a6.7 6.7 0 0 0-1.117 1.982c-.021.061-.047.145-.047.145l-.018.062s-.076.497.355.611a.5.5 0 0 0 .611-.355l.001-.003l.008-.025l.035-.109a5.7 5.7 0 0 1 .945-1.674a5 5 0 0 1 1.124-1.014L6.675 7.38a2.5 2.5 0 1 0 3.446 3.446m-.74-.74A1.5 1.5 0 1 1 7.413 8.12zM6.32 4.2l.854.854Q7.564 5 8 5c2.044 0 3.286.912 4.028 1.817a5.7 5.7 0 0 1 .945 1.674q.025.073.035.109l.008.025v.003l.001.001a.5.5 0 0 0 .966-.257v-.003l-.001-.004l-.004-.013a2 2 0 0 0-.06-.187a6.7 6.7 0 0 0-1.117-1.982C11.905 5.089 10.396 4 8.002 4c-.618 0-1.177.072-1.681.199" />
                        </svg>
                    </button>
                </div>
                <p class="info mt-1 ml-1 text-red-500" v-if="v$.password.$error">{{ v$.confirmPassword.$errors[0].$message }}</p>
            </div>
            <button class=" bg-pr" type="submit" id="registerBtn" @click="submitForm">Daftar</button>
    
            <p class=" text-center text-[#1c1c1c] font-normal mt-2">Sudah punya akun? Ayo <router-link
                    :to="{ name: 'login' }" class=" text-primary hover:underline">
                    masuk
                </router-link></p>
        </form>
    </div>
</template>

<style scoped>
#container {
    display: flex;
    flex-direction: column;
    align-items: center;
    min-height: 100vh;
    justify-content: center;
    row-gap: 1rem;
}

form {
    display: flex;
    flex-direction: column;
    row-gap: 0.8rem;
    width: 100%;
    max-width: 300px;
}

form input {
    transition: transform 0.2s ease-in-out;
}

/* form input[type="text"],
input[type="email"] {
    width: 100%;
    padding: 0.6rem;
    border-radius: 2px;
    border: 1px solid #cfcfcf;
} */

form button {
    padding: 0.6rem;
    border-radius: 2px;
    border: none;
    width: 100%;
    color: white;
    background-color: #0085fa;
}

form .form-group:nth-child(1),
form .form-group:nth-child(2),
form .form-group:nth-child(3),
form .form-group:nth-child(4) {
    position: relative;
    display: flex;
    flex-direction: column;
    width: 100%;
}

/* Group password input */
form .form-group:nth-child(5) input,
form .form-group:nth-child(6) input {
    border: none;
    outline: none;
    padding: 0.6rem;
    width: 95%;
}

form .form-group button {
    width: 20%;
    background: none;

}

form input:focus,
form .form-group:nth-child(5) input:focus,
form .form-group:nth-child(6) input:focus {
    outline: 1px solid #45a8ff8d;
    outline-width: 3px;
    border: 1px solid #0085fa;
    border-radius: 2px;
}
</style>

