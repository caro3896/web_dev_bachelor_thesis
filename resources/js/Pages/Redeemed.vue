<script>
import AdminLayout from '../Layouts/AdminLayout.vue';
import Table from '../Components/Table/Table.vue';
import LinkButton from '../Components/Buttons/LinkButton.vue';
import { Head } from '@inertiajs/vue3';

export default {
    layout: AdminLayout,
    props: {
        redeemed: Array,
    },
    components: {
        Table,
        LinkButton,
        Head
}
    
}
</script>

<template>
    <Head title="Indløste rewards" />
    <h2 class="text-3xl pb-6">Indløste rewards</h2>
    <Table :redeemed="redeemed"></Table>
   
</template>