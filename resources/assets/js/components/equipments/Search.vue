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
                <div class="flex items-center py-2 focus:border-none focus:shadow-none relative">
                    <input class="appearance-none bg-transparent border-none shadow-none focus:border-none focus:shadow-none text-xl text-center w-full text-grey-darker mr-3 py-1 px-2" type="text" placeholder="Search Equipments" v-model="search" aria-label="search">

                    <div class="absolute pin-r pin-t mt-4 mr-4 text-purple-lighter">
  	                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/" version="1.1" width="20px" height="20px" viewBox="0 0 32 40" overflow="visible" enable-background="new 0 0 32 32" xml:space="preserve"><path d="M31.414,28.586l-7.923-7.934c1.57-2.148,2.507-4.788,2.507-7.652c0-7.18-5.819-13-12.999-13  C5.82,0,0,5.82,0,13s5.82,13,12.999,13c2.871,0,5.515-0.941,7.666-2.518l7.92,7.932c0.781,0.781,2.047,0.781,2.828,0  S32.195,29.367,31.414,28.586z M4,13c0-4.971,4.029-9,8.999-9c4.971,0,9,4.029,9,9s-4.029,9-9,9C8.029,22,4,17.971,4,13z"/></svg>

                    </div>
                </div>
            </form>
        </div>

         <!-- style="border-left: 4px solid #e2624b !important;" -->

        <section class="flex p-20 items-start flex flex-wrap">
            <div class="w-1/5">
                <div class="bg-white pt-6 mb-8">
                    <div class="uppercase font-bold tracking-wide text-c2 mb-2 px-6">Categories</div>
                    <div 
                        class="flex hover:bg-grey-lighter px-6 cursor-pointer border-b py-2 text-lg text-grey-darkest"
                        v-on:click="selectCategory(null)"
                        v-bind:class="{ 'border-l-4 border-blue-dark' : filterByCategory == null }">
                        All Categories
                    </div>
                    <div 
                        class="flex hover:bg-grey-lighter px-6 cursor-pointer border-b py-2 text-lg text-grey-darkest" 
                        v-for="category in categories" 
                        v-on:click="selectCategory(category.id)"
                        v-bind:class="{ 'border-l-4 border-blue-dark' : category.id == filterByCategory }">
                        {{ category.name }}
                    </div>
                </div>

                <div class="bg-white pt-6 mb-8">
                    <div class="uppercase font-bold tracking-wide text-c2 mb-2 px-6">Institutes</div>
                    <div 
                        class="flex hover:bg-grey-lighter px-6 cursor-pointer border-b py-2 text-lg text-grey-darkest"
                        v-on:click="selectInstitute(null)"
                        v-bind:class="{ 'border-l-4 border-blue-dark' : filterByInstitute == null }">
                        All Institutes
                    </div>
                    <div 
                        class="flex hover:bg-grey-lighter px-6 cursor-pointer border-b py-2 text-lg text-grey-darkest" 
                        v-for="institute in institutes"
                        v-on:click="selectInstitute(institute.id)"
                        v-bind:class="{ 'border-l-4 border-blue-dark' : institute.id == filterByInstitute }">
                        {{ institute.name }}
                    </div>
                </div>
            </div>

            <div class="w-4/5 pl-8 equipments flex flex-wrap items-start" v-show="page == 'equipments'">
            <paginate name="filteredList" :list="filteredList" class="flex flex-wrap items-start" :per="40">
                <equipment-view 
                    v-for="equipment in paginated('filteredList')"
                    :equipment="equipment" 
                    :key="equipment.id"
                    ></equipment-view>
            </paginate>
            </div>
            <paginate-links for="filteredList" class="flex flex-wrap mx-auto list-reset" :show-step-links="true"></paginate-links>    
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
import axios from "axios";
import EquipmentView from "./Equipment";
import BookingView from "./../Booking";

export default {
  props: {
    categories: { required: true },
    institutes: { required: true }
  },
  components: {
    "equipment-view": EquipmentView,
    "booking-view": BookingView
  },
  data() {
    return {
      page: "equipments",
      search: "",
      equipment: { availability: [] },
      equipments: [],
      selectedEquipment: null,
      selectedInstitute: null,
      filterByCategory: null,
      filterByInstitute: null,
      paginate: ["filteredList"]
    };
  },
  watch: {
    async page(val) {
      if (val == "booking") {
        await axios
          .get(
            "/equipments/" +
              this.selectedEquipment +
              "?institute=" +
              this.selectedInstitute
          )
          .then(response => (this.$parent.equipment = response.data));
      }
    }
  },
  computed: {
    filteredList() {
      return this.equipments
        .filter(equipment => {
          return equipment.name
            .toLowerCase()
            .includes(this.search.toLowerCase());
        })
        .filter(equipment => {
          if (this.filterByCategory) {
            return equipment.category_id == this.filterByCategory;
          }
          return true;
        })
        .filter(equipment => {
          if (this.filterByInstitute) {
            for (const index in equipment.institutes) {
              if (equipment.institutes[index].id == this.filterByInstitute) {
                return true;
              }
            }
            return false;
          }
          return true;
        });
    }
  },
  mounted() {
    axios.get("/api/equipments").then(response => {
      this.equipments = response.data;
    });
    console.log("Component mounted.");
  },
  methods: {
    getLabel(item) {
      return item.name;
    },
    selectCategory(categoryId) {
      this.filterByCategory = categoryId;
    },
    selectInstitute(instituteId) {
      this.filterByInstitute = instituteId;
    },
    updateItems(text) {
      axios.get("/api/equipments?query=" + text).then(response => {
        this.equipments = response.data;
      });
      this.equipments = [this.equipment];
    }
  }
};
</script>


<style lang="scss" >
.equipments {
  background: #f7f7f7;
}
.number {
    margin-left: 10px;
    margin-right: 10px;
    cursor: pointer;
}
</style>
