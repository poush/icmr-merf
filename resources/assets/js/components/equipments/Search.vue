<template>
    <div class="">

        <section class="p-12 bg-white text-center border-b border-grey-lighter" v-show="page == 'equipments'">

            <div class="py-8">
                <h2 class="font-thin text-4xl mb-8">
                    Equipments Repository
                </h2>
                <p class="text-lg">Search for different equipments using thier name and manufacturer</p>
            </div>

        </section>

        <div class="bg-white p-6 flex justify-center" v-show="page == 'equipments'">
            <form class="w-1/2 max-w-sm bg-grey-lighter rounded-full">
                <div class="flex items-center py-2 focus:border-none focus:shadow-none">
                    <input class="appearance-none bg-transparent border-none shadow-none focus:border-none focus:shadow-none text-xl text-center w-full text-grey-darker mr-3 py-1 px-2" type="text" placeholder="Search Equipments" v-model="search" aria-label="Full name">
                </div>
            </form>
        </div>

        <section class="p-20 equipments flex flex-wrap" v-show="page == 'equipments'">
            <equipment-view 
                v-for="equipment in filteredList"
                :equipment="equipment" 
                :key="equipment.id"
                ></equipment-view>

        </section>

        <booking-view 
            v-show="page == 'booking'" 
            :equipment="equipment"
            :equipment-id="selectedEquipment"
            :institute-id="selectedInstitute"
            ></booking-view>
    </div>
</template>

<script>
    import axios from 'axios';
    import EquipmentView from './Equipment';
    import BookingView from './../Booking';

    export default {
        components: {
            'equipment-view': EquipmentView,
            'booking-view': BookingView,
        },
        data () {
            return {
                page: 'equipments',
                search: '',
                equipment: { availability: []} ,
                equipments: [],
                selectedEquipment: null,
                selectedInstitute: null
            }
        },
        watch: {
            async page(val) {
                if (val == 'booking') {
                    await axios
                        .get('/equipments/' + this.selectedEquipment + '?institute=' + this.selectedInstitute)
                        .then(response => this.$parent.equipment = response.data)
                }
            }
        },
        computed: {
            filteredList() {
                return this.equipments.filter(equipment => {
                    return equipment
                        .name
                        .toLowerCase()
                        .includes(this.search.toLowerCase())
                })
            }
        },
        mounted() {
            axios
                .get('/api/equipments')
                .then(response => {
                    this.equipments = response.data;
                });
            console.log('Component mounted.')
        },
        methods: {
            getLabel (item) {
                return item.name
            },
            updateItems (text) {
                axios
                    .get('/api/equipments?query=' + text)
                    .then(response => {
                        this.equipments = response.data;
                    });
                this.equipments = [this.equipment];
            }
        }
    }
</script>


<style lang="scss" scoped>
    .equipments {
        background: #F7F7F7;
    }
</style>
