<template>
  <div class="footer" :style="{background:bgColor}">
      <ul>
        <li><router-link to='/movie'>电影</router-link></li>
        <li><router-link to="/music">音乐</router-link></li>
        <li><router-link to="/book">书籍</router-link></li>
        <li><router-link to="/photo">图片</router-link></li>
      </ul>
  </div>
</template>

<script>
export default {
  props: ['bgColor'],
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
        line-height: 1rem;
        text-align : center;
      }
      .footer li a{
        color: #ccc;
      }
      .footer li a.router-link-active{
        color: #fff;
      }
  
</style>
