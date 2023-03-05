<script setup lang="ts">
import { RouterLink, RouterView } from "vue-router";
import Toolbar from "./components/toolbar.vue";




</script>

<template>
  <v-app>

    <v-main>
      <v-row>
        <v-col cols="12">
          <toolbar></toolbar>
          <router-view></router-view>
        </v-col>

      </v-row>




    </v-main>
  </v-app>
</template>


<style scoped></style>
