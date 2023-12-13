<script>
import AdminLayout from '../Layouts/AdminLayout.vue';
import FormField from '../Components/Form/FormField.vue';
import Button from '../Components/Buttons/Button.vue';
import InputError from '../Components/Form/InputError.vue';
import Table from '../Components/Table/Table.vue';

export default {
    layout: AdminLayout,
    props: {
        user: Object,
        votes: Array
    },
    components: {
        Table
    }
}
</script>

<template>
    <h2 class="text-3xl">Hej, {{ user.name }}</h2>
    <div class="mt-8">
        <h3 class="text-xl">Dine stemmer:</h3>
        <Table v-if="votes && votes.length > 0" :votes="votes"></Table>
        <p v-else class="mt-3">Du har ikke stemt på nogle rewards</p>
    </div>
</template>