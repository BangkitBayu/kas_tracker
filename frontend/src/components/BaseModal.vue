<script setup lang="js">
const modalProps = defineProps({
    id: String,
    hidden: Boolean
})
</script>

<template>
    <div id="modal" class="fixed inset-0 bg-black/50 flex items-center justify-center z-10" v-show="modalProps.hidden">
        <div :id="modalProps.id" class=" rounded shadow absolute bg-white w-full h-auto max-w-xs p-4 border border-black/60">
            <slot name="header"></slot>
            <slot name="main"></slot>
            <slot name="footer"></slot>
        </div>
    </div>
</template>