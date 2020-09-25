class Utilisateur:
    nom = "TestNom"
    prenom = "Test"
    statut = "Inscrit"
    age = 20

    def fontionTest(self):
        print "fonctionTest"

Maxime = Utilisateur()

print Utilisateur.prenom
print Utilisateur.nom

Maxime.statut = "Admin"

def ecrire():
    print "bonjour"

ecrire()
print Maxime.age
print Maxime.statut
Maxime.fontionTest()
