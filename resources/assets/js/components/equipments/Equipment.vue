<template>
    <div class="w-1/4 pr-6 pb-6">
        <div class="bg-white">
            <div class="px-6 pt-6">
                <h3 class="font-light mb-4">{{equipment.name}}</h3>
                <p class="mb-4"><strong>Model:</strong> {{ equipment.model }}</p>
                <p class="mb-4"><strong>Manufaturer:</strong> {{ equipment.manufacturer }}</p>
            </div>

            <div class="border-b border-grey-light pb-3">
                <a href="javascript:void(0)" class="block no-underline px-6" @click="toggleModal">
                    Select Institute
                    <span class="float-right text-lg">&#10597;</span>
                </a>
            </div>
            <institute-select :modal="modal" :equipment="equipment"></institute-select>    
            <!-- <ul class="list-reset" v-show="toggle">
                <li class="px-6 pt-4 py-2 uppercase font-bold text-sm">Institutes</li>
                <li 
                    class="px-6 py-3 border-b border-grey-light hover:bg-grey-lightest" 
                    v-for="institute in equipment.institutes">
                    <span class="float-right cursor-pointer bg-grey-light rounded-full mt-3 px-2 py-1 text-xs" v-on:click="bookEquipment(equipment, institute)">Book</span>
                    {{ institute.name }}<br>
                    <span class="text-sm text-grey-dark">{{ institute.city }}</span>
                </li>
            </ul> -->

        </div>
    </div>
</template>

<script>
function sleep(time) {
  return new Promise(resolve => setTimeout(resolve, time));
}

export default {
  props: {
    equipment: { required: true }
  },
  data() {
    return {
      toggle: false,
      modal: false
    };
  },
  methods: {
    bookEquipment(equipment, institute) {
      window.location.href =
        "/equipments/" + equipment.id + "?institute=" + institute.id;
      // this.$parent.selectedEquipment = equipment.id
      // this.$parent.selectedInstitute = institute.id
      // this.$parent.page = 'booking'
    },
    toggleModal() {
      this.modal = !this.modal;
    }
  }
};
</script>

