<script>
import LinkButton from '../Buttons/LinkButton.vue';
import { router } from '@inertiajs/vue3';

export default {
    components: {
    LinkButton
},
    props: {
        deleteRoute: String
    },
    methods: {
        deleteReward() {
            if (confirm("Er du sikker på du vil slette dette?")){
                router.delete(this.deleteRoute, {}, {
                    onSuccess: (response) => {
                        console.log(response);
                    }
                });
            }
        }
    }
}
</script>

<template>
    <button class="rounded-xl bg-white-gray text-gray py-1.5 px-4 hover:underline" @click="deleteReward()">Slet</button>
</template>
