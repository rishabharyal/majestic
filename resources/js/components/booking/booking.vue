<template>
  <component
    :is="pages[currentPage]"
    :variables="passData"
    :page="currentPage"
    :progress="progress"
    @event-emitted="handleEvent"
  ></component>
</template>

<script>
import BookingOne from "./one";
import BookingTwo from "./two";
import BookingThree from "./three";
import BookingFour from "./four";
import BookingFive from "./five";
import BookingSix from "./six";

export default {
  components: {
    "booking-one": BookingOne,
    "booking-two": BookingTwo,
    "booking-three": BookingThree,
    "booking-four": BookingFour,
    // "booking-five": BookingFive,
    // "booking-six": BookingSix,
  },
  data: function () {
    return {
      currentPage: 0,
      pages: [
        "booking-one",
        "booking-two",
        "booking-three",
        "booking-four",
        // "booking-five",
        // "booking-six",
      ],
      roomTypes: [
        {
          id: 1,
          name: "Bedroom",
        },
        {
          id: 2,
          name: "Bathroom",
        },
        {
          id: 3,
          name: "Dining",
        },
      ],
      extraCleanings: [
        {
          id: 1,
          name: "Laundry",
        },
        {
          id: 2,
          name: "Seperate Toilet",
        },
        {
          id: 3,
          name: "Study Room",
        },
        {
          id: 4,
          name: "Balcony",
        },
        {
          id: 5,
          name: "Garage",
        },
      ],
      booking: {
        cleaningType: "",
        postalCode: "",
        requirement: "",
        roomCount: null,
        selectedExtraCleanings: null,
      },
      cleaningTypes: [
        {
          id: 1,
          img: "images/housecleaning.jpg",
          title: "Office Cleaning",
          price: "$240",
        },
        {
          id: 2,
          img: "images/housecleaning.jpg",
          title: "House CLeaning",
          price: "$240",
        },
        {
          id: 3,
          img: "images/housecleaning.jpg",
          title: "Bathroom CLeaning",
          price: "$240",
        },
        {
          id: 4,
          img: "images/housecleaning.jpg",
          title: "Office Cleaning",
          price: "$240",
        },
        {
          id: 5,
          img: "images/housecleaning.jpg",
          title: "Office Cleaning",
          price: "$240",
        },
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
      if (this.currentPage < this.pages.length) this.currentPage++;
    },
    decrementPage: function () {
      if (this.currentPage > 0) this.currentPage--;
    },
    handleEvent: function (data) {
      let d = data[this.currentPage];
      for (const key in d) {
        if (d.hasOwnProperty(key)) {
          this.booking[key] = d[key];
        }
      }
      if (data.hasOwnProperty("increment") && data["increment"])
        this.incrementPage();
      if (data.hasOwnProperty("decrement") && data["decrement"])
        this.decrementPage();
    },
  },

  computed: {
    passData: function () {
      switch (this.currentPage) {
        case 0:
          return { cleaningTypes: this.cleaningTypes };
          break;
        case 1:
          return {};
          break;
        case 2:
          return {
            roomTypes: this.roomTypes,
            old: {
              requirement: this.booking.requirement,
              roomCount: this.booking.roomCount,
            },
          };
          break;
        case 3:
          return { extraCleanings: this.extraCleanings };
          break;
        default: {
          return {};
        }
      }
    },
    progress: function () {
      return {
        postalCode: this.booking.postalCode,
        cleaningType: this.cleaningTypes[this.booking.cleaningType]
          ? this.cleaningTypes[this.booking.cleaningType].title
          : "",
        requirement: this.booking.requirement,
        roomCount: this.getRoomCountObject,
      };
    },
    getRoomCountObject: function () {
      let obj = [];
      for (let roomTypeId in this.booking.roomCount) {
        obj.push({
          title: this.searchValueInObject(
            this.roomTypes,
            "id",
            roomTypeId,
            "name"
          ),
          value: this.booking.roomCount[roomTypeId],
        });
      }
      return obj;
    },
  },
};
</script>