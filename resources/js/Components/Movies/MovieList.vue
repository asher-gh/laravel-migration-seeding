<template>
    <div class="alert alert-info">
        Message: {{ message }}
    </div>
</template>

<script>
export default {
    name: 'MovieList',
    data() {
        return {
            message: 'Hi'
        }
    },
    mounted() {
        alert('hi');
    }
}
</script>
