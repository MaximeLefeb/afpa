package myFirstApp;

import java.io.File;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;

public class Exo {
	public static void main(String[] args) {
		copyFile("Lire.txt", "Ecrire.txt");
	}

	public static void copyFile(String s1, String s2) {
		FileInputStream lireFichier = null;
		FileOutputStream ecrireFichier = null;
		try {
			lireFichier = new FileInputStream(new File(s1));
			ecrireFichier = new FileOutputStream(new File(s2));
			byte[] buffer = new byte[8];
			int i = 0;
			while ((i = lireFichier.read(buffer)) >= 0) {
				ecrireFichier.write(buffer);
			}
		} catch (FileNotFoundException e) {
			e.printStackTrace();
		} catch (IOException e) {
			e.printStackTrace();
		} finally {
			try {
				if (lireFichier != null) {
					lireFichier.close();
				}
			} catch (IOException e) {
				e.printStackTrace();
			}
			try {
				if (ecrireFichier != null) {
					ecrireFichier.close();
				}
			} catch (IOException e) {
				e.printStackTrace();
			}
		}
	}
}