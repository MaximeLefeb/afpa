package myFirstApp;

import java.awt.Graphics;
import javax.swing.JButton;

public class Bouton extends JButton {
	private String label;

	public Bouton(String str) {
		super(str);
		this.label = str;
	}

	public void paintComponent(Graphics graph) {

	}
}