<template>

    <Navbar :credits="credits"/>

    <div class="flex p-4">
        <aside>
            <Sidebar></Sidebar>
        </aside>
        <main class="p-8 mx-auto flex-auto">
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