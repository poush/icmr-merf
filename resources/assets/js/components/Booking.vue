<template>
    <div>
        <section class="p-12 bg-white text-center border-b border-grey-lighter">

            <div class="py-8">
                <h2 class="font-thin text-4xl mb-4">
                    {{ equipment.name }}
                    
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 128 160" class="fill-current w-6 relative" v-bind:class="{ 'text-green-dark': equipment.is_working, 'text-red': !equipment.is_working }" style="enable-background:new 0 0 128 128;top: 5px;" xml:space="preserve"><path d="M64,47.4c-9.5,0-17.3,7.7-17.3,17.3C46.7,74.2,54.5,82,64,82s17.3-7.7,17.3-17.3C81.3,55.2,73.5,47.4,64,47.4z M64,78  c-7.3,0-13.3-6-13.3-13.3s6-13.3,13.3-13.3s13.3,6,13.3,13.3S71.3,78,64,78z"/><path d="M109.1,79.2c-0.5-2.2-1.8-4-3.6-5l-4.5-2.6c0.4-2.3,0.6-4.6,0.6-6.8c0-3.3-0.3-6.2-1.1-9.1L105,53c4-2.3,5.3-6.6,3.2-10.3  l-3.7-6.4c-1.5-2.5-4.3-4.2-7.2-4.2c-1.3,0-2.6,0.3-3.8,1l-5.1,3c-3.9-3.4-8.4-5.9-13.4-7.4l0-5.7c0-4.6-3.1-7.9-7.3-7.9h-7.4  C55.8,15,52,18.7,52,23v6c-4.8,1.6-9.3,4.2-13.2,7.8L34,34c-1.4-0.8-2.9-1.2-4.4-1.2c-2.6,0-4.8,1.3-6.1,3.6l-3.7,6.4  c-1,1.8-1.4,4-0.9,6.1c0.5,2.2,1.8,4,3.7,5.1l4.7,2.6c-0.6,2.7-0.9,5.4-0.9,8.2c0,2.6,0.3,5.3,0.8,7.8L23,75  c-4,2.3-5.3,6.6-3.2,10.3l3.7,6.4c1.5,2.5,4.3,4.2,7.2,4.2c1.3,0,2.6-0.3,3.8-1l4.1-2.4c4.1,3.8,9.1,6.6,14.4,8.2l0,4.3  c0,4.6,3.1,7.9,7.3,7.9h7.4c4.5,0,8.3-3.6,8.3-8l-0.1-4.6c5.3-1.8,10.2-4.7,14.2-8.6L94,94c1.4,0.8,2.9,1.2,4.4,1.2  c2.6,0,4.8-1.3,6.1-3.6l3.7-6.4C109.3,83.5,109.6,81.2,109.1,79.2z M104.8,83.3l-3.7,6.4c-0.7,1.3-1.9,1.6-2.7,1.6  c-0.8,0-1.6-0.2-2.4-0.7l-6.6-3.8l-1.1,1.1c-4.1,4.3-9.3,7.5-15,9.1l-1.5,0.4L72,105c0,2.1-2,3.9-4.3,3.9h-7.4  c-2.4,0-3.3-2.1-3.3-3.9l0-7.3l-1.5-0.4c-5.7-1.5-11-4.5-15.2-8.7l-1.1-1.1l-6.7,3.9c-0.5,0.3-1.1,0.5-1.8,0.5c-1.5,0-3-0.9-3.8-2.2  l-3.7-6.4c-1.2-2.1,0.2-3.9,1.8-4.8l6.8-3.9l-0.4-1.5c-0.7-2.7-1-5.5-1-8.3c0-2.9,0.4-5.8,1.1-8.7l0.4-1.5l-7.4-4.1  c-0.9-0.5-1.5-1.4-1.7-2.5c-0.3-1.1-0.1-2.3,0.5-3.2l3.7-6.4c0.7-1.3,1.9-1.6,2.7-1.6c0.8,0,1.6,0.2,2.4,0.7l7.4,4.3l1.1-1.1  c4.2-4.1,8.8-6.8,14.1-8.3L56,32v-9c0-2.1,2-3.9,4.3-3.9h7.4c2.4,0,3.3,2.1,3.3,4l0.1,8.8l1.5,0.4c5.4,1.4,10.3,4.1,14.3,7.8l1.1,1  l7.6-4.5c0.5-0.3,1.1-0.5,1.8-0.5c1.5,0,3,0.9,3.8,2.2l3.7,6.4c1.2,2.1-0.2,3.9-1.8,4.8l-7.2,4.2l0.5,1.5c0.9,3,1.3,6,1.3,9.5  c0,2.5-0.3,5-0.8,7.4l-0.3,1.4l7,4c0.9,0.5,1.5,1.4,1.7,2.5C105.5,81.2,105.3,82.3,104.8,83.3z"/><path d="M28.7,15.1c0.4,0,0.8-0.1,1.2-0.4c18.2-13,43.3-14.3,63-3.6l-6.4,2.7l20.7,5.6L96.3,0.9L95.4,8C74.2-3.8,47.2-2.5,27.5,11.5  c-0.9,0.6-1.1,1.9-0.5,2.8C27.4,14.8,28.1,15.1,28.7,15.1z"/><path d="M11.2,35.1l2.7,6.4l5.6-20.7L0.9,31.7L8,32.6c-11.8,21.2-10.5,48.2,3.5,67.9c0.4,0.5,1,0.8,1.6,0.8c0.4,0,0.8-0.1,1.2-0.4  c0.9-0.6,1.1-1.9,0.5-2.8C1.8,79.9,0.4,54.9,11.2,35.1z"/><path d="M98.2,113.2c-18.2,13-43.3,14.3-63.1,3.6l6.4-2.7l-20.7-5.6L31.7,127l0.9-7.1c9.6,5.4,20.4,8,31.2,8  c13,0,25.9-3.9,36.7-11.5c0.9-0.6,1.1-1.9,0.5-2.8C100.3,112.8,99.1,112.6,98.2,113.2z"/><path d="M116.5,27.5c-0.6-0.9-1.9-1.1-2.8-0.5c-0.9,0.6-1.1,1.9-0.5,2.8c13,18.2,14.3,43.3,3.6,63l-2.7-6.4l-5.6,20.7l18.5-10.9  l-7.1-0.9C131.8,74.2,130.5,47.2,116.5,27.5z"/></svg>
                    
                    <br>
                    <span class="text-2xl text-grey-dark">{{ equipment.category.name }}</span>
                </h2>
                <p class="text-lg mb-8">
                    <strong>Quantity: </strong>{{ equipment.quantity }}
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <strong>Model: </strong>{{ equipment.model }}
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <strong>Manufacturer: </strong>{{ equipment.manufacturer }}
                </p>
                <div class="flex text-left">
                    <div class="w-1/2">
                        <h4 class="font-medium text-lg">Description:</h4>
                        <p v-html="equipment.description"></p>

                        <h4 class="font-medium text-lg mt-8">Features:</h4>
                        <p v-html="equipment.features"></p>
                    </div>
                    <div class="w-1/2 pl-8">
                        <div class="border border-grey-light bg-white rounded p-4 mb-4">
                            <h4 class="uppercase text-sm mb-3">Institute</h4>
                            <p><strong class="mr-4">Name: </strong>{{ equipment.institutes[0].name }}</p>
                            <p><strong class="mr-4">City: </strong>{{ equipment.institutes[0].city }}</p>
                        </div>
                        <div class="border-b py-2 mb-3 w-full">
                            <strong>Specs:</strong> {{ equipment.specs }}
                        </div>
                        <div class="border-b py-2 mb-3 w-full">
                            <strong>Usage Instructions:</strong> {{ equipment.operation }}
                        </div>
                        <div class="border-b py-2 mb-3 w-full">
                            <strong>Health Problems:</strong> {{ equipment.health_problems }}
                        </div>
                        <div class="border-b py-2 mb-3 w-full">
                            <strong>Machine Rest:</strong> {{ equipment.machine_rest }}
                        </div>

                    </div>
                </div>
            </div>

        </section>
        <div class="py-20">
            <h3 class="text-2xl font-medium text-center mb-16 uppercase">Book equipment</h3>
            <vue-event-calendar 

                :events="equipment.availability">
                <template slot-scope="props">
                    <div v-for="(event, index) in props.showEvents" class="event-item">
                        <!-- In here do whatever you want, make you owner event template -->
                        <div class="wrapper">
                            <h3 class="title">{{ event.from }} - {{ event.to }}</h3>
                            <p class="time">Book this slot</p>
                        </div>
                    </div>
                </template>
            </vue-event-calendar>
        </div>

        <div class="pb-20 text-center">
            <strong class="text-lg mr-3">Need Help?:</strong> 
            <span  class="mr-3">
                <strong>Email: </strong>{{ equipment.institutes[0].email }}
            </span>
            <strong>Phone: </strong>{{ equipment.institutes[0].phone }}
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    props: {
        equipment: { required: true },
    },
    methods: {
        getEquipmentInfo() {
            axios
                .get('/equipments/' + this.equipmentId + '?institute=' + this.instituteId)
                .then(response => this.equipment = response.data)
        }

    }
}
</script>

<style lang="postcss">
    .__vev_calendar-wrapper .events-wrapper .date {
        padding: 5px 0;
        font-size: 20px;
    }
    .__vev_calendar-wrapper .events-wrapper {
        padding: 30px 35px;
    }
</style>

