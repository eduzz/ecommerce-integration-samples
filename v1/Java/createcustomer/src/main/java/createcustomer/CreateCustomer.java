package createcustomer;

import java.io.BufferedReader;
import java.io.DataOutputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;
import java.nio.charset.Charset;

import com.google.gson.Gson;

import createcustomer.Config;
import createcustomer.Customer;
import createcustomer.Request;

public class CreateCustomer {

	public static void main(String[] args) {
		
		try {
			String url = "http://api-cs.eduzz.com/ecommerce/customer";
			URL obj = new URL(url);
			HttpURLConnection con = (HttpURLConnection) obj.openConnection();
	
			con.setRequestMethod("POST");
			con.setRequestProperty("Content-type", "application/json");
			con.setRequestProperty("Authorization", String.format("Bearer %s", "<your_token_here>"));
	
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
	
	private static Customer getCustomer() {
		
		Customer customer = new Customer();
		customer.setName("João do Teste de Integracao.");
		customer.setEmail("joaoteste@hotmail.com");
		customer.setCellphone("15998995656");
		customer.setDocument("32467149080");
		customer.setPersonType("F"); //F - Person | J - Enterprise
		return customer;
	}
	
	public static String getRequest() {
		
		Gson gson = new Gson();
		
		Request req = new Request();
		req.setConfig(new Config("pt"));
		req.setCustomer(getCustomer());
		
		return gson.toJson(req);
	}
}
