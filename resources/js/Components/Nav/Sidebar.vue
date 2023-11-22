<template>
    <section class="flex">
      <div class="flex flex-col h-screen border-r border-r-2 py-8 pl-4 pr-10">
        <SidebarLink href="/admin/rewards" :imageSrc="'/icons/reward.svg'" altText="Icon for rewards" :class="{'text-yellow': $page.component.startsWith('Admin/') }">Rewards</SidebarLink>
        <SidebarLink href="/admin/users" :imageSrc="'/icons/users.svg'" altText="Icon for users">Users</SidebarLink>
    </div>
    </section>
  </template>
  
  <script>
  import SidebarLink from './SidebarLink.vue'
  
  export default {
    components: {
        SidebarLink,
    },
  };
  </script>