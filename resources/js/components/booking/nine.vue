<template>
  <section class="mj-bdy-section mj-cser-section">
    <div class="mj-bdy-container">
      <div class="mj-bdy-content">
        <div class="mj-inside-bdy">
          <div class="mj-cst-sel row">
            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 mr-auto form-group mj-cst-sel-col">
              <div class="mj-cst-sel-col-header">
                <h3 class="mj-cst">Add Payment</h3>
              </div>
              <div>
                <div class="d-flex flex-column align-items-center">
                  <h2 class="text-primary">{{msg}} {{payAmount}}</h2>
                  <form id="payment-form" class="w-75 px-5 d-flex flex-column align-items-center" >
                      <div ref="card" class="form-control m-2">
                        <!-- A Stripe Element will be inserted here. -->
                      </div>

                       <button :disabled="lockSubmit" class="btn btn-primary shadow-sm" type="submit"  v-on:click.prevent="purchase">Submit</button> 
                  </form>
                </div>
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
      spk: "pk_test_51HLop7KqV8ZWOOg8GMX5WDAHS2sMgbaVGLJRezmgV1yeIARLXZt84sWN6aKcaWztvE1OJD4r6xGbw4SNMzWmR4xk00sqSkEL3d",
      stripe: undefined,
      card:undefined,
      msg: 'Ammount', 
      payAmmount:"$200",
      lockSubmit:false,
      // api:"majestic.test"
    };
  },
  components: {
    Progress,
  },
  methods: {
    purchase() {
      var self = this;
      self.lockSubmit = true;

      self.stripe.createToken(self.cardNumber).then((result)=> {
        if(result.error){
          alert(result.error.message);
          self.$forceUpdate();
          self.lockSubmit = false
          return;
        } else {
          self.processTransaction(result.token.id);
        }
      })
      .catch(err => {
        alert("error: "+err.message);
        self.lockSubmit=false;
      })
    },

    processTransaction(transactionToken) {
      var self = this;
      dt = {
        ammount: self.stripCurrency(self.payAmmount),
        currency: "USD",
        description: "Lets Gooo yeah!!",
        token: transactionToken
      }

      // Post To API

    },
    handleSubmit: function () {
      alert(this.totalPrice);
    },
  },
  computed: {
    ...mapGetters(["finalCleaningTypes", "booking", "totalPrice"]),
  },
  created() {
  },

  mounted() {
    var self = this;
    self.stripe = Stripe(self.spk);
    self.card = self.stripe.elements().create('card');
    self.card.mount(self.$refs.card);
  }
};
</script>
