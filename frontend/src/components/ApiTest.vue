<script>
export default {
  data: () => ({
    apiResponse: null
  }),

  created() {
    this.fetchData()
  },

  methods: {
    async fetchData() {
      const url = 'http://localhost/users/all-users'
      this.apiResponse = await (await fetch(url)).json()
      console.log("apiResponse", this.apiResponse);
    }
  }
}
</script>

<template>
  <!-- <div v-if="!apiResponse">
              Pinging the api...
            </div>

            <div v-if="apiResponse">
              The api responded with: <br />
              <code>
              {{ apiResponse }}
              </code>
            </div> -->


  <v-row v-if=apiResponse>
    <v-col cols="3" v-for="user in apiResponse.users" :key="user.id" class="mt-5">

      <v-hover v-slot="{ isHovering, props }">
        <v-card v-bind="props">
          <v-card-title primary-title>
            <h3> {{ user.name }}</h3>
          </v-card-title>
          <v-card-text>
            <p> <strong> Email: </strong> {{ user.email }}</p>
            <p> <strong> Latitude: </strong> {{ user.latitude }}</p>
            <p> <strong> Longitude: </strong> {{ user.longitude }}</p>



          </v-card-text>
          <v-expand-transition>
            <div v-if="isHovering" class="d-flex transition-fast-in-fast-out bg-orange-darken-2 v-card--reveal"
              style="height: 100%;">
              <p> <strong>{{ user.weathers[0].main.toUpperCase()  }}&nbsp; - &nbsp;</strong>{{ user.weathers[0].description.toUpperCase()  }}</p>
              
            </div>
          </v-expand-transition>
        </v-card>
      </v-hover>

    </v-col>
  </v-row>
  <v-row v-else class="mt-5" align="center" justify="center">
    <v-col cols="10">
      <v-alert type="info" :value="true">
        Please wait while we gather updated weather report for you.
      </v-alert>
    </v-col>
  </v-row>
</template>
<style>
.v-card--reveal {
  align-items: center;
  bottom: 0;
  justify-content: center;
  opacity: .9;
  position: absolute;
  width: 100%;
}
</style>