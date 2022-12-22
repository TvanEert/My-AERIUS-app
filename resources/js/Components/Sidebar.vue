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
    <div class="flex absolute pt-16 pl-8 top-15 h-full w-[80%] bg-aerius-lightblue ease-in duration-300 translate-x-[-100%] opacity-75" id="sidebar">
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
                <li v-for="item in situations" :key="index" class="font-bold text-white text-2xl mb-5 flex">
                    <a class="flex-auto" :href="route('')">{{ item.naam }}</a>
                    <a class="flex-auto" :href="route('deleteSituation', item.naam )">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 flex-auto">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>
                    </a>
                </li>
            </template>
        </ul>
    </div>
</template>
