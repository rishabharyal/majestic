import { CleaningServices, CleaningTypesServices } from "../web";
import { reject } from "lodash";


const state = {
    currentPage: 0,
    cleaningTypes: [],
    cleaningIdentities: [],
    extraCleaningIdentities: [],
    extraCleaningTypes: [],
    finalCleaningTypes: [],
    booking: {
        cleaningType: null,
        postalCode: null,
        houseOrBlock: null,
        cleaningIdentitiesCounts: {},
        extraCleaningIdentities: [],
        extraCleaningTypes: [],
        extraCleaningTypesCount: {},
        finalCleaningTypes: [],
        finalCleaningTypesIdentities: [],
        finalCleaningCount: {},
    },
    progress: {
        cleaningType: '',
        postalCode: '',
        houseOrBlock: '',
        cleaningIdentitiesCounts: {},
        extraCleaningIdentities: [],
        finalCleaningTypes: [],
        extraCleaningTypes: [],
        extraCleaningTypesCount: {},
    }
};

const getters = {
    booking(state) {
        return state.booking;
    },
    currentPage(state) {
        return state.currentPage;
    },
    progress(state) {
        return state.progress;
    },
    cleaningTypes(state) {
        return state.cleaningTypes;
    },
    extraCleaningIdentities(state) {
        return state.extraCleaningIdentities;
    },
    extraCleaningTypes(state) {
        return state.extraCleaningTypes;
    },
    finalCleaningTypes(state) {
        return state.finalCleaningTypes;
    },
    cleaningIdentities(state) {
        return state.cleaningIdentities;
    },
    selectedCleaningType(state) {
        return state.booking.cleaningType;
    },
    cleanings(state) {
        return state.cleanings;
    },

};

const actions = {
    getCleaningTypes(context) {
        return new Promise(async (resolve) => {
            CleaningTypesServices.query().then((data) => {
                data = data["data"];
                console.log(data);
                if (data["success"]) {
                    context.commit('setCleaningTypes', data["data"]["cleaning-types"]);
                    resolve(data['data']['cleaning-types']);
                } else reject(data['message']);
            });
        });
    },
    getExtraCleaningIdentities(context) {
        return new Promise(async (resolve) => {
            CleaningServices.getExtraCleaningIdentities().then((data) => {
                data = data["data"];
                if (data["success"]) {
                    context.commit('setExtraCleaningIdentities', data["data"]);
                    resolve(data['data']);
                } else reject(data['message']);
            });
        });
    },
    getCleaningIdentities(context) {
        return new Promise(async (resolve, reject) => {
            CleaningServices.query({ type_id: state.booking.cleaningType }).then((data) => {
                data = data["data"];
                if (data['success']) {
                    context.commit('setCleaningIdentities', data["data"]["identities"]);
                    resolve(data['data']['identities']);
                }
                else reject(data['message']);
            })
        });
    },
    getExtraCleaningTypes(context) {
        return new Promise(async (resolve, reject) => {
            CleaningTypesServices.getExtraCleaningTypes().then((data) => {
                data = data["data"];
                if (data['success']) {
                    context.commit('setExtraCleaningTypes', data["data"]);
                    resolve(data['data']);
                }
                else reject(data['message']);
            })
        });
    },
    getFinalCleaningTypes(context) {
        return new Promise(async (resolve, reject) => {
            CleaningTypesServices.getFinalCleaningTypes().then((data) => {
                data = data["data"];
                console.log(data);
                if (data['success']) {
                    context.commit('setFinalCleaningTypes', data["data"]);
                    resolve(data['data']);
                }
                else reject(data['message']);
            })
        });
    },
    updateUserBooking(context, updateData) {
        context.commit("updateUserBooking", updateData);
    },
    updateProgress(context, updateData) {
        context.commit("updateProgress", updateData);
    },
    incrementPage(context) {
        context.commit("incrementPage");
    },
    decrementPage(context) {
        context.commit("decrementPage");
    }

};

const mutations = {
    setCleaningTypes(state, data) {
        state.cleaningTypes = data;
    },
    setCleaningIdentities(state, data) {
        state.cleaningIdentities = data;
    },
    setExtraCleaningIdentities(state, data) {
        state.extraCleaningIdentities = data;
    },
    setExtraCleaningTypes(state, data) {
        state.extraCleaningTypes = data;
    },
    setFinalCleaningTypes(state, data) {
        state.finalCleaningTypes = data;
    },
    updateUserBooking(state, data) {
        let temp = state.booking;
        state.booking = {};
        for (const key in data) {
            if (data.hasOwnProperty(key)) {
                temp[key] = data[key];

            }
        }
        state.booking = temp;
    },
    updateProgress(state, data) {
        let temp = state.progress;
        state.progress = {};
        for (const key in data) {
            if (data.hasOwnProperty(key)) {
                temp[key] = data[key];

            }
        }
        state.progress = temp;
    },
    incrementPage(state) {
        state.currentPage++;

    },
    decrementPage(state) {
        state.currentPage--;
    }
};

export default {
    state, getters, actions, mutations,
}