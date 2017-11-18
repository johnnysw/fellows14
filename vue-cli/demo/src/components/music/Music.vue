<template>
  <div id="music">
    <common-header></common-header>
    <router-view></router-view>
    <common-footer></common-footer>
  </div>
</template>

<script>
  import CommonHeader from '@/components/common/Header'
  import CommonFooter from '@/components/common/Footer'
export default {
  name: 'header',
  data () {
    return {

    }
  },
  mounted(){
    this.$store.dispatch('changeTitle',['music','rgb(0, 150, 136)','<']);
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

</style>
