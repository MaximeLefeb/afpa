package myFirstApp;

public class MyFirstWindow {
	public static void main(String[] args) {
		// Fenetre test2 = new Fenetre();
		Fenetre test = new Fenetre("Gluglu", 800, 600);
		Ecran ecr = new Ecran();
		ecr.addBtn();
		test.addEcran(ecr);
		test.showFenetre();

	}
}