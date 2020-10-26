package myFirstApp;

import java.util.Scanner;

public class mySecondClass {
	public static int compare(String s1, String s2) {
		if (s1.length() == s2.length()) {
			for (int i = 0; i < s1.length(); i++) {
				if (s1.charAt(i) != s2.charAt(i))
					return (-1);
			}
			return (0);
		} else {
			return (-1);
		}
	}

	public static void main(String[] args) {
		System.out.println("Entrez votre pr�nom : ");
		Scanner prompteur = new Scanner(System.in);
		String s1         = prompteur.nextLine();

		System.out.println("Bonjour " + s1 + "\nSaisir le bon mot de passe");
		String s2  = prompteur.nextLine();
		String pwd = "azertyuiop";
		int tpm    = 0;

		while ((s2.length() < 6 || compare(s2, pwd) == -1) && tpm != 3) {
			System.out.println("Mot de passe trop petit ou incorrect");
			s2 = prompteur.nextLine();
			tpm++;
		}

		if (compare(pwd, s2) == 0)
			System.out.println("Le mot de passe: " + s2 + " est correct");
		else
			System.out.println("Fail");
	}
}