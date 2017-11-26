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

const getters = {
    count2(state){
        return state.count+100;
    }
}
const actions={
    addAction({commit}){
        commit('add',10);
    },
    reduceAction({commit}){
        commit('reduce');
    }
}


export default new Vuex.Store({
    state,
    mutations,
    getters,
    actions
})