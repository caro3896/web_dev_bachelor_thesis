<template>
        <Link class="flex items-center text-xl group pb-12">
          <img :src="imageSrc" :alt="altText" class="md:w-6 md:h-6 mr-2 group-hover:fill-yellow" />
          <p class="hidden md:block group-hover:text-yellow"><slot/></p>
        </Link>
  </template>
  
  <script>
  import { Link } from '@inertiajs/vue3';
  
  export default {
    components: {
      Link,
    },
    props: {
    imageSrc: String,
    altText: String,
  },
  };
  </script>