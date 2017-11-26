import Vue from 'vue'
import Router from 'vue-router'
import HelloWorld from '@/components/HelloWorld'
import Movie from '@/components/movie/Movie'
import Music from '@/components/music/Music'
import Book from '@/components/book/Book'
import Photo from '@/components/photo/Photo'
import ComponentA from '@/components/ComponentA'
import MovieTop250 from '@/components/movie/MovieTop250'

// import CommonFooter from '@/components/common/CommonFooter'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path     : '/',
      component: ComponentA
    },
    {
      path     : '/movie',
      component: Movie,
      children : [
        {path:'/movie/top250',component:MovieTop250},
        {path:'/movie/hot',component:MovieTop250},
        {path:'/movie/coming',component:MovieTop250}
      ]
    },
    {
      path     : '/music',
      component: Music
    },
    {
      path     : '/book',
      component: Book
    },
    {
      path     : '/photo',
      component: Photo
    }
  ]
})
