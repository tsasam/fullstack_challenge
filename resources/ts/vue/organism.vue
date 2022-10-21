<template>
    <div>
        <table class="pure-table pure-table-horizontal">
            <thead>
            <tr>
                <th>Genus</th>
                <th>Species</th>
            </tr>
            </thead>
            <tbody>
            <tr>
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

/**
 * This component shows information about an organism
 */
@Component({})
export default class OrganismVue extends Vue {
    @Prop(String) organism: string | undefined
}
</script>
