<template>
  <div class="header" :style="{background:bgColor}">
      <slot>
        <button @click="back">{{nav}}</button>
      </slot>
      <h2>{{title}}</h2>
  </div>
</template>

<script>
export default {
  props: ['title','bgColor','nav'],
  data () {
    return {
      
    }
  },
  methods:{
    back(){
      // history.go(-1);
      this.$router.go(-1);
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
      .header{
        height    : 1rem;
        background: rgb(33, 150, 243);
        display   : flex;
        color     : #fff;
        position  : fixed;
        top       : 0;
        width     : 100%;
      }
      .header button{
        width : 1rem;
        height: 1rem;
        color : #fff;
      }
      .header h2{
        flex       : 1;
        text-align : center;
        text-indent: -1rem;
      }
</style>
