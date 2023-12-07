<template>
    <h2 class="text-3xl pb-6">Indløste rewards</h2>
    <!-- <Table :purchases="purchases"></Table> -->
    <Table :purchases="purchases"></Table>
   
</template>

<script>

import AdminLayout from '../../../Layouts/AdminLayout.vue';
import Table from '../../../Components/Table/Table.vue';
import LinkButton from '../../../Components/Buttons/LinkButton.vue';

export default {
    layout: AdminLayout,
    props: {
        purchases: Array,
    },
    components: {
        Table,
        LinkButton
}
    
}
</script>