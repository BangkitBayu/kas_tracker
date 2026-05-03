<script setup lang="js"></script>
<template>
    <div class=" relative border border-black/20 rounded overflow-x-auto w-full">
        <table class=" w-full table-auto">
            <slot name="tableBody"></slot>
        </table>
    </div>
</template>