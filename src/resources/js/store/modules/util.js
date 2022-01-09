const getters = {};

const state = {
    user: null,
    isLoggedIn: false
};

const mutations = {
    setLogin(state, isLoggedIn) {
        state.isLoggedIn = isLoggedIn;
    },
    setUser(state, user) {
        state.user = user;
    }
};

const actions = {};

export default {
    namespaced: true,
    getters,
    state,
    mutations,
    actions
};