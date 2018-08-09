using System;
using Newtonsoft.Json;
using System.IO;
using System.Text;
using RestSharp;
using RestSharp.Authenticators;

namespace CreateProduct
{
    [JsonObject]
    class Product
    {   
        [JsonProperty("product_title")]
        public string ProductTitle {get;set;}

        [JsonProperty("description")]
        public string Description {get;set;}

        [JsonProperty("price")]
        public double Price {get;set;}

        [JsonProperty("currency")]
        public string Currency {get;set;}
    }

    [JsonObject]
    class Config
    {
        [JsonProperty("lang")]
        public string Lang {get;set;}
    }

    [JsonObject]
    class Request
    {
        [JsonProperty("config")]
        public Config Config {get;set;}

        [JsonProperty("product")]
        public Product Product {get;set;}
    }

    class Program
    {
        static void Main(string[] args)
        {
            var model = createRequest();

            var token = "<access_token_here>";

            string url = "http://api-cs.eduzz.com/ecommerce/product";

            var client = new RestClient(url);
            var request = new RestRequest(Method.POST);
            request.AddHeader("Content-type", "application/json");
            request.AddHeader("Authorization", string.Format("Bearer {0}", token));
            request.AddParameter("", JsonConvert.SerializeObject(model), ParameterType.RequestBody);
            var response = client.Execute(request);
            Console.WriteLine(response.Content);
        }

        static Request createRequest()
        {
            return new Request
            {
                Config = new Config
                {
                    Lang = "pt"
                },
                Product = new Product
                {
                    ProductTitle = "<product_title>",
                    Description = "This description must have at least 100 characters. It's a validation rule. An error will be thrown.",
                    Price = 1.00,
                    Currency = "BRL" //BRL or USD
                }
            };
        }
    }
}
