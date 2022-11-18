<template lang="">
    <div class="list">
        <div class="list_container">
            <ListItem v-for="(domain, index) in domains" :num="++index" :title="domain.title" :date="domain.date" :avialable="domain.free">
            </ListItem>
            
            <button class="btn" @click="clear()" style="background: #546567; color: white" >Очистить</button>
        </div>
    </div>
</template>
<script>
import ListItem from "./ListItem.vue"
    export default {
        components: {ListItem},
        name: "List",
        data: () => {
            return{

            }
        },
        props: {
            domains:{
                require: false,
                default: []
            },
            clear: {
                require: true
            }
        }
    }
</script>
<style scoped>
    .list{
        max-width: 800px;
        padding: 34px;
        margin: 48px auto;
        
    }
    .list_container{
        width: 100%;
    }
    .list_btn{
        color: black;
    }
</style>