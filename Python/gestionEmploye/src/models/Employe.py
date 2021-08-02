from datetime import datetime

class Employe:
    def __init__(self, nom, prenom):
        self.nom = nom
        self.prenom = prenom
        self.embauche = datetime.now().strftime('%d-%m-%Y')

    def __str__(self) -> str:
        return "\n Nom : %s,\n Prenom : %s,\n Embauché le : %s \n" % (self.nom, self.prenom, self.embauche)
