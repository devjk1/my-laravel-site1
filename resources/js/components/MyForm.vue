<template>
<form @submit.prevent="onSubmit">
    <div class="row">
        <div class="col-12 form-group" :class="{ 'form-group--error': $v.formData.name.$error }">
            <label class="col-form-label col-form-label-lg form__label">
                Name
            </label>
            <input
                type="text"
                v-model.trim="$v.formData.name.$model"
                class="form-control form-control-lg form__input"
            >
            <div class="error" v-if="!$v.formData.name.required && $v.formData.name.$dirty">
                Field is required
            </div>
            <div class="error" v-if="!$v.formData.name.minLength">
                Name must have at least {{ $v.formData.name.$params.minLength.min }} letters.
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 form-group text-center">
            <button type="submit" class="btn btn-lg col-4 bg-info">Sign up</button>
        </div>
    </div>
</form>
</template>

<script>
import { required, minLength } from "vuelidate/lib/validators";

export default {
    data() {
        return {
            formData: {
                name: "",
            },
        }
    },
    props: {
        route: {
            type: String,
            required: true
        },
    },
    validations: {
        formData: {
            name: {
                required,
                minLength: minLength(4),
            }
        }
    },
    methods: {
        onSubmit() {
            axios
                .post(this.route, this.formData);
        },
    },
}
</script>

<style scoped>
.form-control:focus {
    color: #495057;
    background-color: #fff;
    border-color: #a1cbef;
    outline: 0;
    box-shadow: 0 0 0 0 rgba(52, 144, 220, 0.25);
}

.form-group--error .form__label,
.form-group--error .error {
    color: #f04124;
}

.form-group--error .form__input {
    border-color: #f79483;
}
</style>
