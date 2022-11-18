

<template lang="">
    <div class="list-item">
        <div class="list-item_container">
            <div class="list-item_num">
                {{
                    this.num
                }}
            </div>
            <div class="list-item_title">
                {{
                    title
                }}
            </div>
            <div class="list-item_date">
                {{
                    date
                }}
            </div>
            <div class="list-item_avialable">
                {{
                    avialable
                }}
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "ListItem",
    props: {
        num: Number,
        title: String,
        date: String,
        avialable: String
    }
}
</script>
<style>
    .list-item{
        margin: 8px;
    }
    .list-item_container{
        padding: 12px;
        box-shadow: 2px 2px 9px green;
        display: flex;
    }
    .list-item_num{
        width: 48px
    }
    .list-item_title{
        width: 280px
    }
    .list-item_date{
        width: 180px
    }
    .list-item_avialable{
        width: 180px
    }
</style>