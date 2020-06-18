<template>
    <div>
        
            <div class="modal fade login" id="loginModal">
                    <div class="modal-dialog login animated">
                        <div class="modal-content">
                          <!-- <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title">Login with</h4>
                          </div>
                        -->
                        <span v-if='isauth()'>
                                <h4 class="modal-title">You are logged in...</h4>
                            </span>
                          <div class="modal-body" v-else>

                            
                              <div class="box">
                                   <div class="content">
                                   <!--   <div class="social">
                                          <a class="circle github" href="#">
                                              <i class="fa fa-github fa-fw"></i>
                                          </a>
                                          <a id="google_login" class="circle google" href="#">
                                              <i class="fa fa-google-plus fa-fw"></i>
                                          </a>
                                          <a id="facebook_login" class="circle facebook" href="#">
                                              <i class="fa fa-facebook fa-fw"></i>
                                          </a>
                                      </div>
                                      <div class="division">
                                          <div class="line l"></div>
                                            <span>or</span>
                                          <div class="line r"></div>
                                      </div>
                                    -->
                                      <div class="error"></div>
                                      <div class="form loginBox">
                                          <form method="" action="" accept-charset="UTF-8">
                   <input v-model='Email' id="Email" v-validate='"required|email"' class="form-control" type="text" placeholder="Email" name="Email">
                   <transition name="fadeLeft">
                        <span class='custom-alert' v-show="errors.has('Email')">{{ errors.first('Email') }}</span>
                       </transition>
                   <input v-model='Password' v-validate='"required"' ref='password' id="Password" class="form-control" type="password" placeholder="Password" name="Password">
                   <transition name="fadeLeft">
                        <span class='custom-alert' v-show="errors.has('Password')">{{ errors.first('Password') }}</span>
                       </transition> 
     <v-btn @click.prevent='login()' :loading='loading' class="btn btn-info btn-login" type="button" value="">Login</v-btn>
                                          </form>
                                      </div>
                                   </div>
                              </div>





                              
                              <div class="box">
                                  <div class="content registerBox" style="display:none;">
                                   <div class="form">
                                      <form method="" data-remote="true" action="">
     <input id="mail" v-model='mail' v-validate='"required|email"' class="form-control" type="text" placeholder="Email" name="email" required>
     <transition name="fadeLeft">
            <span class='custom-alert' v-show="errors.has('email')">{{ errors.first('email') }}</span>
           </transition> 
     <input id="pass" v-model='pass' v-validate='"required"' ref='password' class="form-control" type="password" placeholder="Password" name="password" required>
     <transition name="fadeLeft">
            <span class='custom-alert' v-show="errors.has('password')">{{ errors.first('password') }}</span>
           </transition> 

     <input id="password_confirmation" v-model='confirmedP' v-validate='"confirmed:password|required"'  class="form-control" type="password" placeholder="Repeat Password" name="password_confirmation" required>
     <transition name="fadeLeft">
            <span class='custom-alert' v-show="errors.has('password_confirmation')">{{ errors.first('password_confirmation') }}</span>
           </transition> 
     <v-btn @click.prevent='reg()' :loading='loading' class="btn btn-info btn-register" type="button" value="" name="commit">Create account</v-btn>
                                      </form>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="modal-footer">
                              <div class="forgot login-footer">
                                  <span v-if='!isauth()'>Looking to 
                                       <a href="javascript: showRegisterForm();">create an account</a>
                                  ?</span>
                              </div>
                              <div class="forgot register-footer" style="display:none">
                                   <span>Already have an account?</span>
                                   <a href="javascript: showLoginForm();">Login</a>
                              </div>
                          </div>
                        </div>
                    </div>
                </div>

</div>
</template>


<script>

export default{
    data(){
        return{
            mail:'',
            pass:'',
            loading:false,
            confirmedP: '',
            Email:'',
            Password:''
        }
    },

    methods: {

                         reg(){
                            NProgress.start()
                            this.loading = true;
                    var input = {'email':this.mail, 'password':this.pass};
                    //send to database with axios
                        axios.post('/admin-register',input)
                        .then(res=>{
                      if(res.data.success == 'user created!'){
                        this.$toasted.show('Registeration successful...'); 
                        
                        setTimeout(func=>{
                            this.$toasted.clear();
                        },3000);
                      }
                    this.loading = false;
                     NProgress.done()
                      })
                      .catch(error=>{
                  this.$toasted.show('Critical error...');
                  this.loading = false;  
                      })
                           
        },

         login(){
            this.loading = true;
            NProgress.start();

                  var input = {'email':this.Email, 'password':this.Password};
                  
                  axios.post('/admin-login',input)
                  .then(res => {
                        var token = res.data.token;
                       // console.log('token is  ' + token);
                        if(token){
                              localStorage.setItem('token',token);
                              this.isauth();
                              this.$toasted.show('Login successful!');
                              //clear in 3 secs
                            setTimeout(func=>{
                            this.$toasted.clear();
                            },3000)
                        }else{
                              var token = null;   
                              this.$toasted.show('Login failed, please verify credentials...');
                              //clear in 3 secs
                            setTimeout(func=>{
                            this.$toasted.clear();
                            },3000)
                        }

                        this.loading = false;
                        NProgress.done()
                  })
                  .catch(error =>{
                    this.$toasted.show('Login failed, please verify credentials...');
                    this.loading = false;
                        NProgress.done()
                              //clear in 3 secs
                            setTimeout(func=>{
                            this.$toasted.clear();
                            },3000)
                  })
                 }, //login



                     isauth(){
                  if(localStorage.getItem('token')){
                        return true;
                  }else{
                        return false;
                  }
                   },
            
    }, //method
}

</script>