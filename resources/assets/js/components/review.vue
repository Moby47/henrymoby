<template>
		<v-app id="inspire">

			<!-- **************************menu********************************** -->
			<menubar></menubar>
	
	<!-- **************************body********************************** -->
		    <v-content>
			<v-container fluid>
	
			<!-- ************************** content********************************** -->
            <div class="body-back">
                    <div class="masthead pdng-stn1">
                        
                        <div class="phone-box wrap push" id="home">
                        
                            <!--/blog-->
                            <div class="services-section">
                                <div class="wrap_view_agileits">
                                    <div class="inner_section_wthree">
                                        <!--loading temp-->
<div v-if='load'>
        <template>
            <v-progress-circular v-model="valueDeterminate"></v-progress-circular>
          </template>
        </div>
        <!--loading temp-->
                                        <div class="col-md-7 contact_grid_right">
                                            <h6>Kindly Leave a Review.</h6>
                                            <form action="#" method="post">
                                                <div class="col-md-6 col-sm-6 contact_left_grid">
                                   <input type="text" v-model='Name' v-validate='"required|max:49"' name="Name" placeholder="Full Name" required="">
                                   <transition name="fadeLeft"> 
                                        <span  class='custom-alert' v-show="errors.has('Name')">{{ errors.first('Name') }}</span>
                                       </transition>         
                                </div>
                                                <div class="clearfix"> </div>
          <textarea v-model='Message' v-validate='"required|max:254"' name="Message"  required="" placeholder="Message..."></textarea>
                                   <transition name="fadeLeft">
                                        <span class='custom-alert' v-show="errors.has('Message')">{{ errors.first('Message') }}</span>
                                       </transition> 
                                       <br>
                                   <input type="submit" @click.prevent='go' value="Submit">
                                            </form>
                                        </div>
                                        <div class="col-md-5 contact-left">
                                            
                                            
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
      
      <style scoped>
        @import '/css/contact.css';
				</style>
	  
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
            Name:'',
            Message:'',
            load: false,
            valueDeterminate: 0,
            valerror:[]
          }),

          mounted(){
            this.$toasted.clear();
            document.body.scrollTop = 0;
			document.documentElement.scrollTop = 0;

            var input = {'pass':this.$route.params.pass}
              axios.post('/link-validate', input)
              .then(res=>{
                  if(res.data == 1){
                    this.$toasted.show('welcome! Please drop a kind review')
                     //clear toasted in 3 secs
			setTimeout(func=>{
			this.$toasted.clear();
             },5000)
            //clear toasted in 3 secs
                  }else{
                      alert('You are not authorized to use this page');
                      //redirect
                      this.$router.push({name: "index"});
                  }
                  
              })
             

          },

          methods: {

            go(){
        this.$toasted.clear();
                  //validate
     this.$validator.validateAll().then(() => {
       
       if (!this.errors.any()) {
             // Start the route progress bar.
      NProgress.start()
        var input = {Name: this.Name, Message: this.Message};
                axios.post('/leave-review',input)
            .then(res=>{
        if(res.data == 1){
            this.$toasted.show("Review Successful!");
            //clear in 3 secs
			setTimeout(func=>{
			this.$toasted.clear();
            },3000)
             //clear form and errorbag
            this.Name ='';
            this.Message ='';
                setTimeout(func=>{
                    this.errors.clear()
                },1) 
	//clear form and errorbag
        }else{
            this.$toasted.show("An Error Occured, Please contact Admin");
        }
        NProgress.done();
        }) 
        .catch(error =>{
                  if(error.response.status == 422){
                    this.valerror = error.response.data.errors;
                    if(this.valerror){
                      this.$toasted.show("Please verify your information are correct...");
                    }
                  }
            NProgress.done();        
              })
      }else{
        //error occured
     this.$toasted.show('Validation errors detected...');    
     //clear in 3 secs
			setTimeout(func=>{
			this.$toasted.clear();
			},3000)
      }
     
     })
       },

          },

		  props: {
			source: String
		  },
		
		}
	  </script>


