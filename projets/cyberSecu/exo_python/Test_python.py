#!/user/env/python7
#-*-encoding:utf-8-*-
import math
#math est un module contenant des formules mathématique il existe des milliers de module
#on les importe simplement avec le mot-clé "import" suivi du nom du module. Pour acceder au fonctions
#il faut taper le nom du module suivi d'un point puis le nom de la fonction avec un argument choisie
#la fonction help permet de voir les fontions du module (help("math")) on help("la_fonction_du_module").
#(Se renseigner sur FROM et AS pour les importation de modules)

a = 2

if a > 1:
    print("A est supérieur à 1")
elif a == 1:
    print("A est égal à 1")
else:
    print("A est inférieur à 1")

#Il arrive souvent que nos conditions doivent tester plusieurs prédicats,
#par exemple quand on cherche à vérifier si une variable quelconque de type entier,
#se trouve dans un intervalle précis (comprise entre deux nombres) mot-clé "AND".
if a <= 2 and a >= 0:
    print("A est dans l'intervalle.")
else:
    print("A n'est pas dans l'intervalle.")

#On peut également utiliser le mot-clé "OR".
#Il existe aussi un mot-clé "NOT" qui revient à dire n'est pas, exemple;
majeur = False

if majeur is not True:
    print("vous n'êtes pas encore majeur.")

#la fonction input() demande une entrée texte on peut y ranger son contenue dans une variable
annee = input("Saisissez une année : ")
print(annee, type(annee))

#Input récupère une donnée de type string, on peut la convertir ;
annee = int(annee)

#Exercice test année bissextile ;
anneeBstl = input("Saisissez une année :")
anneeBstl = int(anneeBstl)

if anneeBstl % 400 == 0 or (anneeBstl % 4 == 0 and anneeBstl % 100 != 0):
    print("Cette année est bissextile")
else:
    print("Cette année n'est pas bissextile")

#Boucle while
i = 0

while i < 10:
    print(i)
    i += 1

#La boucle for fonctionne avec des séquence, un string est une séquence de caractère. Essayons ;
string = " Test "
for lettre in string:
    print(lettre)

#Le mot mot-clé IN peut être aussi utiliser autrement.
#Utile si on cherche à savoir si un élément quelconque est contenue dans une collection donnée.
for lettre in string:
    if lettre in "AEIOUYaeiouy":
        print(lettre)
    else:
        print("*")
#Mot-clé break permet d'arrêter une boucle quelque soit sa condition
p = 1
while p < 5:
    print(p)
    p += 1
    if p == 3:
        print("Stop 2 c'est déjà trop !")
        break

#Le mot-clé CONTINUE est simplement une instruction pour continuer l'execution de la boucle,
#en repartant directement à la ligne du while ou du for.
i = 1
while i < 20:
    if i % 3 == 0:
        i += 4
        print("On incremente i de 4. i est maintenant egale a", i)
        continue #On retourne au while sans exécuter les autres ligne
    print("La variable i =", i)
    i += 1 #Dans le cas classique on ajoute juste 1 à i

#Test table de multiplication
nb= input("Vous souhaitez apprendre la table de ")

def TableDeMulti(nb):
    p = 0

    while p < 10:
        print(p + 1,'*', nb, '=', (p + 1) * nb)
        p += 1

TableDeMulti(nb)

#Utilisation du return dans une fonciton exemple carré
#La variable "variable" contiendra, après execution de cette instruction 5 au carré, c'est à dire 25.
def carre(valeur):
    return valeur * valeur

variable = carre(5)

#Il existe une dérive de la simple fonction en python; La fonction lambda plus court et plus pratique dans
#certains cas on l'apelle avec le mot-clé lambda suivie des arg(lambda arg1, arg2, arg3: la_fonction * valeur).
#Une fonction lambda qui renvoie le carre comme la précedante ;
lambda x: x*x
#Après les ":" on palce le resultat de la fonction ici le carre de l'argument
#pour appeler une focntions lambda on peut simplement la ranger dans une variable et l'appeler
#avec l'argument souhaité
resultat_carre = lambda x: x*x
resultat_carre(5)
#Un autre exemple: si vous voulez créer une focntion lambda prenant deux paramètres et renvoyant
#la somme de ces deux paramètres, la syntaxe sera la suivante :
lambda x, y: x + y

#Bloc try & except (try essaie du code except prend le relais en cas d'erreur).
#On peut préciser à except dans quelle circonstance d'erreur il est senscé agir (except NameError:).
#Il peut egalement y avoir plusieurs except selon l'erreur
try:
    resultat = numerateur / denominateur
except NameError:
    print("Les variables numerateur et/ou denominateur de sont pas définie")
except TypeError:
    print("Les variables numerateur et/ou denominateur possedent un type incompatible avec la division")
except ZeroDivisionError:
    print("La variable denominateur est egale a 0")
#On peut utiliser le mot-clé AS pour capturer l'exception et afficher son message
try:
    print(10 / 0)
except type_de_l_exception as exception_retournee:
    print("Voici l'erreur :", exception_retournee)
#Les mots-clé ELSE et FINALLY. Deux mots-clé qui vont nous permettre de cosntruire un bloc try plys complet
#ELSE permet d'éxécuter une action si aucune erreur ne survient dans le bloc :
try:
    resultat = numerateur / denominateur
except NameError:
    print("Erreur de type NameError")
except TypeError:
    print("Erreur de type TypeError")
except ZeroDivisionError:
    print("Erreur de type ZeroDivisionError")
else:
    print("Le resultat obtenue est ", resultat)
#FINALLY permet d'exécuter du code après un bloc try, quel que soit le résultat de l'exécution dudit Bloc
#PASS est un mot-clé qui permet de rien executer dans un try ou un except
try:
    resultat = numerateur / denominateur
except type_de_l_erreur:
    pass
#ASSERT et un mot-clé généralement utiliser dans des try pour s'assurer qu'une condition soit remplie
#avant de continuer ;
assert test
assert variable == 5
#si "test" renvoie true on continue sinon une exception AssertionError est lévée
# si ==5 on continue
#Le mot-clé RAISE permet de lever des exceptions
raise TypeDeLException("message à afficher")
