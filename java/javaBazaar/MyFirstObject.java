package myFirstApp;

public class MyFirstObject {
	private static String nom;
	private static float poids;

	public MyFirstObject() {
		nom = "";
		setPoids(0.0f);
	}

	public MyFirstObject(String name, float fit) {
		nom = name;
		setPoids(fit);
	}

	public static String getNom() {
		return (nom);
	}

	public static void setNom(String name) {
		nom = name;
	}

	public static float getPoids() {
		return poids;
	}

	public static void setPoids(float poids) {
		MyFirstObject.poids = poids;
	}
}