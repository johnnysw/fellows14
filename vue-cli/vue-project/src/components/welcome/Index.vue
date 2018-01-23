<template>
  <div class="photo">
      <common-header title="photo" nav="<" bgColor="rgb(63, 81, 181)"></common-header>
              <div class='login'>
                <p>
                welcome: {{username}}
              </p>
          
              </div>
      <common-footer bgColor="rgb(63, 81, 181)"></common-footer>
  </div>
</template>
<script>
import CommonHeader from "../common/CommonHeader"
import CommonFooter from "../common/CommonFooter"

import Axios from 'axios'
export default {
  data(){
    return {
     username: '游客'
    }
  },
  mounted(){
      Axios.get('http://127.0.0.1:80/myblog/welcome/vue_index')
      .then(res=>{
        console.log(res.data);
        this.username = res.data.username;
      });
      
  },
  components: {
      CommonHeader,
      CommonFooter
  }
}
</script>
<style>
.login{
  margin  : 1rem 0;
  overflow: hidden;
}

</style>
