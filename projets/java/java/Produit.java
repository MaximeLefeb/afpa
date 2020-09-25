package exams;

import java.util.Scanner;
import java.util.LinkedList;
import java.util.List;
import java.util.ListIterator;
import java.io.Serializable;

public class Produit implements Serializable {
	private String code;
	private String nom;
	private String description;
	private String couleur;
	private String origine;
	private float prix;
	private List<articles> listeProduit;

	public Produit() {
		setCode("");
		setNom("");
		setDescription("");
		setCouleur("");
		setOrigine("");
		setPrix(0);
		listeProduit = new LinkedList<articles>();
	}

	public Produit(String code, String nom, String description, String couleur, String origine, float prix) {
		setCode(code);
		setNom(nom);
		setDescription(description);
		setCouleur(couleur);
		setOrigine(origine);
		setPrix(prix);
		listeProduit = new LinkedList<articles>();
		if ((nom.length() > 30 ^ (description.length() > 50))) {
			System.out.println("description ou nom d'articles trop long");
		} 
	}
	
	private void setCode(String string) {
	}
	private void setNom(String string) {
	}
	private void setDescription(String string) {
	}
	private void setCouleur(String string) {
	}
	private void setOrigine(String string) {
	}
	private void setPrix(float i) {
	}
	
	public void viewArmoire() {
		ListIterator<articles> it = listeProduit.listIterator();
		articles tmp = new articles();
		int i = 0;

		while (it.hasNext()) {
			tmp = (articles) it.next();
			tmp.describe();
			i++;
		}
		if (i == 0) 
			System.out.println("Out of stock");
		else
			System.out.println( i + "Articles restant" );
	}
}