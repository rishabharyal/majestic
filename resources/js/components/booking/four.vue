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
                  <div
                    class="mj-cst-sel-col-radio col-12"
                    v-for="cleaning in extraCleaningIdentities"
                    :key="cleaning.id"
                  >
                    <div class="custom-control custom-checkbox">
                      <input
                        v-model="selectedExtraCleanings"
                        type="checkbox"
                        class="custom-control-input"
                        :id="cleaning.id"
                        :value="cleaning.id"
                        :name="'mjradio_'+cleaning.id"
                      />
                      <label class="custom-control-label" :for="cleaning.id">
                        <img src="images/laundry.jpeg" />
                        {{cleaning.title}}
                      </label>
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
          </form>
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
    handleSubmit() {
      this.$store.dispatch("updateUserBooking", {
        extraCleaningIdentities: this.selectedExtraCleanings,
      });
      let extraCleaningIdentitiesName = [];
      this.selectedExtraCleanings.forEach((element) => {
        extraCleaningIdentitiesName.push(
          this.searchValueInObject(
            this.extraCleaningIdentities,
            "id",
            element,
            "title"
          )
        );
      });
      // console.log(extraCleaningIdentitiesName);
      this.$store.dispatch("updateProgress", {
        extraCleaningIdentities: extraCleaningIdentitiesName,
      });
      this.$emit("page-progressed", { increment: true });
    },
  },
  data: function () {
    return {
      selectedExtraCleanings: [],
    };
  },
  computed: {
    ...mapGetters(["extraCleaningIdentities", "booking"]),
  },
  created() {
    this.$store.dispatch("getExtraCleaningIdentities");
    this.selectedExtraCleanings = this.booking.extraCleaningIdentities;
  },
};
</script>
