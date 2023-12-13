<script>
import Edit from './Edit.vue';
import Delete from './Delete.vue';
import Button from '../Buttons/Button.vue';
import { router } from '@inertiajs/vue3';

export default {
    components: {
      Delete,
      Edit,
      Button
    },
    props: {
        rewards: Array,
        users: Array,
        redeemed: Array,
        votes: Array
    },
    methods: {
        removeVote(reward) {
            router.put(
                route('vote', { rewardId: reward.id }),
                {
                    onSuccess: (response) => {
                        this.message = "Stemme fjernet";
                    },
                    onError: (error) => {
                        alert(error.error);
                    }
                }
            );
        }
      }
}
</script>

<template>

      <!-- Rewards table -->
        <table v-if="rewards" class="min-w-full text-left table-auto">
          <thead class="border-b">
            <tr class="py-4">
              <th scope="col" class="px-2 py-4 md:px-6">Titel</th>
              <th scope="col" class="px-6 py-4 hidden md:table-cell">Beskrivelse</th>
              <th scope="col" class="px-6 py-4 hidden md:table-cell">Billede</th>
              <th scope="col" class="px-6 py-4 hidden md:table-cell">Pris</th>
              <th scope="col" class="px-6 py-4 hidden md:table-cell">Stemmer</th>
              <th scope="col" class="px-4 py-4 md:px-6">
                <img class="h-full max-w-none" src="/icons/like.svg" alt="">
              </th>
            </tr>
          </thead>
          <tbody>
            <tr  v-for="reward in rewards" :key="reward.id" class="border-b dark:border-neutral-500 py-4">
              <td class="px-2 py-2 px-2 py-4 md:px-6">{{ reward.name }}</td>
              <td class="px-6 py-4 hidden md:table-cell">{{ reward.description }}</td>
              <td class="px-6 py-4 hidden md:table-cell"><img class="w-20 rounded" :src="'/storage/' + reward.image " alt=""></td>
              <td class="px-6 py-4 hidden md:table-cell">{{ reward.price }}</td>
              <td class="px-4 py-4 md:px-6">{{ reward.votes }}</td>
              <td class="px-4">
                  <!-- Rediger -->
                  <Edit :editRoute="route('admin.rewards.reward.edit', { id: reward.id })"/>
              </td>
              <td>
                <!-- Slet -->
                <Delete :deleteRoute="route('admin.rewards.reward.destroy', { id: reward.id })"/>
              </td>
            </tr>
          </tbody>
        </table>

        <!-- Users table -->
        <table v-if="users" class="min-w-full text-left table-auto">
          <thead class="border-b">
            <tr>
              <th scope="col" class="px-2 py-4 md:px-6">Navn</th>
              <th scope="col" class="px-6 py-4 hidden md:table-cell">Email</th>
              <th scope="col" class="px-2 py-4 md:px-6">Bruger type</th>
            </tr>
          </thead>
          <tbody>
            <tr  v-for="user in users" :key="user.id" class="border-b dark:border-neutral-500">
              <td class="px-2 py-4 md:px-6">{{ user.name }}</td>
              <td class="px-6 py-4 hidden md:table-cell">{{ user.email }}</td>
              <td class="px-2 py-4 md:px-6">{{ user.is_admin ? 'Admin' : 'Standard' }}</td>
              <td>
                <!-- Rediger -->
                <Edit :editRoute="route('admin.users.user.edit', { id: user.id })"/>
              </td>
              <td>
                <!-- Slet -->
                <Delete :deleteRoute="route('admin.users.user.destroy', { id: user.id })"/>
              </td>
            </tr>
          </tbody>
        </table>

        <!-- Redeemed table -->
        <table v-if="redeemed" class="min-w-full text-left table-auto">
          <thead class="border-b">
            <tr>
              <th scope="col" class="px-2 py-4 md:px-6">Reward</th>
              <!-- <th scope="col" class="px-6 py-4">Indløst af</th> -->
              <th scope="col" class="px-2 py-4 md:px-6">Dato for indløsning</th>
            </tr>
          </thead>
          <tbody>
            <tr  v-for="redeemedReward in redeemed" :key="redeemedReward.id" class="border-b dark:border-neutral-500">
              <td class="px-2 py-4 md:px-6">{{ redeemedReward.reward.name }}</td>
              <!-- <td class="px-6 py-4">{{ redeemedReward.user.name }}</td> -->
              <td class="px-2 py-4 md:px-6">{{ redeemedReward.created_at }}</td>
            </tr>
          </tbody>
        </table>

        <!-- Votes table -->
        <table v-if="votes" class="min-w-full text-left table-auto">
          <thead class="border-b">
            <tr>
              <th scope="col" class="px-2 py-4 md:px-6">Reward</th>
            </tr>
          </thead>
          <tbody>
            <tr  v-for="vote in votes" :key="vote.id" class="border-b dark:border-neutral-500">
              <td class="px-2 py-4 md:px-6">{{ vote.reward.name }}</td>
              <td>
                <Button buttonStyle="bg-light-gray text-white" @click="removeVote(vote.reward)">
                  <img src="/icons/delete.svg" alt="Trashcan icon">
                  <p class="hidden md:block pl-2">Fjern stemme</p>
                </Button>
              </td>
            </tr>
          </tbody>
        </table>
        

</template>