<style scoped>
.no-decoration {
    text-decoration: none;
}
</style>
<template>
    <v-app-bar app>
        <h1 class="ml-2">Weather Report</h1>
    </v-app-bar>
</template>
<script>

export default {
    data() {
        return {
            search: "",
            dashboard: true,
            user1: {
                initials: 'JD',
                fullName: 'John Doe',
                email: 'john.doe@doe.com',
            },
        };
    },

};
</script>
