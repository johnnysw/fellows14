/**
 * Created by apple on 17/9/14.
 */
/**
 * Created by apple on 17/6/22.
 */

//引入相关文件
import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

//定义初始化变量
const state = {
  title:'movie',
  bgColor:'rgb(33, 150, 243)',
  btn:'首页',
  photoData:[]
}

//定义动作 事件处理方法
const mutations = {
  changeTitle(state,status){
    state.title = status[0];
    state.bgColor = status[1];
    state.btn = status[2];
  },
  changeData(state,status){
    state.photoData = status;
  }
}

//对外的事件方法
const actions = {
      changeTitle:({commit},status)=>commit('changeTitle',status),
  changeData:({commit},status)=>commit('changeData',status)
}

const getters = {

}

export default new Vuex.Store({
  state,
  mutations,
  actions,
  getters
})
