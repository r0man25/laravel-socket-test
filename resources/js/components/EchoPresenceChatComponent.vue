<template>
    <div class="container">
        <hr>
        <div class="row">
            <div class="col-md-8">
                <textarea rows="10" readonly class="form-control">{{messagesData.join('\n')}}</textarea>
                <hr>
                <input type="text" class="form-control" placeholder="Enter message..." v-model="message"
                       @keyup.enter="sendMessage" @keydown="actionWriteMessage">
                <span v-if="isActive">{{isActive.userName}} write message...</span>
            </div>
            <div class="col-md-4">
                <ul>
                    <li v-for="user in activeUsers">{{user.name}}</li>
                </ul>
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
                activeUsers: []
            }
        },
        computed: {
            channel() {
                return Echo.join('echo-presence-room.' + this.room.id);
            }
        },
        mounted() {
            this.channel
                .here((users) => {
                    this.activeUsers = users;
                })
                .joining((user) => {
                    this.activeUsers.push(user);
                })
                .leaving((user) => {
                    this.activeUsers.splice(this.activeUsers.indexOf(user), 1);
                })
                .listen('EchoPresenceMessageEvent', ({data}) => {
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
                    url: '/realtime/echo-server/send-private-message-presence',
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
