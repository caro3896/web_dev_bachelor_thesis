<script>
import Button from '../Buttons/Button.vue';
import { router } from '@inertiajs/vue3';
// import SuccessMessage from '../SuccessMessage.vue';

export default {
    components: {
        Button,
    },
    props: {
        reward: Object,
        credits: Number
    },
    data() {
        return {
            message: '',
            isOpen: false,
        }
    },
    computed: {
        isAvailable() {
            return this.reward.price <= this.credits;
        },
    },
    methods: {
        vote(reward) {
            router.put(
                route('vote', { rewardId: reward.id }),
                {
                    onSuccess: (response) => {
                        this.message = "Du har stemt på: " + reward.name;
                    },
                    onError: (error) => {
                        alert(error.error);
                    }
                }
            );
        },
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

        <div v-if="isAvailable">
            <div class="absolute top-0 left-0 flex justify-between p-3 w-full" >                
                <div @click="vote(reward)" class="bg-gray rounded-2xl py-1 px-3 flex items-center">
                    <p>{{ reward.votes }}</p>
                    <svg class="ml-2" :class="{ 'stroke-white fill-none': !reward.hasVoted, 'fill-white stroke-gray text-gray-500': reward.hasVoted }" xmlns="http://www.w3.org/2000/svg" width="15.329" height="15.557" viewBox="0 0 15.329 15.557">
                        <path id="Icon_feather-thumbs-up" data-name="Icon feather-thumbs-up" d="M11.734,8.095V5.183A2.183,2.183,0,0,0,9.55,3L6.639,9.55v8.006h8.21A1.456,1.456,0,0,0,16.3,16.319l1-6.55a1.456,1.456,0,0,0-1.456-1.674ZM6.639,17.557H4.456A1.456,1.456,0,0,1,3,16.1V11.006A1.456,1.456,0,0,1,4.456,9.55H6.639" transform="translate(-2.5 -2.5)"/>
                    </svg>
                </div>
                
                <p class="bg-yellow rounded-2xl py-1 px-3 text-gray">{{ reward.price }} x coins</p>
            </div>
            <div @click="open()" class="absolute bg-white w-full rounded-t-2xl rounded-b-xl bottom-0 left-0 p-6 max-h-18 overflow-hidden before:absolute before:h-1 before:w-20 before:bg-white-gray before:top-1.5 before:left-1/2 before:-translate-x-1/2 before:rounded-full cursor-pointer transition-max-height duration-1000 ease-in-out" :class="{ 'max-h-full': isOpen }">
              <h2 class="text-2xl mb-3 text-gray"> {{ reward.name }}</h2>
              <p class="mb-3 text-light-gray"> {{ reward.description }}</p>
              <Button @click="buy(reward)">Indløs</Button>
            </div>
        </div>

        <div v-else>
            <div class="absolute inset-0 flex flex-col items-center justify-center bg-gray bg-opacity-60 text-white text-center rounded-lg">
                <div class="absolute top-0 left-0 flex justify-between p-3 w-full">
                    <div @click="vote(reward)" class="bg-gray rounded-2xl py-1 px-3 flex items-center">
                    <p>{{ reward.votes }}</p>
                    <svg class="ml-2" :class="{ 'stroke-white fill-none': !reward.hasVoted, 'fill-white stroke-gray text-gray-500': reward.hasVoted }" xmlns="http://www.w3.org/2000/svg" width="15.329" height="15.557" viewBox="0 0 15.329 15.557">
                        <path id="Icon_feather-thumbs-up" data-name="Icon feather-thumbs-up" d="M11.734,8.095V5.183A2.183,2.183,0,0,0,9.55,3L6.639,9.55v8.006h8.21A1.456,1.456,0,0,0,16.3,16.319l1-6.55a1.456,1.456,0,0,0-1.456-1.674ZM6.639,17.557H4.456A1.456,1.456,0,0,1,3,16.1V11.006A1.456,1.456,0,0,1,4.456,9.55H6.639" transform="translate(-2.5 -2.5)"/>
                    </svg>
                </div>
                    <p class="bg-yellow rounded-2xl py-1 px-3 text-gray opacity-50">{{ reward.price }} x coins</p>
                 </div>
                <h2 class="text-2xl mb-2 opacity-100">{{ reward.name }}</h2>
                <p class="">(Ikke tilgængelig)</p>
            </div>
        </div>
    </div>

    <!-- <SuccessMessage v-if="message" :message="message" @close="message = null"></SuccessMessage> -->

</template>
