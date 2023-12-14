<script>
import LinkButton from '../Buttons/LinkButton.vue';

export default {
    components: {
        LinkButton
    },
    props: {
        editRoute: String
    },
}
</script>

<template>
    <LinkButton :href="editRoute">
        <img src="/icons/edit.svg" alt="Pencil icon">
        <p class="hidden md:block pl-2">Rediger</p>
    </LinkButton>
</template>
