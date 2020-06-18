<template>
		<v-app id="inspire">

			<!-- **************************menu********************************** -->
			<menubar></menubar>
	
	<!-- **************************body********************************** -->
		    <v-content>
			<v-container fluid>
	
			<!-- ************************** content********************************** -->
			<manageprojectcon></manageprojectcon>
	
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
		
		<style scoped>
        @import '/css/contact.css';
				</style>
				
	  <script>
		export default {
				 //meta
				 metaInfo: {
          title: 'Henry Onyemaobi - Portfolio',
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
			mounted(){
				document.body.scrollTop = 0;
				document.documentElement.scrollTop = 0;
			}
		
		}
	  </script>


