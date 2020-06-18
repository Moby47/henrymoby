<template>

    <div class="body-back">
		<div class="masthead pdng-stn1">
			
			<div class="phone-box wrap push" id="home">
			
				<!-- /banner -->
				
				<!-- //banner -->
				<!--/blog-->
				<div class="services-section">
					<div class="wrap_view_agileits">
						<div class="inner_section_wthree">
							<div class="col-md-8 blog_section">
								<div class="blog_con">
								    <div class="blog_img">
 <!--loading temp-->
 <transition name='anime' enter-active-class='animated fadeIn' :duration='200' leave-active-class='animated fadeOut'>
		<div v-if='data_load'>
		  <template>
				Loading Post...
			  <v-progress-circular indeterminate></v-progress-circular>
			</template>
		  </div>
	</transition>
		  <!--loading temp-->

          <!--loading temp-->
		  <transition name='anime' enter-active-class='animated fadeIn' :duration='200' leave-active-class='animated fadeOut'>
				<div v-if='wait'>
				  <template>
					Please stand by...
					 <v-progress-circular indeterminate></v-progress-circular>
							</template>
							 </div>
					</transition>
		  <!--loading temp-->
		  
		  <div v-if='data'>
		<transition name='anime' enter-active-class='animated fadeIn'  leave-active-class='animated fadeOut'>							
	<v-img :src="'/storage/blog/'+singlecontent.image" :alt="singlecontent.title" class="img-responsive blog-image elevation-12"
	:lazy-src="`/images/black-spinner.gif`" > </v-img>
	</transition>
										<div class="col-md-2 blog_date">
											<h4>{{moment(singlecontent.created_at).fromNow()}}</h4>
										</div>
										<div class="col-md-6 blog_info single text-capitalize">
											<h5>{{singlecontent.title}} 
												<v-btn icon @click.prevent='like(singlecontent.id)'>
													<span class="fa fa-thumbs-up" aria-hidden="true"></span>
												  </v-btn>
												  <span>{{singlecontent.likes}}</span>
												</h5>
										</div>
			                        	</div>
										<div class="clearfix"> </div>
										<p v-html='singlecontent.description'>
								
									</p>
									<br>
									<share></share>
									</div>





									<div class="comments">
										<h3>Recent <span>Comments</span></h3>
										<div class="comments-grids">

												
												<template>
														<div class="comments">
								<vue-disqus shortname="henryonyemaobi"
								 :identifier="singlecontent.id"
		 :url="`http://henrymoby.tech/single/`+singlecontent.title.replace(/[.,/*%' '?!()@]/g,'-')+`/`+singlecontent.id">
								</vue-disqus>
														</div>
													  </template>


													<!--	<script>
												
														/**
														*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
														*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
														
														var disqus_config = function () {
														this.page.url = 'http://localhost:8000/#/single/{{singlecontent.title}}';  // Replace PAGE_URL with your page's canonical URL variable
														this.page.identifier = '{{singlecontent.id}}'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
														};
														
														(function() { // DON'T EDIT BELOW THIS LINE
														var d = document, s = d.createElement('script');
														s.src = 'https://henryonyemaobi.disqus.com/embed.js';
														s.setAttribute('data-timestamp', +new Date());
														(d.head || d.body).appendChild(s);
														})();
														</script>
														<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
													-->
										</div>
									</div>



								
								</div>
							</div>
							<div class="col-md-4 blog_left">
									<div class="search left_bar">
											<h3>Search </h3>
											<form action="#" method="post">
												<input class="email" v-model='query' v-validate='"required"' type="email" name="Search" placeholder="Eg: serviceworker" >
												<input type="submit" @click.prevent='search()' value="Search" class='text-white'>
												
											</form> 
										<br>
											<h3>Subscribe </h3>
											<form action="#" method="post" data-vv-scope='subscribe'>
												<input class="email" v-model='Email' v-validate='"required|email"' type="email" name="Email" placeholder="Email here" >
																					<input type="submit" @click.prevent='sub()' value="Send" class='text-white'>
																					<transition name="fadeLeft">
															<span class='custom-alert' v-show="errors.has('subscribe.Email')">{{ errors.first('subscribe.Email') }}</span>
																						   </transition> 
																				</form>
										</div>
								<div class="author left_bar">
									<h3>About <span>Admin</span></h3>
									<div class="author_grid">
											<p>Henry Onyemaobi is a goal driven, self taught, fullstack web developer and tech support engineer. 
													Fueled by enthusiasm for computing.</p>
										<div class="author_grid_pos">
											<img src="/images/pic.jpg" alt=" " class="img-responsive">
										</div>
									</div>
								</div>

								<div class="categories left_bar">
									<h3>Categories</h3>
									<ul>
											<li><router-link to="/category/all"><span class="fa fa-angle-right" aria-hidden="true"></span>All categories</router-link></li>
											<li><router-link to="/category/fixes"><span class="fa fa-angle-right" aria-hidden="true"></span>Bug fixes</router-link></li>
											<li><router-link to="/category/how-to"><span class="fa fa-angle-right" aria-hidden="true"></span>How to</router-link></li>
											<li><router-link to="/category/installations"><span class="fa fa-angle-right" aria-hidden="true"></span>Installations</router-link></li>
											<li><router-link to="/category/others"><span class="fa fa-angle-right" aria-hidden="true"></span>Others</router-link></li>
	
										</ul>
								</div>
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
    
		
    
	<script>

		var moment =require('moment');

			export default {
			  data () {
				return {
					moment:moment,
				  //page: 1,
				  Email:'',
				 // load:'',
				  singlecontent: [],
				  data_load: true,
       			 data: false,
				wait: false,
				}
			  },
			  
			  methods: {
		  
				search(){
			NProgress.start()
			if(this.query == '' || this.query == undefined){
				this.$toasted.show("Please enter a word.");
			}else{
				this.$router.push({name:'search', params:{'query':this.query}});
			}
			NProgress.done()
		},

		  
		  sub(){
          //validate
      this.$validator.validateAll('subscribe').then(() => {
           
      if (!this.errors.any()) {
			 //if no error
			 NProgress.start()
            // instantiant formdata object
       const formdata  = new FormData();
    //append form data to formdata
	formdata.append('Email', this.Email);
	
    //send to database with axios
		axios.post('/subscribe',formdata
	).then(res=>{
  if(res.data == 1){
	this.$toasted.show("Thank you! For Subscribing.");
	
  }else if(res.data == 'exist'){
	this.$toasted.show("Email exists in our records, Thank you!");

	//clear form and errorbag
	this.Email ='';
	setTimeout(func=>{
		this.errors.clear()
	},100) 
	//clear form and errorbag
  }else{
    this.$toasted.show("An Error Occured, Please contact Admin");
  }
  NProgress.done()
  })
  .catch(error =>{
                  if(error.response.status == 422){
                    this.valerror = error.response.data.errors;
                    if(this.valerror){
                      this.$toasted.show("Please verify your email is correct...");
                    }
                  }
            NProgress.done();        
              })
    
     }else{
       //error occured
	
     }
    
    }); //validator
		},
		  
		  
				  //fetch blogs
		  		 fetch(){
					var  page = '/single-blog/'+this.$route.params.title+'/'+this.$route.params.id;
		  
					fetch(page)
					.then(res => res.json())
					.then(res=>{
					  this.singlecontent = res.data;
					  this.wait = false;
					  
					})
					.catch(error =>{
						console.log(error);
						this.wait = true;
						this.data_load = false;
						setTimeout(func=>{
							this.fetch();
						},2000)
					})
				  },
		  
				  
				  like(id){
			this.$toasted.clear();
			this.loading = true;
			var check = localStorage.getItem('userId');
			if(check){
				NProgress.start()
				//Id exists, send both User and Post Id to DB
				var userId = check;
				var postId = id;

				var input = {'userId':userId, 'postId':postId};

				axios.post('/like',input)
				.then(res=>{
					if(res.data == 1){
				this.$toasted.show('Post Liked!');
				this.fetch();
					}else if(res.data == 0){
				this.$toasted.show('You Liked This Post Already...');
					}
					NProgress.done();
					this.loading = false;
				})
				
			}else{
				NProgress.start();
				//create id for user  
			var userId = Math.floor(Math.random()*1000);
			//store locally
			localStorage.setItem('userId',userId);
			var postId = id;

			//go to server
			var input = {'userId':userId, 'postId':postId};
			axios.post('/like',input)
				.then(res=>{
					if(res.data == 1){
				this.$toasted.show('Post Liked!');
					}
					NProgress.done();
					this.loading = false;
				})
			}
			
			
		},
		  
			  },
		  
	 mounted(){
	 this.$toasted.clear();
	this.fetch();
	 },

				  	//watch data load
watch : {
      singlecontent(a,b){
       if(a){
        //data content loaded, it is safe to display
        this.data_load = false;
        this.data = true;
       }
	},
},
			}
		  </script>