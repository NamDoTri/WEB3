<template>
        <button class="btn btn-primary" @click="disagree" >
                Disagree
        </button>
</template>

<script>
    export default {
        props: ['critId'],

        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            disagree(){
                axios.post('/critic/disagree/' + this.critId)
                    .then(response => {
                        console.log(response.data)
                    })
            }
        }
    }
</script>
