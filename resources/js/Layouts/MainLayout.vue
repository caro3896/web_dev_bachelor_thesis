<template>

    <Navbar :credits="credits"/>

    <main class="p-4 pt-6 mx-auto">
        <slot/>
    </main>


</template>

<script>
import Navbar from '../Components/Nav/Navbar.vue';
import Sidebar from '../Components/Nav/Sidebar.vue';

export default {
    components: {
    Navbar,
    Sidebar
},
    props: {
        credits: Number
    }
}

</script>