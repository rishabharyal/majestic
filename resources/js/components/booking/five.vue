<template>
  <section class="mj-bdy-section mj-cser-section">
    <div class="mj-bdy-container">
      <div class="mj-bdy-content">
        <div class="mj-inside-bdy">
          <div class="mj-cst-sel row">
            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 mr-auto form-group mj-cst-sel-col">
              <div class="mj-cst-sel-col-header">
                <h3 class="mj-cst">Do you like Us to provide any Additional Services?</h3>
              </div>
              <div class="mj-cst-sel-col-bdy row">
                <div
                  class="mj-cst-sel-col-radio col-12"
                  v-for="additionalService in extraCleaningTypes"
                  :key="additionalService.id"
                >
                  <div class="custom-control custom-checkbox">
                    <input
                      type="checkbox"
                      v-model="selectedAdditionalServices"
                      class="custom-control-input"
                      :id="'mj_'+additionalService.id"
                      :value="additionalService.id"
                      name="mjradio"
                    />
                    <label class="custom-control-label" :for="'mj_'+additionalService.id">
                      <img src="images/laundry.jpeg" />
                      {{additionalService.title}}
                    </label>
                  </div>
                  <div
                    class="row"
                    v-if="selectedAdditionalServices.includes(additionalService.id) && additionalService.data"
                  >
                    <div
                      class="col-12 mj-cst-sel-col-add"
                      v-for="identity in additionalService.data"
                      :key="'identity_'+identity.id"
                    >
                      <label>{{identity.title}}</label>
                      <div class="qty">
                        <button
                          class="minus mj-bd-dark"
                          @click="decrementCount(additionalService.id,identity.id)"
                        >-</button>
                        <input
                          type="number"
                          class="count"
                          name="qty"
                          v-model="additionalServicesRoomCount[additionalService.id][identity.id]"
                        />
                        <button
                          class="plus mj-bd-dark"
                          @click="incrementCount(additionalService.id,identity.id)"
                        >+</button>
                      </div>
                    </div>
                  </div>
                </div>
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
                      Next
                      <i class="fa fa-arrow-right"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <Progress></Progress>
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
  components: {
    Progress,
  },
  data: function () {
    return {
      selectedAdditionalServices: [],
      additionalServicesRoomCount: {},
    };
  },

  methods: {
    incrementCount: function (serviceId, intityId) {
      let temp = this.additionalServicesRoomCount;
      this.additionalServicesRoomCount = {};
      temp[serviceId][intityId]++;
      this.additionalServicesRoomCount = temp;
    },
    searchValueInArrayOfObjects: function (
      arrayOfObj,
      searchKey,
      searchValue,
      returnKey
    ) {
      for (let index = 0; index < arrayOfObj.length; index++) {
        if (arrayOfObj[index][searchKey] == searchValue) {
          return {
            title: arrayOfObj[index][returnKey],
            elementIndex: index,
          };
        }
      }
    },
    decrementCount: function (serviceId, intityId) {
      if (this.additionalServicesRoomCount[serviceId][intityId] > 0) {
        let temp = this.additionalServicesRoomCount;
        this.additionalServicesRoomCount = {};
        temp[serviceId][intityId]--;
        this.additionalServicesRoomCount = temp;
      }
    },
    handleSubmit: function () {
      this.$store.dispatch("updateUserBooking", {
        extraCleaningTypes: this.selectedAdditionalServices,
        extraCleaningTypesCount: this.additionalServicesRoomCount,
      });
      let extraCleaningTypesName = [];

      this.selectedAdditionalServices.forEach((element) => {
        let { title, elementIndex } = this.searchValueInArrayOfObjects(
          this.extraCleaningTypes,
          "id",
          element,
          "title"
        );
        let children = [];
        let obj = this.additionalServicesRoomCount[element];
        if (obj) {
          for (const identityId in obj) {
            if (obj.hasOwnProperty(identityId)) {
              let { title } = this.searchValueInArrayOfObjects(
                this.extraCleaningTypes[elementIndex]["data"],
                "id",
                identityId,
                "title"
              );
              let count = obj[identityId];
              children.push({ title: title, count: count });
            }
          }
        }

        extraCleaningTypesName.push({ title: title, children: children });
      });

      this.$store.dispatch("updateProgress", {
        extraCleaningTypes: extraCleaningTypesName,
      });
      this.$emit("page-progressed", { increment: true });
    },
  },
  computed: {
    ...mapGetters(["extraCleaningTypes", "booking"]),
  },
  created() {
    if (!this.booking.extraCleaningTypes.length > 0) {
      let additionalServicesRoomCount = {};
      this.extraCleaningTypes.forEach((element) => {
        if (element.data) {
          let identities = element.data;
          let counts = {};
          identities.forEach((identity) => {
            counts[identity.id] = 1;
          });
          additionalServicesRoomCount[element.id] = counts;
        }
      });
      this.additionalServicesRoomCount = additionalServicesRoomCount;
    }

    if (this.booking.extraCleaningTypes.length > 0) {
      console.log("do this");
      this.selectedAdditionalServices = this.booking.extraCleaningTypes;
      this.additionalServicesRoomCount = this.booking.extraCleaningTypesCount;
    }
  },
};
</script>
