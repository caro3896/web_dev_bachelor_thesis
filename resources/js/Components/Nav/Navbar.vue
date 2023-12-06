<template>
    <!-- Mobile navigation -->
    <nav class="m-4 border-b pb-2 flex justify-between h-32 md:hidden">
        <div>
            <h1 class="mb-4"><Link href="/" class="text-off-white text-6xl mb-6">Rewards<span class="text-yellow">23</span></Link></h1>
            <p class="text-yellow text-3xl">Til rådighed: {{credits}} x coins</p>
        </div>
        <div class="flex flex-col items-end justify-around">
            <!-- Only show admin page if user is admin -->
            <Link v-if="$page.props.auth.user.admin" href="/admin" class="hover:underline text-gray inline-flex bg-white rounded-full py-3 px-5 " :class="{'underline': $page.component === 'Admin' }">
                    <img src="/icons/profile.svg" alt="Silhouette of person" class="mr-2"> 
            </Link>
            <!-- TODO: Else: show user dashboard -->
            <!-- Only show logout if user is logged in -->
            <Link v-if="$page.props.auth" href="/logout" method="POST" as="button" class="hover:underline inline-flex">
                <img src="/icons/logout.svg" alt="" class="mr-2"> 
            </Link>
        </div>
    </nav>

    <!-- Desktop navigation -->
    <nav class="sticky z-10 bg-gray bg-opacity-80 top-0 m-4 border-b pb-2 justify-between h-32 hidden md:flex items-center">
        <h1 class="mb-4"><Link href="/" class="text-off-white text-8xl mb-6">Rewards<span class="text-yellow">23</span></Link></h1>
        <div class="flex flex-col items-end h-full justify-evenly">
            <div class="">
                <!-- Only show admin page if user is admin -->
                <Link v-if="$page.props.auth.user.admin" href="/admin/rewards" class="hover:bg-yellow text-gray inline-flex bg-white rounded-full py-3 px-5 md:mr-6" :class="{'bg-yellow': $page.component.startsWith('Admin/') }">
                    <img src="/icons/profile.svg" alt="Silhouette of person" class="mr-2"> 
                    <p class="hidden md:block">Admin</p>
                </Link>
                <!-- Only show logout if user is logged in -->
                <Link v-if="$page.props.auth" href="/logout" method="POST" as="button" class="hover:text-yellow hover:fill-yellow inline-flex">
                    <img src="/icons/logout.svg" alt="Lock icon" class="mr-2"> 
                    <p class="hidden md:block">Log af</p>
                </Link>
            </div>
            <div>
                <p class="text-yellow text-3xl">Til rådighed: {{credits}} x coins</p>
            </div>
        </div>
    </nav>
</template>
<script>
import { Link } from '@inertiajs/vue3'

export default {
    components: {
        Link,
    },
    props: {
        credits: Number
    }
}
</script>