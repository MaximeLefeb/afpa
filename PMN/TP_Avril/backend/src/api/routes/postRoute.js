const express = require('express');
const router = express.Router();

const postController = require('../controllers/postController')

router.route(
    '/'
).get(
    postController.listAllPosts
).post(
    postController.createAPost
);

router.route(
    '/:id_post'
).get(
    postController.getAPost
).put(
    postController.updateAPost
).delete(
    postController.deleteAPost
);

module.exports = router;