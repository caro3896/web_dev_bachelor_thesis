<template>

    <Navbar :credits="credits"/>
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
    credits: Array
}
}

</script>