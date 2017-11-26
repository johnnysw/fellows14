<template>
  <div>
      {{$store.state.count}}
      <button @click="$store.commit('add',10)">add</button>
      <button @click="$store.commit('reduce')">reduce</button>
  </div>
</template>
<script>
import ComponentB from "./ComponentB"
import ComponentC from "./ComponentC"
export default {
    data(){
        return {
            c: '1111'
        }
    },
    methods:{
        change(arg){
            this.c = arg;
        }
    },
  components:{
    ComponentB,
    ComponentC
  }
}
</script>
<style>

</style>
