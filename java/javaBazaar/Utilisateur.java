package myFirstApp;

import java.util.Scanner;
import java.util.LinkedList;
import java.util.List;
import java.util.ListIterator;
import java.io.Serializable;

public class Utilisateur implements Serializable {
	private String nom;
	private String prenom;
	private int age;
	private String email;
	private String addr;
	private String ville;
	private String codePostal;
	private String pwd;
	private List<Chaussures> armoire;

	public Utilisateur() {
		// System.out.println("Constructeur sans paramètres");
		setNom("");
		setPrenom("00000");
		setAge(0);
		setEmail("");
		setPwd("");
		setAddr("");
		setVille("");
		setCodePostal("");
		armoire = new LinkedList<Chaussures>();
	}

	public Utilisateur(String nom, String prenom, int age, String email, String addr, String ville, String codePostal,
			String pwd) {
		// System.out.println("Constructeur avec paramètres");
		setNom(nom);
		setPrenom(prenom);
		setAge(age);
		setEmail(email);
		setPwd(pwd);
		setAddr(addr);
		setVille(ville);
		setCodePostal(codePostal);
		armoire = new LinkedList<Chaussures>();
	}

	public String getNom() {
		return nom;
	}

	public void setNom(String nom) {
		this.nom = nom;
	}

	public void presentation() {
		System.out
				.println("Bonjour, Je suis " + this.prenom + "\nJ'ai " + this.age + " ans et j'habite à " + this.ville);
	}

	public String getPrenom() {
		return prenom;
	}

	public void setPrenom(String prenom) {
		this.prenom = prenom;
	}

	public int getAge() {
		return age;
	}

	public void setAge(int age) {
		this.age = age;
	}

	public String getEmail() {
		return email;
	}

	public void setEmail(String email) {
		this.email = email;
	}

	public String getPwd() {
		return pwd;
	}

	public void setPwd(String pwd) {
		this.pwd = pwd;
	}

	public void updatePwd() {
		System.out.println("Entre le nouveau mot de passe");
		Scanner sc = new Scanner(System.in);
		this.setPwd(sc.nextLine());
		System.out.println("Le mot de passe est modifié en : " + this.getPwd());
	}

	public String getAddr() {
		return addr;
	}

	public void setAddr(String addr) {
		this.addr = addr;
	}

	public String getCodePostal() {
		return codePostal;
	}

	public void setCodePostal(String codePostal) {
		this.codePostal = codePostal;
	}

	public String getVille() {
		return ville;
	}

	public void setVille(String ville) {
		this.ville = ville;
	}

	public void addChaussure(Chaussures shoes) {
		armoire.add(shoes);
	}

	public void addChaussure(Chaussures shoes, Chaussures shoes2) {
		armoire.add(shoes);
		armoire.add(shoes2);
	}

	public void removeChaussure(Chaussures shoes) {
		armoire.remove(shoes);
	}

	public void removeChaussure(Chaussures shoes, Chaussures shoes2) {
		armoire.remove(shoes);
		armoire.remove(shoes2);
	}

	public void viewArmoire() {
		ListIterator<Chaussures> it = armoire.listIterator();
		Chaussures tmp = new Chaussures();
		int i = 0;

		while (it.hasNext()) {
			tmp = (Chaussures) it.next();
			tmp.describe();
			i++;
		}
		if (i == 0)
			System.out.println("L'armoire est vide");
		else
			System.out.println("Il y a " + i + " paire(s) de chaussures dans l'armoire");
	}
}