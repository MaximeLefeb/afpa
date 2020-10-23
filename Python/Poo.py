# -*- coding: utf-8 -*-

from tkinter import *
import os
import weakref

#----------------------------------------PARAMETRE FENETRE-------------------------------------
fenetre=Tk()
fenetre.title('Guide Escape From Tarkov')
fenetre = Frame(fenetre, width=1000, height=500, borderwidth=1)
fenetre.grid()

i=1
j=1
trader = ["Prapor",
            "Therapist",
            "Fence",
            "Skier",
            "Peacekeeper",
            "Mechanic",
            "Ragman",
            "Jaeger"]

map = ["Interchange",
        "Factory",
        "Customs",
        "Reserve",
        "Shoreline",
        "Woods",
        "None"]

#Fonctions ajout de ligne/collone----------------------
def createRowCol(questName):
    newQuete = Label(fenetre, text=questName, padx=10,pady=10, borderwidth=1, width=40, relief="sunken").grid(row=i, column=j)

#Getter objet Quete---------------------------------------
class Quete:
    nb = 0
    instances = []

    def __init__(self, name=None,quete_trader=None,quete_map=None):
        Quete.nb = Quete.nb +1
        self.__class__.instances.append(weakref.proxy(self))
        self.name = name
        self.quete_trader = trader
        self.quete_map = map

    @classmethod
    def get_nb(cls):
        return Quete.nb

#Création d'objet----------------------------------------------
Debut = Quete("Debut",trader[0], map[4])
ProKiller = Quete("test",trader[3],map[6])

for instances in Quete.instances:
    createRowCol(instances.name)

#----------------------------------------ENTETE------------------------------------------------
entete       = Label(fenetre, text="Quêtes", padx=10, pady=10, borderwidth=1, width=40, relief="raised").grid(row=0, column=0)
enteteTrader = Label(fenetre, text="Trader", padx=10,pady=10, borderwidth=1, width=40, relief="raised").grid(row=0, column=1)
enteteMap    = Label(fenetre, text="Map", padx=10,pady=10, borderwidth=1, width=40, relief="raised").grid(row=0, column=2)

#---------------------------------------QUETES-------------------------------------------------
# nomDeQuete = Label(fenetre, text=Debut.quete_nom, padx=10,pady=10, borderwidth=1, width=40, relief="sunken").grid(row=1, column=0)

fenetre.mainloop()
