<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <line-chart :chart-data="data" :height="200" :options="{responsive: true, maintainAspectRatio: true}"></line-chart>
                <input type="checkbox" v-model="realtime"> realtime
                <input type="text" v-model="label">
                <input type="text" v-model="sale">
                <button @click="sendData" class="btn btn-success text m-1 mh-100">Update</button>
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
                data: [],
                realtime: false,
                label: '',
                sale: 50
            }
        },
        mounted() {
            console.log('Component chart line SOCKET mounted.');
            let socket = io('http://127.0.0.1:3001');

            socket.on("broadcast-chart-updated:App\\Events\\SocketChartChangedEvent", (data) => {
                console.log('Catch socket event broadcast-chart-updated:App\\Events\\SocketChartChangedEvent');
                this.data = data.result;
            });
        },
        methods: {
            sendData: function () {
                axios({
                    method: 'get',
                    url: '/realtime/socket-chart',
                    params: {
                        label: this.label, sale: this.sale, realtime: this.realtime
                    }
                }).then((response) => {
                    this.data = response.data;
                })
            }
        }
    }
</script>
