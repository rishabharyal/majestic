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
              <li class="mj-cst-sel-sum-detail-row-li">{{progress.houseOrBlock}}</li>
            </div>
            <div v-show="currentPage>2">
              <li
                class="mj-cst-sel-sum-detail-row-li"
                v-for="room in progress.cleaningIdentitiesCounts"
                :key="room.title"
              >
                {{
                room.title + ' - '+ room.count}}
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
            <div v-show="currentPage>4">
              <li
                class="mj-cst-sel-sum-detail-row-li"
                v-for="extraCleaningType in progress.extraCleaningTypes"
                :key="'extra_type_'+extraCleaningType"
              >
                {{
                extraCleaningType}}
              </li>
            </div>
          </ul>
          <div class="mj-cst-sel-sum-detail-row-img">
            <img src="images/housecleaning.jpg" />
          </div>
        </div>
      </div>
    </div>
    <!-- <div class="mj-cst-des-row">
      <div class="mj-cst-des-row-title">
        <h4>Lorem</h4>
        <a href="#" class="mj-cst-des-row-bt">
          <span class="fa fa-chevron-down"></span>
        </a>
      </div>
      <div class="mj-cst-des-row-bdy">
        <ul class="mj-cst-des-row-ul">
          <li class="mj-cst-des-row-li">Lorem ipsum dolor sit amet</li>
          <li class="mj-cst-des-row-li">Lorem ipsum dolor sit amet</li>
          <li class="mj-cst-des-row-li">Lorem ipsum dolor sit amet</li>
        </ul>
      </div>
    </div>
    <div class="mj-cst-des-row">
      <div class="mj-cst-des-row-title">
        <h4>Lorem</h4>
        <a href="#" class="mj-cst-des-row-bt">
          <span class="fa fa-chevron-down"></span>
        </a>
      </div>
      <div class="mj-cst-des-row-bdy">
        <ul class="mj-cst-des-row-ul">
          <li class="mj-cst-des-row-li">Lorem ipsum dolor sit amet</li>
          <li class="mj-cst-des-row-li">Lorem ipsum dolor sit amet</li>
          <li class="mj-cst-des-row-li">Lorem ipsum dolor sit amet</li>
        </ul>
      </div>
    </div>-->
  </div>
</template>

<script>
import { mapGetters } from "vuex";
export default {
  computed: {
    ...mapGetters(["progress", "currentPage"]),
  },
};
</script>
