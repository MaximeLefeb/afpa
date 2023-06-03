const express = require('express');
const router = express.Router();

const citationController = require('../controllers/citationController')

router.route(
    '/'
).get(
    citationController.get //* Get all citations
).post(
    citationController.post //* Create citation
);

router.route(
    '/random'
).get(
    citationController.getRandom //* Get random citation
);

router.route(
    '/:id_citation'
).get(
    citationController.getById //* Get citation by id
).put(
    citationController.put //* Update citation by id
).delete(
    citationController.delete //* Delete citation by id
);

module.exports = router;