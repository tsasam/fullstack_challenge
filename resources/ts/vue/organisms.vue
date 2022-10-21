<template>


   <div>

       <h2> Organism list ({{ organisms.length }}) </h2>

       <table class="pure-table pure-table-horizontal">
           <thead>
           <tr>
               <th>Id</th>
               <th>Genus</th>
               <th>Species</th>
           </tr>
           </thead>
           <tbody>
           <tr v-for="organism in organisms" :key="organism.id">
               <td>{{ organism.id }}</td>
               <td>{{ organism.genus }}</td>
               <td>{{ organism.species }}</td>
           </tr>
           </tbody>
       </table>

   </div>


</template>


<style lang="scss" scoped >


</style>


<script lang="ts">


/**
 * Type of the organisms
 */
type OrganismsT = {
    id: number;
    genus: string;
    species: string;
}

import {Vue, Component, Prop, Watch} from 'vue-property-decorator';
import axios from 'axios';
import OrganismVue from "./organism.vue";


@Component({})
export default class OrganismsVue extends Vue {

    organisms: OrganismsT[] = [];

    mounted(){
        // Load the organisms when the component gets mounted
        this.loadOrganisms();
    }

    /**
     * Receive the organisms from the api endpoint (paginated)
     */
    async loadOrganisms(){
        let organismsData = (await axios.get('/api/organisms/')).data.data;

        /**
         * if there is still datas in the call (paginated), we continue to retrieve them
         */
        while(organismsData.next_page_url){
            this.organisms.push(...organismsData)
            organismsData = (await axios.get(organismsData.next_page_url)).data
        }
        this.organisms.push(...organismsData)
    }

}
</script>
