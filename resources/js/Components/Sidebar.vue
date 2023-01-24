<script>
import { isSet } from '@vue/shared';
import EditSituationModal from '@/Components/EditSituationModal.vue';

export default{
    methods: {
        toggleMenu(){
            document.getElementById('nav-icon').classList.toggle('open')
            document.getElementById('sidebar').classList.toggle('translate-x-[-100%]')
        },
        runFunction(){
            console.log("hello");
        }
    },
    components: {
        EditSituationModal
    },
    data: () => ({
        test: null
    }),
    props: {
        situations: Array,
    }
}
</script>

<template>
    <EditSituationModal :test="test"/>

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
            <h1 class="font-bold text-white text-3xl mb-8 mt-3">Recente Berekening</h1>
            <hr/>
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
                    <a class="flex-auto" @click="">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 flex-auto">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.42 15.17L17.25 21A2.652 2.652 0 0021 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 11-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 004.486-6.336l-3.276 3.277a3.004 3.004 0 01-2.25-2.25l3.276-3.276a4.5 4.5 0 00-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437l1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008z" />
                        </svg>
                    </a>
                </li>
            </template>
        </ul>
    </div>
</template>
