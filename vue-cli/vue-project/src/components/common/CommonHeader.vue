<template>
  <div class="header">
      <button>首页</button>
      <h2>movie</h2>
  </div>
</template>

<script>
export default {
  name: 'HelloWorld',
  data () {
    return {
      msg: 'Welcome to Your Vue.js App'
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
