<template>
    <nav class="m-4 border-b pb-2">
        <!-- Mobil -->
        <div class="md:hidden flex justify-between">
            <div>
                <Link href="/" class="text-off-white text-6xl">Rewards<span class="text-yellow">23</span></Link>
                <p v-if="$page.component === 'Index'" class="text-yellow text-3xl">Til rådighed:  x coins</p>
            </div>
            <div class="flex flex-col items-end justify-around">
                <!-- Only show admin page if user is admin -->
                <Link v-if="$page.props.auth.user.admin" href="/admin" class="hover:underline text-gray inline-flex bg-white rounded-full py-3 px-5" :class="{'underline': $page.component === 'Admin' }">
                    <img src="/icons/profile.svg" alt="Silhouette of person" class="mr-2"> 
                </Link>
                <!-- Only show logout if user is logged in -->
                <Link v-if="$page.props.auth" href="/logout" method="POST" as="button" class="hover:underline inline-flex">
                    <img src="/icons/logout.svg" alt="" class="mr-2"> 
                </Link>
            </div>
        </div>
        
        <!-- Desktop -->
        <div class="justify-between items-center pb-4 hidden md:flex">
            <Link href="/" class="text-off-white text-6xl md:text-8xl">Rewards<span class="text-yellow">23</span></Link>
            <div class="flex flex-col items-end md:gap-3">
                    <div class="flex flex-col md:flex-row items-end md:items-center">
                        <!-- Only show admin page if user is admin -->
                        <Link v-if="$page.props.auth.user.admin" href="/admin" class="hover:underline text-gray inline-flex bg-white rounded-full py-3 px-5 md:mr-6" :class="{'underline': $page.component === 'Admin' }">
                            <img src="/icons/profile.svg" alt="Silhouette of person" class="mr-2"> 
                            <p class="hidden md:block">Admin</p>
                        </Link>
                        <!-- Only show logout if user is logged in -->
                        <Link v-if="$page.props.auth" href="/logout" method="POST" as="button" class="hover:underline inline-flex">
                            <img src="/icons/logout.svg" alt="" class="mr-2"> 
                            <p class="hidden md:block">Log af</p>
                        </Link>
                    </div>
                    <p v-if="$page.component === 'Index'" class="text-yellow text-3xl hidden md:block">Til rådighed:  x coins</p>
            </div>
        </div>
    </nav>
</template>
<script>
import { Link } from '@inertiajs/vue3';

export default {
    components: {
        Link
    },
    props: {
        credits: Array,
    }
}
</script>