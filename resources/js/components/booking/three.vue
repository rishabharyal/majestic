<template>
  <section class="mj-bdy-section mj-cser-section">
    <div class="mj-bdy-container">
      <div class="mj-bdy-content">
        <div class="mj-inside-bdy">
          <div class="mj-cst-sel row">
            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 mr-auto form-group mj-cst-sel-col">
              <div class="mj-cst-sel-col-header">
                <h3 class="mj-cst">Select Your Requirement</h3>
              </div>
              <div class="mj-cst-sel-col-bdy row">
                <div class="mj-cst-sel-col-radio col-12">
                  <div class="custom-control custom-radio">
                    <input
                      type="radio"
                      class="custom-control-input"
                      id="mj_block"
                      name="mjradio"
                      value="House"
                      v-model="houseOrBlock"
                    />
                    <label class="custom-control-label" for="mj_block">House</label>
                  </div>
                  <div class="row" v-if="houseOrBlock == 'House'">
                    <div
                      class="col-12 mj-cst-sel-col-add"
                      v-for="room in cleaningIdentities"
                      :key="room.id"
                    >
                      <label>{{room.title}}</label>
                      <div class="qty">
                        <button class="minus mj-bd-dark" @click="decrementCount(room.id)">-</button>
                        <input type="number" class="count" name="qty" :value="roomCount[room.id]" />
                        <button class="plus mj-bd-dark" @click="incrementCount(room.id)">+</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="mj-cst-sel-col-radio col-12">
                  <div class="custom-control custom-radio">
                    <input
                      type="radio"
                      class="custom-control-input"
                      id="mj_house"
                      name="mjradio"
                      value="Block"
                      v-model="houseOrBlock"
                    />
                    <label class="custom-control-label" for="mj_house">Block</label>
                  </div>
                  <div class="row" v-if="houseOrBlock == 'Block'">
                    <div
                      class="col-12 mj-cst-sel-col-add"
                      v-for="room in cleaningIdentities"
                      :key="room.id"
                    >
                      <label>{{room.title}}</label>
                      <div class="qty">
                        <button class="minus mj-bd-dark" @click="decrementCount(room.id)">-</button>
                        <input type="number" class="count" name="qty" :value="roomCount[room.id]" />
                        <button class="plus mj-bd-dark" @click="incrementCount(room.id)">+</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="mj-cst-sel-col-btn col-6 row">
                  <div class="mg-float-left">
                    <a
                      class="btn mg-btn-primary-outline"
                      @click="$emit('page-progressed',{
                      decrement : true,
                    })"
                    >
                      <i class="fa fa-arrow-left"></i>
                      back
                    </a>
                  </div>
                  <div class="mg-float-right">
                    <a class="btn mg-btn-primary" @click="handleSubmit">
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
    Progress: Progress,
  },
  data: function () {
    return {
      houseOrBlock: "",
      roomCount: {},
    };
  },
  methods: {
    incrementCount: function (id) {
      let temp = this.roomCount;
      this.roomCount = {};
      temp[id]++;
      this.roomCount = temp;
    },
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
    handleSubmit: function (cleaningTypeId) {
      this.$store.dispatch("updateUserBooking", {
        houseOrBlock: this.houseOrBlock,
        cleaningIdentitiesCounts: this.roomCount,
      });

      let roomCountWithName = [];
      for (const identityId in this.roomCount) {
        if (this.roomCount.hasOwnProperty(identityId)) {
          roomCountWithName.push({
            title: this.searchValueInObject(
              this.cleaningIdentities,
              "id",
              identityId,
              "title"
            ),
            count: this.roomCount[identityId],
          });
        }
      }
      this.$store.dispatch("updateProgress", {
        houseOrBlock: this.houseOrBlock,
        cleaningIdentitiesCounts: roomCountWithName,
      });
      this.$emit("page-progressed", { increment: true });
    },
    decrementCount: function (id) {
      if (this.roomCount[id] > 0) {
        let temp = this.roomCount;
        this.roomCount = {};
        temp[id]--;
        this.roomCount = temp;
      }
    },
  },
  computed: {
    ...mapGetters(["cleaningIdentities", "booking"]),
  },
  created() {
    this.$store.dispatch("getCleaningIdentities").then((e) => {
      console.log("yes ecists");
      this.cleaningIdentities.forEach((element) => {
        this.roomCount[element.id] = 1;
      });
      if (this.booking.houseOrBlock) {
        console.log("yes ecists");
        this.houseOrBlock = this.booking.houseOrBlock;
        this.roomCount = this.booking.cleaningIdentitiesCounts;
      }
    });
  },
};
</script>
