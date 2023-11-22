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
    <LinkButton :href="editRoute">Rediger</LinkButton>
</template>
