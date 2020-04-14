<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <pie-chart :chart-data="data" :height="300" :options="{responsive: true, maintainAspectRatio: true}"></pie-chart>
            </div>
        </div>
    </div>
</template>

<script>
    import PieChart from "./PieChart";

    export default {
        components: {
            PieChart
        },
        data: function () {
            return {
                data: []
            }
        },
        mounted() {
            console.log('Component chart pie mounted.')
            this.update();
        },
        methods: {
            update: function () {
                axios.get('/get-chart-data').then((response) => {
                    this.data = response.data;
                })
            }
        }
    }
</script>
