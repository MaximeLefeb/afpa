const Citation = require('../models/citationModel');

/**
 * New citation
 * 
 * @param {Array|Citation} req.body - @see CitationModel
 * 
 * @return {Citation}
 */
exports.post = async (req, res) => {
    try {
        if (Array.isArray(req.body)) {
            let _citation = _created = null;

            Object.values(req.body).forEach(async (citation) => {
                _citation = new Citation(citation);
                _created  = await _citation.save();
            });

            res.status(201);
            res.json({ message : "Created", request: req.body });
        } else {
            const citation = new Citation(req.body);
            const created = await citation.save();

            res.status(201);
            res.json(created);
        }
    } catch (error) {
        res.status(500);
        res.json({ message: "Erreur serveur.", req: req.body, reqs: Array.isArray(req.body) })

        console.log(error);
    }
}

/**
 * Get citation by id
 * 
 * @param {Int} req.params.id_citation - Citation id's 
 * 
 * @return {Citation}
 */
exports.getById = async (req, res) => {
    try {
        const citation = await Citation.findById(req.params.id_citation);
        
        res.status(200);
        res.json(citation);
    } catch (error) {
        res.status(500);
        res.json({ message: "Erreur serveur." })

        console.log(error);
    }
}

/**
 * Get all citations
 *  
 *  @return {Array}
 */
exports.get = async (req, res) => {
    try {
        const citations = await Citation.find({});

        res.status(200);
        res.json(citations);
    } catch (error) {
        res.status(500);
        res.json({ message: "Erreur serveur." })

        console.log(error);
    }
}

/**
 * Get citation randomly
 *  
 *  @return {Citation}
 */
exports.getRandom = async (req, res) => {
    try {
        const citations = await Citation.find({});
        const citation = citations[Math.floor(Math.random() * citations.length)];

        res.status(200);
        res.json(citation);
    } catch (error) {
        res.status(500);
        res.json({ message: "Erreur serveur." })

        console.log(error);
    }
}

/**
 * Update citation
 * 
 * @param {Int} req.params.id_citation - Citation's id
 * 
 * @return {Citation}
 * 
 */
exports.put = async (req, res) => {
    try {
        const updated = await Citation.findByIdAndUpdate(req.params.id_citation, req.body, { new: true });

        res.status(202);
        res.json(updated);
    } catch (error) {
        res.status(500);
        res.json({ message: "Erreur serveur." })

        console.log(error);
    }
}

/**
 * Delete citation
 * 
 * @param {Int} req.params.id_citation - Citation's id
 * 
 * @return {Object}
 */
exports.delete = async (req, res) => {
    try {
        await Citation.findByIdAndDelete(req.params.id_citation);

        res.status(200);
        res.json({message: "Article supprimé"});
    } catch (error) {
        res.status(500);
        res.json({ message: "Erreur serveur." })

        console.log(error);
    }
}