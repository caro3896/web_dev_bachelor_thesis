<template>
    <h2 class="text-3xl pb-6">Indløste rewards</h2>
    <Table :redeemed="redeemed"></Table>
   
</template>

<script>

import AdminLayout from '../Layouts/AdminLayout.vue';
import Table from '../Components/Table/Table.vue';
import LinkButton from '../Components/Buttons/LinkButton.vue';

export default {
    layout: AdminLayout,
    props: {
        redeemed: Array,
    },
    components: {
        Table,
        LinkButton
}
    
}
</script>