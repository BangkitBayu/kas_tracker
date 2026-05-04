<script setup lang="js">
import { computed } from 'vue';

const btnProps = defineProps({
    id: {
        type: String,
        default: null,
    },
    type: {
        type: String,
        default: 'button',
    },
    variant: {
        type: String,
    },
    customClass: String
})

const rulesVariant = {
    primary: 'bg-primary text-white hover:bg-blue-600',
    primaryOutline: 'bg-transparent border border-primary text-primary',
    danger:  'bg-red-500 text-white',
    dark: 'bg-black text-white hover:bg-black/80',
    darkOutline: 'bg-transparent border border-black text-black hover:bg-black hover:text-white'
}

// console.log(rulesVariant.value)
</script>

<template>
    <button :id="btnProps.id" :type="btnProps.type"
        :class="[rulesVariant[btnProps.variant] || '', 'rounded-[5px] w-full p-[0.6rem] text-sm transition-all ease-in duration-300' , btnProps.customClass]">
        <slot></slot>
    </button>
</template>

