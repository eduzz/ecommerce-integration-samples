package createproduct;

import com.google.gson.annotations.SerializedName;

public class Product {
	
	@SerializedName("product_title")
	private String productTitle;
	private String description;
	private double price;
	private double commission;
	@SerializedName("postback_url")
	private String postbackURL;
	@SerializedName("partner_id")
	private int partnerID;
	@SerializedName("partner_commission")
	private double partnerCommission;
	@SerializedName("partner_postback_url")
	private String partnerPostbackURL;
	
	public String getProductTitle() {
		return productTitle;
	}
	public void setProductTitle(String productTitle) {
		this.productTitle = productTitle;
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
	public double getCommission() {
		return commission;
	}
	public void setCommission(double commission) {
		this.commission = commission;
	}
	public String getPostbackURL() {
		return postbackURL;
	}
	public void setPostbackURL(String postbackURL) {
		this.postbackURL = postbackURL;
	}
	public int getPartnerID() {
		return partnerID;
	}
	public void setPartnerID(int partnerID) {
		this.partnerID = partnerID;
	}
	public double getPartnerCommission() {
		return partnerCommission;
	}
	public void setPartnerCommission(double partnerCommission) {
		this.partnerCommission = partnerCommission;
	}
	public String getPartnerPostbackURL() {
		return partnerPostbackURL;
	}
	public void setPartnerPostbackURL(String partnerPostbackURL) {
		this.partnerPostbackURL = partnerPostbackURL;
	}
}
