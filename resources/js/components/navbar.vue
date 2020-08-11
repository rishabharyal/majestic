<template >
  <section class="mj-nav-section clearfix">
    <div class="mj-nav-container clearfix">
      <nav
        class="navbar navbar-expand-lg navbar-light"
        data-spy="affix"
        data-offset-top="205"
        id="mj_nav"
      >
        <!-- fixed-top -->
        <div class="nav-bdy-content">
          <div class="nav-container-logo navbar-nav mr-auto">
            <a href="/" class="logo-container-anchor">
              <img src="images/logo.png" />
            </a>
          </div>
          <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>

          <div
            class="collapse navbar-collapse"
            id="navbarNavDropdown"
            v-if="!loginStatus || loginStatus == 'false'"
          >
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a
                  class="nav-link nav-link-a nav-login"
                  href="#"
                  @click="showLoginForm = true"
                >Login</a>
              </li>
              <li class="nav-item">
                <a
                  href="#"
                  @click="showRegisterForm = true"
                  class="nav-link nav-link-a nav-signup"
                >Sign Up</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div v-if="showRegisterForm">
        <transition name="modal">
          <div class="modal-mask">
            <div class="modal-wrapper">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-body">
                    <button
                      type="button"
                      class="close"
                      data-dismiss="modal"
                      aria-label="Close"
                      @click="showRegisterForm = false"
                    >
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="mj-model-header">
                      <div class="mj-model-header-logo">
                        <img src="images/logo.png" />
                      </div>
                      <span
                        class="mj-modelspan"
                      >Connect with majestic cleaning pros for better cleaning services</span>
                    </div>
                    <div class="mj-model-bdy">
                      <div class="mj-social-login">
                        <a href="#" class="btn mj-model-btn mj-btn-fb">
                          <span class="mj-model-btn-icon">
                            <i class="fa fa-facebook"></i>
                          </span>
                          Signup with Facebook
                        </a>
                        <a href="#" class="btn mj-model-btn mj-btn-google">
                          <span class="mj-model-btn-icon">
                            <i class="fa fa-google"></i>
                          </span>
                          Signup with Google
                        </a>
                      </div>
                      <div class="mj-divder">
                        <div>OR</div>
                      </div>
                      <div class="mj-login-form">
                        <div class="row">
                          <div class="col-12">
                            <input
                              type="text"
                              name="name"
                              class="mj-model-input"
                              placeholder="Name"
                            />
                          </div>
                          <div class="col-12">
                            <input
                              type="text"
                              name="phone"
                              class="mj-model-input"
                              placeholder="Phone"
                            />
                          </div>
                          <div class="col-12">
                            <input
                              type="email"
                              name="email"
                              class="mj-model-input"
                              placeholder="Email"
                            />
                          </div>
                          <div class="col-12">
                            <input
                              type="Password"
                              name="password"
                              class="mj-model-input"
                              placeholder="Password"
                            />
                          </div>
                          <div class="col-12">
                            <a href="#" class="btn mg-btn-primary mj-modelbtn">Sign Up</a>
                          </div>
                        </div>
                      </div>
                      <div class="mj-model-footer">
                        <div class="mj-pvc-p">
                          <!-- <a href="#" class="mj-fpanchor">Forgot Password?</a> -->
                          <p>
                            By signing up, you agree to Classmonks
                            <a href="#">Terms & condition</a>
                            and
                            <a href="#">Privacy Policy</a>
                          </p>
                        </div>
                        <div
                          class="mj-anchorfooter"
                          @click="showRegisterForm = false;showLoginForm = true;"
                        >
                          <a
                            href="#"
                            data-dismiss="modal"
                            data-toggle="modal"
                            data-target="#Loginmodel"
                          >I already have an account | login</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </transition>
      </div>
      <div v-if="showLoginForm">
        <transition name="modal">
          <div class="modal-mask">
            <div class="modal-wrapper">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-body">
                    <button
                      type="button"
                      @click="showLoginForm=false"
                      class="close"
                      data-dismiss="modal"
                      aria-label="Close"
                    >
                      <span aria-hidden="true">×</span>
                    </button>
                    <div class="mj-model-header">
                      <div class="mj-model-header-logo">
                        <img src="images/logo.png" />
                      </div>
                      <span
                        class="mj-modelspan"
                      >Connect with majestic cleaning pros for better cleaning services</span>
                    </div>
                    <div class="mj-model-bdy">
                      <div class="mj-social-login">
                        <a href="#" class="btn mj-model-btn mj-btn-fb">
                          <span class="mj-model-btn-icon">
                            <i class="fa fa-facebook"></i>
                          </span>
                          Log in with Facebook
                        </a>
                        <a href="#" class="btn mj-model-btn mj-btn-google">
                          <span class="mj-model-btn-icon">
                            <i class="fa fa-google"></i>
                          </span>
                          Log in with Google
                        </a>
                      </div>
                      <div class="mj-divder">
                        <div>OR</div>
                      </div>
                      <div class="mj-login-form">
                        <div class="row">
                          <div class="col-12">
                            <input
                              type="email"
                              name="email"
                              class="mj-model-input"
                              placeholder="Email"
                              v-model="loginData.name"
                              required
                            />
                          </div>
                          <div class="col-12">
                            <input
                              type="Password"
                              name="password"
                              v-model="loginData.password"
                              class="mj-model-input"
                              required
                              placeholder="Password"
                            />
                          </div>
                          <div class="col-12">
                            <button
                              v-if="!isLoading"
                              type="submit"
                              @click="login"
                              class="btn mg-btn-primary mj-modelbtn"
                            >Log In</button>
                            <button v-else class="btn mg-btn-secondary mj-modelbtn">Logging In...</button>
                          </div>
                        </div>
                      </div>
                      <div v-if="showLoginError">
                        <strong style="color:red">The Email or Password doesnot match!</strong>
                      </div>
                      <div class="mj-model-footer">
                        <div class="mj-pvc-p">
                          <!-- <a href="#" class="mj-fpanchor">Forgot Password?</a> -->
                        </div>
                        <div
                          class="mj-anchorfooter"
                          @click="showLoginForm=false;showRegisterForm=true"
                        >
                          <a href="#">
                            I
                            dont have account | Signup
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </transition>
      </div>
    </div>
  </section>
</template>
<script>
import { AuthServices } from "../web";
export default {
  props: ["isLoggedIn"],
  methods: {
    login: function () {
      this.isLoading = true;
      AuthServices.login({
        username: this.loginData.name,
        password: this.loginData.password,
      })
        .then((result) => {
          console.log(result);
          this.isLoading = false;
          if (result["data"]["success"]) {
            this.showLoginError = false;
            this.showLoginForm = false;
            this.loginStatus = true;
          } else {
            this.showLoginError = true;
          }
        })
        .catch((e) => {
          this.isLoading = false;
          this.loginStatus = true;
          this.showLoginError = true;
        });
    },
  },
  data: function () {
    return {
      showLoginForm: false,
      showRegisterForm: false,
      showLoginError: false,
      isLoading: false,
      loginStatus: this.isLoggedIn,
      loginData: {
        name: "",
        password: "",
      },
    };
  },
  created() {
    if (!this.loginStatus) {
      this.showLoginForm = true;
    }
  },
};
</script>

<style >
.modal-mask {
  position: fixed;
  z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  display: table;
  transition: opacity 0.3s ease;
}

.modal-wrapper {
  display: table-cell;
  vertical-align: middle;
}
</style>