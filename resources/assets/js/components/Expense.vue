<template>
 <ul id="expenses">

                                <input type="text" name="expense_label_1" v-model="expense">
                                <label for="expense-1">How much do you pay each month for your @{{ expense }}</label>

                        </ul>
</template>

<script>
    export default {
        mounted() {
            console.log('Component ready.')
        }
    }
</script>