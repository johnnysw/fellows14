<template>
  <ul id="footer" :style="{background:$store.state.bgColor}">
    <li><router-link to="/movie/top250">电影</router-link></li>
    <li><router-link to="/music">音乐</router-link></li>
    <li><router-link to="/book">书籍</router-link></li>
    <li><router-link to="/photo">图片</router-link></li>
  </ul>
</template>

<script>
export default {
  name: 'header',
  data () {
    return {

    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  /*@import '../../assets/css/reset.css';*/
  #footer{
    height: 1rem;
    display: flex;
    background: rgb(33, 150, 243);
    position: fixed;
    bottom: 0;
    width: 100%;
  }
  #footer li{
    flex: 1;
    color: #ccc;
    text-align: center;
    line-height: 1rem;
  }

  #footer li a{
    color: #ccc;
    outline: none;
  }
  #footer li a.router-link-active{
    color: #fff;
  }
</style>
