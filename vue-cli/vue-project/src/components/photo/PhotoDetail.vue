<template>
  <div class='detail'>
       <common-header title="photo" nav="<" bgColor="rgb(63, 81, 181)"></common-header>
       <div class='photo-detail'>
           <img :src="photoData[aa].src" alt="">
       </div>
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
        ...mapState(["photoData"])
    },
  components: {
      CommonHeader
  }
}
</script>
<style>
    .photo-detail{
        margin-top: 1rem;
    }
</style>
