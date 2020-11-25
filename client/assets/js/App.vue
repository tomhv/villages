<template>
    <header-component :title="title" />
</template>

<script>
import HeaderComponent from './components/Header';

export default {
    name: 'App',
    components: {
        HeaderComponent,
    },
    data() {
        return {
            title: 'Villages',
        };
    },
};
</script>
