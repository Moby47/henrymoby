<template>

    <div class="body-back">
		<div class="masthead pdng-stn1">
			
			<div class="phone-box wrap push" id="home">
				
				<!-- /banner -->
				<div class="banner_inn_sec elevation-16">
				</div>
				<!-- //banner -->
				<!--/blog-->
				<div class="services-section">
					<div class="wrap_view_agileits">
                        <h3 class="head">My Projects</h3>
                        
						<div class="inner_section_wthree">
              
              <!-- content-->
             
              <!-- content-->





                                <template>
                                        <v-tabs
                                          centered
                                          color="#123c69"
                                          dark
                                          icons-and-text
                                        >
                                          <v-tabs-slider color="#ac3b61" ></v-tabs-slider>
                                      
                                          <v-tab href="#tab-1" >
                                            All
                                            <v-icon>select_all</v-icon>
                                          </v-tab>
                                      
                                          <v-tab href="#tab-2">
                                            Online
                                            <v-icon>signal_cellular_4_bar</v-icon>
                                          </v-tab>
                                      
                                          <v-tab href="#tab-3">
                                            Offline
                                            <v-icon>signal_cellular_off</v-icon>
                                          </v-tab>

                                          <!-- ****************** Tab **************** -->
                                          <v-tab-item value='tab-1'>
                                                <v-card flat >
                                                  <v-card-text>
                                                 
                                                    
       <!-- ****************** tab con**************** -->
       <div class="gal_tab_img">
         <!--loading temp-->
         <transition name='anime' enter-active-class='animated fadeIn' :duration='200' leave-active-class='animated fadeOut'>
            <div v-if='Alldata_load'>
              <template>
                  Loading Projects...
                  <v-progress-circular indeterminate></v-progress-circular>
                  
                </template>
              </div>
        </transition>
              <!--loading temp-->
        <div class='text-center'>
              <p v-if='Allreload' >
                  <template>
                      Please stand by...
                       <v-progress-circular indeterminate></v-progress-circular>
                              </template>
                 </p>
                </div>

                <div v-if='empty1' class='text-center alert alert-info'>
                    No live project(s) added yet...
                    </div>

                    <template>
                        <v-container
                          fluid
                          grid-list-lg
                          style="min-height: 434px"
                        >
                          <v-fade-transition mode="out-in">
                            <v-layout wrap>
                              <v-flex xs12 lg4 v-for='con in Allcontent' v-bind:key='con.id' v-if='data'>
                                <v-card>
                                  <v-img
                                  :src="'/storage/project/'+con.image"
                                   :alt="con.title"
                                    height="155"
                                    class="grey darken-4"
                                  ></v-img>
                                  <v-card-title class="title text-capitalize">
                                      <a :href="con.link" target='_blank'>
                                <v-icon>web</v-icon>&nbsp;   {{con.title}}
                                      </a>
                                    </v-card-title>
                                </v-card>
                              </v-flex>
                            </v-layout>
                          </v-fade-transition>
                        </v-container>
                      </template>
          
          <div class='text-center'>
            <div class="pagination col-md-12">
                <button class='btn custombtn' @click.prevent="Allfetch(Allpagination.prev_page_url)" :disabled="!Allpagination.prev_page_url">
                Prev
              </button>
                                
                <span>Page {{Allpagination.current_page}} of {{Allpagination.last_page}}</span>
                                
                <button class='btn custombtn' @click="Allfetch(Allpagination.next_page_url)" :disabled="!Allpagination.next_page_url">
                 Next
                </button>
                </div> 
              </div>

          </div>
         <!-- ****************** tab con**************** -->

                                                    </v-card-text>
                                                </v-card>
                                              </v-tab-item>
                                 
                                               <!-- ****************** Tab **************** -->
                                          <v-tab-item value='tab-2'>
                                            <v-card flat >
                                              <v-card-text>

                                  <!-- ****************** tab con**************** -->


                                                    <div class="gal_tab_img">
                                  <!--loading temp-->
         <transition name='anime' enter-active-class='animated fadeIn' :duration='200' leave-active-class='animated fadeOut'>
            <div v-if='Ondata_load'>
              <template>
                  Loading Projects...
                  <v-progress-circular indeterminate></v-progress-circular>
                 
                </template>
              </div>
        </transition>
              <!--loading temp-->
              <div class='text-center'>
                  <p v-if='Onreload' >
                      
                          <template>
                              Please stand by...
                               <v-progress-circular indeterminate></v-progress-circular>
                                      </template>
                       
                     </p>
                    </div>

                    <div v-if='empty2' class='text-center alert alert-info'>
                        No online project(s) added yet...
                        </div>

                        <template>
                            <v-container
                              fluid
                              grid-list-lg
                              style="min-height: 434px"
                            >
                              <v-fade-transition mode="out-in">
                                <v-layout wrap>
                                  <v-flex xs12 lg4 v-for='con in Oncontent' v-bind:key='con.id' v-if='data'>
                                    <v-card>
                                      <v-img
                                      :src="'/storage/project/'+con.image"
                                       :alt="con.title"
                                        height="155"
                                        class="grey darken-4"
                                      ></v-img>
                                      <v-card-title class="title text-capitalize">
                                          <a :href="con.link" target='_blank'>
                                      <i class='fa fa-globe'></i>&nbsp; {{con.title}} 
                                          </a>
                                        </v-card-title>
                                    </v-card>
                                  </v-flex>
                                </v-layout>
                              </v-fade-transition>
                            </v-container>
                          </template>
                                
                        
                                  <div class='text-center'>
                                    <div class="pagination col-md-12">
                                        <button class='btn custombtn' @click.prevent="Onfetch(Onpagination.prev_page_url)" :disabled="!Onpagination.prev_page_url">
                                        Prev
                                      </button >
                                                        
                                        <span>Page {{Onpagination.current_page}} of {{Onpagination.last_page}}</span>
                                                        
                                        <button class='btn custombtn' @click="Onfetch(Onpagination.next_page_url)" :disabled="!Onpagination.next_page_url">
                                         Next
                                        </button >
                                        </div> 
                                      </div>
                        
                                  </div>
                              <!-- ****************** tab con**************** -->

                                              </v-card-text>
                                            </v-card>
                                          </v-tab-item>

                                           <!-- ****************** Tab **************** -->
                                          <v-tab-item value='tab-3'>
                                            <v-card flat >
                                              <v-card-text>







  <!-- ****************** tab con**************** -->
  <div class="gal_tab_img">
    <!--loading temp-->
    <transition name='anime' enter-active-class='animated fadeIn' :duration='200' leave-active-class='animated fadeOut'>
        <div v-if='Offdata_load'>
          <template>
              Loading Projects...
              <v-progress-circular indeterminate></v-progress-circular>
             
            </template>
          </div>
    </transition>
          <!--loading temp-->
          <div class='text-center'>
              <p v-if='Offreload'>
                  <template>
                      Please stand by...
                       <v-progress-circular indeterminate></v-progress-circular>
                              </template>
                 </p>
                </div>

                <div v-if='empty3' class='text-center alert alert-info'>
                    No offline project(s) added yet...
                    </div>

                    <template>
                        <v-container
                          fluid
                          grid-list-lg
                          style="min-height: 434px"
                        >
                          <v-fade-transition mode="out-in">
                            <v-layout wrap>
                              <v-flex xs12 lg4 v-for='con in Offcontent' v-bind:key='con.id' v-if='data'>
                                <v-card>
                                  <v-img
                                  :src="'/storage/project/'+con.image"
                                   :alt="con.title"
                                    height="155"
                                    class="grey darken-4"
                                  ></v-img>
                                  <v-card-title class="title text-capitalize">
                                      <a :href="con.link" target='_blank'>
                                          <i class='fa fa-github'></i>&nbsp;  {{con.title}}
                                      </a>
                                    </v-card-title>
                                </v-card>
                              </v-flex>
                            </v-layout>
                          </v-fade-transition>
                        </v-container>
                      </template>

          <div class='text-center'>
            <div class="pagination col-md-12">
                <button class='btn custombtn' @click.prevent="Offfetch(Offpagination.prev_page_url)" :disabled="!Offpagination.prev_page_url">
                    Next
                  </button>
                                
                <span>Page {{Offpagination.current_page}} of {{Offpagination.last_page}}</span>
                                
                <button class='btn custombtn' @click="Offfetch(Offpagination.next_page_url)" :disabled="!Offpagination.next_page_url">
                    Next
                  </button>
                </div> 
              </div>

          </div>
     <!-- ****************** tab con**************** -->

                                              </v-card-text>
                                            </v-card>
                                          </v-tab-item>

                                        </v-tabs>
                                      </template>

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

