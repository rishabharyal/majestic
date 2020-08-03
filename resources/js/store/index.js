import Vue from "vue";
import Vuex from "vuex";
import store from "./store";

Vue.use(Vuex);

const STORE = new Vuex.Store({
    modules: { store }
})

export { STORE };