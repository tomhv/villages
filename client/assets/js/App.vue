<template>
  <div>
    <header-component :title="title" />
    <section class="px-4 2xl:px-96">
      <village-list-component :villages="villages" />
    </section>
  </div>
</template>

<script>
import HeaderComponent from '@/components/Header';
import VillageListComponent from '@/components/VillageList';
import axios from 'axios';

export default {
  name: 'App',
  components: {
    HeaderComponent,
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
