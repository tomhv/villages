<template>
  <div>
    <village-component
      v-for="village in villages"
      class="my-4"
      :village="village"
      :key="village.id"
    />
  </div>
</template>

<script>
import VillageComponent from './Village';

export default {
  name: "VillageList",
  components: {
    VillageComponent,
  },
  props: {
    villages: {
      type: Array,
      required: true
    }
  },
};
</script>
