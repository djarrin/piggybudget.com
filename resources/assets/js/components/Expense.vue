<template>
<ul id="expenses">

    <input type="text" name="expense_label_1">
    <label>How much do you pay each month for your {{ expense }}</label>

</ul>
</template>

<script>
    export default {
        data: function()
        		{
        			return {
        				expense: ''
        			}
        		},
        mounted() {
            console.log('Component ready.')
        }
    }
</script>