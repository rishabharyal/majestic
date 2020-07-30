<template>
  <section class="mj-bdy-section mj-cser-section">
    <div class="mj-bdy-container">
      <div class="mj-bdy-content">
        <!-- <div class="mj-header-content mg-slider-banner">
					<h1 class="mj-header-ng">
						Where can we be?
					</h1>
					<span class=" mj-span-ng"> 
						Give us you'r local you want us to be.
					</span>
        </div>-->
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
                      @click="requirement = 'House'"
                    />
                    <label class="custom-control-label" for="mj_block">House</label>
                  </div>
                </div>
                <div class="mj-cst-sel-col-radio col-12">
                  <div class="custom-control custom-radio">
                    <input
                      type="radio"
                      class="custom-control-input"
                      id="mj_house"
                      name="mjradio"
                      @click="requirement = 'Block'"
                    />
                    <label class="custom-control-label" for="mj_house">Block</label>
                  </div>
                  <div class="row" v-if="requirement">
                    <div
                      class="col-12 mj-cst-sel-col-add"
                      v-for="room in variables.roomTypes"
                      :key="room.id"
                    >
                      <label>{{room.name}}</label>
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
                      @click="$emit('event-emitted',{
                      [page]:{ requirement,roomCount},
                      decrement : true,
                    })"
                    >
                      <i class="fa fa-arrow-left"></i>
                      back
                    </a>
                  </div>
                  <div class="mg-float-right">
                    <a
                      class="btn mg-btn-primary"
                      @click="$emit('event-emitted',{
                      [page]:{ requirement,roomCount},
                      increment : true,
                    })"
                    >
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
export default {
  components: {
    Progress: Progress,
  },
  props: {
    variables: {
      type: Object,
      required: true,
    },
    page: {
      type: Number,
      required: true,
    },
  },
  data: function () {
    return {
      requirement: "",
      isVisible: false,
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
    decrementCount: function (id) {
      if (this.roomCount[id] > 0) {
        let temp = this.roomCount;
        this.roomCount = {};
        temp[id]--;
        this.roomCount = temp;
      }
    },
  },
  created() {
    this.variables.roomTypes.forEach((room) => {
      this.roomCount[room.id] = 1;
    });
    window.console.log(this.roomCount);
  },
};
</script>
