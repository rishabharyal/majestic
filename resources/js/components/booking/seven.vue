<template>
  <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 form-group mj-cst-sel-sum">
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
</template>

<script>
import { mapGetters } from "vuex";
export default {
  computed: {
    ...mapGetters(["progress", "currentPage", "cleaningTypeDescriptions"]),
  },
  data: function () {
    return {
      visibleDescription: null,
    };
  },
  methods: {
    toggleDescription: function (id) {
      if (this.visibleDescription == id) this.visibleDescription = null;
      else this.visibleDescription = id;
    },
  },
};
</script>
