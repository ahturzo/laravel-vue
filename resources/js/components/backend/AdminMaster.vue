<template>
    <div id="adminmain">
        <router-view :endpoint="endpoint"></router-view>
    </div>
</template>

<script>
    export default {
        name: "AdminMaster.vue",
        data: function(){
            return {
                endpoint: 'https://technometrics.sgp1.digitaloceanspaces.com/',
            }
        },
    }
</script>
