<script>
export default {
    props: {
        error: String
    }
}
</script>

<template>
    <p class="bg-red-400 pt-1 text-yellow italic rounded-b-lg text-sm" v-if="error">{{ error }}</p>
</template>