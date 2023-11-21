<template>
   hello
</template>

<script>
import MainLayout from '../Layouts/MainLayout.vue';
import Sidebar from '../Components/Nav/Sidebar.vue';

export default {
    layout: MainLayout,
    props: {
        rewards: Array,
        users: Array
    },
    components: {
    Sidebar,
}
    
}
</script>