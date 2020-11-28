<template>
  <village-list-component :villages="villages" />
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
  async created() {
    var host = 'http://localhost:8075';

    if ('production' == process.env.NODE_ENV) {
      host = 'https://api.villages.tomhv.uk';
    }

    const response = await axios.get(host + '/villages.json');

    this.villages = response.data;
  },
};
</script>
