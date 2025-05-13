const app = require("express")();   
const server = require("http").createServer(app);
const io = require("socket.io")(server);

io.on("connection", (socket) => {
    console.log("user connected");
    socket.on("disconnect", () => {
        console.log("user disconnected");
    });
    socket.on("join room", (room) => {
        socket.join(room);
    });
    socket.on("send message", (msg, room) => {
        console.log(msg);
        socket.to(room).emit("receive message", msg);
    });
});

server.listen(5000, () => {
    console.log(`Server is running on port 5000.`);
});