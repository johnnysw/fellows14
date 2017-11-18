<template>
      <div id="music_list">
        <a-player :music="songList" :showlrc="3" :narrow="false" theme="#b7daff"
                  mode="circulation" v-if="flag" listmaxheight='500px' ref="player">
        </a-player>
      </div>
</template>

<script>
  import APlayer from 'vue-aplayer'
  import Axios from 'axios'
export default {
  name: 'header',
  data () {
    return {
      list:[],
      songList:[],
      flag:false
    }
  },
  mounted(){
//    this.$store.dispatch('changeTitle',['music','rgb(0, 150, 136)']);
    Axios.get('/static/music-data.json').then((res)=>{
      this.list = res.data.musicData;
      for(var i=0;i<this.list.length;i++){
        var obj = {};
        obj.title = this.list[i].title;
        obj.author = this.list[i].author;
        obj.url = this.list[i].src;
        obj.pic = this.list[i].musicImgSrc;
        obj.lrc = "/static/"+this.list[i].lrc;
        this.songList.push(obj);
      }
      this.flag = true;
  });
//    console.log(this.$route.params.id);
  },
  components:{
    APlayer
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  /*@import '../../assets/css/reset.css';*/
#music_list{
  margin-top: 1rem;
}



</style>
