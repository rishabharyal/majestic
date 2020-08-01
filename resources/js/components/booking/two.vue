<template>
  <section>
    <section class="mj-bdy-section mj-cser-section">
      <div class="mj-bdy-container">
        <div class="mj-bdy-content">
          <div class="mj-header-content mg-slider-banner">
            <h1 class="mj-header-ng">Where can we be?</h1>
            <span class="mj-span-ng">Give us you'r local you want us to be.</span>
          </div>
          <div class="mj-inside-bdy">
            <div class="row">
              <div class="service col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group">
                <input
                  autocomplete="off"
                  type="text"
                  name="service"
                  @input="getPlaces"
                  v-model="placeQuery"
                  placeholder="Search Location"
                  class="txtShowDiv"
                />
                <span class="mg-search-icon">
                  <i class="fa fa-search"></i>
                </span>
                <ul>
                  <li
                    v-show="showDropdown && results.length"
                    v-for="(result,i) in results"
                    :key="result.code"
                    @click="selectPlace(i)"
                  >
                    <!-- <a href="#"> -->
                    <div class="info">
                      <span class="title">{{result.title}}</span>
                    </div>
                    <!-- </a> -->
                  </li>
                </ul>
              </div>
              <div class="col-12 mj-focusbtn">
                <a @click="submitData" class="btn mg-btn-primary">Continue</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="mj-bdy-section mr-steps-service">
      <div class="mj-bdy-container">
        <div class="mj-bdy-content mj-services-content">
          <div class="mj-header-content">
            <h1 class="mj-header">How Majestic Services Work</h1>
          </div>
          <div class="mj-inside-bdy row">
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 mj-lst">
              <div class="mj-ls-img">
                <img src="images/customize.png" />
              </div>
              <div class="mj-lst-info">
                <label class="info-label">Select Your Requirement</label>
                <span class="info-desc">Tell us a few details about the service you need.</span>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 mj-lst">
              <div class="mj-ls-img">
                <img src="images/calander.png" />
              </div>
              <div class="mj-lst-info">
                <label class="info-label">Check Price for work</label>
                <span
                  class="info-desc"
                >Pick the date and time that work best for you and compare price options.</span>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 mj-lst">
              <div class="mj-ls-img">
                <img src="images/card.png" />
              </div>
              <div class="mj-lst-info">
                <label class="info-label">Make a Secure Payment</label>
                <span class="info-desc">Pay easily online by card.</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </section>
</template>


<script>
const axios = require("axios");

export default {
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
      placeQuery: "",
      code: "",
      showError: false,
      places: [],
      showDropdown: false,
      results: [],
    };
  },
  methods: {
    submitData: function () {
      if (this.placeQuery && this.postalCode) {
        console.log("yo");
        this.$emit("event-emitted", {
          [this.page]: { postalCode: this.postalCode },
          increment: true,
        });
        return;
      }
      alert("You must select your address.");
    },
    selectPlace: function (i) {
      this.showDropdown = false;
      this.placeQuery = this.places[i].title;
      this.postalCode = this.places[i].code;
    },
    changeComponent: function () {
      if (this.placeQuery && this.postalCode) {
        this.$emit({
          [this.page]: {
            postalCode: this.postalCode,
          },
          increment: true,
        });
        return;
      }
      alert("You must select your address.");
    },
    getPlaces: function (e) {
      var options = {
        types: ["address"],
        componentRestrictions: {
          country: "AU",
          postalCode: "2000",
        },
      };
      this.places = [
        {
          title: "Hetauda Karra 44100",
          code: 44100,
        },
        {
          title: "Hetauda Gardoi 44200",
          code: 44200,
        },
        {
          title: "Hetauda Armchaur 23999",
          code: 23999,
        },
      ];

      let filter = [];
      this.places.forEach((item) => {
        if (item.title.toLowerCase().includes(this.placeQuery.toLowerCase())) {
          filter.push(item);
        }
      });

      this.results = filter;
      this.showDropdown = true;
    },
  },
};
</script>
