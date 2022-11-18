<template>
  <div class="hello">
    <h2>
      {{
        text
      }}
    </h2>
    <h2 style="color: red">
      {{
        errorText
      }}
    </h2>
    <PostElem :newValue="123 + 23234" @interface="hundleClick"/>
    <List :domains="this.domains" :clear="clear"></List>
  </div>
</template>

<script>
import PostElem from "./PostForm.vue"
import List from "./ListComponent.vue"
export default {
  name: 'Main',
  components: {PostElem, List},
  data: () => {
    return{
      text: "",
      errorText: "",
      domains: [
      ]
    }
  },
  props: {
    msg: String
  },
  methods: {
    async hundleClick(param) {
      const existDomen = await fetch("http://127.0.0.1:8000/api/domen?test=" + param).then(res => res.json())
      console.log(existDomen.data)
      if(existDomen.available){
        this.text = "Домен " + existDomen.data + " свободен."
        this.domains = [...this.domains,{
          title: existDomen.data,
          date: existDomen.date_reg,
          free: existDomen.available? "свободен":"занят"
        }]
      }else{
        this.text = "Домен " + existDomen.data + " занят."
        this.domains = [...this.domains, {
          title: existDomen.data,
          date: existDomen.date_reg,
          free: existDomen.available? "свободен":"занят"
        }]
      }
    },
    clear() {
      this.domains = []
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>
