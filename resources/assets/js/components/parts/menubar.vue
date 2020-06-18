<template>
    <div>
        	<!-- **************************Nav drawer content********************************** -->
		  <v-navigation-drawer temporary v-model="drawer" fixed app >
        <br>
                <v-list dense>
    
                    <!-- link -->
                    <v-list-tile @click.stop="drawer = !drawer" >
                      <!-- icon  -->
                      <v-list-tile-action>
                        <v-icon >close</v-icon>
                      </v-list-tile-action>
      
                      <!-- main link -->
                      <v-list-tile-content>
                        <v-list-tile-title>
                              <li><a href='#' class='menu-link'>Close</a></li>
                        </v-list-tile-title>
                      </v-list-tile-content>
                      
                    </v-list-tile>
                  <!-- link -->

                    <!-- link -->
                    <router-link to="/" class='menu-link'>
                  <v-list-tile >
                    <!-- icon -->
                    <v-list-tile-action>
                      <v-icon>home</v-icon>
                    </v-list-tile-action>
    
                    <!-- main link -->
                    <v-list-tile-content>
                      <v-list-tile-title>
                            Home
                      </v-list-tile-title>
                    </v-list-tile-content>
                    
                  </v-list-tile>
                </router-link>
                <!-- link -->
    
                <!-- link -->
                <router-link to="/blog" class='menu-link'>
                  <v-list-tile @click="">
                <!-- icon -->
                        <v-list-tile-action>
                          <v-icon>comment</v-icon>
                        </v-list-tile-action>
    
                        <!-- main link -->
                        <v-list-tile-content>
                          <v-list-tile-title>
                                Blog
                          </v-list-tile-title>
                        </v-list-tile-content>
                        
                      </v-list-tile>
                    </router-link>
                <!-- link -->
    
                <!-- link -->
                <router-link to="/services" class='menu-link'>
                <v-list-tile @click="">
                        <!-- icon -->
                                <v-list-tile-action>
                                  <v-icon>build</v-icon>
                                </v-list-tile-action>
            
                                <!-- main link -->
                                <v-list-tile-content>
                                  <v-list-tile-title>
                                Services
                                  </v-list-tile-title>
                                </v-list-tile-content>
                                
                              </v-list-tile>
                            </router-link>
                        <!-- link -->
    
                        <!-- link -->
                        <router-link to="/projects" class='menu-link'>
                        <v-list-tile @click="">
                                <!-- icon -->
                                        <v-list-tile-action>
                                          <v-icon>archive</v-icon>
                                        </v-list-tile-action>
                    
                                        <!-- main link -->
                                        <v-list-tile-content>
                                          <v-list-tile-title>
                                                Projects
                                          </v-list-tile-title>
                                        </v-list-tile-content>
                                        
                                      </v-list-tile>
                                    </router-link>
                                <!-- link -->
    
                                <!-- link -->
                                <router-link to="/contact" class='menu-link'>
                  <v-list-tile @click="">
                        <!-- icon -->
                                <v-list-tile-action>
                                  <v-icon>settings_phone</v-icon>
                                </v-list-tile-action>
            
                                <!-- main link -->
                                <v-list-tile-content>
                                  <v-list-tile-title>
                            Contact
                                  </v-list-tile-title>
                                </v-list-tile-content>
                                
                              </v-list-tile>
                            </router-link>
                        <!-- link -->
    
                        <span v-if="isauth()">
                        <!-- link -->
                        <router-link to="/manage-blog" class='menu-link'>
                        <v-list-tile @click="">
                                <!-- icon -->
                                        <v-list-tile-action>
                                          <v-icon>settings</v-icon>
                                        </v-list-tile-action>
                    
                                        <!-- main link -->
                                        <v-list-tile-content>
                                          <v-list-tile-title>
                                                Manage Blog
                                          </v-list-tile-title>
                                        </v-list-tile-content>
                                        
                                      </v-list-tile>
                                    </router-link>
                                <!-- link -->
    
                                <!-- link -->
                                <router-link to="/manage-project" class='menu-link'>
                  <v-list-tile @click="">
                        <!-- icon -->
                                <v-list-tile-action>
                                  <v-icon>settings</v-icon>
                                </v-list-tile-action>
            
                                <!-- main link -->
                                <v-list-tile-content>
                                  <v-list-tile-title>
                                        Manage Project
                                  </v-list-tile-title>
                                </v-list-tile-content>
                                
                              </v-list-tile>
                            </router-link>
                        <!-- link -->
    
                        <!-- link -->
                        <a @click.prevent='exportmaillist' class='menu-link'>
                        <v-list-tile @click="">
                                <!-- icon -->
                                        <v-list-tile-action>
                                          <v-icon>mail</v-icon>
                                        </v-list-tile-action>
                    
                                        <!-- main link -->
                                        <v-list-tile-content>
                                          <v-list-tile-title>
                                                Mail List
                                          </v-list-tile-title>
                                        </v-list-tile-content>
                                        
                                      </v-list-tile>
                                    </a>
                                <!-- link -->
    
                                <!-- link -->
                                <router-link to="/review-link" class='menu-link'>
                  <v-list-tile @click="">
                        <!-- icon -->
                                <v-list-tile-action>
                                  <v-icon>share</v-icon>
                                </v-list-tile-action>
            
                                <!-- main link -->
                                <v-list-tile-content>
                                  <v-list-tile-title>
                                        Generate Review Link
                                  </v-list-tile-title>
                                </v-list-tile-content>
                                
                              </v-list-tile>
                            </router-link>
                        <!-- link -->

                          <!-- link -->
                          <a @click.prevent='logout()' class='menu-link'>
                            <v-list-tile @click="">
                                  <!-- icon -->
                                          <v-list-tile-action>
                                            <v-icon>power_off</v-icon>
                                          </v-list-tile-action>
                      
                                          <!-- main link -->
                                          <v-list-tile-content>
                                            <v-list-tile-title>
                                                  Logout
                                            </v-list-tile-title>
                                          </v-list-tile-content>
                                          
                                        </v-list-tile>
                                      </a>
                                  <!-- link -->
                                    
     <!-- link -->
     <router-link to='/review/4747' class='menu-link'>
        <v-list-tile @click="">
              <!-- icon -->
                      <v-list-tile-action>
                        <v-icon>thumb_up_alt</v-icon>
                      </v-list-tile-action>
  
                      <!-- main link -->
                      <v-list-tile-content>
                        <v-list-tile-title>
                             Review
                        </v-list-tile-title>
                      </v-list-tile-content>
                      
                    </v-list-tile>
                  </router-link>
              <!-- link -->
                                 
                                </span>
                 
                </v-list>
              </v-navigation-drawer>
    <!-- **************************Nav drawer content********************************** -->
    
              <!-- **************************Hamburger menubar content********************************** -->
              <v-toolbar color="#123c69" dark fixed app>
                <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
                <v-toolbar-title><router-link class='text-white underline' to='/'>MobyTech</router-link></v-toolbar-title>
    
                <v-spacer></v-spacer>
                <v-badge>
                 
        <v-icon data-toggle="modal" data-target="#loginModal">account_circle</v-icon>
        
                </v-badge>
                
              </v-toolbar>



              <!-- login -->
              <div class="modal fade" id="loginModal" tabindex="-1" role="">
                  <div class="modal-dialog modal-login" role="document">
                      <div class="modal-content">
                          <div class="card card-signup card-plain">
                             
                              <div class="modal-body">
                                  <form class="form" method="" action="">
                                      <div class="card-body">
              
              
                                          <div class="form-group bmd-form-group">
                                              <div class="input-group">
                                                 
              <input v-model='Email' v-validate='"required|email"' name="Email" type="text" class="form-control" placeholder="Email...">
                                              </div>
                                             
                                          </div>
              
                                          <div class="form-group bmd-form-group">
                                              <div class="input-group">
                                                 
               <input v-model='Password' v-validate='"required"' name="Password" type="password" placeholder="Password..." class="form-control">
                                              </div>
                                            
                                          </div>

                                          <div class="form-group bmd-form-group">
                                              <div class="input-group">
                               <button @click.prevent='login()' :loading='loading' class='btn btn-default'>Login</button>    
                                              </div>
                                          </div>

                                      </div>
                                  </form>
                              </div>
                             
                              <div class="modal-footer justify-content-center">
                                  <P>Admin Area</p>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <!--login-->




              
    </div>
