<template>
    <div class="photo">
        <common-header title="photo" nav="<" bgColor="rgb(63, 81, 181)"></common-header>
        <common-footer bgColor="rgb(63, 81, 181)"></common-footer>
    </div>
</template>
<script>
import CommonHeader from "../common/CommonHeader"
import CommonFooter from "../common/CommonFooter"
export default {
    data(){
        return {
            bgColor: "rgb(63, 81, 181)"
        }
    },
    components: {
      CommonHeader,
      CommonFooter
  }
}
</script>
<style>

</style>

