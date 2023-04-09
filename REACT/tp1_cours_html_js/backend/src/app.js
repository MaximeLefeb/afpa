const express  = require('express');
const hostname = '0.0.0.0';
const port     = 3000;
const server   = express();
const cors     = require('cors');
const mongoose = require('mongoose');

server.use(cors());

mongoose.connect('mongodb://mongo/apinodepmn');

server.use(express.urlencoded());
server.use(express.json());

//* Routes
//* Post
const postRoute = require('./api/routes/postRoute');
server.use('/posts', postRoute);

//* Commentaires
const commentRoute = require('./api/routes/commentRoute');
server.use('/', commentRoute);

//* Server start
server.listen(port, hostname);