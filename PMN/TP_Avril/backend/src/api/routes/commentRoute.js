const express = require('express');
const router  = express.Router();
const commentController = require('../controllers/commentController')

router.route(
    '/posts/:id_post/comments'
).get(
    commentController.listAllComments
).post(
    commentController.createAComment
);

router.route(
    '/comments/:id_comment'
).get(
    commentController.getAComment
).put(
    commentController.updateAComment
).delete(
    commentController.deleteAComment
);

module.exports = router;