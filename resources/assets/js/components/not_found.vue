<template>
		<v-app id="inspire">
            
       	<!-- **************************menu********************************** -->
			<menubar></menubar>
	
      <!-- **************************body********************************** -->
            <v-content>
          <v-container fluid>
      
          <!-- ************************** content********************************** -->
           <!--/blog-->
           <div class="services-section">
                <div class="wrap_view_agileits">
                    <div class="error_page">
                        <h4>404</h4>
                        <p>Invalid link</p>
                       
                        <router-link class="b-home" to="/">Back to Home</router-link>

                    </div>

                </div>
            </div>
            <!--//blog-->
      
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
          title: "Page not found - Henry Onyemaobi's Portfolio website",
             meta: [{
               'name': 'description',
            'content': "Henry Onyemaobi's Portfolio website",
          }],
          noscript: [
          { innerHTML: 'JavaScript is required.' }
        ]
        },
        //meta
		  data: () => ({
			drawer: null,
		  }),
		  props: {
			source: String
          },
          methods: {
            
          },
          mounted(){
				document.body.scrollTop = 0;
				document.documentElement.scrollTop = 0;
			}
		}
	  </script>


