<template>
  <section class="mj-bdy-section mj-cser-section">
    <div class="mj-bdy-container">
      <div class="mj-bdy-content">
        <div class="mj-inside-bdy">
          <div class="mj-cst-sel row">
            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 mr-auto form-group mj-cst-sel-col">
              <div class="mj-cst-sel-col-header">
                <h3 class="mj-cst">Login Form</h3>
              </div>
              <div> 
                <form method="POST" action="/api/login">
                  <div class="row">
                      <div class="col-12">
                          <input type="email" name="email" class="mj-model-input @error('email') is-invalid @enderror" placeholder="Email">
                        </div>
                      <div class="col-12">
                          <input type="Password" name="password" class="mj-model-input @error('password') is-invalid @enderror" placeholder="Password">
                        </div>
                      <div class="col-12">
                          <button @click="handleFormSubmit" class="btn mg-btn-primary-outline">Log In</button>
                      </div>
                  </div>
              </form>
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
import { AuthServices } from "../../web";
export default {
  data: function () {
    return {
      selectedFinalCleaningTypes: [],
      selectedFinalCleaningIdentities: {},
      finalCleaningIdentitiesCount: {},
      loginfields:{},
    };
  },
  components: {
    Progress,
  },
  methods: {
    handleSubmit: function () {
        this.$emit("page-progressed", {
            increment: true,
        });
    },

    handleFormSubmit : function(){
      AuthServices.login(this.loginfields).then(response => {
      alert('Login Successful');
      }).catch(error=>{
        if(error.response.status === 422){
          alert(error.response.data.errors);
        }
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
