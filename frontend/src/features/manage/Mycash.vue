<script setup lang="js">
import BaseTemplate from '../../BaseTemplate.vue';
import BaseButton from '../../components/BaseButton.vue';

</script>
<template>
    <BaseTemplate>
        <template #main>
            <main class=" min-h-screen p-2">
                <div class=" flex gap-2 mt-3 shadow w-full p-3 rounded">
                    <BaseButton :id="'createNewCashBtn'" :type="'button'" :variant="'black'">Create New Cash</BaseButton>
                    <BaseButton :id="'editCashBtn'" :type="'button'" :variant="'blackOutline'">Edit Cash</BaseButton>
                </div>
            </main>
        </template>
    </BaseTemplate>
</template>
