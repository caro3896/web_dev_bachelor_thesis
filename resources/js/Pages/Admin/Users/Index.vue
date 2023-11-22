<template>
    <div class="flex justify-between items-center pb-6">
        <h2 class="text-3xl">Users</h2>
        <!-- Create new reward -->
        <!-- <LinkButton :href="route('admin.users.create')">+ Opret ny</LinkButton> -->
    </div>
    <Table :users="users"></Table>
   
</template>

<script>

import MainLayout from '../../../Layouts/MainLayout.vue';
import Table from '../../../Components/Table/Table.vue';
import LinkButton from '../../../Components/Buttons/LinkButton.vue';

export default {
    layout: MainLayout,
    props: {
        users: Array,
    },
    components: {
        Table,
        LinkButton
}
    
}
</script>