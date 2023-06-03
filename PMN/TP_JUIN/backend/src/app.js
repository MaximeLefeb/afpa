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
const personRoute = require('./api/routes/personRoute');
server.use('/person', personRoute);

const citationRoute = require('./api/routes/citationRoute');
server.use('/citation', citationRoute);

//* Server start
server.listen(port, hostname);