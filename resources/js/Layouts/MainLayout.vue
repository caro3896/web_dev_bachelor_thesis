<template>

    <Navbar :credits="credits"/>

    <main v-if="$page.component.startsWith('Admin/')" class="flex p-4 mx-auto">
        <Sidebar></Sidebar>
        <section class="flex-auto p-8 mx-auto">
            <slot/>
        </section>
    </main>
    <main v-else class="p-4 mx-auto">
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