<script setup lang="js">
import Footer from './components/Footer.vue';
import Header from './components/Header.vue';

</script>

<template>
    <Header></Header>
    <slot name="main"></slot>
    <Footer></Footer>
</template>