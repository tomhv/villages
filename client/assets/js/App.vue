<template>
  <div>
    <header-component :title="title" />
    <section class="px-4 2xl:px-96">
      <village-list-component :villages="villages" />
    </section>
  </div>
</template>

<script>
import HeaderComponent from './components/Header';
import VillageListComponent from './components/VillageList/index.vue';

export default {
  name: 'App',
  components: {
    HeaderComponent,
    VillageListComponent,
  },
  data() {
    return {
      title: 'Villages',
      villages: [
        {
          id: "2c3ad882-e987-462f-8965-75a42ad603fa",
          name: "Village One",
          population: 345,
        },
        {
          id: "216b01fa-8383-4163-82df-a0497aafcedc",
          name: "Village Two",
          population: 12,
        },
        {
          id: "5e6502bb-de06-43c5-b980-c1194285d5db",
          name: "Village Three",
          population: 3,
        },
      ],
    };
  },
};
</script>
