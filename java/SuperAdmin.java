package myFirstApp;

public class SuperAdmin extends Admin {

	public SuperAdmin(String lastname, String firstname, int birth, String mailAddr, String postAddr, String city, String zipcode, String password, String phone) {
		super(lastname, firstname, birth, mailAddr, postAddr, city, zipcode, password, phone);
	}

	public void presentation() {
		super.presentation();
		System.out.println("\nEt ici c'est mon le BOSS");
	}
}