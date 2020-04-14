<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <button v-on:click="update" class="btn btn-primary mb-1 mt-5 pr-3" v-if="!isRefresh">Update - {{counter}}...</button>
                <span class="badge badge-success mb-1" v-if="isRefresh">Updating ...</span>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Url</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="url in urlData">
                            <td>{{url.title}}</td>
                            <td><a :href="url.url">{{url.url}}</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                urlData: [],
                isRefresh: false,
                counter: 0
            };
        },
        mounted() {
            // this.update()
        },
        methods: {
            update: function () {
                this.isRefresh = true;
                axios.get('/get-url-data').then((response) => {
                    this.urlData = response.data;
                    this.isRefresh = false;
                    this.counter++;
                })
            }
        }
    }
</script>
