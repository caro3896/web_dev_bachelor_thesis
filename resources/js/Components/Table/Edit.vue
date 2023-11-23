<script>
import LinkButton from '../Buttons/LinkButton.vue';

export default {
    components: {
        LinkButton
    },
    props: {
        reward: Object,
        editRoute: String
    },
}
</script>

<template>
    <LinkButton href="editRoute">
        <img src="/icons/edit.svg" alt="">
        <p class="hidden md:block pl-2">Rediger</p>
    </LinkButton>
</template>
