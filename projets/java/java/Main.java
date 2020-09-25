package exams;

import javax.swing.JFrame;

public class Main {

	public static void main(String[] args) {
		JFrame Fenetre = new JFrame();
			Produit televiseur = new Produit("1234567278167","Ecran LG 4K -50%","T�l�viseur 4k 34pc","Noir","China",349);
			Produit meubleTele = new Produit("1234567389456","Meuble t�l� en verre","meubles en verre 2mx1mx1m","gris","France",139);
			Produit lecteurDvd = new Produit("1345678456765","Lecteur bluray"," lecteur blueray ultra-HD","Noir","China",0);
			Produit ordinateur = new Produit("1243265324554","Ordinateur asus-1402 ","portable,i5 2700 3.2Ghz,GTX960m,8GB","Blanc","USA",899);
	}
}
