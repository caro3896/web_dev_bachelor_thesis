<template>
    <h2 class="text-3xl pb-6">Indløste rewards</h2>
    <!-- <Table :purchases="purchases"></Table> -->
    <Table :purchases="purchases"></Table>
   
</template>

<script>

import MainLayout from '../../../Layouts/MainLayout.vue';
import Table from '../../../Components/Table/Table.vue';
import LinkButton from '../../../Components/Buttons/LinkButton.vue';

export default {
    layout: MainLayout,
    props: {
        purchases: Array,
    },
    components: {
        Table,
        LinkButton
}
    
}
</script>