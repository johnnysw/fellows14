import Vue from 'vue'
import Router from 'vue-router'
import HelloWorld from '@/components/HelloWorld'
import Movie from '@/components/movie/Movie'
import Music from '@/components/music/Music'
import Book from '@/components/book/Book'
import Photo from '@/components/photo/Photo'

// import CommonFooter from '@/components/common/CommonFooter'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path     : '/',
      name     : 'HelloWorld',
      component: HelloWorld
    },
    {
      path     : '/movie',
      component: Movie
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
