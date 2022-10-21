<template>


   <div>
        <h2> Add New Organism </h2>

        <form class="pure-form pure-form-stacked" @submit.prevent="">
            <fieldset class="pure-group">
                <input
                    type="text"
                    v-model="genus"
                    required
                    placeholder="Genus"
                    class="pure-input-1"
                >
                <input
                    type="text"
                    v-model="species"
                    required
                    placeholder="Species"
                    class="pure-input-1"
                >
            </fieldset>

            <p>{{ msg }}</p>

            <button
                class="pure-button pure-button-primary pure-input-1"
                @click="onClick"
            > Create </button>

        </form>

   </div>


</template>


<style lang="scss" scoped >

</style>


<script lang="ts">

import {Vue, Component, Prop, Watch, Emit} from 'vue-property-decorator';
import axios from 'axios';




@Component({})
export default class NewOrganismVue extends Vue {

    genus = ''
    species = '';
    msg = 'Status';


    /**
     * watcher of form genus
     */
    @Watch('genus')
    onPropertyChangedGenus(value: string) {
        this.checkEmptyGenus(value)
    }
    /**
     * watcher of form species
     */
    @Watch('species')
    onPropertyChangedSpecies(value: string) {
        this.checkEmptySpecies(value)
    }

    @Emit()
    checkEmptyGenus(g: string) {
        if (g == ''){
            this.msg = "Genus field cant be empty";
        }else{
            this.msg = 'Adding new organism';
        }
    }

    @Emit()
    checkEmptySpecies(s: string) {
        if (s == ''){
            this.msg = "Species field cant be empty";
        }else{
            this.msg = 'Adding new organism';
        }
    }


    async onClick(){
        const data = {
            genus: this.genus,
            species: this.species,
        }
        try {
            const response = await axios.post('/api/new-organisms/', data);
            if(response.data.success == false){
                this.msg = response.data.message;
            }else{
                this.msg = 'New organism added';
            }
        } catch (e){
            if (axios.isAxiosError(e) && e.response) {
                this.msg = e.response.data.error;
            } else {
                this.msg = 'Other error'
            }

        }
    }

}
</script>
