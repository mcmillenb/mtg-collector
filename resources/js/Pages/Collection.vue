<template>
  <div class="min-h-screen bg-gray-100">
    <nav class="bg-white shadow">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
          <div class="flex items-center">
            <a href="/" class="text-xl font-semibold text-gray-900">Magic Collector</a>
          </div>
          <div class="flex items-center space-x-4">
            <a href="/" class="text-gray-700 hover:text-gray-900">Search Cards</a>
            <span class="text-blue-600 font-medium">Collection</span>
          </div>
        </div>
      </div>
    </nav>

    <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow rounded-lg mb-6">
        <div class="px-4 py-5 sm:p-6">
          <h2 class="text-lg font-medium text-gray-900 mb-2">My Collection</h2>
          <p class="text-gray-600 mb-4">
            Total Cards: {{ totalCards }} | Unique Cards: {{ collection.length }}
          </p>
          
          <div class="mb-4">
            <input
              v-model="searchFilter"
              type="text"
              placeholder="Filter collection..."
              class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
            />
          </div>
        </div>
      </div>

      <div v-if="loading" class="text-center py-8">
        <p class="text-gray-600">Loading collection...</p>
      </div>

      <div v-else-if="filteredCollection.length === 0" class="text-center py-8">
        <p class="text-gray-600">No cards in your collection yet.</p>
        <a href="/" class="text-blue-600 hover:text-blue-800">Start adding cards!</a>
      </div>

      <div v-else class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        <div 
          v-for="card in filteredCollection" 
          :key="card.id"
          class="bg-white rounded-lg shadow hover:shadow-lg transition-shadow"
        >
          <img 
            v-if="card.image_url"
            :src="card.image_url" 
            :alt="card.name"
            class="w-full h-64 object-contain rounded-t-lg"
          />
          
          <div class="p-4">
            <h4 class="font-semibold text-gray-900 mb-1">{{ card.name }}</h4>
            <p class="text-sm text-gray-600 mb-1">{{ card.type_line }}</p>
            <p class="text-sm text-gray-500 mb-2">{{ card.set_name }}</p>
            
            <div class="flex items-center justify-between">
              <span class="text-sm font-medium text-blue-600">
                Quantity: {{ card.quantity }}
              </span>
              <button
                @click="removeCard(card)"
                class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded text-sm"
              >
                Remove
              </button>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue'
import axios from 'axios'

const collection = ref([])
const loading = ref(true)
const searchFilter = ref('')

const filteredCollection = computed(() => {
  if (!searchFilter.value) return collection.value
  
  const filter = searchFilter.value.toLowerCase()
  return collection.value.filter(card => 
    card.name.toLowerCase().includes(filter) ||
    card.type_line?.toLowerCase().includes(filter) ||
    card.set_name?.toLowerCase().includes(filter)
  )
})

const totalCards = computed(() => {
  return collection.value.reduce((total, card) => total + card.quantity, 0)
})

const loadCollection = async () => {
  try {
    const response = await axios.get('/api/collection')
    collection.value = response.data
  } catch (error) {
    console.error('Failed to load collection:', error)
  } finally {
    loading.value = false
  }
}

const removeCard = async (card) => {
  if (confirm(`Remove one ${card.name} from your collection?`)) {
    try {
      await axios.delete(`/api/collection/${card.id}`)
      await loadCollection()
    } catch (error) {
      alert('Failed to remove card from collection')
      console.error('Remove card error:', error)
    }
  }
}

onMounted(() => {
  loadCollection()
})
</script>