package myFirstApp;

import javax.swing.JFrame;
import javax.swing.JPanel;
import java.awt.Color;

public class Fenetre extends JFrame {
	public Fenetre() {
		this.setTitle("Titre de ma page");
		this.setSize(400, 100);
		this.setLocationRelativeTo(null);
		this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
	}

	public Fenetre(String title, int x, int y) {
		this.setTitle(title);
		this.setSize(x, y);
		this.setLocationRelativeTo(null);
		this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
	}

	public void addEcran(JPanel pan) {
		this.setContentPane(pan);
	}

	public void hideFenetre() {
		this.setVisible(false);
	}

	public void showFenetre() {
		this.setVisible(true);
	}
}