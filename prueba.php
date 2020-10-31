<!DOCTYPE html>
<html>

<head>
  <link href="<?php echo base_url() ?>assets/css/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet" />
  <link href="<?php echo base_url() ?>assets/css/materialdesignicons.min.css" rel="stylesheet" />
  <link href="<?php echo base_url() ?>assets/css/vuetify.min.css" rel="stylesheet" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui" />
</head>

<body>
  <div id="app">
<!--     <?php
      echo '<pre>';
        var_dump($categorias);
      echo '</pre>';
    ?> -->
    <v-app>
      <v-app-bar color="red accent-4" dark max-height="80">
        <v-app-bar-nav-icon></v-app-bar-nav-icon>
        <v-toolbar-title>Mis Servicios Web</v-toolbar-title>
        <v-spacer></v-spacer>

        <!-- <v-chip dark color="green" class="py-0" large>{{total}}</v-chip> -->
        <v-badge :content="total" class="mr-12 mt-2" :value="total" color="green" overlap>
          <v-icon large>mdi-cash</v-icon>
        </v-badge>

      </v-app-bar>


      <v-main>
        <v-container>

        
        <v-card width="350">
        <v-card-title class="headline grey lighten-2">Crear nueva Categoria</v-card-title>

        <v-card-text>
          <v-form ref="form">
            <v-text-field v-model="nombrecat" :counter="20" label="Nombre Categoria" required></v-text-field>
          </v-form>
        </v-card-text>

        <v-divider></v-divider>

        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="success" rounded @click="crear">Crear</v-btn>
          <v-btn color="primary" text @click="dialog = false">Cancelar</v-btn>
        </v-card-actions>
        </v-card>


          <v-row>
            <v-col cols="12">
              <v-list subheader three-line>
                <v-subheader>Categorias</v-subheader>  
                <v-list-item v-for="cat in categorias" :key="cat.id">
                  <v-list-item-content>
                    <v-list-item-title>{{cat.nombrecat}}</v-list-item-title>
                    <v-list-item-subtitle>{{cat.created_at}}</v-list-item-subtitle>
                  </v-list-item-content>
                </v-list-item>

              </v-list>
            </v-col>
          </v-row>
<!--           <v-row>
            <pre>{{categorias}}</pre>
          </v-row> -->

          <v-stepper v-model="e1">
            <v-stepper-header>
              <v-stepper-step :complete="e1 > 1" step="1">Tipo de Sitio</v-stepper-step>
              <v-divider></v-divider>

              <v-stepper-step :complete="e1 > 2" step="2">Name of step 2</v-stepper-step>

              <v-divider></v-divider>

              <v-stepper-step step="3">Name of step 3</v-stepper-step>
            </v-stepper-header>

            <v-stepper-items>
              <v-stepper-content step="1">
                <tipos @calculartotaltipos="setTotalTipos" @next2="go2"></tipos>
                <v-divider inset vertical></v-divider>
              </v-stepper-content>

              <v-stepper-content step="2">
                <v-card class="mb-12" color="grey lighten-1" height="200px"></v-card>

                <v-btn color="primary" @click="e1 = 3">
                  Continue
                </v-btn>

                <v-btn text>Cancel</v-btn>
              </v-stepper-content>

              <v-stepper-content step="3">
                <v-card class="mb-12" color="grey lighten-1" height="200px"></v-card>

                <v-btn color="primary" @click="e1 = 1">
                  Continue
                </v-btn>

                <v-btn text>Cancel</v-btn>
              </v-stepper-content>
            </v-stepper-items>
          </v-stepper>
        </v-container>
      </v-main>
    </v-app>
  </div>

  <script src="<?php echo base_url() ?>assets/js/vue.js"></script>
  <script src="<?php echo base_url() ?>assets/js/vuetify.js"></script>
  <script src="<?php echo base_url() ?>assets/js/axios.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/components/tipos.js"></script>

  <script>
    new Vue({
      el: "#app",
      vuetify: new Vuetify(),
      data() {
        return {
          e1: 1,
          total: 0,
          categorias: [],
          nombrecat: ""
        };
      },

      methods: {
        setTotalTipos(param) {
          this.total = 0;
          this.total = Number(this.total + param);
        },
        go2() {
          this.e1 = 2;
        },
        crear() {
          this.categorias.push({id:1121212,nombrecat:this.nombrecat,freg:"2020-10-30"});
        },
        submit() {
          if(this.$refs.form.validate()) {
            this.loading = true;
            var formdata = new FormData();
            formdata.append("nombrecat", this.cate.idcat);
            axios
             .post("http://localhost/prueba/home/add", formdata)
             .then(response => {formadata.idcat = response.data
             this.categorias.push(fData)
             this.ver = false;
            console.log(response);
          })
            .catch((error) => {
              this.errorMessage = error.message;
              console.error("There was an error", error);
          });
         }
        }
      },
      mounted() {
        axios
        //.get('http://localhost/prueba/home/categorias')
          .get('http://localhost/prueba/home/fetchcategorias') 
          .then(response => (this.categorias = response.data))
      },
    });
  </script>
</body>

</html>