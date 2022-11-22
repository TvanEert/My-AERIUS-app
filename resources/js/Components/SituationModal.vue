<script>
import { ref, VueElement } from 'vue'
import { Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'
</script>

<script setup>
const open = ref(false)
const amountYearsBack = 3;
const amountOfYears = 17;
</script>

<template>
    <div class="flex flex-wrap flex-col place-content-center">
        <a type="submit" @click="open = true" class="w-3/4 text-xl bg-blue-500 hover:bg-blue-700 text-white font-bold p-5 m-2 text-center rounded-full">
            Situatie aanmaken
        </a>
    </div>

    <TransitionRoot as="template" :show="open">
        <Dialog as="div" class="relative z-10" @close="open = false">
            <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
            </TransitionChild>
  
            <div class="fixed inset-0 z-10 overflow-y-auto">
            <!-- min-h-full places the modal at the bottom of the page -->
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200" leave-from="opacity-100 translate-y-0 sm:scale-100" leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                        <!-- w-full to make sure the modal fills the page -->
                        <DialogPanel class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg w-full">
                            <div class="bg-white">
                                <div class="mt-3 text-center sm:mt-0 sm:text-left">

                                    <!-- Put content here -->
                                    <div class="mt-5 md:col-span-2 md:mt-0">
                                        <form action="#" method="POST">
                                        <div class="shadow sm:overflow-hidden sm:rounded-md">
                                            <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                                                <DialogTitle as="h3" class="text-lg font-medium leading-6 text-gray-900">Situatie aanmaken</DialogTitle>

                                                <div class="flex rounded-md shadow-sm">
                                                    <span class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">Naam</span>
                                                    <input type="text" class="w-full rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="Situatie 1"/>
                                                    <!-- delete icon -->
                                                </div>
                                                
                                                <div class="flex">
                                                    <span class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">Situatie</span>
                                                    <select type="text" class="w-full rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                        <option>Referentie</option>
                                                        <option>Tijdelijk</option>
                                                        <option>Beoogd</option>
                                                        <option>Saldering</option>
                                                    </select>
                                                </div>

                                                <div class="flex">
                                                    <span class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">Rekenjaar</span>
                                                    <select type="text" class="w-full rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                        <option v-for="n in Array.from({length: amountOfYears}, (v, i) => i + (new Date().getFullYear()-amountYearsBack))" :value="n">
                                                            {{n}} 
                                                        </option>
                                                    </select>
                                                </div>

                                                <div class="flex">
                                                    <span class="inline-flex w-3/4 items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">Invoer voor</span>
                                                    <select type="text" class="w-full rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                        <option>Emissiebronnen</option>
                                                        <option>Gebouwen</option>
                                                    </select>
                                                </div>

                                            </div>

                                            <div class="flex justify-end bg-gray-50 px-4 py-3 text-right sm:px-6">
                                                <button type="button" class="inline-flex justify-center rounded-md border border-gray-300 bg-white ml-3 px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" 
                                                @click="open = false" ref="cancelButtonRef">Cancel</button>

                                                <button type="submit" class="inline-flex justify-center rounded-md border border-transparent ml-3 bg-aerius-darkblue px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                                Save</button>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
  </template>