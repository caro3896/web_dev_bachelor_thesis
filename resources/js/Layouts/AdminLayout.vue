<template>

    <Navbar :credits="credits"/>

    <div class="flex p-2 md:p-4">
        <aside>
            <Sidebar></Sidebar>
        </aside>
        <main class="p-6 md:p-8 mx-auto flex-auto overflow-hidden">
            <slot/>
        </main>
    </div>
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