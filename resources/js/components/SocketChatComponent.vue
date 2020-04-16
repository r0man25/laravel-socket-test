<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="form-group">
                    <textarea rows="10" class="form-control">{{messagesData.join('\n')}}</textarea>
                </div>
                <div class="input-group mb3">
                    <input type="text" class="form-control" placeholder="Enter message..." v-model="message">
                    <div class="input-group-append">
                        <button @click="sendMessage" class="btn btn-outline-secondary">Send</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                messagesData: [],
                message: ''
            }
        },
        mounted() {
            console.log('Component chart line SOCKET mounted.');
            let socket = io('http://127.0.0.1:3001');

            socket.on("new-message:App\\Events\\NewMessageEvent", (data) => {
                console.log('Catch socket event new-message:App\\Events\\NewMessageEvent');
                this.messagesData.push(data.message);
            });
        },
        methods: {
            sendMessage: function () {
                axios({
                    method: 'get',
                    url: '/realtime/send-message',
                    params: {
                        message: this.message
                    }
                }).then((response) => {
                    this.message = '';
                })
            }
        }
    }
</script>
