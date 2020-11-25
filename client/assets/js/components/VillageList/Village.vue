<template>
  <div class="p-4 rounded shadow bg-white hover:bg-gray-100">
    <h4 class="text-xl">{{ village.name }}</h4>
    <p class="mt-2 text-sm uppercase text-gray-500">
      Population: {{ village.population }}
    </p>
  </div>
</template>

<script>
export default {
  name: "VillageListItem",
  props: {
    village: {
      type: Object,
      required: true
    }
  },
};
</script>
