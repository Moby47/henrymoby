<template>

    
	<div class="body-back">
            <div class="masthead pdng-stn1">
                
                <div class="phone-box wrap push" id="home">
                
                    <!--stat-->
                    <template>
                            <div class="text-xs-center">
                              <v-badge left>
                                <template v-slot:badge > 
                                  <span class='badge'>{{projectct}}</span>
                                </template>
                                <v-icon
                                  large
                                  color="grey lighten-1"
                                >
                                  archive
                                </v-icon>
                                <span v-if='stat_load.proj'><i class=''>Loading..</i></span> 
                              <span v-else> Projects </span> 
                              </v-badge>
                          
        
                              
                              <v-badge color="red">
                                <template v-slot:badge>
                                  <span class='badge'>{{blogct}}</span>
                                </template>
                                <v-icon
                                  large
                                  color="grey"
                                >
                                 comment
                                </v-icon> 
                                <span v-if='stat_load.blog'><i class=''>Loading..</i></span> 
                                <span v-else>  Posts </span>
                              </v-badge>
        
        
        
                              <v-badge color="red">
                                    <template v-slot:badge>
                                      <span class='badge'>{{subct}}</span>
                                    </template>
                                    <v-icon
                                      large
                                      color="grey"
                                    >
                                      account_circle
                                    </v-icon>
                                    <span v-if='stat_load.sub'><i class=''>Loading..</i></span> 
                                    <span v-else> Subscribers</span>
                                  </v-badge>
        
        
                                  <v-badge color="red" >
                                        <template v-slot:badge>
                                          <span class='badge'>{{conct}}</span>
                                        </template>
                                        <v-icon
                                          large
                                          color="grey"
                                        >
                                        settings_phone
                                        </v-icon>
                                        <span v-if='stat_load.con'><i class=''>Loading..</i></span> 
                                      <span v-else>  Contacts </span>
                                      </v-badge>
                            </div>
                          </template>
                <!--stat-->
               
                    <!--/blog-->
                    <div class="services-section">
                        <div class="wrap_view_agileits">
                            <div class="inner_section_wthree">

 <!--loading temp-->
 <transition name='anime' enter-active-class='animated fadeIn' :duration='200' leave-active-class='animated fadeOut'>
    <div v-if='load'>
        <template>
          <v-progress-linear indeterminate></v-progress-linear>
        </template>
      </div>
