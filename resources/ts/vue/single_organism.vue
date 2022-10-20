<template>

    <div>

        <table class="pure-table pure-table-horizontal">
            <thead>
            <tr>
                <th>Id</th>
                <th>Genus</th>
                <th>Species</th>
            </tr>
            </thead>
            <tbody>
            <tr>
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


import {Vue, Component, Prop, Watch} from 'vue-property-decorator';
import axios from 'axios';
/**
 * This component shows information about an organism
 */
@Component({})
export default class SingleOrganismVue extends Vue {

}
</script>
