const Person = require('../models/personModel');

/**
 * New Person
 * 
 * @param {Array|Person} req.body - @see PersonModel
 * 
 * @return {Person}
 */
exports.post = async (req, res) => {
    try {
        if (Array.isArray(req.body)) {
            let _person = _created = null;

            Object.values(req.body).forEach(async (person) => {
                _person     = new Person(person);
                _created  = await _person.save();
            });

            res.status(201);
            res.json({ message : "Created", request: req.body });
        } else {
            const person  = new Person(req.body);
            const created = await person.save();

            res.status(201);
            res.json(created);
        }
    } catch (error) {
        res.status(500);
        res.json({ message: "Erreur serveur." })

        console.log(error);
    }
}

/**
 * Get Person by id
 * 
 * @param {Int} req.params.id_person - Person id's 
 * 
 * @return {Person}
 */
exports.getById = async (req, res) => {
    try {
        const person = await Person.findById(req.params.id_person);
        
        res.status(200);
        res.json(person);
    } catch (error) {
        res.status(500);
        res.json({ message: "Erreur serveur." })

        console.log(error);
    }
}

/**
 * Get all Persons
 *  
 *  @return {Array}
 */
exports.get = async (req, res) => {
    try {
        const persons = await Person.find({});

        res.status(200);
        res.json(persons);
    } catch (error) {
        res.status(500);
        res.json({ message: "Erreur serveur." })

        console.log(error);
    }
}

/**
 * Get person by birthday = Date('now')
 *  
 *  @return {Person}
 */
exports.getByBirthdate = async (req, res) => {
    try {
        let persons = await Person.find({});
        const today = new Date();
        const happybirthdays = persons.filter(personne => {
            const [jour, mois] = personne.birthdate.split('/');

            return today.getDate() === parseInt(jour) && today.getMonth() === parseInt(mois) - 1;
        });

        const person_happybirthday = happybirthdays[Math.floor(Math.random() * happybirthdays.length)];

        res.status(200);
        res.json(person_happybirthday);
    } catch (error) {
        res.status(500);
        res.json({ message: "Erreur serveur." })

        console.log(error);
    }
}

/**
 * Update Person
 * 
 * @param {Int} req.params.id_person - Person's id
 * 
 * @return {Person}
 * 
 */
exports.put = async (req, res) => {
    try {
        const updated = await Person.findByIdAndUpdate(req.params.id_person, req.body, { new: true });

        res.status(202);
        res.json(updated);
    } catch (error) {
        res.status(500);
        res.json({ message: "Erreur serveur." })

        console.log(error);
    }
}

/**
 * Delete Person
 * 
 * @param {Int} req.params.id_person - Person's id
 * 
 * @return {Object}
 */
exports.delete = async (req, res) => {
    try {
        await Person.findByIdAndDelete(req.params.id_person);

        res.status(200);
        res.json({message: "Article supprimé"});
    } catch (error) {
        res.status(500);
        res.json({ message: "Erreur serveur." })

        console.log(error);
    }
}