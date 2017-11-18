<template>
  <div class="nav">
      <ul>
        <li>top250</li>
        <li>正在热映</li>
        <li>即将上映</li>
      </ul>
  </div>
</template>

<script>
export default {
  name: 'HelloWorld',
  data () {
    return {
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
      .nav{
        height    : 1rem;
        background: rgb(33, 150, 243);
        position  : fixed;
        top       : 1rem;
        width     : 100%;
      }
      .nav ul{
        display: flex;
      }
      .nav li{
        flex       : 1;
        color      : #fff;
        line-height: 1rem;
        text-align : center;
      }
  
</style>
