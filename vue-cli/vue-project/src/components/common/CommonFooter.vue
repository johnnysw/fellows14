<template>
  <div class="footer">
      <ul>
        <li>电影</li>
        <li>音乐</li>
        <li>书籍</li>
        <li>图片</li>
      </ul>
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
      .footer{
        height    : 1rem;
        background: rgb(33, 150, 243);
        position  : fixed;
        bottom    : 0;
        width     : 100%;
      }
      .footer ul{
        display: flex;
      }
      .footer li{
        flex       : 1;
        color      : #fff;
        line-height: 1rem;
        text-align : center;
      }
  
</style>
