<template>
    <div>
        <div> {{text}} </div>
        <div> {{counter}} </div>
        <div @click="inc" class="btn"> click me </div>
    </div>
</template>

<script>
    export default {
        name: 'example-component',
        data() {
            return {
                text: 'Example Component',
                counter: 0,
            }
        },
        methods: {
            inc() {
                return this.counter++;
            }
        }
    }
</script>
