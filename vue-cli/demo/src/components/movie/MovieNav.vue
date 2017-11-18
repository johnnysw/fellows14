<template>
  <ul id="nav">
    <li><router-link to="/movie/top250">top250</router-link></li>
    <li><router-link to="/movie/hot">正在热映</router-link></li>
    <li><router-link to="/movie/coming">即将上映</router-link></li>
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
  #nav{
    height: 1rem;
    display: flex;
    background: rgb(33, 150, 243);
    position: fixed;
    top:1rem;
    width: 100%;
  }
  #nav li{
    flex: 1;
    text-align: center;
    line-height: 1rem;
  }
  #nav li a{
    color: #ccc;
    outline: none;
  }
  #nav li a.router-link-active{
    color: #fff;
  }
</style>
