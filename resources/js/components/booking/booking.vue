<template>
  <component :is="pages[currentPage]" @page-progressed="handleEvent"></component>
</template>

<script>
import BookingOne from "./one";
import BookingTwo from "./two";
import BookingThree from "./three";
import BookingFour from "./four";
import BookingFive from "./five";
import BookingSix from "./six";
import { mapGetters } from "vuex";

export default {
  components: {
    "booking-one": BookingOne,
    "booking-two": BookingTwo,
    "booking-three": BookingThree,
    "booking-four": BookingFour,
    "booking-five": BookingFive,
    "booking-six": BookingSix,
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
      ],
    };
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
    incrementPage: function () {
      if (this.currentPage < this.pages.length)
        this.$store.dispatch("incrementPage");
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
    ...mapGetters(["currentPage"]),
  },
};
</script>