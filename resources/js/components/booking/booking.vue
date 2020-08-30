<template>
  <component :is="pages[currentPage]" @page-progressed="handleEvent"></component>
</template>

<script>
import { BookingServices } from "../../web";
import BookingOne from "./one";
import BookingTwo from "./two";
import BookingThree from "./three";
import BookingFour from "./four";
import BookingFive from "./five";
import BookingSix from "./six";
import BookingSeven from "./seven";
import { mapGetters } from "vuex";

import header from "../navbar";

export default {
  components: {
    "booking-one": BookingOne,
    "booking-two": BookingTwo,
    "booking-three": BookingThree,
    "booking-four": BookingFour,
    "booking-five": BookingFive,
    "booking-six": BookingSix,
    "booking-seven": BookingSeven,
  },
  data: function () {
    return {
      pages: [
        "booking-one",
        "booking-two",
        "booking-three",
        "booking-four",
        "booking-five",
        "booking-six",
        "booking-seven",
      ],
    };
  },
  methods: {
    submitData: function () {
      let booking = {};
      booking["page_1"] = { cleaning_type: this.booking.cleaningType };
      booking["page_2"] = { postal_code: this.booking.postalCode };
      booking["page_3"] = {
        cleaning_size: this.booking.houseOrBlock,
        identities: Object.entries(this.booking.cleaningIdentitiesCounts).map(
          (e) => ({
            id: e[0],
            count: e[1],
          })
        ),
      };
      booking["page_4"] = {
        cleaning_identities: this.booking.extraCleaningIdentities,
      };
      booking["page_5"] = {
        cleaning_types: this.booking.extraCleaningTypes.map((e) => {
          return {
            id: e,
            children: this.booking.extraCleaningTypesCount[e]
              ? Object.entries(this.booking.extraCleaningTypesCount[e]).map(
                  (d) => ({
                    id: d[0],
                    count: d[1],
                  })
                )
              : [],
          };
        }),
      };
      booking["page_6"] = {
        cleaning_types: this.booking.finalCleaningTypes.map((e) => {
          return {
            id: e,
            child: {
              id: this.booking.finalCleaningTypesIdentities[e],
              count: this.booking.finalCleaningIdentitiesCount[e]
                ? this.booking.finalCleaningIdentitiesCount[e][
                    this.booking.finalCleaningTypesIdentities[e]
                  ]
                : null,
            },
          };
        }),
      };

      // BookingServices.store(booking).then((data) => {
        
      // });
      this.$store.dispatch('updateTotalPrice', 500);
    },
    incrementPage: function () {
      console.log(this.currentPage);
      console.log(this.pages.length);
      if (this.currentPage + 1 < this.pages.length)
        this.$store.dispatch("incrementPage");
      else {
        console.log("Submitting dara");
        this.submitData();
      }
    },
    decrementPage: function () {
      if (this.currentPage > 0) this.$store.dispatch("decrementPage");
    },
    handleEvent: function (data) {
      if (data.hasOwnProperty("increment") && data["increment"])
        this.incrementPage();
      if (data.hasOwnProperty("decrement") && data["decrement"])
        this.decrementPage();
    },
  },
  computed: {
    ...mapGetters(["currentPage", "booking"]),
  },
  created() {
    this.$store.dispatch("getCleaningTypes");
    this.$store.dispatch("getCleaningTypeDescriptions");
    this.$store.dispatch("getExtraCleaningIdentities");
    this.$store.dispatch("getExtraCleaningTypes");
    this.$store.dispatch("getFinalCleaningTypes");
  },
};
</script>