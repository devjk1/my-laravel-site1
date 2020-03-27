<template>
<div class="container">
    <admin-table-item
        v-for="(item, index) in tableData"
        :key="index"
        :item="item"
        v-bind="$attrs"
    >
    </admin-table-item>
</div>

<!-- <ul class="list-group">
    <admin-table-item
        v-for="(item, index) in tableData"
        :key="index"
        :item="item"
        v-bind="$attrs"
    >
    </admin-table-item>
</ul> -->
</template>

<script>
import AdminTableItem from "./AdminTableItem";

export default {
    components: {
        AdminTableItem,
    },
    data() {
        return {

        }
    },
    props: {
        tableData: {
            type: Array,
        },
    },
}
</script>
