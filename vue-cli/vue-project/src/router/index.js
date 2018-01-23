import Vue from 'vue'
import Router from 'vue-router'
import HelloWorld from '@/components/HelloWorld'
import Movie from '@/components/movie/Movie'
import Music from '@/components/music/Music'
import Book from '@/components/book/Book'
import Photo from '@/components/photo/Photo'
import ComponentA from '@/components/ComponentA'
import MovieTop250 from '@/components/movie/MovieTop250'
import Albums from '@/components/music/musicList'
import Player from '@/components/music/MusicPlayer'
import PhotoDetail from '@/components/photo/PhotoDetail'
import Login from '@/components/welcome/Login'
import Index from '@/components/welcome/Index'

// import CommonFooter from '@/components/common/CommonFooter'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path     : '/login',
      component: Login
    },
    {
      path     : '/index',
      component: Index
    },
    {
      path: '/',
      // component: 
      redirect: '/movie/top250'
    },
    {
      path     : '/movie',
      component: Movie,
      redirect : '/movie/top250',
      children : [
        {path:'/movie/top250',component:MovieTop250},
        {path:'/movie/hot',component:MovieTop250},
        {path:'/movie/coming',component:MovieTop250}
      ]
    },
    {
      path     : '/music',
      component: Music,
      redirect : '/music/music_albums',
      children : [
        {path:'/music/music_albums',component:Albums},
        {path:'/music/music_player/:id',component:Player}
      ]
    },
    {
      path     : '/book',
      component: Book
    },
    {
      path     : '/photo',
      component: Photo
    },
    {
      path     : '/photo_detail/:index',
      component: PhotoDetail
    }
  ]
})
