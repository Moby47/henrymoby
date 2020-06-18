<template>
        <div class="">
          <facebook :url="url" scale="2"></facebook>
         <twitter :url="url" title="Word-on-dstreet" scale="2"></twitter>
          <linkedin :url="url" scale="2"></linkedin>
          <telegram :url="url" scale="2"></telegram>
          <whats-app :url="url" title="Word-on-dstreet" scale="2"></whats-app>
          <pinterest :url="url" scale="2"></pinterest>
          <reddit :url="url" scale="2" title="Word-on-dstreet"></reddit>
          <email :url="url" subject="Word-on-dstreet" scale="2"></email>
        </div>
      </template>


      <script>
         //share icons
  import {
  Facebook,
  Twitter,
  Linkedin,
  Pinterest,
  Reddit,
  Telegram,
  WhatsApp,
  Email,
} from "vue-socialmedia-share";
//share icons
        export default {
          //share icons
    components: {
    Facebook,
    Twitter,
    Linkedin,
    Pinterest,
    Reddit,
    Telegram,
    WhatsApp,
    Email,
  },
  //share icons
          data: () => ({
           url:'',
          }),

          mounted(){
            //url issues
         this.url = window.location;
          },
        }
      
      </script>