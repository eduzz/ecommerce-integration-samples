package createtransaction;

import com.google.gson.annotations.SerializedName;

public class Item {

	@SerializedName("product_id")
	private int productId;
	
	@SerializedName("checkout_product_id")
	private int checkoutProductId;
	
	private String description;
	private double price;
	private int amount;
	
	public int getProductId() {
		return productId;
	}
	public void setProductId(int productId) {
		this.productId = productId;
	}
	public int getCheckoutProductId() {
		return checkoutProductId;
	}
	public void setCheckoutProductId(int checkoutProductId) {
		this.checkoutProductId = checkoutProductId;
	}
	public String getDescription() {
		return description;
	}
	public void setDescription(String description) {
		this.description = description;
	}
	public double getPrice() {
		return price;
	}
	public void setPrice(double price) {
		this.price = price;
	}
	public int getAmount() {
		return amount;
	}
	public void setAmount(int amount) {
		this.amount = amount;
	}
	
	
}
