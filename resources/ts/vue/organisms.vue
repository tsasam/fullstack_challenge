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
           <tr v-for="organism of organisms" :key="organism.id">
               <td>{{ organism.id }}</td>
               <td>{{ organism.genus }}</td>
               <td>{{ organism.species }}</td>
               <td></td>
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


@Component({})
export default class OrganismsVue extends Vue {

    organisms: OrganismsT[] = [];

    mounted(){
        // Load the organisms when the component gets mounted
        this.loadOrganisms();
    }

    /**
     * Receive the organisms from the api endpoint
     */
    async loadOrganisms(){
        this.organisms = (await axios.get('/api/organisms/')).data.data;
    }

}
</script>
