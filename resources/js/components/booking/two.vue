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
            <form>
              <div class="row">
                <div class="service col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group">
                  <input
                    type="text"
                    name="service"
                    placeholder="Postal code?"
                    required
                    v-model="code"
                  />
                  <span class="mg-search-icon">
                    <i class="fa fa-map-marker"></i>
                  </span>
                </div>
                <p
                  class="col-12 invalid-feedback text-danger text-bold text-center"
                  v-show="showError"
                >Please choose a valid Postal Code.</p>
                <div class="col-12 mj-focusbtn">
                  <a @click="submitData(page)" class="btn mg-btn-primary">Continue</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <section class="mj-bdy-section mr-steps-service">
      <div class="mj-bdy-container">
        <div class="mj-bdy-content mj-services-content">
          <div class="mj-header-content">
            <h1 class="mj-header">How Majestic Services Work</h1>
            <!-- <span class="mj-span"> 
						Professional Cleaning Services for Home, Apartment and Office
            </span>-->
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
      code: "",
      showError: false,
    };
  },
  methods: {
    submitData: function (page) {
      this.showError = false;
      if (this.code.length < 4) {
        this.showError = true;
      } else {
        this.$emit("event-emitted", {
          [page]: { postalCode: this.code },
          increment: true,
        });
      }
    },
  },
  mounted() {
    console.log("Component mounted.");
  },
};
</script>
