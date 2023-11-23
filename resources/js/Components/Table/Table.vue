<script>
import Edit from './Edit.vue';
import Delete from './Delete.vue';

export default {
    components: {
      Delete,
      Edit
    },
    props: {
        rewards: Array,
        users: Array,
        purchases: Array
    }
}
</script>

<template>

      <!-- Rewards table -->
        <table v-if="rewards" class="min-w-full text-left table-auto">
          <thead class="border-b">
            <tr>
              <th scope="col" class="px-6 py-4">Titel</th>
              <th scope="col" class="px-6 py-4 hidden md:table-cell">Beskrivelse</th>
              <th scope="col" class="px-6 py-4 hidden md:table-cell">Billede</th>
              <th scope="col" class="px-6 py-4">Pris</th>
            </tr>
          </thead>
          <tbody>
            <tr  v-for="reward in rewards" :key="reward.id" class="border-b dark:border-neutral-500">
              <td class="px-6 py-4">{{ reward.name }}</td>
              <td class="px-6 py-4 hidden md:table-cell">{{ reward.description }}</td>
              <td class="px-6 py-4 hidden md:table-cell"><img class="w-20 rounded" :src="'/storage/' + reward.image " alt=""></td>
              <td class="px-6 py-4">{{ reward.price }}</td>
              <td class="px-6 py-4">{{ reward.quantity }}</td>
              <td>
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
              <th scope="col" class="px-6 py-4">Navn</th>
              <th scope="col" class="px-6 py-4">Email</th>
              <th scope="col" class="px-6 py-4">Credits</th>
              <th scope="col" class="px-6 py-4">Bruger type</th>
            </tr>
          </thead>
          <tbody>
            <tr  v-for="user in users" :key="user.id" class="border-b dark:border-neutral-500">
              <td class="px-6 py-4">{{ user.name }}</td>
              <td class="px-6 py-4">{{ user.email }}</td>
              <td class="px-6 py-4">{{ user.credits }}</td>
              <td class="px-6 py-4">{{ user.is_admin ? 'Admin' : 'Standard' }}</td>
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

        <!-- Purchases table -->
        <table v-if="purchases" class="min-w-full text-left table-auto">
          <thead class="border-b">
            <tr>
              <th scope="col" class="px-6 py-4">Reward</th>
              <th scope="col" class="px-6 py-4">Indløst af</th>
              <th scope="col" class="px-6 py-4">Dato for indløsning</th>
            </tr>
          </thead>
          <tbody>
            <tr  v-for="purchase in purchases" :key="purchase.id" class="border-b dark:border-neutral-500">
              <td class="px-6 py-4">{{ purchase.reward.name }}</td>
              <td class="px-6 py-4">{{ purchase.user.name }}</td>
              <td class="px-6 py-4">{{ purchase.created_at }}</td>
              <td>
                <!-- Rediger -->
                <!-- <Edit :editRoute="route('admin.users.user.edit', { id: user.id })"/> -->
              </td>
              <td>
                <!-- Slet -->
                <!-- <Delete :deleteRoute="route('admin.users.user.destroy', { id: user.id })"/> -->
              </td>
            </tr>
          </tbody>
        </table>
        

</template>