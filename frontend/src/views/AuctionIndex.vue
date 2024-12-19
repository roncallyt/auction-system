<script setup lang="ts">
  import { storeToRefs } from 'pinia'
  import { useAuctionStore } from '../stores/AuctionStore'

  const auctionStore = useAuctionStore()

  const { items: auctions } = storeToRefs(auctionStore)

  await auctionStore.fetchAll()
</script>

<template>
  <CoreList>
    <CoreListItem
      v-for="auction in auctions"
      :key="`auction-${auction.id}`"
    >
      <div class="min-w-0">
        <div class="flex items-start gap-x-3">
          <p class="text-sm/6 font-semibold text-gray-900">{{ auction.product }}</p>
          <CoreBadge :color="auction.status === 'sold' ? 'red' : 'green'">
            {{ auction.status }}
          </CoreBadge>
        </div>
      </div>
      <div class="flex flex-none items-center gap-x-4">
        <a href="#" class="hidden rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:block">Track Auction</a>
        
        <CoreDropdown>
          <CoreDropdownItem>Edit</CoreDropdownItem>
          <CoreDropdownItem>Delete</CoreDropdownItem>
        </CoreDropdown>
      </div>
    </CoreListItem>
  </CoreList>
</template>
