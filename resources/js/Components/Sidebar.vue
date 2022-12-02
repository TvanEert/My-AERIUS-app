<script>
import { isSet } from '@vue/shared';

export default{
    methods: {
        toggleMenu(){
            document.getElementById('nav-icon').classList.toggle('open')
            document.getElementById('sidebar').classList.toggle('translate-x-[-100%]')
        }
    },
    props: {
        situations: Array,
    }
}
</script>

<template>
    <div class="flex w-full bg-aerius-darkblue">
        <div @click="toggleMenu()" id="nav-icon">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="flex absolute pt-16 pl-8 top-15 h-[84%] w-[80%] bg-aerius-lightblue ease-in duration-300 translate-x-[-100%] opacity-75" id="sidebar">
        <ul>
            <li class="font-bold text-white text-2xl mb-5">
                <a :href="route('')">
                    Recente berekeningen
                </a>
            </li>
            <li class="font-bold text-white text-2xl mb-5">
                <a :href="route('')">
                    Instellingen
                </a>
            </li>
            <template v-if="situations.length > 0">
                <hr/>
                <h1 class="font-bold text-white text-3xl mb-8 mt-3">Situations</h1>
                <li v-for="index in situations" class="font-bold text-white text-2xl mb-5">
                    <a :href="route('')">{{ index.name }}</a>
                </li>
            </template>
        </ul>
    </div>
</template>
