package myFirstApp;

public class Admin extends Utilisateur {
	private String tel;

	public Admin(String lastname, String firstname, int birth, String mailAddr, String postAddr, String city,
			String zipcode, String password, String phone) {
		super(lastname, firstname, birth, mailAddr, postAddr, city, zipcode, password);
		setTel(tel);
	}

	public String getTel() {
		return tel;
	}

	public void setTel(String tel) {
		this.tel = tel;
	}
}
