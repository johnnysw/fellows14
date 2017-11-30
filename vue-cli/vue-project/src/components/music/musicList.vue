<template>
    <div class="music-list">
        <ul class='albums'>
           
            <li v-for='obj in musicList' :key="obj.id">
                <router-link :to="'/music/music_player/'+obj.id">
                    <img :src="obj.bg" alt="">
                </router-link>
            </li>
        </ul>
    </div>
</template>
<script>
import Axios from 'axios'
export default {
    data(){
        return {
            musicList: []
        }
    },
    mounted(){
        Axios.get('/static/musiclist.json')
        .then((res)=>{
            this.musicList = res.data.albums;
        })
    },
}
</script>
<style>
    .albums{
        position: absolute;
        top     : 1rem;
        bottom  : 1rem;
        width   : 100%;
    }
    .albums li{
        width : 50%;
        height: 33.33%;
        float : left;
    }
    .albums li img{
         width : 100%;
         height: 100%;
    }
</style>

