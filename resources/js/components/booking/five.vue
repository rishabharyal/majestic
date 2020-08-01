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
                <h3 class="mj-cst">Do you like Us to provide any Additional Services?</h3>
              </div>
              <div class="mj-cst-sel-col-bdy row">
                <!-- <div class="mj-cst-sel-col-radio col-12">
										<div class="custom-control custom-radio">
											<input type="radio" class="custom-control-input" id="mj_win" name="mjradio" >
											<label class="custom-control-label" for="mj_win">Window Cleaning</label>
										</div>										
                </div>-->
                <div class="mj-cst-sel-col-radio col-12">
                  <div class="custom-control custom-checkbox">
                    <input
                      type="checkbox"
                      class="custom-control-input"
                      id="mj_press"
                      name="mjradio"
                    />
                    <label class="custom-control-label" for="mj_press">
                      <img src="images/laundry.jpeg" />
                      Window Cleaning
                    </label>
                  </div>
                  <!-- <div class="row ">
											<div class="col-12 mj-cst-sel-col-add">
												<div class="custom-control custom-radio">
													<input type="radio" class="custom-control-input" id="mj_bellow" name="mjradio" >
													<label class="custom-control-label" for="mj_bellow">One Side</label>
												</div>
											</div>
											<div class="col-12 mj-cst-sel-col-add">
												<div class="custom-control custom-radio">
													<input type="radio" class="custom-control-input" id="mj_above" name="mjradio" >
													<label class="custom-control-label" for="mj_above">Both Side</label>
												</div>
											</div>
                  </div>-->
                </div>
                <div class="mj-cst-sel-col-radio col-12">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="mj_wall" name="mjradio" />
                    <label class="custom-control-label" for="mj_wall">
                      <img src="images/laundry.jpeg" />
                      Wall Spot Cleaning
                    </label>
                  </div>
                  <!-- <div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="mj_matt" name="mjradio" >
											<label class="custom-control-label" for="mj_matt">
												<img src="images/laundry.jpeg">
												Mattress Cleaning 
											</label>
                  </div>-->
                </div>
                <div class="mj-cst-sel-col-radio col-12">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="mj_carp" name="mjradio" />
                    <label class="custom-control-label" for="mj_carp">
                      <img src="images/laundry.jpeg" />
                      Carpet Cleaning
                    </label>
                  </div>
                  <div class="row">
                    <div class="col-12 mj-cst-sel-col-add">
                      <label>Bedroom</label>
                      <div class="qty">
                        <button class="minus mj-bd-dark">-</button>
                        <input type="number" class="count" name="qty" value="1" />
                        <button class="plus mj-bd-dark">+</button>
                      </div>
                    </div>
                    <div class="col-12 mj-cst-sel-col-add">
                      <label>Living Room</label>
                      <div class="qty">
                        <button class="minus mj-bd-dark">-</button>
                        <input type="number" class="count" name="qty" value="1" />
                        <button class="plus mj-bd-dark">+</button>
                      </div>
                    </div>
                    <div class="col-12 mj-cst-sel-col-add">
                      <label>Corridor</label>
                      <div class="qty">
                        <button class="minus mj-bd-dark">-</button>
                        <input type="number" class="count" name="qty" value="1" />
                        <button class="plus mj-bd-dark">+</button>
                      </div>
                    </div>
                    <div class="col-12 mj-cst-sel-col-add">
                      <label>Stairs</label>
                      <div class="qty">
                        <button class="minus mj-bd-dark">-</button>
                        <input type="number" class="count" name="qty" value="1" />
                        <button class="plus mj-bd-dark">+</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="mj-cst-sel-col-btn col-6 row">
                  <div class="mg-float-left">
                    <a href="#" class="btn mg-btn-primary-outline">
                      <i class="fa fa-arrow-left"></i>
                      back
                    </a>
                  </div>
                  <div class="mg-float-right">
                    <a href="#" class="btn mg-btn-primary">
                      Next
                      <i class="fa fa-arrow-right"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <Progress :progress="progress"></Progress>
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
    Progress,
  },
  props: {
    progress: {
      type: Object,
      required: true,
    },
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
