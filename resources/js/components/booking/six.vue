<template>
  <section class="mj-bdy-section mj-cser-section">
    <div class="mj-bdy-container">
      <div class="mj-bdy-content">
        <div class="mj-inside-bdy">
          <div class="mj-cst-sel row">
            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 mr-auto form-group mj-cst-sel-col">
              <div class="mj-cst-sel-col-header">
                <h3 class="mj-cst">Do any of the following areas need cleaning too?</h3>
              </div>
              <div
                class="mj-cst-sel-col-bdy row"
                v-for="finalCleaningType in finalCleaningTypes"
                :key="finalCleaningType.title"
              >
                <div class="mj-cst-sel-col-radio col-12">
                  <div class="custom-control custom-checkbox">
                    <input
                      type="checkbox"
                      class="custom-control-input"
                      :id="'mj_'+finalCleaningType.id"
                      :value="finalCleaningType.id"
                      v-model="selectedFinalCleaningTypes"
                      :name="'mj_'+finalCleaningType.id"
                    />
                    <label class="custom-control-label" :for="'mj_'+finalCleaningType.id">
                      <img src="images/laundry.jpeg" />
                      {{finalCleaningType.title}}
                    </label>
                  </div>
                  <div
                    v-if="finalCleaningType.data"
                    v-show="selectedFinalCleaningTypes.includes(finalCleaningType.id)"
                  >
                    <div class="row" v-if="finalCleaningType.data[0].field_type == 'quantity'">
                      <div
                        class="col-12 mj-cst-sel-col-add"
                        v-for="finalCleaningIdentity in finalCleaningType.data"
                        :key="finalCleaningIdentity.title"
                      >
                        <div class="custom-control custom-radio">
                          <input
                            type="radio"
                            class="custom-control-input"
                            :id="'mj_single'+finalCleaningType.id+finalCleaningIdentity.id"
                            :name="'mj_single'+finalCleaningType.id+finalCleaningIdentity.id"
                          />
                          <label
                            class="custom-control-label"
                            :for="'mj_single'+finalCleaningType.id+finalCleaningIdentity.id"
                          >{{finalCleaningIdentity.title}}</label>
                        </div>
                        <div class="row">
                          <div class="col-12 mj-cst-sel-col-add">
                            <label>Quantity</label>
                            <div class="qty">
                              <button
                                class="minus mj-bd-dark"
                                @click="decrementCount(finalCleaningType.id,finalCleaningIdentity.id)"
                              >-</button>
                              <input
                                type="number"
                                class="count"
                                v-if="finalCleaningIdentitiesCount[finalCleaningType.id]"
                                name="qty"
                                v-model="finalCleaningIdentitiesCount[finalCleaningType.id][finalCleaningIdentity.id]"
                              />
                              <button
                                @click="incrementCount(finalCleaningType.id,finalCleaningIdentity.id)"
                                class="plus mj-bd-dark"
                              >+</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row" v-else-if="finalCleaningType.data[0].field_type == 'radio'">
                      <div
                        class="col-12 mj-cst-sel-col-add"
                        v-for="finalCleaningIdentity in finalCleaningType.data"
                        :key="finalCleaningIdentity.title"
                      >
                        <div class="custom-control custom-radio">
                          <input
                            type="radio"
                            class="custom-control-input"
                            :id="'mj_'+finalCleaningType.id+finalCleaningIdentity.id"
                            :name="'mj_'+finalCleaningType.id"
                          />
                          <label
                            class="custom-control-label"
                            :for="'mj_'+finalCleaningType.id+finalCleaningIdentity.id"
                          >{{finalCleaningIdentity.title}}</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <Progress></Progress>
            <div class="mj-cst-sel-col-btn col-6 row">
              <div class="mg-float-left">
                <a
                  @click="$emit('page-progressed',{
                      decrement : true,
                      })"
                  class="btn mg-btn-primary-outline"
                >
                  <i class="fa fa-arrow-left"></i>
                  back
                </a>
              </div>
              <div class="mg-float-right">
                <a @click="handleSubmit" class="btn mg-btn-primary">
                  Finish
                  <i class="fa fa-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import Progress from "./progress";
import { mapGetters } from "vuex";
export default {
  data: function () {
    return {
      selectedFinalCleaningTypes: [],
      selectedFinalCleaningIdentities: {},
      finalCleaningIdentitiesCount: {},
    };
  },
  components: {
    Progress,
  },
  methods: {
    searchValueInObject: function (
      arrayOfObj,
      searchKey,
      searchValue,
      returnKey
    ) {
      for (let index = 0; index < arrayOfObj.length; index++) {
        if (arrayOfObj[index][searchKey] == searchValue) {
          return arrayOfObj[index][returnKey];
        }
      }
    },
    incrementCount: function (serviceId, identityId) {
      let temp = this.finalCleaningIdentitiesCount;
      this.finalCleaningIdentitiesCount = {};
      temp[serviceId][identityId]++;
      this.additionalServicesRoomCount = temp;
    },
    decrementCount: function (serviceId, identityId) {
      if (this.finalCleaningIdentitiesCount[serviceId][identityId] > 0) {
        let temp = this.finalCleaningIdentitiesCount;
        this.finalCleaningIdentitiesCount = {};
        temp[serviceId][identityId]--;
        this.additionalServicesRoomCount = temp;
      }
    },
    handleSubmit: function () {
      this.$store.dispatch("updateBooking", {
        finalCleaningTypes: this.selectedFinalCleaningTypes,
        finalCleaningIdentitiesCount: this.finalCleaningIdentitiesCount,
        finalCleaningTypesIdentities: this.selectedFinalCleaningIdentities,
      });
      let finalCleaningTypesName = [];
      this.finalCleaningTypes.forEach((element) => {
        let title = this.searchValueInObject(
          this.finalCleaningTypes,
          "id",
          element,
          "title"
        );
        finalCleaningTypesName.push(title);
      });

      this.$store.dispatch("updateProgress", {
        finalCleaningTypes: finalCleaningTypesName,
      });

      console.log(this.booking);
      // this.$emit("page-progressed", {
      //   increment: true,
      // });
    },
  },
  computed: {
    ...mapGetters(["finalCleaningTypes", "booking"]),
  },
  created() {
    this.$store.dispatch("getFinalCleaningTypes").then((data) => {
      let finalCleaningIdentitiesCount = {};
      this.finalCleaningTypes.forEach((element) => {
        if (element.data) {
          let identities = element.data;
          if (identities[0].field_type == "quantity") {
            let counts = {};
            identities.forEach((identity) => {
              counts[identity.id] = 1;
            });
            finalCleaningIdentitiesCount[element.id] = counts;
          }
        }
      });
      this.finalCleaningIdentitiesCount = finalCleaningIdentitiesCount;
    });
    // if (this.booking.extraCleaningTypes) {
    //   this.selectedAdditionalServices = this.booking.extraCleaningTypes;
    //   this.additionalServicesRoomCount = this.booking.extraCleaningCount;
    // }
  },
};
</script>
