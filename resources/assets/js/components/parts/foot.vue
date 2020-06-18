

<template>
        <v-footer
          dark
          height="auto"
        >
          <v-card
            flat
            tile
            class=" dark white--text text-xs-center"
            color='#123c69'
          >
           <br>
           <br>
            <v-card-text class="white--text pt-0">
              It is essential to stay relevant in this world, the Internet is another world we live in today, 
              go LIVE! with an outstanding web platform today!  <router-link to='/contact' class=' badge'> Contact Me</router-link>
              . I am professionally inclined to create your needed website in view of achieving the desired goals.
            </v-card-text>
        <share></share>
            <v-divider></v-divider>
      
            <v-card-text class="white--text">
              &copy;2020 — <strong>MobyTech</strong>
            </v-card-text>
          </v-card>
        </v-footer>
        
      </template>

   

      <script>
            export default {
              data: () => ({
                drawer: null,
                //footer
                icons: [
                  'fa fa-facebook',
                  'fa fa-whatsapp',
                  'fa fa-linkedin',
                  'fa fa-mobile'
                ],
                
              }),
              props: {
                source: String
              },
             
            }
          </script>