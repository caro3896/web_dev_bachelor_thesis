<template>
    <div class="flex justify-between items-center pb-6">
        <h2 class="text-3xl">Rewards</h2>
        <!-- Create new reward -->
        <LinkButton :href="route('admin.rewards.create')">+ Opret ny</LinkButton>
    </div>
    <Table :rewards="rewards"></Table>
   
</template>

<script>

import MainLayout from '../../../Layouts/MainLayout.vue';
import Table from '../../../Components/Table/Table.vue';
import LinkButton from '../../../Components/Buttons/LinkButton.vue';

export default {
    layout: MainLayout,
    props: {
        rewards: Array,
    },
    components: {
        Table,
        LinkButton
}
    
}
</script>