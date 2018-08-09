package createproduct;

import java.io.BufferedReader;
import java.io.DataOutputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;
import java.nio.charset.Charset;

import com.google.gson.Gson;

public class CreateProduct {

	public static void main(String[] args) {
		
		try {
			String url = "http://api-cs.eduzz.com/ecommerce/product";
			URL obj = new URL(url);
			HttpURLConnection con = (HttpURLConnection) obj.openConnection();
	
			con.setRequestMethod("POST");
			con.setRequestProperty("Content-type", "application/json");
			con.setRequestProperty("Authorization", String.format("Bearer %s", "<your_access_token>"));
	
			String data = getRequest();
			
			con.setDoOutput(true);
			DataOutputStream wr = new DataOutputStream(con.getOutputStream());
			wr.write(data.getBytes(Charset.forName("UTF8")));
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
			
			System.out.println(response.toString());
		}
		catch (Exception e) {
			e.printStackTrace();
		}
	}
	
	private static Product getProduct() {
		
		Product prod = new Product();
		prod.setProductTitle("Example product for Java integration");
		prod.setDescription("This description must have at least 100 characters. It's a validation rule. An error will be thrown.");
		prod.setPrice(1.50);
		prod.setCommission(1); //Commission for afiliates
		prod.setPostbackURL("http://test.com"); //Notification URL for transactions using this product
		prod.setPartnerID(1); //Eduzz ID for the administrator in case of Marketplace implementation
		prod.setPartnerCommission(1); //Partner commission in case of Marketplace implementation
		prod.setPartnerPostbackURL("http://test.com"); //Partner notification URL in case of Marketplace implementation
		
		return prod;
	}
	
	public static String getRequest() {
		
		Gson gson = new Gson();
		
		Request req = new Request();
		req.setConfig(new Config("pt"));
		req.setProduct(getProduct());
		
		return gson.toJson(req);
	}
}
