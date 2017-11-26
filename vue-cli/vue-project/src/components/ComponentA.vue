<template>
  <div>
      {{$store.state.count}}
      {{count1}}
      <!-- <button @click="$store.commit('add',10)">add</button>
      <button @click="$store.commit('reduce')">reduce</button> -->
      <button @click="add(10)">add</button>
      <button @click="reduce">reduce</button>
  </div>
</template>
<script>
import ComponentB from "./ComponentB"
import ComponentC from "./ComponentC"
import {mapState,mapMutations} from 'vuex';

export default {
    data(){
        return {
            c: '1111'
        }
    },
    methods: mapMutations(['add','reduce']),
    // computed:{
    //     count(){
    //         return this.$store.state.count;
    //     }
    // },
//     computed:mapState({
//         count: state=>state.count
//     })
    computed  : mapState(["count","count1"]),
    components: {
    ComponentB,
    ComponentC
  }
}
</script>
<style>

</style>
