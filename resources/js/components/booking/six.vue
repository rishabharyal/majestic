<template>
  <section class="mj-bdy-section mj-cser-section">
    <div class="mj-bdy-container">
      <div class="mj-bdy-content">
        <div class="mj-inside-bdy">
          <form>
            <div class="mj-cst-sel row">
              <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 mr-auto form-group mj-cst-sel-col">
                <div class="mj-cst-sel-col-header">
                  <h3 class="mj-cst">Do any of the following areas need cleaning too?</h3>
                </div>
                <div class="mj-cst-sel-col-bdy row">
                  <div class="mj-cst-sel-col-radio col-12">
                    <div class="custom-control custom-checkbox">
                      <input
                        type="checkbox"
                        class="custom-control-input"
                        id="mj_matt"
                        name="mjradio"
                      />
                      <label class="custom-control-label" for="mj_matt">
                        <img src="images/laundry.jpeg" />
                        Mattress Cleaning
                      </label>
                    </div>
                    <div class="row">
                      <div class="col-12 mj-cst-sel-col-add">
                        <div class="custom-control custom-radio">
                          <input
                            type="radio"
                            class="custom-control-input"
                            id="mj_single"
                            name="mjradio"
                          />
                          <label class="custom-control-label" for="mj_single">Single Mattress</label>
                        </div>
                        <div class="row">
                          <div class="col-12 mj-cst-sel-col-add">
                            <label>Quantity</label>
                            <div class="qty">
                              <button class="minus mj-bd-dark">-</button>
                              <input type="number" class="count" name="qty" value="1" />
                              <button class="plus mj-bd-dark">+</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 mj-cst-sel-col-add">
                        <div class="custom-control custom-radio">
                          <input
                            type="radio"
                            class="custom-control-input"
                            id="mj_Double"
                            name="mjradio"
                          />
                          <label class="custom-control-label" for="mj_Double">Double Mattress</label>
                        </div>
                        <div class="row">
                          <div class="col-12 mj-cst-sel-col-add">
                            <label>Quantity</label>
                            <div class="qty">
                              <button class="minus mj-bd-dark">-</button>
                              <input type="number" class="count" name="qty" value="1" />
                              <button class="plus mj-bd-dark">+</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 mj-cst-sel-col-add">
                        <div class="custom-control custom-radio">
                          <input
                            type="radio"
                            class="custom-control-input"
                            id="mj_Queen"
                            name="mjradio"
                          />
                          <label class="custom-control-label" for="mj_Queen">Queen Mattress</label>
                        </div>
                        <div class="row">
                          <div class="col-12 mj-cst-sel-col-add">
                            <label>Quantity</label>
                            <div class="qty">
                              <button class="minus mj-bd-dark">-</button>
                              <input type="number" class="count" name="qty" value="1" />
                              <button class="plus mj-bd-dark">+</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 mj-cst-sel-col-add">
                        <div class="custom-control custom-radio">
                          <input
                            type="radio"
                            class="custom-control-input"
                            id="mj_King"
                            name="mjradio"
                          />
                          <label class="custom-control-label" for="mj_King">King Mattress</label>
                        </div>
                        <div class="row">
                          <div class="col-12 mj-cst-sel-col-add">
                            <label>Quantity</label>
                            <div class="qty">
                              <button class="minus mj-bd-dark">-</button>
                              <input type="number" class="count" name="qty" value="1" />
                              <button class="plus mj-bd-dark">+</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="mj-cst-sel-col-radio col-12">
                    <div class="custom-control custom-checkbox">
                      <input
                        type="checkbox"
                        class="custom-control-input"
                        id="mj_rug"
                        name="mjradio"
                      />
                      <label class="custom-control-label" for="mj_rug">
                        <img src="images/laundry.jpeg" />
                        Rug Cleaning
                      </label>
                    </div>
                    <div class="row">
                      <div class="col-12 mj-cst-sel-col-add">
                        <div class="custom-control custom-radio">
                          <input
                            type="radio"
                            class="custom-control-input"
                            id="mj_underless"
                            name="mjradio"
                          />
                          <label class="custom-control-label" for="mj_underless">Under 4sqm</label>
                        </div>
                        <div class="row">
                          <div class="col-12 mj-cst-sel-col-add">
                            <label>Seater</label>
                            <div class="qty">
                              <button class="minus mj-bd-dark">-</button>
                              <input type="number" class="count" name="qty" value="1" />
                              <button class="plus mj-bd-dark">+</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 mj-cst-sel-col-add">
                        <div class="custom-control custom-radio">
                          <input
                            type="radio"
                            class="custom-control-input"
                            id="mj_undermore"
                            name="mjradio"
                          />
                          <label class="custom-control-label" for="mj_undermore">Under 6sqm</label>
                        </div>
                        <div class="row">
                          <div class="col-12 mj-cst-sel-col-add">
                            <label>Seater</label>
                            <div class="qty">
                              <button class="minus mj-bd-dark">-</button>
                              <input type="number" class="count" name="qty" value="1" />
                              <button class="plus mj-bd-dark">+</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="mj-cst-sel-col-radio col-12">
                    <div class="custom-control custom-checkbox">
                      <input
                        type="checkbox"
                        class="custom-control-input"
                        id="mj_matt"
                        name="mjradio"
                      />
                      <label class="custom-control-label" for="mj_matt">
                        <img src="images/laundry.jpeg" />
                        Uphostery Cleaning
                      </label>
                    </div>
                    <div class="row">
                      <div class="col-12 mj-cst-sel-col-add">
                        <div class="custom-control custom-radio">
                          <input
                            type="radio"
                            class="custom-control-input"
                            id="mj_single"
                            name="mjradio"
                          />
                          <label class="custom-control-label" for="mj_single">Couches Cleaning</label>
                        </div>
                        <div class="row">
                          <div class="col-12 mj-cst-sel-col-add">
                            <label>Seater</label>
                            <div class="qty">
                              <button class="minus mj-bd-dark">-</button>
                              <input type="number" class="count" name="qty" value="1" />
                              <button class="plus mj-bd-dark">+</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 mj-cst-sel-col-add">
                        <div class="custom-control custom-radio">
                          <input
                            type="radio"
                            class="custom-control-input"
                            id="mj_armchair"
                            name="mjradio"
                          />
                          <label class="custom-control-label" for="mj_armchair">Arm chair</label>
                        </div>
                        <div class="row">
                          <div class="col-12 mj-cst-sel-col-add">
                            <label>Seater</label>
                            <div class="qty">
                              <button class="minus mj-bd-dark">-</button>
                              <input type="number" class="count" name="qty" value="1" />
                              <button class="plus mj-bd-dark">+</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 mj-cst-sel-col-add">
                        <div class="custom-control custom-radio">
                          <input
                            type="radio"
                            class="custom-control-input"
                            id="mj_dining"
                            name="mjradio"
                          />
                          <label class="custom-control-label" for="mj_dining">Dining Chair</label>
                        </div>
                        <div class="row">
                          <div class="col-12 mj-cst-sel-col-add">
                            <label>Seater</label>
                            <div class="qty">
                              <button class="minus mj-bd-dark">-</button>
                              <input type="number" class="count" name="qty" value="1" />
                              <button class="plus mj-bd-dark">+</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
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
                        Pressure Cleaning
                      </label>
                    </div>
                    <div class="row">
                      <div class="col-12 mj-cst-sel-col-add">
                        <div class="custom-control custom-radio">
                          <input
                            type="radio"
                            class="custom-control-input"
                            id="mj_bellow"
                            name="mjradio"
                          />
                          <label class="custom-control-label" for="mj_bellow">Bellow 15sqm</label>
                        </div>
                      </div>
                      <div class="col-12 mj-cst-sel-col-add">
                        <div class="custom-control custom-radio">
                          <input
                            type="radio"
                            class="custom-control-input"
                            id="mj_above"
                            name="mjradio"
                          />
                          <label class="custom-control-label" for="mj_above">Above 15sqm</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="mj-cst-sel-col-radio col-12">
                    <div class="custom-control custom-checkbox">
                      <input
                        type="checkbox"
                        class="custom-control-input"
                        id="mj_tng"
                        name="mjradio"
                      />
                      <label class="custom-control-label" for="mj_tng">
                        <img src="images/laundry.jpeg" />
                        Tiles and Grouts Cleaning
                      </label>
                    </div>
                    <div class="row">
                      <div class="col-12 mj-cst-sel-col-add">
                        <div class="custom-control custom-radio">
                          <input
                            type="radio"
                            class="custom-control-input"
                            id="mj_bellowg"
                            name="mjradio"
                          />
                          <label class="custom-control-label" for="mj_bellowg">Bellow 15sqm</label>
                        </div>
                      </div>
                      <div class="col-12 mj-cst-sel-col-add">
                        <div class="custom-control custom-radio">
                          <input
                            type="radio"
                            class="custom-control-input"
                            id="mj_aboveg"
                            name="mjradio"
                          />
                          <label class="custom-control-label" for="mj_aboveg">Above 15sqm</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <Progress :progress="progress"></Progress>
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
                  <a
                    @click="$emit('page-progressed',{
                      selectedAdditionalServices,
                      additionalServicesRoomCount,
                      increment : true,
                      })"
                    class="btn mg-btn-primary"
                  >
                    Next
                    <i class="fa fa-arrow-right"></i>
                  </a>
                </div>
              </div>
            </div>
          </form>
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
  mounted() {
    console.log("Component mounted.");
  },
};
</script>
