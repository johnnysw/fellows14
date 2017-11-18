<template>
  <div class="movie">
      <common-header></common-header>
      <common-footer></common-footer>
  </div>
</template>

<script>
import CommonHeader from "../common/CommonHeader"
import CommonFooter from "../common/CommonFooter"
export default {
  name: 'HelloWorld',
  data () {
    return {
    }
  },
  components: {
    CommonHeader,
    CommonFooter
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
    
</style>
