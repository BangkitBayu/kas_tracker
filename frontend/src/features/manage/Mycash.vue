<script setup lang="js">
import { ref } from 'vue';
import BaseTemplate from '../../BaseTemplate.vue';
import BaseButton from '../../components/BaseButton.vue';
import BaseModal from '../../components/BaseModal.vue';
import BaseTable from '../../components/BaseTable.vue';

let isCloseModal = ref(false)

const closeModal = () => {
    isCloseModal.value = !isCloseModal.value
    console.log(closeModal.value)
}

// const mockCashApi = []
const mockCashApi = [
    {
        id: 1,
        name: 'Kas Mei Minggu ke-1',
        nominal: 2000,
        date: '07-05-2026'
    },
    {
        id: 2,
        name: 'Kas Mei Minggu ke-2',
        nominal: 2000,
        date: '14-05-2026'
    },
]

</script>
<template>
    <BaseTemplate>
        <template #main>
            <main class=" min-h-screen p-2 relative flex flex-col space-y-5">
                <div class=" flex gap-2 mt-3 shadow w-full p-3 rounded">
                    <BaseButton :id="'createNewCashBtn'" :type="'button'" :variant="'dark'" @click="closeModal">Create cash
                    </BaseButton>
                    <!-- <BaseButton :id="'editCashBtn'" :type="'button'" :variant="'darkOutline'">Edit cash</BaseButton> -->
                </div>
    
                <BaseTable>
                    <template #tableBody>
                        <thead class=" text-black/80 border-b border-black/20 text-center">
                            <tr>
                                <th scope="col" class=" text-sm lg:text-lg  px-4 py-2 font-medium">Name</th>
                                <th scope="col" class=" text-sm lg:text-lg px-4 py-2 font-medium">Nominal</th>
                                <th scope="col" class=" text-sm lg:text-lg px-4 py-2 font-medium">Date</th>
                                <th scope="col" class=" text-sm lg:text-lg px-4 py-2 font-medium">Actions</th>
                            </tr>
                        </thead>
                        <tbody class=" text-black/70 " v-if="mockCashApi.length <= 0">
                            <tr>
                                <td class=" font-bold text-sm text-center py-10" colspan="4"> No data available</td>
                            </tr>
                        </tbody>
                        <tbody class=" text-black/70 " v-else>
                            <tr v-for=" item in mockCashApi" :key="item.id" class=" border border-black/20 text-center">
                                <td scope="col" class=" px-4 py-3 text-sm whitespace-nowrap">{{ item.name }}</td>
                                <td scope="col" class=" px-4 py-3 text-sm">{{ item.nominal }}</td>
                                <td scope="col" class=" px-4 py-3 text-sm whitespace-nowrap">{{ item.date }}</td>
                                <div class=" flex gap-2 px-4 py-3 justify-center">
                                    <router-link>
                                        <BaseButton :id="'detailBtn'" :type="'button'"
                                            :custom-class="' bg-gray-500 flex items-center justify-center m-auto hover:bg-gray-600'">
                                            <svg class=" stroke-white fill-white" xmlns="http://www.w3.org/2000/svg"
                                                width="20" height="20" viewBox="0 0 36 36">
                                                <path
                                                    d="M32 6H4a2 2 0 0 0-2 2v20a2 2 0 0 0 2 2h28a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2m0 22H4V8h28Z"
                                                    class="clr-i-outline clr-i-outline-path-1" stroke-width="1" />
                                                <path d="M9 14h18a1 1 0 0 0 0-2H9a1 1 0 0 0 0 2"
                                                    class="clr-i-outline clr-i-outline-path-2" stroke-width="1" />
                                                <path d="M9 18h18a1 1 0 0 0 0-2H9a1 1 0 0 0 0 2"
                                                    class="clr-i-outline clr-i-outline-path-3" stroke-width="1" />
                                                <path d="M9 22h10a1 1 0 0 0 0-2H9a1 1 0 0 0 0 2"
                                                    class="clr-i-outline clr-i-outline-path-4" stroke-width="1" />
                                            </svg>
                                        </BaseButton>
                                    </router-link>
                                    <router-link>
                                        <BaseButton :id="'editBtn'" :type="'button'"
                                            :custom-class="' bg-blue-500 flex items-center justify-center m-auto hover:bg-blue-600'">
                                            <svg class=" stroke-white fill-white" xmlns="http://www.w3.org/2000/svg"
                                                width="20" height="20" viewBox="0 0 1024 1024">
                                                <path
                                                    d="M832 512a32 32 0 1 1 64 0v352a32 32 0 0 1-32 32H160a32 32 0 0 1-32-32V160a32 32 0 0 1 32-32h352a32 32 0 0 1 0 64H192v640h640z"
                                                    stroke-width="25.5" />
                                                <path
                                                    d="m470 554.2l52.8-7.5L847 222.4a32 32 0 1 0-45.2-45.2L477.4 501.4l-7.5 52.8zm422.4-422.4a96 96 0 0 1 0 135.8L560.5 599.5a32 32 0 0 1-18.1 9l-105.6 15.2a32 32 0 0 1-36.2-36.2l15-105.6a32 32 0 0 1 9.1-18.2l332-331.8a96 96 0 0 1 135.7 0z"
                                                    stroke-width="25.5" />
                                            </svg>
                                        </BaseButton>
                                    </router-link>
                                    <router-link>
                                        <BaseButton :id="'deleteBtn'" :type="'button'"
                                            :custom-class="' bg-red-500 flex items-center justify-center m-auto hover:bg-red-600'">
                                            <svg class=" stroke-white fill-white" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24">
                                                <path  fill-rule="evenodd"
                                                    d="m6.774 6.4l.812 13.648a.8.8 0 0 0 .798.752h7.232a.8.8 0 0 0 .798-.752L17.226 6.4h1.203l-.817 13.719A2 2 0 0 1 15.616 22H8.384a2 2 0 0 1-1.996-1.881L5.571 6.4zM9.5 9h1.2l.5 9H10zm3.8 0h1.2l-.5 9h-1.2zM4.459 2.353l15.757 2.778a.5.5 0 0 1 .406.58L20.5 6.4L3.758 3.448l.122-.69a.5.5 0 0 1 .579-.405m6.29-1.125l3.94.695a.5.5 0 0 1 .406.58l-.122.689l-4.924-.869l.122-.689a.5.5 0 0 1 .579-.406z"
                                                    stroke-width="0.5"  />
                                            </svg>
                                        </BaseButton>
                                    </router-link>
                                </div>
                            </tr>
                        </tbody>
                    </template>
                </BaseTable>
    
    
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
                            <BaseButton :id="'cancelBtn'" :type="'button'" :variant="'dark'" @click="closeModal">Cancel
                            </BaseButton>
                            <BaseButton :id="'cancelBtn'" :type="'submit'" :variant="'darkOutline'" form="newCashForm">
                                Create</BaseButton>
                        </div>
                    </template>
                </BaseModal>
            </main>
        </template>
    </BaseTemplate>
</template>
