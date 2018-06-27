package createtransaction;

import java.util.List;

import com.google.gson.annotations.SerializedName;

public class Transaction {

	@SerializedName("order_id")
	private String orderId;

	private int installments;

	@SerializedName("return_url")
	private String returnURL;

	@SerializedName("postback_url")
	private String postbackURL;

	private List<Item> items;

	private Customer customer;

	@SerializedName("payment_url")
	private String paymentURL;

	public String getOrderId() {
		return orderId;
	}

	public void setOrderId(String orderId) {
		this.orderId = orderId;
	}

	public int getInstallments() {
		return installments;
	}

	public void setInstallments(int installments) {
		this.installments = installments;
	}

	public String getReturnURL() {
		return returnURL;
	}

	public void setReturnURL(String returnURL) {
		this.returnURL = returnURL;
	}

	public String getPostbackURL() {
		return postbackURL;
	}

	public void setPostbackURL(String postbackURL) {
		this.postbackURL = postbackURL;
	}

	public List<Item> getItems() {
		return items;
	}

	public void setItems(List<Item> items) {
		this.items = items;
	}

	public Customer getCustomer() {
		return customer;
	}

	public void setCustomer(Customer customer) {
		this.customer = customer;
	}

	public String getPaymentURL() {
		return paymentURL;
	}

	public void setPaymentURL(String paymentURL) {
		this.paymentURL = paymentURL;
	}
}
