<template>
        <button class="btn btn-primary" @click="agree" >
                Agree
        </button>
</template>

<script>
    export default {
        props: ['critId'],

        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            agree(){
                axios.post('/critic/agree/' + this.critId)
                    .then(response => {
                        console.log(response.data)
                        window.location.reload();
                    })
            }
        }
    }
</script>
