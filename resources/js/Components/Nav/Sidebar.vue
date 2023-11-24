<template>
    <section class="flex h-max">
      <div class="flex flex-col border-r border-r-1 py-8 pl-4 pr-10">
        <SidebarLink href="/admin/rewards" :imageSrc="'/icons/reward.svg'" altText="Icon for rewards" :class="{'text-yellow': $page.component.startsWith('Admin/Rewards') }">Rewards</SidebarLink>
        <SidebarLink href="/admin/users" :imageSrc="'/icons/users.svg'" altText="Icon for users" :class="{'text-yellow': $page.component.startsWith('Admin/Users') }">Brugere</SidebarLink>
        <SidebarLink href="/admin/purchases" :imageSrc="'/icons/purchases.svg'" altText="Icon for purchases" :class="{'text-yellow': $page.component.startsWith('Admin/Purchases') }">Indløste rewards</SidebarLink>
        <SidebarLink href="/admin/credits" :imageSrc="'/icons/credits.svg'" altText="Icon for credits" :class="{'text-yellow': $page.component.startsWith('Admin/Credits') }">Credits</SidebarLink>
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