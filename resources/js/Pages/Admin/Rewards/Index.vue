<template>
    <div class="flex justify-between items-center pb-6">
        <h2 class="text-3xl">Rewards</h2>
        <!-- Create new reward -->
        <LinkButton :href="route('admin.rewards.create')">
            <img class="mr-2" src="/icons/add_reward.svg" alt="">
            Opret ny
        </LinkButton>
    </div>
    <Table :rewards="rewards"></Table>
    <div class="mt-8">
        <Button @click="resetVotes()">Nulstil alle stemmer</Button>
    </div>
   
</template>

<script>

import AdminLayout from '../../../Layouts/AdminLayout.vue';
import Table from '../../../Components/Table/Table.vue';
import LinkButton from '../../../Components/Buttons/LinkButton.vue';
import Button from '../../../Components/Buttons/Button.vue';
import { router } from '@inertiajs/vue3';

export default {
    layout: AdminLayout,
    props: {
        rewards: Array,
    },
    components: {
        Table,
        LinkButton,
        Button
    },
    methods: {
        resetVotes(){
            if (confirm("Er du sikker på du vil nulstille alle stemmer?")){
                router.put(route('admin.reset', {}), {
                onSuccess: (response) => {
                    this.message = "Stemmer nulstillet";
                },
                onError: (error) => {
                    alert(error.error);
                }
            });
            }
        }
    }
    
}
</script>