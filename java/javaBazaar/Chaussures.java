package myFirstApp;

public class Chaussures {
	private String marque;
	private float taille;
	private String couleur;
	private float prix;
	private String type;
	private String matiere;

	public float commeVousVoulez() {
		return (this.getPrix() / this.getTaille());
	}

	public float getPrixByTaille(float taille) {
		return (this.commeVousVoulez() * taille);
	}

	public Chaussures() {
		setMarque("");
		setTaille(0f);
		setCouleur("");
		setPrix(0f);
		setType("");
		setMatiere("");

	}

	public void describe() {
		System.out.println("\nLa chaussure est de marque : " + getMarque() + "\nTaille/Prix: " + getTaille() + " / "
				+ getPrix() + "€\nDescription : \nElle est de couleur " + getCouleur() + " en " + getMatiere()
				+ ". Elle a été créée pour une utilisation de type : " + getType() + "\n");

	}

	public Chaussures(String marque, float taille, String couleur, float prix, String type, String matiere) {
		setMarque(marque);
		setTaille(taille);
		setCouleur(couleur);
		setPrix(prix);
		setType(type);
		setMatiere(matiere);
	}

	public String getMarque() {
		return marque;
	}

	public void setMarque(String marque) {
		this.marque = marque;
	}

	public float getTaille() {
		return taille;
	}

	public void setTaille(float taille) {
		this.taille = taille;
	}

	public String getCouleur() {
		return couleur;
	}

	public void setCouleur(String couleur) {
		this.couleur = couleur;
	}

	public float getPrix() {
		return prix;
	}

	public void setPrix(float prix) {
		this.prix = prix;
	}

	public String getType() {
		return type;
	}

	public void setType(String type) {
		this.type = type;
	}

	public String getMatiere() {
		return matiere;
	}

	public void setMatiere(String matiere) {
		this.matiere = matiere;
	}

}