<template>
<div class="row">
    <a  :href="route"
        class="col bg-secondary rounded"
        :class="bindClass"
        @mouseover="handleMouseOver"
        @mouseleave="handleMouseLeave"
    >
        <div class="container">
            <div class="row">
                <div class="col text-light">{{ item.first_name }}</div>
                <div class="col text-light">{{ item.last_name }}</div>
                <div class="col text-light">{{ item.email }}</div>
            </div>
        </div>
    </a>
    <a :href="editRoute" class="col-1 btn btn-success">Edit</a>
    <a href="#" class="col-1 btn btn-danger">Delete</a>
</div>
</template>

<script>
export default {
    data() {
        return {
            state: null,
            value: null,
        }
    },
    props: {
        item: {
            type: Object,
        },
    },
    computed: {
        route() {
            return `${this.$attrs.route}/${this.item.id}`;
        },
        editRoute() {
            return `${this.route}/edit`;
        },
        bindClass() {
            return {
                active: this.state === 'active',
            }
        },
    },
    methods: {
        handleMouseOver() {
            this.state = 'active';
            //this.value = null;
        },
        handleMouseLeave() {
            this.state = null;
            this.value = null;
        }
    },
}
</script>
