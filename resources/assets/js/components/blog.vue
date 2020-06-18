<template>
  	<div>
		<v-app id="inspire">
            
       	<!-- **************************menu********************************** -->
			<menubar></menubar>
	
      <!-- **************************body********************************** -->
            <v-content>
          <v-container fluid>
      
          <!-- ************************** content********************************** -->
          <blogcon></blogcon>
      
          </v-container>
          </v-content>
      
    <!-- **************************floating btns********************************** -->
          <floatings></floatings>
    
      <!-- **************************footer ********************************** -->
      <foot></foot>
    
    <!-- **************************auth forms********************************** -->
        <auth></auth>

		
    </v-app>
  </div>
	  </template>
    
    <style scoped>
        @import '/css/blog.css';
        </style>

	  <script>
		export default {
       //meta
       metaInfo: {
          title: "Henry Onyemaobi's Portfolio - Tech Blog",
             meta: [{
               'name': 'description',
            'content': "Henry Onyemaobi's tech blog for web development solution discussions",
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


