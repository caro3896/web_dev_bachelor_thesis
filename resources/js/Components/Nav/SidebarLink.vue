<template>
        <Link class="flex items-center text-xl group pb-12">
          <img :src="imageSrc" :alt="altText" class="w-6 h-6 mr-2 fill-off-white group-hover:fill-yellow" />
          <p class="group-hover:text-yellow"><slot/></p>
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