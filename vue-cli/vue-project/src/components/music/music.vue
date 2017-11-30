<template>
    <div class="music">
        <common-header title="music" nav="<" bgColor="rgb(0, 150, 136)"></common-header>
        <router-view></router-view>
        <common-footer bgColor="rgb(0, 150, 136)"></common-footer>
    </div>
</template>
<script>
import CommonHeader from "../common/CommonHeader"
import CommonFooter from "../common/CommonFooter"
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
  components:{
      CommonHeader,
      CommonFooter
  }
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
</style>

