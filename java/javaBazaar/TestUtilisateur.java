package myFirstApp;

import java.io.File;

public class TestUtilisateur {
	public static void main(String[] args) {
		File f = new File("test.txt");
		Utilisateur tintin = new Utilisateur("Milou", "Tintin", 33,
		"outlook", "123 rue de la république", "Lille",
		"59100", "azertyuiop");
		Chaussures ville1 = new Chaussures("Zalando", 31.5f, "grise", 27.98f,
		"Ville", "Dessus et intérieur cuir");
		Chaussures running1 = new Chaussures("Kalenji", 41.5f, "jaune",
		17.48f, "Running débutant",
		"Synthétique semelle gel");
		Chaussures running2 = new Chaussures("Asics", 41.5f, "bleu", 17.48f,
		"Trail", "Synthétique semelle gel");
		tintin.viewArmoire();
		tintin.addChaussure(ville1);
		tintin.addChaussure(running2);
		tintin.addChaussure(running1);
		tintin.viewArmoire();
		tintin.removeChaussure(running1);
		tintin.viewArmoire();

		SuperAdmin tintin1 = new SuperAdmin("Milou", "Tintin", 33, "outlook", "123 rue de la république", "Lille",
				"59100", "azertyuiop", "0987654321");
		tintin.presentation();

		// System.out.println("Chemin absolue: " + f.getAbsolutePath());
		// System.out.println("Filename: " + f.getName());
		// System.out.println("Est-ce qu'il existe ? " + f.exists());
		// System.out.println("Est-ce un répertoire ? " + f.isDirectory());
		// System.out.println("Est-ce un fichier ? " + f.isFile());
		//
		// for (File file : File.listRoots()) {
		// System.out.print(file.getAbsolutePath());
		// try {
		// int i = 1;
		// for (File nom : file.listFiles()) {
		// System.out.print("\t" + ((nom.isDirectory()) ? nom.getName() + "/" :
		// nom.getName()));
		// if ((i % 4) == 0)
		// System.out.print("\n");
		// i++;
		// }
		// System.out.print("\n");
		// } catch (NullPointerException e) {
		// System.out.print("Ton file existe pas.");
		// }
		// }

	}
}