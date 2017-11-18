<template>
  <div class="photo">
    <common-header></common-header>
    <!--<div :style="obj"></div>-->
      <v-touch class="detail" :style="obj" @swipeleft="left" @swiperight="right"></v-touch>
  </div>
</template>

<script>
  import CommonHeader from '@/components/common/Header'
//  vue-touch@next
export default {
  name: 'header',
  data () {
    return {
        index:this.$route.params.index
    }
  },
  computed:{
    obj(){
        return {
            background:'url('+ this.$store.state.photoData[this.index].src +') no-repeat center / contain #000'
        }
    }
  },
  methods:{
    left(){
        this.index++;
    },
    right(){
      this.index--;
    }
  },
  mounted(){
    this.$store.dispatch('changeTitle',['phtot','rgb(63, 81, 181)','<']);
  },
  components:{
    CommonHeader,
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.detail{
  position: absolute;
  top:1rem;
  bottom: 0;
  width: 100%;
}
</style>
