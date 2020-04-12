<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
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
        props: [
            'urlData'
        ],
        mounted() {
            this.update()
        },
        methods: {
            update: function () {
                console.log(this.urlData);
            }
        }
    }
</script>
