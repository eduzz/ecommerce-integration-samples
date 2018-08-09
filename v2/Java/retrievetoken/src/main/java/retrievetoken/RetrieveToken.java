package retrievetoken;

import java.io.BufferedReader;
import java.io.DataOutputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;

import com.google.gson.Gson;

public class RetrieveToken {

	public static void main(String[] args) {
		
		try {
			String url = "http://api-cs.eduzz.com/ecommerce/token";
			URL obj = new URL(url);
			HttpURLConnection con = (HttpURLConnection) obj.openConnection();
	
			con.setRequestMethod("POST");
			con.setRequestProperty("Content-type", "application/json");
	
			String data = getCrendendtials();
			
			con.setDoOutput(true);
			DataOutputStream wr = new DataOutputStream(con.getOutputStream());
			wr.writeBytes(data);
			wr.flush();
			wr.close();
			
			BufferedReader in = new BufferedReader(
			        new InputStreamReader(con.getInputStream()));
			String inputLine;
			StringBuffer response = new StringBuffer();
	
			while ((inputLine = in.readLine()) != null) {
				response.append(inputLine);
			}
			in.close();
			
			Credentials cred = new Gson().fromJson(response.toString(), Credentials.class);
			
			System.out.println(cred.getToken());
		}
		catch (Exception e) {
			e.printStackTrace();
		}
	}
	
	private static String getCrendendtials() {
		
		Gson gson = new Gson();
		Credentials cred = new Credentials("test@mail.com", "123456", "123456");//"<my_eduzz_account_email>", "<my_eduzz_account_public_key>", "<my_eduzz_account_api_key>");
		return gson.toJson(cred);
	}
}
