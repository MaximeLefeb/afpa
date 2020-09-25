package myFirstApp;

public class TestFonction {
	public static void main(String[] atgs) {
		int nb = 0;

		nb = countChar("toto aime manger les pommes");
		System.out.println("La chaine de mesure " + nb + " caractères.");
		nb = myStrcmp("toto", "toto");
	}

	public static int countChar(String str1) {
		int i;
		for (i = 0; i < str1.length(); i++) {
			System.out.println("Caractère " + str1.charAt(i));
		}
		return (i);
	}

	public static int myStrcmp(String str1, String str2) {
		int i;
		if (str1.length() == str2.length()) {
			for (i = 0; i < str1.length(); i++) {
				if (str1.charAt(i) != str2.charAt(i))
					return (-1);
			}
			return (0);
		} else
			return (-1);
	}

	public static String copyString(String str1) {
		return (str1);
	}
}