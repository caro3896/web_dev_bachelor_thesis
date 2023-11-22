<script>
import Button from '../Buttons/Button.vue';
import { router } from '@inertiajs/vue3';
// import SuccessMessage from '../SuccessMessage.vue';

export default {
    components: {
        Button,
        
    },
    props: {
        reward: Object
    },
    data() {
        return {
            message: '',
            isOpen: false,
        }
    },
    computed: {
        isRedeemed() {
            return this.reward.quantity === 0;
        },
    },
    methods: {
        // buy(reward) {
        //     router.put(route('buy', {id: reward.id}), {}, {
        //         onSuccess: (response) => {
        //             this.message = "Du har købt: " + reward.name;
        //         },
        //         onError: (error) => {
        //             alert(error.error);
        //         }
        //     });
        // },
        open() {
            this.isOpen =! this.isOpen
        }
    }
}
</script>

<template>
    <div class="rounded-lg w-full relative">
        <img class="w-full h-full rounded-lg object-cover" :src="reward.image_url" alt="">
        <div v-if="isRedeemed">
            <div class="absolute inset-0 flex flex-col items-center justify-center bg-gray bg-opacity-50 text-white text-center rounded-lg">
                <h2 class="text-2xl mb-2 opacity-100">{{ reward.name }}</h2>
                <p class="">(Indløst)</p>
            </div>
        </div>
        <div v-else>
            <div class="absolute top-0 left-0 flex justify-end p-3 w-full">
              <p class="bg-yellow rounded-2xl py-1 px-3 text-gray">{{ reward.price }} x coins</p>
            </div>
            <div @click="open()" class="absolute bg-white w-full rounded-t-2xl rounded-b-xl bottom-0 left-0 p-6 max-h-18 overflow-hidden before:absolute before:h-1 before:w-20 before:bg-white-gray before:top-1.5 before:left-1/2 before:-translate-x-1/2 before:rounded-full cursor-pointer transition-max-height duration-1000 ease-in-out" :class="{ 'max-h-full': isOpen }">
              <h2 class="text-2xl mb-3 text-gray"> {{ reward.name }}</h2>
              <p class="mb-3 text-light-gray"> {{ reward.description }}</p>
              <Button @click="buy(reward)">Indløs</Button>
            </div>
        </div>
    </div>

    <!-- <SuccessMessage v-if="message" :message="message" @close="message = null"></SuccessMessage> -->

</template>
