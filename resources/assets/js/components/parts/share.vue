<template>
        <div class="">
          <facebook :url="url" scale="2"></facebook>
         <twitter :url="url" title="Word-on-dstreet" scale="2"></twitter>
          <linkedin :url="url" scale="2"></linkedin>
          <telegram :url="url" scale="2"></telegram>
          <whats-app :url="url" title="Word-on-dstreet" scale="2"></whats-app>
          <email :url="url" subject="Word-on-dstreet" scale="2"></email>
        </div>
      </template>


      <script>
         //share icons
  import {
  Facebook,
  Twitter,
  Linkedin,
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
         this.url = String(window.location);
          },
        }
      
      </script>