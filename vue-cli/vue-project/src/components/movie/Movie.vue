<template>
  <div class="movie">
      <common-header title="movie" bgColor="rgb(33, 150, 243)" nav="首页">
        <button>首页</button>
      </common-header>
      <movie-nav></movie-nav>
      <router-view></router-view>
      <div class='loading' v-show="isShow">
          <img src="/static/img/loading.gif" alt="">
      </div>
      <common-footer bgColor="rgb(33, 150, 243)"></common-footer>
  </div>
</template>

<script>
import CommonHeader from "../common/CommonHeader"
import CommonFooter from "../common/CommonFooter"
import MovieNav from "./MovieNav"
import MovieList from "./MovieList"
import Axios from 'axios'
export default {
  name: 'HelloWorld',
  data () {
    return {
      movieList: [],
      isShow   : false
    }
  },
  mounted(){
    let _this           = this;
        window.onscroll = function(){
      let scrollTop    = document.documentElement.scrollTop;
      let clientHeight = document.documentElement.clientHeight;
      let htmlHeight   = document.documentElement.scrollHeight;
      if(scrollTop + clientHeight >= htmlHeight){
          _this.isShow = true;
          _this.loadData();
      }
    }
    //https://api.douban.com/v2/movie/top250?count=10&start=10
    this.loadData();
  },
  methods:{
    loadData(){
       Axios.get(API_PROXY + "http://m.maoyan.com/movie/list.json?type=hot&offset="+this.movieList.length+"&limit=10")
        .then((res)=>{
          this.movieList = this.movieList.concat(res.data.data.movies);
          this.isShow    = false;
        });
    }
  }
  ,
  components: {
    CommonHeader,
    CommonFooter,
    MovieNav,
    MovieList
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
    .list{
       margin: 2rem 0 1.6rem;
    }
    .loading{
       margin-bottom: 1rem;
       text-align   : center;
    }
</style>
