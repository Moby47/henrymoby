
			<!-- ************************************************************ -->
			<template>

					<div class="body-back">
							<div class="masthead pdng-stn1">
								
								<div class="phone-box wrap push" id="home">
									
									<!-- /banner -->
									<div class="banner_inn_sec elevation-16">
									</div>
									<!-- //banner -->
									<!--/services-->
									<div class="services-section">
										<div class="wrap_view_agileits">
											<h3 class="head">My Services</h3>
											<div class="inner_section_wthree">

												<div class="col-md-4 services-section-grid bounceIn">
													<div class="services-section-grid-head">
														<div class="service-icon">
															<span class="fa fa-graduation-cap " aria-hidden="true"></span>
														</div>
														<div class="service-icon-heading">
															<h4>&nbsp;Web Tutorials</h4>
														</div>
														<div class="clearfix"></div>
													</div>
													<p>Learn and stay relevent in today's web world.. </p>
												</div>

												<div class="col-md-4 services-section-grid  bounceIn">
													<div class="services-section-grid-head">
														<div class="service-icon">
															<span class="fa fa-mobile " aria-hidden="true"></span>
														</div>
														<div class="service-icon-heading">
															<h4>&nbsp;PWA</h4>
														</div>
														<div class="clearfix"></div>
													</div>
													<p>Get a Progressive web Application that can run as an App on your mobile device.. </p>
												</div>

												<div class="col-md-4 services-section-grid  bounceIn">
													<div class="services-section-grid-head">
														<div class="service-icon">
															<span class="fa fa-wordpress " aria-hidden="true"></span>
														</div>
														<div class="service-icon-heading">
															<h4>&nbsp;Wordpress</h4>
														</div>
														<div class="clearfix"></div>
													</div>
													<p>Quick, polished websites can be developed for you in just 24 hours.. </p>
												</div>

												<div class="col-md-4 services-section-grid  bounceIn">
													<div class="services-section-grid-head">
														<div class="service-icon">
															<span class="fa fa-desktop " aria-hidden="true"></span>
														</div>
														<div class="service-icon-heading">
															<h4>&nbsp;Web Development</h4>
														</div>
														<div class="clearfix"></div>
													</div>
													<p>Think it, I build it! Own a fully customized web application 
														built from ground up.. </p>
												</div>

												<div class="col-md-4 services-section-grid  bounceIn">
													<div class="services-section-grid-head">
														<div class="service-icon">
															<span class="fa fa-cogs " aria-hidden="true"></span>
														</div>
														<div class="service-icon-heading">
															<h4>&nbsp;Maintenance</h4>
														</div>
														<div class="clearfix"></div>
													</div>
													<p>Maintenance packages are offered after website deployment, we won't leave
														you hanging alone out there.. </p>
												</div>

												<div class="col-md-4 services-section-grid  bounceIn">
													<div class="services-section-grid-head">
														<div class="service-icon">
															<span class="fa fa-laptop " aria-hidden="true"></span>
														</div>
														<div class="service-icon-heading">
															<h4>&nbsp;SPA</h4>
														</div>
														<div class="clearfix"></div>
													</div>
													<p>Keep your online visitors amazed with a well developed Single Page Application.. </p>
												</div>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
									
									<!--/tesimonials-->
									<div class="tesimonials wow slideUp">
										<div class="wrap_view_agileits">
											<h3 class="head">My Clients</h3>
											<p class="head_para">In Clients Words</p>
											<div class="inner_section_wthree">
          <!--loading temp-->
		  <transition name='anime' enter-active-class='animated fadeIn' :duration='200' leave-active-class='animated fadeOut'>
				<div v-show='wait'>
				  <template>
					Please stand by...
					 <v-progress-circular indeterminate></v-progress-circular>
							</template>
							 </div>
					</transition>
		  <!--loading temp-->
													<div v-if='empty' class='text-center alert alert-info'>
												Reviews temporarily unavailable...
															</div>

												<template>
													<v-card
													  class="mx-auto elevation-12"
													  color="#2196f3"
													  dark
													  max-width="950"
													  v-for='con in content' v-bind:key='con.id'
													>
													  <v-card-title>
														<v-icon
														  large
														  left
														>
														thumb_up
													</v-icon>
													<span class="title font-weight-light">Review</span>
												  </v-card-title>
											  
												  <v-card-text class=" font-weight-light wrap">
													"{{con.message}}."
												  </v-card-text>
												  
													  <v-card-actions>
														<v-list-tile class="grow">
														  <v-list-tile-avatar color="grey darken-3">
															<v-icon class="elevation-6">account_circle</v-icon>
														  </v-list-tile-avatar>
												  
														  <v-list-tile-content>
															<v-list-tile-title>{{con.name}}</v-list-tile-title>
														  </v-list-tile-content>
												  
														  <v-layout
															align-center
															justify-end
														  >
															<v-icon class="mr-1"></v-icon>
															<span class="subheading">{{moment(con.created_at).fromNow()}}</span>
														  </v-layout>
														</v-list-tile>
													  </v-card-actions>
													</v-card>
												  </template>

												
											
											</div>
										</div>
										<div class="clearfix"> </div>
									</div>
									<!--//tesimonials-->


									
					
								</div>
							</div>
						</div>
					
					</template>
			<!-- ************************************************************ -->


			<script>

				var moment =require('moment');

export default {
	data(){
		return{
			content: [],
			moment:moment,
			wait: false,
			empty:false,
		}
	},

	methods:{

		review(){
			
			fetch('/review-content')
			.then(res => res.json())
			.then(res=>{
				this.content = res.data;
				//show no data found message
					//console.log(res.data[0]);
                    if(res.data[0] == undefined){
                        this.empty = true;
                    }else{
                        this.empty = false;
                    }
				//show no data found message
				this.wait = false;
		})
		.catch(error =>{
			this.wait = true;
			setTimeout(func=>{
			this.review();
		},2000)
              })
		},



	},//meth end

	mounted(){
		this.review();
		this.$toasted.clear();
	}
}
			</script>