<script setup lang="js">
import { ref } from 'vue';

const userInput = ref({
    fullname: '',
    username: '',
    school: '',
    email: '',
    password: '',
    confirmPassword: ''
})

const submitForm = () => {
    alert("User registered")
    alert(userInput.value)
}
</script>

<template>
    <div id="container">
        <h1 class=" font-bold text-3xl mb-2">Buat Akun Baru</h1>
        <form>
            <input type="text" name="fullname" id="fullname" placeholder="Nama lengkap" v-model="userInput.fullname">
            <input type="text" name="username" id="username" placeholder="Nama pengguna" v-model="userInput.username">
            <input type="text" name="school" id="school" placeholder="Asal sekolah" v-model="userInput.school">
            <input type="email" name="email" id="email" placeholder="Email" v-model="userInput.email">
            <div class="form-group">
                <input type="password" name="password" id="password" placeholder="Password" v-model="userInput.password">
                <button id="togglePassword" type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" id=" show-password"
                        x-show="showPassword" class=" transition-transform delay-150 ease-in-out">
                        <g fill="none" stroke="#727272db" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                            <path d="M3 13c3.6-8 14.4-8 18 0" />
                            <path d="M12 17a3 3 0 1 1 0-6a3 3 0 0 1 0 6" />
                        </g>
                    </svg>
                </button>
            </div>
            <div class="form-group">
                <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Konfirmasi password" v-model="userInput.confirmPassword">
                <button id="togglePassword" type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" id=" show-password"
                        x-show="showPassword" class=" transition-transform delay-150 ease-in-out">
                        <g fill="none" stroke="#727272db" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                            <path d="M3 13c3.6-8 14.4-8 18 0" />
                            <path d="M12 17a3 3 0 1 1 0-6a3 3 0 0 1 0 6" />
                        </g>
                    </svg>
                </button>
            </div>
            <button type="submit" id="registerBtn" @click="submitForm()">Daftar</button>
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

form input[type="text"],
input[type="email"] {
    width: 100%;
    padding: 0.6rem;
    border-radius: 2px;
    border: 1px solid #cfcfcf;
}

form button {
    padding: 0.6rem;
    border-radius: 2px;
    border: none;
    width: 100%;
    color: white;
    background-color: #0085fa;
}

form .form-group {
    position: relative;
    display: flex;
    width: 100%;
    border-radius: 2px;
    border: 1px solid #cfcfcf;
    padding: 0;
}

form .form-group input {
    border: none;
    outline: none;
    padding: 0.6rem;
    width: 80%;
}

form .form-group button {
    width: 20%;
    background: none;

}

form input:focus {
    outline: 1px solid #45a8ff8d;
    outline-width: 3px;
    border: 1px solid #0085fa;
    border-radius: 2px;
}
</style>

