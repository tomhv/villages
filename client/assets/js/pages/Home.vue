<template>
  <div class="mt-4">
    <div class="flex justify-end">
      <a href="#"  class="mr-1" @click="loadVillages">
        <font-awesome-icon class="text-blue-400" icon="sync-alt" />
      </a>
    </div>
    <village-list-component :villages="villages" />
  </div>
</template>

<script>
import axios from 'axios';
import { library } from '@fortawesome/fontawesome-svg-core'
import { faSyncAlt } from "@fortawesome/free-solid-svg-icons/faSyncAlt";
import VillageListComponent from '@/components/VillageList';

library.add(faSyncAlt);

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
