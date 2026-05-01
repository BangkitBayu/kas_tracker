<script setup lang="js">
import { ref } from 'vue';
import BaseTemplate from '../../BaseTemplate.vue';
import BaseButton from '../../components/BaseButton.vue';
import BaseModal from '../../components/BaseModal.vue';

let isCloseModal = ref(false)

const closeModal = () => {
    isCloseModal.value = !isCloseModal.value
    console.log(closeModal.value)
}

</script>
<template>
    <BaseTemplate>
        <template #main>
            <main class=" min-h-screen p-2 relative">
                <div class=" flex gap-2 mt-3 shadow w-full p-3 rounded">
                    <BaseButton :id="'createNewCashBtn'" :type="'button'" :variant="'dark'" @click="closeModal">Create cash</BaseButton>
                    <BaseButton :id="'editCashBtn'" :type="'button'" :variant="'darkOutline'">Edit cash</BaseButton>
                </div>
    
                <BaseModal :id="'createNewCashModal'" :hidden="isCloseModal">
                    <template #header>
                        <div class=" flex items-center justify-between">
                            <h3 class=" text-lg text-black/80">Create new cash</h3>
                            <button class=" group" type="button" @click="closeModal">
                                <svg class=" stroke-black/80 group-hover:stroke-red-500 transition-all ease-in-out duration-300"
                                    xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24">
                                    <path fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="m7 7l10 10M7 17L17 7" />
                                </svg>
                            </button>
                        </div>
                        <hr class="mt-4 text-black/20">
                    </template>
                    <template #main>
                        <BaseForm :id="'newCashForm'">
                            <div class=" mt-4 mb-4 flex flex-col space-y-3">
                                <div class="form-group flex flex-col w-full relative">
                                    <input
                                        class=" p-2.5 w-full rounded-[5px] border border-[#cfcfcf] focus:outline-[3px] focus:outline-[#45a8ff8d] focus:border-primary focus:rounded-xs"
                                        type="text" name="nameCash" id="nameCash" placeholder="Nama kas">
                                    <!-- <p class="info mt-1 ml-1 text-red-500" v-if="v$.email.$error">{{
                                                                                                            v$.email.$errors[0].$message }}</p> -->
                                </div>
    
                                <div class="form-group flex flex-col w-full relative">
                                    <input
                                        class=" p-2.5 w-full rounded-[5px] border border-[#cfcfcf] focus:outline-[3px] focus:outline-[#45a8ff8d] focus:border-primary focus:rounded-xs"
                                        type="number" name="nominalCash" id="nominalCash" placeholder="Nominal kas">
                                    <!-- <p class="info mt-1 ml-1 text-red-500" v-if="v$.email.$error">{{
                                                                                        v$.email.$errors[0].$message }}</p> -->
                                </div>
    
                                <div class="form-group flex flex-col w-full relative">
                                    <input
                                        class=" p-2.5 w-full rounded-[5px] border border-[#cfcfcf] focus:outline-[3px] focus:outline-[#45a8ff8d] focus:border-primary focus:rounded-xs"
                                        type="date" name="dateCash" id="dateCash" placeholder="Nominal kas">
                                    <!-- <p class="info mt-1 ml-1 text-red-500" v-if="v$.email.$error">{{
                                                                                            v$.email.$errors[0].$message }}</p> -->
                                </div>
                            </div>
                        </BaseForm>
                        <hr class="mt-4 text-black/20">
                    </template>
                    <template #footer>
                        <div class=" flex space-x-2 mt-4">
                            <BaseButton :id="'cancelBtn'" :type="'button'" :variant="'dark'" @click="closeModal">Cancel</BaseButton>
                            <BaseButton :id="'cancelBtn'" :type="'submit'" :variant="'darkOutline'" form="newCashForm">Create</BaseButton>
                        </div>
                    </template>
                </BaseModal>
            </main>
        </template>
    </BaseTemplate>
</template>
