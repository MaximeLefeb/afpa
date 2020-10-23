 package exams;

import java.util.Scanner;

import javax.swing.JButton;
import javax.swing.JFrame;

public class Fenetre extends JFrame{
	public Fenetre(){
		this.setTitle("Titre de ma page");
		this.setSize(600, 700);
		this.setLocationRelativeTo(null);
		this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		
		System.out.println("Entrez votre pr�nom : ");
		Scanner prompteur = new Scanner(System.in);
		String s1 = prompteur.nextLine();
		System.out.println("Bienvenue " + s1 + "\nSaisiz votre mot de passe");
		String s2 = prompteur.nextLine();
		String pwd = "admin";
		int tpm = 0;
		while ((s2.length() < 3 || compare(s2, pwd) == -1) && tpm != 3) {
			System.out.println("Mot de passe trop petit ou incorrect");
			s2 = prompteur.nextLine();
			tpm++;
		}
		if (compare(pwd, s2) == 0)
			System.out.println("Le mot de passe: " + s2 + " est correct");
		else
			System.out.println("Fail");
	}
	
		private static int compare(String pwd, String s2) {
			return 0;
	}
		public void addBtn() {
			JButton btn = new JButton("Mon magnifique Bouton");
			this.add(btn);
		}
  }
