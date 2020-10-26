package myFirstApp;

import java.io.File;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;

public class testFile {
	public static void main(String[] args) {
		FileInputStream lireFichier = null;
		FileOutputStream ecrireFichier = null;

		try {
			lireFichier = new FileInputStream(new File("Lire.txt"));
			ecrireFichier = new FileOutputStream(new File("Ecrire.txt"));
			byte[] buffer = new byte[8];
			int i = 0;
			while ((i = lireFichier.read(buffer)) >= 0) {
				ecrireFichier.write(buffer);
				for (byte bit : buffer) {
					System.out.print("\t" + bit + "(" + (char) bit + ")");
					buffer = new byte[8];
				}
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