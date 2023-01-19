<script setup>
import { ref } from 'vue';

import Map from '@/Components/Map.vue';
import Sidebar from '@/Components/Sidebar.vue';
import SituationModal from '@/Components/SituationModal.vue';

import '@/../css/stylesheet.css';
</script>

<template>
    <Sidebar :situations="situations"/>
    <Map/>
    <SituationModal ref="SituationRef"/>
</template>

<script>
export default{
    components:{
        Sidebar,
        Map,
        SituationModal
    },
    props:{
        situations: Array,
    },
    methods: {
        callToHome (value){
            SituationModal.methods.toggleSituationModal(value);
        }
    }
}
</script>