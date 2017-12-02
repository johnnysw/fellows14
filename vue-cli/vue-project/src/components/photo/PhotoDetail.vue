<template>
  <div class='detail'>
       <common-header title="photo" nav="<" bgColor="rgb(63, 81, 181)"></common-header>
        <v-touch class='photo-detail' :style="{background:bg}" 
        @swipeleft="left" @swiperight="right">
        </v-touch>
  </div>
</template>
<script>
import CommonHeader from "../common/CommonHeader"
import {mapState} from 'vuex';
import Axios from 'axios'

export default {
    data(){
      return {
          aa: this.$route.params.index,
        //   photoData: this.$store.state.photoData
      }  
    },
    computed: {
        bg(){
            return "url("+ this.$store.state.photoData[this.aa].src +") no-repeat center / contain #000"
        },
        ...mapState(["photoData"])
    },
    methods:{
        left(){
            this.aa++;
        },
        right(){
            this.aa--;
        }
    },
  components: {
      CommonHeader
  }
}
</script>
<style>
    .photo-detail{
        position: absolute;
        top     : 1rem;
        bottom  : 0;
        width   : 100%;
    }
</style>
