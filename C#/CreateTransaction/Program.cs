using System;
using Newtonsoft.Json;
using RestSharp;
using System.Collections.Generic;

namespace CreateTransaction
{
    [JsonObject]
    class Config
    {
        [JsonProperty("lang")]
        public string Lang;
    }

    [JsonObject]
    class Customer
    {
        [JsonProperty("name")]
        public string Name {get;set;}

        [JsonProperty("email")]
        public string Email {get;set;}

        [JsonProperty("document")]
        public string Document {get;set;}

        [JsonProperty("person_type")]
        public string PersonType {get;set;}

        [JsonProperty("cellphone")]
        public string Cellphone {get;set;}
    }

    [JsonObject]
    class Item
    {
        [JsonProperty("product_id")]
        public int ProductID {get;set;}

        [JsonProperty("checkout_product_id")]
        public int CheckoutProductID {get;set;}

        [JsonProperty("description")]
        public string Description {get;set;}

        [JsonProperty("price")]
        public double Price {get;set;}

        [JsonProperty("amount")]
        public int Amount {get;set;}
    }

    class Transaction
    {
        [JsonProperty("order_id")]
        public string OrderId {get;set;}

        [JsonProperty("installments")]
        public int Installments {get;set;}

        [JsonProperty("return_url")]
        public string ReturnURL {get;set;}

        [JsonProperty("items")]
        public List<Item> Items {get;set;}

        [JsonProperty("customer")]
        public Customer Customer {get;set;}

        [JsonProperty("payment_url")]
        public String PaymentURL {get;set;}
    }

    [JsonObject]
    class Request
    {
        [JsonProperty("config")]
        public Config Config {get;set;}

        [JsonProperty("transaction")]
        public Transaction Transaction {get;set;}
    }

    class Program
    {
        static void Main(string[] args)
        {
            var model = createRequest();

            var token = "<access_token_here>";

            string url = "http://api-cs.eduzz.com/ecommerce/transaction";

            var client = new RestClient(url);
            var request = new RestRequest(Method.POST);
            request.AddHeader("Content-type", "application/json");
            request.AddHeader("Authorization", string.Format("Bearer {0}", token));
            request.AddParameter("", JsonConvert.SerializeObject(model), ParameterType.RequestBody);
            var response = client.Execute(request);
            Console.WriteLine(response.Content);
            var transaction = JsonConvert.DeserializeObject<Transaction>(response.Content);
            Console.WriteLine(String.Format("Your payment URL is: {0}", transaction.PaymentURL));
        }

        static Request createRequest()
        {
            return new Request
            {
                Config = new Config
                {
                    Lang = "pt"
                },
                Transaction = new Transaction
                {
                    OrderId = "1234",
                    Installments = 1,
                    ReturnURL = "<your_return_url_here>",
                    Items = new List<Item>
                    {
                        //The two product IDs are needed to the transaction
                        new Item {
                            ProductID = 0, //MyEduzz
                            CheckoutProductID = 0, //CheckoutSun
                            Description = "<Product description here>",
                            Price = 1.00,
                            Amount = 1
                        }
                    },
                    /*
                     *    Uses the previously registered customer
                     *    If some information has changed, the customer will be also updated too
                     */
                    Customer = new Customer
                    {
                        Name = "John Connor",
                        Email = "johnconnor@hotmail.com",
                        Document = "89261349030",//"<customer_document>",
                        Cellphone = "15989888989",
                        PersonType = "F" //F - Person|J - Enterprise
                    }
                }
            };
        }
    }
}