</transition>
      <!--loading temp-->
                                <div class="col-md-6 contact_grid_right">
                                    <h6>{{title}}</h6>
                                    <form action="#" method="post">
                                            <div class="col-md-6 col-sm-6 contact_left_grid">
       <input v-model='Title' v-validate='"required|max:17"' type="text" name="Title" placeholder="Title" required="">
                     <transition name="fadeLeft">
                        <span class='custom-alert' v-show="errors.has('Title')">{{ errors.first('Title') }}</span>
                       </transition>
                                            </div>
                                            <div class="col-md-6 col-sm-6 contact_left_grid">
                 <input type="file" @change='ImageSelect' v-validate='"required|image"' name="Image" placeholder="image" required="" class='custom top'>
                 <transition name="fadeLeft">
                    <span class='custom-alert' v-show="errors.has('Image')">{{ errors.first('Image') }}</span>
                   </transition>   
                </div>
                                            <div class="col-md-12 col-sm-12 contact_left_grid">
                                                <br>
                                <select class='custom' v-model='Category' v-validate='"required"' name='Category'>
                                                    <option value="">- Choose Cateogry -</option>
                                                    <option value="Online">Online</option>
                                                    <option value="Offline">Offline</option>
                                                  </select>  
                                                  <transition name="fadeLeft">
                                                      <span class='custom-alert' v-show="errors.has('Category')">{{ errors.first('Category') }}</span>
                                                     </transition>
                                            </div>
                                            <div class="clearfix"> </div>
           <textarea name="Link" v-model='Link' v-validate='"required|max:254|url"'  required="" placeholder="Enter Project Link with https://..."></textarea>
           <transition name="fadeLeft">
              <span class='custom-alert' v-show="errors.has('Link')">{{ errors.first('Link') }}</span>
             </transition>        
             <br>                        
             <input type="submit" @click.prevent='post()' v-if='submitBtn' value="Submit"> 
             <input type="submit" @click.prevent='update()' v-if='updateBtn' value="Update">  
             <input type="submit" @click.prevent='reverse()' v-if='reverseBtn' value="Reverse">  
                                          </form>
                                </div>




                                <div class="col-md-6 contact-left">
                                    <h6>Manage projects here</h6>
                                    
                                    <!--loading temp-->
                          <transition name='anime' enter-active-class='animated fadeIn' :duration='200' leave-active-class='animated fadeOut'>
                            <div v-if='data_load'>
                              <template>
                                  <v-progress-linear indeterminate></v-progress-linear>
                                  Loading Data...
                                </template>
                              </div>
                        </transition>
                              <!--loading temp-->

                              <transition name='anime' enter-active-class='animated fadeIn'  leave-active-class='animated fadeOut'>
                                    <div class='table-responsive' v-if='data'>
                                        <table class="table table-striped table-advance table-hover">
                                            <tbody>
                                               <tr>
                                                  <th><v-icon>camera_alt</v-icon>Image</th>
                                                  <th><v-icon>subject</v-icon> Title</th>
                                                  <th><v-icon>subtitles</v-icon> Category</th>
                                                  <th><v-icon>gavel</v-icon> Action</th>
                                               </tr>
                                               
                                               <tr v-for='con in content' v-bind:key='con.id'>
   <td><router-link to="/projects">
    <v-img :src="'/storage/project/'+con.image" class="img-thumbnail img-responsive size" :alt="con.title"
    :lazy-src="`/images/black-spinner.gif`"></v-img>
  </router-link></td>
  <td>{{con.title}}</td>
  <td>{{con.category}}</td>
                                                <td>
                                                   <div class="btn-group">
                                <a class="btn btn-primary" href="#" @click.prevent='edit(con)'><i class="fa fa-pencil"></i></a>
                                <a class="btn btn-danger" href="#" @click.prevent='removeProj(con.id)'><i class="fa fa-trash"></i></a>
                                                   </div>
                                                   </td>
                                               </tr>
                                                                          
                                            </tbody>
                                         </table>

              <div class='text-center'>
            <div class="pagination ">
             <button class='btn btn-info' @click.prevent="fetch(pagination.prev_page_url)" :disabled="!pagination.prev_page_url" :loading='loading'>
               Prev
              </button>
                                
                <span>Page {{pagination.current_page}} of {{pagination.last_page}}</span>
                                
                <button class='btn btn-info' @click="fetch(pagination.next_page_url)" :disabled="!pagination.next_page_url" :loading='loading'>
                 Next
                </button>
                </div>  
                </div>

                                         
                                        

                                    </div>
                                    </transition>
                                    
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
        export default {
            data(){
              return{
                //form data
                Title: '',
                Category: '',
                load: false,
                ImageFile: '',
                Link: '',
                valueDeterminate: 0,
                //stat data
                 blogct: 0,
                 projectct: 0,
                 conct:0,
                 subct:0,
                 //table data
                 content: [],
                 title: 'Create projects here',
                 updateBtn: false,
                 submitBtn: true,
                 reverseBtn: false,
                 projId:'',
                 pagination:[],
                 loading: false,
                 data_load: true,
                 data: false,
                 stat_load:{'blog':true,'proj':true,'sub':true,'con':true},
                 valerror:[]
              }
            },

methods: {

    ImageSelect(event){
      this.ImageFile = event.target.files[0];
    },

    //post project
  post(){
    this.$toasted.clear();
      //validate
  this.$validator.validateAll().then(() => {
       
  if (!this.errors.any()) {
    this.load = true;
         //if no error
        // instantiant formdata object
   const formdata  = new FormData();
//append form data to formdata
formdata.append('ImageFile',  this.ImageFile);
formdata.append('Title', this.Title);
formdata.append('Category', this.Category);
formdata.append('Link', this.Link);

//send to database with axios
axios.post('/save-project',formdata).then(res=>{
  if(res.data == 1){
   
      this.$toasted.show("Project added to gallery");
      //clear toasted in 3 secs
			setTimeout(func=>{
			this.$toasted.clear();
      },3000)
      //clear toasted in 3 secs
      this.load = false;
      this.valueDeterminate = 0;
       //clear form and errorbag
      this.Title ='';
      this.Link ='';
      this.Category ='';
      setTimeout(func=>{
        this.errors.clear()
      },1) 
      //clear form and errorbag
    
    //reloads
    this.projectcount();
    this.fetch();
  }else{
    this.$toasted.show("An Error Occured, Please contact Admin");
  }
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
//here because if i leave it in the promise function, it will run till resolved
document.body.scrollTop = 0;
document.documentElement.scrollTop = 0;
 }else{
   //error occured
this.$toasted.show('Validation errors detected...');    
//clear in 3 secs
setTimeout(func=>{
			this.$toasted.clear();
			},3000)
 }

}); //validator
                 
                
 },//post end

   blogcount(){
        axios.get('/blog-count')
        .then(res=>{
          this.blogct =res.data;
        })
        .catch(error =>{
        // this.$toasted.show("Blog count failed...");
         this.stat_load.blog = true;
              })
        },

        projectcount(){
          axios.get('/proj-count')
        .then(res=>{
         this.projectct =res.data;
        })
        .catch(error =>{
        // this.$toasted.show("Project count failed...");
         this.stat_load.proj = true;
              })
        },

        subcount(){
          axios.get('/sub-count')
        .then(res=>{
         this.subct =res.data;
        })
        .catch(error =>{
       //  this.$toasted.show("Subscription count failed...");
         this.stat_load.sub = true;
              })
        },

        contactcount(){
          axios.get('/contact-count')
        .then(res=>{
         this.conct =res.data;
        })
        .catch(error =>{
         this.$toasted.show("Stat data failed...Please reload page");
         this.stat_load.con = true;
              })
        },

        //fetch projects
        fetch(page_url){
          //if pagination btn was hit
          if(page_url){
              // Start the route progress bar.
          NProgress.start()
          }
          var   page_url = page_url || '/project-content';

          fetch(page_url)
          .then(res => res.json())
          .then(res=>{
            this.content = res.data;
            this.makePagination(res.meta, res.links);
            //turn off in here else...JS runs it before resolving promise
              // Start the route progress bar.
          NProgress.done()
          })
          .catch(error =>{
         this.$toasted.show("Project data failed...Please reload page");
            NProgress.done();        
              })
        },

         makePagination(meta, links){
    var pagination = {
                    current_page: meta.current_page,
                    last_page: meta.last_page,
                    next_page_url: links.next,
                    prev_page_url: links.prev
                     }
    this.pagination = pagination;
    },

        edit(con){
          //prepare edit form
          document.body.scrollTop = 0;
		  	  document.documentElement.scrollTop = 0;
          this.updateBtn = true;
          this.submitBtn = false;
          this.reverseBtn = true;
          this.title = 'Update project here';
          this.Title = con.title;
          this.Link = con.link;
          this.projId = con.id;
          this.loading = false;
        },

        reverse(){
          this.updateBtn = false;
          this.submitBtn = true;
          this.title = 'Create project here';
          this.Title = 'Enter a title..';
          this.Link = 'Enter a link..';
          this.reverseBtn = false;
        },

        update(){
          this.$toasted.clear();
      //validate
  this.$validator.validateAll().then(() => {
       
  if (!this.errors.any()) {
      this.load = true;
      //if no error
        // instantiant formdata object
   const formdata  = new FormData();
//append form data to formdata
formdata.append('ImageFile',  this.ImageFile);
formdata.append('Title', this.Title);
formdata.append('Category', this.Category);
formdata.append('Link', this.Link);
formdata.append('id', this.projId);

//send to database with axios
axios.post('/update',formdata).then(res=>{
            if(res.data == 1){
              
                this.$toasted.show("Project Updated!");
                //clear in 3 secs
			setTimeout(func=>{
			this.$toasted.clear();
			},3000)
                this.load = false;
                this.valueDeterminate = 0;
       
          //reloads
          this.fetch();
        }else{
          this.$toasted.show("An Error Occured, Please contact Admin");
        }
       })
       .catch(error =>{
                  if(error.response.status == 422){
                    this.valerror = error.response.data.errors;
                    if(this.valerror){
                      this.load = false;
                     this.valueDeterminate = 0;
                      this.$toasted.show("Please verify your information are correct...");
                    }
                  }
            NProgress.done();        
              })
//here because if i leave it in the promise function, it will run till resolved
document.body.scrollTop = 0;
document.documentElement.scrollTop = 0;
 }else{
   //error occured
this.$toasted.show('Validation errors detected...');    
//clear in 3 secs
setTimeout(func=>{
			this.$toasted.clear();
			},3000)
 }

}); //validator
   
  },

removeProj(id){
    this.projId = id;
  //toggle loading
  this.loading = true;
  var input =  {'id':this.projId};
  axios.post('/destroy',input)
  .then(res=>{
    if(res.data == 1){
        this.$toasted.show("Project deleted!");
      
          //reloads
          this.fetch();
          this.projectcount();
        }else{
          this.$toasted.show("An Error Occured, Please contact Admin");
        }
        //toggle loading
        this.loading = false;
  })
  .catch(error =>{
    this.loading = false;
    
         this.$toasted.show("Delete failed...");
            NProgress.done();        
              })
},

clearModal(){
this.$modal.hide('delete');
}

},//meth end

mounted() {
    this.$toasted.clear();
    //call methods on load
    this.blogcount();
     this.projectcount();
     this.subcount();
     this.contactcount();
     this.fetch();
},

 //watch data load
watch : {
      content(a,b){
       if(a){
        //data content loaded, it is safe to display
        this.data_load = false;
        this.data = true;
       }
    },

    //watch stat counts
    blogct(a,b){
      if(a){
        //show blog count
        this.stat_load.blog = false;
      }
    },
    projectct(a,b){
      if(a){
       //show project count
       this.stat_load.proj = false;
      }
    },
    conct(a,b){
      if(a){
       //show con count
       this.stat_load.con = false;
      }
    },
    subct(a,b){
      if(a){
       //show sub count
       this.stat_load.sub = false;
      }
    },

//watch end
},
 

        }
    </script>