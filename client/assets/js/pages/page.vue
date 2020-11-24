<template>
    <header-component :title="title" />
</template>

<script>
import HeaderComponent from '../components/header';

export default {
    name: 'Page',
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
