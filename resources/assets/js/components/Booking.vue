<template>
    <div>
        <section class="p-12 bg-white text-center border-b border-grey-lighter">

            <div class="py-8">
                <h2 class="font-thin text-4xl mb-8">
                    {{ equipment.name }}
                </h2>
                <p class="text-lg">
                    <strong>Model: </strong>{{ equipment.model }}
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <strong>Manufacturer: </strong>{{ equipment.manufacturer }}
                </p>
            </div>

        </section>
        <div class="py-20">
            <vue-event-calendar 

                :events="equipment.availability">
                <template slot-scope="props">
                    <div v-for="(event, index) in props.showEvents" class="event-item">
                        <!-- In here do whatever you want, make you owner event template -->
                        <div class="wrapper">
                            <h3 class="title">{{ event.from }} - {{ event.to }}</h3>
                            <p class="time">Add to cart</p>
                        </div>
                    </div>
                </template>
            </vue-event-calendar>
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

