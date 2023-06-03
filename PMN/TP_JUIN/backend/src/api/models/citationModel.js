const mongoose = require('mongoose');
const Schema = mongoose.Schema;

let citationSchema = new Schema({
    author: {
        type: String,
        required: true
    },
    citation: {
        type: String,
        required: true
    }
});

module.exports = mongoose.model('Citation', citationSchema);