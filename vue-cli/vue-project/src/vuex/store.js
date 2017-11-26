import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex);

const state = {
    count : 2,
    count1: 3
}

const mutations = {
    add(state,num){
        state.count += num;
    },
    reduce(state){
        state.count--; 
    }
}
export default new Vuex.Store({
    state,
    mutations
})