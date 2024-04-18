<template>
    <!-- Mobile navigation -->
    <nav class="sticky z-10 bg-gray bg-opacity-80 top-0 p-4 border-b pb-2 flex justify-between h-36 md:hidden">
        <div>
            <h1 class="mb-4"><Link href="/" class="text-off-white text-6xl mb-6">Rewards<span class="text-yellow">23</span></Link></h1>
            <p class="text-yellow text-3xl">Til rådighed: {{credits}} x coins</p>
        </div>
        <div class="flex flex-col items-end justify-around">
            <!-- Only show admin page if user is admin -->
            <Link v-if="$page.props.auth.user.admin" href="/admin" class="text-gray inline-flex bg-white rounded-full py-3 px-5 " :class="{'bg-yellow': $page.component.startsWith('Admin/') }">
                    <img src="/icons/profile.svg" alt="Silhouette of person icon"> 
            </Link>
            <!-- Else: show user dashboard -->
            <Link v-else href="/user/profile" class="text-gray inline-flex bg-white rounded-full py-3 px-5 " :class="{'bg-yellow': $page.url.startsWith('/user/') }">
                    <img src="/icons/profile.svg" alt="Silhouette of person icon"> 
            </Link>
            <!-- Only show logout if user is logged in -->
            <Link v-if="$page.props.auth" href="/logout" method="POST" as="button">
                <img src="/icons/logout.svg" alt="Lock icon" class="mr-2">
            </Link>
        </div>
    </nav>

    <!-- Desktop navigation -->
    <nav class="sticky z-10 bg-gray bg-opacity-80 top-0 p-4 border-b pb-2 justify-between h-32 hidden md:flex items-center">
        <h1 class="mb-4"><Link href="/" class="text-off-white text-8xl mb-6">Rewards<span class="text-yellow">23</span></Link></h1>
        <div class="flex flex-col items-end h-full justify-evenly">
            <div class="">
                <!-- Only show admin page if user is admin -->
                <Link v-if="$page.props.auth.user.admin" href="/admin/rewards" class="hover:bg-yellow text-gray inline-flex bg-white rounded-full py-3 px-5 md:mr-6" :class="{'bg-yellow': $page.component.startsWith('Admin/') }">
                    <img src="/icons/profile.svg" alt="Silhouette of person icon" class="mr-2"> 
                    <p class="hidden md:block">Admin</p>
                </Link>
                 <!-- Else: show user dashboard -->
                <Link v-else href="/user/profile" class="text-gray inline-flex bg-white rounded-full py-3 px-5 md:mr-6" :class="{'bg-yellow': $page.url.startsWith('/user/') }">
                    <img src="/icons/profile.svg" alt="Silhouette of person icon"> 
                </Link>
                <!-- Only show logout if user is logged in -->
                <Link v-if="$page.props.auth" href="/logout" method="POST" as="button" class="inline-flex items-center group">
                    <svg class="mr-2 fill-white group-hover:fill-yellow" xmlns="http://www.w3.org/2000/svg" width="15.75" height="18" viewBox="0 0 15.75 18">
                        <title>Lock icon</title>
                        <path id="Icon_awesome-lock" data-name="Icon awesome-lock" d="M14.063,7.875h-.844V5.344a5.344,5.344,0,0,0-10.687,0V7.875H1.688A1.688,1.688,0,0,0,0,9.563v6.75A1.688,1.688,0,0,0,1.688,18H14.063a1.688,1.688,0,0,0,1.688-1.687V9.563A1.688,1.688,0,0,0,14.063,7.875Zm-3.656,0H5.344V5.344a2.531,2.531,0,0,1,5.063,0Z"/>
                    </svg>
                    <p class="group-hover:text-yellow">Log af</p>
                </Link>
            </div>
            <div >
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
    },
    methods: {
        logPageInfo() {
            console.log(this.$page);
        }
    }
}
</script>
