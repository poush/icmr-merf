<script>
export default {
   props:['modal','institutes','equipment'], 
   data(){
       return {
           showModal: this.modal,
           toggle: true
       }
  },
  methods: {
    toggleModal() {
      this.modal = !this.modal
    },
      bookEquipment(equipment, institute) {
      window.location.href =
        "/equipments/" + equipment.id + "?institute=" + institute.id;
      // this.$parent.selectedEquipment = equipment.id
      // this.$parent.selectedInstitute = institute.id
      // this.$parent.page = 'booking'
    }
  },
  watch:{
      showModal: function(){
          this.showModal = this.modal;
      }
  }
};
</script>
<template>
<div v-if="modal" @click.self="toggleModal" class="animated fadeIn fixed z-50 pin overflow-auto bg-smoke-dark flex">
      <div class="animated fadeInUp fixed shadow-inner max-w-md md:relative pin-b pin-x align-top m-auto justify-end md:justify-center p-8 bg-white md:rounded w-full md:h-auto md:shadow flex flex-col">
        <p class="text-xl leading-normal mb-8 text-center">
         Select Institute
        </p>
        <div class="inline-flex justify-center">
            <ul class="list-reset">
                <li class="px-6 pt-4 py-2 uppercase font-bold text-sm">Institutes</li>
                <li 
                    class="px-6 py-3 border-b border-grey-light hover:bg-grey-lightest" 
                    v-for="institute in equipment.institutes">
                    <span class="float-right cursor-pointer bg-grey-light rounded-full mt-3 px-2 py-1 text-xs" v-on:click="bookEquipment(equipment, institute)">Book</span>
                    {{ institute.name }}<br>
                    <span class="text-sm text-grey-dark">{{ institute.city }}</span>
                </li>
            </ul>
        </div>
        <span @click="toggleModal" class="absolute pin-t pin-r pt-4 px-4">
                        <svg class="h-12 w-12 text-grey hover:text-grey-darkest" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
        </span>
      </div>
    </div>
</template>
