<template>
  <div class="bg-white rounded-lg shadow p-6">
    <h3 class="text-lg font-medium text-gray-900 mb-4">Search Magic Cards</h3>
    
    <div class="mb-4">
      <input
        v-model="searchQuery"
        type="text"
        placeholder="Enter card name..."
        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
        @keyup.enter="searchCards"
      />
      <button
        @click="searchCards"
        :disabled="loading || !searchQuery.trim()"
        class="mt-2 w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded disabled:opacity-50"
      >
        {{ loading ? 'Searching...' : 'Search' }}
      </button>
    </div>

    <div v-if="error" class="mb-4 p-3 bg-red-100 border border-red-400 text-red-700 rounded">
      {{ error }}
    </div>

    <div v-if="results.length > 0" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
      <div 
        v-for="card in results" 
        :key="card.id"
        class="border rounded-lg p-4 hover:shadow-lg transition-shadow"
      >
        <img 
          v-if="card.image_uris?.normal"
          :src="card.image_uris.normal" 
          :alt="card.name"
          class="w-full h-48 object-contain mb-2"
        />
        <h4 class="font-semibold text-gray-900">{{ card.name }}</h4>
        <p class="text-sm text-gray-600">{{ card.type_line }}</p>
        <p class="text-sm text-gray-500">{{ card.set_name }}</p>
        <button
          @click="addToCollection(card)"
          class="mt-2 w-full bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded text-sm"
        >
          Add to Collection
        </button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import axios from 'axios'

const emit = defineEmits(['card-added'])

const searchQuery = ref('')
const results = ref([])
const loading = ref(false)
const error = ref('')

const searchCards = async () => {
  if (!searchQuery.value.trim()) return
  
  loading.value = true
  error.value = ''
  
  try {
    const response = await axios.get('/api/cards/search', {
      params: { q: searchQuery.value }
    })
    results.value = response.data.data || []
  } catch (err) {
    error.value = 'Failed to search cards. Please try again.'
    console.error('Search error:', err)
  } finally {
    loading.value = false
  }
}

const addToCollection = async (card) => {
  try {
    await axios.post('/api/collection', {
      card_id: card.id,
      name: card.name,
      image_url: card.image_uris?.normal || '',
      type_line: card.type_line,
      set_name: card.set_name
    })
    
    emit('card-added', card)
    alert('Card added to collection!')
  } catch (err) {
    alert('Failed to add card to collection')
    console.error('Add card error:', err)
  }
}
</script>