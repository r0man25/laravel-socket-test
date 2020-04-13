<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <line-chart :chart-data="data" :height="300" :options="{responsive: true, maintainAspectRatio: true}"></line-chart>
            </div>
        </div>
    </div>
</template>

<script>
    import LineChart from "./LineChart";

    export default {
        components: {
            LineChart
        },
        data: function () {
            return {
                data: []
            }
        },
        mounted() {
            console.log('Component chart line mounted.')
            this.update();
        },
        methods: {
            update: function () {
                axios.get('/get-chart-data').then((response) => {
                    console.log(response);
                    this.data = response.data;
                })
            }
        }
    }
</script>
