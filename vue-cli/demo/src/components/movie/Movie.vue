<template>
  <div id="movie">
    <common-header>
      <button>首页</button>
    </common-header>
    <movie-nav></movie-nav>
    <!--<movie-top250></movie-top250>-->
    <router-view></router-view>
    <common-footer></common-footer>
  </div>
</template>

<script>
  import CommonHeader from '@/components/common/Header'
  import CommonFooter from '@/components/common/Footer'
  import MovieNav from '@/components/movie/MovieNav'
  import MovieTop250 from '@/components/movie/MovieTop250'
export default {
  name: 'header',
  data () {
    return {

    }
  },
  mounted(){
    this.$store.dispatch('changeTitle',['movie','rgb(33, 150, 243)','首页']);
  },
  components:{
    CommonHeader,
    CommonFooter,
    MovieNav,
    MovieTop250
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  /*@import '../../assets/css/reset.css';*/

</style>