</template>

<style scoped>
  .menu-link{
    color:#ac3b61 !important;
  }
</style>
	  
<script>
		export default {
		  data: () => ({
          mail:'',
            pass:'',
            loading:false,
            confirmedP: '',
            Email:'',
            Password:'',
			drawer: false,
		  }),
		  props: {
			source: String
          },

          methods: {

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
                        }else{
                              var token = null;   
                              this.$toasted.show('Login failed, please verify credentials...');
                              
                        }

                        this.loading = false;
                        NProgress.done()
                  })
                  .catch(error =>{
                    this.$toasted.show('Login failed...');
                    this.loading = false;
                        NProgress.done()
                  })
                 }, //login

            exportmaillist(){
              axios({
                url: '/downloadExcel',
                method: 'GET',
                responseType: 'blob', // important
              }).then((response) => {
                const url = window.URL.createObjectURL(new Blob([response.data]));
                const link = document.createElement('a');
                link.href = url;
                link.setAttribute('download', 'Maillist.csv'); //or any other extension
                document.body.appendChild(link);
                link.click();
              });
            },

                isauth(){
                  if(localStorage.getItem('token')){
                        return true;
                  }else{
                        return false;
                  }
                   },


                    logout(){
                        NProgress.start()
                   localStorage.removeItem('token');
                   this.isauth();
                   this.drawer = false;
                   console.log('logged out');
                    this.$router.push({name:'index'});
                    NProgress.done();
                    },
            
          }
		}
	  </script>