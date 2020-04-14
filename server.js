const http = require('http');

const server = http.createServer((request, response) => {
    response.setHeader('Access-Control-Allow-Origin', '*');
    response.setHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    response.setHeader('Access-Control-Allow-Headers', 'X-Requested-With, content-type, Authorization');
    response.end('Hello Node.js Server!');
});

const io = require('socket.io')(server);
const Redis = require('ioredis');

let redis = new Redis({
    port: 6379, // Redis port
    host: "redis", // Redis host
});
redis.subscribe('broadcast-chart-updated', function (err, count) {
    console.log('subscribe on broadcast-chart-updated');
}).catch();
redis.on("message", function (chanel, message) {
    console.log("Chanel --- " + chanel);
    console.log("Message --- " + message);
    message = JSON.parse(message);
    io.emit(chanel + ':' + message.event, message.data);
});

server.listen(3000, function () {
    console.log('Listening on Port: 3000');
});
