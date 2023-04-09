const Post = require('../models/postModel');

exports.listAllPosts = async (req, res) => {
    /*
        //* ES5
        Post.find({}, (error, posts) => {
            if (error) {
                res.status(500);
                console.log(error);
                res.json({message: "Erreur serveur."})
            } else {
                res.status(200);
                res.json(posts);
            }
        });

        //* ES6
        Post.find({}).then(posts => {
            res.status(200);
            res.json(posts);
        }).catch(error => {
            res.status(500);
            console.log(error);
            res.json({ message: "Erreur serveur." })
        });
    */

    //* ES6 asyn/await
    try {
        const posts = await Post.find({});
        res.status(200);
        res.json(posts);
    } catch (error) {
        res.status(500);
        console.log(error);
        res.json({ message: "Erreur serveur." })
    }
}

exports.createAPost = async (req, res) => {
    const newPost = new Post(req.body);

    try {
        const post = await newPost.save();
        res.status(201);
        res.json(post);
    } catch (error) {
        res.status(500);
        console.log(error);
        res.json({ message: "Erreur serveur." })
    }
}

exports.getAPost = async (req, res) => {
    try {
        const post = await Post.findById(req.params.id_post);
        res.status(200);
        res.json(post);
    } catch (error) {
        res.status(500);
        console.log(error);
        res.json({ message: "Erreur serveur." })
    }
}

exports.updateAPost = async (req, res) => {
    try {
        const post = await Post.findByIdAndUpdate(req.params.id_post, req.body, {new: true});
        res.status(202);
        res.json(post);
    } catch (error) {
        res.status(500);
        console.log(error);
        res.json({ message: "Erreur serveur." })
    }
}

exports.deleteAPost = async (req, res) => {
    try {
        await Post.findByIdAndDelete(req.params.id_post);
        res.status(200);
        res.json({message: "Article supprimé"});
    } catch (error) {
        res.status(500);
        console.log(error);
        res.json({ message: "Erreur serveur." })
    }
}