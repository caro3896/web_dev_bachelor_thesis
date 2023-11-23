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
    <LinkButton buttonStyle="bg-light-gray text-white" href="editRoute">
        <img src="/icons/delete.svg" alt="">
        <p class="hidden md:block pl-2">Slet</p>
    </LinkButton>
</template>
