<template>
  <div id="header" :style="{background:$store.state.bgColor}">
    <slot>
      <button @click="back">{{$store.state.btn}}</button>
    </slot>
    <h2>{{$store.state.title}}</h2>
  </div>
</template>

<script>
export default {
  name: 'header',
  data () {
    return {

    }
  },
  methods:{
    back(){
        history.go(-1);
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  /*@import '../../assets/css/reset.css';*/
  #header{
    height: 1rem;
    display: flex;
    position: fixed;
    top:0;
    width: 100%;
  }
  #header button{
    width: 1rem;
    height: 1rem;
    color: #fff;
  }
  #header h2{
    flex:1;
    height: 1rem;
    color: #fff;
    text-align: center;
    margin-left: -1rem;
  }
</style>
