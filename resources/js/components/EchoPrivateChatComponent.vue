<template>
    <div class="container">
        <hr>
        <div class="row">
            <div class="col-md-12">
                <textarea rows="10" readonly class="form-control">{{messagesData.join('\n')}}</textarea>
                <hr>
                <input type="text" class="form-control" placeholder="Enter message..." v-model="message"
                       @keyup.enter="sendMessage" @keydown="actionWriteMessage">
                <spn v-if="isActive">{{isActive.userName}} write message...</spn>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['room', 'authUser'],
        data: function () {
            return {
                messagesData: [],
                message: '',
                isActive: false,
                typingTimer: false,
            }
        },
        computed: {
            channel() {
                return Echo.private('echo-room.' + this.room.id);
            }
        },
        mounted() {
            this.channel
                .listen('EchoPrivateMessageEvent', ({data}) => {
                    this.messagesData.push(data.message);
                    this.isActive = false;
                })
                .listenForWhisper('typing', (e) => {
                    this.isActive = e;

                    if (this.typingTimer) {
                        clearTimeout(this.typingTimer);
                    }

                    this.typingTimer = setTimeout(() => {
                        this.isActive = false;
                    }, 2000);
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
            },
            actionWriteMessage: function () {
                this.channel
                    .whisper('typing', {
                        userName: this.authUser.name
                    })
            }
        }
    }
</script>
