<template>
    <section class="flex">
      <div class="flex flex-col h-screen border-r border-r-2 p-4">
        <SidebarLink href="/" :imageSrc="'/icons/reward.svg'" altText="Icon for rewards">Rewards</SidebarLink>
        <SidebarLink href="/" :imageSrc="'/icons/users.svg'" altText="Icon for users">Users</SidebarLink>
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