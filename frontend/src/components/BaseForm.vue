<script setup lang="js">
const formProps = defineProps({
    id: String
})
</script>
<template>
    <form @submit.prevent class=" flex flex-col w-full max-w-75 gap-y-2.5 " :id="formProps.id">
        <slot></slot>
    </form>
</template>