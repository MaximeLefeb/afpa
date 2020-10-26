package myFirstApp;

import java.io.BufferedInputStream;
import java.io.BufferedOutputStream;
//import java.io.DataInputStream;
//import java.io.DataOutputStream;
import java.io.File;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;

//import CommeJeVeux.Usr;

public class testFile2 {
	public static void main(String[] args) {
		ObjectInputStream streamLire;
		ObjectOutputStream streamEcrire;
		try {
			streamEcrire = new ObjectOutputStream(new BufferedOutputStream(new FileOutputStream(new File("Ecrire.txt"))));
			streamEcrire.writeObject(new Utilisateur("Milou", "Tintin", 33, "outlook", "123 rue de la r�publique",
					"Lille", "59100", "azertyuiop"));
			streamEcrire.close();
			streamLire = new ObjectInputStream(new BufferedInputStream(new FileInputStream(new File("Ecrire.txt"))));
			try {
				System.out.println("Affichage des Utilisateurs :\n");
				System.out.println(((Utilisateur) streamLire.readObject()).getPrenom());
			} catch (ClassNotFoundException e) {
				e.printStackTrace();
			}
			streamLire.close();
		} catch (FileNotFoundException e) {
			e.printStackTrace();
		} catch (IOException e) {
			e.printStackTrace();
		}
		
//		ObjectInputStream streamEcrire;
//		ObjectOutputStream streamLire;
//		try {
//			streamLire = new ObjectOutputStream(new BufferedOutputStream(new FileOutputStream(new File("Lire.txt"))));
//			streamLire.writeObject(new Usr());
//			streamLire.close();
//			streamEcrire = new ObjectInputStream(new BufferedInputStream(new FileInputStream(new File("Lire.txt"))));
//			try {
//				System.out.println("Affichage des Utilisateurs :\n");
//				System.out.println(((Usr) streamEcrire.readObject()).getPrenom());
//			} catch (ClassNotFoundException e) {
//				e.printStackTrace();
//			}
//			streamEcrire.close();
//		} catch (FileNotFoundException e) {
//			e.printStackTrace();
//		} catch (IOException e) {
//			e.printStackTrace();
//		}
	}
}