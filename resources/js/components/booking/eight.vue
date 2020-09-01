<template>
  <section class="mj-bdy-section mj-cser-section">
    <div class="mj-bdy-container">
      <div class="mj-bdy-content">
        <div class="mj-inside-bdy">
          <div class="mj-cst-sel row">
            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 mr-auto form-group mj-cst-sel-col">
              <div class="mj-cst-sel-col-header">
                <h3 class="mj-cst">Select Time Slot</h3>
              </div>
              <div>
                <h5>10Am to 12Pm</h5>
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
                  Next
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
    handleSubmit: function () {
      this.$emit("page-progressed", {
          increment:true,
      });
    },
  },
  computed: {
    ...mapGetters(["finalCleaningTypes", "booking", "totalPrice"]),
  },
  created() {
  },
};
</script>
