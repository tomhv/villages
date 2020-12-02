<template>
  <div class="mt-4">
    <button
      class="rounded text-gray-100 bg-red-800 p-2"
      @click="loadVillages"
    >
      Refresh
    </button>
    <village-list-component :villages="villages" />
  </div>
</template>

<script>
import VillageListComponent from '@/components/VillageList';
import axios from 'axios';

export default {
  name: 'Home',
  components: {
    VillageListComponent,
  },
  data() {
    return {
      title: 'Villages',
      villages: [],
    };
  },
  created() {
    this.loadVillages();
  },
  methods: {
    loadVillages: async function() {
      var host = 'http://localhost:8075';

      if ('production' == process.env.NODE_ENV) {
        host = 'https://api.villages.tomhv.uk';
      }

      const response = await axios.get(host + '/villages');

      this.villages = response.data;
    },
  },
};
</script>
