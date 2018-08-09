package createtransaction;

import java.io.BufferedReader;
import java.io.DataOutputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;
import java.nio.charset.Charset;
import java.util.ArrayList;
import java.util.List;

import com.google.gson.Gson;

public class CreateTransaction {

	public static void main(String[] args) {

		try {
			String url = "http://api-cs.eduzz.com/ecommerce/transaction";
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

			Gson gson = new Gson();
			Transaction trans = gson.fromJson(response.toString(), Transaction.class);

			System.out.println(response.toString());
			System.out.println(String.format("Your payment URL is: %s", trans.getPaymentURL()));
		}
		catch (Exception e) {
			e.printStackTrace();
		}
	}

	private static Transaction getTransaction() {

		Transaction trans = new Transaction();

		trans.setOrderId("1234");
		trans.setReturnURL("http://test.com");
		trans.setPostbackURL("http://test.com/postback");
		trans.setInstallments(1);
		trans.setCustomer(getCustomer());
		trans.setItems(getItems());

		return trans;
	}

	private static List<Item> getItems() {

		Item item = new Item();

		item.setCheckoutProductId(0); //Checkout product id
		item.setProductId(0); //Product id
		item.setDescription("Integration test product");
		item.setPrice(1.5);
		item.setAmount(1);

		List<Item> items = new ArrayList<Item>();
		items.add(item);

		return items;
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
		req.setTransaction(getTransaction());

		return gson.toJson(req);
	}
}
