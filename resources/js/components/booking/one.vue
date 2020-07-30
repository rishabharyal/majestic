<template>
  <section>
    <section class="mj-bdy-section mj-cser-section">
      <div class="mj-bdy-container">
        <div class="mj-bdy-content">
          <div class="mj-header-content mg-slider-banner">
            <h1 class="mj-header-ng">Let Us Clean Your House</h1>
            <span
              class="mj-span-ng"
            >Give you more time too spend on what really matters, Spare some time for real life.</span>
          </div>
          <div class="mj-inside-bdy">
            <form>
              <div class="row">
                <div class="service col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group">
                  <input
                    autocomplete="off"
                    type="text"
                    name="service"
                    placeholder="What do you need help with?"
                    class="txtShowDiv"
                  />
                  <span class="mg-search-icon">
                    <i class="fa fa-search"></i>
                  </span>
                  <ul class="mg-ul-hidden">
                    <li
                      v-for="cleaning in variables.cleaningTypes"
                      :key="cleaning.id"
                      @click="$emit('event-emitted',{
                      [page]:{ cleaningType : cleaning.id},
                      increment : true,
                    })"
                    >
                      <!-- <a href="#"> -->
                      <img :src="cleaning.img" />
                      <div class="info">
                        <span class="title">{{cleaning.title}}</span>
                        <span class="price">
                          from
                          <span>{{cleaning.price}}</span>
                        </span>
                      </div>
                      <!-- </a> -->
                    </li>
                  </ul>
                </div>
                <!-- <div class="col-12 mj-focusbtn">
								<a href="#" class="btn mg-btn-primary">
									Book Online
								</a>
                </div>-->
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
  mounted() {
    console.log("Component mounted.");
  },
};
</script>
