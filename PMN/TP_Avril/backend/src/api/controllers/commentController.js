const Comment = require('../models/commentModel');
const Post    = require('../models/postModel');

exports.listAllComments = async (req, res) => {
    try {
        const comments = await Comment.find({post_id: req.params.id_post});
        res.status(200);
        res.json(comments);
    } catch (error) {
        res.status(500);
        console.log(error);
        res.json({ message: "Erreur serveur." })
    }
}

exports.createAComment = async (req, res) => {
    try {
        const post       = await Post.findById(req.params.id_post);
        const newComment = new Comment({ ...req.body, post_id: req.params.id_post });

        try {
            const comment = await newComment.save();
            res.status(201);
            res.json(comment);
        } catch (error) {
            res.status(500);
            console.log(error);
            res.json({ message: "Erreur serveur." })
        }
    } catch (error) {
        res.status(500);
        console.log(error);
        res.json({ message: "Erreur serveur." })
    }
}

exports.getAComment = async (req, res) => {
    try {
        const comment = await Comment.findById(req.params.id_comment);
        res.status(200);
        res.json(comment);
    } catch (error) {
        res.status(500);
        console.log(error);
        res.json({ message: "Erreur serveur." })
    }
}

exports.updateAComment = async (req, res) => {
    try {
        const comment = await Comment.findByIdAndUpdate(req.params.id_comment, req.body, {new: true});
        res.status(200);
        res.json(comment);
    } catch (error) {
        res.status(500);
        console.log(error);
        res.json({ message: "Erreur serveur." })
    }
}

exports.deleteAComment = async (req, res) => {
    try {
        await Comment.findByIdAndDelete(req.params.id_comment);
        res.status(200);
        res.json({message: "Commentaire supprimé"});
    } catch (error) {
        res.status(500);
        console.log(error);
        res.json({ message: "Erreur serveur." })
    }
}