<template>

    <Navbar :userCredits="userCredits"/>
    <main class="p-4 mx-auto">
        <slot/>
    </main>


</template>

<script>
import Navbar from '../Components/Nav/Navbar.vue';

export default {
    components: {
        Navbar
},
    props: {
        userCredits: Number
    }
}

</script>