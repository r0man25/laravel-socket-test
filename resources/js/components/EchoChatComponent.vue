<template>
    <div class="container">
        <hr>
        <div class="row">
            <div class="col-md-12">
                <textarea rows="10" readonly class="form-control">{{messagesData.join('\n')}}</textarea>
                <hr>
                <input type="text" class="form-control" placeholder="Enter message..." v-model="message"
                       @keyup.enter="sendMessage">
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
            Echo.channel('echo-chat')
                .listen('EchoMessageEvent', ({message}) => {
                    this.messagesData.push(message);
                });
        },
        methods: {
            sendMessage: function () {
                axios({
                    method: 'post',
                    url: '/realtime/echo-server/send-message',
                    params: {
                        message: this.message
                    }
                }).then((response) => {
                    this.messagesData.push(this.message);
                    this.message = '';
                })
            }
        }
    }
</script>
