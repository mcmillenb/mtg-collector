<template>
  <div class="min-h-screen bg-gray-100">
    <nav class="bg-white shadow">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
          <div class="flex items-center">
            <h1 class="text-xl font-semibold text-gray-900">Magic Collector</h1>
          </div>
          <div class="flex items-center space-x-4">
            <button 
              @click="showSearch = !showSearch"
              class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
            >
              Search Cards
            </button>
            <a href="/collection" class="text-gray-700 hover:text-gray-900">My Collection</a>
          </div>
        </div>
      </div>
    </nav>

    <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
      <div v-if="showSearch" class="mb-6">
        <card-search @card-added="handleCardAdded" />
      </div>
      
      <div class="bg-white overflow-hidden shadow rounded-lg">
        <div class="px-4 py-5 sm:p-6">
          <h2 class="text-lg font-medium text-gray-900 mb-4">Welcome to Magic Collector</h2>
          <p class="text-gray-600">
            Search for Magic: The Gathering cards and build your collection!
          </p>
        </div>
      </div>
    </main>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import CardSearch from '../Components/CardSearch.vue'

const showSearch = ref(false)

const handleCardAdded = (card) => {
  console.log('Card added to collection:', card)
  // Handle card addition logic here
}
</script>