package retrievetoken;

public class Credentials {

	private String email;
	private String publicKey;
	private String apiKey;
	private String token;
	
	public Credentials(String email, String publicKey, String apiKey) {
		this.email = email;
		this.publicKey = publicKey;
		this.apiKey = apiKey;
	}
	
	public String getEmail() {
		return email;
	}
	public void setEmail(String email) {
		this.email = email;
	}
	public String getPublicKey() {
		return publicKey;
	}
	public void setPublicKey(String password) {
		this.publicKey = password;
	}
	public String getApiKey() {
		return apiKey;
	}
	public void setApiKey(String apiKey) {
		this.apiKey = apiKey;
	}
	public String getToken() {
		return token;
	}
	public void setToken(String token) {
		this.token = token;
	}
}
