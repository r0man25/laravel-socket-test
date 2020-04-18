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
        props: ['room'],
        data: function () {
            return {
                messagesData: [],
                message: ''
            }
        },
        mounted() {
            Echo.private('echo-room.' + this.room.id)
                .listen('EchoPrivateMessageEvent', ({data}) => {
                    this.messagesData.push(data.message);
                });
        },
        methods: {
            sendMessage: function () {
                axios({
                    method: 'post',
                    url: '/realtime/echo-server/send-private-message',
                    params: {
                        message: this.message,
                        room_id: this.room.id
                    }
                }).then((response) => {
                    this.messagesData.push(this.message);
                    this.message = '';
                })
            }
        }
    }
</script>
