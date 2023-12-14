<script>
import MainLayout from '../Layouts/MainLayout.vue';
import Reward from '../Components/Rewards/Reward.vue';
import { Head } from '@inertiajs/vue3';

export default {
    layout: MainLayout,
    components: {
        Reward,
        Head
    },
    props: {
        rewards: Object,
        credits: Number
    },
    data() {
        return {
            toggleActive: false,
        };
    },
    computed: {
        // Filter rewards based on quantity and amount of credits if switch is active
        filteredRewards() {
            if (this.toggleActive) {
                return this.rewards.filter(reward => this.credits >= reward.price);
            } else {
                return this.rewards;
            }
        }
    }
}

</script>

<template>
    <Head title="Pandi Web - Rewards 23" />
    <section>
        <div class="flex justify-between items-center w-52 pb-6">
            <div class="w-16 h-8 border rounded-full flex items-center p-1 cursor-pointer duration-300 ease-in-out" :class="{ 'bg-yellow': toggleActive}" @click="toggleActive = !toggleActive">
                <div class="bg-white-gray w-6 h-6 rounded-full transform duration-300 ease-in-out" :class="{ 'translate-x-8': toggleActive,}"></div>
            </div>
            <p>Vis kun tilgængelige</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <!-- List all rewards -->
            <Reward v-for="data in filteredRewards" :key="data.id" :reward="data" :credits="credits"></Reward>
        </div>
    </section>
</template>