<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row form-group">
                    <div class="col-4">
                        <select multiple="" class="form-control" v-model="usersList">
                            <option v-for="user in users" :value="'private-message.user.'+user.id">{{user.email}}</option>
                        </select>
                    </div>
                    <div class="col-8">
                        <textarea rows="10" readonly class="form-control">{{messagesData.join('\n')}}</textarea>
                    </div>
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
                message: '',
                usersList: [],
            }
        },
        props: [
            "users", "authUser"
        ],
        mounted() {
            let socket = io('http://127.0.0.1:3001');

            socket.on("private-message.user."+this.authUser.id+":App\\Events\\NewPrivateMessageEvent", (data) => {
                this.messagesData.push(data.data.user + ': ' + data.data.message);
            });

            socket.on("private-message.user.:App\\Events\\NewPrivateMessageEvent", (data) => {
                this.messagesData.push(data.data.user + ': ' + data.data.message);
            });
        },
        methods: {
            sendMessage: function () {
                if (! this.usersList.length) {
                    this.usersList.push('private-message.user.');
                }

                axios({
                    method: 'get',
                    url: '/realtime/send-private-message',
                    params: {
                        message: this.message,
                        channels: this.usersList,
                        user: this.authUser.email
                    }
                }).then((response) => {
                    if (this.usersList[0] !== 'private-message.user.') {
                        this.messagesData.push(this.authUser.email + ': ' +this.message);
                    }
                    this.message = '';
                })
            }
        }
    }
</script>
