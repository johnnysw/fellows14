<template>
  <div class="photo">
      <common-header title="photo" nav="<" bgColor="rgb(63, 81, 181)"></common-header>
              <div class='login'>
                <p>
                用户名：<input type="text" v-model="username">
              </p>
              <p>
                密码：<input type="password" v-model="pwd">
              </p>
              <p>
                <input type="submit" value="登录" @click="login" >
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
      username: '',
      pwd     : ''
    }
  },
  mounted(){
      
  },
  methods:{
    login(){
      Axios.get('http://127.0.0.1:80/myblog/welcome/vue_login',{
        params:{
          username: this.username,
          pwd     : this.pwd
        }
      })
      .then(res=>{
         location.href = 'http://127.0.0.1:8080/#/index';
      });
      
    }
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
