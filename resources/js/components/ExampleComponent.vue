<template>
    <img alt="Vue logo" src="/assets/logo.png">
    <Main msg="Welcome to Your Vue.js App"/>
  </template>

<script>
import Main from "./Main.vue"
    export default {
        components:{
            Main
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
<style>
    #app {
    font-family: Avenir, Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: #2c3e50;
    margin-top: 60px;
    }
</style>