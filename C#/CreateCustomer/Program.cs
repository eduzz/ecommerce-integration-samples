using System;
using Newtonsoft.Json;
using RestSharp;

namespace CreateCustomer
{
    [JsonObject]
    class Config
    {
        [JsonProperty]
        public string Lang {get;set;}
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
    class Request
    {
        [JsonProperty("config")]
        public Config Config {get;set;}

        [JsonProperty("customer")]
        public Customer Customer {get;set;}
    }

    class Program
    {
        static void Main(string[] args)
        {
            var model = createRequest();

            var token = "<access_token_here>";

            string url = "http://api-cs.eduzz.com/ecommerce/customer";

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
                Customer = new Customer
                {
                    Name = "John Connor",
                    Email = "johnconnor@hotmail.com",
                    Document = "<customer_document>",
                    Cellphone = "15989888989",
                    PersonType = "F" //F - Person|J - Enterprise
                }
            };
        }
    }
}
