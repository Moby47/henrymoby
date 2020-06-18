<template>
		<v-app id="inspire">

			<!-- **************************menu********************************** -->
			<menubar></menubar>
	
	<!-- **************************body********************************** -->
		    <v-content>
			<v-container fluid>
	
			<!-- ************************** content********************************** -->
			<projectscon></projectscon>
	
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
          title: "Projects - Henry Onyemaobi's Portfolio",
             meta: [{
               'name': 'description',
            'content': "Henry Onyemaobi's web development projects",
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


