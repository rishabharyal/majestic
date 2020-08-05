<template>
  <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 form-group mj-cst-sel-sum">
    <div class="mj-cst-sel-sum-detail">
      <div class="mj-cst-sel-sum-detail-title">
        <h4>{{progress.cleaningType}}</h4>
      </div>
      <div class="mj-cst-sel-sum-detail-bdy">
        <div class="mj-cst-sel-sum-detail-row">
          <label class="mj-cst-sel-sum-detail-row-title">
            <span class="fa fa-map-marker"></span>
            Postcode:
          </label>
          <span class="mj-cst-sel-sum-detail-row-value">{{progress.postalCode}}</span>
        </div>
        <div class="mj-cst-sel-sum-detail-row">
          <label class="mj-cst-sel-sum-detail-row-title">
            <span class="fa fa-sticky-note"></span>
            Selected Services:
          </label>
          <ul class="mj-cst-sel-sum-detail-row-ul">
            <!-- <li class="mj-cst-sel-sum-detail-row-li">{{progress.cleaningType}}</li> -->
            <div v-show="currentPage>2">
              <li class="mj-cst-sel-sum-detail-row-li">
                <strong style="font-weight:bold !important">{{progress.houseOrBlock}}</strong>
              </li>
            </div>
            <div v-show="currentPage>2" style="padding-left:10px">
              <li
                class="mj-cst-sel-sum-detail-row-li"
                v-for="room in progress.cleaningIdentitiesCounts"
                p
                :key="room.title"
              >
                <span v-if="room.count>0">
                  {{
                  room.title + ' - '+ room.count}}
                </span>
              </li>
            </div>
            <div v-show="currentPage>3">
              <li
                class="mj-cst-sel-sum-detail-row-li"
                v-for="extraCleaningIdentity in progress.extraCleaningIdentities"
                :key="'extra_identity_'+extraCleaningIdentity"
              >
                {{
                extraCleaningIdentity}}
              </li>
            </div>
            <div>
              <li
                class="mj-cst-sel-sum-detail-row-li"
                v-for="extraCleaningType in progress.extraCleaningTypes"
                :key="'extra_type_'+extraCleaningType.title"
              >
                {{
                extraCleaningType.title}}
                <div v-if="extraCleaningType.children.length>0">
                  <li
                    style="padding-left:10px"
                    class="mj-cst-sel-sum-detail-row-li"
                    v-for="extraCleaningTypeIdentity in extraCleaningType.children"
                    :key="'extra_type_identity_'+extraCleaningTypeIdentity.title"
                  >
                    <span v-if="extraCleaningTypeIdentity.count>0">
                      {{
                      extraCleaningTypeIdentity.title + ' - '+extraCleaningTypeIdentity.count}}
                    </span>
                  </li>
                </div>
              </li>
            </div>
          </ul>
          <div class="mj-cst-sel-sum-detail-row-img">
            <img src="images/housecleaning.jpg" />
          </div>
        </div>
      </div>
    </div>
    <div
      class="mj-cst-des-row"
      v-for="cleaningType in cleaningTypeDescriptions"
      :key="cleaningType.id"
      @click="toggleDescription(cleaningType.id)"
    >
      <div>
        <div class="mj-cst-des-row-title">
          <h4>{{cleaningType.title}}</h4>
          <a class="mj-cst-des-row-bt">
            <span class="fa fa-chevron-down"></span>
          </a>
        </div>
        <div
          v-show="visibleDescription == cleaningType.id"
          class="mj-cst-des-row-bdy"
        >{{cleaningType.description}}</div>
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
