<script>

import AdminLayout from '../../../Layouts/AdminLayout.vue';
import Table from '../../../Components/Table/Table.vue';
import LinkButton from '../../../Components/Buttons/LinkButton.vue';
import { Head } from '@inertiajs/vue3';

export default {
    layout: AdminLayout,
    props: {
        users: Array,
    },
    components: {
        Table,
        LinkButton,
        Head
    }
}
</script>

<template>
    <Head title="Brugere" />
    <div class="flex justify-between items-center pb-6">
        <h2 class="text-3xl">Users</h2>
        <!-- Create new reward -->
        <LinkButton :href="route('admin.users.create')">
            <img class="mr-2" src="/icons/add_user.svg" alt="User icon with a plus">
            Opret ny
        </LinkButton>
    </div>
    <Table :users="users"></Table>
    <div v-if="$page.props.success" class="text-yellow mb-2 mt-4 italic">
        {{ $page.props.success }}
    </div>
   
</template>