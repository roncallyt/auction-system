import { ref } from 'vue'
import { defineStore } from 'pinia'
import axios from '../helpers/axios'

export const useAuctionStore = defineStore('AuctionStore', () => {
  const items = ref([])
  const item = ref(null)

  async function fetchAll() {
    const { data: { data: auctions } } = await axios.get('/api/auctions')

    items.value = auctions
  }

  return {
    // Properties
    items,
    item,

    // Methods
    fetchAll,
  }
})
