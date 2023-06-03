const express = require('express');
const router = express.Router();

const personController = require('../controllers/personController');

router.route(
    '/'
).get(
    personController.get //* Get all persons
).post(
    personController.post //* Create person
);

router.route(
    '/birthdate'
).get(
    personController.getByBirthdate //* Get random person by birthdate
);

router.route(
    '/:id_person'
).get(
    personController.getById //* Get person by id
).put(
    personController.put //* Update person by id
).delete(
    personController.delete //* Delete person by id
);

module.exports = router;