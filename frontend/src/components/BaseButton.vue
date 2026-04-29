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
    }

})

const rulesVariant = {
    primary: 'bg-primary text-white'    
}

// console.log(rulesVariant.value)
</script>

<template>
    <button :id="btnProps.id" :type="btnProps.type" :class="[rulesVariant[btnProps.variant] || '', 'rounded-[5px] w-full p-[0.6rem] text-sm']">
        <slot></slot>
    </button>
</template>

