<template>
  <div id="photo">
    <common-header></common-header>
      <ul class="photo-list">
        <li v-for="(photo,index) in list">
            <router-link :to="'/photo/detail/'+index"><img :src="photo.src"/></router-link>
        </li>
      </ul>
    <common-footer></common-footer>
  </div>
</template>

<script>
  import CommonHeader from '@/components/common/Header'
  import CommonFooter from '@/components/common/Footer'
  import Axios from 'axios'
export default {
  name: 'header',
  data () {
    return {
      list:[]
    }
  },
  mounted(){
    this.$store.dispatch('changeTitle',['phtot','rgb(63, 81, 181)','<']);
    Axios.get('/static/photo-data.json').then((res)=>{
        this.list = res.data.photoData;
        this.$store.dispatch('changeData',res.data.photoData);
    });
  },
  components:{
    CommonHeader,
    CommonFooter,

  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  /*@import '../../assets/css/reset.css';*/
  .photo-list{
    margin-top: 1rem;
    margin-bottom: 1rem;
    overflow: hidden;
  }
  .photo-list li{
    float: left;
    width: 50%;
  }
</style>
