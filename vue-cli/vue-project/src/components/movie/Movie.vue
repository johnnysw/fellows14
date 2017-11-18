<template>
  <div class="movie">
      <common-header></common-header>
      <movie-nav></movie-nav>
      <div class='list'>
        <movie-list></movie-list>
      </div>
      <common-footer></common-footer>
  </div>
</template>

<script>
import CommonHeader from "../common/CommonHeader"
import CommonFooter from "../common/CommonFooter"
import MovieNav from "./MovieNav"
import MovieList from "./MovieList"
export default {
  name: 'HelloWorld',
  data () {
    return {
      movieList:[
        
      ]
    }
  },
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
