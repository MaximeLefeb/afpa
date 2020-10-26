package myFirstApp;

import java.awt.Graphics;
import javax.swing.JPanel;
import java.awt.Color;
import java.awt.Font;
import java.awt.Image;
import javax.imageio.ImageIO;
import java.io.File;
import java.io.IOException;
import javax.swing.JButton;

public class Ecran extends JPanel {
	public void paintComponent(Graphics graph) {
		// graph.fillOval(400, 300, 100, 70);
		// graph.setColor(Color.yellow);
		// graph.fillArc(100, 30, 100, 70, 30, 300);
		// graph.setColor(Color.white);
		// graph.fillOval(200, 55, 20, 20);
		// graph.fillOval(250, 55, 20, 20);
		// graph.fillOval(300, 55, 20, 20);
		// graph.fillOval(350, 55, 20, 20);
		int x[] = { 310, 280, 280 };
		int y[] = { 310, 280, 280 };
		graph.drawPolygon(x, y, 3);
		Font ft = new Font("Arial", Font.ITALIC, 30);
		graph.drawString("Nope", 167, 456);
		int xMax = this.getWidth();
		int yMax = this.getHeight();
		try {
			Image img = ImageIO.read(new File("Banane.gif"));
			graph.drawImage(img, 0, 0, xMax, yMax, this);
		} catch (IOException e) {
			e.printStackTrace();
		}
	}

	public void addBtn() {
		JButton btn = new JButton("Mon magnifique Bouton");
		this.add(btn);
	}

	public void background(Color col) {
		this.setBackground(col);
	}
}