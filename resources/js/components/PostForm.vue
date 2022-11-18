<template>
    <div>
        <input type="text" class="inp" name="" id="" v-model="value">
        <button class="btn" @click="handleDataFc()">Проверка</button>
    </div>

</template>

<script>
    export default {
        name: "PostElem",
        data() {
            return{
                title: "Davlet",
                value: ""
            }
        },
        props: {
            newValue: {
                default: 4885,
                required: true
            }
        },
        methods: {
            handleDataFc: function () {
                this.$emit('interface', this.value) 
            }
        },

    }
</script>

<style lang="css" >
    .inp{
        padding: 8px 12px;
        border-radius: 4px;
        font-size: 16px;
        outline: none;
        border: 1px solid rgb(35, 109, 158);
        color: #333;
        display: block;
        width: calc(100% - 120px);
        margin: 24px auto;
    }
    .btn{
        color: #333;
        border: 1px solid rgb(10, 161, 91);
        padding: 12px 28px;
        font-size: 22px;
        border-radius: 24px;
    }
    .btn:hover{
        background-color: rgb(0, 82, 82);
        color: white;
        cursor: pointer;
    }
    .btn:active{
        background-color: rgb(3, 100, 100);
        font-size: 23px;
    }
</style>