const mongoose = require('mongoose');
const Schema = mongoose.Schema;

let personSchema = new Schema({
    name: {
        type: String,
        required: true
    },
    birthdate: {
        type: String,
        required: true
    }
});

module.exports = mongoose.model('Person', personSchema);