import Vue from 'vue'
import Router from 'vue-router'
import Movie from '@/components/movie/Movie'
import MovieTop250 from '@/components/movie/MovieTop250'
import Music from '@/components/music/Music'
import Book from '@/components/book/Book'
import Photo from '@/components/photo/Photo'
import PhotoDetail from '@/components/photo/PhotoDetail'
import MusicAlbums from '@/components/music/MusicAlbums'
import MusicList from '@/components/music/MusicList'
Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      redirect:'/movie/top250'
    },
    {
      path: '/movie',
      name: 'Movie',
      component: Movie,
      children: [
        { path: "/movie/top250", component: MovieTop250 },
        { path: "/movie/hot", component: MovieTop250 },
        { path: "/movie/coming", component: MovieTop250 }
      ]
    },
    {
      path: '/music',
      redirect:'/music/music_albums'
    },
    {
      path: '/music',
      name: 'Music',
      component: Music,
      children: [
        { path: "/music/music_albums", component: MusicAlbums },
        { path: "/music/music_list/:id", component: MusicList },
      ]
    },
    {
      path: '/book',
      name: 'Book',
      component: Book
    },
    {
      path: '/photo',
      name: 'Photo',
      component: Photo
    },
    {
      path: '/photo/detail/:index',
      name: 'PhotoDetail',
      component: PhotoDetail
    }
  ]
})