<style scoped>
    .custombtn{
      background-color: #123c69 !important;
      color:white;
    }
  </style>


<script>

  export default {
    data(){
      return{
        Allcontent: [],
        Offcontent: [],
        Oncontent: [],
        Allpagination: [],
        Offpagination: [],
        Onpagination: [],
        data_load: true,
        data: false,
        Alldata_load:true,
        Allreload:false,
        Ondata_load:true,
        Onreload:false,
        Offdata_load:true,
        Offreload:false,
        empty1:false,
        empty2:false,
        empty3:false,
      }
    },//data end

methods: {

//fetch all projects
Allfetch(page_url){
  if(page_url){
    NProgress.start();
  }

          var   page_url = page_url || '/all-project-content';

          fetch(page_url)
          .then(res => res.json())
          .then(res=>{
            this.Allcontent = res.data;
            //show no data found message
            if(res.data[0] == undefined){
                        this.empty1 = true;
                    }else{
                        this.empty1 = false;
                    }
			      	//show no data found message
            this.AllmakePagination(res.meta, res.links);
             //for catch
          this.Allreload = false;
            NProgress.done();
          })
          .catch(error =>{
            this.Alldata_load = false;
           this.Allreload = true;
           setTimeout(func=>{
							this.Allfetch();
						},2000)
            NProgress.done();        
              })

        
        },

         AllmakePagination(meta, links){
    var pagination = {
                    current_page: meta.current_page,
                    last_page: meta.last_page,
                    next_page_url: links.next,
                    prev_page_url: links.prev
                     }
                     document.body.scrollTop = 0;
				document.documentElement.scrollTop = 0;
    this.Allpagination = pagination;
    },

    //fetch online projects
Onfetch(page_url){
  if(page_url){
    NProgress.start();
  }

          var   page_url = page_url || '/on-project-content';

          fetch(page_url)
          .then(res => res.json())
          .then(res=>{
            this.Oncontent = res.data;
             //show no data found message
             if(res.data[0] == undefined){
                        this.empty2 = true;
                    }else{
                        this.empty2 = false;
                    }
			      	//show no data found message
            this.OnmakePagination(res.meta, res.links);
              //for catch
        this.Onreload = false;
            NProgress.done();
          })
          .catch(error =>{
          this.Ondata_load = false;
           this.Onreload = true;
           setTimeout(func=>{
							this.Onfetch();
						},2000)
            NProgress.done();        
              })

         
        },

         OnmakePagination(meta, links){
    var pagination = {
                    current_page: meta.current_page,
                    last_page: meta.last_page,
                    next_page_url: links.next,
                    prev_page_url: links.prev
                     }
                     document.body.scrollTop = 0;
				document.documentElement.scrollTop = 0;
    this.Onpagination = pagination;
    },

    //fetch Offline projects
Offfetch(page_url){
  if(page_url){
    NProgress.start();
  }
  
          var   page_url = page_url || '/off-project-content';

          fetch(page_url)
          .then(res => res.json())
          .then(res=>{
            this.Offcontent = res.data;
             //show no data found message
             if(res.data[0] == undefined){
                        this.empty3 = true;
                    }else{
                        this.empty3 = false;
                    }
			      	//show no data found message
            this.OffmakePagination(res.meta, res.links);
            //for catch
         this.Offreload = false;
            NProgress.done();
          })
          .catch(error =>{
            this.Offdata_load = false;
           this.Offreload = true;

           setTimeout(func=>{
							this.Offfetch();
						},2000)

            NProgress.done();        
              })
              
          
        },

         OffmakePagination(meta, links){
    var pagination = {
                    current_page: meta.current_page,
                    last_page: meta.last_page,
                    next_page_url: links.next,
                    prev_page_url: links.prev
                     }
                     document.body.scrollTop = 0;
				document.documentElement.scrollTop = 0;
    this.Offpagination = pagination;
    },

}, //meth end

mounted(){
  this.$toasted.clear();
  this.Allfetch();
  this.Onfetch();
  this.Offfetch();
},

//watch data load
watch : {
      Allcontent(a,b){
       if(a){
        //data content loaded, it is safe to display
        this.Alldata_load = false;
        this.data = true;
       }
    },
    Oncontent(a,b){
       if(a){
        //data content loaded, it is safe to display
        this.Ondata_load = false;
        this.data_on = true;
       }
    },
    Offcontent(a,b){
       if(a){
        //data content loaded, it is safe to display
        this.Offdata_load = false;
        this.data_off = true;
       }
    },
  },


}
</script>