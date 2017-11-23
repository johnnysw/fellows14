<template>
  <div class="movie">
      <common-header></common-header>
      <movie-nav></movie-nav>
      <div class='list'>
        <movie-list v-for="obj in movieList" :title="obj.title" :year="obj.year"
        :avg = "obj.rating.average" :img = "obj.images.large" :desc = "obj.genres"
        ></movie-list>
      </div>
      <common-footer></common-footer>
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
      movieList: []
    }
  },
  mounted(){
    Axios.get(API_PROXY + "https://api.douban.com/v2/movie/top250?count=10&start=10")
    .then((res)=>{
      this.movieList = res.data.subjects;
      console.log(res.data.subjects);
    });
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
       margin-top: 2rem;
    }
</style>
