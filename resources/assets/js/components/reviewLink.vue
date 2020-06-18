<template>
		<v-app id="inspire">
            
       	<!-- **************************menu********************************** -->
			<menubar></menubar>
	
      <!-- **************************body********************************** -->
            <v-content>
          <v-container fluid>
      
          <!-- ************************** content********************************** -->
          <template>

                <div class="body-back">
                    <div class="masthead pdng-stn1">
                        
                        <div class="phone-box wrap push" id="home">
                        
                            <!--/blog-->
                            <div class="services-section">
                                <div class="wrap_view_agileits">
                                    <div class="inner_section_wthree">
        
        
                                        <div class="col-md-12 contact_grid_right text-center">
                                                <h6>Generate Review Link For Clients</h6>
                                            <form action="#" method="post">
                                              <p>{{link}}</p>
                                               <br>
                                                <div class="clearfix"> </div>
                         <v-btn type="submit" @click.prevent='generate'  :loading='loading' class='custombtn'>Generate</v-btn>
                                            </form>
                                        </div>
                                        
                                        <div class="clearfix"> </div>
            
                                    </div>
            
                                </div>
                            </div>
                            <!--//blog-->
                            <!--//footer-->
                            
                            <!--//footer-->
                        </div>
                    </div>
                </div>
            
            </template>
            
            
          
           <!-- ************************** content********************************** -->
      
          </v-container>
          </v-content>
      
    <!-- **************************floating btns********************************** -->
          <floatings></floatings>
    
      <!-- **************************footer ********************************** -->
      <foot></foot>
    
    <!-- **************************auth forms********************************** -->
        <auth></auth>

		
		</v-app>
	  </template>
	  
	  <script>
		export default {
            	 //meta
       metaInfo: {
        title: "Review - Henry Onyemaobi's Portfolio",
             meta: [{
               'name': 'description',
            'content': "Leave a review on Henry Onyemaobi's Portfolio website",
          }],
          noscript: [
          { innerHTML: 'JavaScript is required.' }
        ]
        },
        //meta
		  data: () => ({
            drawer: null,
            link:'',
            loading:false,
          }),
          
		  props: {
			source: String
          },

          methods: {
              up(){
                window.scrollTo(0, 1);
              },

              generate(){
                this.$toasted.clear();
                //toggle loading
                this.loading = true;
                  //goto server,generate link,save and send back
            axios.post('/get-review-link')
            .then(res =>{
                //final link
             this.link  = res.data;
             this.$toasted.show('link generated!');
              //clear toasted in 3 secs
			setTimeout(func=>{
			this.$toasted.clear();
             },3000)
            //clear toasted in 3 secs
             //toggle loading
             this.loading = false;
            })
                
              }
          },

          mounted(){
            this.$toasted.clear();
            document.body.scrollTop = 0;
			document.documentElement.scrollTop = 0;
          }
		}
	  </script>


