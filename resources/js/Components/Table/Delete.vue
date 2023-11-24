<script>
import LinkButton from '../Buttons/LinkButton.vue';
import Button from '../Buttons/Button.vue';
import { router } from '@inertiajs/vue3';

export default {
    components: {
    Button
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
    <Button buttonStyle="bg-light-gray text-white" @click="deleteReward()">
        <img src="/icons/delete.svg" alt="Trashcan icon">
        <p class="hidden md:block pl-2">Slet</p>
    </Button>
</template>
